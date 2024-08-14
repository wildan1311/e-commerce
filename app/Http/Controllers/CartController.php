<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use App\Services\Midtrans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Throwable;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cache::get('cart_' . auth()->id());

        // Jika tidak ada di cache, inisialisasi data cart
        if (!$carts) {
            $carts = [];
        }
        return view('pages.user.cart.index', compact('carts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
        ]);

        $product_id = request('product_id');
        $product = Product::find($product_id);

        $carts = Cache::get('cart_' . auth()->id());
        if (!$carts) {
            $carts = [];
        }

        $quantity = request('quantity') ?? @$carts[$product_id]['quantity'] + 1;

        if (!($this->checkStock($product, $quantity))) {
            return response()->json([
                "status" => "failed",
                "message" => "Stock Tidak Cukup",
            ]);
        }

        if (isset($carts[$product_id])) {
            $carts[$product_id] = [...$product->toArray(), "quantity" => $quantity];
        } else {
            $carts[$product_id] = [...$product->toArray(), "quantity" => $quantity];
        }
        Cache::forever('cart_' . auth()->id(), $carts);
        return response()->json([
            "status" => "success",
            "message" => "Berhasil ditambahkan",
        ]);
    }

    public function checkout()
    {
        $carts = Cache::get('cart_' . auth()->id());
        if (!$carts) {
            return redirect()->back()->banner("You haven't cart to purchase");
        }
        $transaksi = Transaksi::create([
            'user_id' => auth()->id(),
            'total' => $this->getTotal($carts),
            'status' => 'pending'
        ]);

        foreach ($carts as $cart) {
            TransaksiDetail::create([
                'transaksi_id' => $transaksi->id,
                'product_id' => $cart['id'],
                'quantity' => $cart['quantity'],
                'price' => $cart['price'],
                'sub_total' => $cart['price'] * $cart['quantity'],
            ]);

            $product = Product::find($cart['id']);
            $stock = $product->stock - $cart['quantity'];

            if ($product) {
                $product->update([
                    'stock' => $stock,
                    'isActive' => $stock > 0 ? 1 : 0,
                ]);
            }
        }

        try{
            $midtrans = new Midtrans();
            $snap = $midtrans->createSnapTransaction($transaksi);
            Cache::forget('cart_' . auth()->id());

            return redirect()->away($snap->redirect_url);
        }catch(Throwable $e){
            dd();
        }
    }

    public function webHookMidtrans()
    {
        // $payload = $request->getContent();
        $midtrans = new Midtrans();
        $notif = $midtrans->notification();

        try {
            $transaction = $notif->transaction_status;
            $order_id = $notif->order_id;

            $order_id = explode('_', $order_id);
            $order_id = $order_id[1];

            $transaksi = Transaksi::find($order_id);

            if ($transaction == 'settlement') {
                $transaksi->update(['status' => 'settlement']);
            } else if ($transaction == 'expired') {
                $transaksi->update(['status' => $transaction]);
            } else if ($transaction == 'cancel') {
                $transaksi->update(['status' => $transaction]);
            }
        } catch (Throwable $th) {
            echo "error";
        }
        // finally {
        //     return response()->json(['message' => 'Webhook received']);
        // }
    }

    public function checkStock($product, $qty)
    {
        if ($product->stock >= $qty) {
            return true;
        } else {
            return false;
        }
    }

    public function getTotal($carts)
    {
        $total = 0;
        foreach ($carts as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }

    public function destroy(Request $request){
        $request->validate([
            'product_id' => 'required',
        ]);

        $carts = Cache::get('cart_' . auth()->id());

        if($carts[$request->product_id]){
            unset($carts[$request->product_id]);
        }

        Cache::forever('cart_' . auth()->id(), $carts);
        return response()->json([
            "status" => "success",
            "message" => "Cart item successfully deleted",
        ]);
    }
}

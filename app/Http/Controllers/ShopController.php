<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request){
        $products = Product::where('isActive', 1);
        if($request->search){
            $products = $products->where('name', 'like', '%'.$request->search.'%');
        }
        $products = $products->get();
        return view('pages.user.shop.index', compact('products'));
    }
}

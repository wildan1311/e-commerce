<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $products = Product::where('isActive', 1)->whereHas('transaksiDetail', function($transaksiDetail){
        $transaksiDetail->havingRaw('COUNT(*) > 3');
    })->limit(4)->get();
    return view('welcome', compact('products'));
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::middleware('admin')->group(function(){
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::resource('products', ProductController::class);
    });

    Route::get('/shop', [ShopController::class, 'index'])->name('shop');
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::get('/invoice', [CartController::class, 'invoice'])->name('invoice');
    Route::post('/cart/add', [CartController::class, 'store'])->name('cart.add');
    Route::post('/cart/destroy', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
});

Route::post('/callback', [CartController::class, 'webHookMidtrans'])->name('callback');

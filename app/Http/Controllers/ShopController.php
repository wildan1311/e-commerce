<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(){
        $products = Product::all()->where('isActive', 1);
        return view('pages.user.shop.index', compact('products'));
    }
}

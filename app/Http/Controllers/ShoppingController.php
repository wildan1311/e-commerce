<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShoppingController extends Controller
{
    public function index(){
        return view('pages.user.cart.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Livewire\Livewire;
use Throwable;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('pages.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $request->validated();

        $path = @$request->file('image')?->store('product_images', 'public');

        try{
            $product = Product::create([
                'name' => $request->name,
                'price' => $request->price,
                'stock' => $request->stock,
                'isActive' => $request->isActive,
                'image' => @$path,
            ]);
            return redirect()->route('products.index')->banner('Products successfully added');
        }catch(Throwable $e){
            return redirect()->route('products.index')->banner('Server error');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('pages.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $request->validated();

        if($request->file('image')){
            $path = $request->file('image')?->store('product_images', 'public');
        }

        try{
            $product->update([
                'name' => $request->name,
                'price' => $request->price,
                'stock' => $request->stock,
                'isActive' => $request->isActive,
                'image' => @$path ??  $product->image,
            ]);
            $request->session()->flash('flash.banner', 'Product successfully updated');
            $request->session()->flash('flash.bannerStyle', 'success');
            return redirect()->route('products.index');
        }catch(Throwable $e){
            $request->session()->flash('flash.banner', 'Server Error');
            $request->session()->flash('flash.bannerStyle', 'danger');
            return redirect()->route('products.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->banner('Products Successfully Deleted');
    }
}

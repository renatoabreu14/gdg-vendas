<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price_buy' => 'required',
            'price_sell' => 'required',
            'stock' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($request->hasFile('image')){
            $file = $request->image;
            $fileName = time().'_'.$file->extension();;
            $request->image->storeAs('public', $fileName);
        }

        Product::create(
            [
                'name' => $request->name,
                'description' => $request->description,
                'price_buy' => $request->price_buy,
                'price_sell' => $request->price_sell,
                'stock' => $request->stock,
                'image' => $fileName ?? 'default.jpg',
            ]
        );

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price_buy' => 'required',
            'price_sell' => 'required',
            'stock' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($request->hasFile('image')){
            $file = $request->image;
            $fileName = time().'_'.$file->extension();
            $request->image->storeAs('public', $fileName);
        }

        $product->update(
            [
                'name' => $request->name,
                'description' => $request->description,
                'price_buy' => $request->price_buy,
                'price_sell' => $request->price_sell,
                'stock' => $request->stock,
                'image' => $fileName ?? $product->image,
            ]
        );

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}

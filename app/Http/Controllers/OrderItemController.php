<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'order_id' => 'required',
            'product_id' => 'required',
            'quantity' => 'required|numeric|min:1',
        ],[
            'quantity.required' => 'o campo quantidade é obrigatório',
            'quantity.numeric' => 'o campo quantidade deve ser um número',
            'quantity.min' => 'o campo quantidade deve ser maior que 0',
        ]);

        $quantity = $request->quantity;
        $order = Order::findOrFail($request->input('order_id'));
        $product = Product::findOrFail($request->input('product_id'));
        if($product->stock < $quantity){
            return redirect()->route('orders.show', $order)->withErrors( 'Quantidade indisponível em estoque');
        }
        $product->stock -= $quantity;
        $product->update();
        $order->items()->attach($product->id, ['quantity' => $request->input('quantity'), 'price_sell' => $product->price_sell, 'price_buy' => $product->price_buy]);
        return redirect()->route('orders.show', $order);
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderItem $orderItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrderItem $orderItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OrderItem $orderItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($orderItemId)
    {
        $orderItem = OrderItem::findOrFail($orderItemId);
        $order = Order::findOrFail($orderItem->order_id);

        $product = Product::findOrFail($orderItem->product_id);
        $product->stock += $orderItem->quantity;
        $product->save();

        $order->items()->detach($orderItem->product_id);
        return redirect()->route('orders.show', $order);
    }
}

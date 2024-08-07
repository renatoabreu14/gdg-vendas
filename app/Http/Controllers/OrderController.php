<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderPayment;
use App\Models\OrderStatus;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::all();
        $users = User::all();
        $orderstatuses = OrderStatus::all();
        $orderpayments = OrderPayment::all();
        return view('orders.create', compact('customers', 'users', 'orderstatuses', 'orderpayments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required',
            'user_id' => 'required',
            'order_status_id' => 'required',
            'order_payment_id' => 'required',
            'order_date' => 'required|date|date_format:Y-m-d',
        ],[
            'order_date.required' => 'o campo data é obrigatório',
        ]);

        $order = Order::create($request->all());
        return redirect()->route('orders.show', compact('order'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $products = Product::all();
        return view('orders.show', compact('order', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        $customers = Customer::all();
        $users = User::all();
        $orderstatuses = OrderStatus::all();
        $orderpayments = OrderPayment::all();
        return view('orders.edit', compact('order', 'customers', 'users', 'orderstatuses', 'orderpayments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $order->update($request->all());
        return redirect()->route('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        foreach ($order->items as $item) {
            $product = Product::findOrFail($item->pivot->product_id);
            $product->stock += $item->pivot->quantity;
            $product->save();
        }
        $order->delete();
        return redirect()->route('orders.index');
    }
}

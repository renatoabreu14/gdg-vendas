<?php

namespace App\Http\Controllers;

use App\Models\OrderPayment;
use Illuminate\Http\Request;

class OrderPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orderPayments = OrderPayment::all();
        return view('orders.payments.index', compact('orderPayments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('orders.payments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        OrderPayment::create($request->all());
        return redirect()->route('orderpayments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderPayment $orderPayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($orderPaymentId)
    {
        $orderPayment = OrderPayment::findOrFail($orderPaymentId);
        return view('orders.payments.edit', compact('orderPayment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $orderPaymentId)
    {
        $orderPayment = OrderPayment::findOrFail($orderPaymentId);
        $orderPayment->update($request->all());
        return redirect()->route('orderpayments.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($orderPaymentId)
    {
        $orderPayment = OrderPayment::findOrFail($orderPaymentId);
        $orderPayment->delete();
        return redirect()->route('orderpayments.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\OrderStatus;
use Illuminate\Http\Request;

class OrderStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orderStatuses = OrderStatus::all();
        return view('orders.statuses.index', compact('orderStatuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('orders.statuses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        OrderStatus::create($request->all());
        return redirect()->route('orderstatuses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderStatus $orderStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($orderStatusId)
    {
        $orderStatus = OrderStatus::findOrFail($orderStatusId);
        return view('orders.statuses.edit', compact('orderStatus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $orderStatusId)
    {
        $orderStatus = OrderStatus::findOrFail($orderStatusId);
        $orderStatus->update($request->all());
        return redirect()->route('orderstatuses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($orderStatusId)
    {
        $orderStatus = OrderStatus::findOrFail($orderStatusId);
        $orderStatus->delete();
        return redirect()->route('orderstatuses.index');
    }
}

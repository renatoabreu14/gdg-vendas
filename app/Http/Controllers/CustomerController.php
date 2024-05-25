<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //

    public function index(){
        $customers = Customer::all();
        return view('customer.index', compact('customers'));
    }

    public function destroy(Customer $customer){
        $customer->delete();
        return redirect()->route('customers.index');
    }

    public function create(){
        return view('customer.create');
    }

    public function store(Request $request){
        Customer::create($request->all());
        return redirect()->route('customers.index');
    }

    public function edit(Customer $customer){
        return view('customer.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer){
        $customer->update($request->all());
        return redirect()->route('customers.index');
    }

    public function show(Customer $customer){
        return view('customer.show', compact('customer'));
    }
}

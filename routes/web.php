<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*Route::get('/teste/{name?}', [\App\Http\Controllers\TestController::class, 'test']);
Route::get('/soma/{v1}/{v2}', [\App\Http\Controllers\TestController::class, 'soma']);*/

Route::get('customers', [App\Http\Controllers\CustomerController::class, 'index'])->name('customers.index');
Route::delete('customers/{customer}', [App\Http\Controllers\CustomerController::class, 'destroy'])->name('customers.destroy');
Route::get('customers/create', [App\Http\Controllers\CustomerController::class, 'create'])->name('customers.create');
Route::post('customers', [App\Http\Controllers\CustomerController::class, 'store'])->name('customers.store');
Route::get('customers/{customer}/edit', [App\Http\Controllers\CustomerController::class, 'edit'])->name('customers.edit');
Route::put('customers/{customer}', [App\Http\Controllers\CustomerController::class, 'update'])->name('customers.update');
Route::get('customers/{customer}', [App\Http\Controllers\CustomerController::class, 'show'])->name('customers.show');

Route::resource('addresses', App\Http\Controllers\AddressController::class)->except('create, show, index');
Route::get('addresses/{customer}/create', [App\Http\Controllers\AddressController::class, 'create'])->name('addresses.create');

Route::resource('products', App\Http\Controllers\ProductController::class);
Route::resource('orders', App\Http\Controllers\OrderController::class);
Route::resource('orderitems', App\Http\Controllers\OrderItemController::class)->only('store', 'destroy');

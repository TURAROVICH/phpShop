<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AddProductController,ProductsController,UserActionsController};


Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/main', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function () {

Route::get('/add', function () {
    return view('add');
});

Route::post('/main', [AddProductController::class, 'search']);

Route::post('/add/product/', [AddProductController::class, 'check'])->name('checkAddProduct');
Route::get('/products', [ProductsController::class, 'all'])->name('products');
Route::get('/product/{id}/', [ProductsController::class, 'one']);
Route::get('/product/{id}/add', [ProductsController::class, 'add']);
Route::get('/product/{id}/basket', [ProductsController::class, 'AddtoBasket']);
Route::get('/product/{id}/delete', [ProductsController::class, 'DeletetoBasket']);


Route::post('/delete/{id}',[UserActionsController::class, 'delete']);
Route::get('/home/{name}',[UserActionsController::class, 'useraction'])->name('userHome');
});
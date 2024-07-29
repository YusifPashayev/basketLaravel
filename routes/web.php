<?php

use App\Http\Controllers\BasketController;
use Illuminate\Support\Facades\Route;


Route::get('/basket/add/{id}', [BasketController::class, 'add'])->name('basket.add');
Route::get('/basket/update/{id}/{count}', [BasketController::class, 'update'])->name('basket.update');
Route::get('/basket/get/{id}', [BasketController::class, 'get'])->name('basket.get');
Route::get('/basket/getall', [BasketController::class, 'getAll'])->name('basket.getall');
Route::get('/basket/destroy', [BasketController::class, 'destroy'])->name('Basket.destroy');
Route::get('/basket/delete/{id}', [BasketController::class, 'delete'])->name('Basket.delete');
Route::get('/basket/count', [BasketController::class, 'count'])->name('Basket.count');
Route::get('/basket/tax', [BasketController::class, 'tax'])->name('Basket.tax');
Route::get('/basket/settax/{tax}', [BasketController::class, 'setTax'])->name('Basket.settax');
Route::get('/basket/total', [BasketController::class, 'total'])->name('Basket.total');
Route::get('/basket/subtotal', [BasketController::class, 'subtotal'])->name('Basket.subtotal');

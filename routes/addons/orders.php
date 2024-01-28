<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::resource('orders' , OrderController::class);
Route::post('deactivate/{order}' , [OrderController::class , 'deActivate'])->name('orders.deactivate');

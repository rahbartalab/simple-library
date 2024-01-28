<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::post('store' , [OrderController::class , 'store'])->name('orders.store');

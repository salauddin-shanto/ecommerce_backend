<?php

use App\Http\Controllers\Admin\OrderManagement\ManagerController;
use App\Http\Controllers\Admin\OrderManagement\SupplierController;
use Illuminate\Support\Facades\Route;

//Managers Routes
Route::get('/orders/{status}',[ManagerController::class,'ordersList'])->name('orders');
Route::get('/pending-order-details/{order_id}',[ManagerController::class,'details'])->name('pending-order-details');
Route::post('/pending-approve/{order_id}',[ManagerController::class,'approve'])->name('pending-approve');
Route::get('/pending-cancel/{order_id}',[ManagerController::class,'cancel'])->name('pending-cancel');

//Suppliers Routes
Route::get('/supply/{status}',[SupplierController::class,'ordersList'])->name('supply');
Route::get('/supply-order-details/{order_id}',[SupplierController::class,'details'])->name('supply-order-details');
Route::get('/receive-order/{order_id}',[SupplierController::class,'receive'])->name('receive-order');
Route::get('/deny-order/{order_id}',[SupplierController::class,'deny'])->name('deny-order');



?>
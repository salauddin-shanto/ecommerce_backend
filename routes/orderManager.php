<?php

use App\Http\Controllers\Admin\OrderManagement\CourierController;
use App\Http\Controllers\Admin\OrderManagement\ManagerController;
use App\Http\Controllers\Admin\OrderManagement\SupplierController;
use App\Http\Controllers\Admin\OrderManagement\VendorBalanceController;
use Illuminate\Support\Facades\Route;

//Managers Routes
Route::get('/orders/{status}',[ManagerController::class,'ordersList'])->name('orders');
Route::get('/pending-order-details/{order_id}',[ManagerController::class,'details'])->name('pending-order-details');
Route::post('/pending-approve/{order_id}',[ManagerController::class,'approve'])->name('pending-approve');
Route::get('/pending-cancel/{order_id}',[ManagerController::class,'cancel'])->name('pending-cancel');
Route::get('/get-suppliers/{aria_id}',[ManagerController::class,'getSuppliers'])->name('get-suppliers');
Route::post('/search-orders/{status}',[ManagerController::class,'search'])->name('search-orders');

//Suppliers Routes
Route::get('/supply/{status}',[SupplierController::class,'ordersList'])->name('supply');
Route::get('/supply-order-details/{order_id}',[SupplierController::class,'details'])->name('supply-order-details');
Route::get('/receive-order/{order_id}',[SupplierController::class,'receive'])->name('receive-order');
Route::get('/deny-order/{order_id}',[SupplierController::class,'deny'])->name('deny-order');
Route::post('/search-supply/{status}',[SupplierController::class,'search'])->name('search-supply');
Route::get('/get-operators/{aria_id}',[SupplierController::class,'getOperators'])->name('get-operators');
Route::post('/assign-operator/{order_id}',[SupplierController::class,'assignOperator'])->name('assign-operator');

//Courier Operator routes
Route::get('/parcel/{status}',[CourierController::class,'percelList'])->name('parcel');
Route::get('receive-parcel/{order_id}',[CourierController::class,'receiveParcel'])->name('receive-parcel');
Route::get('parcel-sent-to-courier/{order_id}',[CourierController::class,'sentToCourier'])->name('parcel-sent-to-courier');
Route::get('parcel-delivered-to-customer/{order_id}',[CourierController::class,'deliveredToCustomer'])->name('parcel-delivered-to-customer');
Route::get('parcel-returned/{order_id}',[CourierController::class,'returnedParcel'])->name('parcel-returned');

//Operator Deposits
Route::get('operator-deposits',[VendorBalanceController::class,'index'])->name('operator-deposits');
Route::post('search-operators',[VendorBalanceController::class,'search'])->name('search-operators');
Route::get('clear-deposit/{vendor_balance_id}',[VendorBalanceController::class,'clearDeposit'])->name('clear-deposit');


?>
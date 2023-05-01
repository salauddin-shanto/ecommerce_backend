<?php

use App\Http\Controllers\AriaController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnitController;
use App\Models\Units;


/* Route::get('/dashboard', function () {
    return view('admin/dashboard'); //return view('admin.dashboard);
});
Route::get('/dashboard2', function () {
    return view('admin/dashboard2'); //return view('admin.dashboard);
});
  Route::get('/', function () {
    return view('admin/dashboard'); //return view('admin.dashboard);
});
Route::get('/index', function () {
    return view('user/index'); //return view('admin.dashboard);
});
Route::get('/admin-manager', function () {
    return view('admin/adminManager'); //return view('admin.dashboard);
}); */

/* Routes for unit-settings */
Route::get('/unit-settings',[UnitController::class,'show'])->name('unit-settings');
Route::post('/unit-settings',[UnitController::class,'store'])->name('unit-settings');
Route::get('/unit-settings/edit/{unit_id}',[UnitController::class,'edit'])->name('unit-settings.edit');
Route::get('/unit-settings/delete/{unit_id}',[UnitController::class,'delete'])->name('unit-settings.delete');
Route::post('/unit-update/{unit_id}',[UnitController::class,'update'])->name('unit-update');
Route::post('/unit-settings/filter',[UnitController::class,'filter'])->name('unit-settings.filter');

/* Routes for area-settings */ 
Route::get('/aria-settings',[AriaController::class,'show'])->name('aria-settings');
Route::post('/aria-settings',[AriaController::class,'store'])->name('aria-settings');
Route::get('/aria-settings/delete/{aria_id}',[AriaController::class,'delete'])->name('aria-settings.delete');
Route::get('/aria-settings/edit/{aria_id}',[AriaController::class,'edit'])->name('aria-settings.edit');
Route::post('/aria-settings/update/{aria_id}',[AriaController::class,'update'])->name('aria-settings.update');
Route::post('/aria-settings/filter',[AriaController::class,'filter'])->name('aria-settings.filter');

/*Routes for supplier settings */
Route::get('/supplier-settings',[SupplierController::class,'show'])->name('supplier-settings');
Route::get('/add-supplier',[SupplierController::class,'create'])->name('add-supplier');
Route::post('/add-supplier',[SupplierController::class,'store'])->name('add-supplier');
Route::get('/supplier-settings/details/{id}',[SupplierController::class,'details'])->name('supplier-settings.details');

?> 
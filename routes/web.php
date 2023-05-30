<?php

use App\Http\Controllers\AriaController;
use App\Http\Controllers\CourierController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnitController;
use App\Models\Units;

/* Routes for unit-settings */ 
Route::get('/unit-settings',[UnitController::class,'show'])->name('unit-settings');
Route::post('/unit-settings',[UnitController::class,'store'])->name('unit-settings');
Route::get('/unit-settings/edit/{unit_id}',[UnitController::class,'edit'])->name('unit-settings.edit');
Route::get('/unit-settings/delete/{unit_id}',[UnitController::class,'delete'])->name('unit-settings.delete');
Route::post('/unit-update/{unit_id}',[UnitController::class,'update'])->name('unit-update');
Route::post('/unit-settings/filter',[UnitController::class,'filter'])->name('unit-settings.filter');

/* Routes for area-settings */ 
Route::get('/add-area',[AriaController::class,'addArea'])->name('add-area');
Route::post('/add-area',[AriaController::class,'storeArea'])->name('add-area');
Route::get('/show-areas',[AriaController::class,'showAreas'])->name('show-areas');
Route::get('/area-delete/{aria_id}',[AriaController::class,'delete'])->name('area-delete');
Route::get('/area-edit/{aria_id}',[AriaController::class,'edit'])->name('area-edit');
Route::post('/area-update/{aria_id}',[AriaController::class,'update'])->name('area-update');
Route::post('/show-areas/filter',[AriaController::class,'filter'])->name('show-areas.filter');

/*Routes for supplier settings */
Route::get('/show-suppliers',[SupplierController::class,'show'])->name('show-suppliers');
Route::get('/add-supplier',[SupplierController::class,'create'])->name('add-supplier');
Route::post('/add-supplier',[SupplierController::class,'store'])->name('add-supplier');
Route::get('/supplier-settings/details/{id}',[SupplierController::class,'details'])->name('supplier-settings.details');

/* Routes for courier settings */
Route::get('/add-operator',[CourierController::class,'add'])->name('add-operator');
Route::post('/add-operator',[CourierController::class,'store'])->name('add-operator');
Route::get('/show-operators',[CourierController::class,'show'])->name('show-operators');
Route::get('/operator-details/{id}',[CourierController::class,'details'])->name('operator-details');
Route::get('/operator-delete/{id}',[CourierController::class,'delete'])->name('operator-delete');
Route::get('/operator-edit/{id}',[CourierController::class,'edit'])->name('operator-edit');
Route::post('/operator-update/{id}',[CourierController::class,'update'])->name('operator-update');
Route::post('/search-operator',[CourierController::class,'search'])->name('search-operator');

/* Routes for Category settings */
Route::get('/add-category',[CategoryController::class,'add'])->name('add-category');
Route::post('/add-category',[CategoryController::class,'store'])->name('add-category');
Route::get('/show-categories',[CategoryController::class,'show'])->name('show-categories');
Route::get('/category-delete/{id}',[CategoryController::class,'delete'])->name('category-delete');
Route::get('/category-edit/{id}',[CategoryController::class,'edit'])->name('category-edit');
Route::post('/category-update/{id}',[CategoryController::class,'update'])->name('category-update');
Route::post('/search-category',[CategoryController::class,'search'])->name('search-category');

/* Routes for product settings */
Route::get('/add-product',[productController::class,'add'])->name('add-product');
Route::post('/add-product',[productController::class,'store'])->name('add-product');
Route::get('/show-products',[productController::class,'show'])->name('show-products');
Route::get('/product-delete/{id}',[productController::class,'delete'])->name('product-delete');
Route::get('/product-edit/{id}',[productController::class,'edit'])->name('product-edit');
Route::post('/product-update/{id}',[productController::class,'update'])->name('product-update');
Route::post('/search-product',[productController::class,'search'])->name('search-product');

?>    
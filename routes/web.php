<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AriaController;
use App\Http\Controllers\CourierController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\Role\RoleController;
use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Client\ClientLoginController;
use App\Http\Controllers\Client\ClientRegistrationController;
use App\Models\Units;
use App\Http\Controllers\client\ClientController;
use App\Http\Controllers\Frontend\Cart\CartController;
use App\Http\Controllers\Frontend\Home\homePageController;
use App\Http\Controllers\Order\OrderController;

Route::group(['middleware' => ['can:unit add']], function () {
    /* Routes for unit-settings */ 
    Route::get('/unit-settings',[UnitController::class,'show'])->name('unit-settings');
    Route::post('/unit-settings',[UnitController::class,'store'])->name('unit-settings');
    Route::get('/unit-settings/edit/{unit_id}',[UnitController::class,'edit'])->name('unit-settings.edit');
    Route::get('/unit-settings/delete/{unit_id}',[UnitController::class,'delete'])->name('unit-settings.delete');
    Route::post('/unit-update/{unit_id}',[UnitController::class,'update'])->name('unit-update');
    Route::post('/unit-settings/filter',[UnitController::class,'filter'])->name('unit-settings.filter');

});

Route::group(['middleware' => ['can:aria add']], function () {
    /* Routes for area-settings */ 
    Route::get('/add-area',[AriaController::class,'addArea'])->name('add-area');
    Route::post('/add-area',[AriaController::class,'storeArea'])->name('add-area');
    Route::get('/show-areas',[AriaController::class,'showAreas'])->name('show-areas');
    Route::post('/show-areas/filter',[AriaController::class,'filter'])->name('show-areas.filter');
    Route::get('/area-edit/{aria_id}',[AriaController::class,'edit'])->name('area-edit');
    Route::post('/area-update/{aria_id}',[AriaController::class,'update'])->name('area-update');
    Route::get('/area-delete/{aria_id}',[AriaController::class,'delete'])->name('area-delete');

});

/* 
Route::group(['middleware' => ['can:supplier add']], function () {
    //Routes for supplier settings 
    Route::get('/show-suppliers',[SupplierController::class,'show'])->name('show-suppliers');
    Route::get('/add-supplier',[SupplierController::class,'create'])->name('add-supplier');
    Route::post('/add-supplier',[SupplierController::class,'store'])->name('add-supplier');
    Route::get('/supplier-settings/details/{id}',[SupplierController::class,'details'])->name('supplier-settings.details');

});

Route::group(['middleware' => ['can:courier add']], function () {
    // Routes for courier settings 
    Route::get('/add-operator',[CourierController::class,'add'])->name('add-operator');
    Route::post('/add-operator',[CourierController::class,'store'])->name('add-operator');
    Route::get('/show-operators',[CourierController::class,'show'])->name('show-operators');
    Route::get('/operator-details/{id}',[CourierController::class,'details'])->name('operator-details');
    Route::get('/operator-delete/{id}',[CourierController::class,'delete'])->name('operator-delete');
    Route::get('/operator-edit/{id}',[CourierController::class,'edit'])->name('operator-edit');
    Route::post('/operator-update/{id}',[CourierController::class,'update'])->name('operator-update');
    Route::post('/search-operator',[CourierController::class,'search'])->name('search-operator');

});
 */

Route::group(['middleware' => ['can:product add']], function () {
    /* Routes for product settings */
    Route::get('/add-product',[productController::class,'add'])->name('add-product');
    Route::post('/add-product',[productController::class,'store'])->name('add-product');
    Route::get('/show-products',[productController::class,'show'])->name('show-products');
    Route::get('/product-delete/{id}',[productController::class,'delete'])->name('product-delete');
    Route::get('/product-edit/{id}',[productController::class,'edit'])->name('product-edit');
    Route::post('/product-update/{id}',[productController::class,'update'])->name('product-update');
    Route::post('/search-product',[productController::class,'search'])->name('search-product');


    });


Route::group(['middleware' => ['can:category add']], function () {
    /* Routes for Category settings */
    Route::get('/add-category',[CategoryController::class,'add'])->name('add-category');
    Route::post('/add-category',[CategoryController::class,'store'])->name('add-category');
    Route::get('/show-categories',[CategoryController::class,'show'])->name('show-categories');
    Route::get('/category-delete/{id}',[CategoryController::class,'delete'])->name('category-delete');
    Route::get('/category-edit/{id}',[CategoryController::class,'edit'])->name('category-edit');
    Route::post('/category-update/{id}',[CategoryController::class,'update'])->name('category-update');
    Route::post('/search-category',[CategoryController::class,'search'])->name('search-category');

});


Route::group(['middleware' => ['can:role add']], function () {
    /* Routes for Roles */
    Route::get('/add-role',[RoleController::class,'add'])->name('add-role');
    Route::post('/add-role',[RoleController::class,'store']);
    Route::get('/show-roles',[RoleController::class,'show'])->name('show-roles');
    Route::get('/search-role',[RoleController::class,'search'])->name('search-role');
    Route::delete('/delete-role/{role}', [RoleController::class, 'destroy'])->name('delete-role');
    Route::get('/edit-role/{id}', [RoleController::class, 'edit'])->name('edit-role');
    Route::post('/update-role/{id}', [RoleController::class, 'update'])->name('update-role');

});

Route::group(['middleware' => ['can:admin add']], function () {/* Routes for Admins settings */
    Route::get('/add-admin',[UserController::class,'add'])->name('add-admin');
    Route::post('/add-admin',[UserController::class,'store'])->name('add-admin');
    Route::get('/show-admins',[UserController::class,'show'])->name('show-admins');
    Route::post('/search-admin',[UserController::class,'search'])->name('search-admin');
    Route::get('/edit-admin/{id}',[UserController::class,'edit'])->name('edit-admin');
    Route::post('/update-admin/{id}',[UserController::class,'update'])->name('update-admin');
    Route::get('/delete-admin/{id}',[UserController::class,'delete'])->name('delete-admin');
    Route::get('/details-admin/{id}',[UserController::class,'details'])->name('details-admin');
        
}); 
  

    // Routes accessible to all
    Route::get('/admin-login',[AdminLoginController::class,'index'])->name('admin-login');
    Route::post('/admin-login',[AdminLoginController::class,'login'])->name('admin-login');
    Route::get('/admin-profile',[AdminLoginController::class,'profile'])->name('admin-profile');
    Route::get('/admin-logout',[AdminLoginController::class,'logout'])->name('admin-logout');
    Route::post('/admin-password-reset/{id}',[AdminLoginController::class,'passwordReset'])->name('admin-password-reset');


    // Routes for Client Management
    Route::get('/all-clients',[ClientController::class,'show'])->name('all-clients');             
    Route::post('/search-client',[ClientController::class,'search'])->name('search-client');             
    Route::get('/suspend-client/{id}',[ClientController::class,'suspend'])->name('suspend-client');             

    Route::get('/suspended-clients',[ClientController::class,'showSuspended'])->name('suspended-clients');             
    Route::post('/search-suspended-client',[ClientController::class,'searchSuspended'])->name('search-suspended-client');             
    Route::get('/restore-client/{id}',[ClientController::class,'restore'])->name('restore-client');             

    //require __DIR__.'/client.php';
    //Client Login management
    Route::get('/login',[ClientLoginController::class,'loginForm'])->name('login');
    Route::get('/logout',[ClientLoginController::class,'logout'])->name('logout');
    Route::get('/login/google',[ClientLoginController::class,'redirectToGoogle'])->name('login/google');
    Route::get('/login/google/callback',[ClientLoginController::class,'handleGoogleCallback'])->name('login/google/callback');

    Route::get('/my-zone/profile',[ClientLoginController::class,'profile'])->name('profile');
    Route::post('/edit-client',[ClientLoginController::class,'edit'])->name('edit-client');


    require __DIR__.'/orderManager.php';


    require __DIR__.'/frontend.php';


?>    
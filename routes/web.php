<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/',[FrontendController::class, 'index']);
Route::get('/product-details',[FrontendController::class, 'productDetails']);
Route::get('/shop',[FrontendController::class, 'shopProducts']);
Route::get('/privacy-policy',[FrontendController::class, 'privacyPolicy']);
Route::get('/terms-conditions',[FrontendController::class, 'termsConditions']);
Route::get('/refund-policy',[FrontendController::class, 'refundPolicy']);
Route::get('/payment-policy',[FrontendController::class, 'paymentPolicy']);
Route::get('/about-us',[FrontendController::class, 'aboutUs']);
Route::get('/contact-us',[FrontendController::class, 'contactUs']);
Route::get('/view-cart',[FrontendController::class, 'viewCart']);
Route::get('/checkout',[FrontendController::class, 'checkOut']);
Route::get('/thankyou',[FrontendController::class, 'orderConfirmation']);
Route::get('/category-product',[FrontendController::class, 'categoryProduct']);
Route::get('/sub-category-product',[FrontendController::class, 'subCategoryProduct']);
Route::get('/type-products',[FrontendController::class, 'typeProducts']);

//Login Routes....
Route::get('/admin/login', [LoginController::class, 'adminLogin']);
Route::post('/admin/login/auth', [LoginController::class, 'adminLoginAuth']);

Route::get('/employee/login',[LoginController::class,'employeeLogin']);
Route::post('/employee/login/auth' ,[LoginController::class,'employeeLoginAuth']);

Route::get('/customer/login',[LoginController::class,'customerLogin']);
Route::post('/customer/login/auth', [LoginController::class,'customerLoginAuth']);

Auth::routes(['login' => false, 'register' => false]);

Route::middleware(['role:admin'])->group(function(){
    Route::get('/admin/dashboard',[AdminController::class, 'dashboard']);
    Route::get('/admin/logout', [AdminController::class, 'adminLogout']);

    //Category Routes
Route::get('/manage/category-create',[CategoryController::class, 'create']);
Route::post('/manage/category-store', [CategoryController::class, 'store']);

});

Route::middleware(['role:employee'])->group(function(){
    Route::get('/employee/dashboard',[EmployeeController::class, 'dashboard']);
    Route::get('/employee/logout', [EmployeeController::class, 'employeeLogout']);
});

Route::middleware(['role:customer'])->group(function(){
    Route::get('/customer/dashboard',[CustomerController::class, 'dashboard']);
    Route::get('/customer/logout', [CustomerController::class, 'customerLogout']);
});

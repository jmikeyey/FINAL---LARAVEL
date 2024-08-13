<?php

use App\Http\Controllers\InchargeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\FunctionController;

// ! for tricky users
Route::get('/badrequest', [MainController::class, 'badRequest'])->name('main.badrequest');  
Route::get('/admin/badrequest', [MainController::class, 'adminbadRequest'])->name('admin.badrequest'); 
Route::get('/cookies', function () {
    $cookies = request()->cookies->all();
    // Alternatively, if you want to retrieve cookies using Laravel's Cookie facade:
    // $cookies = Cookie::get();
    return response()->json(['cookies' => $cookies]);
});
Route::get('/clear', function () {
    // Clear other cookies by setting them to null
    Cookie::queue(Cookie::forget('usertype'));
    // Add other cookie names as needed
    return view('login');
});
Route::get('/login', [MainController::class, 'login'])->name('main.login');
Route::get('/about', [MainController::class, 'about'])->name('main.about');
Route::get('/contact', [MainController::class, 'contact'])->name('main.contact');
Route::get('/faq', [MainController::class, 'faq'])->name('main.faq');
Route::get('/', [MainController::class, 'index'])->name('main.index');
Route::get('/product-details', [MainController::class, 'product_details'])->name('main.product_details');
Route::get('/product-grids', [MainController::class, 'product_grids'])->name('main.product_grids');
Route::get('/register', [MainController::class, 'register'])->name('main.register');
Route::get('/shopgrids', [MainController::class, 'shopgrids'])->name('main.shopgrids');
Route::get('/cart', [MainController::class, 'cart'])->name('main.cart');
Route::get('/checkout', [MainController::class, 'checkout'])->name('main.checkout');
Route::get('/profile-add', [MainController::class, 'profile_add'])->name('main.profile_add');
Route::get('/profile-change', [MainController::class, 'profile_change'])->name('main.profile_change');
Route::get('/profile-purchase', [MainController::class, 'profile_purchase'])->name('main.profile_purchase');
Route::get('/profile', [MainController::class, 'profile'])->name('main.profile');
// client routes
Route::group(['middleware' => ['all']], function () {

});    
// client routes for non-loggedin users
Route::group(['middleware' => ['client']], function () {

});

Route::prefix('admin')->group(function () {
    Route::get('/mail', [MainController::class, 'mail'])->middleware('admin')->name('admin.mail');
    // Route::get('/', [AdminController::class, 'index'])->name('admin.home');
    Route::get('/login', [AdminController::class, 'login'])->name('admin.login')->middleware('adminLogin');

        Route::get('/', [AdminController::class, 'index'])->name('admin.home');

        Route::get('/product-list', [AdminController::class, 'productList'])->name('admin.product-list');
        Route::get('/product-edit', [AdminController::class, 'productEdit'])->name('admin.product-edit');
        Route::get('/product-add', [AdminController::class, 'productAdd'])->name('admin.product-add');

        Route::get('/categories-list', [AdminController::class, 'catList'])->name('admin.categories-list');
        Route::get('/categories-edit', [AdminController::class, 'catEdit'])->name('admin.categories-edit');
        Route::get('/categories-add', [AdminController::class, 'catAdd'])->name('admin.categories-add');
        
        Route::get('/order-list', [AdminController::class, 'orderList'])->name('admin.order-list');
        Route::get('/order-details', [AdminController::class, 'orderDetails'])->name('admin.order-details');
        Route::get('/order-invoice', [AdminController::class, 'orderInvoice'])->name('admin.order-invoice');

        Route::get('/customers', [AdminController::class, 'customers'])->name('admin.customers');
        Route::get('/customer-detail', [AdminController::class, 'customersDetails'])->name('admin.customers-details');

        Route::get('/incharge', [AdminController::class, 'incharge'])->name('admin.inchargeList');
        Route::get('/incharge-add', [AdminController::class, 'inchargeAdd'])->name('admin.inchargeAdd');
        Route::get('/incharge-details', [AdminController::class, 'inchargeDetails'])->name('admin.inchargeDetails');

        Route::get('/coupons-list', [AdminController::class, 'coupList'])->name('admin.coupons-list');
        Route::get('/coupon-add', [AdminController::class, 'coupAdd'])->name('admin.coupons-add');
        Route::get('/coupon-edit', [AdminController::class, 'coupEdit'])->name('admin.coupons-edit');

        Route::get('/inventory', [AdminController::class, 'inventory'])->name('admin.inventory');

        Route::get('/invoices', [AdminController::class, 'invoices'])->name('admin.invoices');
        Route::get('/todo-list', [AdminController::class, 'todo'])->name('admin.todo');

        Route::get('/store-locator', [AdminController::class, 'locator'])->name('admin.locator');
        Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');

    Route::group(['middleware' => ['admin']], function () {
    });
});
// Incharge Routes
Route::prefix('incharge')->group(function () {
    Route::get('/login', [InchargeController::class, 'login'])->name('incharge.login');

        
        Route::get('/order-list', [InchargeController::class, 'orderList'])->name('incharge.order-list');
        Route::get('/order-details', [InchargeController::class, 'orderDetails'])->name('incharge.order-details');
        Route::get('/order-invoice', [InchargeController::class, 'orderInvoice'])->name('incharge.order-invoice');


        Route::get('/coupons-list', [InchargeController::class, 'coupList'])->name('incharge.coupons-list');
        Route::get('/coupon-add', [InchargeController::class, 'coupAdd'])->name('incharge.coupons-add');
        Route::get('/coupon-edit', [InchargeController::class, 'coupEdit'])->name('incharge.coupons-edit');

        Route::get('/inventory', [InchargeController::class, 'inventory'])->name('incharge.inventory');

        Route::get('/invoices', [InchargeController::class, 'invoices'])->name('incharge.invoices');
        Route::get('/todo-list', [InchargeController::class, 'todo'])->name('incharge.todo');

        Route::get('/profile', [InchargeController::class, 'profile'])->name('incharge.profile');

    Route::group(['middleware' => ['incharge']], function () {
    });
});

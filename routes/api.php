<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FunctionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// USER
Route::get('/login/get_user', [UserController::class, 'getUser']);
Route::get('/login/check_users', [FunctionController::class, 'checkUsers']);
Route::get('/user/user_get', [UserController::class, 'getUser']);
Route::post('/user/user_edit', [UserController::class, 'editUser']);
Route::post('/user/user_pass', [UserController::class, 'changePassUser']);
Route::post('/user/user_addCust', [UserController::class, 'addUser']);
Route::get('/logout', [UserController::class, 'logout'])->name('main.shopgrids');
Route::get('/logoutAdmin', [UserController::class, 'logout']);
// ? [address]
Route::get('/address/add_get', [UserController::class, 'getAddress']);
Route::put('/address/add_edit', [UserController::class, 'editAddress']);
Route::get('/address/add_solo', [UserController::class, 'getSoloAddress']);
Route::post('/address/add_post', [UserController::class, 'addAddress']);
Route::put('/address/add_put', [UserController::class, 'editSoloAddress']);
Route::delete('/address/add_del', [UserController::class, 'deleteAddress']);
// PRODUCT
//? [category]
Route::get('/category/cat_view', [ProductController::class, 'getCategories']);
//? [product]
Route::get('/product/prod_sort', [ProductController::class, 'prod_sort']);
Route::get('/product/prod_search', [ProductController::class, 'prod_search']);
Route::get('/product/prod_view', [ProductController::class, 'getProduct']);
Route::get('/product/prod_get', [ProductController::class, 'productDetails']);
// CART
Route::get('/cart/cart_get', [CartController::class, 'getCart']);
Route::delete('/cart/cart_del', [CartController::class, 'removeItem']);
Route::put('/cart/cart_quantity', [CartController::class, 'updateCartQuantity']);
Route::post('/cart/cart_add', [CartController::class, 'addToCart']);
// ORDERS
Route::post('/order/order_add', [OrderController::class, 'addOrder']);
Route::get('/order/order_get', [OrderController::class, 'getOrders']);
Route::put('/order/order_edit', [OrderController::class, 'editOrders']);
Route::get('/order/order_all', [OrderController::class, 'getAllOrders']);
Route::get('/order/order_details', [OrderController::class, 'detailedOrder']);
Route::put('/order/order_cancel', [OrderController::class, 'cancelOrders']);
// ? [payment]
Route::post('/payment/pay_add', [OrderController::class, 'addPayment']);
// COUPON
Route::get('/coupons/cop_use', [CouponController::class, 'checkCoupon']);



//!  ADMIN ====================
Route::get('/dashboard/OrdersByDate', [AdminDashboardController::class, 'sortByDate']);
Route::get('/order/order_get-ad', [AdminDashboardController::class, 'ordersGetAd']);

// PRODUCTS
Route::post('/product/prod_add', [ProductController::class, 'addProduct']);
Route::delete('/product/prod_del', [ProductController::class, 'deleteProduct']);
Route::get('/product/solo', [ProductController::class, 'getSoloProd']);
Route::post('/product/prod_edit', [ProductController::class, 'editProduct']);

// categories
Route::get('/categories', [ProductController::class, 'getCategoriesProd']);
Route::get('/category/search', [ProductController::class, 'searchCategories']);
Route::post('/category/add', [ProductController::class, 'addCategories']);
Route::put('/category/edit', [ProductController::class, 'editCategories']);
Route::delete('/category/delete', [ProductController::class, 'deleteCategories']);

// orders
Route::put('/order/status', [OrderController::class, 'updateStatus']);
Route::get('/order/invoice', [OrderController::class, 'getInvoice']);

// customer
Route::get('/customer/get', [CustomerController::class, 'getCustomer']);
Route::get('/customer/solo', [CustomerController::class, 'geCustomerSolo']);

// incharge
Route::get('/incharge/get', [CustomerController::class, 'getIncharge']);
Route::get('/customer/solo', [CustomerController::class, 'geCustomerSolo']);
Route::delete('/incharge/delete', [CustomerController::class, 'deleteIncharge']);
Route::get('/incharge/getsolo', [CustomerController::class, 'getInchargeSolo']);
Route::post('/incharge/update', [UserController::class, 'updateIncharge']);
// coupons
Route::get('/coupons/view', [CouponController::class, 'getAll']);
Route::get('/coupons/duplicate', [CouponController::class, 'duplicate']);
Route::post('/coupons/add', [CouponController::class, 'addCoupon']);
Route::get('/coupons', [CouponController::class, 'getSolo']);
Route::put('/coupons/update', [CouponController::class, 'update']);

// inventory
Route::get('/inventory/view', [ProductController::class, 'getInventory']);

// profile
Route::get('/admin/get', [UserController::class, 'getAdmin']);

// send mail
// Route::post('/mail/send', [OrderController::class, 'sendEmail'])->name('admin.api.mail');
Route::post('/send-email', [OrderController::class, 'sendEmail'])->name('send.email');

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }
    public function login(){
        return view('admin.auth-signin');
    }
    public function productList(){
        return view('admin.product-list');
    }
    public function productEdit(){
        return view('admin.product-edit');
    }
    public function productAdd(){
        return view('admin.product-add');
    }

    public function catList(){
        return view('admin.categories-list');
    }
    public function catEdit(){
        return view('admin.categories-edit');
    }
    public function catAdd(){
        return view('admin.categories-add');
    }

    public function orderList(){
        return view('admin.order-list');
    }
    public function orderDetails(){
        return view('admin.order-details');
    }
    public function orderInvoice(){
        return view('admin.order-invoices');
    }

    public function customers(){
        return view('admin.customers');
    }
    public function customersDetails(){
        return view('admin.customer-detail');
    }
    public function incharge(){
        return view('admin.incharge');
    }
    public function inchargeAdd(){
        return view('admin.incharge-add');
    }
    public function inchargeDetails(){
        return view('admin.incharge-detail');
    }
    public function coupList(){
        return view('admin.coupons-list');
    }

    public function coupAdd(){
        return view('admin.coupon-add');
    }
    public function coupEdit(){
        return view('admin.coupon-edit');
    }
    public function inventory(){
        return view('admin.inventory-info');
    }

    public function invoices(){
        return view('admin.invoices');
    }
    public function todo(){
        return view('admin.todo-list');
    }

    public function locator(){
        return view('admin.store-locator');
    }
    public function profile(){
        return view('admin.admin-profile');
    }

}

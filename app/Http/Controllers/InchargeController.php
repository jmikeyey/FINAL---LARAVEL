<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InchargeController extends Controller
{
    public function login(){
        return view('incharge.auth-signin');
    }
    public function orderList(){
        return view('incharge.order-list');
    }
    public function orderDetails(){
        return view('incharge.order-details');
    }
    public function orderInvoice(){
        return view('incharge.order-invoices');
    }

    public function coupList(){
        return view('incharge.coupons-list');
    }

    public function coupAdd(){
        return view('incharge.coupon-add');
    }
    public function coupEdit(){
        return view('incharge.coupon-edit');
    }
    public function inventory(){
        return view('incharge.inventory-info');
    }

    public function invoices(){
        return view('incharge.invoices');
    }
    public function todo(){
        return view('incharge.todo-list');
    }

    public function profile(){
        return view('incharge.admin-profile');
    }
}

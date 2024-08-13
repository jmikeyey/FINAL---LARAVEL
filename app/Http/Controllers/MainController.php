<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    //
    public function about(){
        return view('about');
    }
    public function cart(){
        return view('cart');
    }
    public function checkout(){
        return view('checkout');
    }
    public function contact(){
        return view('contact');
    }
    public function faq(){
        return view('faq');
    }
    public function index(){
        return view('index');
    }
    public function login(){
        return view('login');
    }
    public function product_details(){
        return view('product-details');
    }
    public function product_grids(){
        return view('product-grids');
    }
    public function profile_add(){
        return view('profile-add');
    }
    public function profile_change(){
        return view('profile-change');
    }
    public function profile_purchase(){
        return view('profile-purchase');
    }
    public function profile(){
        return view('profile');
    }
    public function register(){
        return view('register');
    }
    public function shopgrids(){
        return view('shopgrids');
    }

    public function badRequest(){
        return view('badrequest');
    }
    public function adminbadRequest(){
        return view('admin.badrequest');
    }
    public function mail(){
        return view('admin.mail');
    }
    
}

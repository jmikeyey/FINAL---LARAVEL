<?php

namespace App\Http\Controllers;

use App\Models\usersprofile;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

class FunctionController extends Controller
{
    //
    public function checkUsers(Request $request){
        $pass = $request->input('pass');
        $user = $request->input('user');

        $userProfile = usersprofile::where('username', $user)
            ->where('password', $pass)
            ->first();  

        if ($userProfile) {
            // Update active_status to 'login'
            $userProfile->active_status = 'login';
            $userProfile->save();
            
            $usertypeCookie = Cookie::make('usertype', $userProfile->usertype);

            return response()->json([
                "data" => $userProfile,
                "msg" => "success",
                "prompt" => "You have logged in successfully!"
            ])->withCookie($usertypeCookie);
        } else {
            return response()->json([
                "msg" => "Failed",
                "prompt" => "Login failed. Incorrect User/Password"
            ]);
        }
    }
}

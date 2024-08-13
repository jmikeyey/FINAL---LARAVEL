<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

class UserController extends Controller
{
    //
    public function getUser(Request $request){
        $id = $request->input('id');

        $data = DB::table('usersprofiles')
            ->select(
                'firstname', 'lastname', 'mi', 'birthdate',
                'gender', 'phonenumber', 'profile_img',
                'email', 'username', 'usertype'
            )
            ->where('user_id', $id)
            ->get();

        if ($data->isNotEmpty()) {
            return response()->json(["data" => $data, "msg" => "success"]);
        } else {
            return response()->json(["msg" => "Failed", "prompt" => "Log in Failed. Incorrect User/Password"]);
        }
    }
    public function addUser(Request $request){
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $email = $request->input('email'); // email and username
        $password = $request->input('password');
        $gender = $request->input('gender');
        $number = $request->input('number');
        $bod = $request->input('bod');
        $mi = $request->input('mi');
        $custStaff = $request->input('usertype');
        $usertype = 'customer';

        // Check if profile pic is uploaded
        if ($request->hasFile('profile_pic') && $request->file('profile_pic')->isValid()) {
            $image = $request->file('profile_pic');
            $filename = uniqid('user_img_') . '_' . $image->getClientOriginalName();
            $image->move(public_path('img-user'), $filename);
        } else {
            $filename = null;
        }

        if ($custStaff) {
            // Insert for a different usertype based on $custStaff
            $staffRegistrationSuccess = DB::table('usersprofiles')->insert([
                'firstname' => $firstname,
                'lastname' => $lastname,
                'mi' => $mi,
                'gender' => $gender,
                'birthdate' => $bod,
                'phonenumber' => $number,
                'profile_img' => $filename,
                'email' => $email,
                'username' => $email,
                'password' => $password,
                'usertype' => $custStaff, // Using the $custStaff variable as usertype
            ]);
    
            if ($staffRegistrationSuccess) {
                $response = [
                    'type' => 'success',
                    'message' => 'Registered successfully'
                ];
            }
        }else{
            try {
                $registration_success = DB::table('usersprofiles')->insert([
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'mi' => $mi,
                    'gender' => $gender,
                    'birthdate' => $bod,
                    'phonenumber' => $number,
                    'profile_img' => $filename,
                    'email' => $email,
                    'username' => $email,
                    'password' => $password,
                    'usertype' => $usertype,
                ]);

                if ($registration_success) {
                    $response = [
                        'type' => 'success',
                        'message' => 'Registered successfully'
                    ];
                } else {
                    $response = [
                        'type' => 'error',
                        'message' => 'Failed to register'
                    ];
                }
            } catch (\Exception $e) {
                $response = [
                    'type' => 'error',
                    'message' => 'Failed to register: ' . $e->getMessage()
                ];
            }
        }


        return response()->json($response);
    }
    public function updateIncharge(Request $request){
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $email = $request->input('email'); // email and username
        $password = $request->input('password');
        $gender = $request->input('gender');
        $number = $request->input('number');
        $custStaff = $request->input('usertype');
        $userId = $request->input('user_id');

        try {
            $updateSuccess = DB::table('usersprofiles')
                ->where('user_id', $userId) // Assuming 'username' is a unique identifier for the user
                ->update([
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'gender' => $gender,
                    'phonenumber' => $number,
                    'password' => $password,
                    'usertype' => $custStaff, // Using the $custStaff variable as usertype
                ]);
    
            if ($updateSuccess) {
                $response = [
                    'type' => 'success',
                    'message' => 'Incharge updated'
                ];
            } else {
                $response = [
                    'type' => 'error',
                    'message' => 'Update failed'
                ];
            }
        } catch (\Exception $e) {
            $response = [
                'type' => 'error',
                'message' => 'Update failed: ' . $e->getMessage()
            ];
        }
    
        return response()->json($response);
    }
    public function changePassUser(Request $request){
        if ($request->isMethod('post')) {
            $currentPass = $request->input('current-password');
            $newPass = $request->input('new-password');
            $id = $request->input('user-id');

            if ($currentPass !== $newPass) {
                $checkingPass = DB::table('usersprofiles')
                    ->where('password', $currentPass)
                    ->where('user_id', $id)
                    ->get();

                if ($checkingPass->isNotEmpty()) {
                    // Update the new password
                    DB::table('usersprofiles')
                        ->where('user_id', $id)
                        ->update(['password' => $newPass]);

                    return response()->json(['message' => 'Password changed', 'type' => 'success']);
                } else {
                    return response()->json(['message' => 'Incorrect current password', 'type' => 'incorrect']);
                }
            } else {
                return response()->json(["message" => "Can't use the old password", 'type' => 'samePassword']);
            }
        } else {
            return response()->json(['message' => 'Invalid method'], 405);
        }
    }
    public function editUser(Request $request){
        if ($request->isMethod('post')) {
            $file = $request->file('file');
            $fname = $request->input('fname');
            $lname = $request->input('lname');
            $mi = $request->input('mi');
            $email = $request->input('email');
            $phone = $request->input('number');
            $gender = $request->input('radio');
            $user = $request->input('user_id');
            $bod = $request->input('bod');

            if ($file) {
                $filename = uniqid('user_img_') . '_' . $file->getClientOriginalName();
                $upload_dir = public_path('img-user/');

                $file->move($upload_dir, $filename);

                $existingFilename = DB::table('usersprofiles')->where('user_id', $user)->value('profile_img');

                if ($existingFilename && file_exists($upload_dir . $existingFilename)) {
                    unlink($upload_dir . $existingFilename);
                }

                DB::table('usersprofiles')->where('user_id', $user)->update([
                    'firstname' => $fname,
                    'lastname' => $lname,
                    'mi' => $mi,
                    'gender' => $gender,
                    'birthdate' => $bod,
                    'phonenumber' => $phone,
                    'email' => $email,
                    'profile_img' => $filename
                ]);

                return response()->json(['message' => 'Update successful']);
            } else {
                DB::table('usersprofiles')->where('user_id', $user)->update([
                    'firstname' => $fname,
                    'lastname' => $lname,
                    'mi' => $mi,
                    'gender' => $gender,
                    'birthdate' => $bod,
                    'phonenumber' => $phone,
                    'email' => $email
                ]);

                return response()->json(['message' => 'Update successful']);
            }
        }

        return response()->json(['message' => 'Invalid method'], 400);
    }
    public function getAddress(Request $request){
        if ($request->isMethod('get')) {
            $id = $request->input('id');

            $deliveryInfo = DB::table('delivery_infos as a')
                ->select('a.*', 'b.firstname', 'b.lastname')
                ->join('usersprofiles as b', 'a.user_id', '=', 'b.user_id')
                ->where('a.user_id', $id)
                ->get();

            if ($deliveryInfo->isNotEmpty()) {
                return response()->json(["data" => $deliveryInfo, "msg" => "success"]);
            } else {
                return response()->json(['msg' => 'Failed']);
            }
        } else {
            return response()->json(['error' => 'Invalid method']);
        }
    }
    public function getSoloAddress(Request $request){
        if ($request->isMethod('get')) {
            $addID = $request->input('addID');
            $userID = $request->input('userID');

            $query = 'SELECT a.*, b.firstname, b.lastname FROM delivery_infos a
            INNER JOIN usersprofiles b ON a.user_id = b.user_id
            WHERE a.address_id = ? AND b.user_id = ?';

            $order_get = DB::select($query, [$addID, $userID]);

            if (!empty($order_get)) {
                return response()->json(["data" => $order_get, "msg" => "success"]);
            } else {
                return response()->json(["msg" => "failed", "message" => "No address found"]);
            }
        } else {
            return response()->json(["msg" => "failed", "message" => "Invalid method"], 400);
        }
    }
    public function addAddress(Request $request){
        if ($request->isMethod('post')) {
            $user = $request->input('user');
            $defaultValue = $request->input('defaultValue'); // default || not
            // Check if the new address should be set as default
            if ($defaultValue === 'default') {
                // Update existing default address for this user to 'not'
                DB::table('delivery_infos')
                    ->where('user_id', $user)
                    ->where('is_default', 'default')
                    ->update(['is_default' => 'not']);
            }
            // Proceed with inserting the new address
            $add = DB::table('delivery_infos')->insert([
                'barangay' => $request->input('barangay'),
                'city' => $request->input('city'),
                'is_default' => $defaultValue,
                'description' => $request->input('detailedLoc'),
                'label' => $request->input('options'),
                'phone_number' => $request->input('phone'),
                'province' => $request->input('province'),
                'region' => $request->input('region'),
                'user_id' => $user,
            ]);
            if ($add) {
                return response()->json(['message' => 'Added Successfully!', 'messageType' => 'success']);
            } else {
                return response()->json(['message' => 'Failed', 'messageType' => 'warning']);
            }
        } else {
            return response()->json(['error' => 'Invalid method'], 400);
        }
    }
    public function editSoloAddress(Request $request){
        if ($request->isMethod('put')) {
            $input_data = json_decode($request->getContent(), true);

            $add_id = $input_data['add_id'];
            $barangay = $input_data['barangay'];
            $city = $input_data['city'];
            $detailedLoc = $input_data['detailedLoc'];
            $options = $input_data['options']; // Work / Home
            $phone = $input_data['phone'];
            $province = $input_data['province'];
            $region = $input_data['region'];
            $user = $input_data['user'];

            $update = DB::table('delivery_infos')
                ->where('user_id', $user)
                ->where('address_id', $add_id)
                ->update([
                    'barangay' => $barangay,
                    'city' => $city,
                    'description' => $detailedLoc,
                    'label' => $options,
                    'phone_number' => $phone,
                    'province' => $province,
                    'region' => $region,
                ]);

            if ($update) {
                $msg = "Address updated successfully!";
                return response()->json(['message' => $msg, 'messageType' => 'success']);
            } else {
                $msg = "Failed";
                return response()->json(['message' => $msg, 'messageType' => 'warning']);
            }
        } else {
            return response()->json(['error' => 'Invalid method'], 405);
        }
    }
    public function deleteAddress(Request $request){
        if ($request->isMethod('delete')) {
            $input = json_decode($request->getContent(), true);
            $id = $input['addID'];

            $deleted = DB::table('delivery_infos')
                ->where('address_id', $id)
                ->delete();

            if ($deleted) {
                return response()->json(['message' => 'Address Successfully Deleted!', 'type' => 'success']);
            } else {
                return response()->json(['message' => 'Failed to delete!', 'type' => 'warning']);
            }
        } else {
            return response()->json(['message' => 'Invalid method'], 405);
        }
    }
    public function editAddress(Request $request){
        if ($request->isMethod('put')) {
            $requestData = $request->json()->all();

            $selectedAddressId = $requestData['selectedAddressId'];
            $id = $requestData['user'];

            // SETTING THE DEFAULT ADDRESS TO 'not'
            DB::table('delivery_infos')->where('user_id', $id)->update(['is_default' => 'not']);

            // UPDATING THE NEW ADDRESS ID
            $updated = DB::table('delivery_infos')
                ->where('user_id', $id)
                ->where('address_id', $selectedAddressId)
                ->update(['is_default' => 'default']);

            if ($updated) {
                // Retrieve the updated information
                $data = DB::table('delivery_infos as a')
                    ->select('a.*', 'b.firstname', 'b.lastname')
                    ->join('usersprofiles as b', 'a.user_id', '=', 'b.user_id')
                    ->where('a.user_id', $id)
                    ->get();

                return response()->json([
                    "message" => "Address Successfully Updated!",
                    "type" => "success",
                    'data' => $data
                ]);
            } else {
                return response()->json(["message" => "Failed to update!", "type" => "warning"]);
            }
        } else {
            return response()->json(["message" => "Invalid method", "type" => "error"]);
        }
    }

    public function logout()
    {
        $cookies = Cookie::forget('usertype'); // Remove specific cookies

        // Remove all cookies
        foreach ($_COOKIE as $key => $value) {
            Cookie::queue(Cookie::forget($key));
        }

        return redirect('/login')->withCookie($cookies);
    }
    public function logoutAdmin(){
        $cookies = Cookie::forget('usertype'); // Remove specific cookies

        // Remove all cookies
        foreach ($_COOKIE as $key => $value) {
            Cookie::queue(Cookie::forget($key));
        }

        return redirect('/login')->withCookie($cookies);
    }

    public function getAdmin(Request $request){
        if ($request->method() === 'GET') {
            $id = $request->input('user_id');

            $profile = DB::table('usersprofiles')
                ->where('user_id', $id)
                ->first();

            if ($profile) {
                return response()->json([
                    'data' => $profile,
                    'msg' => 'success'
                ]);
            } else {
                return response()->json([
                    'msg' => 'Failed',
                    'prompt' => 'Log in Failed. Incorrect User/Password'
                ]);
            }
        }
    }
}

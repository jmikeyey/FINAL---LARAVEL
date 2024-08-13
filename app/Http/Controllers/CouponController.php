<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CouponController extends Controller
{
    //
    public function checkCoupon(Request $request){
        
        if ($request->isMethod('get')) {
            $code = $request->input('coupon_code');

            $coupon = DB::table('coupons')->where('name', $code)->first();

            if ($coupon) {
                $currentDate = now()->format('Y-m-d');
                $endDate = $coupon->date_end;
                $itemUsed = $coupon->item_used;
                $useLimit = $coupon->use_limit;

                if ($endDate >= $currentDate) {
                    // Coupon is still valid
                    if ($itemUsed < $useLimit) {
                        // Coupon has not reached the maximum usage limit
                        return response()->json([
                            "data" => $coupon,
                            'msg' => 'Coupons available',
                            'message' => 'success'
                        ]);
                    } else {
                        // Coupon has reached the maximum usage limit
                        $message = "Coupon has reached the maximum usage limit";
                        return response()->json([
                            "data" => [],
                            "msg" => $message,
                            'message' => 'failed'
                        ]);
                    }
                } else {
                    // Coupon has expired
                    $message = "Coupon is no longer available";
                    return response()->json([
                        "data" => [],
                        "msg" => $message,
                        'message' => 'failed'
                    ]);
                }
            } else {
                $message = "Coupon not available";
                return response()->json([
                    "data" => [],
                    "msg" => $message,
                    'message' => 'failed'
                ]);
            }
        }
    }
    public function getAll(Request $request){
        $coupons = DB::table('coupons')->get();

        if ($coupons->isEmpty()) {
            return response()->json(["data" => [], "message" => "no data found"]);
        } else {
            return response()->json(["data" => $coupons]);
        }
    }

    public function duplicate(Request $request){
        if ($request->has('nameValue')) {
            $name = $request->input('nameValue');
            $check = DB::table('coupons')->where('name', $name)->first();

            if ($check) {
                return response()->json(["message" => "exist"]);
            } else {
                return response()->json(["message" => "error"]);
            }
        } else {
            return response()->json(['type' => 'error', 'message' => 'No value received from the server']);
        }
    }

    public function addCoupon(Request $request){
        if ($request->isMethod('post')) {
            $status = $request->input('couponsstatus');
            $startDate = $request->input('coup_startDate');
            $endDate = $request->input('coup_endDate');
            $use_code = $request->input('coup_code');
            $use_limit = $request->input('coup_limit');
            $use_type = $request->input('couponstype');
            $use_value = $request->input('coup_value');

            $inserted = DB::table('coupons')->insert([
                'name' => $use_code,
                'use_limit' => $use_limit,
                'type' => $use_type,
                'item_value' => $use_value,
                'date_start' => $startDate,
                'date_end' => $endDate,
                'status' => $status
            ]);

            if ($inserted) {
                return response()->json(['message' => 'Added Successfully!', 'messageType' => 'success']);
            } else {
                return response()->json(['message' => 'Failed', 'messageType' => 'warning']);
            }
        } else {
            return response('Invalid method', 405);
        }
    }
    
    public function getSolo(Request $request){
        if ($request->isMethod('get')) {
            $code = $request->input('coupon_code');

            $coupon = DB::table('coupons')->where('id', $code)->get();

            if ($coupon->isNotEmpty()) {
                return response()->json(["data" => $coupon]);
            } else {
                return response()->json(["data" => [], "message" => "Can't Fetch Data"]);
            }
        } else {
            return response('Invalid method', 405);
        }
    }

    public function update(Request $request){
        if ($request->isMethod('put')) {
            $input_data = file_get_contents('php://input');
            $form_data = [];
            parse_str($input_data, $form_data);

            $id = $form_data['id'];
            $status = $form_data['couponsstatus'];
            $startDate = $form_data['coup_startDate'];
            $endDate = $form_data['coup_endDate'];
            $use_code = $form_data['coup_code'];
            $use_limit = $form_data['coup_limit'];
            $use_type = $form_data['couponstype'];
            $use_value = $form_data['coup_value'];

            $affected = DB::table('coupons')
                ->where('id', $id)
                ->update([
                    'name' => $use_code,
                    'use_limit' => $use_limit,
                    'type' => $use_type,
                    'item_value' => $use_value,
                    'date_start' => $startDate,
                    'date_end' => $endDate,
                    'status' => $status
                ]);

            if ($affected > 0) {
                return response()->json([
                    "message" => "Coupon Successfully Updated!",
                    "type" => "success"
                ]);
            } else {
                return response()->json([
                    "message" => "Failed to update Coupon!",
                    "type" => "warning"
                ]);
            }
        } else {
            return response('Invalid method', 405);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\usersprofile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function deleteIncharge(Request $request){
        if ($request->isMethod('delete')) {
            $id = $request->input('dels');

            $deleted = DB::table('usersprofiles')
                ->where('user_id', $id)
                ->delete();

            if ($deleted) {
                $message = "Deleted Successfully";
                return response()->json(['message' => $message, 'messageType' => 'success']);
            } else {
                $message = "Delete Failed";
                return response()->json(['message' => $message, 'messageType' => 'warning']);
            }
        } else {
            return response()->json(['message' => 'Invalid request method', 'messageType' => 'error']);
        }
    }
    public function getIncharge(Request $request){
        $data = DB::table('usersprofiles as a')
            ->select(
                'a.user_id',
                'a.profile_img',
                'a.firstname',
                'a.lastname',
                'a.date_registered',
                'a.email',
                'a.phonenumber',
                'a.gender'
            )
            ->where('a.usertype', 'staff')
            ->get();

        if ($data->isEmpty()) {
            return response()->json(["data" => [], "message" => "no data found"]);
        } else {
            return response()->json(["data" => $data]);
        }
    }
    public function getInchargeSolo(Request $request){
        if ($request->isMethod('get')) {
            $id = $request->input('id');

            $get = DB::table('usersprofiles')
                ->where('user_id', $id)
                ->get();

            if ($get) {
                $message = "Fetched Successfully";
                return response()->json(['message' => $message, 'messageType' => 'success', 'data' => $get]);
            } else {
                $message = "Fetched Failed";
                return response()->json(['message' => $message, 'messageType' => 'warning']);
            }
        } else {
            return response()->json(['message' => 'Invalid request method', 'messageType' => 'error']);
        }
    }
    public function getCustomer(Request $request){
            $data = DB::table('usersprofiles as a')
            ->select(
                'a.user_id',
                'a.profile_img',
                'a.firstname',
                'a.lastname',
                'a.date_registered',
                'a.email',
                'a.phonenumber'
            )
            ->rightJoin('orders as b', 'a.user_id', '=', 'b.user_id')
            ->where('b.status', 'Completed')
            ->groupBy('a.user_id',
            'a.profile_img',
            'a.firstname',
            'a.lastname',
            'a.date_registered',
            'a.email',
            'a.phonenumber')
            ->selectRaw('COUNT(b.order_id) as total_orders')
            ->get();

        if ($data->isEmpty()) {
            return response()->json(["data" => [], "message" => "no data found"]);
        } else {
            return response()->json(["data" => $data]);
        }
    }


    public function geCustomerSolo(Request $request){
        try {
            $status = 'Completed';
            $user_id = $request->input('user_id');

            $data = DB::table('products as a')
                ->select('a.*', 'b.*', 'c.*', 'd.filename', 'f.method', 'f.amount', 'f.pay_status', 'f.payment_date')
                ->join('order_details as b', 'b.product_id', '=', 'a.product_id')
                ->join('orders as c', 'c.order_id', '=', 'b.order_id')
                ->join(DB::raw('(SELECT MIN(filename) as filename, product_id FROM product_images GROUP BY product_id) as d'), function ($join) {
                    $join->on('d.product_id', '=', 'a.product_id');
                })
                ->join('payment as f', 'f.payment_id', '=', 'c.payment_id')
                ->where('c.user_id', $user_id)
                ->where('c.status', $status)
                ->groupBy(
                'a.product_id', 'a.product_code', 'a.name', 'a.price',
                'a.description', 'a.is_deleted',
                'a.old_price', 'a.brand', 'a.quantity', 'a.is_sold',
                'a.popularity_status', 'a.category_id',
                'b.order_id', 'b.product_id', 'b.price', 'b.quantity', 'b.discount', 'b.shipping', 'b.subtotal',
                'c.order_id', 'c.status', 'c.user_id', 'c.address_id', 'c.status', 'c.is_checkout', 'c.payment_id', 'c.date_time',
                'd.filename', 'f.method', 'f.amount', 'f.pay_status', 'f.payment_date'
                )
                ->get();

            $infoData = DB::table('usersprofiles as a')
                ->select('a.user_id', 'a.profile_img', 'a.firstname', 'a.lastname', 'a.date_registered', 'a.birthdate', 'a.email', 'a.phonenumber', 
                'c.address_id', 'c.region', 'c.province', 'c.city', 'c.barangay', 'c.phone_number', 'c.is_default', 
                )
                ->join('orders as b', 'a.user_id', '=', 'b.user_id')
                ->join('delivery_infos as c', 'a.user_id', '=', 'c.user_id')
                ->where('b.status', 'Completed')
                ->where('c.is_default', 'default')
                ->where('a.user_id', $user_id)
                ->selectRaw('COUNT(b.order_id) as total_orders')
                ->groupBy(
                    'a.user_id', 'a.profile_img', 'a.firstname', 'a.lastname', 'a.date_registered', 'a.birthdate', 'a.email', 'a.phonenumber'
                    , 'c.address_id', 'c.region', 'c.province', 'c.city', 'c.barangay', 'c.phone_number', 'c.is_default', 
                )
                ->get();

            $response = [
                "data" => $data,
                'message' => 'Successful',
                'info' => $infoData,
            ];

            return response()->json([$response]);
        } catch (\Exception $e) {
            // Response JSON indicating the error
            $response = [
                "success" => false,
                "message" => "Error retrieving data: " . $e->getMessage()
            ];
            return response()->json($response, 500);
        }
    }
}

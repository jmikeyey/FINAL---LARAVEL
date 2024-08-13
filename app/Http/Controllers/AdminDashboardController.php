<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function sortByDate(Request $request){
        if ($request->has('date')) {
            $date = '%' . $request->input('date') . '%';
            $orderStatus = 'Completed';
            $payStatus = 'Paid';

            $data1 = DB::table('categories')
                ->selectRaw('COUNT(id) as total_category')
                ->get()
                ->toArray();

            $data2 = DB::table('orders')
                ->selectRaw('COUNT(order_id) as total_orders')
                ->where('date_time', 'LIKE', $date)
                ->where('status', $orderStatus)
                ->get()
                ->toArray();

            $data = DB::table('products as a')
                ->join('order_details as b', 'b.product_id', '=', 'a.product_id')
                ->join('orders as c', 'c.order_id', '=', 'b.order_id')
                ->join('payment as f', 'f.payment_id', '=', 'c.payment_id')
                ->select('a.*', 'b.*', 'c.*', 'f.method', 'f.amount', 'f.pay_status', 'f.payment_date')
                ->where('c.date_time', 'LIKE', $date)
                ->where('c.status', $orderStatus)
                ->where('f.pay_status', $payStatus)
                ->get()
                ->toArray();

            $data3 = DB::table('orders as a')
                ->join('payment as b', 'a.payment_id', '=', 'b.payment_id')
                ->selectRaw('SUM(b.amount) as total_amount')
                ->where('a.date_time', 'LIKE', $date)
                ->where('a.status', $orderStatus)
                ->where('b.pay_status', $payStatus)
                ->get()
                ->toArray();

            $data69 = DB::table('orders as a')
                ->join('payment as b', 'a.payment_id', '=', 'b.payment_id')
                ->selectRaw('SUM(b.amount) as total_amount')
                ->where('a.status', $orderStatus)
                ->where('b.pay_status', $payStatus)
                ->get()
                ->toArray();

            $data4 = DB::table('products')
                ->selectRaw('COUNT(product_id) as product_count')
                ->get()
                ->toArray();

            $data5 = DB::table('products')
                ->select('product_id', 'is_sold')
                ->where('is_sold', '=', function ($query) {
                    $query->selectRaw('MAX(is_sold)')
                        ->from('products');
                })
                ->get()
                ->toArray();

            $data6 = DB::table('orders as a')
                ->join('usersprofiles as b', 'a.user_id', '=', 'b.user_id')
                ->selectRaw('COUNT(DISTINCT a.user_id) AS total_customer')
                ->where('a.status', $orderStatus)
                ->get()
                ->toArray();

            $response = [
                'data' => $data,
                'message' => 'Successful',
                'categoryCount' => $data1,
                'ordersCount' => $data2,
                'revenue' => $data3,
                'prod_count' => $data4,
                'high_sold' => $data5,
                'customers' => $data6,
                'totalRevenue' => $data69
            ];

            return response()->json([$response]);
        }
        if ($request->has('endDate') && $request->has('startDate')) {
            $startDate = min($request->input('startDate'), $request->input('endDate'));
            $endDate = max($request->input('startDate'), $request->input('endDate'));
            
            $orderStatus = 'Completed';
            $payStatus = 'Paid';

            $data = DB::table('products as a')
                ->join('order_details as b', 'b.product_id', '=', 'a.product_id')
                ->join('orders as c', 'c.order_id', '=', 'b.order_id')
                ->join('payment as f', 'f.payment_id', '=', 'c.payment_id')
                ->select('a.*', 'b.*', 'c.*', 'f.method', 'f.amount', 'f.pay_status', 'f.payment_date')
                ->whereBetween('c.date_time', [$startDate, $endDate])
                ->where('c.status', $orderStatus)
                ->where('f.pay_status', $payStatus)
                ->get()
                ->toArray();

            $data2 = DB::table('orders')
                ->selectRaw('COUNT(order_id) as total_orders')
                ->whereBetween('date_time', [$startDate, $endDate])
                ->where('status', $orderStatus)
                ->get()
                ->toArray();

            $data3 = DB::table('orders as a')
                ->join('payment as b', 'a.payment_id', '=', 'b.payment_id')
                ->selectRaw('SUM(b.amount) as total_amount')
                ->whereBetween('a.date_time', [$startDate, $endDate])
                ->where('a.status', $orderStatus)
                ->where('b.pay_status', $payStatus)
                ->get()
                ->toArray();

            $response = [
                'weekData' => $data,
                'weekOrders' => $data2,
                'weekRevenue' => $data3
            ];

            return response()->json([$response]);
        }
    }

    public function ordersGetAd(Request $request){
        if ($request->method() === 'GET') {
            $cancelled = 'Cancelled';

            $data = DB::table('products as a')
                ->join('order_details as b', 'b.product_id', '=', 'a.product_id')
                ->join('orders as c', 'c.order_id', '=', 'b.order_id')
                ->join(DB::raw('(SELECT product_id, MAX(filename) as filename FROM product_images GROUP BY product_id) as d'), 'd.product_id', '=', 'a.product_id')
                ->join('usersprofiles as e', 'c.user_id', '=', 'e.user_id')
                ->join('payment as f', 'f.payment_id', '=', 'c.payment_id')
                ->select('a.*', 'b.*', 'c.*', 'd.filename', 'e.firstname', 'f.method', 'f.amount')
                ->groupBy(
                    'a.product_id', 
                    'a.name',
                    'a.description',
                    'a.price',
                    'a.old_price',
                    'a.product_code', 
                    'a.brand',
                    'a.quantity',
                    'a.is_sold', 
                    'a.category_id',
                    'a.is_deleted',
                    'a.popularity_status',
                    'b.product_id',

                    'b.order_id', 
                    'b.price', 
                    'b.discount', 
                    'b.shipping', 
                    'b.subtotal', 
                    'b.quantity',
                    
                    'c.order_id', 
                    'c.status', 
                    'c.user_id', 
                    'c.payment_id',
                    'c.address_id',
                    'c.status',
                    'c.is_checkout',
                    'c.date_time',

                    'd.filename', 
                    'e.firstname', 
                    'f.method', 
                    'f.amount'
                    )
                ->orderByRaw('CASE
                                    WHEN c.status = "Pending" THEN 1
                                    WHEN c.status = "To Ship" THEN 2
                                    WHEN c.status = "To Receive" THEN 3
                                    WHEN c.status = "Completed" THEN 4
                                    WHEN c.status = "Cancelled" THEN 5
                                    ELSE 6
                                END')
                ->get()
                ->toArray();

            if ($data) {
                return response()->json(["data" => $data, "msg" => "success"]);
            } else {
                return response()->json(['msg' => 'Failed']);
            }
        }

    }
}

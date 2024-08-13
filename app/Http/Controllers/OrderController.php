<?php

namespace App\Http\Controllers;

use App\Mail\MailMaliable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    //
    public function getOrders(Request $request){
        if ($request->isMethod('get')) {
            $id = $request->input('id');

            $orderDetails = DB::table('products as a')
                ->select('a.*', 'b.*', 'c.*', 'd.filename')
                ->join('order_details as b', 'b.product_id', '=', 'a.product_id')
                ->join('orders as c', 'c.order_id', '=', 'b.order_id')
                ->join(DB::raw('(SELECT product_id, filename FROM product_images GROUP BY product_id,filename LIMIT 1) as d'), 'd.product_id', '=', 'a.product_id')
                ->where('c.order_id', $id)
                ->get();

            if ($orderDetails->isNotEmpty()) {
                return response()->json(["data" => $orderDetails, "msg" => "success"]);
            } else {
                return response()->json(['msg' => 'Failed']);
            }
        } else {
            return response()->json(['error' => 'Invalid method']);
        }
    }
    public function addOrder(Request $request){
        if ($request->isMethod('post')) {
            $checkedProducts = $request->input('checkedProducts');
            $userId = $request->input('user');

            // Start the transaction
            DB::beginTransaction();

            try {
                // Insert a row into the "orders" table
                $orderId = DB::table('orders')->insertGetId([
                    'user_id' => $userId,
                    'is_checkout' => 'Done'
                ]);

                // Insert rows into the "order_details" table
                foreach ($checkedProducts as $product) {
                    $productId = $product['productId'];
                    $quantity = $product['quantity'];
                    $subtotal = $product['subtotal'];
                    $price = $product['price'];

                    DB::table('order_details')->insert([
                        'order_id' => $orderId,
                        'product_id' => $productId,
                        'price' => $price,
                        'quantity' => $quantity,
                        'subtotal' => $subtotal
                    ]);
                }

                // Commit the transaction
                DB::commit();

                // Response JSON indicating success
                $response = [
                    "success" => true,
                    "message" => "Order placed successfully!",
                    "order_id" => $orderId
                ];
                return response()->json($response);
            } catch (\Exception $e) {
                // Rollback the transaction if an error occurs
                DB::rollBack();

                // Response JSON indicating the error
                $response = [
                    "success" => false,
                    "message" => "Error placing the order: " . $e->getMessage()
                ];
                return response()->json($response);
            }
        } else {
            return response()->json(['error' => 'Invalid method']);
        }
    }
    public function editOrders(Request $request){
        if ($request->isMethod('put')) {
            $input_data = file_get_contents('php://input');
            $form_data = json_decode($input_data, true);

            $productList = $form_data['productList'];
            $coupon = $form_data['coupon'] ?? null;
            $discount = $form_data['discount'];
            $total = $form_data['total_price'];
            $shipping = $form_data['shipping'];
            $add_id = $form_data['add_id'];
            $order_id = $form_data['order_id'];
            $user = $form_data['user'];
            $status = "Pending";
            $paymentID = $form_data['paymentID'];

            DB::beginTransaction();

            try {
                DB::table('orders')
                    ->where('order_id', $order_id)
                    ->update([
                        'address_id' => $add_id,
                        'status' => $status,
                        'payment_id' => $paymentID
                    ]);

                DB::table('order_details')
                    ->where('order_id', $order_id)
                    ->update([
                        'discount' => $discount,
                        'shipping' => $shipping
                    ]);

                if ($coupon !== null) {
                    DB::table('coupons')
                        ->where('name', $coupon)
                        ->increment('item_used');
                }

                foreach ($productList as $product) {
                    $prod_id = $product['product_id'];
                    $user = $product['user'];
                    $quantity = $product['quantity'];

                    DB::table('carts')
                        ->where('product_id', $prod_id)
                        ->where('user_id', $user)
                        ->update(['is_ordered' => 'Ordered']);

                    DB::table('products')
                        ->where('product_id', $prod_id)
                        ->increment('is_sold', $quantity);
                }

                DB::commit();

                return response()->json([
                    "message" => "Order Successfully Checked Out!",
                    "type" => "success"
                ]);
            } catch (\Exception $e) {
                DB::rollBack();

                return response()->json([
                    "message" => "Failed to check out!",
                    "type" => "warning"
                ]);
            }
        }

        return response()->json([
            "message" => "Execution Failed!",
            "type" => "error"
        ]);
    }
    public function addPayment(Request $request){
        if ($request->isMethod('post')) {
            $amount = $request->input('amount');
            $method = $request->input('method');
            $user = $request->input('user');

            $payment = DB::table('payment')->insertGetId([
                'amount' => $amount,
                'method' => $method,
                'user_id' => $user,
            ]);

            if ($payment) {
                // Prepare the response with the payment ID
                $response = [
                    'paymentID' => $payment,
                    'message' => 'Payment added successfully'
                ];

                // Return the response
                return response()->json($response);
            } else {
                $msg = "failed";
                return response()->json(['msg' => $msg, "messageType" => "warning"]);
            }
        }
    }

    public function getAllOrders(Request $request){
        if ($request->isMethod('get')) {
            $user_id = $request->input('user_id');
            $is_checkout = 'Done';
            $status = 'Cancelled';

            $orderDetails = DB::table('products AS a')
                ->select('a.*', 'b.*', 'c.*', 'd.filename', 'e.*')
                ->join('order_details AS b', 'b.product_id', '=', 'a.product_id')
                ->join('orders AS c', 'c.order_id', '=', 'b.order_id')
                ->join(DB::raw('(SELECT product_id, MIN(filename) AS filename FROM product_images GROUP BY product_id) AS d'), function ($join) {
                    $join->on('d.product_id', '=', 'a.product_id');
                })
                ->join('payment AS e', 'e.payment_id', '=', 'c.payment_id')
                ->where('c.user_id', '=', $user_id)
                ->where('c.is_checkout', '=', $is_checkout)
                ->where('c.status', '!=', $status)
                ->get();

            if ($orderDetails) {
                return response()->json(["data" => $orderDetails, "msg" => "success"]);
            } else {
                return response()->json(['msg' => 'Failed']);
            }
        } else {
            return response()->json(['error' => 'Invalid method'], 405);
        }
    }

    public function detailedOrder(Request $request){
        if ($request->isMethod('get')) {
            $id = $request->input('id');

            try {
                $orderInfo = DB::table('usersprofiles as d')
                    ->join('orders as a', 'a.user_id', '=', 'd.user_id')
                    ->join('order_details as e', 'e.order_id', '=', 'a.order_id')
                    ->join('delivery_infos as b', 'b.address_id', '=', 'a.address_id')
                    ->join('payment as c', 'c.payment_id', '=', 'a.payment_id')
                    ->where('a.order_id', $id)
                    ->get();

                $orderDetails = DB::table('products as a')
                    ->join('categories as b', 'b.id', '=', 'a.category_id')
                    ->join('order_details as c', 'c.product_id', '=', 'a.product_id')
                    ->join('orders as d', 'd.order_id', '=', 'c.order_id')
                    ->join(DB::raw('(SELECT product_id, MIN(filename) as filename FROM product_images GROUP BY product_id) as e'), function ($join) {
                        $join->on('e.product_id', '=', 'a.product_id');
                    })
                    ->select(
                        'a.*',
                        'a.name as product_name', // Alias the product name
                        'b.id as category_id',
                        'b.name as cat_name', // Alias the category name
                        'c.*',
                        'b.*',
                        'd.*',
                        'e.filename'
                    )
                    ->where('c.order_id', $id)
                    ->get();

                return response()->json([
                    "orderInfo" => $orderInfo,
                    "orderDetails" => $orderDetails,
                    "msg" => "success"
                ]);
            } catch (\Exception $e) {
                return response()->json([
                    "success" => false,
                    "message" => "Error placing the order: " . $e->getMessage()
                ]);
            }
        } else {
            return response()->json(['error' => 'Invalid method'], 405);
        }
    }
    public function cancelOrders(Request $request){
        if ($request->isMethod('put')) {
            $input_data = file_get_contents('php://input');
            $data = json_decode($input_data, true);

            $order_id = $data['order_id'];
            $user_id = $data['user_id'];
            $status = 'Cancelled';

            try {
                $updateStatus = DB::table('orders')
                    ->where('order_id', $order_id)
                    ->where('user_id', $user_id)
                    ->update(['status' => $status]);

                if ($updateStatus) {
                    return response()->json([
                        "message" => "Order cancelled",
                        "type" => "success"
                    ]);
                } else {
                    return response()->json([
                        "message" => "Cancel failed",
                        "type" => "failed"
                    ]);
                }
            } catch (\Exception $e) {
                return response()->json([
                    "message" => "Execution failed: " . $e->getMessage(),
                    "type" => "error"
                ]);
            }
        } else {
            return response()->json([
                "message" => "Invalid method",
                "type" => "error"
            ], 405);
        }
    }

    public function updateStatus(Request $request){
        if ($request->method() === 'PUT') {
                $data = $request->json()->all();

                $order_id = $data['order_id'];
                $status = $data['status'];
                $payStats = 'Paid';
                $payPending = 'Pending';

                if ($status === 'Completed') {
                    DB::update('UPDATE payment SET pay_status = ?', [$payStats]);
                }else{
                    DB::update('UPDATE payment SET pay_status = ?', [$payPending]);
                }

                DB::update('UPDATE orders SET status = ? WHERE order_id = ?', [$status, $order_id]);

                $response = [
                    'message' => 'Order Status Updated!',
                    'type' => 'success'
                ];
                return response()->json($response);
        }
    }

    public function getInvoice(Request $request){
        $status = 'Completed';
        
        $data = DB::table('products as a')
            ->select('a.*', 'b.*', 'c.*', 'd.filename', 'e.firstname', 'f.payment_date', 'f.amount')
            ->join('order_details as b', 'b.product_id', '=', 'a.product_id')
            ->join('orders as c', 'c.order_id', '=', 'b.order_id')
            ->join('usersprofiles as e', 'e.user_id', '=', 'c.user_id')
            ->join('payment as f', 'f.payment_id', '=', 'c.payment_id')
            ->join(DB::raw('(SELECT product_id, MIN(filename) as filename FROM product_images GROUP BY product_id) as d'), function ($join) {
                $join->on('d.product_id', '=', 'a.product_id');
            })
            ->where('c.status', '=', $status)
            ->groupBy(
                'a.product_id', 'a.product_code', 'a.name', 'a.price',
                'a.description', 'a.is_deleted',
                'a.old_price', 'a.brand', 'a.quantity', 'a.is_sold',
                'a.popularity_status', 'a.category_id',
                'b.order_id', 'b.product_id', 'b.price', 'b.quantity', 'b.discount', 'b.shipping', 'b.subtotal',
                'c.order_id', 'c.status', 'c.user_id', 'c.address_id', 'c.status', 'c.is_checkout', 'c.payment_id', 'c.date_time',
                'd.filename', 
                'e.firstname', 
                'f.payment_date', 'f.amount'
                )
            ->get();

        if ($data->count() > 0) {
            return response()->json(["data" => $data, "msg" => "success"]);
        } else {
            return response()->json(['msg' => 'Failed']);
        }
    }


    public function sendEmail(Request $request){
        $emailReceiver = $request->input('emailReceiver');
        $invoiceContent = $request->input('invoice');

        // Add any additional data you want to pass to the Mailable
        $data = [
            'emailReceiver' => $emailReceiver,
            'invoiceContent' => $invoiceContent
        ];

        Mail::to($emailReceiver)->send(new MailMaliable($data));

        return response()->json([
            'success' => true,
            'message' => 'Email sent successfully'
        ]);
    }
    
}

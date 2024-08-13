<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function getCart(Request $request){
            $id = $request->input('id');

            $cartDetails = DB::table('products as a')
            ->select(
                'a.product_id', 'a.product_code', 'a.name', 'a.price',
                'a.old_price', 'a.brand', 'a.quantity', 'a.is_sold',
                'a.popularity_status', 'a.category_id', 'b.cart_id', 'b.user_id', 'b.product_id', 
                'b.quantity', 'b.is_ordered', 'c.user_id', DB::raw('MAX(d.filename) as filename'), 'e.name as category_name'
            )
            ->join('carts as b', 'a.product_id', '=', 'b.product_id')
            ->join('categories as e', 'a.category_id', '=', 'e.id')
            ->join('usersprofiles as c', 'b.user_id', '=', 'c.user_id')
            ->leftJoin('product_images as d', function ($join) {
                $join->on('d.product_id', '=', 'b.product_id');
            })
            ->where('c.user_id', $id)
            ->where('b.is_ordered', '!=', 'Ordered')
            ->groupBy(
                'a.product_id', 'a.product_code', 'a.name', 'a.price',
                'a.old_price', 'a.brand', 'a.quantity', 'a.is_sold',
                'a.popularity_status', 'a.category_id', 'b.cart_id', 'b.user_id', 'b.product_id', 
                'b.quantity', 'b.is_ordered', 'c.user_id', 'e.name'
            )
            ->get();
        
        

            if ($cartDetails->isNotEmpty()) {
                return response()->json(["data" => $cartDetails, "msg" => "success"]);
            } else {
                return response()->json(["data" => $cartDetails,"msg" => "false", "prompt" => "No cart added "]);
            }
        
    }

    public function addToCart(Request $request){
        if ($request->isMethod('post')) {
            $prod_id = $request->input('prod_id');
            $user_id = $request->input('user_id');
            $is_ordered = 'Not';
            $quantity = $request->input('quantity', 1);

            $existingCartItem = DB::table('carts')
                ->where('user_id', $user_id)
                ->where('product_id', $prod_id)
                ->where('is_ordered', $is_ordered)
                ->first();

            if ($existingCartItem) {
                // Update the quantity of the existing cart entry
                DB::table('carts')
                    ->where('user_id', $user_id)
                    ->where('product_id', $prod_id)
                    ->where('is_ordered', $is_ordered)
                    ->increment('quantity', $quantity);

                $msg = "Quantity updated in the cart!";
                return response()->json(['message' => $msg, 'messageType' => 'success']);
            } else {
                // Insert a new cart entry
                $cartData = [
                    'user_id' => $user_id,
                    'product_id' => $prod_id,
                    'quantity' => $quantity,
                    'is_ordered' => $is_ordered,
                ];

                $inserted = DB::table('carts')->insert($cartData);

                if ($inserted) {
                    $msg = "Added to Cart!";
                    return response()->json(['message' => $msg, 'messageType' => 'success']);
                } else {
                    $msg = "Failed";
                    return response()->json(['msg' => $msg, 'messageType' => 'warning']);
                }
            }
        }else{
            return response()->json(['msg' => 'error', 'messageType' => 'server']);
        }
    }

    public function removeItem(Request $request){
        if ($request->isMethod('delete')) {
            // $id = $request->input('del');
            $input = $request->getContent();
            $data = json_decode($input, true);
            $id = $data['del'];

            $delete = DB::table('carts')->where('cart_id', $id)->delete();

            if ($delete > 0) {
                return response()->json([
                    "message" => "Item Removed!",
                    "type" => "success"
                ]);
            } else {
                return response()->json([
                    "message" => "Failed to remove!",
                    "type" => "warning"
                ]);
            }
        } else {
            return response()->json([
                "message" => "Invalid HTTP Method",
                "type" => "error"
            ]);
        }
    }

    public function updateCartQuantity(Request $request){
        if ($request->isMethod('put')) {
            $requestData = $request->json()->all();

            $prodId = $requestData['prodId'];
            $quantity = $requestData['quantity'];

            $update = DB::table('carts')
                ->where('cart_id', $prodId)
                ->update(['quantity' => $quantity]);

            if ($update) {
                $msg = "Quantity updated!";
                return response()->json(['message' => $msg, "messageType" => "success"]);
            } else {
                $msg = "Failed";
                return response()->json(['msg' => $msg, "messageType" => "warning"]);
            }
        } else {
            return response()->json(['error' => 'Invalid method']);
        }
    }
}

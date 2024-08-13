<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //
    public function getProduct(){
        $view = DB::table('products as a')
        ->select(
            'a.product_id', 'a.product_code', 'a.name', 'a.price',
            'a.old_price', 'a.brand', 'a.quantity', 'a.is_sold',
            'a.popularity_status', 'a.category_id',
            DB::raw('MIN(c.filename) AS image_filename'),
            'b.name as category_name'
        )
        ->leftJoin('product_images as c', 'a.product_id', '=', 'c.product_id')
        ->join('categories as b', 'b.id', '=', 'a.category_id')
        ->groupBy(
            'a.product_id', 'a.product_code', 'a.name', 'a.price',
            'a.old_price', 'a.brand', 'a.quantity', 'a.is_sold',
            'a.popularity_status', 'a.category_id', 'b.name'
        )
        ->get();


        if ($view->isEmpty()) {
            return response()->json(["data" => [], "message" => "No data found"]);
        } else {
            $dataname = ["data" => $view];
            return response()->json($dataname);
        }
    }

    public function prod_sort(Request $request){
        $minPrice = $request->input('value');

        $products = DB::table('products as a')
        ->select(
            'a.product_id',
            'a.product_code',
            'a.name',
            'a.price',
            'a.old_price',
            'a.brand',
            'a.quantity',
            'a.is_sold',
            'a.popularity_status',
            'a.category_id',
            DB::raw("SUBSTRING_INDEX(GROUP_CONCAT(product_images.filename ORDER BY product_images.filename ASC), ',', 1) AS image_filename"),
            'b.name AS category_name'
        )
        ->leftJoin('product_images', 'a.product_id', '=', 'product_images.product_id')
        ->join('categories as b', 'b.id', '=', 'a.category_id')
        ->where('a.price', '>=', $minPrice)
        ->where('a.is_deleted', 'not')
        ->groupBy(
            'a.product_id',
            'a.product_code',
            'a.name',
            'a.price',
            'a.old_price',
            'a.brand',
            'a.quantity',
            'a.is_sold',
            'a.popularity_status',
            'a.category_id',
            'b.name'
        )
        ->orderBy('a.price', 'ASC')
        ->get();
    

        return response()->json([
            'data' => $products,
            'message' => 'Product sorted successfully'
        ]);
    }
    public function prod_search(Request $request){
        if ($request->has('cat_id')) {
            $id = $request->input('cat_id');
            $products = DB::table('products as a')
            ->select(
                'a.product_id',
                'a.product_code',
                'a.name',
                'a.price',
                'a.old_price',
                'a.brand',
                'a.quantity',
                'a.is_sold',
                'a.popularity_status',
                'a.category_id',
                DB::raw('MIN(b.filename) AS image_filename'), // Select minimum filename
                'c.name as category_name'
            )
            ->join('categories as c', 'c.id', '=', 'a.category_id')
            ->join('product_images as b', 'a.product_id', '=', 'b.product_id')
            ->where('a.category_id', $id)
            ->groupBy(
                'a.product_id',
                'a.product_code',
                'a.name',
                'a.price',
                'a.old_price',
                'a.brand',
                'a.quantity',
                'a.is_sold',
                'a.popularity_status',
                'a.category_id', 
                'c.name'
            )
            ->get();

        }elseif ($request->has('prod_search')) {
            $searchTerm = '%' . $request->input('prod_search') . '%';
            $decision = 'not';
            
            $products = DB::table('products as a')
                ->select(
                    'a.product_id',
                    'a.product_code',
                    'a.name',
                    'a.price',
                    'a.old_price',
                    'a.brand',
                    'a.quantity',
                    'a.is_sold',
                    'a.popularity_status',
                    'a.category_id',
                    DB::raw('MIN(b.filename) AS image_filename'), // Select minimum filename
                    'c.name as category_name'
                )
                ->join('categories as c', 'c.id', '=', 'a.category_id')
                ->join('product_images as b', 'a.product_id', '=', 'b.product_id')
                ->whereRaw("CONCAT(a.name, a.description, c.name, a.brand) LIKE ?", [$searchTerm])
                ->where('a.is_deleted', $decision)
                ->groupBy(
                    'a.product_id',
                    'a.product_code',
                    'a.name',
                    'a.price',
                    'a.old_price',
                    'a.brand',
                    'a.quantity',
                    'a.is_sold',
                    'a.popularity_status',
                    'a.category_id', 
                    'c.name'
                )
                ->get();
        } else {
            // Handle case when neither 'cat_id' nor 'prod_search' is present
            return response()->json(["message" => "Invalid search parameters"]);
        }
        
        if ($products->isEmpty()) {
            return response()->json(["data" => [], "message" => "No data found"]);
        } else {
            return response()->json(["data" => $products]);
        }
        
    }

    public function productDetails(Request $request){
        if ($request->has('id')) {
            $id = $request->input('id');

            $product = DB::select('SELECT a.*, b.name as cat_name FROM products a
                LEFT JOIN categories b ON a.category_id = b.id WHERE a.product_id = ?', [$id]);

            $productImages = DB::select('SELECT * FROM product_images WHERE product_id = ?', [$id]);

            $productSpecs = DB::select('SELECT * FROM product_specifications WHERE product_id = ?', [$id]);

            $productInventory = DB::select('SELECT * FROM inventories WHERE product_id = ?', [$id]);

            $data = [
                'info' => $product,
                'img_data' => $productImages,
                'specs_data' => $productSpecs,
                'inventory' => $productInventory,
            ];

            return response()->json(['data' => $data]);
        }
        
        return response()->json(['error' => 'Product ID is missing'], 400);
    }

    public function addProduct(Request $request){
        // Price
        $priceOld = $request->input('price_old');
        $newPrice = $request->input('new_price');
        $prodCategory = $request->input('prod_category');
        $sold = 0;

        // Basic information
        $prodName = $request->input('prod_name');
        $prodDesc = $request->input('prod_desc');
        $prodCode = $request->input('prod_code');
        $prodBrand = $request->input('prod_brand');
        $prodStatus = $request->input('prod_status');

        // Inventory
        $prodQuantity = $request->input('prod_quantity');
        $prodSku = $request->input('prod_sku');

        // Add query
        $productId = DB::table('products')->insertGetId([
            'product_code' => $prodCode,
            'name' => $prodName,
            'description' => $prodDesc,
            'price' => $newPrice,
            'old_price' => $priceOld,
            'brand' => $prodBrand,
            'quantity' => $prodQuantity,
            'is_sold' => $sold,
            'popularity_status' => $prodStatus,
            'category_id' => $prodCategory,
        ]);

        // Specifications in array
        $specifications = [];
        for ($i = 1; $i <= 7; $i++) {
            if ($request->has("key$i") && $request->has("value$i")) {
                $key = $request->input("key$i");
                $value = $request->input("value$i");
                if (!empty($key) && !empty($value)) {
                    $specifications[] = [
                        'product_id' => $productId,
                        'specs_name' => $key,
                        'specs_value' => $value,
                    ];
                }
            }
        }

        // Insert specifications into the database
        DB::table('product_specifications')->insert($specifications);
        $count = 0;
        $uploadDir = 'img-prod/';
        // Check if files were uploaded
        $fileKey = 'prod_img1'; // Specify the file key for prod_img1

        $file = $request->file($fileKey);

        $uploadDir = 'img-prod/';

        $count = 0; // Counter for successful uploads

        // Loop through uploaded files
        for ($i = 1; $i <= 5; $i++) {
            $fileKey = 'prod_img' . $i;
            $file = $request->file($fileKey);

            // Check if file exists and is valid
            if ($file && $file->isValid()) {
                // Generate unique filename
                $filename = uniqid('prod_img_') . '_' . $file->getClientOriginalName();

                // Move file to upload directory
                if ($file->move($uploadDir, $filename)) {
                    // Insert filename into database
                    $inserted = DB::table('product_images')->insert([
                        'product_id' => $productId,
                        'filename' => $filename,
                    ]);

                    if ($inserted) {
                        $count++;
                    } else {
                        return response()->json([
                            'message' => 'Failed to insert image into the database',
                            'type' => 'error',
                        ]);
                    }
                } else {
                    return response()->json([
                        'message' => 'Failed to move uploaded file ' . $file->getClientOriginalName(),
                        'type' => 'error',
                    ]);
                }
            } else {
                // If the file doesn't exist or is invalid, continue to the next iteration
                continue;
            }
        }

        if ($count > 0) {
            // Adding data to the inventory
            $currentDate = now()->toDateString();
            $inventoryStatus = 'Selling';

            $addInventory = DB::table('inventories')->insert([
                'SKU' => $prodSku,
                'product_id' => $productId,
                'date_added' => $currentDate,
                'status' => $inventoryStatus,
            ]);

            if ($addInventory) {
                // Return success response
                return response()->json([
                    'message' => 'Product added successfully',
                    'type' => 'success',
                    'data' => $specifications,
                    'count' => $count
                ]);
            } else {
                return response()->json([
                    'message' => 'Failed to add product to inventory',
                    'type' => 'warning',
                ]);
            }
        } else {
            return response()->json([
                'message' => 'No valid images were uploaded',
                'type' => 'warning',
            ]);
        }
        
        // // Return JSON response based on the success or failure of the operations
        // return response()->json(['message' => 'Product added successfully']);
    }
    public function deleteProduct(Request $request){
        $input = $request->getContent();
        $data = json_decode($input, true);

        // Check if the request method is DELETE
        if ($request->isMethod('delete')) {
            // Check if 'del' parameter exists
            if (isset($data['del'])) {
                $id = $data['del'];

                // Use Eloquent or Query Builder to fetch product_id by product_code
                $product = DB::table('products')->where('product_code', $id)->first();

                if ($product) {
                    $prod_id = $product->product_id;

                    // Delete product images from storage
                    $productImages = DB::table('product_images')->where('product_id', $prod_id)->get();

                    foreach ($productImages as $image) {
                        $imagePath = "img-prod/" . $image->filename;
                        if (Storage::exists($imagePath)) {
                            Storage::delete($imagePath);
                        }
                    }

                    // Delete product images from database
                    DB::table('product_images')->where('product_id', $prod_id)->delete();

                    // Delete product specifications
                    DB::table('product_specifications')->where('product_id', $prod_id)->delete();

                    // Delete product inventory
                    DB::table('inventories')->where('product_id', $prod_id)->delete();

                    // Delete product
                    $deleted = DB::table('products')->where('product_code', $id)->delete();

                    if ($deleted) {
                        return response()->json([
                            "message" => "Product Successfully Deleted!",
                            "type" => "success"
                        ]);
                    } else {
                        return response()->json([
                            "message" => "Failed to delete!",
                            "type" => "warning"
                        ]);
                    }
                } else {
                    return response()->json([
                        "message" => "Product not found!",
                        "type" => "error"
                    ]);
                }
            } else {
                return response()->json([
                    "message" => "Missing parameter: del",
                    "type" => "error"
                ]);
            }
        } else {
            return response()->json([
                "message" => "Invalid request method!",
                "type" => "error"
            ]);
        }
    }
    public function getCategoriesProd(){
        $categories = DB::table('categories')->select('name', 'id')->get();

        return response()->json(['data' => $categories]);
    }

    public function getSoloProd(Request $request){
        $productId = $request->input('id');

        // Fetch product details
        $product = DB::table('products as a')
            ->select('a.*', 'b.name as cat_name')
            ->leftJoin('categories as b', 'a.category_id', '=', 'b.id')
            ->where('a.product_id', $productId)
            ->get();

        // Fetch product images
        $productImages = DB::table('product_images')
            ->where('product_id', $productId)
            ->get();

        // Fetch product specifications
        $productSpecifications = DB::table('product_specifications')
            ->where('product_id', $productId)
            ->get();

        // Fetch inventory details
        $inventory = DB::table('inventories')
            ->where('product_id', $productId)
            ->get();

        $data = [
            'info' => $product,
            'img_data' => $productImages,
            'specs_data' => $productSpecifications,
            'inventory' => $inventory
        ];

        return response()->json(['data' => $data]);
    }

    public function editProduct(Request $request){
        $priceOld = $request->input('price_old');
        $newPrice = $request->input('new_price');
        $prodCategory = $request->input('prod_category');
        $sold = 0;

        $prodId = $request->input('product_id');
        $prodName = $request->input('prod_name');
        $prodDesc = $request->input('prod_desc');
        $prodCode = $request->input('prod_code');
        $prodBrand = $request->input('prod_brand');
        $prodStatus = $request->input('prod_status');

        $prodQuantity = $request->input('prod_quantity');
        $prodSku = $request->input('prod_sku');

        $updateResult = DB::table('products')
            ->where('product_id', $prodId)
            ->update([
                'product_code' => $prodCode,
                'name' => $prodName,
                'description' => $prodDesc,
                'price' => $newPrice,
                'old_price' => $priceOld,
                'brand' => $prodBrand,
                'quantity' => $prodQuantity,
                'is_sold' => $sold,
                'popularity_status' => $prodStatus,
                'category_id' => $prodCategory,
            ]);

        if ($updateResult) {
            $specifications = [];
            for ($i = 1; $i <= 7; $i++) {
                if ($request->has("key$i") && $request->has("value$i")) {
                    $id = $request->input("id$i");
                    $key = $request->input("key$i");
                    $value = $request->input("value$i");
                    if (!empty($key) && !empty($value)) {
                        $specifications[] = [
                            'id' => $id,
                            'key' => $key,
                            'value' => $value,
                        ];
                    }
                }
            }

            foreach ($specifications as $spec) {
                $id = $spec['id'];
                $key = $spec['key'];
                $value = $spec['value'];

                DB::table('product_specifications')
                    ->where('specs_id', $id)
                    ->update([
                        'specs_name' => $key,
                        'specs_value' => $value,
                    ]);
            }

            $imageUpdated = false;
            $uploadDir = 'img-prod/';

            for ($i = 1; $i <= 5; $i++) {
                $fileKey = 'prod_img' . $i;
                $file = $request->file($fileKey);

                if ($file && $file->isValid()) {
                    $imageUpdated = true;

                    $filename = uniqid('prod_img_') . '_' . $file->getClientOriginalName();

                    if ($file->move($uploadDir, $filename)) {
                        $updateImageResult = DB::table('product_image')
                            ->where('product_id', $prodId)
                            ->update(['filename' => $filename]);

                        if (!$updateImageResult) {
                            return response()->json([
                                'message' => 'Failed to update image in the database',
                                'type' => 'error',
                            ]);
                        }
                    } else {
                        return response()->json([
                            'message' => 'Failed to move uploaded file ' . $file->getClientOriginalName(),
                            'type' => 'error',
                        ]);
                    }
                }else{
                    continue;
                }
            }
            

            // Update inventory
            $currentDate = now()->toDateString();
            $inventoryStatus = 'Selling';
            $invent = 'false';
            $updateInventoryResult = DB::table('inventories')
                ->where('product_id', $prodId)
                ->update([
                    'SKU' => $prodSku,
                    'date_added' => $currentDate,
                    'status' => $inventoryStatus,
                ]);

            if ($updateInventoryResult) {
                $invent = 'true';
            }else{
                $invent = 'lol';
            }

            return response()->json([
                'message' => 'Product updated successfully',
                'type' => 'success',
                'data' => $specifications,
                'imageUpdate' => $imageUpdated  ,
                'invent' => $invent
                // Optionally, you might want to include 'count' => $count here
            ]);


        } else {
            return response()->json([
                'message' => 'Failed to update product',
                'type' => 'warning',
            ]);
        }
    }

    public function getCategories(){
        $categories = DB::table('categories as a')
            ->select('a.id','a.name','a.description', 'a.creation_date', DB::raw('COUNT(b.category_id) AS product_count'))
            ->leftJoin('products as b', 'a.id', '=', 'b.category_id')
            ->groupBy('a.id','a.name','a.description','b.category_id','a.creation_date')
            ->get();

        if ($categories->isEmpty()) {
            return response()->json([
                "data" => [],
                "message" => "No data found"
            ]);
        } else {
            return response()->json([
                "data" => $categories,
                "message" => "Data found"
            ]);
        }
    }

    public function addCategories(Request $request){
        if ($request->isMethod('post')) {
            $cat_date = $request->input('cat_date');
            $cat_name = $request->input('cat_name');
            $cat_desc = $request->input('cat_desc');

            $inserted = DB::table('categories')->insert([
                'name' => $cat_name,
                'description' => $cat_desc,
                'creation_date' => $cat_date,
            ]);

            if ($inserted) {
                $msg = "Added Successfully!";
                return response()->json(['message' => $msg, 'messageType' => 'success']);
            } else {
                $msg = "Failed";
                return response()->json(['message' => $msg, 'messageType' => 'warning']);
            }
        }
    }

    public function searchCategories(Request $request){
        if ($request->isMethod('get')) {
            if ($request->has('name')) {
                $name = '%' . $request->input('name') . '%';
                $data = DB::table('categories')
                    ->whereRaw("CONCAT(id, name, description) LIKE ?", [$name])
                    ->get()
                    ->toArray();

                if (empty($data)) {
                    return response()->json(['data' => [], 'message' => 'No data found']);
                } else {
                    return response()->json(['data' => $data]);
                }
            } elseif ($request->has('nameDup')) {
                $name = $request->input('nameDup');
                $category = DB::table('categories')
                    ->whereRaw('LOWER(name) = LOWER(?)', [$name])
                    ->first();

                if ($category) {
                    return response()->json(['message' => 'exist']);
                } else {
                    return response()->json(['message' => 'error']);
                }
            } else {
                $data = DB::table('categories')->get()->toArray();

                if (empty($data)) {
                    return response()->json(['data' => [], 'message' => 'No data found']);
                } else {
                    return response()->json(['data' => $data]);
                }
            }
        }
    }

    public function editCategories(Request $request){
        if ($request->isMethod('put')) {
            parse_str(file_get_contents('php://input'), $form_data);

            $id = $form_data['cat_id'];
            $name = $form_data['cat_name'];
            $desc = $form_data['cat_desc'];
            $date = $form_data['cat_date'];

            $updated = DB::table('categories')
                ->where('id', $id)
                ->update([
                    'name' => $name,
                    'description' => $desc,
                    'creation_date' => $date,
                ]);

            if ($updated) {
                $message = "Updated Successfully";
                return response()->json(['message' => $message, 'messageType' => 'success']);
            } else {
                $message = "Update Failed";
                return response()->json(['message' => $message, 'messageType' => 'warning']);
            }
        } else {
            return response()->json(['message' => 'Invalid request method', 'messageType' => 'error']);
        }
    }

    public function deleteCategories(Request $request){
        if ($request->isMethod('delete')) {
            $id = $request->input('dels');

            $deleted = DB::table('categories')
                ->where('id', $id)
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
    
    public function getInventory(Request $request){
        $inventory = DB::table('products as a')
            ->select('a.product_id', 'a.name', 'a.quantity as Stock', 'a.is_sold', 'b.name as category_name', 'c.*', DB::raw('(a.quantity - a.is_sold) as In_Stock'))
            ->join('categories as b', 'b.id', '=', 'a.category_id')
            ->rightJoin('inventories as c', 'a.product_id', '=', 'c.product_id')
            ->get();

        if ($inventory->isEmpty()) {
            return response()->json(["data" => [], "message" => "No data found"]);
        } else {
            return response()->json(["data" => $inventory]);
        }
    }
}

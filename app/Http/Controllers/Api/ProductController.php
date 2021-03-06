<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Illuminate\Support\Arr;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $product = Product::all();
        $product = DB::table('products')
            ->join('categories', 'products.category_id', 'categories.id')
            ->join('suppliers', 'products.supplier_id', 'suppliers.id')
            ->select('categories.category_name', 'suppliers.name', 'products.*')
            ->orderBy('products.id', 'DESC')
            ->get();
        return response()->json($product);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        if ($request->image) {
            $position = strpos($request->image, ';');
            $sub = substr($request->image, 0, $position);
            $ext = explode('/', $sub)[1];


            $name = time() . "." . $ext;
            $img = Image::make($request->image)->resize(240, 200);
            $upload_path = 'backend/product/';
            $image_url = $upload_path . $name;
            $img->save($image_url);

            $product = new Product;
            $product->product_name = $request->product_name;
            $product->product_code = $request->product_code;
            $product->category_id = $request->category_id;
            $product->supplier_id = $request->supplier_id;
            $product->root = $request->root;
            $product->buying_date = $request->buying_date;
            $product->buying_price = $request->buying_price;
            $product->selling_price = $request->selling_price;
            $product->product_quantity = $request->product_quantity;
            $product->image = $image_url;
            $product->save();
        } else {
            $product = new Product;
            $product->product_name = $request->product_name;
            $product->product_code = $request->product_code;
            $product->category_id = $request->category_id;
            $product->supplier_id = $request->supplier_id;
            $product->root = $request->root;
            $product->buying_date = $request->buying_date;
            $product->buying_price = $request->buying_price;
            $product->selling_price = $request->selling_price;
            $product->product_quantity = $request->product_quantity;
            $product->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        return response()->json($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $request;
        if ($request->newphoto) {

            $product = Product::find($id);

            $photo = $product->image;

            if ($photo) {
                $done = unlink($photo);
            }

            $position = strpos($request->newphoto, ';');
            $sub = substr($request->newphoto, 0, $position);
            $ext = explode('/', $sub)[1];


            $name = time() . "." . $ext;
            $img = Image::make($request->newphoto)->resize(240, 200);
            $upload_path = 'backend/product/';
            $image_url = $upload_path . $name;
            $img->save($image_url);

            $product->product_name = $request->product_name;
            $product->product_code = $request->product_code;
            $product->category_id = $request->category_id;
            $product->supplier_id = $request->supplier_id;
            $product->root = $request->root;
            $product->buying_date = $request->buying_date;
            $product->buying_price = $request->buying_price;
            $product->selling_price = $request->selling_price;
            $product->product_quantity = $request->product_quantity;
            $product->photo = $image_url;
            $product->save();
        } else {
            $product = Product::find($id);
            $product->product_name = $request->product_name;
            $product->product_code = $request->product_code;
            $product->category_id = $request->category_id;
            $product->supplier_id = $request->supplier_id;
            $product->root = $request->root;
            $product->buying_date = $request->buying_date;
            $product->buying_price = $request->buying_price;
            $product->selling_price = $request->selling_price;
            $product->product_quantity = $request->product_quantity;
            $product->save();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        $photo = $product->image;
        if ($photo) {
            unlink($photo);
            DB::table('products')->where('id', $id)->delete();
        } else {
            DB::table('products')->where('id', $id)->delete();
        }
    }


    public function stockUpdate(Request $request, $id)
    {
        $data = array();
        $data['product_quantity'] = $request->product_quantity;
        DB::table('products')->where('id', $id)->update($data);
    }
}

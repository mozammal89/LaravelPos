<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;


class CartController extends Controller
{
    //add to cart function
    public function addToCart(Request $request,$id)  
    {
        $product = DB::table('products')->where('id',$id)->first();

        $data = array();
        $data['product_id'] = $id;
        $data['product_name'] = $product->product_name;
        $data['product_qty'] = 1;
        $data['product_price'] = $product->selling_price;
        $data['sub_total'] = $product->selling_price;

        DB::table('pos')->insert($data);
    }

    public function cartProduct(Request $request)
    {
        $cart = DB::table('pos')->get();
        return response()->json($cart);
    }

    public function removeItem(Request $request,$id)
    {
        $item = DB::table('pos')->where('id', $id)->first();
        DB::table('pos')->where('id', $id)->delete();
    }
}

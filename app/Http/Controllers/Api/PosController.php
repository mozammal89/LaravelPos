<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class PosController extends Controller
{
    public function getProduct($id)
    {
        $product = DB::table('products')
                    ->where('category_id',$id)
                    ->get();
        return response()->json($product);
    }

    public function orderDone(Request $request)
    {

        $validateData = $request->validate([
            'customer_id' => 'required',
            'payby' => 'required',
        ]);
            $data = array();
            $data['customer_id'] = $request->customer_id;
            $data['qty'] = $request->qty;
            $data['sub_total'] = $request->subtotal;
            $data['vat'] = $request->vat;
            $data['total_vat'] = $request->totalvat;
            $data['total'] = $request->total;
            $data['pay'] = $request->pay;
            $data['due'] = $request->due;
            $data['payby'] = $request->payby;
            $data['order_date'] = date('d-m-Y');
            $data['order_month'] = date('F');
            $data['order_year'] = date('Y');
            $order_id = DB::table('orders')->insertGetId($data);

            $conents = DB::table('pos')->get();

            $odata =array();
            foreach($conents as $conent){
                $odata['order_id'] = $order_id;
                $odata['product_id'] = $conent->product_id;
                $odata['product_qty'] = $conent->product_qty;
                $odata['product_price'] = $conent->product_price;
                $odata['sub_total'] = $conent->sub_total;
                DB::table('order_details')->insert($odata);


                    DB::table('products')
                        ->where('id',$conent->product_id)
                        ->update(['product_quantity' => DB::raw('product_quantity -' . $conent->product_qty)]);
            }

            DB::table('pos')->delete();
            return response('done');
    }
}

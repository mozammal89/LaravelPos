<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //
    public function todayOrder(Request $request)
    {
        $today = date('d-m-Y');
        $order = DB::table('orders')
                ->join('customers','orders.customer_id','customers.id')
                ->where('order_date',$today)
                ->select('customers.name','orders.*')
                ->orderBy('orders.id','DESC')
                ->get();

        return response()->json($order);
    }

    public function orderDetails($id)
    {
        $order = DB::table('orders')
                ->join('customers','orders.customer_id','customers.id')
                ->where('orders.id',$id)
                ->select('customers.name','customers.phone','customers.address','orders.*')
                ->orderBy('orders.id','DESC')
                ->first();

        return response()->json($order);
    }

    public function orderOrderDetails($id)
    {
        $details = DB::table('order_details')
                ->join('products','order_details.product_id','products.id')
                ->where('order_details.order_id',$id)
                ->select('products.product_name','products.product_code','products.image','order_details.*')
                ->get();
                return response()->json($details);
    }


    public function searchOrder(Request $request)
    {
        $orderdate = $request->date;
        $formatdate = new DateTime($orderdate);
        $date = $formatdate->format('d-m-Y');


        $order = DB::table('orders')
                ->join('customers','orders.customer_id','customers.id')
                ->where('order_date',$date)
                ->select('customers.name','orders.*')
                ->orderBy('orders.id','DESC')
                ->get();

        return response()->json($order);
    }
}

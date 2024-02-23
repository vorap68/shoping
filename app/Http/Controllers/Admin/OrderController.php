<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allOrders()
    {
        $orders = Order::all();
    return view('admin.orders.index',compact('orders'));    }




    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        echo 'show';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function ordersCategory(Category $category)
    {
        $orders_category = DB::table('order_product')->
        select('order_id','created_at','code')->
        selectRaw('sum(price) as summma_in_category')->
        where('category_id',$category->id)->
        groupBy('order_id')->
        get();
        return view('admin.orders.orders_in_category',compact('orders_category','category'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function orderDelete(Order $order)
    {
        $order->delete();
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderPersonController extends Controller
{
       /**
     * @return collection All orders current user
     */
 public function index(){
         $orders_user = Auth::user()->orders;
    if($orders_user->count() == 0){
       session()->flash('warning', __('order.your_orders_empty'));
        return redirect()->route('main');
    };

    return view('auth.orders.index',compact('orders_user'));
 }

 /**
  * @param object order
  */
  public function show(Order $order){
    return view('auth.orders.show',compact('order'));
  }
}

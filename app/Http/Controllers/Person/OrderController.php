<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{

    /**
     * @return collection All orders current user
     */
 public function index(){
    echo $user_id = Auth::user()->id;
    $orders_user = Order::where('user_id',$user_id)->get();
    return view('auth.orders.index',compact('orders_user'));
 }

 /**
  * @param object order
  */
  public function show(Order $order){
    return view('auth.orders.show',compact('order'));
  }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'phone', 'status','user_id',
    ];


    /**
     *  Get pivot table order_product
     */
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('count', 'price')->withTimestamps();
    }

    /**
     * @return integer sum
     * Get fullSum for current oreder
     */

    public function getFullSum()
    {
        $sum = 0;
        foreach ($this->products as $productInOrder) {
            $sum += $productInOrder->pivot->price * $productInOrder->pivot->count;
        }
        return $sum;
    }


    public static function  saveOrder($name, $phone)
    {
       $order = Order::findOrFail(session('order_id'));
       $order->name = $name;
       $order->phone = $phone;
       $order->status = 1;
       $order->user_id = Auth::user()->id;
       $order->sum = self::getFullSum();
       $success = $order->save();

      if($success){
        session()->flash('success',__('order.Your_order_accept'));
       } else{
        session()->flash('warning',__('order.Your_order_canceled'));
       };
session()->forget('order_id');
return redirect()->back();
    }
}

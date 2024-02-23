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
        'name', 'phone', 'status', 'user_id','sum','code',
    ];


    /**
     *  Get pivot table order_product
     */
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('count', 'price','category_id','code')->withTimestamps();
    }

    /**
     * Get user for this order
     */
    public function user(){
        return $this->belongsTo(User::class);
    }

    /**
     * @return integer sum
     * Get fullSum for current order
     */

    public function getFullSum()
    {
        $sum = 0;
        foreach ($this->products as $productInOrder) {
            $sum += $productInOrder->pivot->price * $productInOrder->pivot->count;
        }
        return $sum;
    }

    /**
     * @return string code
     * Get code current currency for this order
     */
    public function getCodeCurrency()
    {
        foreach ($this->products as $productInOrder) {
            $code= $productInOrder->pivot->code;
        }
       return $code;
    }


    public  function  saveOrder($name, $phone)
    {
        $order = Order::findOrFail(session('order_id'));
        $order->name = $name;
        $order->phone = $phone;
        $order->status = 1;
        $order->user_id = Auth::user()->id;
        $order->sum = $this->getFullSum();
        $order->code = $this->getCodeCurrency();
          $success = $order->save();

        if ($success) {
            session()->flash('success', __('order.Your_order_accept'));
        } else {
            session()->flash('warning', __('order.Your_order_canceled'));
        };
        session()->forget('order_id');
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Traits\LingvoTrait;
use App\Classes\Basket;
use Auth;

class BasketController extends Controller
{
    use LingvoTrait;

    /**
     * @return view basket with current order
     */
    public function basket()
    {
        $basket = new Basket;
        $order = $basket->getOrder();
        return view('basket', compact('order'));
    }

    /**
     * @return view checkout
     */
    public function basketPlace()
    {
        $basket = new Basket;
        $order = $basket->getOrder();
        return view('order', compact('order'));
    }


    public function basketAdd(Product $product)
    {
        $basket = new Basket;
        $success = $basket->addProduct($product);
     if($success){
        session()->flash('success', __('basket.your_product_changed'));
    }else{
        session()->flash('warning',__('basket.this_product_tempory_not_avaliable'));
    }
        return redirect()->back();
    }

    public function basketRemove(Product $product)
    {
        $basket = new Basket;
        $success =  $basket->removeProduct($product);
            session()->flash('success', __('basket.your_product_changed'));
            if($success){
                session()->flash('success', __('basket.your_product_changed'));
            }else{
                session()->flash('warning',__('basket.your_product_not_changed'));
            }

        return redirect()->back();
    }

    public function basketDelete(Product $product)
    {
        $basket = new Basket;
        $basket->deleteProduct($product);
        session()->flash('success', __('basket.your_product_removed'));
        return redirect()->back();
    }

    public function basketConfirm(Request $request){
       $email = Auth::check() ? Auth::user()->email : $request->email;
       $success = (new Basket())->saveOrder($email,$request->name,$request->phone);
       if($success){
        session()->flash('success',__('order.Your_order_accept'));
       } else{
        session()->flash('warning',__('order.Your_order_canceled'));
       };

       return redirect()->route('main');
    }

}

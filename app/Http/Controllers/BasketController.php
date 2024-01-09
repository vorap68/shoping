<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Traits\LingvoTrait;
use App\Classes\Basket;

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
        $basket->addProduct($product);
        session()->flash('success', __('basket.your_product_changed'));
        return redirect()->back();
    }

    public function basketRemove(Product $product)
    {
        $basket = new Basket;
        $basket->removeProduct($product);
        session()->flash('success', __('basket.your_product_changed'));
        return redirect()->back();
    }

    public function basketDelete(Product $product)
    {
        $basket = new Basket;
        $basket->deleteProduct($product);
        session()->flash('success', __('basket.your_product_removed'));
        return redirect()->back();
    }
}

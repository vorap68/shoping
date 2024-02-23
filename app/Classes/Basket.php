<?php

namespace App\Classes;

use App\Models\Order;
use App\Models\Product;


class Basket
{

    protected $order;

    /**
     * create or get order
     */
    public function __construct()
    {
        $orderId = session('order_id');
        //dd($orderId);
        if (!is_null($orderId)) {
            $this->order = Order::find($orderId);
            //dd($this->order);
        } else {
            $this->order = Order::create();
            session(['order_id' => $this->order->id]);
        }
    }

    /**
     * @return object current order
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @return integer count product from DB
     */

    public function countAvaliable()
    {
        foreach ($this->order->products as $order_product) {

            $pivotRow = $order_product->pivot;
            $product =  Product::findOrFail($pivotRow->product_id);
            $productCount = $product->count;
            if ($pivotRow->count > $productCount || $productCount == 0) {
                session()->flash('warning', __('basket.this_product_tempory_not_avaliable'));
                return false;
            }
            $product->update(['count' => ($productCount - $pivotRow->count)]);
        }
        return true;
    }

    /**
     * Plus count for this product into table order_product
     * or create new date into table order_product
     *
     */
    public function addProduct(Product $product)
    {
        if ($this->order->products->contains($product)) {
            $pivotRow = $this->order->products()->where('product_id', $product->id)->first()->pivot;
            $countInOrder = $pivotRow->count;
            if ($countInOrder >= $product->count) {
                return false;
            }
            $this->order->products()->updateExistingPivot($product->id, ['count' => ($countInOrder + 1)]);
        } else {
            if ($product->count >= 1) {
                $this->order->products()->attach($product->id, [
                    'count' => 1,
                    'price' => $product->price,
                    'category_id' => $product->category->id,
                    'code' => session('currency'),
                ]);
            } else {

                return false;
            }
        }
        return true;
    }


    /**
     * Minus count for this product into table order_product
     * or delete existitg date from table order_product
     *
     */
    public function removeProduct(Product $product)
    {
        $pivotRow = $this->order->products()->where('product_id', $product->id)->first()->pivot;
        $countInOrder = $pivotRow->count;
        if ($countInOrder > 1) {
            $this->order->products()->updateExistingPivot($product->id, ['count' => ($countInOrder - 1)]);
        } else {
            $this->order->products()->detach($product->id);
        }
    }


    /**
     * Delete this product from basket
     */
    public function deleteProduct(Product $product)
    {
        $this->order->products()->detach($product->id);
    }

    public function saveOrder($email, $name, $phone)
    {
        if (!$this->countAvaliable()) {
            return false;
        }

        return $this->order->saveOrder($name, $phone);
    }
}

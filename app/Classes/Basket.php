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
        if (!is_null($orderId)) {
            $this->order = Order::find($orderId);
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

    public function countAvaliable($product)
    {
        return $product->count;
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
            $this->order->products()->updateExistingPivot($product->id, ['count' => ($countInOrder + 1)]);
        } else {
            if ($this->countAvaliable($product) >= 1) {
                $this->order->products()->attach($product->id, [
                    'count' => 1,
                    'price' => $product->price,
                ]);
            }
        }
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
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'phone', 'status',
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


    public static function  saveOrder()
    {

    }
}

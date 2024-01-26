<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Traits\LingvoTrait;
use App\Models\Order;
use App\Services\CurrencyConversion;

/**
 * App\Models\Product
 *
 * @property int $id
 * @property int $category_id
 * @property string $name_ua
 * @property string $name_ru
 * @property string|null $description_ua
 * @property string|null $description_ru
 * @property string|null $image
 */
class Product extends Model
{
    use HasFactory, LingvoTrait;

    protected $fillable = [
        'name_ua', 'name_ru', 'description_ua', 'description_ru', 'image', 'image_thumb', 'count', 'price',
    ];

    /**
     * @return object
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return array
     */

    public function ordes()
    {
        return $this->belongsToMany(Order::class)->withPivot('count');
    }

    public function getPriceAttribute($value)
    {
        if (empty(session('currency'))) {
            session(['currency' => "UAH"]);
        }
        return   CurrencyConversion::convert($value);
    }
}

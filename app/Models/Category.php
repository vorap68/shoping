<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Traits\LingvoTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $code
 * @property string $name_ua
 * @property string $name_ru
 * @property string|null $description_ua
 * @property string|null $image
 * @property string|null $description_ru
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereDescriptionRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereDescriptionUa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereNameRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereNameUa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Category extends Model
{
    use LingvoTrait , HasFactory;

    protected $fillable = [
        'code','name_ua','name_ru','description_ua','description_ru','image',
    ];

    public function products(){
        return $this->hasMany(Product::class);
    }
}

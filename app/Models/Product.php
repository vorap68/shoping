<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Traits\LingvoTrait;

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
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDescriptionRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDescriptionUa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereNameRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereNameUa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Product extends Model
{
    use HasFactory , LingvoTrait ;

    protected $fillable = [
        'name_ua','name_ru','description_ua','description_ru','image','image_thumb',
    ];

    // protected $cast =[
    //     'image'=> 'array',
    // ];

    /**
     * @return object
     */
    public function category(){
        return $this->belongsTo(Category::class);
    }
}

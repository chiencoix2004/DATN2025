<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';
    protected $fillable = [
        'category_id',
        'name',
        'sku',
        'slug',
        'image_avatar',
        'price_regular',
        'price_sale',
        'discount_percent',
        'description',
        'material',
        'views',
        'quantity',
        'start_date',
        'end_date',
        'is_active',
    ];
    protected $casts = [
        'is_active' => 'boolean',
    ];
    public function category()
    {
        // 1-1
        return $this->belongsTo(Category::class);
    }
    public function images()
    {
        // 1-n
        return $this->hasMany(ProductImageModel::class);
    }
    public function tags()
    {
        // n-n
        return $this->belongsToMany(Tag::class);
    }
    public function product_variants()
    {
        // 1-n
        return $this->hasMany(ProductVariant::class);
    }
}

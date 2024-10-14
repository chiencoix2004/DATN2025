<?php

namespace App\Models;

use Database\Seeders\ProductImageSeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductModel extends Model
{
    use HasFactory;
    use SoftDeletes;
     
    protected $table = 'products';
    protected $fillable = [
        'category_id',
        'name', 
        'sku',
        'price_regular',
        'price_sale',
        'discount_percent',
        'description',
        'material',
        'views',
        'quantity',
        'is_active',
        'start_date',
        'end_date',
    ];

    public function category()
    {
        return $this->belongsTo(CategoryModel::class, 'category_id');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetailModel::class, 'product_id');
    }

    public function productImages()
    {
        return $this->hasMany(ProductImageModel::class, 'product_id');
    }

    public function comments()
    {
        return $this->hasMany(CommentModel::class, 'products_id');
    }
}

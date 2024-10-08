<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'category_id',
        'image',
    ];


    public function getOneProductList()
    {
        $data = ProductModel::all();
        return $data;
    }
}

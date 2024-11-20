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
        return $this->hasMany(ProductImage::class);
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

    public function searchproduct($keywd){
        return $this
        ->join('categories','products.category_id','=','categories.id')

        ->where('products.name','like','%'.$keywd.'%')
        ->orWhere('sku','like','%'.$keywd.'%')
        ->orWhere('categories.name','like','%'.$keywd.'%')
        ->select('products.*')
        ->get();


    }
    function searchproductbyprice($min,$max){
        return $this
        ->join('categories','products.category_id','=','categories.id')

        ->whereBetween('products.price_regular',[$min,$max])
        ->select('products.*')
        ->get();
    }
    function searchproductbycategory($id,$keywd){
        return $this
        ->join('categories','products.category_id','=','categories.id')

        ->where('categories.id',$id)
        ->where(function ($query) use ($keywd) {
            $query->where('products.name', 'like', '%' . $keywd . '%')
                  ->orWhere('products.sku', 'like', '%' . $keywd . '%')
                  ->orWhere('categories.name', 'like', '%' . $keywd . '%');
        })
        ->select('products.*')
        ->get();
    }
    function searchproductbytag($id){
        return $this
        ->join('product_tag','products.id','=','product_tag.product_id')
        ->join('tags','product_tag.tag_id','=','tags.id')

        ->where('tags.id',$id)
        ->select('products.*')
        ->get();
    }
    function searchproductbypriceandcategory($min,$max,$id){
        return $this
        ->join('categories','products.category_id','=','categories.id')

        ->whereBetween('products.price_regular',[$min,$max])
        ->where('categories.id',$id)
        ->select('products.*')
        ->get();
    }
    function searchproductbypriceandtag($min,$max,$id){
        return $this
        ->join('product_tag','products.id','=','product_tag.product_id')
        ->join('tags','product_tag.tag_id','=','tags.id')

        ->whereBetween('products.price_regular',[$min,$max])
        ->where('tags.id',$id)
        ->select('products.*')
        ->get();
    }
    function seachproductatoz($keywd){
        return $this
        ->join('categories','products.category_id','=','categories.id')

        ->where(function ($query) use ($keywd) {
            $query->where('products.name', 'like', '%' . $keywd . '%')
                  ->orWhere('products.sku', 'like', '%' . $keywd . '%')
                  ->orWhere('categories.name', 'like', '%' . $keywd . '%');
        })
        ->select('products.*')
        ->orderBy('products.name','asc')
        ->get();
    }
    function seachproductztoa($keywd){
        return $this
        ->join('categories','products.category_id','=','categories.id')

        ->where(function ($query) use ($keywd) {
            $query->where('products.name', 'like', '%' . $keywd . '%')
                  ->orWhere('products.sku', 'like', '%' . $keywd . '%')
                  ->orWhere('categories.name', 'like', '%' . $keywd . '%');
        })
        ->select('products.*')
        ->orderBy('products.name','desc')
        ->get();
    }
    function seachproductrateprice($keywd){
        return $this
        ->join('categories','products.category_id','=','categories.id')

        ->where(function ($query) use ($keywd) {
            $query->where('products.name', 'like', '%' . $keywd . '%')
                  ->orWhere('products.sku', 'like', '%' . $keywd . '%')
                  ->orWhere('categories.name', 'like', '%' . $keywd . '%');
        })
        ->select('products.*')
        ->orderBy('products.price_regular','asc')
        ->get();
    }

    function searchhint($keywd){
        return $this
        ->where('name','like','%'.$keywd.'%')
        ->orWhere('material','like','%'.$keywd.'%')
        ->orWhere('description','like','%'.$keywd.'%')
        ->select('name')
        ->limit(5)
        ->get();
    }
    function seachproductpricelowtohigh($keywd){
        return $this
        ->join('categories','products.category_id','=','categories.id')

        ->where(function ($query) use ($keywd) {
            $query->where('products.name', 'like', '%' . $keywd . '%')
                  ->orWhere('products.sku', 'like', '%' . $keywd . '%')
                  ->orWhere('categories.name', 'like', '%' . $keywd . '%');
        })
        ->select('products.*')
        ->orderBy('products.price_sale','asc')
        ->get();
    }
    function seachproductpricehightolow($keywd){
        return $this
        ->join('categories','products.category_id','=','categories.id')

        ->where(function ($query) use ($keywd) {
            $query->where('products.name', 'like', '%' . $keywd . '%')
                  ->orWhere('products.sku', 'like', '%' . $keywd . '%')
                  ->orWhere('categories.name', 'like', '%' . $keywd . '%');
        })
        ->select('products.*')
        ->orderBy('products.price_sale','desc')
        ->get();
    }
    function searchproductprice($keywd, $min, $max) {
        return $this
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('product_images', 'products.id', '=', 'product_images.product_id')
            ->where(function ($query) use ($keywd) {
                $query->where('products.name', 'like', '%' . $keywd . '%')
                      ->orWhere('products.sku', 'like', '%' . $keywd . '%')
                      ->orWhere('categories.name', 'like', '%' . $keywd . '%');
            })
            ->whereBetween('products.price_sale', [$min, $max])
            ->select('products.*')
            ->get();
    }


}

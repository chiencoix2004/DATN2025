<?php

namespace Modules\Client\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ColorAttribute;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\SizeAttribute;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product::query()->where(['is_active' => 1])->latest('id')->paginate(9);
        $tags = Tag::query()->get();
        $categories = Category::query()->get();
        $colors = ColorAttribute::query()->get();
        $sizes = SizeAttribute::query()->get();
        return view('client::contents.shops.shopIndex', compact('data', 'tags', 'categories', 'colors', 'sizes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function rendAjax(Request $request)
    {
        $prdVariants = ProductVariant::query()->with(['color:id,color_value'])->where([
            'size_attribute_id' => $request->idSize,
            'product_id' => $request->prd_id
        ])->get();
        if (count($prdVariants) > 0) {
            return response()->json([
                'data' => $prdVariants->pluck('color')
            ]);
        } else {
            return response()->json([
                'error' => 'Không tìm thấy biến thể màu cho sản phẩm này!'
            ]);
        }
    }
    public function rendPrdV(Request $request)
    {
        $prdVariants = ProductVariant::query()->with(['color:id,color_value'])->where([
            'product_id' => $request->prd_id,
            'size_attribute_id' => $request->idSize,
            'color_attribute_id' => $request->idColor
        ])->first();
        if ($prdVariants) {
            $color = $prdVariants->color;
            $size = $prdVariants->size;
            return response()->json([
                'id' => $prdVariants->id,
                'product_id' => $prdVariants->product_id,
                'color_attribute_id' => $prdVariants->color_attribute_id,
                'size_attribute_id' => $prdVariants->size_attribute_id,
                'color_value' => $color->color_value,
                'size_value' => $size->size_value,
                'price_default' => $prdVariants->price_default,
                'price_sale' => $prdVariants->price_sale,
                'start_date' => $prdVariants->start_date,
                'end_date' => $prdVariants->end_date,
                'quantity' => $prdVariants->quantity,
            ]);
        } else {
            return response()->json([
                'error' => 'Không tìm thấy biến thể sản phẩm với màu và kích thước bạn đã chọn!'
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
    }

    /**
     * Show the specified resource.
     */
    public function show(string $slug)
    {
        $data = Product::query()->where(['slug' => $slug])->first();
        if ($data) {
            $realedProducts = Product::query()->where(['category_id' => $data->category_id])->where('id', '!=', $data->id)->get();
            // dd($realedProducts);
            return view('client::contents.shops.productDetail', compact('data', 'realedProducts'));
        } else {
            return abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('client::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}

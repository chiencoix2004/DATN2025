<?php

namespace Modules\Client\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\CouponModel;
use App\Models\ProductVariant;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function add(Request $request)
    {

        $productId = $request->product_id;
        $productVariantId = ProductVariant::where('product_id', '=', $productId)
            ->where('color_attribute_id', '=', $request->color_attribute_id)
            ->where('size_attribute_id', '=', $request->size_attribute_id)
            ->first()->id;
        $quantity = $request->quantity;

        // dd($productVariantId);
        if (auth()->check()) {
            // Người dùng đã đăng nhập
            $cart = Cart::firstOrCreate(['user_id' => auth()->id()]);
            $cartItem = $cart->cartItems()->firstOrCreate(['product_id' => $productId, 'product_variant_id' => $productVariantId], ['quantity' => 0]);
            $cartItem->increment('quantity', $quantity);
            // dd($cartItem);
        }
        return response()->json(['message' => 'Thêm vào giỏ hàng thành công!'], 200);
    }

    public function index(Request $request)
    {
        if (auth()->check()) {
            // Người dùng đã đăng nhập
            $cart = Cart::firstOrCreate(['user_id' => auth()->id()]);
            // dd($cart);
            //$cart = Cart::where('user_id', auth()->user()->id)->first();
        } else {
            redirect()->route('client.login')->with('message', 'Bạn cần đăng nhập để thực hiện chức năng này!');
        }
        // dd($cart);
        return view('client::contents.shops.cart', compact('cart'));
    }

    public function update(Request $request, $id)
    {
        if (auth()->check()) {
            // Người dùng đã đăng nhập
            $cartItem = CartItem::findOrFail($id);
            $cartItem->quantity = $request->quantity;
            $cartItem->save();
            return response()->json(['message' => 'Cập nhật giỏ hàng thành công!']);
        }
    }

    public function remove($id)
    {
        if (auth()->check()) {
            $cartItem = CartItem::findOrFail($id);
            if ($cartItem) {
                $cartItem->delete();
                return response()->json(['message' => 'Xóa sản phẩm khỏi giỏ hàng thành công!'], 200);
            } else {
                return response()->json(['message' => 'Xóa sản phẩm khỏi giỏ hàng thất bại!'], 400);
            }
        }
    }

    public function applyCoupon(Request $request)
    {
        $couponCode = $request->coupon_code;
        $userId = auth()->check() ? auth()->user()->id : null;
        $sessionId = $request->session()->getId();

        $coupon = CouponModel::where('code', $couponCode)->first();
        if (!$coupon) {
            return response()->json(['message' => 'Mã voucher không hợp lệ!'], 400);
        }

        // Kiểm tra điều kiện áp dụng coupon (ví dụ: ngày hết hạn, giá trị đơn hàng tối thiểu)
        // ...

        if (auth()->check()) {
            // Người dùng đã đăng nhập
            $cart = Cart::where('user_id', $userId)->first();
            $cart->coupon_id = $coupon->id;
            $cart->save();
        } else {
            // Người dùng chưa đăng nhập
            $cart = $request->session()->get('cart', []);
            $cart['coupon_id'] = $coupon->id; // Lưu coupon_id vào session
            $request->session()->put('cart', $cart);
        }

        return response()->json(['message' => 'Áp dụng voucher thành công!']);
    }

    public function checkout(Request $request)
    {
        $userId = auth()->check() ? auth()->user()->id : null;
        $sessionId = $request->session()->getId();

        if (auth()->check()) {
            // Người dùng đã đăng nhập
            $cart = Cart::where('user_id', $userId)->first();
        } else {
            // Người dùng chưa đăng nhập
            $cartItems = $request->session()->get('cart', []);
            // Chuyển đổi dữ liệu từ session sang dạng tương tự khi lấy từ database
            $cart = (object)[
                'cartItems' => collect($cartItems)->map(function ($item) {
                    $item['productVariant'] = ProductVariant::find($item['product_variant_id']);
                    return (object)$item;
                })
            ];
        }

        // Lấy thông tin từ giỏ hàng để tạo đơn hàng
        // ...

        return view('client::contents.shops.checkout', compact('cart')); // Hoặc redirect đến trang thanh toán
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('client::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        return view('client::show');
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('client::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('client::edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}

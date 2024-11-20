<?php

namespace Modules\Client\App\Http\Controllers;

use Exception;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\CartItem;
use App\Models\CouponModel;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\ProductVariant;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    private $messages;
    public function __construct()
    {
        $this->messages = [
            'user_address.required' => 'Vui lòng nhập địa chỉ của bạn.',
            'user_phone.required' => 'Vui lòng nhập số điện thoại của bạn',
            'user_phone.number' => 'Vui lòng nhập số',
            'user_phone.regex' => 'Số điện thoại không đúng định dạng. Vui lòng nhập đúng số điện thoại.',
            'user_name.required' => 'Vui lòng nhập tên của bạn.',
            'user_name.max' => 'Tên của bạn không được quá 50 kí tự.',
            'user_email.required' => 'Vui lòng nhập email của bạn.',
            'user_email.email' => 'Email không đúng định dạng.',
            'payment_method.required' => 'Vui lòng chọn phương thức thanh toán.'
        ];
    }

    public function add(Request $request)
    {

        $productId = $request->product_id;
        $productVariantId = ProductVariant::where('product_id', '=', $productId)
            ->where('color_attribute_id', '=', $request->color_attribute_id)
            ->where('size_attribute_id', '=', $request->size_attribute_id)
            ->first()->id;
        $quantity = $request->quantity;
        $total_amount = 0;
        $product_image = Product::find($productId)->image_avatar;
        // dd($productVariantId);
        if (auth()->check()) {
            // Người dùng đã đăng nhập
            $cart = Cart::firstOrCreate(['user_id' => auth()->id()]);
            $cartItem = $cart->cartItems()->firstOrCreate(['product_id' => $productId, 'product_variant_id' => $productVariantId], ['quantity' => 0, 'price' => 0, 'price_total' => 0]);
            $cartItem->increment('quantity', $quantity);

            if ($cartItem) {
                $productVariant = ProductVariant::find($productVariantId);
                if ($productVariant) {
                    $current_date = now();
                    $price_sale = $productVariant->price_sale;
                    $start_date = $productVariant->start_date;
                    $end_date = $productVariant->end_date;
                    $price_default = $productVariant->price_default;
                    if ($price_sale !== null && $start_date !== null && $end_date !== null) {
                        // Kiểm tra xem thời gian hiện tại có nằm trong khoảng thời gian khuyến mãi không
                        if ($current_date >= $start_date && $current_date <= $end_date) {
                            $price = $price_sale; // Trong khoảng thời gian khuyến mãi
                        } else {
                            $price = $price_default; // Không trong khoảng thời gian khuyến mãi
                        }
                    } elseif ($price_sale !== null && $start_date === null && $end_date === null) {
                        $price = $price_sale; // Không có thời gian, chỉ có giá khuyến mãi
                    } elseif ($price_sale === null && $start_date === null && $end_date === null) {
                        $price = $price_default; // Không có giá khuyến mãi, trả về giá mặc định
                    };
                    if ($price !== null) {
                        $cartItem->price = $price;
                        $cartItem->total_price = $cartItem->quantity * $price;
                        $cartItem->product_image = $product_image;
                        $cartItem->save();
                    };
                }
            }
            $listCartItem = CartItem::where('cart_id', $cart->id)->get();
            foreach ($listCartItem as $item) {
                $productVariant = ProductVariant::find($item->product_variant_id);
                if ($productVariant) {
                    $current_date = now();
                    $price_sale = $productVariant->price_sale;
                    $start_date = $productVariant->start_date;
                    $end_date = $productVariant->end_date;
                    $price_default = $productVariant->price_default;
                    if ($price_sale !== null && $start_date !== null && $end_date !== null) {
                        // Kiểm tra xem thời gian hiện tại có nằm trong khoảng thời gian khuyến mãi không
                        if ($current_date >= $start_date && $current_date <= $end_date) {
                            $price = $price_sale; // Trong khoảng thời gian khuyến mãi
                        } else {
                            $price = $price_default; // Không trong khoảng thời gian khuyến mãi
                        }
                    } elseif ($price_sale !== null && $start_date === null && $end_date === null) {
                        $price = $price_sale; // Không có thời gian, chỉ có giá khuyến mãi
                    } elseif ($price_sale === null && $start_date === null && $end_date === null) {
                        $price = $price_default; // Không có giá khuyến mãi, trả về giá mặc định
                    };
                    if ($price !== null) {
                        $total_amount += $item->quantity * $price;
                    };
                }
            }
            $cart->total_amount = $total_amount;
            $cart->save();
        }
        return response()->json(['message' => 'Thêm vào giỏ hàng thành công!'], 200);
    }

    public function index()
    {
        return view('client::contents.shops.cart');
    }

    public function list()
    {
        if (auth()->check()) {
            $cart = Cart::where('user_id', auth()->id())->first();
            $cartItems = CartItem::where('cart_id', $cart->id)
                ->with("productVariant")
                ->with("productVariant.size")
                ->with("productVariant.color")
                ->with("productVariant.product")
                ->get();
            return response()->json([
                'cartItems' => $cartItems,
                'totalAmount' => $cart->total_amount,
                'discount' => session('discount') ? session('discount') : 0,
                'discount_code' => session('discount_code') ? session('discount_code') : '',
                'message' => 'Lấy danh sách giỏ hàng thành công!'
            ], 200);
        } else {
            return response()->json(['message' => 'chưa đăng nhập'], 200);
        }
    }

    public function update(Request $request, $id)
    {
        if (auth()->check()) {
            // Người dùng đã đăng nhập
            $cartItem = CartItem::findOrFail($id);
            if (!$cartItem) {
                return response()->json(['error' => 'Sản phẩm không tồn tại trong giỏ hàng!'], 400);
            }
            $cartItem->quantity = $request->quantity;
            $cartItem->total_price = $cartItem->quantity * $cartItem->price;
            $cartItem->save();
            $cart = Cart::where('user_id', auth()->id())->first();
            $cart->total_amount = CartItem::where('cart_id', $cart->id)->sum('total_price');
            $cart->save();
            return response()->json([

                'success' => 'Cập nhật giỏ hàng thành công!'
            ], 200);
        }
    }

    public function remove($id)
    {
        if (auth()->check()) {
            $cartItem = CartItem::findOrFail($id);
            if ($cartItem) {
                $cartItem->delete();
                $cart = Cart::where('user_id', auth()->id())->first();
                $cart->total_amount = CartItem::where('cart_id', $cart->id)->sum('total_price');
                $cart->save();
                return response()->json(['success' => 'Xóa sản phẩm khỏi giỏ hàng thành công!'], 200);
            } else {
                return response()->json(['error' => 'Xóa sản phẩm khỏi giỏ hàng thất bại!'], 400);
            }
        }
    }
    public function removeDiscountCode(Request $request)
    {
        // Xóa mã giảm giá khỏi phiên
        $request->session()->forget('discount');
        $request->session()->forget('discount_code');
        return response()->json(['success' => true], 200);
    }

    public function applyCoupon(Request $request)
    {
        $coupon = CouponModel::where('code', $request->coupon_code)->first();
        if ($coupon) {
            $current_date = date('Y-m-d');
            $order_total = Cart::where('user_id', auth()->id())->first()->total_amount;
            if ($current_date < $coupon->date_start) {
                return response()->json(['error' => 'Mã giảm giá chưa có hiệu lực.'], 400);
            } elseif ($current_date > $coupon->date_end) {
                return response()->json(['error' => 'Mã giảm giá đã hết hạn.'], 400);
            } elseif ($order_total < $coupon->minimum_spend) {
                return response()->json(['error' => 'Số tiền chi tiêu phải lớn hơn hoặc bằng ' . $coupon->minimum_spend . '.'], 400);
            } elseif ($order_total > $coupon->maximum_spend) {
                return response()->json(['error' => 'Số tiền chi tiêu phải nhỏ hơn hoặc bằng ' . $coupon->maximum_spend . '.'], 400);
            } else {
                // Tính toán giá trị giảm giá
                if ($coupon->discount_type == 'percent') {
                    $discount_value = ($order_total * $coupon->discount_amount) / 100;
                } elseif ($coupon->discount_type == 'fixed') {
                    $discount_value = $coupon->discount_amount;
                };

                // Kiểm tra số lượng mã giảm giá
                if ($coupon->quantity > 0) {

                    session(['discount' => $discount_value]);
                    session(['discount_code' => $request->coupon_code]);

                    return response()->json([
                        'success' => 'Áp dụng mã giảm giá thành công!',
                    ], 200);
                } else {
                    return response()->json(['error' => 'Mã giảm giá đã sử dụng hết.'], 400);
                }
            }
        } else {
            return response()->json(['error' => 'Mã giảm giá không tồn tại!'], 400);
        }
    }

    public function order()
    {   
        $userId = auth()->check() ? auth()->user()->id : null;

        if (auth()->check()) {
            $cart = Cart::where('user_id', $userId)->first();
            $cartItems = CartItem::where('cart_id', $cart->id)
                ->with("productVariant")
                ->with("productVariant.size")
                ->with("productVariant.color")
                ->with("productVariant.product")
                ->get();
            
            if ($cartItems->count() == 0) {
                return redirect()->route('cart.index');
            }

            // dd([$cart,$cartItems]);
        } else {
            return redirect()->route('showForm');
        }
        return view('client::contents.shops.checkout', compact(['cartItems', 'cart', 'userId'])); // Hoặc redirect đến trang thanh toán
    }

    public function checkout(Request $request)
    {   

        
        try {
            $userId = $request->input('user_id');
            $first_name = $request->input('first_name');
            $last_name = $request->input('last_name');
            $ship_user_name = $last_name . ' ' . $first_name;
            $ship_user_phone = $request->input('user_phone');
            $ship_user_email = $request->input('user_email');
            $ship_user_address = $request->input('user_address');
            $ship_user_note = $request->input('user_note');
            $ship_user_note = $request->input('user_note');
            $discount_code = $request->input('discount_code');
            $payment_method = $request->input('payment_method');

            $payment_method = $payment_method == 'cod' ? 'Thanh toán khi nhận hàng' : 'Thanh toán qua thẻ MOMO';

            $user = User::find($userId);

            $discount_value = 0;
            $totalAmount = 0;

            $cart = Cart::where('user_id', $userId)->first();
            $totalAmount = $cart->total_amount;

            $coupon = CouponModel::where('code', $discount_code)->first();
            if ($coupon) {
                $current_date = date('Y-m-d');
                $order_total = $totalAmount;
                if ($current_date < $coupon->date_start) {
                    return response()->json(['error' => 'Mã giảm giá chưa có hiệu lực.'], 400);
                } elseif ($current_date > $coupon->date_end) {
                    return response()->json(['error' => 'Mã giảm giá đã hết hạn.'], 400);
                } elseif ($order_total < $coupon->minimum_spend) {
                    return response()->json(['error' => 'Số tiền chi tiêu phải lớn hơn hoặc bằng ' . $coupon->minimum_spend . '.'], 400);
                } elseif ($order_total > $coupon->maximum_spend) {
                    return response()->json(['error' => 'Số tiền chi tiêu phải nhỏ hơn hoặc bằng ' . $coupon->maximum_spend . '.'], 400);
                } else {
                    // Tính toán giá trị giảm giá
                    if ($coupon->discount_type == 'percent') {
                        $discount_value = ($order_total * $coupon->discount_amount) / 100;
                    } elseif ($coupon->discount_type == 'fixed') {
                        $discount_value = $coupon->discount_amount;
                    };

                    // Kiểm tra số lượng mã giảm giá
                    if ($coupon->quantity > 0) {
                        $totalAmount = $totalAmount - $discount_value;
                    }
                }
            }



            $cartItems = CartItem::where('cart_id', $cart->id)
                ->with("productVariant")
                ->with("productVariant.size")
                ->with("productVariant.color")
                ->with("productVariant.product")
                ->get();

            $validator = Validator::make($request->all(), [
                'user_address' => 'required',
                'user_phone' => 'required|regex:/^[0-9]{10}$/',
                'first_name' => ['required', 'max:50'],
                'last_name' => ['required', 'max:50'],
                'user_email' => 'required|email',
                'payment_method' => 'required'
            ], messages: $this->messages);

            if ($validator->fails()) {
                return response()->json([
                    "type" => "error",
                    "message" => $validator->errors()
                ], 400);
            }


            $oder_detail = [];
            
            $user_full_name = $user->full_name;
            $user_phone = $user->phone;
            $user_email = $user->email;
            $user_address = $user->address;

            $order = Order::create([
                "users_id" => $userId,
                "user_name" => $user_full_name,
                "user_phone" => $user_phone,
                "user_email" => $user_email,
                "user_address" => $user_address,
                "ship_user_name" => $ship_user_name,
                "ship_user_phone" => $ship_user_phone,
                "ship_user_email" => $ship_user_email,
                "ship_user_address" => $ship_user_address,
                "ship_user_note" => $ship_user_note,

                'discount' => $discount_value,
                'date_create_order' => now(),
                "payment_method" => $payment_method,
                "status_order" => "Chờ xác nhận",
                "status_payment" => "Chưa thanh toán",
                "total_price" => $totalAmount
            ]);

            foreach ($cartItems as $item) {
                $oder_detail = OrderDetail::create([
                    "order_id" => $order->id,
                    "product_id" => $item->product_id,
                    "product_variant_id" => $item->product_variant_id,
                    "product_name" => $item->productVariant->product->name,
                    "product_sku" => $item->productVariant->product->sku,
                    "product_avatar" => $item->productVariant->product->image_avatar,
                    "product_price_final" => $item->price,
                    "product_quantity" => $item->quantity
                ]);
            }

            // sửa lại giá
            // xóa số lượng sản phẩm ở product và biến thể

            $cart = Cart::where('user_id', $userId)->first();

            CartItem::where('cart_id', $cart->id)->delete();

            $cart->delete();

            return response()->json([
                "type" => "success",
                "message" => "Đặt hàng thành công!",
                "order" => $order,
                "order_detail" => $oder_detail
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Booking failed",
                "error" => [
                    "message" => $e->getMessage(),
                    "file" => $e->getFile(),
                    "line" => $e->getLine(),
                    "trace" => $e->getTrace()
                ]
            ], 500);
        }
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

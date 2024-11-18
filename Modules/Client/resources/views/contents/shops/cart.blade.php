@extends('client::layouts.master')

@section('title')
    Giỏ hàng | Thời trang Phong cách Việt
@endsection

@section('contents')

    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <h2 style="margin-top: 30px;">Thời trang Phong cách Việt</h2>
                <ul>
                    <li><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li class="active">Giỏ hàng</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="kenne-cart-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="javascript:void(0)">
                        <div class="table-content table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="kenne-product-thumbnail">ảnh</th>
                                        <th class="cart-product-name">Tên sản phẩm</th>
                                        <th class="kenne-product-price">Đơn giá</th>
                                        <th class="kenne-product-quantity">Số lượng</th>
                                        <th class="kenne-product-subtotal">Tổng</th>
                                        <th class="kenne-product-remove">xóa</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @if ($cart && $cart->cartItems->count() > 0)
                                        @foreach ($cart->cartItems as $item)
                                            <tr>

                                                <td class="kenne-product-thumbnail">
                                                    <a href="javascript:void(0)">
                                                        <img src="{{ asset($item->productVariant->product->image_avatar) }}"
                                                            alt="Uren's Cart Thumbnail">
                                                    </a>
                                                </td>
                                                <td class="kenne-product-name">
                                                    <a
                                                        href="{{ route('shop.productDetail', $item->productVariant->product->slug) }}">
                                                        {{ $item->productVariant->product->name }}
                                                        @if ($item->productVariant->size)
                                                            - Size: {{ $item->productVariant->size->size_value }}
                                                        @endif
                                                        @if ($item->productVariant->color)
                                                            - Màu:
                                                            <input type="color"
                                                                value="{{ $item->productVariant->color->color_value }}"
                                                                disabled>

                                                            {{-- {{ $item->productVariant->color->color_value }} --}}
                                                        @endif
                                                    </a>
                                                </td>
                                                <td class="kenne-product-price">
                                                    <span
                                                        class="amount">{{ number_format($item->productVariant->price_default, 0, ',', '.') }}₫</span>
                                                </td>
                                                <td class="quantity">
                                                    <div class="cart-plus-minus">
                                                        <input class="cart-plus-minus-box quantity-input"
                                                            value="{{ $item->quantity }}" type="text"
                                                            data-item-id="{{ $item->productVariant->id }}">
                                                        <button type="button" class="dec qtybutton update-quantity"
                                                            data-item-id="{{ $item->productVariant->id }}"><i
                                                                class="fa fa-angle-down"></i></button>
                                                        <button type="button" class="inc qtybutton update-quantity"
                                                            data-item-id="{{ $item->productVariant->id }}"><i
                                                                class="fa fa-angle-up"></i></button>
                                                    </div>
                                                </td>
                                                <td class="product-subtotal">
                                                    <span
                                                        class="amount">{{ number_format($item->productVariant->price_default * $item->quantity, 0, ',', '.') }}₫</span>
                                                </td>
                                                <td class="kenne-product-remove">
                                                    <a href="javascript:void(0)" class="remove-item"
                                                        data-item-id="{{ $item->productVariant->id }}">
                                                        <i class="fa fa-trash" title="Remove"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="6">Giỏ hàng trống</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="coupon-all">
                                    <div class="coupon">
                                        <input id="coupon_code" class="input-text" name="coupon_code" value=""
                                            placeholder="Coupon code" type="text">
                                        <button type="submit" class="button">Áp dụng mã</button>
                                    </div>
                                    {{-- <div class="coupon2">
                                        <button type="submit" class="button" name="update_cart">Cập nhật giỏ hàng</button>
                                    </div> --}}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5 ml-auto">
                                <div class="cart-page-total">
                                    <h2>Tổng giỏ hàng</h2>
                                    <ul>
                                        @php
                                            $totalPrice = $cart->cartItems->sum(function ($item) {
                                                $price = $item->productVariant->price_default;
                                                if (isset($cart->coupon)) {
                                                    if ($cart->coupon->discount_type == 'percent') {
                                                        $price *= 1 - $cart->coupon->discount_amount / 100;
                                                    } else {
                                                        $price -= $cart->coupon->discount_amount;
                                                    }
                                                }
                                                return $price * $item->quantity;
                                            });
                                        @endphp

                                        <li>Tổng phụ <span
                                                id="sub-total">{{ number_format($totalPrice, 0, ',', '.') }}₫</span></li>
                                        <li>Tổng tất cả <span
                                                id="total">{{ number_format($totalPrice, 0, ',', '.') }}₫</span></li>
                                    </ul>
                                    <a href="{{ route('cart.checkout') }}">Tiến hành thanh toán</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-setting')
    <script>
        $(document).ready(function() {
            $('.update-quantity').click(function() {
                let itemId = $(this).data('item-id');
                let quantity = $(this).closest('td').find('.quantity-input').val();

                $.ajax({
                    url: '/cart/update/' + itemId,
                    method: 'POST',
                    data: {
                        quantity: quantity,
                        _token: '{{ csrf_token() }}',
                        _method: 'PUT'
                    },
                    success: function(response) {
                        alert(response.message);
                        location.reload();
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
            });



            $('#coupon-form').submit(function(event) {
                event.preventDefault();

                $.ajax({
                    url: '{{ route('cart.applyCoupon') }}',
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        alert(response.message);
                        location.reload();
                    },
                    error: function(error) {
                        alert(error.responseJSON.message || 'Có lỗi xảy ra.');
                    }
                });
            });
        });
    </script>

    <script>
        function removeItem(itemId) {
            $.ajax({
                url: '/cart/remove/' + itemId,
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    _method: 'DELETE'
                },
                success: function(response) {
                    alert('Xóa sản phẩm thành công.');
                    location.reload();
                },
                error: function(error) {
                    console.error('Lỗi khi xóa sản phẩm:', error);
                }
            });
        }
        $(document).ready(function() {
            $('.remove-item').click(function() {
                let itemId = $(this).data('item-id');
                removeItem(itemId);
            });
        });
    </script>
@endsection

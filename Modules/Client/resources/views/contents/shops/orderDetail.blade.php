@extends('client::layouts.master')

@section('title')
    Chi tiết hóa đơn | Thời trang Phong cách Việt
@endsection
@section('css-setting')
    <link href="{{ Module::asset('wallet:css/icons.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('contents')
    <!-- Begin Kenne's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <h2 style="margin-top: 30px;">Thời trang Phong cách Việt</h2>
                <ul>
                    <li><a href="{{ route('index') }}">Trang chủ</a></li>
                    <li class="active">Chi tiết Hóa đơn</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Kenne's Breadcrumb Area End Here -->

    <!-- Begin Kenne's Content Wrapper Area -->
    <div class="kenne-content_wrapper">
        <div class="container">
            <div class="row mb-3">
                <div class="col-md-12">
                    <h2 style="text-align: center"> Chi tiết hóa đơn #{{ $order->id }} </h2>
                </div>
            </div>

            <div class="row mb-3">

            </div>

            <div class="row mb-3">

                <div class="col-md-6">
                    <strong>Người nhận:</strong> {{ $order->ship_user_name }}<br>
                    <strong>Email:</strong> {{ $order->ship_user_email }}<br>
                    <strong>Điện thoại:</strong> {{ $order->ship_user_phone }}<br>
                    <strong>Nơi nhận:</strong> {{ $order->ship_user_address }}
                </div>
                <div class="col-md-6">
                    <strong>Phương thức thanh toán:</strong> {{ $order->payment_method }}<br>
                    <strong>Ngày Tạo:</strong>
                    {{ \Carbon\Carbon::parse($order->date_create_order)->format('H:i d/m/Y') }}<br>
                    <strong>Trạng thái thanh toán: </strong>{{ $order->status_payment }} <br>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-content table-responsive">




                                <table>

                                    <thead>

                                        <tr>
                                            <th>STT</th>
                                            <th>Hình ảnh</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Giá</th>
                                            <th>Số lượng</th>
                                            <th>Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orderItems as $key => $orderDetail)
                                            <tr>
                                                <td class="product-name">{{ $key + 1 }}</td>
                                                <td class="product-thumbnail">
                                                    @php
                                                        $url = $orderDetail->product_avatar;
                                                        if (!\Str::contains($url, 'http')) {
                                                            $url = \Storage::url($url);
                                                        }
                                                    @endphp
                                                    <a
                                                        href="{{ route('shop.productDetail', $orderDetail->productVariant->product->slug) }}"><img
                                                            src="{{ $url }}" width="150" alt="Kenne"></a>
                                                </td>
                                                <td class="product-name"><a
                                                        href="{{ route('shop.productDetail', $orderDetail->productVariant->product->slug) }}">{{ $orderDetail->productVariant->product->name }}</a>
                                                    - Size: {{ $orderDetail->productVariant->size->size_value }}
                                                    <br>
                                                    - Màu: <input type="color"
                                                        value="{{ $orderDetail->productVariant->color->color_value }}"
                                                        disabled>
                                                </td>
                                                <td class="product-price-cart"><span
                                                        class="amount">{{ number_format($orderDetail->product_price_final) }}
                                                        VND</span></td>
                                                <td class="product-quantity">
                                                    {{ $orderDetail->product_quantity }}
                                                </td>
                                                <td class="product-subtotal">
                                                    {{ number_format($orderDetail->product_price_final * $orderDetail->product_quantity) }}
                                                    VND</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-5 ml-auto">
                    <div class="cart-page-total">
                        <h2>Tổng</h2>
                        <ul>
                            <li>Tổng <span>{{ number_format($order->discount + $order->total_price) }} VND</span></li>
                            <li>Giảm Giá <span>{{ number_format($order->discount) }} VND</span></li>
                            <li>Thành tiền <span>{{ number_format($order->total_price) }} VND</span></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                ô để map
            </div>

            <div class="row mb-3">
                trạng thái vận chuyển carrd comment
            </div>

            <div class="row mb-5">
                <div class="col-md-3">
                    <a href="{{ route('orders.downloadPDF', ['id' => $order->id]) }}" class="kenne-btn kenne-btn_sm">In hóa
                        đơn</a>
                </div>
                <div class="col-md-3">

                </div>
                <div class="col-md-3">

                </div>
                <div class="col-md-3">

                </div>
            </div>
        </div>
    </div>
    <!-- Kenne's Content Wrapper Area End Here -->
@endsection
@section('js-setting')
@endsection
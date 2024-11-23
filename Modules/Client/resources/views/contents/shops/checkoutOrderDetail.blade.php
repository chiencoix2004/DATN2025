@extends('client::layouts.master')

@section('title')
    Chi tiết thanh toán | Thời trang Phong cách Việt
@endsection
@section('contents')
    <!-- Begin Kenne's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <h2 style="margin-top: 30px;">Thời trang Phong cách Việt</h2>
                <ul>
                    <li><a href="{{ route('index') }}">Trang chủ</a></li>
                    <li class="active">Chi tiết thanh toán</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Kenne's Breadcrumb Area End Here -->

    <!-- Begin Kenne's Content Wrapper Area -->
    <div class="kenne-content_wrapper">
        <div class="container">
            <div class="row">

            </div>
            <div class="row">

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
                                        @foreach ( $orderItems as $key => $orderDetail)
                                            <tr>
                                                <td class="product-name">{{ $key + 1 }}</td>
                                                <td class="product-thumbnail">
                                                    <a
                                                        href="{{ route('shop.productDetail', $orderDetail->productVariant->product->slug) }}"><img
                                                            src="{{ asset($orderDetail->productVariant->product->product_avata) }}"
                                                            alt="Kenne"></a>
                                                </td>
                                                <td class="product-name"><a
                                                        href="{{ route('shop.productDetail', $orderDetail->productVariant->product->slug) }}">{{ $orderDetail->productVariant->product->name }}</a>
                                                    - Size: {{$orderDetail->productVariant->size->size_value}}
                                                    <br>
                                                    - Màu: <input type="color"
                                                        value="{{$orderDetail->productVariant->color->color_value}}" disabled>
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
            <div class="row">
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
        </div>
    </div>
    <!-- Kenne's Content Wrapper Area End Here -->
@endsection
@section('js-setting')
@endsection

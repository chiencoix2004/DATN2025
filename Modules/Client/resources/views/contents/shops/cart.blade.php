@extends('client::layouts.master')

@section('title')
    Giỏ hàng | Thời trang Phong cách Việt
@endsection
@section('contents')
    <!-- Begin Kenne's Breadcrumb Area -->
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
    <!-- Kenne's Breadcrumb Area End Here -->

    <!-- Begin Uren's Cart Area -->
    <div class="kenne-cart-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="javascript:void(0)">
                        <div class="table-content table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="kenne-product-remove">xóa</th>
                                        <th class="kenne-product-thumbnail">ảnh</th>
                                        <th class="cart-product-name">Sản phẩm</th>
                                        <th class="kenne-product-price">Đơn giá</th>
                                        <th class="kenne-product-quantity">Số lượng</th>
                                        <th class="kenne-product-subtotal">Tất cả</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="kenne-product-remove">
                                            <a href="javascript:void(0)">
                                                <i class="fa fa-trash" title="Remove"></i>
                                            </a>
                                        </td>
                                        <td class="kenne-product-thumbnail">
                                            <a href="javascript:void(0)">
                                                <img src="{{ asset('theme/client/images/product/small-size/1.jpg') }}"
                                                    alt="Uren's Cart Thumbnail">
                                            </a>
                                        </td>
                                        <td class="kenne-product-name"><a href="javascript:void(0)">Juma rema pola</a></td>
                                        <td class="kenne-product-price"><span class="amount">$46.80</span></td>
                                        <td class="quantity">
                                            <label>Quantity</label>
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" value="1" type="text">
                                                <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                            </div>
                                        </td>
                                        <td class="product-subtotal"><span class="amount">$46.80</span></td>
                                    </tr>
                                    <tr>
                                        <td class="kenne-product-remove">
                                            <a href="javascript:void(0)">
                                                <i class="fa fa-trash" title="Remove"></i>
                                            </a>
                                        </td>
                                        <td class="kenne-product-thumbnail">
                                            <a href="javascript:void(0)">
                                                <img src="{{ asset('theme/client/images/product/small-size/2.jpg') }}"
                                                    alt="Uren's Cart Thumbnail">
                                            </a>
                                        </td>
                                        <td class="kenne-product-name"><a href="javascript:void(0)">Bag Goodscol model</a>
                                        </td>
                                        <td class="kenne-product-price"><span class="amount">$71.80</span></td>
                                        <td class="quantity">
                                            <label>Quantity</label>
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" value="1" type="text">
                                                <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                            </div>
                                        </td>
                                        <td class="product-subtotal"><span class="amount">$71.80</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="coupon-all">
                                    <div class="coupon">
                                        <input id="coupon_code" class="input-text" name="coupon_code" value=""
                                            placeholder="Coupon code" type="text">
                                        <input class="button" name="apply_coupon" value="Áp dụng mã" type="submit">
                                    </div>
                                    <div class="coupon2">
                                        <input class="button" name="update_cart" value="Cập nhật giỏ hàng" type="submit">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 ml-auto">
                                <div class="cart-page-total">
                                    <h2>Tổng giỏ hàng</h2>
                                    <ul>
                                        <li>Tổng phụ <span>$118.60</span></li>
                                        <li>Tổng tất cả <span>$118.60</span></li>
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
    <!-- Uren's Cart Area End Here -->

    <!-- Begin Brand Area -->
    <div class="brand-area ">
        <div class="container">
            <div class="brand-nav border-top ">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="kenne-element-carousel brand-slider slider-nav"
                            data-slick-options='{
                            "slidesToShow": 6,
                            "slidesToScroll": 1,
                            "infinite": false,
                            "arrows": false,
                            "dots": false,
                            "spaceBetween": 30
                            }'
                            data-slick-responsive='[
                            {"breakpoint":992, "settings": {
                            "slidesToShow": 4
                            }},
                            {"breakpoint":768, "settings": {
                            "slidesToShow": 3
                            }},
                            {"breakpoint":576, "settings": {
                            "slidesToShow": 2
                            }}
                        ]'>

                            <div class="brand-item">
                                <a href="javascript:void(0)">
                                    <img src="{{ asset('theme/client/images/brand/1.png') }}" alt="Brand Images">
                                </a>
                            </div>
                            <div class="brand-item">
                                <a href="javascript:void(0)">
                                    <img src="{{ asset('theme/client/images/brand/2.png') }}" alt="Brand Images">
                                </a>
                            </div>
                            <div class="brand-item">
                                <a href="javascript:void(0)">
                                    <img src="{{ asset('theme/client/images/brand/3.png') }}" alt="Brand Images">
                                </a>
                            </div>
                            <div class="brand-item">
                                <a href="javascript:void(0)">
                                    <img src="{{ asset('theme/client/images/brand/4.png') }}" alt="Brand Images">
                                </a>
                            </div>
                            <div class="brand-item">
                                <a href="javascript:void(0)">
                                    <img src="{{ asset('theme/client/images/brand/5.png') }}" alt="Brand Images">
                                </a>
                            </div>
                            <div class="brand-item">
                                <a href="javascript:void(0)">
                                    <img src="{{ asset('theme/client/images/brand/6.png') }}" alt="Brand Images">
                                </a>
                            </div>
                            <div class="brand-item">
                                <a href="javascript:void(0)">
                                    <img src="{{ asset('theme/client/images/brand/1.png') }}" alt="Brand Images">
                                </a>
                            </div>
                            <div class="brand-item">
                                <a href="javascript:void(0)">
                                    <img src="{{ asset('theme/client/images/brand/2.png') }}" alt="Brand Images">
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Brand Area End Here -->
@endsection

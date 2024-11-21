@extends('client::layouts.master')

@section('title')
    Chi tiết | Tên sản phẩm
@endsection
@section('contents')
    <!-- Begin Kenne's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <h2 style="margin-top: 30px;">Thời trang Phong cách Việt</h2>
                <ul>
                    <li><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li class="active">Chi tiết sản phẩm</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Kenne's Breadcrumb Area End Here -->

    <!-- Begin Kenne's Single Product Variable Area -->
    <div class="sp-area">
        <div class="container">
            <div class="sp-nav">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="sp-img_area">
                            <div class="sp-img_slider slick-img-slider kenne-element-carousel"
                                data-slick-options='{
                            "slidesToShow": 1,
                            "arrows": false,
                            "fade": true,
                            "draggable": false,
                            "swipe": false,
                            "asNavFor": ".sp-img_slider-nav"
                            }'>
                                @php
                                    $avt = $data->image_avatar;
                                    if (!\Str::contains($avt, 'http')) {
                                        $avt = \Storage::url($avt);
                                    }
                                @endphp
                                <div class="single-slide zoom">
                                    <img src="{{ $avt }}" alt="Kenne's Product Image">
                                </div>
                                @foreach ($data->images as $image)
                                    @php
                                        $glr = $image->image_path;
                                        if (!\Str::contains($glr, 'http')) {
                                            $glr = \Storage::url($glr);
                                        }
                                    @endphp
                                    <div class="single-slide zoom">
                                        <img src="{{ $glr }}" alt="Kenne's Product Image">
                                    </div>
                                @endforeach
                            </div>
                            <div class="sp-img_slider-nav slick-slider-nav kenne-element-carousel arrow-style-2 arrow-style-3"
                                data-slick-options='{
                            "slidesToShow": 3,
                            "asNavFor": ".sp-img_slider",
                            "focusOnSelect": true,
                            "arrows" : true,
                            "spaceBetween": 30
                            }'
                                data-slick-responsive='[
                                    {"breakpoint":1501, "settings": {"slidesToShow": 3}},
                                    {"breakpoint":1200, "settings": {"slidesToShow": 2}},
                                    {"breakpoint":992, "settings": {"slidesToShow": 4}},
                                    {"breakpoint":768, "settings": {"slidesToShow": 3}},
                                    {"breakpoint":575, "settings": {"slidesToShow": 2}}
                                ]'>
                                <div class="single-slide">
                                    <img src="{{ $avt }}" alt="Kenne's Product Thumnail">
                                </div>
                                @foreach ($data->images as $image)
                                    @php
                                        $glr = $image->image_path;
                                        if (!\Str::contains($glr, 'http')) {
                                            $glr = \Storage::url($glr);
                                        }
                                    @endphp
                                    <div class="single-slide">
                                        <img src="{{ $glr }}" alt="Kenne's Product Image">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <form action="" class="sp-content" method="POST">
                            @csrf
                            <div class="sp-heading">
                                <h5><a href="{{ route('shop.productDetail', $data->slug) }}">{{ $data->name }}</a></h5>
                            </div>
                            <span class="reference">Mã sản phẩm: {{ $data->sku }}</span>
                            <div class="rating-box">
                                <ul>
                                    <li><i class="ion-android-star"></i></li>
                                    <li><i class="ion-android-star"></i></li>
                                    <li><i class="ion-android-star"></i></li>
                                    <li class="silver-color"><i class="ion-android-star"></i></li>
                                    <li class="silver-color"><i class="ion-android-star"></i></li>
                                </ul>
                            </div>
                            <div class="sp-essential_stuff">
                                <ul class="load-infor" id="load-infor">
                                    <li>Số lượng: <a
                                            href="javascript:void(0)">{{ $data->quantity != null ? $data->quantity : 0 }}</a>
                                    </li>
                                    <li>Tình trạng: <a href="javascript:void(0)">
                                            {{ $data->quantity < 5 && $data->quantity > 0
                                                ? 'Sắp hết hàng'
                                                : ($data->quantity == 0
                                                    ? 'Hết hàng'
                                                    : 'Còn hàng') }}
                                        </a>
                                    </li>
                                    @if ($data->discount_percent > 0 || $data->price_sale > 0)
                                        <li>Giá mặc định: <a href="javascript:void(0)">
                                                <strike>
                                                    {{ number_format((int) $data->price_regular, 0, ',', '.') }} (VNĐ)
                                                </strike>
                                            </a>
                                        </li>
                                        <li>Giá khuyến mại: <a href="javascript:void(0)">
                                                <strong>
                                                    {{ number_format(
                                                        (int) ($data->discount_percent > 0
                                                            ? $data->price_regular * (1 - $data->discount_percent / 100)
                                                            : ($data->price_sale > 0
                                                                ? $data->price_sale
                                                                : $data->price_regular)),
                                                        0,
                                                        ',',
                                                        '.',
                                                    ) }}
                                                    (VNĐ)
                                                </strong>
                                            </a>
                                        </li>
                                    @else
                                        <li>Giá mặc định: <a href="javascript:void(0)">
                                                <strong>
                                                    {{ number_format((int) $data->price_regular, 0, ',', '.') }} (VNĐ)
                                                </strong>
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                            <div class="color-list_area row">
                                <div class="color-list_heading">
                                    <h4>Tùy chọn biến thể</h4>
                                </div>
                                <div class="col-lg-6 pe-lg-2">
                                    <label class="form-label">Kích thước</label>
                                    <div class="product-size_box">
                                        @php
                                            $size = $data->product_variants
                                                ->pluck('size')
                                                ->flatten(1)
                                                ->unique('id')
                                                ->values();
                                        @endphp
                                        <select class="myniceselect nice-select" name="id_size" id="id_size">
                                            <option value="" selected>
                                                Chọn size
                                            </option>
                                            @foreach ($size as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->size_value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 pe-lg-2">
                                    <span class="sub-title">Màu</span>
                                    <div class="color-list" id="color-list">
                                        <strong class="text-warning border" style="padding: 5px;">
                                            Vui lòng chọn kích thước!
                                        </strong>
                                    </div>
                                </div>
                            </div>
                            <div class="quantity">
                                <label>Số lượng</label>
                                <div class="cart-plus-minus">
                                    <input class="cart-plus-minus-box" id="quantity-input" value="1" min="1"
                                        type="text">
                                    <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                    <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                </div>
                            </div>
                            <div class="qty-btn_area">
                                <ul>
                                    <li>
                                        <button type="submit" class="add-to-cart kenne-register_btn"
                                            data-product-id="{{ $data->id }}">Thêm vào giỏ hàng</button>
                                    </li>
                                    <li>
                                        <a class="qty-wishlist_btn" href="wishlist.html" data-bs-toggle="tooltip"
                                            title="Thêm vào yêu thích">
                                            <i class="ion-android-favorite-outline"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="kenne-tag-line">
                                <h6>Thẻ: &nbsp;</h6>
                                @if (count($data->tags) > 0)
                                    @foreach ($data->tags as $tag)
                                        <span class="badge bg-info">{{ $tag->name }}</span> &nbsp; &nbsp;
                                    @endforeach
                                @else
                                    <span class="badge bg-warning">Không có thẻ nào gắn cho sản phẩm này!</span> &nbsp;
                                    &nbsp;
                                @endif
                            </div>
                            <div class="kenne-social_link">
                                <ul>
                                    <li class="facebook">
                                        <a href="https://www.facebook.com/" data-bs-toggle="tooltip" target="_blank"
                                            title="Facebook">
                                            <i class="fab fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li class="twitter">
                                        <a href="https://twitter.com/" data-bs-toggle="tooltip" target="_blank"
                                            title="Twitter">
                                            <i class="fab fa-twitter-square"></i>
                                        </a>
                                    </li>
                                    <li class="youtube">
                                        <a href="https://www.youtube.com/" data-bs-toggle="tooltip" target="_blank"
                                            title="Youtube">
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    </li>
                                    <li class="google-plus">
                                        <a href="https://www.plus.google.com/discover" data-bs-toggle="tooltip"
                                            target="_blank" title="Google Plus">
                                            <i class="fab fa-google-plus"></i>
                                        </a>
                                    </li>
                                    <li class="instagram">
                                        <a href="https://rss.com/" data-bs-toggle="tooltip" target="_blank"
                                            title="Instagram">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Kenne's Single Product Variable Area End Here -->

    <!-- Begin Product Tab Area Two -->
    <div class="product-tab_area-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sp-product-tab_nav">
                        <div class="product-tab">
                            <ul class="nav product-menu">
                                <li><a class="active" data-bs-toggle="tab" href="#description"><span>Mô tả sản
                                            phẩm</span></a>
                                </li>
                                <li><a data-bs-toggle="tab" href="#specification"><span>Thông tin khác</span></a></li>
                                <li><a data-bs-toggle="tab" href="#reviews"><span>Bình luận - Đánh giá (1)</span></a></li>
                            </ul>
                        </div>
                        <div class="tab-content uren-tab_content">
                            <div id="description" class="tab-pane active show" role="tabpanel">
                                <div class="product-description">
                                    {!! $data->description !!}
                                </div>
                            </div>
                            <div id="specification" class="tab-pane" role="tabpanel">
                                {!! $data->material !!}
                            </div>
                            <div id="reviews" class="tab-pane" role="tabpanel">
                                <div class="tab-pane active" id="tab-review">
                                    <form class="form-horizontal" id="form-review">
                                        <div id="review">
                                            <table class="table table-striped table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td style="width: 50%;"><strong>Customer</strong></td>
                                                        <td class="text-right">26/10/19</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            <p>Good product! Thank you very much</p>
                                                            <div class="rating-box">
                                                                <ul>
                                                                    <li><i class="ion-android-star"></i></li>
                                                                    <li><i class="ion-android-star"></i></li>
                                                                    <li><i class="ion-android-star"></i></li>
                                                                    <li><i class="ion-android-star"></i></li>
                                                                    <li><i class="ion-android-star"></i></li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <h2>Write a review</h2>
                                        <div class="form-group required">
                                            <div class="col-sm-12 p-0">
                                                <label>Your Email <span class="required">*</span></label>
                                                <input class="review-input" type="email" name="con_email"
                                                    id="con_email" required>
                                            </div>
                                        </div>
                                        <div class="form-group required second-child">
                                            <div class="col-sm-12 p-0">
                                                <label class="control-label">Share your opinion</label>
                                                <textarea class="review-textarea" name="con_message" id="con_message"></textarea>
                                                <div class="help-block"><span class="text-danger">Note:</span> HTML is
                                                    not
                                                    translated!</div>
                                            </div>
                                        </div>
                                        <div class="form-group last-child required">
                                            <div class="col-sm-12 p-0">
                                                <div class="your-opinion">
                                                    <label>Your Rating</label>
                                                    <span>
                                                        <select class="star-rating">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                        </select>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="kenne-btn-ps_right">
                                                <button class="kenne-btn">Continue</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Tab Area Two End Here -->

    <!-- Begin Product Area -->
    <div class="product-area pb-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h3>Sản phẩm tương tự</h3>
                        <div class="product-arrow"></div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="kenne-element-carousel product-slider slider-nav"
                        data-slick-options='{
                    "slidesToShow": 4,
                    "slidesToScroll": 1,
                    "infinite": false,
                    "arrows": true,
                    "dots": false,
                    "spaceBetween": 30,
                    "appendArrows": ".product-arrow"
                    }'
                        data-slick-responsive='[
                    {"breakpoint":992, "settings": {
                    "slidesToShow": 3
                    }},
                    {"breakpoint":768, "settings": {
                    "slidesToShow": 2
                    }},
                    {"breakpoint":575, "settings": {
                    "slidesToShow": 1
                    }}
                ]'>
                        @foreach ($realedProducts as $product)
                            @php
                                $avt = $product->image_avatar;
                                if (!\Str::contains($avt, 'http')) {
                                    $avt = \Storage::url($avt);
                                }
                            @endphp
                            <div class="product-item">
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="{{ route('shop.productDetail', $product->slug) }}">
                                            <img class="primary-img" src="{{ $avt }}"
                                                alt="Kenne's Product Image">
                                        </a>
                                        {!! $product->discount_percent > 0 ? "<span class='sticker'>- $product->discount_percent%</span>" : '' !!}
                                        <div class="add-actions">
                                            <ul>
                                                <li class="quick-view-btn" data-bs-toggle="modal"
                                                    data-bs-target="#{{ $product->slug }}">
                                                    <a href="javascript:void(0)" data-bs-toggle="tooltip"
                                                        data-placement="right" title="Xem nhanh sản phẩm">
                                                        <i class="ion-ios-search"></i>
                                                    </a>
                                                </li>
                                                <li><a href="wishlist.html" data-bs-toggle="tooltip"
                                                        data-placement="right" title="Thêm vào danh sách yêu thích"><i
                                                            class="ion-ios-heart-outline"></i></a>
                                                </li>
                                                <li><a href="compare.html" data-bs-toggle="tooltip"
                                                        data-placement="right" title="So sánh sản phẩm"><i
                                                            class="ion-ios-reload"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-desc_info">
                                            <h3 class="product-name">
                                                <a
                                                    href="{{ route('shop.productDetail', $product->slug) }}">{{ $product->name }}</a>
                                            </h3>
                                            <div class="price-box">
                                                <span class="new-price">
                                                    {{ number_format((int) ($product->discount_percent > 0 ? $product->price_regular * (1 - $product->discount_percent / 100) : ($product->price_sale > 0 ? $product->price_sale : $product->price_regular)), 0, ',', '.') }}
                                                    (VND)
                                                </span>
                                                @if ($product->discount_percent > 0 || $product->price_sale > 0)
                                                    <span class="old-price">
                                                        {{ number_format((int) $product->price_regular, 0, ',', '.') }}
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="rating-box">
                                                <ul>
                                                    <li><i class="ion-ios-star"></i></li>
                                                    <li><i class="ion-ios-star"></i></li>
                                                    <li><i class="ion-ios-star"></i></li>
                                                    <li class="silver-color"><i class="ion-ios-star-half"></i></li>
                                                    <li class="silver-color">
                                                        <i class="ion-ios-star-outline"></i>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Area End Here -->

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
    @foreach ($realedProducts as $product)
        @php
            $avt = $product->image_avatar;
            if (!\Str::contains($avt, 'http')) {
                $avt = \Storage::url($avt);
            }
        @endphp
        <!-- Begin Kenne's Modal Area -->
        <div class="modal fade modal-wrapper" id="{{ $product->slug }}">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="modal-inner-area sp-area row">
                            <div class="col-lg-5">
                                <div class="sp-img_area">
                                    <div class="kenne-element-carousel sp-img_slider slick-img-slider"
                                        data-slick-options='{
                        "slidesToShow": 1,
                        "arrows": false,
                        "fade": true,
                        "draggable": false,
                        "swipe": false,
                        "asNavFor": ".sp-img_slider-nav"
                        }'>
                                        <div class="single-slide red">
                                            <img src="{{ $avt }}" alt="Kenne's Product Image">
                                        </div>
                                        @foreach ($product->images as $image)
                                            @php
                                                $glr = $image->image_path;
                                                if (!\Str::contains($glr, 'http')) {
                                                    $glr = \Storage::url($glr);
                                                }
                                            @endphp
                                            <div class="single-slide orange">
                                                <img src="{{ $glr }}" alt="Kenne's Product Image">
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="kenne-element-carousel sp-img_slider-nav arrow-style-2 arrow-style-3"
                                        data-slick-options='{
                       "slidesToShow": 4,
                        "asNavFor": ".sp-img_slider",
                       "focusOnSelect": true,
                       "arrows" : true,
                       "spaceBetween": 30
                      }'
                                        data-slick-responsive='[
                        {"breakpoint":1501, "settings": {"slidesToShow": 3}},
                        {"breakpoint":1200, "settings": {"slidesToShow": 2}},
                        {"breakpoint":992, "settings": {"slidesToShow": 4}},
                        {"breakpoint":768, "settings": {"slidesToShow": 3}},
                        {"breakpoint":575, "settings": {"slidesToShow": 2}}
                    ]'>
                                        <div class="single-slide red">
                                            <img src="{{ $avt }}" alt="Kenne's Product Thumnail">
                                        </div>
                                        @foreach ($product->images as $image)
                                            @php
                                                $glr = $image->image_path;
                                                if (!\Str::contains($glr, 'http')) {
                                                    $glr = \Storage::url($glr);
                                                }
                                            @endphp
                                            <div class="single-slide orange">
                                                <img src="{{ $glr }}" alt="Kenne's Product Thumnail">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-7 col-lg-6">
                                <div class="sp-content">
                                    <form action="" method="post">
                                        @csrf
                                        <div class="sp-heading">
                                            <h5>
                                                <a
                                                    href="{{ route('shop.productDetail', $product->slug) }}">{{ $product->name }}</a>
                                            </h5>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="ion-android-star"></i></li>
                                                <li><i class="ion-android-star"></i></li>
                                                <li><i class="ion-android-star"></i></li>
                                                <li class="silver-color"><i class="ion-android-star"></i>
                                                </li>
                                                <li class="silver-color"><i class="ion-android-star"></i>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="price-box">
                                            <span class="new-price">
                                                {{ number_format((int) ($product->discount_percent > 0 ? $product->price_regular * (1 - $product->discount_percent / 100) : ($product->price_sale > 0 ? $product->price_sale : $product->price_regular)), 0, ',', '.') }}
                                                (VND)
                                            </span>
                                            @if ($product->discount_percent > 0 || $product->price_sale > 0)
                                                <span class="old-price">
                                                    {{ number_format((int) $product->price_regular, 0, ',', '.') }}
                                                </span>
                                            @endif
                                        </div>
                                        <div class="sp-essential_stuff">
                                            <ul>
                                                <li>Danh mục: <a
                                                        href="javascript:void(0)">{{ $product->category['name'] }}</a>
                                                </li>
                                                <li>Mã sản phẩm: <a href="javascript:void(0)">{{ $product->sku }}</a>
                                                </li>
                                                <li>Số lượng còn lại: <a
                                                        href="javascript:void(0)">{{ $product->quantity }}</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="color-list_area row">
                                            <div class="color-list_heading">
                                                <h4>Tùy chọn biến thể</h4>
                                            </div>
                                            <div class="col-lg-6 pe-lg-2">
                                                <label class="form-label">Kích thước</label>
                                                <div class="product-size_box">
                                                    @php
                                                        $size = $product->product_variants
                                                            ->pluck('size')
                                                            ->flatten(1)
                                                            ->unique('id')
                                                            ->values();
                                                    @endphp
                                                    <select class="myniceselect nice-select">
                                                        <option value="" selected>
                                                            Chọn size
                                                        </option>
                                                        @foreach ($size as $item)
                                                            <option value="{{ $item->id }}">
                                                                {{ $item->size_value }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 pe-lg-2">
                                                <span class="sub-title">Màu</span>
                                                <div class="color-list">
                                                    @php
                                                        $color = $product->product_variants
                                                            ->pluck('color')
                                                            ->flatten(1)
                                                            ->unique('id')
                                                            ->values();
                                                    @endphp
                                                    @foreach ($color as $index => $c)
                                                        <input type="radio" id="color-{{ $index }}"
                                                            name="product-color" value="{{ $c->id }}"
                                                            class="single-color-input">
                                                        <label for="color-{{ $index }}" class="single-color">
                                                            <span class=""
                                                                style="background-color: {{ $c->color_value }}; width: 20px; height: 20px; display: inline-block;"></span>
                                                            <span class="color-text">{{ $c->color_value }}</span>
                                                        </label>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>

                                        <div class="quantity">
                                            <label>Số lượng</label>
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" value="1" type="number"
                                                    name="quantityPRD" min="0" max="10">
                                                <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                <div class="inc qtybutton"><i class="fa fa-angle-up"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="kenne-group_btn">
                                            <ul>
                                                <li>
                                                    <button class="add-to_cart" type="submit">
                                                        Thêm vào giỏ hàng
                                                    </button>
                                                </li>
                                                <li>
                                                    <a href="cart.html">
                                                        <i class="ion-android-favorite-outline"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="kenne-tag-line">
                                            <h6>Thẻ:</h6>
                                            @foreach ($product->tags as $tag)
                                                <span class="badge bg-info">{{ $tag->name }}</span>
                                                &nbsp;
                                            @endforeach
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Kenne's Modal Area End Here -->
    @endforeach
@endsection
@section('css-setting')
    <style>
        .single-line {
            white-space: nowrap;
            /* Không cho phép xuống dòng */
            overflow: hidden;
            /* Ẩn phần văn bản tràn ra ngoài */
            text-overflow: ellipsis;
            /* Hiển thị dấu ba chấm (...) */
        }

        .pagination {
            --bs-pagination-active-bg: #a8741a;
            --bs-pagination-active-border-color: #a8741a;
        }

        .modal-backdrop.show {
            opacity: 0;
        }

        .modal-backdrop {
            position: unset;
        }

        button.add-to_cart {
            background-color: #a8741a;
            border: 2px solid #a8741a;
            color: #ffffff;
            width: 140px;
            height: 50px;
            line-height: 47px;
        }

        button.add-to_cart:hover {
            background-color: #242424;
            border: none;
        }

        /* style input radio */
        .color-list {
            display: flex;
            gap: 5px;
        }

        .single-color-input {
            display: none;
        }

        .single-color {
            display: inline-flex;
            align-items: center;
            border: 2px solid transparent;
            padding: 5px;
            cursor: pointer;
        }

        .single-color-input:checked+.single-color {
            border-color: gold;
            /* Màu viền khi chọn */
        }

        /* Thêm các lớp màu cho từng màu sắc */
        .bg-red_color {
            width: 20px;
            height: 20px;
            background-color: red;
            display: inline-block;
        }

        .burnt-orange_color {
            width: 20px;
            height: 20px;
            background-color: orange;
            display: inline-block;
        }

        .brown_color {
            width: 20px;
            height: 20px;
            background-color: brown;
            display: inline-block;
        }

        .raw-umber_color {
            width: 20px;
            height: 20px;
            background-color: #8B4513;
            /* màu umber */
            display: inline-block;
        }

        .black_color {
            width: 20px;
            height: 20px;
            background-color: black;
            display: inline-block;
        }

        .golden_color {
            width: 20px;
            height: 20px;
            background-color: goldenrod;
            display: inline-block;
        }
    </style>
@endsection
@section('js-setting')
    <script>
        // ajax rend color
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // rend màu biến thể sản phẩm ========================================================
            function handleSelectionChange() {
                var selectedSize = $('select[name="id_size"]#id_size').val();
                var selectedPrdID = {{ $data->id }};

                if (selectedSize > 0 && selectedPrdID > 0) {
                    sendAjaxRequest(selectedPrdID, selectedSize);
                }
            }
            $('select[name="id_size"]#id_size').change(handleSelectionChange);

            function sendAjaxRequest(selectedPrdID, selectedSize) {
                $.ajax({
                    url: '{{ route('shop.rend_variant') }}',
                    type: 'POST',
                    data: {
                        prd_id: selectedPrdID,
                        idSize: selectedSize
                    },
                    success: function(res) {
                        if (res.error) {
                            alert(res.error);
                        } else {
                            var rendColor = document.querySelector('div#color-list.color-list');
                            if (rendColor) {
                                $(rendColor).empty();
                                res.data.forEach(item => {
                                    $(rendColor).append(`
                                    <input type="radio" id="color-${item.id}" name="product-color"
                                        value="${item.id}" class="single-color-input">
                                    <label for="color-${item.id}" class="single-color">
                                        <span class=""
                                            style="background-color: ${item.color_value}; width: 20px; height: 20px; display: inline-block;"></span>
                                        <span class="color-text">${item.color_value}</span>
                                    </label>
                                    `);
                                });
                            }
                        }
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                        alert('Vui lòng chọn giá trị hợp lệ!');
                    }
                });
            }
            // ren thông tin sản phẩm biến thể ======================================================
            $(document).on('change', 'input[name="product-color"]', function() {
                var selectedSize = $('select[name="id_size"]#id_size').val();
                var selectedColor = $(this).val();
                var selectedPrdID = {{ $data->id }};

                console.log(selectedSize, selectedColor, selectedPrdID);
                // Bạn có thể xử lý giá trị selectedColorValue ở đây
                if (selectedColor > 0 && selectedSize > 0 && selectedPrdID > 0) {
                    sendRequestVariant(selectedPrdID, selectedSize, selectedColor);
                }
            });

            function sendRequestVariant(selectedPrdID, selectedSize, selectedColor) {
                $.ajax({
                    url: '{{ route('shop.rendPrdV') }}',
                    type: 'POST',
                    data: {
                        prd_id: selectedPrdID,
                        idSize: selectedSize,
                        idColor: selectedColor
                    },
                    success: function(response) {
                        updateHiddenInput('idVariant', response.id);
                        updateHiddenInput('colorValue', response.color_value);
                        updateHiddenInput('sizeValue', response.size_value);

                        var formatPrice = price => price.toString().replace(/\B(?=(\d{3})+(?!\d))/g,
                            ".");
                        var price_default = formatPrice(response.price_default != null ? response
                            .price_default : {{ $data->price_regular }});
                        var price_sale = formatPrice(response.price_sale != null ? response
                            .price_sale :
                            {{ $data->price_sale > 0 ? $data->price_sale : 0 }});
                        var quantity = response.quantity != null ? response.quantity : 0;
                        var htmlPD = '';
                        var htmlPS = '';
                        var htmlPQ = `<li>Số lượng: <a href="javascript:void(0)">${quantity}</a></li>`;
                        var htmlPST =
                            `<li>Tình trạng: <a href="javascript:void(0)">${quantity < 5 && quantity > 0 ? 'Sắp hết hàng' : (quantity == 0 ? 'Hết hàng' : 'Còn hàng')}</a></li>`;
                        if (response.price_sale > 0) {
                            htmlPS =
                                `<li>Giá khuyến mại: <a href="javascript:void(0)"><strong>${price_sale} (VNĐ)</strong></a></li>`;
                            htmlPD =
                                `<li>Giá mặc định: <a href="javascript:void(0)"><strike>${price_default} (VNĐ)</strike></a></li>`;
                        } else {
                            htmlPD =
                                `<li>Giá mặc định: <a href="javascript:void(0)"><strong>${price_default} (VNĐ)</strong></a></li>`;
                        }
                        $('ul.load-infor#load-infor').empty().append(htmlPQ, htmlPST, htmlPD, htmlPS);

                        $('div.mt-3.loadQuantity').empty().append(
                            `<h6>Số lượng tồn kho: ${quantity}</h6>`);
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                        alert('Vui lòng chọn giá trị hợp lệ!');
                    }
                });
            }

            function updateHiddenInput(name, value) {
                var input = document.querySelector(`input[type="hidden"][name="${name}"]`);
                if (input) {
                    input.value = value; // Nếu input đã tồn tại, cập nhật giá trị
                } else {
                    input = document.createElement('input'); // Tạo thẻ input mới
                    input.type = 'hidden';
                    input.name = name;
                    input.value = value;
                    document.querySelector('form.sp-content').appendChild(input); // Thêm vào form
                }
            }
        });
        document.querySelectorAll('.single-color-input').forEach(input => {
            input.addEventListener('change', function() {
                document.querySelectorAll('.single-color').forEach(label => {
                    label.classList.remove('active');
                });
                this.nextElementSibling.classList.add('active');
            });
        });
    </script>
@endsection

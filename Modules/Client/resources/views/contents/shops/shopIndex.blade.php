@extends('client::layouts.master')

@section('title')
    Cửa hàng | Thời trang Phong cách Việt
@endsection
@section('contents')
    <!-- Begin Kenne's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <h2 style="margin-top: 30px;">Thời trang Phong cách Việt</h2>
                <ul>
                    <li><a href="{{ route('index') }}">Trang chủ</a></li>
                    <li class="active">Cửa hàng</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Kenne's Breadcrumb Area End Here -->

    <!-- Begin Kenne's Content Wrapper Area -->
    <div class="kenne-content_wrapper">
        <div class="container">
            <div class="row">
                {{-- sidebar --}}
                <div class="col-xl-3 col-lg-4 order-2 order-lg-1">
                    <div class="kenne-sidebar-catagories_area">
                        <div class="kenne-sidebar_categories">
                            <div class="kenne-categories_title first-child">
                                <h5>Lọc theo giá</h5>
                            </div>
                            <div class="price-filter">
                                <div id="slider-range"></div>
                                <div class="price-slider-amount">
                                    <div class="label-input">
                                        <label>giá : </label>
                                        <input type="text" id="amount" name="price" placeholder="Add Your Price" />
                                        <button class="filter-btn">Lọc</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kenne-sidebar_categories category-module">
                            <div class="kenne-categories_title">
                                <h5>Danh mục sản phẩm</h5>
                            </div>
                            <div class="sidebar-categories_menu">
                                <ul>
                                    @foreach ($categories as $item)
                                        <li class="has-sub">
                                            <a href="javascript:void(0)">{{ $item->name }} <i
                                                    class="ion-ios-plus-empty"></i></a>
                                            @if (count($item->sub_category) > 0)
                                                <ul>
                                                    @foreach ($item->sub_category as $sub)
                                                        <li><a href="javascript:void(0)">{{ $sub->name }}</a></li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="kenne-sidebar_categories">
                            <div class="kenne-categories_title">
                                <h5>Màu sắc</h5>
                            </div>
                            <ul class="sidebar-checkbox_list">
                                @foreach ($colors as $c)
                                    @php
                                        $textColor = getContrastingColor($c->color_value);
                                    @endphp
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{ $c->id }}"
                                            id="flexCheckDefault" name="color[]">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            <span class="badge"
                                                style="background-color: {{ $c->color_value }}; color: {{ $textColor }};">{{ $c->color_value }}</span>
                                        </label>
                                    </div>
                                @endforeach
                                @php
                                    function getContrastingColor($hexColor)
                                    {
                                        // Chuyển mã màu hex thành RGB
                                        $r = hexdec(substr($hexColor, 1, 2));
                                        $g = hexdec(substr($hexColor, 3, 2));
                                        $b = hexdec(substr($hexColor, 5, 2));

                                        // Tính toán độ sáng của màu
                                        $brightness = ($r * 299 + $g * 587 + $b * 114) / 1000;

                                        // Nếu độ sáng lớn hơn 128, trả về màu đen, ngược lại là màu trắng
                                        return $brightness > 128 ? '#000000' : '#FFFFFF';
                                    }

                                @endphp
                            </ul>
                        </div>
                        <div class="kenne-sidebar_categories">
                            <div class="kenne-categories_title">
                                <h5>Kích thước</h5>
                            </div>
                            <ul class="sidebar-checkbox_list">
                                @foreach ($sizes as $s)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{ $s->id }}"
                                            id="flexCheckDefault" name="size[]">
                                        <label class="form-check-label" for="flexCheckDefault">{{ $s->size_value }}</label>
                                    </div>
                                @endforeach
                            </ul>
                        </div>
                        <div class="kenne-sidebar_categories list-product_area">
                            <div class="kenne-categories_title">
                                <h5>Bài đăng gần đây</h5>
                            </div>
                            <div class="kenne-element-carousel list-product_slider list-product_slider-2 slider-nav"
                                data-slick-options='{"slidesToShow": 1,"slidesToScroll": 1,"infinite": false,"arrows": false,"dots": false,"spaceBetween": 30,"rows" : 2}'
                                data-slick-responsive='[{"breakpoint":992, "settings": {"slidesToShow": 2}},{"breakpoint":576, "settings": {"slidesToShow": 1}}]'>
                                <div class="product-item">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="single-product.html">
                                                <img class="primary-img"
                                                    src="{{ asset('theme/client/images/product/1-1.jpg') }}"
                                                    alt="Kenne's Product Image">
                                            </a>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-desc_info">
                                                <span class="manufacture-product">hoodie, jacket</span>
                                                <h3 class="product-name"><a href="single-product.html">Quibusdam
                                                        ratione</a>
                                                </h3>
                                                <div class="price-box">
                                                    <span class="new-price">$46.91</span>
                                                    <span class="old-price">$50.99</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="single-product.html">
                                                <img class="primary-img"
                                                    src="{{ asset('theme/client/images/product/2-1.jpg') }}"
                                                    alt="Kenne's Product Image">
                                            </a>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-desc_info">
                                                <span class="manufacture-product">sleeveless, frocks</span>
                                                <h3 class="product-name"><a href="single-product.html">Quibusdam
                                                        ratione</a>
                                                </h3>
                                                <div class="price-box">
                                                    <span class="new-price">$50.00</span>
                                                    <span class="old-price">$65.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="single-product.html">
                                                <img class="primary-img"
                                                    src="{{ asset('theme/client/images/product/3-1.jpg') }}"
                                                    alt="Kenne's Product Image">
                                            </a>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-desc_info">
                                                <span class="manufacture-product">crochet, scarf</span>
                                                <h3 class="product-name"><a href="single-product.html">Quibusdam
                                                        ratione</a>
                                                </h3>
                                                <div class="price-box">
                                                    <span class="new-price">$80.00</span>
                                                    <span class="old-price">$85.0</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="single-product.html">
                                                <img class="primary-img"
                                                    src="{{ asset('theme/client/images/product/4-1.jpg') }}"
                                                    alt="Kenne's Product Image">
                                            </a>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-desc_info">
                                                <span class="manufacture-product">shirts, t-shirt</span>
                                                <h3 class="product-name"><a href="single-product.html">Quibusdam
                                                        ratione</a>
                                                </h3>
                                                <div class="price-box">
                                                    <span class="new-price">$75.91</span>
                                                    <span class="old-price">$80.99</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="single-product.html">
                                                <img class="primary-img"
                                                    src="{{ asset('theme/client/images/product/2-1.jpg') }}"
                                                    alt="Kenne's Product Image">
                                            </a>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-desc_info">
                                                <span class="manufacture-product">sleeveless, frocks</span>
                                                <h3 class="product-name"><a href="single-product.html">Quibusdam
                                                        ratione</a>
                                                </h3>
                                                <div class="price-box">
                                                    <span class="new-price">$50.00</span>
                                                    <span class="old-price">$65.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="single-product.html">
                                                <img class="primary-img"
                                                    src="{{ asset('theme/client/images/product/3-1.jpg') }}"
                                                    alt="Kenne's Product Image">
                                            </a>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-desc_info">
                                                <span class="manufacture-product">crochet, scarf</span>
                                                <h3 class="product-name"><a href="single-product.html">Quibusdam
                                                        ratione</a>
                                                </h3>
                                                <div class="price-box">
                                                    <span class="new-price">$80.00</span>
                                                    <span class="old-price">$85.0</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="single-product.html">
                                                <img class="primary-img"
                                                    src="{{ asset('theme/client/images/product/1-1.jpg') }}"
                                                    alt="Kenne's Product Image">
                                            </a>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-desc_info">
                                                <span class="manufacture-product">hoodie, jacket</span>
                                                <h3 class="product-name"><a href="single-product.html">Quibusdam
                                                        ratione</a>
                                                </h3>
                                                <div class="price-box">
                                                    <span class="new-price">$46.91</span>
                                                    <span class="old-price">$50.99</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="single-product.html">
                                                <img class="primary-img"
                                                    src="{{ asset('theme/client/images/product/2-1.jpg') }}"
                                                    alt="Kenne's Product Image">
                                            </a>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-desc_info">
                                                <span class="manufacture-product">sleeveless, frocks</span>
                                                <h3 class="product-name"><a href="single-product.html">Quibusdam
                                                        ratione</a>
                                                </h3>
                                                <div class="price-box">
                                                    <span class="new-price">$50.00</span>
                                                    <span class="old-price">$65.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="kenne-sidebar_categories">
                            <div class="kenne-categories_title kenne-tags_title">
                                <h5>Thẻ</h5>
                            </div>
                            <ul class="kenne-tags_list">
                                @foreach ($tags as $item)
                                    <li><a href="javascript:void(0)">{{ $item->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                {{-- product-grid --}}
                <div class="col-xl-9 col-lg-8 order-1 order-lg-2">
                    <div class="shop-toolbar">
                        <div class="product-view-mode">
                            <a class="active grid-3" data-target="gridview-3" data-toggle="tooltip" data-placement="top"
                                title="Xem theo cột">
                                <i class="fa fa-th"></i>
                            </a>
                            <a class="list" data-target="listview" data-toggle="tooltip" data-placement="top"
                                title="Xem theo danh sách">
                                <i class="fa fa-th-list"></i>
                            </a>
                        </div>
                        <div class="product-item-selection_area">
                            <div class="product-short">
                                <label class="select-label">Sắp xếp theo:</label>
                                <select class="nice-select myniceselect">
                                    <option value="1">Mặc định</option>
                                    <option value="2">Tên, A đến Z</option>
                                    <option value="2">Tên, Z đến A</option>
                                    <option value="4">Giá, từ thấp đến cao</option>
                                    <option value="4">Giá, từ cao đến thấp</option>
                                    <option value="5">Đánh giá</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="shop-product-wrap grid gridview-3 row">
                        @foreach ($data as $product)
                            @php
                                $avt = $product->image_avatar;
                                if (!\Str::contains($avt, 'http')) {
                                    $avt = \Storage::url($avt);
                                }
                            @endphp
                            <div class="col-lg-4 col-md-4 col-sm-6">
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
                                <div class="list-product_item">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="{{ route('shop.productDetail', $product->slug) }}">
                                                <img src="{{ $avt }}" alt="Kenne's Product Image">
                                            </a>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-desc_info">
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
                                                <h6 class="product-name">
                                                    <a
                                                        href="{{ route('shop.productDetail', $product->slug) }}">{{ $product->name }}</a>
                                                </h6>
                                                <div class="rating-box">
                                                    <ul>
                                                        <li><i class="ion-ios-star"></i></li>
                                                        <li><i class="ion-ios-star"></i></li>
                                                        <li><i class="ion-ios-star"></i></li>
                                                        <li class="silver-color"><i class="ion-ios-star-half"></i></li>
                                                        <li class="silver-color"><i class="ion-ios-star-outline"></i>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="product-short_desc">
                                                    {!! $product->description !!}
                                                </div>
                                            </div>
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
                                    </div>
                                </div>
                                <!-- Begin Kenne's Modal Area -->
                                <div class="modal fade modal-wrapper" id="{{ $product->slug }}">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                    aria-label="Close">
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
                                                                    <img src="{{ $avt }}"
                                                                        alt="Kenne's Product Image">
                                                                </div>
                                                                @foreach ($product->images as $image)
                                                                    @php
                                                                        $glr = $image->image_path;
                                                                        if (!\Str::contains($glr, 'http')) {
                                                                            $glr = \Storage::url($glr);
                                                                        }
                                                                    @endphp
                                                                    <div class="single-slide orange">
                                                                        <img src="{{ $glr }}"
                                                                            alt="Kenne's Product Image">
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
                                                                    <img src="{{ $avt }}"
                                                                        alt="Kenne's Product Thumnail">
                                                                </div>
                                                                @foreach ($product->images as $image)
                                                                    @php
                                                                        $glr = $image->image_path;
                                                                        if (!\Str::contains($glr, 'http')) {
                                                                            $glr = \Storage::url($glr);
                                                                        }
                                                                    @endphp
                                                                    <div class="single-slide orange">
                                                                        <img src="{{ $glr }}"
                                                                            alt="Kenne's Product Thumnail">
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
                                                                        <li class="silver-color"><i
                                                                                class="ion-android-star"></i>
                                                                        </li>
                                                                        <li class="silver-color"><i
                                                                                class="ion-android-star"></i>
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
                                                                                href="javascript:void(0)">{{ $product->sub_category['name'] }}</a>
                                                                        </li>
                                                                        <li>Mã sản phẩm: <a
                                                                                href="javascript:void(0)">{{ $product->sku }}</a>
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
                                                                                <input type="radio"
                                                                                    id="color-{{ $index }}"
                                                                                    name="product-color"
                                                                                    value="{{ $c->id }}"
                                                                                    class="single-color-input">
                                                                                <label for="color-{{ $index }}"
                                                                                    class="single-color">
                                                                                    <span class=""
                                                                                        style="background-color: {{ $c->color_value }}; width: 20px; height: 20px; display: inline-block;"></span>
                                                                                    <span
                                                                                        class="color-text">{{ $c->color_value }}</span>
                                                                                </label>
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="quantity">
                                                                    <label>Số lượng</label>
                                                                    <div class="cart-plus-minus">
                                                                        <input class="cart-plus-minus-box" value="1"
                                                                            type="number" name="quantityPRD"
                                                                            min="0" max="10">
                                                                        <div class="dec qtybutton"><i
                                                                                class="fa fa-angle-down"></i></div>
                                                                        <div class="inc qtybutton"><i
                                                                                class="fa fa-angle-up"></i>
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
                                                                                <i
                                                                                    class="ion-android-favorite-outline"></i>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="kenne-tag-line">
                                                                    <h6>Thẻ:</h6>
                                                                    @foreach ($product->tags as $tag)
                                                                        <span
                                                                            class="badge bg-info">{{ $tag->name }}</span>
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
                            </div>
                        @endforeach
                    </div>
                    {{-- pagination --}}
                    <div class="row mt-3">
                        <div class="col-lg-12">
                            {{ $data->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Kenne's Content Wrapper Area End Here -->

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
                                    <img src="{{ 'theme/client/images/brand/1.png' }}" alt="Brand Images">
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
            background-color: #242424;
            border: 2px solid #242424;
            color: #ffffff;
            width: 140px;
            height: 50px;
            line-height: 47px;
        }

        button.add-to_cart:hover {
            background-color: #a8741a;
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

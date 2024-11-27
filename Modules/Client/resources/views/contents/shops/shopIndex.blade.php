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
                                                    <li>
                                                        <a href="{{ route('shop.productDetail', $product->slug) }}" data-bs-toggle="tooltip"
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
                                                    <li>
                                                        <a href="{{ route('shop.productDetail', $product->slug) }}" data-bs-toggle="tooltip"
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

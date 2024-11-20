<!-- Begin Product Area -->
<div class="product-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h3>Sản phẩm mới</h3>
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
                    @foreach ($products_new as $product)
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
                                        <img class="primary-img" src="{{ $avt }}" alt="Kenne's Product Image">
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
                                            <li><a href="wishlist.html" data-bs-toggle="tooltip" data-placement="right"
                                                    title="Thêm vào danh sách yêu thích"><i
                                                        class="ion-ios-heart-outline"></i></a>
                                            </li>
                                            <li><a href="compare.html" data-bs-toggle="tooltip" data-placement="right"
                                                    title="So sánh sản phẩm"><i class="ion-ios-reload"></i></a>
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
@foreach ($products_new as $product)
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
                                                    href="javascript:void(0)">{{ $product->sub_category['name'] }}</a>
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

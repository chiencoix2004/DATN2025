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
                                <div class="single-slide red zoom">
                                    <img src="{{ $avt }}" alt="Kenne's Product Image">
                                </div>
                                @foreach ($data->images as $item)
                                    @php
                                        $url = $item->image_path;
                                        if (!\Str::contains($url, 'http')) {
                                            $url = \Storage::url($url);
                                        }
                                    @endphp
                                    <div class="single-slide orange zoom">
                                        <img src="{{ $url }}"
                                            alt="Kenne's Product Image">
                                    </div>
                                @endforeach
                                <div class="single-slide brown zoom">
                                    <img src="{{ asset('theme/client/images/product/2-1.jpg') }}"
                                        alt="Kenne's Product Image">
                                </div>
                                <div class="single-slide umber zoom">
                                    <img src="{{ asset('theme/client/images/product/2-2.jpg') }}"
                                        alt="Kenne's Product Image">
                                </div>
                                <div class="single-slide black zoom">
                                    <img src="{{ asset('theme/client/images/product/3-1.jpg') }}"
                                        alt="Kenne's Product Image">
                                </div>
                                <div class="single-slide green zoom">
                                    <img src="{{ asset('theme/client/images/product/3-2.jpg') }}"
                                        alt="Kenne's Product Image">
                                </div>
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
                                    <img src="{{ $avt }}"
                                        alt="Kenne's Product Thumnail">
                                </div>
                                @foreach ($data->images as $item)
                                    @php
                                        $url = $item->image_path;
                                        if (!\Str::contains($url, 'http')) {
                                            $url = \Storage::url($url);
                                        }
                                    @endphp
                                    <div class="single-slide orange">
                                        <img src="{{ $url }}"
                                            alt="Kenne's Product Image">
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
                                    <input class="cart-plus-minus-box" value="1" type="text">
                                    <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                    <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                </div>
                            </div>
                            <div class="qty-btn_area">
                                <ul>
                                    <li>
                                        <button class="add-to_cart" type="submit">
                                            Thêm vào giỏ hàng
                                        </button>
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
                                @foreach ($data->tags as $tag)
                                    <span class="badge bg-info">{{ $tag->name }}</span> &nbsp; &nbsp;
                                @endforeach
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
                                    <ul>
                                        <li>
                                            <span class="title">Ullam aliquam</span>
                                            <span>Voluptatum, minus? Optio molestias voluptates aspernatur laborum
                                                ratione minima, natus eaque nemo rem quisquam, suscipit architecto
                                                saepe. Debitis omnis labore laborum consectetur, quas, esse voluptates
                                                minus aliquam modi nesciunt earum! Vero rerum molestiae corporis libero
                                                repellat doloremque quae sapiente ratione maiores qui aliquam, sunt
                                                obcaecati! Iure nisi doloremque numquam delectus.</span>
                                        </li>
                                        <li>
                                            <span class="title">Enim tempore</span>
                                            <span>Molestias amet quibusdam eligendi exercitationem alias labore tenetur
                                                quaerat veniam similique aspernatur eveniet, suscipit corrupti itaque
                                                dolore deleniti nobis, rerum reprehenderit recusandae. Eligendi beatae
                                                asperiores nisi distinctio doloribus voluptatibus voluptas repellendus
                                                tempore unde velit temporibus atque maiores aliquid deserunt aspernatur
                                                amet, soluta fugit magni saepe fugiat vel sunt voluptate vitae</span>
                                        </li>
                                        <li>
                                            <span class="title">Laudantium suscipit</span>
                                            <span>Odit repudiandae maxime, ducimus necessitatibus error fugiat nihil eum
                                                dolorem animi voluptates sunt, rem quod reprehenderit expedita, nostrum
                                                sit accusantium ut delectus. Voluptates at ipsam, eligendi labore
                                                dignissimos consectetur reprehenderit id error excepturi illo velit
                                                ratione nisi nam saepe quod! Reiciendis eos, velit fugiat voluptates
                                                accusamus nesciunt dicta ratione mollitia, asperiores error aliquam!
                                                Reprehenderit provident, omnis blanditiis fugit, accusamus deserunt
                                                illum unde, voluptatum consequuntur illo officiis labore doloremque
                                                quidem aperiam! Fuga, expedita? Laboriosam eum, tempore vitae libero
                                                voluptate omnis ducimus doloremque hic quibusdam reiciendis ab itaque
                                                aperiam maiores laudantium esse, consequuntur quos labore modi quasi
                                                recusandae distinctio iusto optio officia tempora.</span>
                                        </li>
                                        <li>
                                            <span class="title">Molestiae veritatis officia</span>
                                            <span>Illum fuga esse tenetur inventore, in voluptatibus saepe iste quia
                                                cupiditate, explicabo blanditiis accusantium ut. Eaque nostrum, quisquam
                                                doloribus asperiores tempore autem. Ea perspiciatis vitae reiciendis
                                                maxime similique vel, id ratione blanditiis ullam officiis odio sunt nam
                                                quos atque accusantium ad! Repellendus, magni aliquid. Iure asperiores
                                                veniam eum unde dignissimos reprehenderit ut atque velit, harum labore
                                                nam expedita, pariatur excepturi consectetur animi optio mollitia ad a
                                                natus eaque aut assumenda inventore dolor obcaecati! Enim ab tempore
                                                nulla iusto consequuntur quod sit voluptatibus adipisci earum fuga,
                                                explicabo amet, provident, molestiae optio. Ducimus ex necessitatibus
                                                assumenda, nisi excepturi ut aspernatur est eius dignissimos pariatur
                                                unde ipsum sunt quaerat.</span>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <div id="specification" class="tab-pane" role="tabpanel">
                                <table class="table table-bordered specification-inner_stuff">
                                    <tbody>
                                        <tr>
                                            <td colspan="2"><strong>Memory</strong></td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td>test 1</td>
                                            <td>8gb</td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td colspan="2"><strong>Processor</strong></td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td>No. of Cores</td>
                                            <td>1</td>
                                        </tr>
                                    </tbody>
                                </table>
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
                        <h3>Bán chạy</h3>
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

                        <div class="product-item">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="single-product.html">
                                        <img class="primary-img" src="{{ asset('theme/client/images/product/1-1.jpg') }}"
                                            alt="Kenne's Product Image">
                                        <img class="secondary-img"
                                            src="{{ asset('theme/client/images/product/1-2.jpg') }}"
                                            alt="Kenne's Product Image">
                                    </a>
                                    <span class="sticker-2">Hot</span>
                                    <div class="add-actions">
                                        <ul>
                                            <li class="quick-view-btn" data-bs-toggle="modal"
                                                data-bs-target="#exampleModalCenter"><a href="javascript:void(0)"
                                                    data-bs-toggle="tooltip" data-placement="right" title="Quick View"><i
                                                        class="ion-ios-search"></i></a>
                                            </li>
                                            <li><a href="wishlist.html" data-bs-toggle="tooltip" data-placement="right"
                                                    title="Add To Wishlist"><i class="ion-ios-heart-outline"></i></a>
                                            </li>
                                            <li><a href="compare.html" data-bs-toggle="tooltip" data-placement="right"
                                                    title="Add To Compare"><i class="ion-ios-reload"></i></a>
                                            </li>
                                            <li><a href="cart.html" data-bs-toggle="tooltip" data-placement="right"
                                                    title="Add To cart"><i class="ion-bag"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="product-desc_info">
                                        <h3 class="product-name"><a href="single-product.html">Quibusdam ratione</a></h3>
                                        <div class="price-box">
                                            <span class="new-price">$46.91</span>
                                            <span class="old-price">$50.99</span>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li class="silver-color"><i class="ion-ios-star-half"></i></li>
                                                <li class="silver-color"><i class="ion-ios-star-outline"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-item">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="single-product.html">
                                        <img class="primary-img" src="{{ asset('theme/client/images/product/2-1.jpg') }}"
                                            alt="Kenne's Product Image">
                                        <img class="secondary-img"
                                            src="{{ asset('theme/client/images/product/2-2.jpg') }}"
                                            alt="Kenne's Product Image">
                                    </a>
                                    <span class="sticker">Bestseller</span>
                                    <div class="add-actions">
                                        <ul>
                                            <li class="quick-view-btn" data-bs-toggle="modal"
                                                data-bs-target="#exampleModalCenter"><a href="javascript:void(0)"
                                                    data-bs-toggle="tooltip" data-placement="right" title="Quick View"><i
                                                        class="ion-ios-search"></i></a>
                                            </li>
                                            <li><a href="wishlist.html" data-bs-toggle="tooltip" data-placement="right"
                                                    title="Add To Wishlist"><i class="ion-ios-heart-outline"></i></a>
                                            </li>
                                            <li><a href="compare.html" data-bs-toggle="tooltip" data-placement="right"
                                                    title="Add To Compare"><i class="ion-ios-reload"></i></a>
                                            </li>
                                            <li><a href="cart.html" data-bs-toggle="tooltip" data-placement="right"
                                                    title="Add To cart"><i class="ion-bag"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="product-desc_info">
                                        <h3 class="product-name"><a href="single-product.html">Nulla laboriosam</a></h3>
                                        <div class="price-box">
                                            <span class="new-price">$80.00</span>
                                            <span class="old-price">$85,00</span>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-item">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="single-product.html">
                                        <img class="primary-img" src="{{ asset('theme/client/images/product/3-1.jpg') }}"
                                            alt="Kenne's Product Image">
                                        <img class="secondary-img"
                                            src="{{ asset('theme/client/images/product/3-2.jpg') }}"
                                            alt="Kenne's Product Image">
                                    </a>
                                    <span class="sticker-2">Hot</span>
                                    <div class="add-actions">
                                        <ul>
                                            <li class="quick-view-btn" data-bs-toggle="modal"
                                                data-bs-target="#exampleModalCenter"><a href="javascript:void(0)"
                                                    data-bs-toggle="tooltip" data-placement="right" title="Quick View"><i
                                                        class="ion-ios-search"></i></a>
                                            </li>
                                            <li><a href="wishlist.html" data-bs-toggle="tooltip" data-placement="right"
                                                    title="Add To Wishlist"><i class="ion-ios-heart-outline"></i></a>
                                            </li>
                                            <li><a href="compare.html" data-bs-toggle="tooltip" data-placement="right"
                                                    title="Add To Compare"><i class="ion-ios-reload"></i></a>
                                            </li>
                                            <li><a href="cart.html" data-bs-toggle="tooltip" data-placement="right"
                                                    title="Add To cart"><i class="ion-bag"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="product-desc_info">
                                        <h3 class="product-name"><a href="single-product.html">Adipisci voluptas</a></h3>
                                        <div class="price-box">
                                            <span class="new-price">$75.91</span>
                                            <span class="old-price">$80.99</span>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li class="silver-color"><i class="ion-ios-star-outline"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-item">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="single-product.html">
                                        <img class="primary-img" src="{{ asset('theme/client/images/product/4-1.jpg') }}"
                                            alt="Kenne's Product Image">
                                        <img class="secondary-img"
                                            src="{{ asset('theme/client/images/product/4-2.jpg') }}"
                                            alt="Kenne's Product Image">
                                    </a>
                                    <span class="sticker">Bestseller</span>
                                    <div class="add-actions">
                                        <ul>
                                            <li class="quick-view-btn" data-bs-toggle="modal"
                                                data-bs-target="#exampleModalCenter"><a href="javascript:void(0)"
                                                    data-bs-toggle="tooltip" data-placement="right" title="Quick View"><i
                                                        class="ion-ios-search"></i></a>
                                            </li>
                                            <li><a href="wishlist.html" data-bs-toggle="tooltip" data-placement="right"
                                                    title="Add To Wishlist"><i class="ion-ios-heart-outline"></i></a>
                                            </li>
                                            <li><a href="compare.html" data-bs-toggle="tooltip" data-placement="right"
                                                    title="Add To Compare"><i class="ion-ios-reload"></i></a>
                                            </li>
                                            <li><a href="cart.html" data-bs-toggle="tooltip" data-placement="right"
                                                    title="Add To cart"><i class="ion-bag"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="product-desc_info">
                                        <h3 class="product-name"><a href="single-product.html">Possimus beatae</a></h3>
                                        <div class="price-box">
                                            <span class="new-price">$65.00</span>
                                            <span class="old-price">$70.00</span>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li class="silver-color"><i class="ion-ios-star-half"></i></li>
                                                <li class="silver-color"><i class="ion-ios-star-outline"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-item">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="single-product.html">
                                        <img class="primary-img" src="{{ asset('theme/client/images/product/5-1.jpg') }}"
                                            alt="Kenne's Product Image">
                                        <img class="secondary-img"
                                            src="{{ asset('theme/client/images/product/5-2.jpg') }}"
                                            alt="Kenne's Product Image">
                                    </a>
                                    <span class="sticker-2">Hot</span>
                                    <div class="add-actions">
                                        <ul>
                                            <li class="quick-view-btn" data-bs-toggle="modal"
                                                data-bs-target="#exampleModalCenter"><a href="javascript:void(0)"
                                                    data-bs-toggle="tooltip" data-placement="right" title="Quick View"><i
                                                        class="ion-ios-search"></i></a>
                                            </li>
                                            <li><a href="wishlist.html" data-bs-toggle="tooltip" data-placement="right"
                                                    title="Add To Wishlist"><i class="ion-ios-heart-outline"></i></a>
                                            </li>
                                            <li><a href="compare.html" data-bs-toggle="tooltip" data-placement="right"
                                                    title="Add To Compare"><i class="ion-ios-reload"></i></a>
                                            </li>
                                            <li><a href="cart.html" data-bs-toggle="tooltip" data-placement="right"
                                                    title="Add To cart"><i class="ion-bag"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="product-desc_info">
                                        <h3 class="product-name"><a href="single-product.html">Voluptates laudantium</a>
                                        </h3>
                                        <div class="price-box">
                                            <span class="new-price">$95.00</span>
                                            <span class="old-price">$100.00</span>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li class="silver-color"><i class="ion-ios-star-half"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-item">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="single-product.html">
                                        <img class="primary-img" src="{{ asset('theme/client/images/product/6-1.jpg') }}"
                                            alt="Kenne's Product Image">
                                        <img class="secondary-img"
                                            src="{{ asset('theme/client/images/product/6-2.jpg') }}"
                                            alt="Kenne's Product Image">
                                    </a>
                                    <span class="sticker">Bestseller</span>
                                    <div class="add-actions">
                                        <ul>
                                            <li class="quick-view-btn" data-bs-toggle="modal"
                                                data-bs-target="#exampleModalCenter"><a href="javascript:void(0)"
                                                    data-bs-toggle="tooltip" data-placement="right" title="Quick View"><i
                                                        class="ion-ios-search"></i></a>
                                            </li>
                                            <li><a href="wishlist.html" data-bs-toggle="tooltip" data-placement="right"
                                                    title="Add To Wishlist"><i class="ion-ios-heart-outline"></i></a>
                                            </li>
                                            <li><a href="compare.html" data-bs-toggle="tooltip" data-placement="right"
                                                    title="Add To Compare"><i class="ion-ios-reload"></i></a>
                                            </li>
                                            <li><a href="cart.html" data-bs-toggle="tooltip" data-placement="right"
                                                    title="Add To cart"><i class="ion-bag"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="product-desc_info">
                                        <h3 class="product-name"><a href="single-product.html">Eligendi voluptate</a></h3>
                                        <div class="price-box">
                                            <span class="new-price">$60.00</span>
                                            <span class="old-price">$65.00</span>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li class="silver-color"><i class="ion-ios-star-half"></i></li>
                                                <li class="silver-color"><i class="ion-ios-star-outline"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-item">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="single-product.html">
                                        <img class="primary-img" src="{{ asset('theme/client/images/product/7-1.jpg') }}"
                                            alt="Kenne's Product Image">
                                        <img class="secondary-img"
                                            src="{{ asset('theme/client/images/product/7-2.jpg') }}"
                                            alt="Kenne's Product Image">
                                    </a>
                                    <span class="sticker-2">Hot</span>
                                    <div class="add-actions">
                                        <ul>
                                            <li class="quick-view-btn" data-bs-toggle="modal"
                                                data-bs-target="#exampleModalCenter"><a href="javascript:void(0)"
                                                    data-bs-toggle="tooltip" data-placement="right" title="Quick View"><i
                                                        class="ion-ios-search"></i></a>
                                            </li>
                                            <li><a href="wishlist.html" data-bs-toggle="tooltip" data-placement="right"
                                                    title="Add To Wishlist"><i class="ion-ios-heart-outline"></i></a>
                                            </li>
                                            <li><a href="compare.html" data-bs-toggle="tooltip" data-placement="right"
                                                    title="Add To Compare"><i class="ion-ios-reload"></i></a>
                                            </li>
                                            <li><a href="cart.html" data-bs-toggle="tooltip" data-placement="right"
                                                    title="Add To cart"><i class="ion-bag"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="product-desc_info">
                                        <h3 class="product-name"><a href="single-product.html">Excepturi perspiciatis</a>
                                        </h3>
                                        <div class="price-box">
                                            <span class="new-price">$50.00</span>
                                            <span class="old-price">$60.00</span>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li class="silver-color"><i class="ion-ios-star-outline"></i></li>
                                                <li class="silver-color"><i class="ion-ios-star-outline"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-item">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="single-product.html">
                                        <img class="primary-img" src="{{ asset('theme/client/images/product/8-1.jpg') }}"
                                            alt="Kenne's Product Image">
                                        <img class="secondary-img"
                                            src="{{ asset('theme/client/images/product/8-2.jpg') }}"
                                            alt="Kenne's Product Image">
                                    </a>
                                    <span class="sticker">Bestseller</span>
                                    <div class="add-actions">
                                        <ul>
                                            <li class="quick-view-btn" data-bs-toggle="modal"
                                                data-bs-target="#exampleModalCenter"><a href="javascript:void(0)"
                                                    data-bs-toggle="tooltip" data-placement="right" title="Quick View"><i
                                                        class="ion-ios-search"></i></a>
                                            </li>
                                            <li><a href="wishlist.html" data-bs-toggle="tooltip" data-placement="right"
                                                    title="Add To Wishlist"><i class="ion-ios-heart-outline"></i></a>
                                            </li>
                                            <li><a href="compare.html" data-bs-toggle="tooltip" data-placement="right"
                                                    title="Add To Compare"><i class="ion-ios-reload"></i></a>
                                            </li>
                                            <li><a href="cart.html" data-bs-toggle="tooltip" data-placement="right"
                                                    title="Add To cart"><i class="ion-bag"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="product-desc_info">
                                        <h3 class="product-name"><a href="single-product.html">Esse eveniet</a></h3>
                                        <div class="price-box">
                                            <span class="new-price">$70.00</span>
                                            <span class="old-price">$75.00</span>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li class="silver-color"><i class="ion-ios-star-half"></i></li>
                                                <li class="silver-color"><i class="ion-ios-star-outline"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

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

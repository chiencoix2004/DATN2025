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
                                <div class="single-slide red zoom">
                                    <img src="{{ asset('theme/client/images/product/1-1.jpg') }}"
                                        alt="Kenne's Product Image">
                                </div>
                                <div class="single-slide orange zoom">
                                    <img src="{{ asset('theme/client/images/product/1-2.jpg') }}"
                                        alt="Kenne's Product Image">
                                </div>
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
                                <div class="single-slide red">
                                    <img src="{{ asset('theme/client/images/product/1-1.jpg') }}"
                                        alt="Kenne's Product Thumnail">
                                </div>
                                <div class="single-slide orange">
                                    <img src="{{ asset('theme/client/images/product/1-2.jpg') }}"
                                        alt="Kenne's Product Thumnail">
                                </div>
                                <div class="single-slide brown">
                                    <img src="{{ asset('theme/client/images/product/2-1.jpg') }}"
                                        alt="Kenne's Product Thumnail">
                                </div>
                                <div class="single-slide umber">
                                    <img src="{{ asset('theme/client/images/product/2-2.jpg') }}"
                                        alt="Kenne's Product Thumnail">
                                </div>
                                <div class="single-slide red">
                                    <img src="{{ asset('theme/client/images/product/3-1.jpg') }}"
                                        alt="Kenne's Product Thumnail">
                                </div>
                                <div class="single-slide orange">
                                    <img src="{{ asset('theme/client/images/product/3-2.jpg') }}"
                                        alt="Kenne's Product Thumnail">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="sp-content">
                            <div class="sp-heading">
                                <h5><a href="#">Aliquid rerum ipsam maxime</a></h5>
                            </div>
                            <span class="reference">Mã sản phẩm: demo_1</span>
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
                                <ul>
                                    <li>Hãng: <a href="javascript:void(0)">Buxton</a></li>
                                    <li>Product Code: <a href="javascript:void(0)">Product 16</a></li>
                                    <li>Reward Points: <a href="javascript:void(0)">100</a></li>
                                    <li>Availability: <a href="javascript:void(0)">In Stock</a></li>
                                    <li>EX Tax: <a href="javascript:void(0)"><span>$453.35</span></a></li>
                                    <li>Price in reward points: <a href="javascript:void(0)">400</a></li>
                                </ul>
                            </div>
                            <div class="product-size_box">
                                <span>Size</span>
                                <select class="myniceselect nice-select">
                                    <option value="1">S</option>
                                    <option value="2">M</option>
                                    <option value="3">L</option>
                                    <option value="4">XL</option>
                                </select>
                            </div>
                            <div class="color-list_area">
                                <div class="color-list_heading">
                                    <h4>Tùy chọn biến thể</h4>
                                </div>
                                <span class="sub-title">Màu</span>
                                <div class="color-list">
                                    <a href="javascript:void(0)" class="single-color active" data-swatch-color="red">
                                        <span class="bg-red_color"></span>
                                        <span class="color-text">Red (+$150)</span>
                                    </a>
                                    <a href="javascript:void(0)" class="single-color" data-swatch-color="orange">
                                        <span class="burnt-orange_color"></span>
                                        <span class="color-text">Orange (+$170)</span>
                                    </a>
                                    <a href="javascript:void(0)" class="single-color" data-swatch-color="brown">
                                        <span class="brown_color"></span>
                                        <span class="color-text">Brown (+$120)</span>
                                    </a>
                                    <a href="javascript:void(0)" class="single-color" data-swatch-color="umber">
                                        <span class="raw-umber_color"></span>
                                        <span class="color-text">Umber (+$125)</span>
                                    </a>
                                    <a href="javascript:void(0)" class="single-color" data-swatch-color="black">
                                        <span class="black_color"></span>
                                        <span class="color-text">Black (+$125)</span>
                                    </a>
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
                                    <li><a class="qty-cart_btn" href="cart.html">Thêm vào giỏ hàng</a></li>
                                    <li><a class="qty-wishlist_btn" href="wishlist.html" data-bs-toggle="tooltip"
                                            title="Thêm vào yêu thích"><i class="ion-android-favorite-outline"></i></a>
                                    </li>
                                    <li><a class="qty-compare_btn" href="compare.html" data-bs-toggle="tooltip"
                                            title="So sánh sản phẩm này"><i class="ion-ios-shuffle-strong"></i></a></li>
                                </ul>
                            </div>
                            <div class="kenne-tag-line">
                                <h6>Thẻ:</h6>
                                <a href="javascript:void(0)">scarf</a>,
                                <a href="javascript:void(0)">jacket</a>,
                                <a href="javascript:void(0)">shirt</a>
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

@extends('admin::layout.master')
@section('title')
    Admin | Chi tiết sản phẩm
@endsection
@section('contents')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="product-slider" id="galleryTop">
                        <div class="swiper theme-slider position-lg-absolute all-0"
                            data-swiper='{"autoHeight":true,"spaceBetween":5,"loop":true,"loopedSlides":5,"thumb":{"spaceBetween":5,"slidesPerView":5,"loop":true,"freeMode":true,"grabCursor":true,"loopedSlides":5,"centeredSlides":true,"slideToClickedSlide":true,"watchSlidesVisibility":true,"watchSlidesProgress":true,"parent":"#galleryTop"},"slideToClickedSlide":true}'>
                            <div class="swiper-wrapper h-100">
                                <div class="swiper-slide h-100">
                                    <img class="rounded-1 object-fit-cover h-100 w-100"
                                        src="{{ \Storage::url($data->image_avatar) }}" alt="" />
                                </div>
                                @if (count($data->images) > 0)
                                    @foreach ($data->images as $item)
                                        <div class="swiper-slide h-100">
                                            <img class="rounded-1 object-fit-cover h-100 w-100"
                                                src="{{ \Storage::url($item->image_path) }}" alt="" />
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="swiper-nav">
                                <div class="swiper-button-next swiper-button-white"></div>
                                <div class="swiper-button-prev swiper-button-white"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h5>{{ $data->name }}</h5>
                    {{-- <a class="fs-10 mb-2 d-block" href="#!">Computer &amp; Accessories</a> --}}
                    <div class="fs-11 mb-3 d-inline-block text-decoration-none">
                        <span class="fa fa-star text-warning"></span>
                        <span class="fa fa-star text-warning"></span>
                        <span class="fa fa-star text-warning"></span>
                        <span class="fa fa-star text-warning"></span>
                        <span class="fa fa-star-half-alt text-warning star-icon"></span>
                        <span class="ms-1 text-600">(8)</span>
                    </div>
                    <p class="fs-10">
                        {!! $data->description !!}
                    </p>
                    <h4 class="d-flex align-items-center">
                        <span class="text-warning me-2">
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
                            (VND)
                        </span>
                        @if ($data->discount_percent > 0 || $data->price_sale > 0)
                            <span class="me-1 fs-10 text-500">
                                <del class="me-1">
                                    {{ number_format((int) $data->price_regular, 0, ',', '.') }}
                                </del>
                            </span>
                        @endif
                    </h4>
                    {{-- <p class="fs-10 mb-1">
                        <span>Chi phí vận chuyển: </span>
                        <strong>$50</strong>
                    </p> --}}
                    <p class="fs-10">Trạng thái: {!! $data->is_active == 1
                        ? '<strong class="text-success">Hoạt động</strong>'
                        : '<strong class="text-danger">Không hoạt động</strong>' !!}</p>
                    <p class="fs-10 mb-3">Tags:
                        @foreach ($data->tags as $item)
                            <a class="ms-2 badge bg-info" href="#!">Computer</a>
                        @endforeach
                        {{-- <div class="row">
                        <div class="col-auto pe-0">
                            <div class="input-group input-group-sm" data-quantity="data-quantity">
                                <button class="btn btn-sm btn-outline-secondary border border-300"
                                    data-field="input-quantity" data-type="minus">-</button>
                                <input class="form-control text-center input-quantity input-spin-none" type="number"
                                    min="0" value="0" aria-label="Amount (to the nearest dollar)"
                                    style="max-width: 50px" />
                                <button class="btn btn-sm btn-outline-secondary border border-300"
                                    data-field="input-quantity" data-type="plus">+</button>
                            </div>
                        </div>
                        <div class="col-auto px-2 px-md-3">
                            <a class="btn btn-sm btn-primary" href="#!">
                                <span class="fas fa-cart-plus me-sm-2"></span>
                                <span class="d-none d-sm-inline-block">Add To Cart</span>
                            </a>
                        </div>
                        <div class="col-auto px-0">
                            <a class="btn btn-sm btn-outline-danger border border-300" href="#!"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Wish List">
                                <span class="far fa-heart me-1"></span>282</a>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="mt-4">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active ps-0" id="description-tab" data-bs-toggle="tab"
                                    href="#tab-description" role="tab" aria-controls="tab-description"
                                    aria-selected="true">Mô tả sản phẩm</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link px-2 px-md-3" id="specifications-tab" data-bs-toggle="tab"
                                    href="#tab-specifications" role="tab" aria-controls="tab-specifications"
                                    aria-selected="false">Chất liệu sản phẩm</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link px-2 px-md-3" id="reviews-tab" data-bs-toggle="tab" href="#tab-reviews"
                                    role="tab" aria-controls="tab-reviews" aria-selected="false">Reviews</a>
                            </li> --}}
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tab-description" role="tabpanel"
                                aria-labelledby="description-tab">
                                <div class="mt-3">
                                    {!! $data->description !!}
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-specifications" role="tabpanel"
                                aria-labelledby="specifications-tab">
                                {!! $data->material !!}
                            </div>
                            {{-- <div class="tab-pane fade" id="tab-reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                <div class="row mt-3">
                                    <div class="col-lg-6 mb-4 mb-lg-0">
                                        <div class="mb-1"><span class="fa fa-star text-warning fs-10"></span><span
                                                class="fa fa-star text-warning fs-10"></span><span
                                                class="fa fa-star text-warning fs-10"></span><span
                                                class="fa fa-star text-warning fs-10"></span><span
                                                class="fa fa-star text-warning fs-10"></span><span
                                                class="ms-3 text-1100 fw-semi-bold">Awesome support, great code 😍</span>
                                        </div>
                                        <p class="fs-10 mb-2 text-600">By Drik Smith • October 14, 2019</p>
                                        <p class="mb-0">You shouldn't need to read a review to see how nice and polished
                                            this theme is. So I'll tell you something you won't find in the demo. After the
                                            download I had a technical question, emailed the team and got a response right
                                            from the team CEO with helpful advice.</p>
                                        <hr class="my-4" />
                                        <div class="mb-1"><span class="fa fa-star text-warning fs-10"></span><span
                                                class="fa fa-star text-warning fs-10"></span><span
                                                class="fa fa-star text-warning fs-10"></span><span
                                                class="fa fa-star text-warning fs-10"></span><span
                                                class="fa fa-star-half-alt text-warning star-icon fs-10"></span><span
                                                class="ms-3 text-1100 fw-semi-bold">Outstanding Design, Awesome
                                                Support</span></div>
                                        <p class="fs-10 mb-2 text-600">By Liane • December 14, 2019</p>
                                        <p class="mb-0">This really is an amazing template - from the style to the font -
                                            clean layout. SO worth the money! The demo pages show off what Bootstrap 4 can
                                            impressively do. Great template!! Support response is FAST and the team is
                                            amazing - communication is important.</p>
                                    </div>
                                    <div class="col-lg-6 ps-lg-5">
                                        <form>
                                            <h5 class="mb-3">Write your Review</h5>
                                            <div class="mb-3"><label class="form-label">Ratting: </label>
                                                <div class="d-block" data-rater='{"starSize":32,"step":0.5}'></div>
                                            </div>
                                            <div class="mb-3"><label class="form-label"
                                                    for="formGroupNameInput">Name:</label><input class="form-control"
                                                    id="formGroupNameInput" type="text" /></div>
                                            <div class="mb-3"><label class="form-label"
                                                    for="formGroupEmailInput">Email:</label><input class="form-control"
                                                    id="formGroupEmailInput" type="email" /></div>
                                            <div class="mb-3"><label class="form-label"
                                                    for="formGrouptextareaInput">Review:</label>
                                                <textarea class="form-control" id="formGrouptextareaInput" rows="3"></textarea>
                                            </div><button class="btn btn-primary" type="submit">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css-libs')
    <link href="{{ asset('theme/admin/vendors/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
@endsection
@section('js-libs')
    <script src="{{ asset('theme/admin/vendors/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('theme/admin/vendors/rater-js/index.js') }}"></script>
@endsection

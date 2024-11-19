@extends('client::layouts.master')

@section('title')
    Thanh toán | Thời trang Phong cách Việt
@endsection
@section('contents')
    <!-- Begin Kenne's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <h2 style="margin-top: 30px;">Thời trang Phong cách Việt</h2>
                <ul>
                    <li><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li class="active">Thanh toán</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Kenne's Breadcrumb Area End Here -->

    <!-- Begin Kenne's Checkout Area -->
    <div class="checkout-area">
        <div class="container">

            <div class="row">
                <form action="javascript:void(0)" id="checkOutForm" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <input type="hidden" name="user_id" value="{{ $userId }}">
                            <div class="checkbox-form">
                                <h3>Chi tiết thanh toán</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Họ<span class="required">*</span></label>
                                        <input placeholder="Nhập họ của bạn" type="text" id="last_name" name="last_name">
                                        <p></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Tên<span class="required">*</span></label>
                                        <input placeholder="Nhập tên của bạn" type="text" id="first_name"
                                            name="first_name">
                                        <p></p>
                                    </div>
                                    <div class="col-md-12">
                                        <label>Địa chỉ cụ thể<span class="required">*</span></label>
                                        <input placeholder="Street address" type="text" id="user_address"
                                            name="user_address">
                                        <p></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Địa chỉ Email<span class="required">*</span></label>
                                        <input placeholder="abc@test.com" type="email" id="user_email" name="user_email">
                                        <p></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Số điện thoại<span class="required">*</span></label>
                                        <input type="text" id="user_phone" name="user_phone">
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="your-order">
                                <h3>Đơn hàng của bạn</h3>
                                <div class="your-order-table table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="cart-product-name">Sản phẩm</th>
                                                <th class="cart-product-total">Tổng cộng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cartItems as $item)
                                                <tr class="cart_item">
                                                    <td class="cart-product-name">
                                                        {{ $item->productVariant->product->name }}<br>
                                                        <div>
                                                            - Size: {{ $item->productVariant->size->size_value }}
                                                            - Màu: <input type="color"
                                                                value="{{ $item->productVariant->color->color_value }}"
                                                                disabled>
                                                        </div>

                                                        <strong class="product-quantity">
                                                            × {{ $item->quantity }}</strong>
                                                    </td>
                                                    <td class="cart-product-total"><span
                                                            class="amount">{{ number_format($item->total_price, 0, ',', '.') }}
                                                            VNĐ</span></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr class="cart-subtotal">
                                                <th>Tổng phụ giỏ hàng</th>
                                                <td><span
                                                        class="amount">{{ number_format($cart->total_amount, 0, ',', '.') }}
                                                        VNĐ</span></td>
                                            </tr>
                                            @if (session('discount'))
                                                <tr class="cart-subtotal">
                                                    <th>
                                                        Giảm giá: {{ session('discount_code') }}
                                                    </th>
                                                    <td>
                                                        <span
                                                            class="amount">{{ number_format(session('discount'), 0, ',', '.') }}
                                                            VNĐ</span>
                                                    </td>
                                                </tr>
                                            @endif
                                            <tr class="order-total">
                                                @php
                                                    $discount = session('discount') ? session('discount') : 0;
                                                    $totalAmount = $cart->total_amount - $discount;

                                                @endphp
                                                <th>Tổng đơn hàng</th>
                                                <td>
                                                    <strong>
                                                     <span class="amount">{{ number_format($totalAmount, 0, ',', '.') }} VNĐ</span>
                                                    </strong>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="payment-method">
                                    <div class="payment-accordion">
                                        <div id="accordion">
                                            <div class="card actives">
                                                <div class="card-header" id="#payment-1">
                                                    <h5 class="panel-title">
                                                        <a href="javascript:void(0)" class="collapsed"
                                                            data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                            aria-expanded="false" aria-controls="collapseOne">
                                                            Chuyển khoản ngân hàng trực tiếp.
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div id="collapseOne" class="collapse" data-bs-parent="#accordion"
                                                    style="">
                                                    <div class="card-body">
                                                        <p>Thực hiện thanh toán của bạn trực tiếp vào tài khoản ngân hàng
                                                            của chúng tôi. Vui lòng sử dụng ID đơn hàng của bạn làm tham
                                                            chiếu thanh toán. Đơn hàng của bạn sẽ không được giao cho đến
                                                            khi tiền đã được chuyển vào tài khoản của chúng tôi.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="#payment-2">
                                                    <h5 class="panel-title">
                                                        <a href="javascript:void(0)" class="collapsed"
                                                            data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                            aria-expanded="false" aria-controls="collapseTwo">
                                                            Thanh toán bằng séc
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div id="collapseTwo" class="collapse" data-bs-parent="#accordion"
                                                    style="">
                                                    <div class="card-body">
                                                        <p>Thực hiện thanh toán của bạn trực tiếp vào tài khoản ngân hàng
                                                            của chúng tôi. Vui lòng sử dụng ID đơn hàng của bạn làm tham
                                                            chiếu thanh toán. Đơn hàng của bạn sẽ không được giao cho đến
                                                            khi tiền đã được chuyển vào tài khoản của chúng tôi.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="#payment-3">
                                                    <h5 class="panel-title">
                                                        <a href="javascript:void(0)" class="collapsed"
                                                            data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                                            aria-expanded="false" aria-controls="collapseThree">
                                                            PayPal
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div id="collapseThree" class="collapse" data-bs-parent="#accordion"
                                                    style="">
                                                    <div class="card-body">
                                                        <p>Thực hiện thanh toán của bạn trực tiếp vào tài khoản ngân hàng
                                                            của chúng tôi. Vui lòng sử dụng ID đơn hàng của bạn làm tham
                                                            chiếu thanh toán. Đơn hàng của bạn sẽ không được giao cho đến
                                                            khi tiền đã được chuyển vào tài khoản của chúng tôi.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="order-button-payment">
                                            <input value="Đặt hàng" type="submit">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
@endsection
@section('js-setting')
    <script type="module">
        $(document).ready(function() {
            $('#checkOutForm').on('submit', function(e) {
                e.preventDefault();

                $(".error-message").remove();

                const first_name = $("#first_name").val();
                const last_name = $("#last_name").val();
                const user_email = $("#user_email").val();
                const user_address = $("#user_address").val();
                const user_phone = $("#user_phone").val();

                let isValid = true;

                if (first_name === '') {
                    $('#first_name').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(
                        'Vui lòng nhập tên của bạn');
                    let isValid = false;
                }

                if (first_name.length > 50 && first_name !== '') {
                    $('#first_name').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(
                        'Tên của bạn không được hơn 50 kí tự');
                    let isValid = false;
                }

                if (/<[^>]*>/g.test(first_name) && first_name !== '') {
                    $('#first_name').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(
                        'Vui lòng nhập tên hợp lệ');
                    let isValid = false;
                }

                if (last_name === '') {
                    $('#last_name').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(
                        'Vui lòng nhập họ của bạn');
                    let isValid = false;
                }

                if (last_name.length > 50 && last_name !== '') {
                    $('#last_name').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(
                        'Họ của bạn không được hơn 50 kí tự');
                    let isValid = false;
                }

                if (/<[^>]*>/g.test(last_name) && last_name !== '') {
                    $('#last_name').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(
                        'Vui lòng nhập họ hợp lệ');
                    let isValid = false;
                }

                if (user_address === '') {
                    $('#user_address').addClass('is-invalid').siblings('p').addClass('invalid-feedback')
                        .html(
                            'Vui lòng nhập địa chỉ cụ thể của bạn');
                    let isValid = false;
                }

                if (user_address.length < 10 && user_address !== '') {
                    $('#user_address').addClass('is-invalid').siblings('p').addClass('invalid-feedback')
                        .html(
                            'Địa chỉ cụ thể của bạn phải nhiều hơn 10 kí tự');
                    let isValid = false;
                }

                if (user_address.length > 500 && user_address !== '') {
                    $('#user_address').addClass('is-invalid').siblings('p').addClass('invalid-feedback')
                        .html(
                            'Địa chỉ cụ thể của bạn không được nhiều hơn 500 kí tự');
                    let isValid = false;
                }

                if (user_phone === '') {
                    $('#user_phone').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(
                        'Vui lòng nhập số điện thoại của bạn.');
                    let isValid = false;
                }

                if (user_phone !== '' && !/^\d{10}$/.test(user_phone)) {
                    $('#user_phone')
                        .addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html('Số điện thoại phải chứa 10 chữ số và bắt đầu bằng 0');
                    let isValid = false;
                }

                if (user_email === '') {
                    $('#user_email').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(
                        'Vui lòng nhập email của bạn');
                    let isValid = false;
                }

                if (user_email !== '' && !
                    /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                    .test(user_email)) {
                    $('#user_email')
                        .addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html('Vui lòng nhập đúng định dạng email');
                    let isValid = false;
                }

                if (!isValid) {
                    return;
                } else {
                    let formData = $(this).serialize();

                    $.ajax({
                        url: '/api/cart/checkout',
                        type: 'POST',
                        data: formData,
                        success: function(response) {
                            if (response.success) {
                                alert('Thanh toán thành công!');
                                // window.location.href = '/thank-you';
                            } else {
                                alert(response.message ||
                                    'Thanh toán thất bại. Vui lòng thử lại.');
                            }
                        }
                    });
                }
            });
        });

        function checkFormFields() {
            let isEmpty = false;

            $('#first_name, #last_name, #user_address, #user_phone, #user_email').each(function() {
                if ($(this).val() === '') {
                    isEmpty = true;
                }
            });

            if (isEmpty) {
                $("#checkOutForm button[type='submit']").prop('disabled', true);
            } else {
                $("#checkOutForm button[type='submit']").prop('disabled', false);
            }
        }

        $('#first_name').on('input change',
            function() {
                checkFormFields();
                $(this).removeClass('is-invalid').siblings('.error-message').html('').hide();

                const first_name = $("#first_name").val();
                const last_name = $("#last_name").val();
                const user_email = $("#user_email").val();
                const user_address = $("#user_address").val();
                const user_phone = $("#user_phone").val();

                if (first_name === '') {
                    $('#first_name').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(
                        'Vui lòng nhập tên của bạn');
                }

                if (first_name.length > 50 && first_name !== '') {
                    $('#first_name').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(
                        'Tên của bạn không được hơn 50 kí tự');
                }

                if (/<[^>]*>/g.test(first_name) && first_name !== '') {
                    $('#first_name').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(
                        'Vui lòng nhập tên hợp lệ');
                }

                if (
                    first_name === '' ||
                    last_name === '' ||
                    user_email === '' ||
                    user_address === '' ||
                    user_phone === ''
                ) {
                    $("button[type='submit']").prop('disabled', true);
                } else {
                    $("button[type='submit']").prop('disabled', false);
                }
            });

        $('#last_name').on('input change',
            function() {
                checkFormFields();
                $(this).removeClass('is-invalid').siblings('.error-message').html('').hide();

                const first_name = $("#first_name").val();
                const last_name = $("#last_name").val();
                const user_email = $("#user_email").val();
                const user_address = $("#user_address").val();
                const user_phone = $("#user_phone").val();

                if (last_name === '') {
                    $('#last_name').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(
                        'Vui lòng nhập họ của bạn');
                }

                if (last_name.length > 50 && last_name !== '') {
                    $('#last_name').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(
                        'Họ của bạn không được hơn 50 kí tự');
                }

                if (/<[^>]*>/g.test(last_name) && last_name !== '') {
                    $('#last_name').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(
                        'Vui lòng nhập họ hợp lệ');
                }

                if (
                    first_name === '' ||
                    last_name === '' ||
                    user_email === '' ||
                    user_address === '' ||
                    user_phone === ''
                ) {
                    $("button[type='submit']").prop('disabled', true);
                } else {
                    $("button[type='submit']").prop('disabled', false);
                }
            });

        $('#user_address').on('input change',
            function() {
                checkFormFields();
                $(this).removeClass('is-invalid').siblings('.error-message').html('').hide();

                const first_name = $("#first_name").val();
                const last_name = $("#last_name").val();
                const user_email = $("#user_email").val();
                const user_address = $("#user_address").val();
                const user_phone = $("#user_phone").val();

                if (user_address === '') {
                    $('#user_address').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(
                        'Vui lòng nhập địa chỉ cụ thể của bạn');
                }

                if (user_address.length < 10 && user_address !== '') {
                    $('#user_address').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(
                        'Địa chỉ cụ thể của bạn phải nhiều hơn 10 kí tự');
                }

                if (user_address.length > 500 && user_address !== '') {
                    $('#user_address').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(
                        'Địa chỉ cụ thể của bạn không được nhiều hơn 500 kí tự');
                }

                if (
                    first_name === '' ||
                    last_name === '' ||
                    user_email === '' ||
                    user_address === '' ||
                    user_phone === ''
                ) {
                    $("button[type='submit']").prop('disabled', true);
                } else {
                    $("button[type='submit']").prop('disabled', false);
                }
            });

        $('#user_phone').on('input change',
            function() {
                checkFormFields();
                $(this).removeClass('is-invalid').siblings('.error-message').html('').hide();

                const first_name = $("#first_name").val();
                const last_name = $("#last_name").val();
                const user_email = $("#user_email").val();
                const user_address = $("#user_address").val();
                const user_phone = $("#user_phone").val();

                if (user_phone === '') {
                    $('#user_phone').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(
                        'Vui lòng nhập số điện thoại của bạn.');
                }

                if (user_phone !== '' && !/^\d{10}$/.test(user_phone)) {
                    $('#user_phone')
                        .addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html('Số điện thoại phải chứa 10 chữ số và bắt đầu bằng 0');
                }

                if (
                    first_name === '' ||
                    last_name === '' ||
                    user_email === '' ||
                    user_address === '' ||
                    user_phone === ''
                ) {
                    $("button[type='submit']").prop('disabled', true);
                } else {
                    $("button[type='submit']").prop('disabled', false);
                }
            });

        $('#user_email').on('input change',
            function() {
                checkFormFields();
                $(this).removeClass('is-invalid').siblings('.error-message').html('').hide();

                const first_name = $("#first_name").val();
                const last_name = $("#last_name").val();
                const user_email = $("#user_email").val();
                const user_address = $("#user_address").val();
                const user_phone = $("#user_phone").val();

                if (user_email === '') {
                    $('#user_email').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(
                        'Vui lòng nhập email của bạn');
                }

                if (user_email !== '' && !
                    /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                    .test(user_email)) {
                    $('#user_email')
                        .addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html('Vui lòng nhập đúng định dạng email');
                }

                if (
                    first_name === '' ||
                    last_name === '' ||
                    user_email === '' ||
                    user_address === '' ||
                    user_phone === ''
                ) {
                    $("button[type='submit']").prop('disabled', true);
                } else {
                    $("button[type='submit']").prop('disabled', false);
                }
            });
    </script>
@endsection

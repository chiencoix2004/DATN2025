@extends('wallet::layouts.css')

@section('content')
    <div class="container mt-5">
        <!-- Header -->
        <div class="text-center mb-4">
            <!-- Logo -->
            {{-- <img src="/path/to/logo.png" alt="Logo" class="logo mb-3"> --}}
            <!-- Heading -->
            <h3 class="text-primary" style="font-size: 1.5rem;">Chi tiết đơn thanh toán</h3>
        </div>

        <!-- Card -->
        <div class="card">
            <div class="card-body">
                <div class="container-fluid">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="mb-3">
                        <h5 class="text-primary">Thanh toán dịch vụ</h5>
                        <p class="text-muted">Bạn đang thanh toán đơn mua hàng</p>
                        <div class="status-bar d-flex justify-content-center mb-4">
                            <ul class="wizard-nav list-unstyled d-flex">
                                <!-- Wallet Icon -->
                                <li class="wizard-list-item me-3">
                                    <div class="list-item text-center">
                                        <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Seller Details">
                                            <i class="bx bx-wallet-alt"></i>
                                            <p class="small m-0 text-nowrap">{{ $walletaccount->wallet_account_id }}</p>
                                        </div>
                                    </div>
                                </li>

                                <!-- Arrow Icon -->
                                <li class="wizard-list-item me-4 mt-3">
                                    <div class="list-item text-center">
                                        <i class="bx bx-right-arrow-alt"></i>
                                    </div>
                                </li>

                                <!-- Store Icon -->
                                <li class="wizard-list-item">
                                    <div class="list-item text-center">
                                        <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Bank Details">
                                            <i class="bx bx-store-alt lg"></i>
                                            <p class="small m-0 text-nowrap">{{ $data['shop_name'] }}</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <p>Số tiền thanh toán: <strong>{{ number_format($data['ammount']) }} VNĐ</strong></p>
                        <p>Mã đơn hàng: <strong>{{ $data['order_id'] }}</strong></p>
                        <p>Mô tả: <strong>{{ $data['shop_desciprtion'] }}</strong></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <p class="text-center mt-3">Thông tin tài khoản thanh toán</p>
            <div class="card-body">
                <i class="bx bx-wallet-alt"></i> <p> Mã Ví: <strong> {{ $walletaccount->wallet_account_id }} </strong> </p>
                <p> Số dư <strong>{{number_format( $walletaccount->wallet_balance_available )}} VNĐ</strong></p>
                @if($walletaccount->wallet_balance_available >= $data['ammount'])

                @else
                    <p class="text-danger"> <strong>Số dư không đủ để thanh toán !</strong></p>
                @endif
            </div>
        </div>

        <div class="d-flex justify-content-between mt-3">
            <a href="{{ back() }}" class="btn btn-primary">Quay lại</a>
            <form action="{{ route('wallet.pay.otp') }}" method="POST">
                @csrf
                <input type="hidden" name="token" value="{{ $id }}">
                @if($walletaccount->wallet_balance_available >= $data['ammount'])
                    <button type="submit" class="btn btn-success">Xác nhận thanh toán</button>
                @else
                    <a href="{{ route('wallet.topup') }}" class="btn btn-danger">Nạp thêm</a>
                @endif
            </form>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        (function () {
            "use strict";
            window.addEventListener("load", function () {
                var forms = document.getElementsByClassName("needs-validation");
                Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener("submit", function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add("was-validated");
                    }, false);
                });
            }, false);
        })();
    </script>
    <script src="{{ Module::asset('wallet:libs/dropzone/dropzone-min.js') }}"></script>
@endsection

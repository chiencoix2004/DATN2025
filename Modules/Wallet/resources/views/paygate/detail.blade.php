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
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-primary">Thanh toán dịch vụ</h5>
                                <p class="text-muted">
                                    Bạn đang thanh toán đơn mua hàng
                                </p>
                                <div class="status-bar d-flex justify-content-center mb-4">
                                    <ul class="wizard-nav list-unstyled d-flex">
                                        <!-- Wallet Icon -->
                                        <li class="wizard-list-item me-3">
                                            <div class="list-item text-center">
                                                <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Seller Details">
                                                    <i class="bx bx-wallet-alt"></i>
                                                    <p style="font-size: 0.85rem; margin: 0;">{{ $walletaccount->wallet_account_id }}</p>
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
                                                    <!-- Add nowrap to prevent line breaks -->
                                                    <p style="font-size: 0.85rem; margin: 0; white-space: nowrap;">PCV Fashion</p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>


                                <p> Số tiền thanh toán: <strong>{{ number_format($data['ammount']) }} VNĐ</strong></p>
                                <p> Mã đơn hàng: <strong>{{ $data['orderid'] }}</strong></p>
                                <p> Mô tả: <strong>{{ $data['ordertype'] }}</strong></p>
                            </div>
                        </div>
                      <div class="d-flex justify-between justify-content-between">
                        <a type="button" href="{{ back() }}" class="btn btn-primary mt-3">Quay lại</a>
                        <form action="{{ route('wallet.pay.otp') }}" method="POST">
                            @csrf
                            <input type="hidden" name="token" value="{{ $id }}">
                            <button type="submit" class="btn btn-success mt-3">Xác nhận thanh toán</button>
                        </form>
                      </div>

                    </div>
                </div>
            </div>
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

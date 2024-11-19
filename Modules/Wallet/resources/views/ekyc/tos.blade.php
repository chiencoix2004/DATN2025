@extends('wallet::layouts.css')

@section('content')
    <div class="container">
        <!-- Header -->
        <div class="text-center mb-4">
            <!-- Logo -->
            <img src="/path/to/logo.png" alt="Logo" class="logo mb-3">
            <!-- Heading -->
            <h3 class="text-primary">Kích hoạt ví</h3>
        </div>

        <!-- Status Bar -->
        <div class="status-bar d-flex justify-content-center mb-4">
            <ul class="wizard-nav">
                <li class="wizard-list-item">
                    <div class="list-item">
                        <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Seller Details">
                            <i class="bx bx-user-circle"></i>
                        </div>
                        <span>Thông tin cơ bản</span>
                    </div>
                </li>
                <li class="wizard-list-item ms-3">
                    <div class="list-item ">
                        <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top"
                             aria-label="Company Document">
                            <i class="bx bx-file"></i>
                        </div>
                        <span>Thông tin cá nhân</span>
                    </div>
                </li>
                <li class="wizard-list-item ms-3">
                    <div class="list-item active ">
                        <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Bank Details">
                            <i class="bx bx-edit"></i>
                        </div>
                        <span>Điều khoản sử dụng</span>
                    </div>
                </li>
            </ul>
        </div>

        <!-- Card -->
        <div class="card">
            <a href="{{ route('ekyc.verifyadress') }}"> <i class="bx bx-arrow-back"></i> Quay lại từ đầu</a>
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
                        {{session('success')}}
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{session('error')}}
                    </div>
                @endif
                <form class="needs-validation" method="POST" action="{{ route('ekyc.registerwallet') }}" novalidate>
                    @csrf
                    <div class="mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-primary">Điều khoản sử dụng dịch vụ ví tiền</h5>
                                <p class="text-muted">
                                    Vui lòng đọc kỹ và đồng ý với điều khoản sử dụng dịch vụ ví tiền của chúng tôi
                                </p>
                                <p>
                                    I don't gyatt a lot for Chrizzmas
                                    There is just one skibidi
                                    Someone fanum tax the toilet
                                    Cause Kai Cenat has to pee
                                    I'm more a sigma than you know
                                    I only edge in Ohio
                                    I saw Speed there too
                                    All I gyatt for Chrizzmas
                                    Is you
                                    I don't gyatt a lot for Chrizzmas
                                    There is just one skibidi
                                    Someone fanum tax the toilet
                                    Cause Kai Cenat has to pee
                                    I don't need to mew and lock in
                                    Just for chat to see I'm based
                                    Mr Beast won't give me Lunchly
                                    With the prime on Chrizzmas Day
                                    I'm more sigma than you know
                                    I only edge in Ohio
                                    I saw Speed there too
                                    All I gyatt for Chrizzmas
                                    Is you... you chat
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-check mb-3">
                                <input type="checkbox" class="form-check-input" name="TOS" id="invalidCheck" required>
                                <label class="form-check-label" for="invalidCheck">Đồng ý sử dụng điều khoản dịch vụ ví tiền</label>
                                <div class="invalid-feedback">Bạn cần đồng ý với điều khoản sử dụng dịch vụ</div>
                            </div>
                        </div>
                    </div>
                  <div class="row">
                    <button class="btn btn-primary w-100" type="submit">Kích hoạt ví ngay</button>
                    </div>
                  </div>
                </form>
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

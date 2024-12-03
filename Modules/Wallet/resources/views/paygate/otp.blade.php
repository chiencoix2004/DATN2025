@extends('wallet::layouts.css')

@section('content')
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
@if(isset( $error))
<div class="alert alert-danger">
    {{ $error}}
</div>
@endif
<div class="container mt-5">
    <div class="card">
        <div class="card-body p-4">
            <div class="p-2 my-2">
                <div class="avatar-lg mx-auto">
                    <div class="avatar-title rounded-circle bg-light">
                        <i class="bx bxs-envelope h2 mb-0 text-primary"></i>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <h4>Xác thực giao dịch</h4>
                    <p class="mb-5">Vui lòng nhập mã được gửi tới <span class="fw-bold">{{ Auth::user()->email }}</span></p>
                </div>

                <form action="{{ route('wallet.pay.charge') }}" method="POST">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-md-8 col-lg-6">
                            <div class="row">
                                @for ($i = 1; $i <= 5; $i++)
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="digit{{ $i }}-input" class="visually-hidden">Digit {{ $i }}</label>
                                            <input type="text"
                                                class="form-control form-control-lg text-center otp-input"
                                                maxLength="1"
                                                id="digit{{ $i }}-input"
                                                name="digit{{ $i }}"
                                                autocomplete="off"
                                                style="width: 100%; min-width: 50px;">
                                        </div>
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="token" value="{{ $id }}">
                    <div class="mt-3">
                        <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Xác nhận và thanh toán</button>
                    </div>
                </form>

                <div class="mt-4 text-center">
                    <p class="text-muted mb-0">Bạn chưa nhận được mã? <a href="{{ route('wallet.pay.resendtotp', ['id' => $id]) }}"
                        class="text-primary fw-semibold"> Gửi lại mã </a> </p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.otp-input {
    width: 100% !important;
    height: 60px;
    border-radius: 8px;
    font-size: 24px;
    font-weight: 500;
    text-align: center;
}

.otp-input:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
}

@media (max-width: 576px) {
    .otp-input {
        height: 50px;
        font-size: 20px;
    }
}
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const inputs = document.querySelectorAll('.otp-input');
        inputs.forEach((input, index) => {
            input.addEventListener('input', () => {
                if (input.value.length === 1 && index < inputs.length - 1) {
                    inputs[index + 1].focus();
                }
            });

            input.addEventListener('keydown', (event) => {
                if (event.key === 'Backspace' && input.value.length === 0 && index > 0) {
                    inputs[index - 1].focus();
                }
            });
        });
    });
</script>
@endsection
@extends('wallet::layouts.master')

@section('content')
<div>
    <h3 class="text-center"> Chi tiết giao dịch </h3>
</div>
<div class="d-flex justify-content-center mt-2">
   <div class="row">
    <div class="card col-lg-6">
        <div class="card-body">
            <h3 class="card-title text-center">Thông tin giao dịch</h3>
            <p class="card-text ">Mã giao dịch: <strong>{{ $data->first()->trx_id }}</strong></p>
            <p class="card-text">Mã tham chiếu: <strong>{{ $data->first()->vnp_BankTranNo }}</strong></p>
            <p class="card-text">Số tiền: <strong>{{ number_format($data->first()->trx_amount) }} VND</strong></p>
            <p class="card-text">Phương thức thanh toán: <strong>{{ $data->first()->trx_type }}</strong></p>
            <p class="card-text">Trạng thái: <strong>@if($data->first()->trx_status == 0) Chờ duyệt @elseif ($data->first()->trx_status == 1) Hoàn thành @elseif ($data->first()->trx_status == 2) Thất Bại @endif</strong></p>
            <p class="card-text">Nội dung giao dịch: <strong>{{ $data->first()->trx_detail_desc }}</strong></p>
            <p class="card-text">Ngày khởi tạo: <strong>{{ $data->first()->created_at }}</strong></p>
            <p class="card-text text-muted">Request ID: <strong>{{ $data->first()->trx_hash_request }}</strong></p>
        </div>
    </div>

    @if (isset($data->first()->withdraw_request_id))
    <div class="card col-lg-6">
        <div class="card-body">
            <h3 class="card-title text-center">Thông tin trạng thái rút tiền</h3>
            <p class="card-text">Số tiền rút: <strong>{{ number_format($data->first()->amount) }} VND</strong></p>
            <p class="card-text">Người thụ hưởng: <strong>*****{{ substr($data->first()->bank_account_number, -4) }}</strong></p>
            <p class="card-text">Người nhận: <strong>{{ $data->first()->bank_account_name }}</strong></p>
            <p class="card-text">Ngân hàng: <strong>{{ $data->first()->bank_name }}</strong></p>
            <p class="card-text">Trạng thái: <strong>@if($data->first()->status == 1) Chờ duyệt @elseif ($data->first()->trx_status == 2) Hoàn thành @elseif ($data->first()->trx_status == 3) Thất Bại @endif</strong></p>
            <p class="card-text">Phản hồi hệ thống: <strong>{{ $data->first()->admin_note }}</strong></p>
            <p class="card-text">Ngày khởi tạo: <strong>{{ $data->first()->request_date }}</strong></p>
            <p class="card-text">Ngày duyệt yêu cầu: <strong>{{ $data->first()->admin_response_date }}</strong></p>
        </div>
    </div>
    @endif
    <button class="btn btn-primary" onclick="window.location.href='{{ route('wallet.index') }}'">Quay lại trang chủ</button>

   </div>
</div>
@endsection
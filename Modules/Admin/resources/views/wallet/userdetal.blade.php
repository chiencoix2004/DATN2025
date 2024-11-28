@extends('admin::layout.master')
@section('title', 'Chi tiết yêu cầu rút tiền')
@section('contents')
<?php
use Carbon\Carbon;

?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-primary mb-3">
                    <div class="card-header bg-primary text-white">
                        <h3 class="card-title">Thông tin chi tiết ví tiền</h3>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title text-center">Thông tin ví tiền</h3>
                        <p class="card-text">Mã Ví: <strong>{{$data->wallet_account_id}}</strong></p>
                        <p class="card-text">Số dư tài khoản: <strong>{{ number_format($data->wallet_balance_available) }} VND</strong></p>
                        <p class="card-text">Độ xác thực ví tiền: @if ($data->wallet_user_level == 1)
                                <span class="badge rounded-pill badge-subtle-danger">Xác thực cơ bản</span>
                            @elseif ($data->wallet_user_level == 2)
                                <span class="badge rounded-pill badge-subtle-success">Xác thực đầy đủ</span>
                            @endif
                        </p>
                        <p class="card-text">Trạng thái ví: @if ($data->wallet_status == 1)
                            <span class="badge rounded-pill badge-subtle-warning">Đang hoạt động</span>
                        @elseif ($data->wallet_status == 2)
                            <span class="badge rounded-pill badge-subtle-success">Dừng hoạt động</span>
                        @elseif ($data->wallet_status == 3)
                            <span class="badge rounded-pill badge-subtle-danger">Khóa ví</span>
                        @endif
                    </p>
                    <p class="card-text">Trạng thái thông tin  <strong>@if ($data->status == "COMPLETED_BASIC") Cần hoàn thiện thêm thông tin @elseif($data->status == "COMPLETED")Đã hoàn thiện thông tin @else Cần hoàn thiện thêm thông tin @endif</strong></p>
                        <p class="card-text">Ngày mở ví: <strong>{{$data->created_at }} ( mở được {{ Carbon::parse($data->created_at)->diffInDays() }} ngày)</strong></p>
                        <p class="card-text">Chủ sở hữu: <strong>{{ $data->frist_name }}{{ $data->last_name }}</strong></p>
                        <p class="card-text">Nhân viên ghi chú: <strong>{{ $data->admin_note }}</strong></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-primary mb-3">
                    <div class="card-header bg-primary text-white">
                        <h3 class="card-title">Thông tin cá nhân</h3>
                    </div>
                    <div class="card-body">
                        <p>Họ Và Tên:<strong>{{ $data->frist_name }}{{ $data->last_name }}</strong></p>
                        <p>Ngày sinh:<strong> {{ date('d/m/Y', strtotime($data->date_of_birth)) }}</strong></p>
                        <p>Giới tính:<strong> @if($data->gender == "MALE") Nam @else Nữ @endif</strong></p>
                        <p>Quốc tịch:<strong> {{ $data->nationality }}</strong></p>
                        <p>Số căn cước:<strong> {{ $data->id_number }}</strong></p>
                        <p>Nơi sinh:<strong> {{ $data->place_of_birth }}</strong></p>
                        <p>Nơi Ở hiện tại:<strong> {{ $data->place_of_residence }}</strong></p>
                        <p>Số điện thoại:<strong> {{ $data->phone_number }}</strong></p>
                        <p>Ngày cấp:<strong> {{ date('d/m/Y', strtotime($data->date_of_issue)) }}</strong></p>
                        <p>Ngày hết hạn:<strong> {{ date('d/m/Y', strtotime($data->date_of_expiry)) }}</strong></p>
                        <p>Nơi cấp:<strong> {{ $data->place_of_issue }}</strong></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-primary mb-3">
                    <div class="card-header bg-primary text-white">
                        <h3 class="card-title">Hành động tài khoản ví tiền</h3>
                    </div>
                        <div class="card-body">
                                <div class="card-body">
                                    <button class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalLockWallet">Khóa ví người dùng</button>
                                    <button class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#modalHoldFunds"> Chỉnh trạng thái ví về không hoạt động</button>
                                        <button class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#modalUserLevel"> Chỉnh độ xác thực thông tin của người dùng </button>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Khóa ví người dùng -->
                        <div class="modal fade" id="modalLockWallet" tabindex="-1" aria-labelledby="lockWalletLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="lockWalletLabel">Khóa ví người dùng</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('admin.wallet.lockwallet') }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <input type="hidden" name="user_id" value="{{ $data->user_id }}">
                                            <input type="hidden" name="wallet_id" value="{{ $data->wallet_account_id }}">
                                            <div class="mb-3">
                                                <label for="lockReason" class="form-label">Lý do khóa ví</label>
                                                <textarea class="form-control" id="lockReason" name="admin_note" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Hủy</button>
                                            <button type="submit" class="btn btn-danger">Khóa ví</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Giữ khoản tiền điều tra -->
                        <div class="modal fade" id="modalHoldFunds" tabindex="-1" aria-labelledby="holdFundsLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="holdFundsLabel">Chỉnh về trạng thái không hoạt động</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('admin.wallet.holdback') }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <input type="hidden" name="user_id" value="{{ $data->user_id }}">
                                            <input type="hidden" name="wallet_id" value="{{ $data->wallet_account_id }}">

                                            <div class="mb-3">
                                                <label for="holdReason" class="form-label">Lý do</label>
                                                <textarea class="form-control" id="holdReason" name="admin_note" rows="3"></textarea>
                                            </div>
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Hủy</button>
                                            <button type="submit" class="btn btn-warning">Cập nhật trạng thái</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    <div class="col-md-12">
        <div class="card border-primary mb-3">
            <div class="card-header bg-primary text-white">
                <h3 class="card-title">Lịch sử giao dịch người dùng</h3>
                </p>
            </div>
            <div class="card-body">
                <div class="accordion" id="withdrawHistoryAccordion">
                    @foreach ($data_trx as $index => $history)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{ $index }}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{ $index }}" aria-expanded="false"
                                    aria-controls="collapse{{ $index }}">
                                    Giao dịch
                                </button>
                            </h2>
                            <div id="collapse{{ $index }}" class="accordion-collapse collapse"
                                aria-labelledby="heading{{ $index }}" data-bs-parent="#withdrawHistoryAccordion">
                                <div class="accordion-body">
                                    <ul>
                                        <li>Số tiền: {{ number_format($history->amount) }} VND</li>
                                        <li>Ngày yêu cầu: {{ $history->request_date }}</li>
                                        <li>Trạng thái: @if ($history->status == 1)
                                                Chờ duyệt
                                            @elseif ($history->status == 2)
                                                Hoàn thành
                                            @elseif ($history->status == 3)
                                                Thất Bại
                                            @endif
                                        </li>
                                        <li>Ghi chú của admin: {{ $history->admin_note }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

@endsection

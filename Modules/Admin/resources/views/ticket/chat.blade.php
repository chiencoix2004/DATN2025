@extends('admin::layout.master')
@section('title', 'Hỗ trợ khách hàng')
@section('contents')
<div class="row g-0">
    <!-- Chat Support Section -->
    <div class="col-lg-8 pe-lg-2">
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                Hỗ trợ khách hàng - {{ $detailticket->first()->ticket_title }} | Ticket #{{ $detailticket->first()->ticket_id }} - Khách hàng: {{ $detailticket->first()->full_name }}
            </div>
            <div class="card-body">
                <!-- Customer Support Chat Box -->
                <div class="mb-3">
                    <label for="chatHistory" class="form-label">Lịch sử chat:</label>
                    <!-- Chat history section -->
                    <div id="chatHistory" class="border p-3 mb-3" style="height: 500px; overflow-y: scroll; background-color: #f8f9fa;">
                        <!-- Example messages - Replace with dynamic content -->
                        <div class="d-flex justify-content-start mb-2">
                            <div class="bg-gray-100 p-2 rounded">{{ $detailticket->first()->ticket_content}}</div>
                        </div>
                        @if($detailticket->first()->ticket_attachment)
                        <div class="d-flex justify-content-start mb-2">
                            <div class="bg-gray-100 p-2 rounded">
                                <img src="{{ $detailticket->first()->ticket_attachment }}" alt="Attachment" class="img-fluid" height="10%">
                            </div>
                        </div>
                        @endif
                        @foreach ($detailticket as $chat )
                        @if($chat->ticket_reply_by == "customer")
                        <div class="d-flex justify-content-start mb-2">
                            <div class="bg-gray-100 p-2 rounded">{{ $chat->ticket_reply }}</div>
                        </div>
                        @elseif($chat->ticket_reply_by == "ai")
                        <div class="d-flex justify-content-end mb-2">
                            <div class="bg-primary text-white p-2 rounded">{{ $chat->ticket_reply }}

                                <p class="text-bg-light mt-3 text-lg">Tự động trả lời bằng AI</p>
                            </div>

                        </div>
                        @else
                        <div class="d-flex justify-content-end mb-2">
                            <div class="bg-primary text-white p-2 rounded">{{ $chat->ticket_reply }}</div>
                        </div>

                        @endif
                        @endforeach
                        <!-- Repeat similar blocks for chat history -->
                    </div>

                    <!-- Text area for new customer response -->
                    <form action="{{ route('admin.ticket.updatemessage') }}" method="post">
                        @method('POST')
                        @csrf
                        <div class="mb-3">
                            <label for="customerResponse" class="form-label">Phản hồi:</label>
                            <textarea id="customerResponse" name="response" class="form-control" rows="4" placeholder="Nhập phản hồi..."></textarea>
                            <input type="text" name="ticket_id" value="{{ $detailticket->first()->ticket_id }}" hidden>
                            <input type="reply_by" name="reply_by" value="admin" hidden>

                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Gửi</button>
                    </form>
                </div>

                <!-- Ticket Status Options -->
                <div class="d-flex justify-content-between">
                    <div class="form-check">
                        <a href="#" class="btn btn-primary">Sửa thành hoàn thành</a>
                    </div>
                    <div class="form-check">
                        <a href="#" class="btn btn-danger">Sửa thành spam</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Customer Information & Order Details -->
    <div class="col-lg-4">
        <!-- Customer Info Card -->
        <div class="card">
            <div class="card-header bg-warning text-white">
                Tóm tắt AI (Trích dẫn)


            </div>
            <div class="card-body">
                <textarea id="aiSummary" class="form-control" rows="10" placeholder="Tóm tắt từ AI..." readonly>{{ $detailticket->first()->ticket_ai_analyze }}</textarea>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header bg-info text-white">
                Thông tin khách hàng
            </div>
            <div class="card-body">

                <ul class="list-group">

                    <li class="list-group-item"><strong>Họ và tên:</strong> {{ $account->first()->full_name }}</li>
                    <li class="list-group-item"><strong>Email:</strong> {{ $account->first()->email}}</li>
                    <li class="list-group-item"><strong>Số điện thoại:</strong> {{ $account->first()->phone}}</li>
                    <li class="list-group-item"><strong>Địa chỉ:</strong> {{ $account->first()->address}}</li>
                </ul>
            </div>
        </div>

        <!-- Order Details Card -->
        <div class="card mb-4">
            <div class="card-header bg-success text-white">
                Danh sách đơn hàng mới nhất
            </div>
            <div class="card-body">
                <ul class="list-group">
                    @foreach ($order as $item)
                    <li class="list-group-item"><a href="{{ route('admin.orders.detail', $item->id) }}"><strong>Mã đơn hàng #{{ $item->id }}</strong> - {{ $item->status_order }} - {{ $item->status_payment }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- AI Summary Box -->

    </div>
</div>
@endsection

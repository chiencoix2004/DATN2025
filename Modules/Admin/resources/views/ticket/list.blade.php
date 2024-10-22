@extends('admin::layout.master')
@section('title')
    Hỗ trợ khách hàng
@endsection
@section('contents')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <div class="container mt-4">
        <div class="card mb-3 p-5">
            <div class="mb-3 row">
                <div class="col-md-6">
                    <h3>Danh sách hỗ trợ</h3>
                </div>
                <div class="col-md-6">
                    <a href="#" class="btn btn-primary float-end ms-2">Spam <span
                        class="badge bg-danger">{{ $countSpam }}</span>
                    </a>
                    <a href="#" class="btn btn-primary float-end ms-2 ">Hoàn thành <span
                        class="badge bg-success">{{ $countClose }}</span>
                    </a>
                    <a href="#" class="btn btn-primary float-end ms-2">Mở <span
                            class="badge bg-warning">{{ $countOpen }}</span>
                    </a>

                </div>
                <div class="col-md-7">
                    <form action="" method="get">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Tìm kiếm" name="search">
                            <button class="btn btn-primary" type="submit">Tìm kiếm</button>
                        </div>
                    </form>
                    <a href="{{ route('admin.ticket.create') }}" class="btn btn-primary">Thêm mới</a>
                </div>
            </div>
        </div>
        <div class="row g-0">
            <div class="col-lg-8 pe-lg-2">
                <table class="table table-bordered" id="example">
                    <thead>
                        <tr>
                            <th>Mã vé</th>
                            <th>Tên khách hàng</th>
                            <th>Tiêu đề</th>
                            <th>Ngày Tạo</th>
                            <th>tình trạng</th>
                            <th>Thể loại</th>
                            <th>Hành động</th>

                        </tr>
                    </thead>
                    @foreach ($listTicket as $item)
                        <tr>
                            <td>{{ $item->ticket_id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->ticket_title}}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>@if($item->ticket_status = 1 )
                                <span class="badge bg-warning">mở</span>
                                @elseif($item->ticket_status = 2 )
                                <span class="badge bg-success">hoàn thành</span>
                                @else
                                <span class="badge bg-danger">spam</span>
                                @endif
                            </td>
                            <td>{{ $item->ticket_category }}</td>
                            <td>
                                <a href="{{ route('admin.ticket.show', ['id' => $item->ticket_id, 'user_id' => $item->user_id]) }}" class="btn btn-primary">Xem</a>
                                <a href="{{ route('admin.ticket.spamticket', ['id' => $item->ticket_id]) }}"
                                    class="btn btn-danger">Spam</a>
                                <a href="{{ route('admin.ticket.closeticket', ['id' => $item->ticket_id]) }}"
                                    class="btn btn-success">Hoàn thành</a>
                            </td>
                        </tr>
                    @endforeach

                </table>
            </div>
        </div>
    </div>
@endsection

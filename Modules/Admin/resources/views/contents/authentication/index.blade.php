@extends('admin::layout.master')

@section('title')
    Danh sách tài khoản
@endsection

@section('css-libs')
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.3/css/bootstrap.min.css') }}">
    <script src="{{ asset('bootstrap-5.3.3/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('jquery/jquery-3.7.1.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('dataTables/datatables.css') }}">
    <script src="{{ asset('dataTables/datatables.js') }}"></script>
    <script src="{{ asset('sweetalert2/sweetalert2.all.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('sweetalert2/sweetalert2.min.css') }}">
@endsection

@section('contents')
    <div class="container mt-4">
        <div class="card mb-3 p-5">
            <div class="mb-3">
                <h3 class="fs-7">Danh sách tài khoản</h3>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <a href="{{ route('admin.accounts.create') }}" class="btn btn-primary" role="button">
                        Thêm mới
                    </a>
                </div>
                <div class="d-flex align-items-center">
                    <select id="role" name="role" class="form-select me-2" aria-label="Lựa chọn bộ lọc">
                        <option value="">Tất cả chức vụ</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">
                                @switch($role->role_type)
                                    @case('employee')
                                        Nhân viên
                                        @break
                                    @case('affiliate')
                                        Cộng tác viên
                                        @break
                                    @case('employee_support')
                                        Nhân viên hỗ trợ
                                        @break
                                    @case('employee_stock_controller')
                                        Nhân viên quản lý kho
                                        @break
                                    @default
                                        {{ $role->role_type }}
                                @endswitch
                            </option>
                        @endforeach
                    </select>
                    <button type="button" id="filter" class="btn btn-secondary">Lọc</button>
                </div>
            </div>

            <table class="table table-bordered" id="example">
                <thead>
                    <tr>
                        <th>Mã</th>
                        <th>Ảnh</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>chức vụ</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    
    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#example').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('api.accounts.index') }}',
                    data: function(d) {
                        d.role = $('#role').val();
                        d.search = $('#dt-search-0').val();
                    }
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {
                        data: 'user_image',
                        render: function(data, type, row) {
                            return `<img src="{{ Storage::url('${data}') }}" alt="ảnh" class="img-thumbnail" width="50" height="50">`;
                        },
                        orderable: false,
                        searchable: false
                    },
                    {data: 'full_name', name: 'full_name'},
                    {
                        data: 'email',
                        render: function(data, type, row) {
                            return `<a href="mailto:${data}">${data}</a>`;
                        }
                    },
                    {
                        data: 'phone',
                        render: function(data, type, row) {
                            return `<a href="tel:${data}">${data}</a>`;
                        }
                    },
                    {
                        data: 'roles_id',
                        render: function(data, type, row) {
                            switch(data) {
                                case 3:
                                    return 'Nhân viên';
                                case 4:
                                    return 'Cộng tác viên';
                                case 5:
                                    return 'Nhân viên hỗ trợ';
                                case 6:
                                    return 'Nhân viên quản lý kho';
                                default:
                                    return data;
                            }
                        },
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            return `
                                <a href="/admin/accounts/${data.id}/show" class="btn btn-sm btn-info">Xem</a>
                                <a href="/admin/accounts/${data.id}/edit" class="btn btn-sm btn-primary">Sửa</a>
                            `;
                        },
                        orderable: false,
                        searchable: false
                    },
                ]
            });

            $('#filter').on('click', function() {
                table.draw();
            });
        });

        function deleteRow(id) {
            Swal.fire({
                title: 'Bạn có chắc chắn muốn xóa tài khoản này?',
                text: "Hành động này không thể hoàn tác!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Có, xóa nó!',
                cancelButtonText: 'Không, hủy bỏ',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/api/accounts/${id}`,
                        type: 'DELETE',
                        success: function(response) {
                            Swal.fire(
                                'Đã xóa!',
                                'Tài khoản đã được xóa thành công.',
                                'success'
                            );
                            $('#example').DataTable().ajax.reload();
                        },
                        error: function(xhr, status, error) {
                            Swal.fire(
                                'Lỗi!',
                                'Đã có lỗi xảy ra khi xóa.',
                                'error'
                            );
                        }
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire(
                        'Đã hủy',
                        'Tài khoản không bị xóa.',
                        'info'
                    );
                }
            });
        }
    </script>

    @if (session('success'))
        <script>
            Swal.fire({
                title: "Thành Công",
                text: "{{ session('success') }}",
                icon: "success"
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                title: "Thất bại",
                text: "{{ session('error') }}",
                icon: "error"
            });
        </script>
    @endif

    @if (session('info'))
        <script>
            Swal.fire({
                title: "Thông tin",
                text: "{{ session('info') }}",
                icon: "info"
            });
        </script>
    @endif
@endsection
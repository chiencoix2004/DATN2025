@extends('admin::layout.master')
@section('title')
    Chi tiết tài khoản {{ $user->user_name }}
@endsection

@section('css-libs')
    <link href="{{ asset('theme/admin/vendors/choices/choices.min.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/admin/vendors/dropzone/dropzone.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.3/css/bootstrap.min.css') }}">
    <script src="{{ asset('bootstrap-5.3.3/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('jquery/jquery-3.7.1.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('dataTables/datatables.css') }}">
    <script src="{{ asset('dataTables/datatables.js') }}"></script>
    <script src="{{ asset('sweetalert2/sweetalert2.all.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('sweetalert2/sweetalert2.min.css') }}">
@endsection
@section('css-setting')
@endsection
@section('contents')
    <div class="card mb-3">
        <div class="card-body">
            <div class="row flex-between-center">
                <div class="col-md">
                    <h5 class="mb-2 mb-md-0"> Chi tiết tài khoản {{ $user->user_name }}</h5>
                </div>
                <div class="col-auto">
                    <a href="{{ route('admin.accounts.index') }}" class="btn btn-secondary">Danh sách</a>
                    {{-- <button type="submit" class="btn btn-primary" id='submit-button'>Áp dụng
                        </button> --}}
                    <a href="{{ route('admin.accounts.edit', ['id' => $user->id]) }}" class="btn btn-primary">Sửa</a>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col">
                    <h5 class="mb-0">Chi tiết </h5>
                </div>
                <div class="col-auto"><a class="btn btn-falcon-default btn-sm" href="#!"><span
                            class="fas fa-pencil-alt fs-11 me-1"></span>Update details</a></div>
            </div>
        </div>
        <div class="card-body bg-body-tertiary border-top">
            <div class="row">
                <div class="col-lg col-xxl-5">
                    <h6 class="fw-semi-bold ls mb-3 text-uppercase">THÔNG TIN TÀI KHOẢN</h6>
                    <div class="row">
                        <div class="col-5 col-sm-4">
                            <p class="fw-semi-bold mb-1">ID</p>
                        </div>
                        <div class="col">{{ $user->id }}</div>
                    </div>
                    <div class="row">
                        <div class="col-5 col-sm-4">
                            <p class="fw-semi-bold mb-1">Ngày tạo</p>
                        </div>
                        <div class="col">{{ $user->created_at }}</div>
                    </div>
                    <div class="row">
                        <div class="col-5 col-sm-4">
                            <p class="fw-semi-bold mb-1">Email</p>
                        </div>
                        <div class="col-6 mb-3">
                            <label class="form-label" for="email">Email</label>
                            <input class="form-control" name="email" id="email" type="text"
                                value="{{ $user->email }}" disabled />
                            @error('email')
                                <label class="form-label text-danger">{{ $message }} </label>
                            @enderror
                        </div>
                        {{-- <div class="col-6 mb-3">
                                <label class="form-label" for="password">Mật khẩu</label>
                                <input class="form-control" name="password" id="password" type="password" />
                                @error('password')<label class="form-label text-danger">{{ $message }} </label>@enderror
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label" for="re_enter_password">Nhập lại mật khẩu</label>
                                <input class="form-control" name="re_enter_password" id="re_enter_password"
                                    type="password" />
                                    @error('re_enter_password')<label class="form-label text-danger">{{ $message }} </label>@enderror
                            </div> --}}
                        <div class="col-12 mb-3">
                            <label class="form-label" for="address">Địa chỉ:</label>
                            <input class="form-control" name="address" id="address" type="text"
                                value="{{ $user->address }}" disabled />
                            @error('address')
                                <label class="form-label text-danger">{{ $message }} </label>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5 col-sm-4">
                            <p class="fw-semi-bold mb-0">VAT number</p>
                        </div>
                        <div class="col">
                            <p class="fst-italic text-400 mb-0">No VAT number</p>
                        </div>
                    </div> --}}
                </div>
                <div class="col-lg col-xxl-5 mt-4 mt-lg-0 offset-xxl-1">
                    <h6 class="fw-semi-bold ls mb-3 text-uppercase">Billing Information</h6>
                    <div class="row">
                        <div class="col-5 col-sm-4">
                            <p class="fw-semi-bold mb-1">Send email to</p>
                        </div>
                        <div class="col"><a href="mailto:tony@gmail.com">tony@gmail.com</a></div>
                    </div>
                    <div class="row">
                        <div class="col-5 col-sm-4">
                            <p class="fw-semi-bold mb-1">Address</p>
                        </div>
                        <div class="col">
                            <p class="mb-1">8962 Lafayette St. <br />Oswego, NY 13126</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5 col-sm-4">
                            <p class="fw-semi-bold mb-1">Phone number</p>
                        </div>
                        <div class="col"><a href="tel:+12025550110">+1-202-555-0110</a></div>
                    </div>
                    <div class="row">
                        <div class="col-5 col-sm-4">
                            <p class="fw-semi-bold mb-0">Invoice prefix</p>
                        </div>
                        <div class="col">
                            <p class="fw-semi-bold mb-0">7C23435</p>
                        </div>
                    </div>
                </div>
                {{-- <div class="card mb-3">
                        <div class="card-header bg-body-tertiary">
                            <h6 class="mb-0">Tags</h6>
                        </div>
                        <div class="card-body"><label class="form-label" for="product-tags">Add a keyword:</label><input
                                class="form-control js-choice" id="product-tags" type="text" name="tags"
                                required="required" size="1"
                                data-options='{"removeItemButton":true,"placeholder":false}' /></div>
                    </div>
                     --}}
            </div>
        </div>
        <div class="card-footer border-top text-end"><a class="btn btn-falcon-default btn-sm" href="#!"><span
                    class="fas fa-dollar-sign fs-11 me-1"></span>Refund</a><a class="btn btn-falcon-default btn-sm ms-2"
                href="#!"><span class="fas fa-check fs-11 me-1"></span>Save changes</a></div>
    </div>
    </div>
    {{-- <div class="card mt-3">
            <div class="card-body">
                <div class="row justify-content-between align-items-center">
                    <div class="col-md">
                        <h5 class="mb-2 mb-md-0"></h5>
                    </div>
                    <div class="col-auto"> <button class="btn btn-link text-secondary p-0 me-3 fw-medium" role="button">Hủy</button><button
                        type="submit" class="btn btn-primary" role="button">Thêm mã giảm giá
                    </button>
                    </div>
                </div>
            </div>
        </div> --}}
@endsection
@section('js-libs')
    <script src="{{ asset('theme/admin/vendors/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('theme/admin/vendors/choices/choices.min.js') }}"></script>
    <script src="{{ asset('theme/admin/vendors/dropzone/dropzone-min.js') }}"></script>
@endsection
@section('js-setting')
    <script>
        // xử lý upload file bằng thư biên dropzone
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone("#dropzoneMultipleFileUpload", {
            url: "#", // Không cần URL vì sẽ submit form thông thường
            autoProcessQueue: false, // Không tự động upload
            // paramName: "product_galleries", // Tên của input trong request
            uploadMultiple: false, // Cho phép chọn nhiều file
            parallelUploads: 10, // Giới hạn số file upload đồng thời
            maxFilesize: 5, // Kích thước file tối đa
            acceptedFiles: "image/*", // Chỉ nhận file ảnh
            previewsContainer: document.querySelector(".dz-preview"),
            previewTemplate: document.querySelector(".dz-preview").innerHTML,
            clickable: true, // Cho phép người dùng click vào vùng Dropzone để chọn file
            // dictDefaultMessage: 'Drag your image here or, Browse',
            init: function() {
                var myDropzone = this;
                document.querySelector(".dz-preview").innerHTML = "";
                // Khi nhấn nút submit
                document.getElementById("submit-button").addEventListener("click", function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    // Nếu có file trong Dropzone
                    if (myDropzone.getAcceptedFiles().length > 0) {
                        var hiddenFilesInput = document.getElementById('hidden-files');
                        var dataTransfer =
                            new DataTransfer(); // Sử dụng DataTransfer để chứa nhiều file
                        // Thêm từng file từ Dropzone vào DataTransfer
                        myDropzone.getAcceptedFiles().forEach(function(file) {
                            dataTransfer.items.add(file);
                        });
                        // Gán danh sách file vào input file ẩn
                        hiddenFilesInput.files = dataTransfer.files;
                        // Sau đó submit form bình thường
                        Swal.fire({
                            title: 'Bạn có chắc chắn sửa không?',
                            text: "Hành động này không thể hoàn tác!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Vâng, áp dụng!',
                            cancelButtonText: 'Hủy'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // If confirmed, submit the form
                                document.getElementById("create").submit();
                            }
                        });

                    } else {
                        // Nếu không có file trong Dropzone, submit form ngay lập tức
                        Swal.fire({
                            title: 'Bạn có chắc chắn sửa không?',
                            text: "Hành động này không thể hoàn tác!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Vâng, áp dụng!',
                            cancelButtonText: 'Hủy'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // If confirmed, submit the form
                                document.getElementById("create").submit();
                            }
                        });

                    }
                });
            }
        });
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
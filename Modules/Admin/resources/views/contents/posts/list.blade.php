@extends('admin::layout.master')
@section('title')
    Admin | DANH SÁCH BÀI VIẾT
@endsection
@section('contents')
<div class="card-body px-0">
    <div class="tab-content">
        <div class="card-header">
            <div class="row flex-between-end">
                <div class="col-auto align-self-center">
                    <h5 class="mb-0">Danh sách Bài viết</h5>
                </div>
            </div>
            <hr>
            <div class="row flex-between-end">
                <div class="col-auto align-self-center">
                    {{-- Form Add Cate --}}
                    <form class="row gy-2 gx-3 align-items-center" action="{{ route('admin.posts.store') }}"
                        method="POST" id="postForm" enctype="multipart/form-data">
                        @csrf
                        <div class="col-auto">
                            <label class="form-label" for="title">Tiêu đề</label>
                            <input class="form-control @error('title') is-invalid @enderror" id="title" type="text"
                                name="title" value="{{ old('title') }}" />
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-auto">
                            <label class="form-label" for="slug_post">Slug</label>
                            <input class="form-control @error('slug_post') is-invalid @enderror" id="slug_post" type="text"
                                name="slug_post" value="{{ old('slug_post') }}" />
                            @error('slug_post')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-auto">
                            <label class="form-label" for="autoSizingSelect">Trạng thái</label>
                            <select class="form-control" id="published_id" name="published_id">
                                <option value="1">Đã xuất bản</option>
                                <option value="0">Chưa xuất bản</option>
                            </select>
                        </div>
                        <div class="col-auto">
                            <label class="form-label" for="created_at">Ngày tạo</label>
                            <input class="form-control @error('created_at') is-invalid @enderror" id="created_at" type="date" value="{{ now()->format('Y-m-d') }}"
                                name="created_at" value="{{ old('created_at') }}" />
                            @error('created_at')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="card-body">
                            <div class="dropzone dropzone-multiple p-0" id="dropzoneMultipleFileUpload"
                                data-dropzone="data-dropzone">
                                <div class="dz-message @error('image_post') is-invalid @enderror"
                                    data-dz-message="data-dz-message">
                                    <img class="me-2" src="{{ asset('theme/admin/img/icons/cloud-upload.svg') }}"
                                        width="25" alt="" />
                                    <span class="d-none d-lg-inline">Drag your image here<br />or, </span>
                                    <span class="btn btn-link p-0 fs-10">Browse</span>
                                </div>
                                @error('image_post')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="dz-preview dz-preview-multiple m-0 d-flex flex-column">
                                    <div class="d-flex media align-items-center mb-3 pb-3 border-bottom btn-reveal-trigger">
                                        <img class="dz-image" src="{{ asset('theme/admin/img/icons/cloud-upload.svg') }}"
                                            alt="..." data-dz-thumbnail="data-dz-thumbnail" />
                                        <div class="flex-1 d-flex flex-between-center">
                                            <div>
                                                <h6 data-dz-name="data-dz-name"></h6>
                                                <div class="d-flex align-items-center">
                                                    <p class="mb-0 fs-10 text-400 lh-1" data-dz-size="data-dz-size"></p>
                                                    <div class="dz-progress">
                                                        <span class="dz-upload" data-dz-uploadprogress=""></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dropdown font-sans-serif">
                                                <button
                                                    class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal dropdown-caret-none"
                                                    type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <span class="fas fa-ellipsis-h"></span>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end border py-2">
                                                    <a class="dropdown-item" href="#!"
                                                        data-dz-remove="data-dz-remove">Remove
                                                        File</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="file" name="image_post" id="hidden-files" style="display: none;">
                        </div>
                        <p></p>
                </div>

                <div class="col-12 mb-3"><label class="form-label" for="content">Chi Tiết Bài Viết:</label>
                    <div class="create-content-textarea">
                        <textarea class="tinymce d-none" data-tinymce="data-tinymce" name="content" id="content"
                            required="required"></textarea>
                    </div>
                </div>
        
                <div class="col-auto">
                    <button class="btn btn-primary" id="submit-button" type="submit">Lưu Bài Viết</button>
                </div>
                </form>
            </div>
        </div>
        <hr>
        <div class="tab-pane preview-tab-pane active" role="tabpanel"
            aria-labelledby="tab-dom-023429b2-f0b9-4091-bf3c-0936e4daf000"
            id="dom-023429b2-f0b9-4091-bf3c-0936e4daf000">
            <table class="table mb-0 data-table fs-10" data-datatables="data-datatables">
                <thead class="bg-200">
                    <tr>
                        <th class="text-900 sort">Tiêu Đề</th>
                        <th class="text-900 sort">Bài Viết</th>
                        <th class="text-900 sort">Ảnh Bài Viết</th>
                        <th class="text-900 sort">Trạng Thái</th>
                        <th class="text-900 sort">Ngày đăng</th>
                        <th class="text-900 no-sort pe-1 align-middle data-table-row-action"></th>
                    </tr>
                </thead>
                <tbody class="list" id="table-simple-pagination-body">
                    @foreach ($posts as $item)
                        <tr class="btn-reveal-trigger">
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->content }}</td>
                            <td>
                                @if ($item->image_post)
                                    <img src="{{ Storage::url($item->image_post) }}" width="100" height="100"
                                        alt="">
                                @endif
                            </td>
                            <td>{{ $item->published_id ? 'Đã xuất bản' : 'Chưa xuất bản' }}</td>
                            <td>{{ $item->created_at }}</td>

                            <td class="align-middle white-space-nowrap text-end">
                                <div class="dropstart font-sans-serif position-static d-inline-block">
                                    <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal float-end"
                                        type="button" id="dropdown-simple-pagination-table-item-0"
                                        data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true"
                                        aria-expanded="false" data-bs-reference="parent">
                                        <span class="fas fa-ellipsis-h fs-10"></span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end border py-2"
                                        aria-labelledby="dropdown-simple-pagination-table-item-0">
                                        <a class="dropdown-item"
                                            href="{{ route('admin.posts.edit', ['id' => $item->id]) }}">Sửa</a>
                                        <div class="dropdown-divider"></div>

                                        <form action="{{ route('admin.posts.destroy', ['id' => $item->id]) }}"
                                            method="POST" onclick="return confirm('Có chắc chắn muốn xóa không!')">
                                            @method('DELETE')
                                            @csrf
                                            <button class="dropdown-item" type="submit" data-bs-placement="top"
                                                title="Delete">
                                                Xóa
                                            </button>
                                        </form>
                                        {{-- <a class="dropdown-item text-danger" href=""
                                            onclick="return confirm('Có chắc chắn muốn xóa không!')">Delete</a> --}}
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
<script>
    //Slug name
    function createSlug(value) {
        return value
            .toLowerCase()
            .replace(/đ/g, 'd')
            .normalize('NFD')
            .replace(/[\u0300-\u036f]/g, '')
            .replace(/[^a-z0-9\s-]/g, '')
            .trim()
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-');
    }
    document.getElementById('title').addEventListener('input', function() {
        const nameInput = this.value;
        const slug = createSlug(nameInput);
        document.getElementById('slug_post').value = slug;
    });

</script>
@endsection
@section('css-libs')
    <link rel="stylesheet" href="{{ asset('theme/admin/vendors/dropzone/dropzone.css') }}">
    <link href="{{ asset('theme/admin/vendors/choices/choices.min.css') }}" rel="stylesheet">
@endsection
@section('js-libs')
<script src="{{ asset('theme/admin/vendors/choices/choices.min.js') }}"></script>
<script src="{{ asset('theme/admin/vendors/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('theme/admin/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('theme/admin/vendors/datatables.net/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('theme/admin/vendors/datatables.net-bs5/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('theme/admin/vendors/datatables.net-fixedcolumns/dataTables.fixedColumns.min.js') }}"></script>
    <script src="{{ asset('theme/admin/vendors/datatables.net-bs5/dataTables.bootstrap5.min.css') }}"></script>
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
            uploadMultiple: true, // Cho phép chọn nhiều file
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
                        document.getElementById("postForm").submit();
                    } else {
                        // Nếu không có file trong Dropzone, submit form ngay lập tức
                        document.getElementById("postForm").submit();
                    }
                });
            }
        });
    </script>
@endsection

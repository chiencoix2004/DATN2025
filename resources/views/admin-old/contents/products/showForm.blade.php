@extends('layout.master')
@section('title')
    Admin | Add Product
@endsection
@section('contents')
    <div class="main-content-inner">
        <!-- main-content-wrap -->
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Add Product</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <div class="text-tiny">Dashboard</div>
                        </a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <a href="#">
                            <div class="text-tiny">Ecommerce</div>
                        </a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <div class="text-tiny">Add product</div>
                    </li>
                </ul>
            </div>
            <!-- form-add-product -->
            <form action="" class="tf-section-2 form-add-product" id="productForm" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="wg-box">
                    <fieldset class="name">
                        <div class="body-title mb-10">Product name <span class="tf-color-1">*</span></div>
                        <input class="mb-10" type="text" placeholder="Enter product name" name="text">
                        <div class="text-tiny">Do not exceed 20 characters when entering the product name.</div>
                    </fieldset>
                    <div class="gap22 cols">
                        <fieldset class="category">
                            <div class="body-title mb-10">Category <span class="tf-color-1">*</span></div>
                            <div class="select">
                                <select class="">
                                    <option>Choose category</option>
                                    <option>Shop</option>
                                    <option>Product</option>
                                </select>
                            </div>
                        </fieldset>
                        <fieldset class="male">
                            <div class="body-title mb-10">Gender <span class="tf-color-1">*</span></div>
                            <div class="select">
                                <select class="">
                                    <option>Male</option>
                                    <option>Female</option>
                                    <option>Other</option>
                                </select>
                            </div>
                        </fieldset>
                    </div>
                    <fieldset class="brand">
                        <div class="body-title mb-10">Brand <span class="tf-color-1">*</span></div>
                        <div class="select">
                            <select class="">
                                <option>Choose category</option>
                                <option>Shop</option>
                                <option>Product</option>
                            </select>
                        </div>
                    </fieldset>
                    <fieldset class="description">
                        <div class="body-title mb-10">Description <span class="tf-color-1">*</span></div>
                        <textarea class="mb-10" name="description" placeholder="Description" tabindex="0" aria-required="true"
                            required=""></textarea>
                        <div class="text-tiny">Do not exceed 100 characters when entering the product name.</div>
                    </fieldset>
                </div>
                <div class="wg-box">
                    <fieldset>
                        <div class="body-title mb-10">Upload images</div>
                        <div class="dropzone dropzone-multiple p-0" id="dropzoneMultipleFileUpload"
                            data-dropzone="data-dropzone">
                            <div class="dz-message" data-dz-message="data-dz-message">
                                <img class="me-2" src="{{ asset('theme/admin/icon/cloud-upload.svg') }}" width="30px"
                                    alt="....." />
                                <span class="d-none d-lg-inline">Drag your image here<br />or, </span>
                                <span class="btn btn-link p-0 fs-10">Browse</span>
                            </div>
                            <div class="dz-preview m-0 d-flex flex-column">
                                <div class="d-flex media align-items-center mb-3 pb-3 border-bottom btn-reveal-trigger">
                                    <img class="dz-image" src="{{ asset('theme/admin/icon/cloud-upload.svg') }}"
                                        alt="..." data-dz-thumbnail="data-dz-thumbnail" style="margin-right: 10px;"/>
                                    <div class="flex-1 d-flex flex-between-center">
                                        <div style="margin-right: 20px;">
                                            <h6 data-dz-name="data-dz-name"></h6>
                                            <div class="d-flex align-items-center">
                                                <p class="mb-0 fs-10 text-400 lh-1" data-dz-size="data-dz-size"></p>
                                                <div class="dz-progress">
                                                    <span class="dz-upload" data-dz-uploadprogress=""></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dropdown font-sans-serif d-flex">
                                            <button
                                                class="btn btn-light"
                                                type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false" style="width: 39px;">
                                                <span class="icon-more-horizontal"></span>
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
                        <input type="file" name="product_galleries[]" id="hidden-files" multiple style="display: none;">
                    </fieldset>
                    <div class="cols gap22">
                        <fieldset class="name">
                            <div class="body-title mb-10">Add size</div>
                            <div class="select mb-10">
                                <select class="">
                                    <option>EU - 44</option>
                                    <option>EU - 40</option>
                                    <option>EU - 50</option>
                                </select>
                            </div>
                            <div class="list-box-value mb-10">
                                <div class="box-value-item">
                                    <div class="body-text">EU - 38.5</div>
                                </div>
                                <div class="box-value-item">
                                    <div class="body-text">EU - 39</div>
                                </div>
                                <div class="box-value-item">
                                    <div class="body-text">EU - 40</div>
                                </div>
                            </div>
                            <div class="list-box-value">
                                <div class="box-value-item">
                                    <div class="body-text">EU - 41.5</div>
                                </div>
                                <div class="box-value-item">
                                    <div class="body-text">EU - 42</div>
                                </div>
                                <div class="box-value-item">
                                    <div class="body-text">EU - 43</div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="name">
                            <div class="body-title mb-10">Product date</div>
                            <div class="select">
                                <input type="date" name="date" value="2023-11-20">
                            </div>
                        </fieldset>
                    </div>
                    <div class="cols gap10">
                        <button class="tf-button w-full" type="submit" id="submit-button">Add product</button>
                    </div>
                </div>
            </form>
            <!-- /form-add-product -->
        </div>
        <!-- /main-content-wrap -->
    </div>
@endsection
@section('css-libs')
    <link rel="stylesheet" href="{{ asset('theme/admin/css/dropzone.css') }}">
@endsection
@section('js-libs')
    <script src="{{ asset('theme/admin/js/dropzone-min.js') }}"></script>
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
                        document.getElementById("productForm").submit();
                    } else {
                        // Nếu không có file trong Dropzone, submit form ngay lập tức
                        document.getElementById("productForm").submit();
                    }
                });
            }
        });
    </script>
@endsection

@extends('layout.master')
@section('title')
    Admin | Add Product
@endsection
@section('contents')
    <div class="card mb-3">
        <div class="card-body">
            <div class="row flex-between-center">
                <div class="col-md">
                    <h5 class="mb-2 mb-md-0">Add a product</h5>
                </div>
            </div>
        </div>
    </div>
    <form action="" method="POST" enctype="multipart/form-data" id="productForm">
        @csrf
        <div class="row g-0">
            <div class="col-lg-8 pe-lg-2">
                <div class="card mb-3">
                    <div class="card-header bg-body-tertiary">
                        <h6 class="mb-0">Basic information</h6>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row gx-2">
                                <div class="col-12 mb-3"><label class="form-label" for="product-name">Product
                                        name:</label><input class="form-control" id="product-name" type="text" /></div>
                                <div class="col-12 mb-3"><label class="form-label" for="manufacturar-name">Manufacturar
                                        Name:</label><input class="form-control" id="manufacturar-name" type="text" />
                                </div>
                                <div class="col-12 mb-3"><label class="form-label" for="identification-no">Product
                                        Identification
                                        No.:</label><input class="form-control" id="identification-no" type="text" />
                                </div>
                                <div class="col-12 mb-3"><label class="form-label" for="product-summary">Product Summary:
                                    </label><input class="form-control" id="product-summary" type="text" /></div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header bg-body-tertiary">
                        <h6 class="mb-0">Add images</h6>
                    </div>
                    <div class="card-body">
                        <div class="dropzone dropzone-multiple p-0" id="dropzoneMultipleFileUpload"
                            data-dropzone="data-dropzone">
                            <div class="dz-message" data-dz-message="data-dz-message">
                                <img class="me-2" src="{{ asset('theme/admin/img/icons/cloud-upload.svg') }}"
                                    width="25" alt="" />
                                <span class="d-none d-lg-inline">Drag your image here<br />or, </span>
                                <span class="btn btn-link p-0 fs-10">Browse</span>
                            </div>
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
                        <input type="file" name="product_galleries[]" id="hidden-files" multiple style="display: none;">
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header bg-body-tertiary">
                        <h6 class="mb-0">Details</h6>
                    </div>
                    <div class="card-body">
                        <div class="row gx-2">
                            <div class="col-12 mb-3"><label class="form-label" for="product-description">Product
                                    description:</label>
                                <div class="create-product-description-textarea">
                                    <textarea class="tinymce d-none" data-tinymce="data-tinymce" name="product-description" id="product-description"
                                        required="required"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3"><label class="form-label" for="import-status">Import Status:
                                </label><select class="form-select" id="import-status" name="import-status">
                                    <option value="imported">Imported</option>
                                    <option value="processing">Processing </option>
                                    <option value="validating">Validating </option>
                                    <option value="draft">Draft</option>
                                </select></div>
                            <div class="col-sm-6 mb-3"><label class="form-label" for="origin-country">Country of Origin:
                                </label><select class="form-select" id="origin-country" name="origin-country">
                                    <option value="">Select </option>
                                    <option value="China">China</option>
                                    <option value="India">India</option>
                                    <option value="United States">United States</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="Pakistan">Pakistan</option>
                                    <option value="Brazil">Brazil</option>
                                    <option value="Nigeria">Nigeria</option>
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="Russia">Russia</option>
                                    <option value="Japan">Japan</option>
                                    <option value="Mexico">Mexico</option>
                                    <option value="Philippines">Philippines</option>
                                    <option value="Egypt">Egypt</option>
                                    <option value="Vietnam">Vietnam</option>
                                    <option value="Ethiopia">Ethiopia</option>
                                    <option value="DR Congo">DR Congo</option>
                                    <option value="Iran">Iran</option>
                                    <option value="Turkey">Turkey</option>
                                    <option value="Germany">Germany</option>
                                    <option value="France">France</option>
                                </select></div>
                            <div class="col-12 mb-3"><label class="form-label" for="release-date">Release Date:
                                </label><input class="form-control datetimepicker" id="release-date" type="text"
                                    data-options='{"dateFormat":"d/m/y","disableMobile":true}' /></div>
                            <div class="col-12 mb-3"><label class="form-label" for="warranty-length">Warranty Lenght:
                                </label><input class="form-control" id="warranty-length" type="text" /></div>
                            <div class="col-12 mb-3"><label class="form-label" for="warranty-policy">Warranty Policy:
                                </label><input class="form-control" id="warranty-policy" type="text" /></div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3 mb-lg-0">
                    <div class="card-header bg-body-tertiary">
                        <h6 class="mb-0">Specifications</h6>
                    </div>
                    <div class="card-body">
                        <div class="row gx-2 flex-between-center mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0 text-600">Processor</h6>
                            </div>
                            <div class="col-sm-9">
                                <div class="d-flex flex-between-center">
                                    <h6 class="mb-0 text-700">2.3GHz quad-core Intel Core i5</h6><a
                                        class="btn btn-sm btn-link text-danger" href="#!" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Remove"><span
                                            class="fs-10 fas fa-trash-alt"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row gx-2 flex-between-center mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0 text-600">Memory</h6>
                            </div>
                            <div class="col-sm-9">
                                <div class="d-flex flex-between-center">
                                    <h6 class="mb-0 text-700">8GB of 2133MHz LPDDR3 onboard memory</h6><a
                                        class="btn btn-sm btn-link text-danger" href="#!" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Remove"><span
                                            class="fs-10 fas fa-trash-alt"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row gx-2 flex-between-center mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0 text-600">Brand name</h6>
                            </div>
                            <div class="col-sm-9">
                                <div class="d-flex flex-between-center">
                                    <h6 class="mb-0 text-700">Apple</h6><a class="btn btn-sm btn-link text-danger"
                                        href="#!" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Remove"><span class="fs-10 fas fa-trash-alt"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row gy-3 gx-2">
                            <div class="col-sm-3"><input class="form-control form-control-sm" id="specification-label"
                                    type="text" placeholder="Label" /></div>
                            <div class="col-sm-9">
                                <div class="d-flex gap-2 flex-between-center"><input class="form-control form-control-sm"
                                        id="specification-property" type="text" placeholder="Property" /><button
                                        class="btn btn-sm btn-falcon-default">Add</button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 ps-lg-2">
                <div class="sticky-sidebar">
                    <div class="card mb-3">
                        <div class="card-header bg-body-tertiary">
                            <h6 class="mb-0">Type</h6>
                        </div>
                        <div class="card-body">
                            <div class="row gx-2">
                                <div class="col-12 mb-3"><label class="form-label" for="product-category">Select
                                        category:</label><select class="form-select" id="product-category"
                                        name="product-category">
                                        <option value="computerAccessories">Computer & Accessories</option>
                                        <option>Class, Training, or Workshop</option>
                                        <option>Concert or Performance</option>
                                        <option>Conference</option>
                                        <option>Convention</option>
                                        <option>Dinner or Gala</option>
                                        <option>Festival or Fair</option>
                                    </select></div>
                                <div class="col-12"><label class="form-label" for="product-subcategory">Select
                                        sub-category:</label><select class="form-select" id="product-subcategory"
                                        name="product-subcategory">
                                        <option value="laptop">Laptop</option>
                                        <option>Class, Training, or Workshop</option>
                                        <option>Concert or Performance</option>
                                        <option>Conference</option>
                                        <option>Convention</option>
                                        <option>Dinner or Gala</option>
                                        <option>Festival or Fair</option>
                                    </select></div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header bg-body-tertiary">
                            <h6 class="mb-0">Tags</h6>
                        </div>
                        <div class="card-body"><label class="form-label" for="product-tags">Add a keyword:</label><input
                                class="form-control js-choice" id="product-tags" type="text" name="tags"
                                required="required" size="1"
                                data-options='{"removeItemButton":true,"placeholder":false}' /></div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header bg-body-tertiary">
                            <h6 class="mb-0">Pricing</h6>
                        </div>
                        <div class="card-body">
                            <div class="row gx-2">
                                <div class="col-8 mb-3"><label class="form-label" for="base-price">Base Price: <span
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Product regular price"><span
                                                class="fas fa-question-circle text-primary fs-10 ms-1"></span></span></label><input
                                        class="form-control" id="base-price" type="text" /></div>
                                <div class="col-4"> <label class="form-label"
                                        for="price-currency">Currency:</label><select class="form-select"
                                        id="price-currency" name="price-currency">
                                        <option value="usd">USD</option>
                                        <option value="eur">EUR</option>
                                        <option value="gbp">GBP</option>
                                        <option value="cad">CAD</option>
                                    </select></div>
                                <div class="col-12 mb-4"><label class="form-label" for="discount-percentage">Discount in
                                        percentage:</label><input class="form-control" id="discount-percentage"
                                        type="text" /></div>
                                <div class="col-12"><label class="form-label" for="final-price">Final price:<span
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Product final price"><span
                                                class="fas fa-question-circle text-primary fs-10 ms-1"></span></span></label><input
                                        class="form-control" id="final-price" disabled="disabled" type="text" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header bg-body-tertiary">
                            <h6 class="mb-0">Shipping</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-check"><input class="form-check-input p-2" id="vendor-delivery"
                                    type="radio" name="product-shipping" /><label
                                    class="form-check-label fs-9 fw-normal text-700" for="vendor-delivery">Delivered by
                                    vendor (you)</label></div>
                            <div class="form-check"><input class="form-check-input p-2" id="falcon-delivery"
                                    type="radio" name="product-shipping" /><label
                                    class="form-check-label fs-9 fw-normal text-700" for="falcon-delivery">Delivered by
                                    FALCON <span
                                        class="badge badge-subtle-warning rounded-pill ms-2">Recommended</span></label>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header bg-body-tertiary">
                            <h6 class="mb-0">Stock status</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-check"><input class="form-check-input p-2" id="in-stock" type="radio"
                                    name="stock-status" /><label class="form-check-label fs-9 fw-normal text-700"
                                    for="in-stock">In
                                    stock</label></div>
                            <div class="form-check"><input class="form-check-input p-2" id="unavailable" type="radio"
                                    name="stock-status" /><label class="form-check-label fs-9 fw-normal text-700"
                                    for="unavailable">Unavailable</label></div>
                            <div class="form-check"><input class="form-check-input p-2" id="to-be-announced"
                                    type="radio" name="stock-status" /><label
                                    class="form-check-label fs-9 fw-normal text-700" for="to-be-announced">To be
                                    announced</label></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-body">
                <div class="row justify-content-between align-items-center">
                    <div class="col-md">
                        <h5 class="mb-2 mb-md-0">You're almost done!</h5>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-primary" id="submit-button" type="submit">Add product
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('css-libs')
    <link href="{{ asset('theme/admin/vendors/choices/choices.min.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/admin/vendors/flatpickr/flatpickr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/admin/vendors/dropzone/dropzone.css') }}" rel="stylesheet">
@endsection
@section('js-libs')
    <script src="{{ asset('theme/admin/vendors/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('theme/admin/vendors/choices/choices.min.js') }}"></script>
    <script src="{{ asset('theme/admin/vendors/flatpickr/flatpickr.min.js') }}"></script>
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

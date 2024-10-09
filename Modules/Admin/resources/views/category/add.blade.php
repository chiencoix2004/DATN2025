@extends('admin::layouts.slidebar')
@section('content')
    <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card mb-3">
            <div class="card-body">
                <div class="row flex-between-center">
                    <div class="col-md">
                        <h5 class="mb-2 mb-md-0">Add a category</h5>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-link text-secondary p-0 me-3 fw-medium" role="button">Discard</button>
                        <button type="submit" class="btn btn-primary" role="button">Add category </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-0">
            <div class="col-lg-8 pe-lg-2">
                <div class="card mb-3">
                    <div class="card-header bg-body-tertiary">
                        <h6 class="mb-0">Basic information</h6>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row gx-2">
                                <div class="col-12 mb-3">
                                    <label class="form-label" for="name">Category name:</label>
                                    <input class="form-control"id="name" type="text" name="name"
                                        @error('name') is-invalid @enderror value="{{ old('name') }}" />
                                    @error('name')
                                        <div class="invalid-feedback">
                                            <div class="alert alert-danger col-md-9">{{ $message }}</div>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card mb-3">
                        <div class="card-header bg-body-tertiary">
                            <h6 class="mb-0">Add images</h6>
                        </div>
                        <input width="25" type="file" class="form-control" @error('image_cover') is-invalid @enderror
                            name="image_cover">
                            
                        @error('image_cover')
                            <div class="invalid-feedback">
                                <div class="alert alert-danger col-md-9">{{ $message }}</div>
                            </div>
                            
                        @enderror
                        
                </div>
                

                    {{-- <div class="card-body">
                        <form class="dropzone dropzone-multiple p-0" id="image_cover" data-dropzone="data-dropzone"
                            action="#!" data-options='{"acceptedFiles":"image/*"}' @error('image_cover') is-invalid @enderror >
                            
                            <div class="fallback">
                                <input name="file" type="file" multiple="multiple" />
                            </div>

                            <div class="dz-message" data-dz-message="data-dz-message">
                                <img class="me-2" src="" width="25" alt="" /><span
                                    class="d-none d-lg-inline">Drag your image here<br />or, </span><span
                                    class="btn btn-link p-0 fs-10">Browse</span>
                            </div>

                            <div class="dz-preview dz-preview-multiple m-0 d-flex flex-column">
                                <div class="d-flex media align-items-center mb-3 pb-3 border-bottom btn-reveal-trigger">
                                    <img class="dz-image" src="" alt="..."
                                        data-dz-thumbnail="data-dz-thumbnail" />
                                    <div class="flex-1 d-flex flex-between-center">

                                        <div>
                                            <h6 data-dz-name="data-dz-name"></h6>
                                            <div class="d-flex align-items-center">
                                                <p class="mb-0 fs-10 text-400 lh-1" data-dz-size="data-dz-size"></p>
                                                <div class="dz-progress"><span class="dz-upload"
                                                        data-dz-uploadprogress=""></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dropdown font-sans-serif">
                                            <button
                                                class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal dropdown-caret-none"
                                                type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false"><span class="fas fa-ellipsis-h"></span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end border py-2"><a
                                                    class="dropdown-item" href="#!"
                                                    data-dz-remove="data-dz-remove">Remove File</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div> --}}
                </div>

                <div class="card mb-3">
                    <div class="card-header bg-body-tertiary">
                        <h6 class="mb-0">Note:</h6>
                    </div>
                    <div class="card-body">
                        <div class="row gx-2">
                            <div class="col-12 mb-3">
                                <div class="create-product-description-textarea">
                                    <textarea class="form-control" id="note" name="note" @error('note') is-invalid @enderror></textarea>
                                    @error('note')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Slidebar bên phải --}}
            <div class="col-lg-4 ps-lg-2">
                <div class="sticky-sidebar">
                    <div class="card mb-3">
                        <div class="card-header bg-body-tertiary">
                            <h6 class="mb-0">Parent</h6>
                            
                        </div>
                        <div class="card-body">
                            {{-- test thử danh mục cha --}}
                            <div class="row gx-2">
                                <div class="col-12 mb-3">
                                    <label class="form-label" for="parent_id">Select category:</label>
                                    <select class="form-select" id="parent_id" name="parent_id">
                                        <option value="" selected>Choose Category</option> <!-- Option mặc định -->
                                        @foreach ($listDanhMuc as $item)
                                            <option value="{{ $item->id }}" {{ $item->parent_id == $item->id ? 'selected' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                        {{-- <option value="new">Add New Category</option> --}}
                                    </select>
                                </div>
                            </div>

                            
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header bg-body-tertiary">
                            <h6 class="mb-0">Slug</h6>
                            
                        </div>
                        <div class="card-body">
                            <label class="form-label" for="slug">Slug:</label>
                            <input class="form-control" id="slug" name="slug" @error('slug') is-invalid @enderror />
                        </div>
                        @error('slug')
                            <div class="invalid-feedback">
                                <div class="alert alert-danger col-md-9">{{ $message }}</div>
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            
        </div>
    </form>
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
        document.getElementById('name').addEventListener('input', function() {
            const nameInput = this.value;
            const slug = createSlug(nameInput);
            document.getElementById('slug').value = slug;
        });

    

    </script>
@endsection

@extends('admin::layout.master')
@section('title')
    Admin | List Categories
@endsection
@section('contents')
    <div class="card mb-3">
        <div class="card-header">
            <div class="row flex-between-end">
                <div class="col-auto align-self-center">
                    <h5 class="mb-0">List categories</h5>
                </div>
            </div>
            <hr>
            <div class="row flex-between-end">
                <div class="col-auto align-self-center">
                    {{-- Form Add Cate --}}
                    <form class="row gy-2 gx-3 align-items-center" action="{{route('admin.categories.store')}}" method="POST" id="categoryForm" enctype="multipart/form-data">
                        @csrf
                        <div class="col-auto">
                            <label class="form-label" for="name">Tên</label>
                            <input class="form-control" id="name" type="text" name="name" value="{{ old('name') }}" />
                        </div>
                        <div class="col-auto">
                            <label class="form-label" for="autoSizingSelect">Mục</label>
                            <select class="form-select" id="autoSizingSelect" name="parent_id">
                                <option value="" selected>Trống</option>
                                @foreach($listCate as $item)
                                            <option value="{{ $item->id }}" {{ old('parent_id', $item['parent_id']) == $item->id ? 'selected' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach

                            </select>
                        </div>
                        <div class="col-auto">
                            <label class="form-label" for="slug">Slug</label>
                            <input class="form-control" id="slug" type="text" name="slug" value="{{ old('slug') }}" />
                        </div>
                        <div class="col-auto">
                            <label class="form-label" for="basic-form-textarea">Ghi chú</label>
                            <textarea class="form-control" id="basic-form-textarea" rows="2" cols="50" name="note"></textarea>
                        </div>       
                        {{-- <div class="card-header bg-body-tertiary">
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
                        </div> --}}
                        
                        
                        <div class="col-auto">
                            <label class="form-label" for="name">Ảnh</label>
                            <input width="25" type="file" class="form-control" @error('image_cover') is-invalid @enderror
                            name="image_cover">
                        </div><hr>
                        <div class="col-auto">
                            <button class="btn btn-primary" type="submit">Add new</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <hr>
        <div class="card-body px-0">
            <div class="tab-content">
                <div class="tab-pane preview-tab-pane active" role="tabpanel"
                    aria-labelledby="tab-dom-023429b2-f0b9-4091-bf3c-0936e4daf000"
                    id="dom-023429b2-f0b9-4091-bf3c-0936e4daf000">
                    <table class="table mb-0 data-table fs-10" data-datatables="data-datatables">
                        <thead class="bg-200">
                            <tr>
                                <th class="text-900 sort">Tên</th>
                                <th class="text-900 sort">Slug</th>
                                <th class="text-900 sort">Ghi chú</th>
                                <th class="text-900 sort">Ảnh</th>
                                <th class="text-900 sort text-end">Mục</th>
                                <th class="text-900 no-sort pe-1 align-middle data-table-row-action"></th>
                            </tr>
                        </thead>
                        <tbody class="list" id="table-simple-pagination-body">
                            @foreach ($listCate as $item)
                            <tr class="btn-reveal-trigger">
                                <td>{{$item->name}}</td>
                                <td>{{$item->slug}}</td>
                                <td>
                                    <strong>{{$item->note}}</strong>
                                </td>
                                <td>
                                   @if ($item->image_cover)
                                       <img src="{{Storage::url($item->image_cover)}}" width="100" height="100" alt="">
                                   @endif
                                </td>
                                <td class="text-end">
                                    <strong>{{$item->parent_id}}</strong>
                                </td>
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
                                            <a class="dropdown-item" href="{{route('admin.categories.edit', ['id' => $item->id])}}">Edit</a>
                                            <div class="dropdown-divider"></div>

                                            <form action="{{route('admin.categories.destroy', ['id' => $item->id])}}" method="POST" onclick="return confirm('Có chắc chắn muốn xóa không!')">
                                                @method('DELETE')
                                                @csrf
                                                <button class="dropdown-item" type="submit" data-bs-placement="top" title="Delete">
                                                    Delete
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
        document.getElementById('name').addEventListener('input', function() {
            const nameInput = this.value;
            const slug = createSlug(nameInput);
            document.getElementById('slug').value = slug;
        });

    

    </script>
@endsection
@section('js-libs')
    <script src="{{ asset('theme/admin/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('theme/admin/vendors/datatables.net/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('theme/admin/vendors/datatables.net-bs5/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('theme/admin/vendors/datatables.net-fixedcolumns/dataTables.fixedColumns.min.js') }}"></script>
    <script src="{{ asset('theme/admin/vendors/datatables.net-bs5/dataTables.bootstrap5.min.css') }}"></script>
@endsection

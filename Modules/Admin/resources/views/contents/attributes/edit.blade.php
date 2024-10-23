@extends('admin::layout.master')

@section('title')
    Admin | Cập nhật thuộc tính
@endsection

@section('contents')
    <div class="card mb-3">
        <div class="card-header">
            <div class="d-flex flex-between-center">
                <a href="{{ route('admin.attributes.listAttr') }}" class="btn btn-dark">Back</a>
                @if (session()->has('error'))
                    <h5 class="mb-2 mb-md-0 text-danger">{{ session('error') }}</h5>
                @else
                    @if (session()->has('success'))
                        <h5 class="mb-2 mb-md-0 text-success">{{ session('success') }}</h5>
                    @else
                        <h5 class="mb-2 mb-md-0">Cập nhật thuộc tính</h5>
                    @endif
                @endif
            </div>
        </div>
        <div class="card-body p-0 pb-3">
            <form class="table-responsive scrollbar"
                action="{{ route('admin.attributes.update', $attrName == 'Kích thước' ? 'size' : 'color') }}"
                method="POST">
                @csrf
                @method('PUT')
                <table class="table mb-0">
                    <thead class="bg-200">
                        <tr>
                            <th class="text-black dark__text-white align-middle" style="width: 300px;">Tên thuộc tính</th>
                            <th class="text-black dark__text-white align-middle">Giá trị thuộc tính</th>
                            <th class="text-black dark__text-white align-middle" style="width: 250px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="align-middle">
                                {{ $attrName }}
                            </td>
                            <td>
                                <div class="row" id="moreValue">
                                    @if (count($dataAttr))
                                        @if ($attrName == 'Màu sắc')
                                            @foreach ($dataAttr as $value)
                                                <div class="col-sm-4 mb-3 d-flex" id="valueID-{{ $value->id }}">
                                                    <input type="color" class="form-control form-control-color inputColor"
                                                        name="update[{{ $value->id }}]"
                                                        value="{{ $value->color_value }}">
                                                </div>
                                            @endforeach
                                        @endif
                                        @if ($attrName == 'Kích thước')
                                            @foreach ($dataAttr as $value)
                                                <div class="col-sm-4 mb-3 d-flex" id="valueID-{{ $value->id }}">
                                                    <input type="text" class="form-control inputText"
                                                        name="update[{{ $value->id }}]"
                                                        value="{{ $value->size_value }}">
                                                </div>
                                            @endforeach
                                        @endif
                                    @else
                                        <div class="col-12 text-warning">Chưa thêm giá trị cho thuộc tính này!</div>
                                    @endif
                                </div>
                            </td>
                            <td class="align-middle">
                                <a class="btn btn-primary" id="btnMore" onclick="{!! $attrName == 'Kích thước' ? 'addMore()' : 'addMoreColor()' !!}">Thêm giá trị</a>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3">
                                <button type="submit" class="btn btn-success">Cập nhật thuộc tính</button>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </form>
        </div>
        @if ($errors->any())
            <div class="card-footer">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
    </div>
@endsection
@section('js-libs')
    <script src="{{ asset('theme/admin/vendors/jquery/jquery.min.js') }}"></script>
@endsection
@section('js-setting')
    <script>
        function addMore() {
            let id = 'gen' + '_' + Math.random().toString(36).substring(2, 15).toLowerCase();
            let html = `
        <div class="col-sm-4 mb-3 d-flex" id="${id}_item">
            <input type="text" class="form-control" name="values[]" id="${id}">
            <button type="button" class="btn btn-danger" onclick="removeValue('${id}_item')">
                <span class="far fa-trash-alt"></span>
            </button>
        </div>
        `;
            $('#moreValue').append(html);
        }

        function addMoreColor() {
            let id = 'gen' + '_' + Math.random().toString(36).substring(2, 15).toLowerCase();
            let color = `
        <div class="col-sm-4 mb-3 d-flex" id="${id}_item">
            <input type="color" class="form-control form-control-color" name="values[]" id="${id}">
            <button type="button" class="btn btn-danger" onclick="removeValue('${id}_item')">
                <span class="far fa-trash-alt"></span>
            </button>
        </div>
        `;
            $('#moreValue').append(color);
        }

        function removeValue(id) {
            $('#' + id).remove();
        }
    </script>
@endsection

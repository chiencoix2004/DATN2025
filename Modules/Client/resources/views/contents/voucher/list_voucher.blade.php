@extends('client::layouts.master')
@section('title')
    Danh sách voucher | Thời trang Phong cách Việt
@endsection
@section('contents')
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <h2 style="margin-top: 30px;">Thời trang Phong cách Việt</h2>
                <ul>
                    <li><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li class="active">Danh sách voucher</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="about-us-area">
        <div class="container">
            <form method="GET" action="{{ route('listVoucher') }}">
                <div class="form-group">
                    <input type="text" name="search" class="form-control" placeholder="Tìm kiếm theo tên hoặc mã" value="{{ request('search') }}">
                </div>
                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            </form>
            
            <div id="voucher-list-data">
                @include('client::contents.voucher.list_voucher_data')
            </div>
            
            <script>
            $(document).ready(function() {
                $(document).on('click', '.pagination a', function(event) { 
                    event.preventDefault();
                    var url = $(this).attr('href'); 
             
                    $.ajax({
                        url: url,
                        type: 'GET',
                        dataType: 'html', 
                        success: function(response)  {
                            $('#voucher-list-data').html(response); 
                        }
                    });
                });
            });
            </script>
        </div>
    </div>
@endsection
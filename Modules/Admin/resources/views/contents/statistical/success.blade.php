@extends('admin::layout.master')
@section('title')
    Admin | đặt hàng thành công
@endsection
@section('contents')
<div class="card h-100">
    <div class="card-header bg-body-tertiary py-3">
      <h6 class="mb-0"> đặt hàng thành công</h6>
    </div>
    <div class="card-body">
      <div class="echart-browsed-courses h-100" >
        <canvas id="successRateChart"></canvas>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const successRateCtx = document.getElementById('successRateChart').getContext('2d');
            new Chart(successRateCtx, {
                type: 'line',
                data: {
                    labels: {!! json_encode($successRateLabels) !!},
                    datasets: [{
                        label: 'Tỉ lệ thành công',
                        data: {!! json_encode($successRateValues) !!},
                        backgroundColor: 'rgba(255, 206, 86, 0.2)',
                        borderColor: 'rgba(255, 206, 86, 1)',
                        borderWidth: 1,
                        fill: true 
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 100, 
                            ticks: {
                                callback: function(value) {
                                    return value + '%' 
                                }
                            }
                        }
                    }
                }
            });
        </script>
      </div>
    </div>
    <div class="card-footer bg-body-tertiary py-2">
      <div class="row flex-between-center g-0">
        <div class="col-auto"></div>
        <div class="col-auto"><a class="btn btn-link btn-sm px-0 fw-medium" href="{{ route('admin.statistical.listStatistical') }}">Trở lại<span class="fas fa-chevron-right ms-1 fs-11"></span></a></div>
      </div>
    </div>
</div>
@endsection
@section('js-setting')
<script src="{{asset('theme/admin/vendors/chart/chart.umd.js')}}"></script>
@endsection


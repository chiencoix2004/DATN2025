@extends('admin::layout.master')
@section('title')
    Falcon | Dashboard
@endsection
@section('contents')
    <div class="row g-3 mb-3">
        <div class="col-md-6 col-xxl-3">
            <div class="card h-md-100 ecommerce-card-min-width">
                <div class="card-header pb-0">
                    <h6 class="mb-0 mt-2 d-flex align-items-center">Weekly Sales<span class="ms-1 text-400"
                            data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Calculated according to last week's sales"><span class="far fa-question-circle"
                                data-fa-transform="shrink-1"></span></span></h6>
                </div>
                <div class="card-body d-flex flex-column justify-content-end">
                    <div class="row">
                        <div class="col">
                            <p class="font-sans-serif lh-1 mb-1 fs-5">$47K</p><span
                                class="badge badge-subtle-success rounded-pill fs-11">+3.5%</span>
                        </div>
                        <div class="col-auto ps-0">
                            <div class="echart-bar-weekly-sales h-100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xxl-3">
            <div class="card h-md-100">
                <div class="card-header pb-0">
                    <h6 class="mb-0 mt-2">Total Order</h6>
                </div>
                <div class="card-body d-flex flex-column justify-content-end">
                    <div class="row justify-content-between">
                        <div class="col-auto align-self-end">
                            <div class="fs-5 fw-normal font-sans-serif text-700 lh-1 mb-1">58.4K</div>
                            <span class="badge rounded-pill fs-11 bg-200 text-primary"><span
                                    class="fas fa-caret-up me-1"></span>13.6%</span>
                        </div>
                        <div class="col-auto ps-0 mt-n4">
                            <div class="echart-default-total-order"
                                data-echarts='{"tooltip":{"trigger":"axis","formatter":"{b0} : {c0}"},"xAxis":{"data":["Week 4","Week 5","Week 6","Week 7"]},"series":[{"type":"line","data":[20,40,100,120],"smooth":true,"lineStyle":{"width":3}}],"grid":{"bottom":"2%","top":"2%","right":"10px","left":"10px"}}'
                                data-echart-responsive="true"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xxl-3">
            <div class="card h-md-100">
                <div class="card-body">
                    <div class="row h-100 justify-content-between g-0">
                        <div class="col-5 col-sm-6 col-xxl pe-2">
                            <h6 class="mt-1">Market Share</h6>
                            <div class="fs-11 mt-3">
                                <div class="d-flex flex-between-center mb-1">
                                    <div class="d-flex align-items-center"><span class="dot bg-primary"></span><span
                                            class="fw-semi-bold">Samsung</span></div>
                                    <div class="d-xxl-none">33%</div>
                                </div>
                                <div class="d-flex flex-between-center mb-1">
                                    <div class="d-flex align-items-center"><span class="dot bg-info"></span><span
                                            class="fw-semi-bold">Huawei</span></div>
                                    <div class="d-xxl-none">29%</div>
                                </div>
                                <div class="d-flex flex-between-center mb-1">
                                    <div class="d-flex align-items-center"><span class="dot bg-300"></span><span
                                            class="fw-semi-bold">Apple</span></div>
                                    <div class="d-xxl-none">20%</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto position-relative">
                            <div class="echart-market-share"></div>
                            <div class="position-absolute top-50 start-50 translate-middle text-1100 fs-7">
                                26M</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xxl-3">
            <div class="card h-md-100">
                <div class="card-header d-flex flex-between-center pb-0">
                    <h6 class="mb-0">Weather</h6>
                    <div class="dropdown font-sans-serif btn-reveal-trigger"><button
                            class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal"
                            type="button" id="dropdown-weather-update" data-bs-toggle="dropdown" data-boundary="viewport"
                            aria-haspopup="true" aria-expanded="false"><span
                                class="fas fa-ellipsis-h fs-11"></span></button>
                        <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-weather-update">
                            <a class="dropdown-item" href="#!">View</a><a class="dropdown-item"
                                href="#!">Export</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item text-danger"
                                href="#!">Remove</a>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-2">
                    <div class="row g-0 h-100 align-items-center">
                        <div class="col">
                            <div class="d-flex align-items-center"><img class="me-3"
                                    src="{{ asset('theme/admin/img/icons/weather-icon.png') }}" alt=""
                                    height="60" />
                                <div>
                                    <h6 class="mb-2">New York City</h6>
                                    <div class="fs-11 fw-semi-bold">
                                        <div class="text-warning">Sunny</div>Precipitation: 50%
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto text-center ps-2">
                            <div class="fs-5 fw-normal font-sans-serif text-primary mb-1 lh-1">31&deg;
                            </div>
                            <div class="fs-10 text-800">32&deg; / 25&deg;</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row g-0">
        <div class="col-lg-6 pe-lg-2 mb-3">
            <div class="card h-lg-100 overflow-hidden">
                <div class="card-header bg-body-tertiary">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="mb-0">Đơn hàng gần đây</h6>
                        </div>
                        {{-- <div class="col-auto text-center pe-x1"><select class="form-select form-select-sm">
                                <option>Working Time</option>
                                <option>Estimated Time</option>
                                <option>Billable Time</option>
                            </select></div> --}}
                    </div>
                </div>
                <div class="card-body p-0">
                    @foreach ($order as $item)
                        <div class="row g-0 align-items-center py-2 position-relative border-bottom border-200">
                            <div class="col ps-x1 py-1 position-static">
                                <div class="d-flex align-items-center">
                                    {{-- <div class="avatar avatar-xl me-3">
                                        <div class="avatar-name rounded-circle bg-primary-subtle text-dark">
                                            <span class="fs-9 text-primary">F</span>
                                        </div>
                                    </div> --}}
                                    <div class="flex-1">
                                        <h6 class="mb-0 d-flex align-items-center"><a class="text-800 stretched-link"
                                                href="{{ route('admin.orders.detail', ['order' => $item->id]) }}">Đơn hàng
                                                #{{ $item->id }}</a>
                                            {{-- <span
                                                class="badge rounded-pill ms-2 bg-200 text-primary">38%</span> --}}
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col py-1">
                                <div class="row flex-end-center g-0">
                                    <div class="col-auto pe-2">
                                        <span
                                            class="badge rounded-pill ms-2 bg-200 text-primary">{{ $item->status_order }}</span>
                                        <span
                                            class="badge rounded-pill ms-2 bg-200 text-primary">{{ $item->status_payment }}</span>
                                    </div>
                                    {{-- <div class="col-5 pe-x1 ps-2">
                                        
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="card-footer bg-body-tertiary p-0"><a class="btn btn-sm btn-link d-block w-100 py-2"
                        href="{{ route('admin.orders.list') }}">Xem tất cả<span
                            class="fas fa-chevron-right ms-1 fs-11"></span></a></div>
            </div>
        </div>
        <div class="col-lg-6 pe-lg-2 mb-3">
            <div class="card h-lg-100 overflow-hidden">
                <div class="card-header bg-body-tertiary">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="mb-0">Phiếu hỗ trợ gần đây</h6>
                        </div>
                        {{-- <div class="col-auto text-center pe-x1"><select class="form-select form-select-sm">
                                <option>Working Time</option>
                                <option>Estimated Time</option>
                                <option>Billable Time</option>
                            </select></div> --}}
                    </div>
                </div>
                <div class="card-body p-0">

                        <div class="row g-0 align-items-center py-2 position-relative border-bottom border-200">
                            <div class="col ps-x1 py-1 position-static">
                                <div class="d-flex align-items-center">
                                    {{-- <div class="avatar avatar-xl me-3">
                                        <div class="avatar-name rounded-circle bg-primary-subtle text-dark">
                                            <span class="fs-9 text-primary">F</span>
                                        </div>
                                    </div> --}}
                                    <div class="flex-1">
                                        <h6 class="mb-0 d-flex align-items-center"><a class="text-800 stretched-link"
                                                href="">
                                                </a>
                                            {{-- <span
                                                class="badge rounded-pill ms-2 bg-200 text-primary">38%</span> --}}
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col py-1">
                                <div class="row flex-end-center g-0">
                                    <div class="col-auto pe-2">
                                        <span
                                            class="badge rounded-pill ms-2 bg-200 text-primary"></span>
                                        <span
                                            class="badge rounded-pill ms-2 bg-200 text-primary"></span>
                                    </div>
                                    {{-- <div class="col-5 pe-x1 ps-2">
                                        
                                    </div> --}}
                                </div>
                            </div>
                        </div>


                </div>
                <div class="card-footer bg-body-tertiary p-0"><a class="btn btn-sm btn-link d-block w-100 py-2"
                        href="{{ route('admin.ticket.index') }}">Xem tất cả<span
                            class="fas fa-chevron-right ms-1 fs-11"></span></a></div>
            </div>
        </div>
    </div>
    <div class="row g-0">
        <div class="col-lg-12 col-xl-12 ps-lg-12 mb-3">
            <div class="card h-100">
                <div class="card-header d-flex flex-between-center bg-body-tertiary py-2">
                    <h6 class="mb-0">Doanh thu theo các tháng</h6>
                </div>
                <div class="card-body pb-0">
                    <div class="echart-basic-bar-chart-example" style="min-height: 300px;" data-echart-responsive="true">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row g-0">
        <div class="col-lg-7 col-xl-8 pe-lg-2 mb-3">
            <div class="card h-lg-100 overflow-hidden">
                <div class="card-body p-0">
                    <div class="table-responsive scrollbar">
                        <table class="table table-dashboard mb-0 table-borderless fs-10 border-200">
                            <thead class="bg-body-tertiary">
                                <tr>
                                    <th class="text-900">Sản phẩm bán chạy</th>
                                    <th class="text-900 text-end">Số lượng bán</th>
                                    {{-- <th class="text-900 pe-x1 text-end" style="width: 8rem">Revenue (%)
                                    </th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bestSell as $item)
                                    <tr class="border-bottom border-200">
                                        <td>
                                            <div class="d-flex align-items-center position-relative"><img
                                                    class="rounded-1 border border-200" src="{{ $item->image_avatar }}"
                                                    width="60" alt="" />
                                                <div class="flex-1 ms-3">
                                                    <h6 class="mb-1 fw-semi-bold"><a class="text-1100 stretched-link"
                                                            href="{{ route('admin.product.detailP', ['slug' => $item->slug]) }}">{{ $item->name }}</a>
                                                    </h6>
                                                    <p class="fw-semi-bold mb-0 text-500">{{ $item->sku }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle text-end fw-semi-bold">{{ $item->total_quantity }}</td>
                                        {{-- <td class="align-middle pe-x1">
                                            <div class="d-flex align-items-center">
                                                <div class="progress me-3 rounded-3 bg-200"
                                                    style="height: 5px; width:80px;" role="progressbar"
                                                    aria-valuenow="39" aria-valuemin="0" aria-valuemax="100">
                                                    <div class="progress-bar rounded-pill" style="width: 39%;"></div>
                                                </div>
                                                <div class="fw-semi-bold ms-2">39%</div>
                                            </div>
                                        </td> --}}
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- <div class="card-footer bg-body-tertiary py-2">
                    <div class="row flex-between-center">
                        <div class="col-auto"><select class="form-select form-select-sm">
                                <option>Last 7 days</option>
                                <option>Last Month</option>
                                <option>Last Year</option>
                            </select></div>
                        <div class="col-auto"><a class="btn btn-sm btn-falcon-default" href="#!">View All</a></div>
                    </div>
                </div> --}}
            </div>
        </div>
        <div class="col-lg-5 col-xl-4 ps-lg-2 mb-3">
            <div class="card h-100">
                <div class="card-header d-flex flex-between-center bg-body-tertiary py-2">
                    <h6 class="mb-0">Bình luận gần đây</h6><a class="py-1 fs-10 font-sans-serif" href="#!">Xem tất
                        cả</a>
                </div>
                <div class="card-body pb-0">

                    <div class="d-flex mb-3 hover-actions-trigger align-items-center">
                        <div class="file-thumbnail"><img class="border h-100 w-100 object-fit-cover rounded-2"
                                src="{{ asset('theme/admin/img/products/5-thumb.png') }}" alt="" /></div>
                        <div class="ms-3 flex-shrink-1 flex-grow-1">
                            <h6 class="mb-1"><a class="stretched-link text-900 fw-semi-bold"
                                    href="#!">apple-smart-watch.png</a></h6>

                        </div>
                    </div>
                    <hr class="text-200" />

                </div>
            </div>
        </div>
    </div>
    <div class="row g-0">
        <div class="col-md-6 col-xxl-3 pe-md-2 mb-3 mb-xxl-0">
            <div class="card">
                <div class="card-header d-flex flex-between-center bg-body-tertiary py-2">
                    <h6 class="mb-0">Khách hàng mới</h6>
                    {{-- <div class="dropdown font-sans-serif btn-reveal-trigger"><button
                            class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal"
                            type="button" id="dropdown-active-user" data-bs-toggle="dropdown" data-boundary="viewport"
                            aria-haspopup="true" aria-expanded="false"><span
                                class="fas fa-ellipsis-h fs-11"></span></button>
                        <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-active-user"><a
                                class="dropdown-item" href="#!">View</a><a class="dropdown-item"
                                href="#!">Export</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item text-danger"
                                href="#!">Remove</a>
                        </div>
                    </div> --}}
                </div>
                <div class="card-body py-2">
                    @foreach ($listUser as $item)
                        <div class="d-flex align-items-center position-relative mb-3">
                            <div class="avatar avatar-2xl">
                                <img class="rounded-circle" src="{{ asset($item->user_image) }}" alt="" />
                            </div>
                            <div class="flex-1 ms-3">
                                <h6 class="mb-0 fw-semi-bold"><a class="stretched-link text-900"
                                        href="{{ route('admin.users.show', ['id' => $item->id]) }}">{{ $item->full_name }}</a>
                                </h6>
                                <p class="text-500 fs-11 mb-0">Khách hàng</p>
                            </div>
                        </div>
                    @endforeach


                </div>
                <div class="card-footer bg-body-tertiary p-0"><a class="btn btn-sm btn-link d-block w-100 py-2"
                        href="{{ route('admin.users.index') }}">Xem tất cả<span
                            class="fas fa-chevron-right ms-1 fs-11"></span></a></div>
            </div>
        </div>
        <div class="col-md-6 col-xxl-3 ps-md-2 order-xxl-1 mb-3 mb-xxl-0">
            <div class="card h-100">
                <div class="card-header bg-body-tertiary d-flex flex-between-center py-2">
                    <h6 class="mb-0">Bandwidth Saved</h6>
                    <div class="dropdown font-sans-serif btn-reveal-trigger"><button
                            class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal"
                            type="button" id="dropdown-bandwidth-saved" data-bs-toggle="dropdown"
                            data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span
                                class="fas fa-ellipsis-h fs-11"></span></button>
                        <div class="dropdown-menu dropdown-menu-end border py-2"
                            aria-labelledby="dropdown-bandwidth-saved"><a class="dropdown-item" href="#!">View</a><a
                                class="dropdown-item" href="#!">Export</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item text-danger"
                                href="#!">Remove</a>
                        </div>
                    </div>
                </div>
                <div class="card-body d-flex flex-center flex-column">
                    <!-- Find the JS file for the following chart at: src/js/charts/echarts/bandwidth-saved.js--><!-- If you are not using gulp based workflow, you can find the transpiled code at: public/assets/js/theme.js-->
                    <div class="echart-bandwidth-saved" data-echart-responsive="true"></div>
                    <div class="text-center mt-3">
                        <h6 class="fs-9 mb-1"><span class="fas fa-check text-success me-1"
                                data-fa-transform="shrink-2"></span>35.75 GB saved</h6>
                        <p class="fs-10 mb-0">38.44 GB total bandwidth</p>
                    </div>
                </div>
                <div class="card-footer bg-body-tertiary py-2">
                    <div class="row flex-between-center">
                        <div class="col-auto"><select class="form-select form-select-sm">
                                <option>Last 6 Months</option>
                                <option>Last Year</option>
                                <option>Last 2 Year</option>
                            </select></div>
                        <div class="col-auto"><a class="fs-10 font-sans-serif" href="#!">Help</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-6 px-xxl-2">
            <div class="card h-100">
                <div class="card-header bg-body-tertiary py-2">
                    <div class="row flex-between-center">
                        <div class="col-auto">
                            <h6 class="mb-0">Top Products</h6>
                        </div>
                        <div class="col-auto d-flex"><a class="btn btn-link btn-sm me-2" href="#!">View Details</a>
                            <div class="dropdown font-sans-serif btn-reveal-trigger"><button
                                    class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal"
                                    type="button" id="dropdown-top-products" data-bs-toggle="dropdown"
                                    data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span
                                        class="fas fa-ellipsis-h fs-11"></span></button>
                                <div class="dropdown-menu dropdown-menu-end border py-2"
                                    aria-labelledby="dropdown-top-products"><a class="dropdown-item"
                                        href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                                    <div class="dropdown-divider"></div><a class="dropdown-item text-danger"
                                        href="#!">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body h-100">
                    <!-- Find the JS file for the following chart at: src/js/charts/echarts/top-products.js--><!-- If you are not using gulp based workflow, you can find the transpiled code at: public/assets/js/theme.js-->
                    <div class="echart-bar-top-products h-100" data-echart-responsive="true"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js-setting')
    <script src="{{ asset('theme/admin/vendors/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('theme/admin/js/echarts-example.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            echartsBasicBarChartInit();
        });

        function echartsBasicBarChartInit() {
            var $barChartEl = document.querySelector('.echart-basic-bar-chart-example');
            if ($barChartEl) {
                // Get options from data attribute
                var userOptions = utils.getData($barChartEl, 'options');
                var chart = window.echarts.init($barChartEl);
                var months = ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9',
                    'T10', 'T11', 'T12'
                ];
                var data = @json($salesData); // Ensure this is an array of numbers

                // Custom tooltip formatter function to format values as VND
                var tooltipFormatter = function(params) {
                    if (params && params.length > 0) {
                        var month = months[params[0].dataIndex]; // Get the month from the data index
                        var value = params[0].value; // Get the value for the corresponding month

                        // Debugging: Log the value to check its type
                        console.log('Value:', value, 'Type:', typeof value);

                        // Ensure value is a number
                        if (typeof value === 'number') {
                            return month + ': ' + value.toLocaleString('vi-VN', {
                                style: 'currency',
                                currency: 'VND'
                            }); // Format the value as VND
                        } else {
                            return month + ': ' + value; // Fallback if not a number
                        }
                    }
                    return '';
                };

                var getDefaultOptions = function getDefaultOptions() {
                    return {
                        tooltip: {
                            trigger: 'axis',
                            padding: [7, 10],
                            backgroundColor: utils.getGrays()['100'],
                            borderColor: utils.getGrays()['300'],
                            textStyle: {
                                color: utils.getGrays()['1100']
                            },
                            borderWidth: 1,
                            formatter: tooltipFormatter, // Use the custom formatter
                            transitionDuration: 0,
                            axisPointer: {
                                type: 'none'
                            }
                        },
                        xAxis: {
                            type: 'category',
                            data: months,
                            axisLine: {
                                lineStyle: {
                                    color: utils.getGrays()['300'],
                                    type: 'solid'
                                }
                            },
                            axisTick: {
                                show: false
                            },
                            axisLabel: {
                                color: utils.getGrays()['400'],
                                formatter: function(value) {
                                    return value; // Keep the full month label
                                },
                                margin: 15
                            },
                            splitLine: {
                                show: false
                            }
                        },
                        yAxis: {
                            type: 'value',
                            boundaryGap: true,
                            axisLabel: {
                                show: true,
                                color: utils.getGrays()['400'],
                                margin: 15,
                                formatter: function(value) {
                                    return value.toLocaleString('vi-VN', {
                                        style: 'currency',
                                        currency: 'VND'
                                    }); // Format Y-axis labels as VND
                                }
                            },
                            splitLine: {
                                show: true,
                                lineStyle: {
                                    color: utils.getGrays()['200']
                                }
                            },
                            axisTick: {
                                show: false
                            },
                            axisLine: {
                                show: false
                            },
                            min: 600
                        },
                        series: [{
                            type: 'bar',
                            name: 'Total',
                            data: data,
                            lineStyle: {
                                color: utils.getColor('primary')
                            },
                            itemStyle: {
                                color: utils.getColor('primary'),
                                barBorderRadius: [3, 3, 0, 0]
                            },
                            showSymbol: false,
                            symbol: 'circle',
                            smooth: false,
                            hoverAnimation: true
                        }],
                        grid: {
                            right: '3%',
                            left: '10%',
                            bottom: '10%',
                            top: '5%'
                        }
                    };
                };

                echartSetOption(chart, userOptions, getDefaultOptions);
            }
        }
    </script>
@endsection

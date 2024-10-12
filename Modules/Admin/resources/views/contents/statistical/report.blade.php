@extends('admin::layout.master')
@section('title')
    Admin | Report
@endsection
@section('contents')
  <div class="d-flex mb-4 mt-3"><span class="fa-stack me-2 ms-n1"><i class="fas fa-circle fa-stack-2x text-300"></i><i class="fa-inverse fa-stack-1x text-primary fas fa-percentage"></i></span>
    <div class="col">
      <h5 class="mb-0 text-primary position-relative"><span class="bg-200 dark__bg-1100 pe-3">Thống kê doanh thu</span><span class="border position-absolute top-50 translate-middle-y w-100 start-0 z-n1"></span></h5>
    </div>
  </div>
  <div class="card mb-3">
    <div class="card-body px-xxl-0 pt-4">
      <div class="row g-0">
        <div class="col-xxl-3 col-md-6 px-3 text-center border-end-md border-bottom border-bottom-xxl-0 pb-3 p-xxl-0 ps-md-0">
          <div class="icon-circle icon-circle-primary"><span class="fs-7 fas fa-user-graduate text-primary"></span></div>
          <h4 class="mb-1 font-sans-serif"><span class="text-700 mx-2" data-countup='{"endValue":"4968"}'></span><span class="fw-normal text-600">Tài khoản khách hàng</span></h4>
          <p class="fs-10 fw-semi-bold mb-0">4203 <span class="text-600 fw-normal"></span></p>
        </div>
        <div class="col-xxl-3 col-md-6 px-3 text-center border-end-xxl border-bottom border-bottom-xxl-0 pb-3 pt-4 pt-md-0 pe-md-0 p-xxl-0">
          <div class="icon-circle icon-circle-info"><span class="fs-7 fas fa-chalkboard-teacher text-info"></span></div>
          <h4 class="mb-1 font-sans-serif"><span class="text-700 mx-2" data-countup='{"endValue":"324"}'></span><span class="fw-normal text-600">Sản phẩm</span></h4>
          <p class="fs-10 fw-semi-bold mb-0">301 <span class="text-600 fw-normal"></span></p>
        </div>
        <div class="col-xxl-3 col-md-6 px-3 text-center border-end-md border-bottom border-bottom-md-0 pb-3 pt-4 p-xxl-0 pb-md-0 ps-md-0">
          <div class="icon-circle icon-circle-success"><span class="fs-7 fas fa-book-open text-success"></span></div>
          <h4 class="mb-1 font-sans-serif"><span class="text-700 mx-2" data-countup='{"endValue":"3712"}'></span><span class="fw-normal text-600">Đơn hàng</span></h4>
          <p class="fs-10 fw-semi-bold mb-0">2779 <span class="text-600 fw-normal"></span></p>
        </div>
        <div class="col-xxl-3 col-md-6 px-3 text-center pt-4 p-xxl-0 pb-0 pe-md-0">
          <div class="icon-circle icon-circle-warning"><span class="fs-7 fas fa-dollar-sign text-warning"></span></div>
          <h4 class="mb-1 font-sans-serif"><span class="text-700 mx-2" data-countup='{"endValue":"1054"}'></span><span class="fw-normal text-600">Lãi xuất</span></h4>
          <p class="fs-10 fw-semi-bold mb-0">1201 <span class="text-600 fw-normal"></span></p>
        </div>
      </div>
    </div>
  </div>
  <div class="row g-3 mb-3">
    <div class="col-xxl-8">
      <div class="card overflow-hidden">
        <div class="card-header audience-chart-header p-0 bg-body-tertiary scrollbar-overlay">
          <ul class="nav nav-tabs border-0 chart-tab flex-nowrap" id="audience-chart-tab" role="tablist">
            <li class="nav-item" role="presentation"><a class="nav-link mb-0 active" id="users-tab" data-bs-toggle="tab" href="#users" role="tab" aria-controls="users" aria-selected="true">
                <div class="audience-tab-item p-2 pe-4">
                  <h6 class="text-800 fs-11 text-nowrap">Tài khoản</h6>
                  <h5 class="text-800">3.9K</h5>
                  <div class="d-flex align-items-center"><span class="fas fa-caret-up text-success"></span>
                    <h6 class="fs-11 mb-0 ms-2 text-success">62.0%</h6>
                  </div>
                </div>
              </a></li>
            <li class="nav-item" role="presentation"><a class="nav-link mb-0" id="sessions-tab" data-bs-toggle="tab" href="#sessions" role="tab" aria-controls="sessions" aria-selected="false">
                <div class="audience-tab-item p-2 pe-4">
                  <h6 class="text-800 fs-11 text-nowrap">Sản phẩm</h6>
                  <h5 class="text-800">6.3K</h5>
                  <div class="d-flex align-items-center"><span class="fas fa-caret-up text-success"></span>
                    <h6 class="fs-11 mb-0 ms-2 text-success">46.2%</h6>
                  </div>
                </div>
              </a></li>
            <li class="nav-item" role="presentation"><a class="nav-link mb-0" id="rate-tab" data-bs-toggle="tab" href="#rate" role="tab" aria-controls="rate" aria-selected="false">
                <div class="audience-tab-item p-2 pe-4">
                  <h6 class="text-800 fs-11 text-nowrap">Doanh thu</h6>
                  <h5 class="text-800">9.49%</h5>
                  <div class="d-flex align-items-center"><span class="fas fa-caret-down text-warning"></span>
                    <h6 class="fs-11 mb-0 ms-2 text-warning">56.1%</h6>
                  </div>
                </div>
              </a></li>
            <li class="nav-item" role="presentation"><a class="nav-link mb-0" id="duration-tab" data-bs-toggle="tab" href="#duration" role="tab" aria-controls="duration" aria-selected="false">
                <div class="audience-tab-item p-2 pe-4">
                  <h6 class="text-800 fs-11 text-nowrap">Đơn hàng</h6>
                  <h5 class="text-800">4m 03s</h5>
                  <div class="d-flex align-items-center"><span class="fas fa-caret-down text-warning"></span>
                    <h6 class="fs-11 mb-0 ms-2 text-warning">32.2%</h6>
                  </div>
                </div>
              </a></li>
          </ul>
        </div>
        <div class="card-body">
          <div class="tab-content">
            <div class="tab-pane active" id="users" role="tabpanel" aria-labelledby="users-tab"><!-- Find the JS file for the following chart at: src/js/charts/echarts/audience.js--><!-- If you are not using gulp based workflow, you can find the transpiled code at: public/assets/js/theme.js-->
              <div class="echart-audience" data-echart-responsive="true" style="height:320px;"></div>
            </div>
            <div class="tab-pane" id="sessions" role="tabpanel" aria-labelledby="sessions-tab">
              <div class="echart-audience" data-echart-responsive="true" style="height:320px;"></div>
            </div>
            <div class="tab-pane" id="rate" role="tabpanel" aria-labelledby="rate-tab">
              <div class="echart-audience" data-echart-responsive="true" style="height:320px;"></div>
            </div>
            <div class="tab-pane" id="duration" role="tabpanel" aria-labelledby="duration-tab">
              <div class="echart-audience" data-echart-responsive="true" style="height:320px;"></div>
            </div>
          </div>
        </div>
        <div class="card-footer bg-body-tertiary py-2">
          <div class="row flex-between-center g-0">
            <div class="col-auto"><select class="form-select form-select-sm audience-select-menu">
                <option value="week" selected="selected">Last 7 days</option>
                <option value="month">Last month</option>
              </select></div>
            <div class="col-auto"><a class="btn btn-link btn-sm px-0 fw-medium" href="#!">Chi tiết<span class="fas fa-chevron-right ms-1 fs-11"></span></a></div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-xxl-4">
      <div class="card echart-session-by-browser-card h-100">
        <div class="card-header d-flex flex-between-center bg-body-tertiary py-2">
          <h6 class="mb-0">Session By Browser</h6>
          <div class="dropdown font-sans-serif btn-reveal-trigger"><button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal" type="button" id="dropdown-session-by-browser" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs-11"></span></button>
            <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-session-by-browser"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
              <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
            </div>
          </div>
        </div>
        <div class="card-body d-flex flex-column justify-content-between py-0">
          <div class="my-auto py-5 py-md-0"><!-- Find the JS file for the following chart at: src/js/charts/echarts/session-by-browser.js--><!-- If you are not using gulp based workflow, you can find the transpiled code at: public/assets/js/theme.js-->
            <div class="echart-session-by-browser h-100" data-echart-responsive="true"></div>
          </div>
          <div class="border-top">
            <table class="table table-sm mb-0">
              <tbody>
                <tr>
                  <td class="py-3">
                    <div class="d-flex align-items-center"><img src="assets/img/icons/chrome-logo.png" alt="" width="16" />
                      <h6 class="text-600 mb-0 ms-2">Chrome</h6>
                    </div>
                  </td>
                  <td class="py-3">
                    <div class="d-flex align-items-center"><span class="fas fa-circle fs-11 me-2 text-primary"></span>
                      <h6 class="fw-normal text-700 mb-0">50.3%</h6>
                    </div>
                  </td>
                  <td class="py-3">
                    <div class="d-flex align-items-center justify-content-end"><span class="fas fa-caret-down text-danger"></span>
                      <h6 class="fs-11 mb-0 ms-2 text-700">2.9%</h6>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="py-3">
                    <div class="d-flex align-items-center"><img src="assets/img/icons/safari-logo.png" alt="" width="16" />
                      <h6 class="text-600 mb-0 ms-2">Safari</h6>
                    </div>
                  </td>
                  <td class="py-3">
                    <div class="d-flex align-items-center"><span class="fas fa-circle fs-11 me-2 text-success"></span>
                      <h6 class="fw-normal text-700 mb-0">30.1%</h6>
                    </div>
                  </td>
                  <td class="py-3">
                    <div class="d-flex align-items-center justify-content-end"><span class="fas fa-caret-up text-success"></span>
                      <h6 class="fs-11 mb-0 ms-2 text-700">29.4%</h6>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="py-3">
                    <div class="d-flex align-items-center"><img src="assets/img/icons/firefox-logo.png" alt="" width="16" />
                      <h6 class="text-600 mb-0 ms-2">Mozilla</h6>
                    </div>
                  </td>
                  <td class="py-3">
                    <div class="d-flex align-items-center"><span class="fas fa-circle fs-11 me-2 text-info"></span>
                      <h6 class="fw-normal text-700 mb-0">20.6%</h6>
                    </div>
                  </td>
                  <td class="py-3">
                    <div class="d-flex align-items-center justify-content-end"><span class="fas fa-caret-up text-success"></span>
                      <h6 class="fs-11 mb-0 ms-2 text-700">220.7%</h6>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer bg-body-tertiary py-2">
          <div class="row flex-between-center g-0">
            <div class="col-auto"><select class="form-select form-select-sm" data-target=".echart-session-by-browser">
                <option value="week" selected="selected">Last 7 days</option>
                <option value="month">Last month</option>
                <option value="year">Last Year</option>
              </select></div>
            <div class="col-auto"><a class="btn btn-link btn-sm px-0 fw-medium" href="#!">Browser overview<span class="fas fa-chevron-right ms-1 fs-11"></span></a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('js-setting')
<script src="{{asset('theme/admin/vendors/chart/chart.umd.js')}}"></script>
@endsection

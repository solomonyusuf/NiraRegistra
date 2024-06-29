@extends('shared.layout')
@section('body')
    <div class="row">
        <div class="col-md-12 mb-4 order-0">
            <div class="row">
                <div class="col-md-2 col-sm-12 col-3 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <i style="font-size: 3.2rem;" class="bx bxs-user-account"></i>
                                </div>

                            </div>
                            <span class="fw-medium d-block mb-1">
                                <strong>REGISTRA PROFILES</strong>
                            </span>
                            <h3 class="card-title mb-2">12,628</h3>
                            <small class="text-success fw-medium">
                                <i class="bx bx-up-arrow-alt"></i> +72.80%</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-12 col-3 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <i style="font-size: 3.2rem;" class="bx bx-cube-alt"></i>
                                </div>

                            </div>
                            <span class="fw-medium d-block mb-1">
                                <strong>DATABASE DOMAINS</strong>
                            </span>
                            <h3 class="card-title mb-2">12,628</h3>
                            <small class="text-success fw-medium">
                                <i class="bx bx-up-arrow-alt"></i> +72.80%</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-12 col-3 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <i style="font-size: 3.2rem;"
                                       class="bx bx-calendar"></i>
                                </div>

                            </div>
                            <span class="fw-medium d-block mb-1">
                                <strong> DATABASE SCHEDULES</strong>
                            </span>
                            <h3 class="card-title mb-2">12,628</h3>
                            <small class="text-success fw-medium">

                                <i class="bx bx-up-arrow-alt"></i>
                                +72.80%</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-12 col-3 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <i style="font-size: 3.2rem;"
                                       class="bx bx-money-withdraw"></i>
                                </div>

                            </div>
                            <span class="fw-medium d-block mb-1">
                                <strong>DATABASE PAYMENTS</strong>
                            </span>
                            <h3 class="card-title mb-2">12,628</h3>
                            <small class="text-danger fw-medium">
                                <i class="bx bx-down-arrow-alt"></i> 72
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-12 col-3 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <i style="font-size: 3.2rem;"
                                       class="bx bx-news"></i>
                                </div>

                            </div>
                            <span class="fw-medium d-block mb-1">
                                <strong>DATABASE NEWSLETTERS</strong>
                            </span>
                            <h3 class="card-title mb-2">1628</h3>
                            <small class="text-success fw-medium">
                                <i class="bx bx-up-arrow-alt"></i> +72.80%</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-12 col-3 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <i style="font-size: 3.2rem;"
                                       class="bx bx-group"></i>
                                </div>

                            </div>
                            <span class="fw-medium d-block mb-1">
                                <strong>DATABASE USERS</strong>
                            </span>
                            <h3 class="card-title mb-2">1628</h3>
                            <small class="text-success fw-medium">
                                <i class="bx bx-up-arrow-alt"></i> +72.80%</small>
                        </div>
                    </div>
                </div>

        </div>


        <div class="col-12 col-md-12 order-2 order-md-3 order-lg-2 mb-4">
            <div class="card">
                <div class="row row-bordered g-0">
                    <div class="col-md-8">
                        <h5 class="card-header m-0 me-2 pb-3">Domain Analytics</h5>
                        <div id="totalRevenueChart" class="px-2"></div>
                    </div>
                    <div class="col-md-4">
                        <div class="card-body">
                            <div class="text-center">
                                <div class="dropdown">
                                    <button
                                        class="btn btn-sm btn-outline-primary dropdown-toggle"
                                        type="button"
                                        id="growthReportId"
                                        data-bs-toggle="dropdown"
                                        aria-haspopup="true"
                                        aria-expanded="false">
                                        2022
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId">
                                        <a class="dropdown-item" href="javascript:void(0);">2021</a>
                                        <a class="dropdown-item" href="javascript:void(0);">2020</a>
                                        <a class="dropdown-item" href="javascript:void(0);">2019</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="growthChart"></div>
                        <div class="text-center fw-medium pt-3 mb-2">62% Company Growth</div>

                        <div class="d-flex px-xxl-4 px-lg-2 p-4 gap-xxl-3 gap-lg-1 gap-3 justify-content-between">
                            <div class="d-flex">
                                <div class="me-2">
                                    <span class="badge bg-label-primary p-2"><i class="bx bx-dollar text-primary"></i></span>
                                </div>
                                <div class="d-flex flex-column">
                                    <small>2022</small>
                                    <h6 class="mb-0">$32.5k</h6>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="me-2">
                                    <span class="badge bg-label-info p-2"><i class="bx bx-wallet text-info"></i></span>
                                </div>
                                <div class="d-flex flex-column">
                                    <small>2021</small>
                                    <h6 class="mb-0">$41.2k</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection

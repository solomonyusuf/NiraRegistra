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
            <!-- Line Area Chart -->
            <div class="col-12 mb-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            <h5 class="card-title mb-0">Domains</h5>
                            <small class="text-muted">Registration Analytics</small>
                        </div>
                        <div class="dropdown">
                            <button type="button" class="btn dropdown-toggle px-0" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-calendar"></i></button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Today</a></li>
                                <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Yesterday</a></li>
                                <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Last 7 Days</a></li>
                                <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Last 30 Days</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Current Month</a></li>
                                <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Last Month</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        {!! $chart->container() !!}

                    </div>
                </div>
            </div>
            <!-- /Line Area Chart -->
    </div>
    {!! $chart->script() !!}

@endsection

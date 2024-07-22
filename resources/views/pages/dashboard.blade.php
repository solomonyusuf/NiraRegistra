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
                            <h3 class="card-title mb-2">{{number_format($profiles)}}</h3>

                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-12 col-3 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <i style="font-size: 3.2rem;" class="bx bx-envelope"></i>
                                </div>

                            </div>
                            <span class="fw-medium d-block mb-1">
                                <strong>DATABASE EMAILS</strong>
                            </span>
                            <h3 class="card-title mb-2">{{number_format($emails)}}</h3>
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
                            <h3 class="card-title mb-2">{{number_format($schedule)}}</h3>

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
                            <h3 class="card-title mb-2">{{number_format($payments)}}</h3>

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
                            <h3 class="card-title mb-2">{{number_format($users)}}</h3>
                          </div>
                    </div>
                </div>

        </div>
            <!-- Line Area Chart -->
            <div class="col-12 mb-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            <h5 class="card-title mb-0">Payment Analytics</h5>
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

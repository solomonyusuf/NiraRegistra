@extends('shared.layout')
@section('body')
    <?php
    $list = \App\Models\Payment::orderBy('created_at', 'DESC')->get();
    ?>
    <div class="row">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">All Payments </span>

            <div class="mt-3">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#basicModal">
                    Renew Payment
                </button>

                <!-- Modal -->
                <div class="modal fade" id="basicModal" tabindex="-1" style="display: none;" aria-hidden="true">
                    <form action="{{route('renew_payment')}}" method="post" enctype="multipart/form-data" class="modal-dialog" role="document">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Renew Payment</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">

                                    <div class=" mb-3">
                                        <label for="nameBasic" class="form-label">Registra's</label>
                                        <select name="registra" required class="form-control">
                                            <option>Select</option>
                                            @foreach($registra as $data)
                                                <option value="{{$data->id}}">{{$data->company_name}}</option>
                                            @endforeach


                                        </select>
                                    </div>
                                    <div class=" mb-3">
                                        <label for="nameBasic" class="form-label">Amount</label>
                                        <input name="amount" type="number" id="nameBasic" required class="form-control" />
                                    </div>
                                    <div class=" mb-3">
                                        <label for="nameBasic" class="form-label">Currency</label>
                                        <select name="currency" required class="form-control">
                                            <option>Select</option>
                                            <option value="naira">NGN</option>
                                            <option value="dollar">USD</option>
                                        </select>
                                    </div>
                                    <div class=" mb-3">
                                        <label for="nameBasic" class="form-label">Start Date</label>
                                        <input name="start" type="datetime-local" id="nameBasic" required class="form-control" />
                                    </div>
                                    <div class=" mb-3">
                                        <label for="nameBasic" class="form-label">Expiry Date</label>
                                        <input name="end" type="datetime-local" id="nameBasic" required class="form-control" />
                                    </div>
                                    <div class=" mb-3">
                                        <label for="nameBasic" class="form-label">File <small>(pdf)</small></label>
                                        <input name="file" type="file" id="nameBasic" required class="form-control" accept="application/pdf"/>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    Close
                                </button>
                                <button type="submit" class="btn btn-success">Save changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </h4>
        <div class="row">
            <div class="card">

                <div class="card-body card-datatable table-responsive">
                    <table id="table" class="dt-multilingual table border-top">
                        <thead>
                        <tr>

                            <th>Trnx ID</th>
                            <th>Registra</th>
                            <th>Currency</th>
                            <th>Amount</th>
                            <th>Start</th>
                            <th>Expire</th>
                            <th>Invoice</th>
                         </tr>
                        </thead>
                        <tbody>
                        @foreach($list as $data)
                            <tr>
                                <td>{{\Illuminate\Support\Str::limit($data->id, 8,'')}}</td>
                                <td>
                                    {{\App\Models\Registra::find($data->registras_id)->company_name}}
                                </td>
                                <td>{{$data->currency}}</td>
                                <td>{{$data->amount}}</td>
                                <td>{{$data->start}}</td>
                                <td>{{$data->end}}</td>
                                <td>
                                     <a href="{{asset($data->path)}}" target="_blank" class="btn btn-outline-info mb-2">Invoice</a>
                                     <a href="{{route('delete_payment',$data->id)}}"   class="btn btn-danger mb-2">Delete</a>
                                </td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

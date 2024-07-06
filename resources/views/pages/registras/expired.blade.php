@extends('shared.layout')
@section('body')
    <?php
    $list = \App\Models\Registra::where(['debt'=>true])->get();
    ?>
    <div class="row">
        <div class="col-md-12 mb-4 order-0">
            <h4 class="py-3 mb-4">
                <span class="text-muted fw-light">Unrenewed </span> Profiles
            </h4>

            <div class="row">
                <div class="card">

                    <div class="card-body card-datatable table-responsive">
                        <table id="table" class="dt-multilingual table border-top">
                            <thead>
                            <tr>

                                <th>Logo</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone No</th>
                                <th>Accredited</th>
                                <th>Payment Status</th>
                                <th>Past Names</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($list as $data)
                                <tr>
                                    <td><img src="{{asset($data->logo)}}"
                                             style="height:100px;width:100px;border-radius:50px;"
                                        /></td>
                                    <td>{{$data->company_name}}</td>
                                    <td>{{$data->email}}</td>
                                    <td>{{$data->phone_no}}</td>
                                    <td>{{$data->accredited}}</td>
                                    <td>{{$data->debt}}</td>
                                    <td>{{\Illuminate\Support\Str::limit($data->previous_names, 25, '..')}}</td>
                                    <td><a href="{{route('edit_profile', $data->id)}}" class="btn btn-outline-success mb-2">Edit</a>
                                        <a href="{{route('view_profile', $data->id)}}" class="btn btn-outline-success mb-2">Profile</a>
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

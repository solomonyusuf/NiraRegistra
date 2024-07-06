@extends('shared.layout')
@section('body')
    <?php
    $list = \App\Models\User::orderBy('created_at', 'DESC')->get();
    ?>
    <div class="row">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">All Users </span>

            <div class="mt-3">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#basicModal">
                   Add User
                </button>

                <!-- Modal -->
                <div class="modal fade" id="basicModal" tabindex="-1" style="display: none;" aria-hidden="true">
                    <form action="{{route('create_user')}}" method="post" enctype="multipart/form-data" class="modal-dialog" role="document">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Add User</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class=" mb-3">
                                        <label for="nameBasic" class="form-label">Image</label>
                                        <input name="file" type="file" id="nameBasic" required class="form-control" />
                                    </div>
                                    <div class=" mb-3">
                                        <label for="nameBasic" class="form-label">First Name</label>
                                        <input name="first_name" type="text" id="nameBasic" required class="form-control" />
                                    </div>
                                    <div class=" mb-3">
                                        <label for="nameBasic" class="form-label">Last Name</label>
                                        <input name="last_name" type="text" id="nameBasic" required class="form-control" />
                                    </div>
                                    <div class=" mb-3">
                                        <label for="nameBasic" class="form-label">Email</label>
                                        <input name="email" type="email" id="nameBasic" required class="form-control" />
                                    </div>
                                    <div class=" mb-3">
                                        <label for="nameBasic" class="form-label">Password</label>
                                        <input name="password" type="text" id="nameBasic" required class="form-control" />
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

                            <th> ID</th>
                            <th>User</th>
                            <th>Email</th>
                            <th>Action</th>
                         </tr>
                        </thead>
                        <tbody>
                        @foreach($list as $data)
                            <tr>
                                <td>{{\Illuminate\Support\Str::limit($data->id, 8,'')}}</td>
                                <td>
                                  {{$data->first_name.' '.$data->last_name}}
                                </td>
                                <td>{{$data->email}}</td>
                                <td>
                                    <div class="mt-3">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#basicModal{{\Illuminate\Support\Str::limit($data->id, 8,'')}}">
                                            Edit User
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="basicModal{{\Illuminate\Support\Str::limit($data->id, 8,'')}}" tabindex="-1" style="display: none;" aria-hidden="true">
                                            <form action="{{route('update_user')}}" method="post" enctype="multipart/form-data" class="modal-dialog" role="document">
                                                @csrf
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel1">Edit User</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            @if($data->image)
                                                            <div class=" mb-3">
                                                                <label for="nameBasic" class="form-label">Image</label>
                                                               <img src="{{asset($data->image)}}" style="height:120px;"  />
                                                            </div>
                                                            @endif
                                                            <div class=" mb-3">
                                                                <label for="nameBasic" class="form-label">Image</label>
                                                                <input name="file" type="file" id="nameBasic"  class="form-control" />
                                                            </div>
                                                            <div class=" mb-3">
                                                                <label for="nameBasic" class="form-label">First Name</label>
                                                                <input value="{{$data->first_name}}" name="first_name" type="text" id="nameBasic" required class="form-control" />
                                                                <input value="{{$data->id}}" name="id" type="text" hidden required class="form-control" />
                                                            </div>
                                                            <div class=" mb-3">
                                                                <label for="nameBasic" class="form-label">Last Name</label>
                                                                <input value="{{$data->last_name}}" name="last_name" type="text" id="nameBasic" required class="form-control" />
                                                            </div>
                                                            <div class=" mb-3">
                                                                <label for="nameBasic" class="form-label">Email</label>
                                                                <input  value="{{$data->email}}" name="email" type="email" id="nameBasic" required class="form-control" />
                                                            </div>
                                                            <div class=" mb-3">
                                                                <label for="nameBasic" class="form-label"> New Password</label>
                                                                <input name="change_password" type="text" id="nameBasic"  class="form-control" />
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
                                     <a href="{{route('delete_user',$data->id)}}"   class="btn btn-danger mb-2">Delete</a>
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

@extends('shared.layout')
@section('body')
    <?php
    $list = \App\Models\EducationalResource::orderBy('created_at', 'DESC')->get();
    ?>
  <div class="row">
      <h4 class="py-3 mb-4">
          <span class="text-muted fw-light">Educational </span> Resource

          <div class="mt-3">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#basicModal">
                Upload
              </button>

              <!-- Modal -->
              <div class="modal fade" id="basicModal" tabindex="-1" style="display: none;" aria-hidden="true">
                  <form action="{{route('create_educational')}}" method="post" enctype="multipart/form-data" class="modal-dialog" role="document">
                      @csrf
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel1">Create</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                              <div class="row">
                                  <div class="col mb-3">
                                      <label for="nameBasic" class="form-label">Resource Name</label>
                                      <input  name="name" type="text" id="nameBasic" required class="form-control" placeholder="Enter Name"/>
                                  </div>
                                  <div class="col mb-3">
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

                          <th>Name</th>
                          <th>Link</th>
                          <th>Action</th>

                      </tr>
                      </thead>
                      <tbody>
                      @foreach($list as $data)
                          <tr>
                              <td>{{$data->name}}</td>
                              <td><span class="badge bg-label-warning">{{asset($data->path)}}</span> </td>
                              <td>
                                  <a href="{{route('delete_educational', $data->id)}}" class="btn btn-outline-danger mb-2">Delete</a>
                                  <a href="{{asset($data->path)}}" target="_blank" class="btn btn-outline-success mb-2">View</a>
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

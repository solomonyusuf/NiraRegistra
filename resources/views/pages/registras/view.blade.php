@extends('shared.layout')
@section('body')
    <?php
      $entity = \App\Models\Registra::find($id);
     $documents = \App\Models\Document::where(['registras_id'=> $entity->id])->get();
    $payment = \App\Models\Payment::orderBy('created_at', 'DESC')->get();
    ?>
  <div class="row">
      <h4 class="py-3 mb-4">
          <span class="text-muted fw-light">Registra </span> Account
      </h4>
      <div class="row">
          <!-- User Sidebar -->
          <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
              <!-- User Card -->
              <div class="card mb-4">
                  <div class="card-body">
                      <div class="user-avatar-section">
                          <div class=" d-flex align-items-center flex-column">
                              <img class="img-fluid rounded my-4" src="{{asset($entity->logo)}}" height="110" width="110" alt="User avatar" />
                              <div class="user-info text-center">
                                  <h4 class="mb-2">{{$entity->company_name}}</h4>
                                  @if($entity->accredited)
                                  <span class="badge bg-label-secondary">Accredited</span>
                                  @else
                                  <span class="badge bg-label-secondary">Unaccredited</span>
                                      @endif
                              </div>
                          </div>
                      </div>
                      <div class="d-flex justify-content-center flex-wrap my-4 py-3">
                          <div class="d-flex align-items-start me-4 mt-3 gap-3">
                              <span class="badge bg-label-success p-2 rounded"><i class='bx bx-check bx-sm'></i></span>
                              <div>
                                  <h5 class="mb-0">1.23k</h5>
                                  <span>Domains</span>
                              </div>
                          </div>

                      </div>
                      <h5 class="pb-2 border-bottom mb-4">Details</h5>
                      <div class="info-container">
                          <ul class="list-unstyled">
                              <li class="mb-3">
                                  <span class="fw-medium me-2">Name:</span>
                                  <span>{{$entity->company_name}}</span>
                              </li>
                              <li class="mb-3">
                                  <span class="fw-medium me-2">Email:</span>
                                  <span>{{$entity->email}}</span>
                              </li>
                              <li class="mb-3">
                                  <span class="fw-medium me-2">Status:</span>
                                  @if($entity->accredited)
                                      <span class="badge bg-label-success">Active</span>
                                  @else
                                      <span class="badge bg-label-danger">Unactive</span>
                                  @endif

                              </li>
                              <li class="mb-3">
                                  <span class="fw-medium me-2">Debt:</span>
                                  @if($entity->debt)
                                      <span class="badge bg-label-danger">True</span>
                                  @else
                                      <span class="badge bg-label-success">False</span>
                                  @endif

                              </li>
                              <li class="mb-3">
                                  <span class="fw-medium me-2">Past Names:</span>
                                  <span>{{$entity->previous_names}}</span>
                              </li>
                              <li class="mb-3">
                                  <span class="fw-medium me-2">Phone No:</span>
                                  <span>{{$entity->phone_no}}</span>
                              </li>

                              <li class="mb-3">
                                  <span class="fw-medium me-2">Address:</span>
                                  <span>{{$entity->address}}</span>
                              </li>
                              <li class="mb-3">
                                  <span class="fw-medium me-2">State:</span>
                                  <span>{{$entity->state}}</span>
                              </li>
                              <li class="mb-3">
                                  <span class="fw-medium me-2">Country:</span>
                                  <span>{{$entity->country}}</span>
                              </li>
                          </ul>

                      </div>
                  </div>
              </div>
              <!-- /User Card -->

          </div>
          <!--/ User Sidebar -->


          <!-- User Content -->
          <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">

              <!-- Project table -->
              <div class="card mb-4">
                  <h5 class="card-header">Payment History</h5>
                  <div class="card-body table-responsive mb-3">
                      <table id="table" class="table datatable-project border-top">
                          <thead>
                          <tr>
                              <th>Trnx ID</th>
                              <th>Amount</th>
                              <th>Payment Date</th>
                              <th>Expiry Date</th>
                              <th>Invoice</th>
                          </tr>
                          </thead>
                            <tbody>
                            @foreach($payment as $data)
                                <tr>
                                    <td>{{\Illuminate\Support\Str::limit($data->id, 8,'')}}</td>
                                    <td>{{$data->currency}}</td>
                                    <td>{{$data->amount}}</td>
                                    <td>{{$data->start}}</td>
                                    <td>{{$data->end}}</td>
                                    <td>
                                        <a href="{{asset($data->path)}}" target="_blank" class="btn btn-outline-info mb-2">Invoice</a>
                                     </td>

                                </tr>
                            @endforeach
                            </tbody>
                      </table>
                  </div>
              </div>
              <!-- /Project table -->

              <!-- Activity Timeline -->
              <div class="card mb-4">
                  <h5 class="card-header">Document Credentials</h5>
                  <div class="card-body row">
                      @foreach($documents as $data)
                          <div class="col-md-4">
                              <div class="card h-100">
                                  <img class="card-img-top" src="{{asset('assets/img/pdf.jpg')}}" alt="Card image cap">
                                  <h5 class="card-title text-center">{{$data->name}}</h5>
                                  <a href="{{asset($data->path)}}" class="btn btn-outline-success">View</a>
                              </div>
                          </div>

                      @endforeach

                  </div>

                  </div>
              </div>
              <!-- /Activity Timeline -->


          </div>
          <!--/ User Content -->
      </div>
  </div>
@endsection

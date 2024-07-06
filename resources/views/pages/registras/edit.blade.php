@extends('shared.layout')
@section('body')
    <style>
        #img {

            width:100px;
            height: 90px;
            display: block;
        }
    </style>
    <script>
        function img_pathUrl(input){
            $('#img')[0].src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);
        }
    </script>
    <?php
      $entity = \App\Models\Registra::find($id);
      $documents = \App\Models\Document::where(['registras_id'=> $id])->get();
      $count = 0;
    ?>
    <div class="row">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Edit Profile</span>
        </h4>
        <form action="{{route('put_profile', $id)}}" method="post" enctype="multipart/form-data" class="col-12">
            @csrf
            <div class="nav-align-top mb-4">
                <ul class="nav nav-tabs nav-fill" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-home" aria-controls="navs-justified-home" aria-selected="true">
                            <i class="tf-icons bx bx-user me-1"></i><span class="d-none d-sm-block"> Entity </span>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-messages" aria-controls="navs-justified-messages" aria-selected="false" tabindex="-1">
                            <i class="tf-icons bx bx-folder-plus me-1"></i><span class="d-none d-sm-block"> Documents</span>
                        </button>
                    </li>

                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="navs-justified-home" role="tabpanel">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <img class="img-fluid rounded my-4" id="img">
                                        <br>
                                        <label>
                                            Logo
                                            <small class="text-danger">*  (max 3mb of png, jpg, jpeg)</small>
                                        </label>
                                        <input class="form-control" type="file"  id="img_file" name="logo" onChange="img_pathUrl(this);">
                                    </div>
                                    @if($entity->logo != null)
                                    <div class="col-6 mb-3">
                                        <img src="{{asset($entity->logo)}}" style="height:100px;width:100px;" />
                                    </div>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label>
                                        Company Name
                                        <span class="text-danger">* </span>
                                    </label>
                                    <input value="{{$entity->company_name}}" name="company_name" class="form-control" type="text" required/>
                                    <input value="{{$entity->id}}" name="id" hidden class="form-control" type="text" required/>
                                </div>
                                <div class="mb-3">
                                    <label>
                                        Phone Number
                                        <span class="text-danger">* </span>
                                    </label>
                                    <input value="{{$entity->phone_no}}" name="phone_no" class="form-control" type="text" required/>
                                </div>
                                <div class="mb-3">
                                    <label>
                                        Accredited
                                        <span class="text-danger">* </span>
                                    </label>
                                    <select name="accredited" class="form-control" required>
                                       @if($entity->accredited)
                                        <option selected value="1">Yes</option>
                                        <option value="0">No</option>

                                        @else

                                        <option value="1">Yes</option>
                                        <option selected value="0">No</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>
                                        Country
                                        <span class="text-danger">* </span>
                                    </label>
                                    <select name="country" class="form-control" required>
                                        @if($entity->country == 'Foreign country')
                                        <option selected>Foreign country</option>
                                        @else
                                        @foreach($countries as $data)
                                            @if($entity->country == $data)
                                            <option selected>{{$data}}</option>
                                            @else
                                            <option>{{$data}}</option>
                                            @endif
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>
                                        State
                                        <span class="text-danger">* </span>
                                    </label>
                                    <select name="state" class="form-control" required>
                                        @if($entity->state == 'Foreign state')
                                            <option selected>Foreign state</option>
                                        @else
                                            @foreach($states as $data)
                                                @if($entity->state == $data)
                                                    <option selected>{{$data}}</option>
                                                @else
                                                    <option>{{$data}}</option>
                                                @endif
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>
                                        Email
                                        <span class="text-danger">* </span>
                                    </label>
                                    <input value="{{$entity->email}}" name="email" class="form-control" type="email" required/>
                                </div>
                                <div class="mb-3">
                                    <label>
                                        Address
                                        <span class="text-danger">* </span>
                                    </label>
                                    <textarea name="address" class="form-control"  required>{{$entity->address}}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label>
                                        Previous Names
                                    </label>
                                    <textarea name="previous_names" class="form-control" >{{$entity->previous_names}}</textarea>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="navs-justified-messages" role="tabpanel">
                        <div class="row">
                            @if($documents)
                                @foreach($documents as $data)
                                    <div class="col-md-6 mb-3">
                                        <label>
                                            {{\Illuminate\Support\Str::upper($data->name)}}
                                            <small class="text-danger">* pdf</small>
                                        </label>
                                        <input name="{{$data->name}}" class="form-control mb-2" type="file" id="pdfUpload{{++$count}}" accept="application/pdf">
                                        <iframe src="{{asset($data->path)}}" id="pdfViewer{{$count}}" width="100%" height="600px"></iframe>

                                    </div>

                                @endforeach

                            @endif


                        </div>
                    </div>
                    <div class="mb-4">
                        <button type="submit" class="btn btn-success w-100"> Save Changes </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        document.getElementById('pdfUpload1').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file.type === "application/pdf") {
                const fileReader = new FileReader();
                fileReader.onload = function() {
                    const pdfDataUrl = fileReader.result;
                    document.getElementById('pdfViewer1').src = pdfDataUrl;
                };
                fileReader.readAsDataURL(file);
            } else {
                alert("Please upload a PDF file.");
            }
        });
        document.getElementById('pdfUpload2').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file.type === "application/pdf") {
                const fileReader = new FileReader();
                fileReader.onload = function() {
                    const pdfDataUrl = fileReader.result;
                    document.getElementById('pdfViewer2').src = pdfDataUrl;
                };
                fileReader.readAsDataURL(file);
            } else {
                alert("Please upload a PDF file.");
            }
        });
        document.getElementById('pdfUpload3').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file.type === "application/pdf") {
                const fileReader = new FileReader();
                fileReader.onload = function() {
                    const pdfDataUrl = fileReader.result;
                    document.getElementById('pdfViewer3').src = pdfDataUrl;
                };
                fileReader.readAsDataURL(file);
            } else {
                alert("Please upload a PDF file.");
            }
        });
        document.getElementById('pdfUpload4').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file.type === "application/pdf") {
                const fileReader = new FileReader();
                fileReader.onload = function() {
                    const pdfDataUrl = fileReader.result;
                    document.getElementById('pdfViewer4').src = pdfDataUrl;
                };
                fileReader.readAsDataURL(file);
            } else {
                alert("Please upload a PDF file.");
            }
        });
        document.getElementById('pdfUpload5').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file.type === "application/pdf") {
                const fileReader = new FileReader();
                fileReader.onload = function() {
                    const pdfDataUrl = fileReader.result;
                    document.getElementById('pdfViewer5').src = pdfDataUrl;
                };
                fileReader.readAsDataURL(file);
            } else {
                alert("Please upload a PDF file.");
            }
        });
        document.getElementById('pdfUpload6').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file.type === "application/pdf") {
                const fileReader = new FileReader();
                fileReader.onload = function() {
                    const pdfDataUrl = fileReader.result;
                    document.getElementById('pdfViewer6').src = pdfDataUrl;
                };
                fileReader.readAsDataURL(file);
            } else {
                alert("Please upload a PDF file.");
            }
        });
        document.getElementById('pdfUpload7').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file.type === "application/pdf") {
                const fileReader = new FileReader();
                fileReader.onload = function() {
                    const pdfDataUrl = fileReader.result;
                    document.getElementById('pdfViewer7').src = pdfDataUrl;
                };
                fileReader.readAsDataURL(file);
            } else {
                alert("Please upload a PDF file.");
            }
        });
        document.getElementById('pdfUpload8').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file.type === "application/pdf") {
                const fileReader = new FileReader();
                fileReader.onload = function() {
                    const pdfDataUrl = fileReader.result;
                    document.getElementById('pdfViewer8').src = pdfDataUrl;
                };
                fileReader.readAsDataURL(file);
            } else {
                alert("Please upload a PDF file.");
            }
        });
        document.getElementById('pdfUpload9').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file.type === "application/pdf") {
                const fileReader = new FileReader();
                fileReader.onload = function() {
                    const pdfDataUrl = fileReader.result;
                    document.getElementById('pdfViewer9').src = pdfDataUrl;
                };
                fileReader.readAsDataURL(file);
            } else {
                alert("Please upload a PDF file.");
            }
        });
        document.getElementById('pdfUpload10').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file.type === "application/pdf") {
                const fileReader = new FileReader();
                fileReader.onload = function() {
                    const pdfDataUrl = fileReader.result;
                    document.getElementById('pdfViewer10').src = pdfDataUrl;
                };
                fileReader.readAsDataURL(file);
            } else {
                alert("Please upload a PDF file.");
            }
        });
    </script>
@endsection

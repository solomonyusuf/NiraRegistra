@extends('shared.layout')
@section('body')
    <style>
        #img {

            width:100px;
            height: 90px;
            display: block;
            border:none;
        }
    </style>
    <script>
        function img_pathUrl(input){
            $('#img')[0].src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);
        }
    </script>
<div class="row">
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Create Profile</span>
    </h4>

    <form action="{{route('post_profile')}}" method="post" enctype="multipart/form-data" class="col-12">
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
                <li class="nav-item" role="presentation">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-preview" aria-controls="navs-justified-preview" aria-selected="false" tabindex="-1">
                        <i class="tf-icons bx bx-folder  me-1"></i><span class="d-none d-sm-block"> Preview Documents</span>
                    </button>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="navs-justified-home" role="tabpanel">
                   <div class="row mb-3">
                       <div class="col-md-6">
                           <div class="mb-3">
                               <img class="img-fluid rounded my-4" id="img">
                               <br>
                               <label>
                                   Logo
                                   <small class="text-danger">*  (max 3mb of png, jpg, jpeg)</small>
                               </label>
                               <input class="form-control" type="file" required  id="img_file" name="logo" onChange="img_pathUrl(this);">
                           </div>

                           <div class="mb-3">
                               <label>
                                   Company Name
                                   <span class="text-danger">* </span>
                               </label>
                               <input name="company_name" class="form-control" type="text" required/>
                           </div>
                           <div class="mb-3">
                               <label>
                                   Phone Number
                                   <span class="text-danger">* </span>
                               </label>
                               <input name="phone_no" class="form-control" type="text" required/>
                           </div>
                           <div class="mb-3">
                               <label>
                                   Accredited
                                   <span class="text-danger">* </span>
                               </label>
                               <select name="accredited" class="form-control" required>
                                   <option value="">Select</option>
                                   <option value="1">Yes</option>
                                   <option value="0">No</option>

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
                                   <option>Select</option>
                                   <option>Foreign country</option>
                                   @foreach($countries as $data)
                                       <option>{{$data}}</option>
                                   @endforeach
                               </select>
                           </div>
                           <div class="mb-3">
                               <label>
                                  State
                                   <span class="text-danger">* </span>
                               </label>
                               <select name="state" class="form-control" required>
                                   <option>Select</option>
                                   <option>Foreign state</option>
                                   @foreach($states as $data)
                                       <option>{{$data}}</option>
                                   @endforeach
                               </select>
                           </div>
                           <div class="mb-3">
                               <label>
                                   Email
                                   <span class="text-danger">* </span>
                               </label>
                               <input name="email" class="form-control" type="email" required/>
                           </div>
                           <div class="mb-3">
                               <label>
                                  Address
                                   <span class="text-danger">* </span>
                               </label>
                               <textarea name="address" class="form-control"  required></textarea>
                           </div>
                           <div class="mb-3">
                               <label>
                                  Previous Names
                               </label>
                               <textarea name="previous_names" class="form-control" ></textarea>
                           </div>

                       </div>
                   </div>
                </div>
                <div class="tab-pane fade" id="navs-justified-messages" role="tabpanel">
                 <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>
                                Accreditation Letter
                                <small class="text-danger">* pdf</small>
                            </label>
                            <input name="accreditation" class="form-control mb-2" type="file" id="pdfUpload1" accept="application/pdf">
                        </div>
                        <div class="mb-3">
                            <label>
                                Provisional Accreditation Letter
                                <small class="text-danger">* pdf</small>
                            </label>
                            <input name="provisional_accreditation" class="form-control mb-2" type="file" id="pdfUpload2" accept="application/pdf">
                        </div>
                        <div class="mb-3">
                            <label>
                                Application Form
                                <small class="text-danger">* pdf</small>
                            </label>
                            <input  name="application_form" class="form-control mb-2" type="file" id="pdfUpload3" accept="application/pdf">
                        </div>
                        <div class="mb-3">
                            <label>
                                Registra's Agreement
                                <small class="text-danger">* pdf</small>
                            </label>
                            <input  name="registra_agreement" class="form-control mb-2" type="file" id="pdfUpload4" accept="application/pdf">
                        </div>
                        <div class="mb-3">
                            <label>
                               Membership Form
                                <small class="text-danger">* pdf</small>
                            </label>
                            <input  name="membership_form" class="form-control mb-2" type="file" id="pdfUpload5" accept="application/pdf">
                        </div>
                    </div>
                     <div class="col-md-6">
                         <div class="mb-3">
                             <label>
                                 Bank Reference Letter
                                 <small class="text-danger">* pdf</small>
                             </label>
                             <input  name="bank_reference" class="form-control mb-2" type="file" id="pdfUpload6" accept="application/pdf">
                         </div>
                         <div class="mb-3">
                             <label>
                                 Company Profile
                                 <small class="text-danger">* pdf</small>
                             </label>
                             <input  name="company_profile" class="form-control mb-2" type="file" id="pdfUpload7" accept="application/pdf">
                         </div>
                         <div class="mb-3">
                             <label>
                                 Evidence Of Payment
                                 <small class="text-danger">* pdf</small>
                             </label>
                             <input  name="payment_evidence" class="form-control mb-2" type="file" id="pdfUpload8" accept="application/pdf">
                         </div>
                         <div class="mb-3">
                             <label>
                                CAC Certificate
                                 <small class="text-danger">* pdf</small>
                             </label>
                             <input  name="cac_certificate" class="form-control mb-2" type="file" id="pdfUpload9" accept="application/pdf">
                         </div>
                         <div class="mb-3">
                             <label>
                                Tax Certificate
                                 <small class="text-danger">* pdf</small>
                             </label>
                             <input  name="tax_certificate" class="form-control mb-2" type="file" id="pdfUpload10" accept="application/pdf">
                         </div>
                     </div>
                 </div>
                </div>
                <div class="tab-pane fade" id="navs-justified-preview" role="tabpanel">
                 <div class="row">
                     <div class="col-md-6">
                         <div class="mb-3">
                             <label>
                                 Accreditation Letter
                                 <small class="text-danger">* pdf</small>
                             </label>
                             <iframe id="pdfViewer1" width="100%" height="600px"></iframe>

                         </div>
                         <div class="mb-3">
                             <label>
                                 Provisional Accreditation Letter
                                 <small class="text-danger">* pdf</small>
                             </label>
                             <iframe id="pdfViewer2" width="100%" height="600px"></iframe>

                         </div>
                         <div class="mb-3">
                             <label>
                                 Application Form
                                 <small class="text-danger">* pdf</small>
                             </label>
                             <iframe id="pdfViewer3" width="100%" height="600px"></iframe>

                         </div>
                         <div class="mb-3">
                             <label>
                                 Registra's Agreement
                                 <small class="text-danger">* pdf</small>
                             </label>
                             <iframe id="pdfViewer4" width="100%" height="600px"></iframe>

                         </div>
                         <div class="mb-3">
                             <label>
                                 Membership Form
                                 <small class="text-danger">* pdf</small>
                             </label>
                             <iframe id="pdfViewer5" width="100%" height="600px"></iframe>

                         </div>
                     </div>
                     <div class="col-md-6">
                         <div class="mb-3">
                             <label>
                                 Bank Reference Letter
                                 <small class="text-danger">* pdf</small>
                             </label>
                             <iframe id="pdfViewer6" width="100%" height="600px"></iframe>

                         </div>
                         <div class="mb-3">
                             <label>
                                 Company Profile
                                 <small class="text-danger">* pdf</small>
                             </label>
                             <iframe id="pdfViewer7" width="100%" height="600px"></iframe>

                         </div>
                         <div class="mb-3">
                             <label>
                                 Evidence Of Payment
                                 <small class="text-danger">* pdf</small>
                             </label>
                             <iframe id="pdfViewer8" width="100%" height="600px"></iframe>

                         </div>
                         <div class="mb-3">
                             <label>
                                 CAC Certificate
                                 <small class="text-danger">* pdf</small>
                             </label>
                             <iframe id="pdfViewer9" width="100%" height="600px"></iframe>

                         </div>
                         <div class="mb-3">
                             <label>
                                 Tax Certificate
                                 <small class="text-danger">* pdf</small>
                             </label>
                             <iframe id="pdfViewer10" width="100%" height="600px"></iframe>

                         </div>


                     </div>
                     <div class="mb-4">
                         <button type="submit" class="btn btn-success w-100"> Submit </button>
                     </div>
                 </div>
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

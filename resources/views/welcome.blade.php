<!DOCTYPE html>

<html
    lang="en"
    class="light-style layout-wide customizer-hide"
    dir="ltr"
    data-theme="theme-default"
    >
<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>NiRA Registra Database</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="nira_logo.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{asset('assets/vendor/fonts/boxicons.css')}}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendor/css/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('assets/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('assets/css/demo.css')}}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}" />

    <!-- Helpers -->
    <script src="{{asset('assets/vendor/js/helpers.js')}}"></script>
    <script src="{{asset('assets/js/config.js')}}"></script>
</head>

<body style="background: linear-gradient(to top, #1f1a17  0%, #00923f 100%);">
<!-- Content -->
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <!-- Register -->
            <div class="card">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center" style="margin-left:35px;margin-bottom: -25px;">
                        <a href="{{route('home')}}" class="app-brand-link gap-3">
                          <img src="{{asset('nira_logo.png')}}" style="height:150px;width:500px;" />
                        </a>
                    </div>
                    <!-- /Logo -->
                    <h4 class="mb-2 text-capitalize text-center">
                        <strong>
                            REGISTRA'S DATABASE
                        </strong>
                    </h4>
                    <p class="mb-4 text-center">Please sign-in with your email</p>

                    <form action="{{route('login')}}" method="post" id="formAuthentication" class="mb-3" >
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email </label>
                            <input
                                type="text"
                                class="form-control"
                                id="email"
                                name="email"
                                placeholder="Enter your email "
                                autofocus />
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="password">Password</label>
                                <a href="auth-forgot-password-basic.html">
                                    <small>Forgot Password?</small>
                                </a>
                            </div>
                            <div class="input-group input-group-merge">
                                <input
                                    type="password"
                                    id="password"
                                    class="form-control"
                                    name="password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="password">Access Key</label>
                            </div>
                            <style>
                                .otp-letter-input{
                                    max-width: 100%;
                                    height: 70px;
                                    border: 1px solid #198754;
                                    border-radius:10px;
                                    color: #198754;
                                    font-size: 37px;
                                    text-align: center;
                                    font-weight: bold;
                                }
                            </style>
                            <div class="mb-2">
                                <div class="row pt-4 pb-2">
                                    <div class="col-2">
                                        <input maxlength="1" name="token[]" class="otp-letter-input" type="text" required>
                                    </div>
                                    <div class="col-2">
                                        <input maxlength="1" name="token[]" class="otp-letter-input" type="text" required>
                                    </div>
                                    <div class="col-2">
                                        <input maxlength="1" name="token[]" class="otp-letter-input" type="text" required>
                                    </div>
                                    <div class="col-2">
                                        <input maxlength="1" name="token[]" class="otp-letter-input" type="text" required>
                                    </div>
                                    <div class="col-2">
                                        <input maxlength="1" name="token[]" class="otp-letter-input" type="text" required>
                                    </div>
                                    <div class="col-2">
                                        <input maxlength="1" name="token[]" class="otp-letter-input" type="text" required>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="mb-3">
                            <button class="btn btn-success d-grid w-100" type="submit">Sign in</button>
                        </div>
                    </form>


                </div>
            </div>
            <!-- /Register -->
        </div>
    </div>
</div>

<!-- / Content -->
<script>
    // Get all the input fields
    const inputs = document.querySelectorAll('input');

    // Loop through each input field
    inputs.forEach((input, index) => {
        input.addEventListener('input', function() {
            // Move to the next input field if the current one is filled
            if (input.value.length === input.maxLength) {
                const nextInput = inputs[index + 1];
                if (nextInput) {
                    nextInput.focus();
                }
            }
        });
        // Handle keydown event (for moving backward)
        input.addEventListener('keydown', function(event) {
            // Check if the backspace key is pressed and the input is empty
            if (event.key === 'Backspace' && input.value.length === 0) {
                const prevInput = inputs[index - 1];
                if (prevInput) {
                    prevInput.focus();
                    prevInput.value = prevInput.value.slice(0, prevInput.maxLength - 1); // Optional: delete last character from the previous input
                }
            }
        });
    });


</script>

<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->

<script src="{{asset('assets/vendor/libs/jquery/jquery.js')}}"></script>
<script src="{{asset('assets/vendor/libs/popper/popper.js')}}"></script>
<script src="{{asset('assets/vendor/js/bootstrap.js')}}"></script>
<script src="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
<script src="{{asset('assets/vendor/js/menu.js')}}"></script>

<!-- endbuild -->

<!-- Vendors JS -->

<!-- Main JS -->
<script src="{{asset('assets/js/main.js')}}"></script>

<!-- Page JS -->

</body>
</html>

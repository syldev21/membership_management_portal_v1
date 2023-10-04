@extends('layouts.app')
@section('title', 'Login')

@section('content')
    <div class="container">

        <!-- Outer Row -->
        <div class="row d-flex justify-content-center align-items-center min-vh-100">

            <div class="col-xl-10 col-lg-10 col-md-7">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-5 d-none d-lg-block image-container">
                                <img src="{{ asset('images/vosh_official_logo.jpg') }}" class="img-responsive">
                            </div>
                            <div class="vr"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 bg-primary text-white rounded mb-4 py-2">Welcome Back!</h1>
                                    </div>
                                    <div id="login_alert"></div>
                                    <form class="user" action="#" method="POST" id="login_form">
                                        @csrf
                                        <div class="form-group input-container" style="position: relative;">
                                            <i class="fa fa-user input-icon" style="position: absolute;top: 50%;left: 10px;transform: translateY(-50%);font-size: 16px;color: #aaa;"></i>
                                            <input style="padding-left: 30px; " type="text" class="form-control form-control-user" name="login" id="login" aria-describedby="emailHelp"
                                                   placeholder="Enter User Name/Email" />
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="form-group input-container" style="position: relative;">
                                            <i class="fa fa-sharp fa-solid fa-lock" style="position: absolute;top: 50%;left: 10px;transform: translateY(-50%);font-size: 16px;color: #aaa;"></i>
                                            <input style="padding-left: 30px; " type="password" class="form-control form-control-user" name="password" id="password" aria-describedby="emailHelp"
                                                   placeholder="Password" />
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-user btn-block" id="login_button">
                                                <i class="fas fa-sign-in-alt"></i>&nbsp;&nbsp;&nbsp; Login
                                            </button>
                                        </div>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="/forgot"><span> <i class="fa fa-question-circle"></i></span> Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="/register">
                                            <i class="fa fa-user-plus"></i>
                                            Create an Account!
                                        </a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="/">
                                            <i class="fa fa-handshake"></i>
{{--                                            <i class="fa-solid fa-arrow-rotate-left"></i>--}}
                                            Back to Welcome Page
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection

@section('style')
    <style>
        /* Background Overlay */
        body::after {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.8)), url('{{ asset('images/slide-view/_MG_1445.JPG') }}');
            background-size: cover;
            background-repeat: no-repeat;
            z-index: -1;
        }

        /* Custom button style */
        .btn-primary {
            background-color: blue;
            border-color: blue;
        }

        .btn-primary:hover {
            background-color: navy;
            border-color: navy;
        }

        .btn-secondary {
            background-color: red;
            border-color: red;
        }

        .btn-secondary:hover {
            background-color: darkred;
            border-color: darkred;
        }

        /* Input style */
        .form-control-user {
            border-color: blue;
        }

        /* Text color */
        .text-primary {
            color: blue;
        }

        .text-secondary {
            color: red;
        }
    </style>
@endsection


@section('script')
    <script>
        $(function (){
            // Toggle password visibility
            $('#toggle-password').click(function () {
                var passwordInput = $('#password');
                var passwordFieldType = passwordInput.attr('type');
                if (passwordFieldType === 'password') {
                    passwordInput.attr('type', 'text');
                    $(this).html('<i class="fa fa-eye-slash"></i>');
                } else {
                    passwordInput.attr('type', 'password');
                    $(this).html('<i class="fa fa-eye"></i>');
                }
            });

            $('#login_form').submit(function (e){
                e.preventDefault();
                removeValidationClasses(this);
                $('#login_button').html('Please Wait...');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '/login',
                    method: 'post',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function (res){
                        if(res.status == 200){
                            $('#login_alert').html(showMessage('success', res.messages));
                            window.location = '{{ route('profile') }}'

                        }else {
                            if (res.status == 401){
                                showError('login', res.messages.login);
                                showError('password', res.messages.password);
                            }else {
                                $('#login_alert').html(showMessage('danger', res.messages));
                            }
                            $('#login_button').html('Login');
                        }
                    }
                })
            });
        });
    </script>
@endsection

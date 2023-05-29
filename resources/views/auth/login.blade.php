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
                                <img src="{{ asset('images/login.jpeg') }}" class="img-responsive">
                            </div>
                            <div class="vr"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 bg-primary text-white rounded-circle mb-4">Welcome Back!</h1>
                                    </div>
                                    <div id="login_alert"></div>
                                    <form class="user" action="#" method="POST" id="login_form">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                   name="login" id="login" aria-describedby="emailHelp"
                                                   placeholder="Enter User Name or Email...">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="password" class="form-control form-control-user"
                                                       name="password" id="password" aria-describedby="emailHelp"
                                                       placeholder="Password"><span class="input-group-text" id="toggle-password">
                                                        <i class="fa fa-eye"></i>
                                                    </span>
                                                <div class="input-group-append rounded-right">

                                                </div>
                                            </div>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <div class="">
                                            <input type="submit" value="Login" class="btn btn-primary btn-user btn-block" id="login_button">
                                        </div>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="/forgot">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="/register">Create an Account!</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="/">Back to Welcome Page</a>
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
                $('#login_button').val('Please Wait...');
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
                            window.location = '{{ route('profile') }}';

                        }else {
                            if (res.status == 401){
                                showError('login', res.messages.login);
                                showError('password', res.messages.password);
                            }else {
                                $('#login_alert').html(showMessage('danger', res.messages));
                            }
                            $('#login_button').val('Login');
                        }
                    }
                })
            });
        });
    </script>
@endsection

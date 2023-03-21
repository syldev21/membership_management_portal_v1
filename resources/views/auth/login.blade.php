
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
                            <div class="col-lg-6 d-none d-lg-block" style="display: flex; justify-content: center; align-items: center; overflow: hidden">
                                <img src="{{ asset('images/login.jpeg') }}" class="img-responsive" style="flex-shrink: 0; min-width: 100%; min-height: 100%">
                            </div>
                             <div class="vr"></div>
                            <div class="col-lg-5">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <div id="login_alert"></div>
                                    <form  class="user" action="#" method="POST" id="login_form">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                   name="email" id="email" aria-describedby="emailHelp"
                                                   placeholder="Enter Email Address...">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                   name="password" id="password" aria-describedby="emailHelp"
                                                   placeholder="Password">
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
{{--                                            <a href="/signin" class="btn btn-primary btn-user btn-block">--}}
                                                Login
                                            </a>
                                        </div>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="/forgot">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="/register">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>@endsection

@section('script')
    <script>
        $(function (){
            $('#login_form').submit(function (e){
                e.preventDefault();
                $('#login_button').val('Please Wait');
                $.ajaxSetup({

                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '/login',
                    method: 'POST',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function (res){
                        if (res.status == 400){
                            showError('email', res.messages.email);
                            showError('password', res.messages.password);
                            $('#login_button').val('Login');
                        }else if(res.status == 401){
                            $('#login_alert').html(showMessage('danger', res.message));
                            $('#login_button').val('Login');
                        }else {
                            if (res.status === 200 && res.messages === 'Success'){
                                window.location = '{{ route('profile') }}';
                            }
                        }
                    },
                    error: function (errors){
                        console.log(errors)
                        alert('errors')
                    }
                })
            }) ;
        });
    </script>

@endsection


@extends('layouts.app')
@section('title', 'Register')

@section('content')
    <div class="container">

        <!-- Outer Row -->
        <div class="row d-flex justify-content-center align-items-center min-vh-100">

            <div class="col-xl-8 col-lg-10 col-md-7">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block"style="background-image: url({{ asset('images/login.jpeg') }});background-size: cover; background-repeat: no-repeat;"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <div id="show-success-alert"></div>
                                    <form  class="user" action="#" method="POST" id="register_form">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                   name="name" id="name" aria-describedby="emailHelp"
                                                   placeholder="Enter Your Name...">
                                            <div class="invalid-feedback"></div>
                                        </div>
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
                                            <input type="password" class="form-control form-control-user"
                                                   name="confirm_password" id="confirm_password" aria-describedby="emailHelp"
                                                   placeholder="Confirm Password">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="">
                                            <input type="submit" value="Register" class="btn btn-primary btn-user btn-block" id="register_btn">
                                        </div>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="/">Already have an account?</a>
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
        $(function(){
            $('#register_form').submit(function (e) {
                e.preventDefault();
                // alert('hello bro')
                $('#register_btn').val('Please Wait...');
                $.ajaxSetup({

                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{route('auth.register')}}',
                    method: 'POST',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function (res){
                        if(res.status == 400){
                            showError('name', res.messages.name);
                            showError('email', res.messages.email);
                            showError('password', res.messages.password);
                            showError('confirm_password', res.messages.confirm_password);
                            $('#register_btn').val('Register');
                        }else if(res.status == 200){
                            $('#show-success-alert').html(showMessage('success', res.messages));
                            $('#register_form')[0].reset();
                            removeValidationClasses('#register_form');
                            $('#register_btn').val('Register');
                            window.location.href = "{{route('register')}}"
                        }
                    }
                });
            });
        });
    </script>
@endsection

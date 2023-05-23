@extends('layouts.app')
@section('title', 'Forgot Password')

@section('content')
    <div class="container">

        <!-- Outer Row -->
        <div class="row d-flex justify-content-center align-items-center min-vh-100">

            <div class="col-xl-9 col-lg-10 col-md-7">

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
                                        <h1 class="h4 bg-primary text-white rounded-circle mb-4">Forgot Password!</h1>
                                    </div>
                                    <div id="forgot_alert"></div>
                                    <form  class="user" action="#" method="POST" id="forgot_form">
                                        @csrf
                                        <div class="mb-3 text-secondary">
                                            Enter your email and we will send you a password rest link
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                   name="email" id="email" aria-describedby="emailHelp"
                                                   placeholder="Enter Email Address...">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="">
                                            <input type="submit" value="Reset Password" class="btn btn-primary btn-user btn-block" id="forgot_button">
                                        </div>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="/login">Remember password?</a>
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
        $(function () {
            $('#forgot_form').submit(function (e) {
                e.preventDefault();
                $('#forgot_button').val('Please Wait...');
                $.ajaxSetup({

                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{route('auth.forgot')}}',
                    method: 'POST',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function (res) {
                        if (res.status == 400){
                            showError('email', res.messages.email);
                            $('#forgot_button').val('Reset Password')
                        }else if (res.status == 200){
                            $('#forgot_alert').html(showMessage('success', res.messages));
                            $('#forgot_button').val('Reset Password');
                            removeValidationClasses('#forgot_form');
                            $('#forgot_form')[0].reset();
                        }else {
                            $('#forgot_button').val('Reset Password');
                            $('#forgot_alert').html(showMessage('danger', res.messages));
                        }
                    }
                });
            });
        })
    </script>
@endsection

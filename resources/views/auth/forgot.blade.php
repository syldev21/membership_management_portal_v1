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
                            <div class="col-lg-6 d-none d-lg-block image-container">
                                <img src="{{ asset('images/vosh_official_logo.jpg') }}" class="img-responsive">
                            </div>
                            <div class="vr"></div>
                            <div class="col-lg-5">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 bg-primary text-white rounded mb-4">Forgot Password!</h1>
                                    </div>
                                    <div id="forgot_alert"></div>
                                    <form  class="user" action="#" method="POST" id="forgot_form">
                                        @csrf
                                        <div class="mb-3 text-secondary">
                                            Enter your email and we will send you a password rest link
                                        </div>
                                        <div class="form-group input-containe" style="position: relative;">
                                            <i class="fa fa-duotone fa-envelope" style="position: absolute;top: 50%;left: 10px;transform: translateY(-50%);font-size: 16px;color: #aaa;"></i>
                                            <input style="padding-left: 30px; " type="email" class="form-control form-control-user" name="email" id="email" aria-describedby="emailHelp"
                                                   placeholder="Email" />
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="">
                                            <button type="submit" class="btn btn-primary btn-user btn-block" id="forgot_button">
                                                <i class="fas fa-key"></i>&nbsp;&nbsp;&nbsp; Reset Password
                                            </button>
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
                $('#forgot_button').html('Please Wait...');
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
                            $('#forgot_button').html('Reset Password')
                        }else if (res.status == 200){
                            $('#forgot_alert').html(showMessage('success', res.messages));
                            $('#forgot_button').val('Reset Password');
                            removeValidationClasses('#forgot_form');
                            $('#forgot_form')[0].reset();
                        }else {
                            $('#forgot_button').html('Reset Password');
                            $('#forgot_alert').html(showMessage('danger', res.messages));
                        }
                    }
                });
            });
        })
    </script>
@endsection

@extends('layouts.app')
@section('title', 'Reset Password')

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
                                        <h1 class="h4 text-gray-900 mb-4">Reset Password!</h1>
                                    </div>
                                    <div id="reset_alert"></div>
                                    <form  class="user" action="#" method="POST" id="reset_form">
                                        @csrf
                                        <input type="hidden" name="email" value="{{$email}}">
                                        <input type="hidden" name="token" value="{{$token}}">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                   name="email" id="email" aria-describedby="emailHelp"
                                                   placeholder="Enter Email Address...">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                   name="npassword" id="npassword" aria-describedby="emailHelp"
                                                   placeholder=" New Password">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                   name="cnpassword" id="cnpassword" aria-describedby="emailHelp"
                                                   placeholder="Confirm New Password">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="">
                                            <input type="submit" value="Update Password" class="btn btn-primary btn-user btn-block" id="reset_button">
                                        </div>
                                    </form>
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
            $('#reset_form').submit(function (e) {
                e.preventDefault();
                $('#reset_button').val('Please Wait...')
                $.ajaxSetup({

                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '{{route('auth.reset')}}',
                    method: 'POST',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function (res) {
                        if (res.status == 400){
                            showError('npassword', res.messages.npassword)
                            showError('cnpassword', res.messages.cnpassword)
                            $('#reset_button').val('Update Password')
                        }else if (res.status == 401){
                            $('#reset_alert').html(showMessage('danger', res.messages));
                            removeValidationClasses('#reset_form');
                            $('#reset_button').val('Reset Password');
                        }else{
                            $('#reset_form')[0].reset();
                            $('#reset_alert').html(showMessage('success', res.messages))
                            $('#reset_button').val('Reset Password');
                        }
                    }
                });
            })
        })
    </script>
@endsection


@extends('layouts.app')
@section('title', 'Welcome')

@section('content')
    <div class="page-here">
        <div class="container">

            <!-- Outer Row -->
            <div class="row d-flex justify-content-center align-items-center min-vh-100">

                <div class="col-xl-10 col-lg-10 col-md-7">

                    <div class="card o-hidden border-0 shadow-lg my-5 rounded-5">

                        <div class="card-header p-0" style="background-color: green">
                            <div class="align-content-center"><h3 style="text-align: center; color: white">Welcome to VOSH Church Buru Buru Membership Portal</h3>
                            </div>
                        </div>
                        <div class="card-body p-0" style="background-color:seagreen">
                            <div class="bg-body" style="!important;background-color: white">
                                <div style="float: left; margin-left: 55px; height: 50px">
                                    <button class="bg-success font-weight-bold rounded-5" id="login_page" type="button" style="height: 50px; width: 250px; color: white" value=""><span></span>Login Page</button>
                                </div>
                                <div style="float: right; margin-right: 55px">
                                    <button class="bg-success font-weight-bold rounded-5" id="registration_page" type="button" style="height: 50px; width: 250px; color: white" value=""><span></span>Registration Page</button>
                                </div>

                            </div>
                        </div>
                        <div class="card-footer" style="background-color: green">

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
            $('#login_page').click(function (e){
                e.preventDefault();
                $('#login_page').html('Redirecting to login page...');
                $.ajaxSetup({

                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '/login',
                    method: 'get',
                    success: function (res){
                        $('.page-here').html(res)
                        window.location.href='/login'
                    }
                })
            }) ;
            $('#registration_page').click(function (e){
                e.preventDefault();
                $('#registration_page').html('Redirecting to Registration page...');
                $.ajaxSetup({

                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '/registration-page',
                    method: 'get',
                    success: function (res){
                        $('.page-here').html(res)
                        window.location.href='/register'
                    }
                })
            }) ;
        });
    </script>

@endsection

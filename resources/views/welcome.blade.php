
@extends('layouts.app')
@section('title', 'Welcome')

@section('content')
    <div class="page-here">
        <div class="container">

            <!-- Outer Row -->
            <div class="row d-flex justify-content-center align-items-center min-vh-100">

                <div class="col-xl-10 col-lg-10 col-md-7">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-header p-0  bg-success">
                            <div class="align-content-center"><h3 style="text-align: center; color: white">Welcome to VOSH Church Buru Buru Membership Portal</h3>
                                <div class="card-body p-0">
                                    <div class="card-body p-0">
                                        <div class="bg-body">
                                            <div style="float: left; margin-left: 55px; height: 50px">
                                                <input class="bg-primary rounded-5" id="login_page" type="button" style="height: 50px; width: 250px; color: white" value="Login Page">
                                            </div>
                                            <div style="float: right; margin-right: 55px">
                                                <input class="bg-primary rounded-5" id="registration_page" type="button" style="height: 50px; width: 250px; color: white" value="Registration Page">
                                            </div>

                                        </div>
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
            $('#login_page').click(function (e){
                e.preventDefault();
                $('#login_page').val('Redirecting to login page...');
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
                $('#registration_page').val('Redirecting to Registration page...');
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

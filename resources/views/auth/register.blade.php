
@extends('layouts.app')
@section('title', 'Register')

@section('content')
    <div class="container">

        <!-- Outer Row -->
        <div class="row d-flex justify-content-center align-items-center min-vh-100">

            <div class="col-xl-10 col-lg-10 col-md-7">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-7 d-none d-lg-block" style="display: flex; justify-content: center; align-items: center; overflow: hidden">
                                <img src="{{ asset('images/login.jpeg') }}" class="img-responsive" style="flex-shrink: 0; min-width: 100%; min-height: 100%">
                            </div>
                            <div class="vr"></div>
                            <div class="col-lg-4">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Create an Account</h1>
                                    </div>
                                    <div id="show-success-alert"></div>
                                    <form  class="user" action="#" method="POST" id="register_form">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                   name="surName" id="surName" aria-describedby="emailHelp"
                                                   placeholder="Surname...">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                         <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                   name="otherNames" id="otherNames" aria-describedby="emailHelp"
                                                   placeholder="Other Names...">
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
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="terms" name="terms" data-bs-toggle="modal" data-bs-target="#termsModal" value="">
                                                <label class="custom-control-label" for="terms">Agree with terms and conditions</label>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="">
                                            <input type="submit" value="Register" class="btn btn-primary btn-user btn-block" id="register_btn">
                                        </div>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="/login">Already have an account?</a>
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
        {{--Terms Modal--}}

        <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-warning">

                        <h5 class="fw-bold text-white" id="exampleModalLabel">Terms and Conditions for MOSH Church Buru Buru Membership Portal Registration</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <input type="" id="delete_user_id" value="" hidden="hidden">
                    <div id="terms_alert"></div>
                    <div class="invalid-feedback"></div>
                    <div class="modal-body">
                        <form method="POST" id="terms_form">
                            @csrf
                            <div class="my-2">
                                <ol class="fw-bold text-white bg-primary">
                                    <li>
                                        VOSH Church Buru Buru will hold your data as a data processor
                                    </li>
                                    <li>
                                        We use the information we collect from you, to understand our members better
                                    </li>
                                    <li>
                                        We use the information to have accurate number of members in our records
                                    </li>
                                    <li>
                                        The information about you will help us do follow-up on a member who stays away for an alarming period
                                    </li>
                                    <li>
                                        We use the information to identify those who do not belong to any cell group and allocate them appropriately
                                    </li>
                                </ol>
                            </div>
                            <div class="form-group bg-light">
                                <div class="form-check text-success">
                                    <input type="radio" class="form-check-input" id="accept_radio" name="review_radio" value="1">Accept
                                    <label class="form-check-label" for="accept_radio"></label>
                                </div>
                                <div class="form-check text-danger">
                                    <input type="radio" class="form-check-input" id="reject_radio" name="review_radio" value="2">Reject
                                    <label class="form-check-label" for="reject_radio"></label>
                                </div>
                                <div class="invalid-feedback"></div>
                                <div class="invalid-review-feedback"></div>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button style="!important; float: left" type="button" class="btn btn-secondary rounded-5" data-bs-dismiss="modal">Close</button>
                        <button style="!important; float: right" type="button" class="btn btn-warning rounded-5 accept_btn" data-bs-dismiss="" data-toggle="tooltip" data-placement="bottom" title="Make sure you selected an option before clicking this button!"><span class="review_icon"><i class="fa fa-check"></i></span>Submit Review</button>
                    </div>
                </div>
            </div>
        </div>
float: left
    </div>@endsection

@section('script')
    <script>
        $(function(){
            $('input[type=radio][name=review_radio]').prop('checked', false);
            $('input[type=radio][name=review_radio]').on('change', function() {
                if($(this).val()== 1){
                    $('.accept_btn').html('Accept')
                    $('.accept_btn').removeClass('btn-danger')
                    $('.accept_btn').removeClass('btn-warning')
                    $('.accept_btn').addClass('btn-success')
                }else {
                    $('.accept_btn').html('Reject')
                    $('.accept_btn').removeClass('btn-warning')
                    $('.accept_btn').removeClass('btn-success')
                    $('.accept_btn').addClass('btn-danger')
                }
            })

            $('.accept_btn').click(function (e){
                e.preventDefault()
                $('.accept_btn').val('Submitting...')
                $.ajaxSetup({

                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '/review-terms',
                    method: 'POST',
                    data: $('#terms_form').serialize(),
                    dataType: 'json',
                    success: function (response){
                        if (response.status == 400){
                            showError('review_radio', response.messages.review_radio);
                            $('.invalid-review-feedback').html(showMessage('danger', response.messages))
                            $('.accept_btn').val('Submit Review')
                        }else{
                            if (response.status == 200){
                                $('#terms_alert').html(showMessage('success', response.messages));
                                $('#terms').prop('checked', true)
                                $('#terms').val(1)
                                $('.accept_btn').val('Submit Review')
                            }else {
                                $('#terms_alert').html(showMessage('warning', response.messages));
                                $('#terms').prop('checked', false)
                                $('.accept_btn').val('Submit Review')
                            }

                            setTimeout(function() {
                                $('#termsModal').modal('hide')
                            }, 1000);
                        }
                        $('#terms_form')[0].reset();
                    }
                })
            })

            $('#register_form').submit(function (e) {
                e.preventDefault();
                $('#register_btn').val('Please Wait...');
                $.ajaxSetup({

                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '/register',
                    method: 'post',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function (res){
                        if(res.status == 400){
                            showError('surName', res.messages.surName);
                            showError('otherNames', res.messages.otherNames);
                            showError('email', res.messages.email);
                            showError('password', res.messages.password);
                            showError('confirm_password', res.messages.confirm_password);
                            showError('terms', res.messages.terms);
                            $('#register_btn').val('Register');
                        }
                        else if(res.status == 200){
                            $('#show-success-alert').html(showMessage('success', res.messages));
                            $('#register_form')[0].reset();
                            removeValidationClasses('#register_form');
                            $('#register_btn').val('Register');
                            {{--window.location.href = "{{route('register')}}"--}}
                        }
                    }
                });
            });
        });
    </script>
@endsection

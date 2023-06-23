
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
                            <div class="col-lg- d-none d-lg-block image-container">
                                <img src="{{ asset('images/vosh_official_logo.jpg') }}" class="img-responsive">
                            </div>
                            <div class="vr bg-warning"></div>
                            <div class="col-lg-7">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 rounded mb-4 bg-primary text-white">Create an Account</h1>
                                    </div>
                                    <div id="show-success-alert"></div>
                                    <form  class="user" action="#" method="POST" id="register_form">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group input-container col-lg-4" style="position: relative;">
                                                <i class="fa fa-sharp fa-solid fa-user" style="position: absolute;top: 50%;left: 10px;transform: translateY(-50%);font-size: 16px;color: #aaa;"></i>
                                                <input style="padding-left: 30px; " type="text" class="form-control form-control-user" name="firstName" id="firstName" aria-describedby="emailHelp"
                                                       placeholder="First Name..." />
                                                <div class="invalid-feedback"></div>
                                            </div>

                                            <div class="form-group input-container col-lg-8" style="position: relative;">
                                                <i class="fa fa-sharp fa-solid fa-user" style="position: absolute;top: 50%;left: 10px;transform: translateY(-50%);font-size: 16px;color: #aaa;"></i>
                                                <input style="padding-left: 30px; " type="text" class="form-control form-control-user" name="otherNames" id="otherNames" aria-describedby="emailHelp"
                                                       placeholder="Other Names" />
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="form-group input-containe" style="position: relative;">
                                            <i class="fa fa-duotone fa-envelope" style="position: absolute;top: 50%;left: 10px;transform: translateY(-50%);font-size: 16px;color: #aaa;"></i>
                                            <input style="padding-left: 30px; " type="text" class="form-control form-control-user" name="unique_id" id="unique_id" aria-describedby="emailHelp"
                                                   placeholder="Email or Phone" />
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group input-container col-lg-6" style="position: relative;">
                                                <i class="fa fa-sharp fa-solid fa-lock" style="position: absolute;top: 50%;left: 10px;transform: translateY(-50%);font-size: 16px;color: #aaa;"></i>
                                                <input style="padding-left: 30px; " type="password" class="form-control form-control-user" name="password" id="password" aria-describedby="emailHelp"
                                                       placeholder="Password" />
                                                <div class="invalid-feedback"></div>
                                            </div>
                                            <div class="form-group input-container col-lg-6" style="position: relative;">
                                                <i class="fa fa-sharp fa-solid fa-lock" style="position: absolute;top: 50%;left: 10px;transform: translateY(-50%);font-size: 16px;color: #aaa;"></i>
                                                <input style="padding-left: 30px; " type="password" class="form-control form-control-user" name="confirm_password" id="confirm_password" aria-describedby="emailHelp"
                                                       placeholder="Confirm Password" />
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="terms" name="terms" data-bs-toggle="modal" data-bs-target="#termsModal" value="">
                                                <label class="custom-control-label" for="terms">Agree with terms and conditions</label>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="">
                                            <button type="submit" class="btn btn-primary btn-user btn-block" id="register_btn">
                                                <i class="fas fa-user-plus"></i>&nbsp;&nbsp;&nbsp; Register
                                            </button>
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
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header bg-success">

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
                                <h5 class="text-primary fw-bolder">In line with Chapter 3 of the Revised VOSH Constitution 2018 on Membership:</h5>
                                <ol class="text-dark fw-bolder" style="">
                                    <li>
                                        <span class="fw-bolder">Membership: </span>Shall be open to any person, subject to being born again and adherence to statement of faith irrespective of nationality, race, and color. However, minors will automatically become members up to age of eighteen so long as their parents are church members.
                                    </li>
                                    <li>
                                        <span class="fw-bolder">Full Membership: </span>Shall be open to all who are born again, Spirit filled, registered as members and adhere to statement of faith, attend the church regularly and actively participate in church activities.
                                    </li>
                                    <li>
                                       <span class="fw-bolder">Membership by birth and or adoption: </span> Open to all minors whose parents are members until age eighteen and all legally adopted persons, upon which he/she shall be required to make personal commitment, confess the faith and adhere to the statement of faith to become a full member. 1 cor.7:14.Gen 18:19
                                    </li>
                                    <li>
                                        <span class="fw-bolder">Qualifications for Membership include:</span> <br>
                                        <ol type="a">
                                            <li>Shall be a Christian who has publicly confessed Jesus Christ as Lord and filled with the power of Holy Ghost being the ultimate rule and standard of faith and life of the Church. (John 3:3-8; Romans 10:9)</li>
                                            <li>Shall be required to fill a commitment form approved by a qualified church minister.</li>
                                            <li>Shall be baptized in water by immersion. (Acts 8:34-36; Mark 1:8)</li>
                                            <li>Shall subscribe to the Statement of Faith and policies of the Church. (Titus 1:1)</li>
                                        </ol>
                                    </li>
                                    <li>
                                        <span class="fw-bolder">Conduct:</span> <br>
                                        <ol type="a">
                                            <li>Shall live a lifestyle that is consistent with the Scriptures. II Timothy 3:15-17</li>
                                            <li>All members shall be modest and decent in their dressing in a manner that brings honor to God. Deuteronomy 22:5; I Peter 3:3-6; I Corinthians 11:5-16</li>
                                            <li>Shall regularly attend and participate in Church services, all types of giving and other activities. Hebrews 10:25; Acts 2:42. Mal 3:10, Numbers 29:39</li>
                                            <li>Submission to those in spiritual authority. Hebrews 13:17.Roms  13:1, Ephesians 6:5</li>
                                        </ol>
                                    </li>
                                    <li>
                                        <span class="fw-bolder">Records of Membership:</span> <br>
                                        <p>There shall be a database at all levels containing the following details; Members’ name, National Identity card/passport number, Telephone number, emails, Physical address, gender, Status and serial number(Malachi 3:16). The database will be updated quarterly depending on the following;</p>
                                        <ol type="a">
                                            <li>Death of members</li>
                                            <li>Backslidden members</li>
                                            <li>Members joining other denominations</li>
                                            <li>Newly saved members</li>
                                        </ol>
                                    </li>
                                    <li>
                                        <span class="fw-bolder">Rights and Responsibilities of a Full Member</span> <br>
                                        <ol type="a">
                                            <li>Entitled to attend all public Christian worship services conducted by the Church</li>
                                            <li>To take part regularly in sacred and ecclesiastical services in the Church e.g. Holy Communion, Baptism, Wedding and burials.</li>
                                            <li>To take part in spiritual nourishment, communication and relevant information issued by the Church.</li>
                                            <li>Expected to contribute financially for the support of the Church activities, programs and projects.</li>
                                            <li>To access and receive a written acknowledgement of financial contributions made to the Church.</li>
                                            <li>To access relevant ecclesiastical documents.</li>
                                            <li>Expected to serve the Church in the elective or appointed position by the leader.</li>
                                        </ol>
                                    </li>
                                </ol>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer bg-success">
                        <button id="rejected_review" value="0" style="!important; float: left" type="button" class="btn btn-secondary rounded-5 accept_btn" data-bs-dismiss="modal" data-toggle="tooltip" data-placement="bottom" title="You wil not be able to continue with registration if you close without accepting the terms and conditions!"><span class="review_icon"><i class=""></i></span>Close</button>
                        <button id="accepted_review" value="1" style="!important; float: right" type="button" class="btn btn-primary rounded-5 accept_btn" data-bs-dismiss="" data-toggle="tooltip" data-placement="bottom" title="Make sure you read and understood the terms and conditions before clicking this button!"><span class="review_icon"><i class="fa fa-check"></i></span>Accept</button>
                    </div>
                </div>
            </div>
        </div>
float: left
    </div>@endsection

@section('script')
    <script>
        $(function(){
            $('#terms').prop('checked', false)
            $('.accept_btn').click(function (e){
                e.preventDefault()
                let review_value = $(this).val();
                if($(this).attr('id') == 'accepted_review'){
                    $(this).html('Submitting Review...')
                }
                $.ajaxSetup({

                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '/review-terms',
                    method: 'POST',
                    data: {
                        review_value:review_value
            },
                    dataType: 'json',
                    success: function (response){
                            if (response.status == 200) {
                                $('#terms_alert').html(showMessage('success', response.messages));
                                $('#terms').prop('checked', true)
                                $('#terms').val(1)
                                $('#accepted_review').html('Accept')
                                }else {
                                    $('#terms_alert').html(showMessage('warning', response.messages));
                                    $('#terms').prop('checked', false)
                                    $('.accept_btn').val('Submit Review')
                                }

                                setTimeout(function () {
                                    $('#terms_alert').empty()
                                    $('#termsModal').modal('hide')
                                }, 1000);
                    }
                })
            })

            $('#register_form').submit(function (e) {
                e.preventDefault();
                $('#register_btn').html('Please Wait...');
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
                        if(res.status == 200){
                            $('#show-success-alert').html(showMessage('success', res.messages));
                            $('#register_form')[0].reset();
                            removeValidationClasses('#register_form');
                            $('#register_btn').html('Register');
                        }
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            var errors = xhr.responseJSON.messages;
                            showError('firstName', errors.firstName);
                            showError('otherNames', errors.otherNames);
                            showError('unique_id', errors.unique_id);
                            showError('password', errors.password);
                            showError('confirm_password', errors.confirm_password);
                            showError('terms', errors.terms);
                        } else {
                            // Handle other error responses
                        }
                    }
                });
            });
        });
    </script>
@endsection

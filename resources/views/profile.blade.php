@extends('layouts.master')
@section('title', 'Membership')
@section('content')
{{--    <div class="container">--}}
        <div class="row my-5 table table-responsive">
            <div class="col-lg-12" style="background-color: #0a58ca; margin: auto">
                <div class="card shadow" id="dashboar">
                    <div class="card-header d-flex justify-content-between align-items-center bg-light">
                        <h2 class="text-secondary fw-bold">User Profile</h2>
                        <a href="{{route('auth.logout')}}" class="btn btn-dark">Logout</a>
                    </div>
                    <div class="card-body p-1">
                        <div id="profile_alert"></div>
                        <div class="row">
                             <div class="col-lg-4 px-5 text-center" style="border-right: 1px solid #999;">
                                 @php
                                         $picture = isset($userInfo->picture) ?? asset('images/vosh_avator.jpg');
                                 @endphp

                                 <img src="storage/images/{{$picture}}" id="image_preview" class="img-fluid rounded-circle img-thumbnail" width="200">
                                 <div>
                                     <label class="fw-bold">Change Profile Picture</label>
                                     <input type="file" for="picture" name="picture" class="form-control rounded-pill" id="picture">
                                     </div>
                                     <div class="row">
                                         <div class="my-2">
                                             <input type="hidden"  class="btn btn-primary rounded-0 float-left" value="Edit Profile" id="edit_profile_button">
                                         </div>
                                     </div>
                             </div>

                            <input type="hidden" name="user_id" id="user_id" value="{{isset($userInfo) ?? ''}}">
                            <div class="col-lg-8 px-5">
                                <form action="#" method="POST" id="profile_form" class="accordion-flush self_edit">
                                    @csrf
                                    <div class="row">
                                        <div class="my-2">
                                            <input type="button" hidden="hidden" class="btn btn-primary rounded-0 float-end" value="Edit Profile" id="edit_profile_btn">
                                        </div>
                                    </div>

                                    <meta name="csrf-token" content="{{ csrf_token() }}" />
                                    <div class="my-2">
                                        <label  class="fw-bold"  for="name">Full Name</label>
                                        <input type="text" disabled name="name" class="form-control rounded-0 profile" id="" value="{{$userInfo->name??''}}">
                                        <input type="text" hidden="hidden" name="name" class="form-control rounded-0 profile_edit" id="name" value="{{$userInfo->name??''}}">
                                    </div>
                                    <div class="my-2">
                                        <label  class="fw-bold" for="name">Email</label>
                                        <input type="email" disabled name="email" class="form-control rounded-0 profile" id="" value="{{$userInfo->email??''}}">
                                        <input type="email" hidden name="email" class="form-control rounded-0 profile_edit" id="email" value="{{$userInfo->email??''}}">
                                    </div>
                                    <div class="row">
                                        <div class="col-lg">
                                            <label  class="fw-bold" for="gender">Gender</label>
                                            <input type="text" disabled name="gender" class="form-control rounded-0 profile" id="" value={{config('membership.statuses.gender.1')}}>
                                            <select name="gender" hidden="hidden" id="gender" class="form-select rounded-0 profile_edit">
                                                <option selected disabled>--Select</option>
                                                @foreach(config('membership.gender') as $gender)
                                                    <option value="{{$gender['id']}}" >
                                                    {{$gender['text']}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="col-lg profile">
                                            <label  class="fw-bold" for="dob" class="profile">Age</label>
                                            <input type="text" disabled  name="dob" class="form-control rounded-0 profile" id="" value="{{isset($userInfo->dob) ? \Carbon\Carbon::parse($userInfo->dob)->age: ''}}">
                                        </div>
                                        <div class="col-lg profile_edit"  hidden="hidden">
                                            <label  class="fw-bold" for="dob" class="profile_edit">Date of Birth</label>
                                            <input type="date"  name="dob" class="form-control rounded-0 profile_edit" id="dob" value="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg">
                                            <label  class="fw-bold hide-status" for="phone">Phone</label>
                                            <input type="tel" disabled  name="phone" class="form-control rounded-0 profile" id="" value="{{$userInfo->phone?? ''}}">
                                            <input type="tel" hidden="hidden"  name="phone" class="form-control rounded-0 profile_edit hide-status hide-field" id="phone" value="{{isset(auth()->user()->phone)?auth()->user()->phone:''}}">
                                        </div>
                                        <div class="col-lg">
                                            <label  class="fw-bold hide-status" for="marital_status">Marital Status</label>

                                            <?php
                                            if (isset($userInfo->marital_status_id)){
                                                $marital_status_id = is_numeric($userInfo->marital_status_id) ? config('membership.statuses.marital_status')[$userInfo->marital_status_id] : $userInfo->marital_status_id;
                                            }else{
                                                $marital_status_id = '';
                                            }
                                            ?>

                                            <input type="text" disabled name="marital_status_id" class="form-control rounded-0 profile" id="" value="{{$marital_status_id}}">


                                            <select hidden="hidden" name="marital_status" id="marital_status" class="form-select rounded-0 profile_edit hide-status hide-field">
                                                <option selected disabled>--Select</option>
                                                @foreach(config('membership.marital_status') as $marital_status)
                                                    <option value="{{$marital_status['id']}}" >
                                                        {{$marital_status['text']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg">
                                            <label  class="fw-bold" for="estate">Sub County</label>

                                            <input type="text" disabled name="estate" class="form-control rounded-0 profile" id="" value="{{isset($userInfo->estate_id) ? config('membership.statuses.sub_county')[$userInfo->estate_id]['text'] : ''}}">

                                            <select hidden="hidden" name="estate" id="estate" class="form-select rounded-0 profile_edit">
                                                <option selected disabled>--Select</option>
                                                @foreach(config('membership.sub_county') as $sub_county)
                                                    <option value="{{$sub_county['id']}}" >
                                                    {{$sub_county['text']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg hide_ward">
                                            <label  class="fw-bold" for="ward">Ward</label>
                                            <?php
                                                $ward = 1;
                                            ?>
                                            <input type="text" disabled name="ward" class="form-control rounded-0 profile" id="" value="{{isset($userInfo->estate_id) ? config('membership.statuses.sub_county')[$userInfo->estate_id]['text'] : ''}}">

                                            <select hidden="hidden" name="ward" id="estate" class="form-select rounded-0 profile_edit">
                                                <option selected disabled>--Select</option>
                                                <?php
                                                    $wards = [1, 2, 3, 4, 5, 6];
                                                ?>
                                                @foreach($wards as $sub_county)
                                                    <option value="{{$sub_county}}" >
                                                    {{$sub_county}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg">
                                            <label  class="fw-bold" for="cell_group">Cell Group</label>

                                            <input type="text" disabled name="cell_group" class="form-control rounded-0 profile" id="" value="{{isset($userInfo->cell_group_id) ? config('membership.statuses.cell_group')[$userInfo->cell_group_id] : ''}}">
                                            <select hidden="hidden" name="cell_group" id="cell_group" class="form-select rounded-0 profile_edit">
                                                <option selected disabled>--Select</option>
                                                @foreach(config('membership.cell_group') as $cell_group)
                                                    <option value="{{$cell_group['id']}}" >
                                                    {{$cell_group['text']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">


                                        <div class="col-lg">
                                            <label  class="fw-bold" for="education_level">Level of Education</label>
                                            <input type="text" disabled name="education_level" class="form-control rounded-0 profile" id="" value="{{isset($userInfo->education_level_id) ? config('membership.statuses.level_of_education')[$userInfo->education_level_id]  : ''}}">

                                            <select hidden="hidden" name="education_level" id="education_level" class="form-select rounded-0 profile_edit">
                                                <option selected disabled>--Select</option>
                                                @foreach(config('membership.level_of_education') as $level_of_education)
                                                    <option value="{{$level_of_education['id']}}" >
                                                        {{$level_of_education['text']}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-lg">
                                            <label  class="fw-bold" for="born_again">Born Again</label>
                                            <input type="text" disabled name="born_again" class="form-control rounded-0 profile" id="" value="{{isset($userInfo->born_again_id) ? config('membership.statuses.flag')[$userInfo->born_again_id]  : ''}}">

                                            <select hidden="hidden" name="born_again" id="born_again" class="form-select rounded-0 profile_edit">
                                                <option selected disabled>--Select</option>
                                                @foreach(config('membership.flag') as $flag)
                                                    <option value="{{$flag['id']}}" >
                                                    {{$flag['text']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg">
                                            <label  class="fw-bold" for="leadership_status">In Leadership?</label>

                                            <input type="text" disabled name="leadership_status" class="form-control rounded-0 profile" id="" value="{{isset($userInfo->leadership_status_id) ? config('membership.statuses.flag')[$userInfo->leadership_status_id]: ''}}">
                                            <select hidden="hidden" name="leadership_status" id="leadership_status" class="form-select rounded-0 profile_edit">
                                                <option selected disabled>--Select</option>
                                                @foreach(config('membership.flag') as $flag)
                                                    <option value="{{$flag['id']}}" >
                                                    {{$flag['text']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg" hidden="hidden">
                                            <label  class="fw-bold" for="ministry">Current Ministry</label>
                                            <input type="text" disabled name="ministry" class="form-control rounded-0 profile" id="" value="{{isset($userInfo->ministry_id) ? config('membership.statuses.ministry')[$userInfo->ministry_id] : ''}}">

                                            <select hidden="hidden" name="ministry" id="ministry" class="form-select rounded-0 profile_edit">
                                                <option selected disabled>--Select</option>
                                                @foreach(config('membership.ministry') as $ministry)
                                                    <option value="{{$ministry['id']}}" >
                                                    {{$ministry['text']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row profile_edit" hidden="hidden">
                                        <label  class="fw-bold" for="leadership_status">Current Ministry/ Ministry of Interest (Tick all the applicable options)</label>
                                        @foreach(config('membership.ministry') as $ministry)
                                            <div class="form-check col-lg">
                                                <input type="checkbox" class="check_box" id="check_box" name="check_box[]" value="{{$ministry['id']}}">
                                                <label  class="" class="form-check-label" for="check1">{{$ministry['text']}}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="row">
                                        <div class="col-lg">
                                            <label  class="fw-bold hide-status" for="occupation">Occupation/ Specialization</label>
                                            <?php
                                            if (isset($userInfo->occupation_id)){
                                                $occupation = is_numeric($userInfo->occupation_id) ? config('membership.statuses.occupation')[$userInfo->occupation_id] : $userInfo->occupation_id;
                                            }else{
                                                $occupation = '';
                                            }
                                            ?>
                                            <input type="text" disabled name="occupation" class="form-control rounded-0 profile" id="" value="{{$occupation}}">

                                            <select hidden="hidden" name="occupation" id="occupation" class="form-select rounded-0 profile_edit hide-status hide-field">
                                                <option selected disabled>--Select</option>
                                                @foreach(config('membership.occupation') as $occupation)
                                                    <option value="{{$occupation['id']}}" >
                                                    {{$occupation['text']}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-lg">
                                            <label  class="fw-bold hide-status" for="employment_status">Employment Status</label>


                                            <?php
                                            if (isset($userInfo->employment_status_id)){
                                                $employment_status_id = is_numeric($userInfo->employment_status_id) ? config('membership.statuses.employment_status')[$userInfo->employment_status_id] : $userInfo->employment_status_id;
                                            }else{
                                                $employment_status_id = '';
                                            }
                                            ?>

                                            <input type="text" disabled name="employment_status" class="form-control rounded-0 profile" id="" value="{{$employment_status_id}}">

                                            <select hidden="hidden" name="employment_status" id="employment_status" class="form-select rounded-0 profile_edit hide-status hide-field">
                                                <option selected disabled>--Select</option>
                                                @foreach(config('membership.employment_status') as $employment_status)
                                                    <option value="{{$employment_status['id']}}" >
                                                        {{$employment_status['text']}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>

                                    <div class="my-2">
                                        <input type="submit" hidden="hidden" class="btn btn-primary rounded-0 float-end" value="Update Profile" id="profile_btn">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
{{--    </div>--}}
@endsection

@section('script')
    <script>
        $(function (){
            if ($('#add_user_id').val() == 'admin'){
                $('.profile').hide();
                $('.profile_edit, #profile_btn').removeAttr('hidden');
            }
            $('.hide_ward').hide()
            $("#picture").change(function (e){
                e.preventDefault()
                // const file = $('input[type=file]')[0].files[0];
                const file = e.target.files[0];
                let url = window.URL.createObjectURL(file);
                $("#image_preview").attr('src', url);
                let fd = new FormData();
                fd.append('picture', file);
                fd.append('user_id', $("#user_id").val());
                fd.append('_token', '{{ csrf_token() }}');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{route('profile.image')}}',
                    method: 'POST',
                    data: fd,
                    cache: false,
                    processData: false,
                    contentType: false,
                    // dataType: 'json',
                    success: function (response) {
                        if (response.status == 200){
                            $("#profile_alert").html(showMessage('Success', response.messages));
                            $("#picture").val();
                        }
                    }
                });
            });
            $('body').on('submit', '#profile_form', function (e){
                e.preventDefault();
                let id = $('#user_id').val();
                $('#profile_btn').val('Updating...');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '{{route('profile.update')}}',
                    method: 'post',
                    data: $(this).serialize()+ `&id=+${id}`,
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 200){
                            console.log(response);
                            $('#profile_alert').html(showMessage('success', response.messages));
                            $('#profile_btn').val('Update');
                            $('.profile').show();
                            $('.profile_edit, #profile_btn').hide()

                            setTimeout(function() {
                                window.location.href = "{{route('profile')}}"
                            }, 1000);
                        }
                    }
                });
            });
            $('#edit_profile_button').click(function (e) {
                e.preventDefault();
                $('.profile').hide();
                $('.profile_edit, #profile_btn').removeAttr('hidden');
            });

            $('.admin_dashboard').click(function (e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.get(
                    '{{route('admin.dashboard')}}',
                    function (data) {
                        $('#dashboar').html(data)

                    }
                );
            })


            $('body').on('change', '#dob', function (e) {
                e.preventDefault();
                var dob = $(this).val();
                var year = Number(dob.substr(0, 4));
                var month = Number(dob.substr(5, 2)) - 1;
                var day = Number(dob.substr(8, 2));

                var today = new Date();
                var age = today.getFullYear() - year;
                if (today.getMonth() < month || (today.getMonth() == month && today.getDate() < day)) {
                    age--;
                }
                if (age<18){
                    $('.hide-status').hide()
                }else {
                    $('.hide-status').show()
                }
            })

            $('body').on('change', '#estate', function (e) {
                $('.hide_ward').show()
                e.preventDefault()
                let sub_count = $(this).val();
                {{--alert({{config('membership.statuses.sub_county')[$ward]['text']}})--}}
            })
        });

    </script>

@endsection

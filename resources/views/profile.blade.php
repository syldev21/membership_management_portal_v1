@extends('layouts.master')
@section('title', 'Membership')
@section('content')
{{--    <div class="container">--}}
        <div class="row my-5 table table-responsive">
            <div class="col-lg-12" style="background-color: #0a58ca; margin: auto">
                <div class="card shadow" id="dashboar">
                    <div class="card-header d-flex justify-content-between align-items-center bg-light">
                        <h2 class="text-secondary fw-bold">User Profile</h2>
                        <div class="row">
                            <div class="my-2">
                                <button type="button" class="btn btn-primary rounded-5" id="edit_profile_button">
                                    <i class="fa fa-edit"></i>
                                    Edit Profile
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-1">
                        <div id="profile_alert"></div>
                        <div class="row">
                             <div class="col-lg-4 px-5 text-center" style="border-right: 1px solid #999;">
                                 @if($userInfo->picture)
                                     <img src="storage/images/{{ $userInfo->picture }}" id="image_preview" class="img-fluid rounded-circle img-thumbnail" width="200">
                                 @else
                                     <img src="{{asset('/images/vosh_avator.jpg')}}" id="image_preview" class="img-fluid rounded-circle img-thumbnail" width="200">
                                 @endif
                                 <input type="hidden" id="distinguish_page" value="{{$userInfo}}">
                                 <div>
                                     <label class="fw-bolder">Change Profile Picture</label>
                                     <input type="file" for="picture" name="picture" class="form-control rounded-pill" id="picture">
                                     </div>
                                     <div class="row">
                                         <div class="my-2">
                                             <input type="hidden"  class="btn btn-primary rounded-0 float-left" value="Edit Profile" id="edit_profile_button">
                                         </div>
                                     </div>
                             </div>

                            <input type="hidden" name="user_id" id="user_id" value="{{$userInfo->id ?? ''}}">
                            <div class="col-lg-8 px-5 bg-gray">
                                <form action="#" method="POST" id="profile_form" class="accordion-flush self_edit">
                                    @csrf
                                    <div class="row">
                                        <div class="my-2">
                                            <input type="button" hidden="hidden" class="btn btn-primary rounded-0 float-end" value="Edit Profile" id="edit_profile_btn">
                                        </div>
                                    </div>

                                    <meta name="csrf-token" content="{{ csrf_token() }}" />
                                    <div class="row">
                                        <div class="col-lg">
                                            <label  class="fw-bolder"  for="name">First Name</label>
                                            <input type="text" disabled name="firstName" class="form-control rounded-0 profile" id="" value="{{explode(' ', $userInfo->name)[0]??''}}">
                                            <input type="text" hidden="hidden" name="firstName" class="form-control rounded-0 profile_edit" id="firstName" value="{{explode(' ', $userInfo->name)[0]??''}}">
                                        </div>
                                        <div class="col-lg">
                                            <label  class="fw-bolder"  for="name">Other Names</label>
                                            <input type="text" disabled name="otherNames" class="form-control rounded-0 profile" id="" value="{{implode(' ', array_slice(explode(' ', $userInfo->name), 1))??''}}">
                                            <input type="text" hidden="hidden" name="otherNames" class="form-control rounded-0 profile_edit" id="otherNames" value="{{implode(' ', array_slice(explode(' ', $userInfo->name), 1))??''}}">
                                        </div>
                                        <div class="col-lg">
                                            <label  class="fw-bolder" for="name">Email</label>
                                            <input type="email" disabled name="email" class="form-control rounded-0 profile" id="" value="{{$userInfo->email??''}}">
                                            <input type="email" hidden name="email" class="form-control rounded-0 profile_edit" id="email" value="{{$userInfo->email??''}}">
                                        </div>
                                        <div class="col-lg profile">
                                            <label  class="fw-bolder" for="name">User Name</label>
                                            <input type="user_name" disabled name="user_name" class="form-control rounded-0 profile" id="" value="{{$userInfo->user_name??''}}">
                                            <input type="user_name" disabled hidden name="user_name" class="form-control rounded-0 profile_edit" id="user_name" value="{{$userInfo->user_name??''}}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg">
                                            <label  class="fw-bolder hide-status" for="phone">Phone</label>
                                            <input type="tel" disabled  name="phone" class="form-control rounded-0 profile" id="" value="{{$userInfo->phone?? ''}}">
                                            <div class="input-group profile_edit hide-status hide-field" hidden="hidden">
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text" for="country_code">Country Code</label>
                                                </div>
                                                <select class="custom-select" id="country_code" name="country_code">
                                                    <option value="" disabled selected>--selected country code--</option>
                                                    @foreach (config('membership.country_codes') as $code => $country)
                                                        <option value="{{ $code }}">{{ $code }} ({{ $country }})</option>
                                                    @endforeach
                                                </select>
{{--                                                <div class="invalid-feedback"></div>--}}
                                                <input type="tel" name="phone" placeholder="700000000" class="form-control rounded-0" id="phone" value="{{auth()->user()->phone == 'N/A'?'':auth()->user()->phone}}">
                                            </div>
                                            <div class="invalid-feedback"></div>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="col-lg">
                                            <label  class="fw-bolder hide-status" for="marital_status">Marital Status</label>

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
                                            <label  class="fw-bolder" for="gender">Gender</label>
                                            <input type="text" disabled name="gender" class="form-control rounded-0 profile" id="" value={{config('membership.statuses.gender')[$userInfo->gender]??''}}>
                                            <select name="gender" hidden="hidden" id="gender" class="form-select rounded-0 profile_edit">
                                                <option selected disabled>--Select</option>
                                                @foreach(config('membership.gender') as $gender)
                                                    <option value="{{$gender['id']}}" >
                                                    {{$gender['text']}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="col-lg">
                                            <label  class="fw-bolder" for="year_joined">Year Joined VOSH</label>
                                            <input type="text" disabled name="year_joined" class="form-control rounded-0 profile" id="" value={{$userInfo->year_joined?explode('-', explode(' ', $userInfo->year_joined)[0])[0]:''}}>
                                            <input  data-toggle="tooltip" data-placement="bottom" title="The year you joined VOSH not necessarily Buru Buru!" type="date" hidden=""  name="year_joined" class="form-control rounded-0 profile_edit" id="year_joined" value="">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="col-lg profile">
                                            <?php
                                            if (isset(auth()->user()->dob)){
                                                $comp_full_age = \Carbon\Carbon::parse(auth()->user()->dob)->diff(\Carbon\Carbon::now());
                                                $years = $comp_full_age->y;
                                                $months = $comp_full_age->m;
                                                $days = $comp_full_age->d;
                                                $full_age = $years.' years, '.$months.' months and '.$days.' days';
                                                $full_age_array = explode(',', $full_age);

                                                $first_age_parameter= $full_age_array[0];
                                                $full_first_age_parameter = explode(' ', $first_age_parameter);
                                                $first_full_first_age_parameter = $full_first_age_parameter[0];

                                                if ($first_full_first_age_parameter == 0){
                                                    array_shift($full_age_array);
                                                    $full_age = implode(' ', $full_age_array);
                                                }
                                            }?>
                                            <label  class="fw-bolder text" for="dob" class="profile">Age</label>
                                            <input type="text" disabled  name="dob" class="form-control rounded-0 profile" id="" value="{{$full_age??''}}">
                                        </div>
                                        <div class="col-lg profile_edit"  hidden="hidden">
                                            <label  class="fw-bolder" for="dob" class="profile_edit">Date of Birth</label>
                                            <input type="date"  name="dob" class="form-control rounded-0 profile_edit" id="dob" value="">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg">
                                            <label  class="fw-bolder" for="estate">Sub County</label>

                                            <input type="text" disabled name="estate" class="form-control rounded-0 profile" id="" value="{{isset($userInfo->estate_id) ? explode(' ', config('membership.statuses.sub_county')[$userInfo->estate_id]['text'])[0] : ''}}">

                                            <select hidden="hidden" name="estate" id="estate" class="form-select rounded-0 profile_edit">
                                                <option selected disabled>--Select</option>
                                                @foreach(config('membership.sub_county') as $sub_county)
                                                    <option value="{{$sub_county['id']}}" >
                                                        {{count(explode(' ', $sub_county['text'])) > 2 ? explode(' ', $sub_county['text'])[0].' '.explode(' ', $sub_county['text'])[1] : explode(' ', $sub_county['text'])[0]}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg profile">
                                            <label  class="fw-bolder" for="estate">Ward</label>

                                            <input type="text" disabled name="estate" class="form-control rounded-0 profile" id="" value="{{config('membership.statuses.sub_county')[$userInfo->estate_id]['wards'][$userInfo->ward]['text'] ??''}}">

                                        </div>

                                        <div class="col-lg hide_ward_get_sub_county">

                                        </div>

                                        <div class="col-lg">
                                            <label  class="fw-bolder" for="cell_group">Cell Group</label>

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
                                            <label  class="fw-bolder" for="education_level">Level of Education</label>
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
                                            <label  class="fw-bolder" for="born_again">Born Again</label>
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
                                            <label  class="fw-bolder" for="leadership_status">In Leadership?</label>

                                            <input type="text" disabled name="leadership_status" class="form-control rounded-0 profile" id="" value="{{isset($userInfo->leadership_status_id) ? config('membership.statuses.flag')[$userInfo->leadership_status_id]: ''}}">
                                            <select hidden="hidden" name="leadership_status" id="leadership_status" class="form-select rounded-0 profile_edit">
                                                <option selected disabled>--Select</option>
                                                @foreach(config('membership.flag') as $flag)
                                                    <option value="{{$flag['id']}}" >
                                                    {{$flag['text']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg">
                                            <label  class="fw-bolder" for="ministry">Key Ministry</label>
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
                                        <label  class="fw-bolder" for="leadership_status">Other Ministries/ Ministries of Interest (Tick as appropriate)</label>
                                        @foreach(config('membership.ministry') as $ministry)
                                            <div class="form-check col-lg">
                                                <input type="checkbox" class="check_box" id="check_box" name="check_box[]" value="{{$ministry['id']}}">
                                                <label  class="" class="form-check-label" for="check1">{{$ministry['text']}}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="row">
                                        <div class="col-lg">
                                            <label  class="fw-bolder hide-status" for="occupation">Occupation/ Specialization</label>
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
                                            <label  class="fw-bolder hide-status" for="employment_status">Employment Status</label>


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
                                        <input type="button"  hidden="hidden" class="btn btn-secondary rounded-5 float-left" value="Ignore" id="ignore_btn">
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
            // $('.profile').addClass('text-secondary', 'fw-bolder')
            $('.profile').val()
            if ($('#add_user_id').val() == 'admin'){
                $('.profile').hide();
                $('.profile_edit, #ignore_btn, #profile_btn').removeAttr('hidden');
            }
            $('.hide_ward_get_sub_county').hide()
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
                $('#ignore_btn').hide();

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
                            $('#profile_alert').html(showMessage('success', response.messages));
                            $('#profile_btn').val('Update');
                            $('.profile').show();
                            $('.profile_edit, #profile_btn').hide()

                            setTimeout(function() {
                                window.location.href = "{{route('profile')}}"
                            }, 1000);
                        }else if (response.status == 400){
                            showError('phone', response.messages.phone);
                            showError('country_code', response.messages.country_code);
                            $('#profile_btn').val('Update');
                            $('#ignore_btn').show();
                            $('#profile_form')[0].reset();
                        }else if(response.status == 401){
                            showError('dob', response.messages.dob);
                            $('#profile_btn').val('Update');
                            $('#ignore_btn').show();
                            $('#profile_form')[0].reset();
                        }
                    }
                });
            });
            // if($('#distinguish_page').val(undefined)) {
            //     $('#edit_profile_button').html('yeza Profile')
            // }
            $('#ignore_btn').click(function (e) {
                e.preventDefault();
                window.location = '{{'profile'}}'
            })
            $('body').on('click', '#edit_profile_button', function (e) {
                e.preventDefault();
                $('.profile_edit, #ignore_btn, #profile_btn').removeAttr('hidden');
                $('.profile').hide();
                if($('#distinguish_page').val() == undefined){
                    let id = $(this).data('side-edit')
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '{{route('side-profile-edit')}}',
                        data: {
                            id: id
                        },
                        success: function (data) {
                            $('.side-profile-here').html(data)
                            window.location = '{{ route('profile') }}';
                            $('.profile_edit, #profile_btn').removeAttr('hidden');
                            $('.profile').hide();
                        }
                    })
                }

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
                $('.hide_ward_get_sub_county').show()
                e.preventDefault()
                let sub_county = $(this).val();
                let sub_county_name = $(this).html()
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{route('profile.pass-subcounty')}}',
                    method: 'post',
                    data: {
                        sub_county:sub_county
                    },
                    // dataType: 'json',
                    success: function (response) {
                        $('.hide_ward_get_sub_county').html(response)
                    }
                });
            })
        });

    </script>

@endsection

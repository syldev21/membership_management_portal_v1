@extends('layouts.improved-master') {{-- Extend your layout, if you have one --}}

@section('content')
    {{-- Start content section --}}

    <div class="row my-5 responsive">
        <div class="col-lg-12" style=" margin: auto">
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
                            @if(auth()->user()->picture)
                                <img src="storage/images/{{ auth()->user()->picture }}" id="image_preview"
                                     class="img-fluid rounded-circle img-thumbnail" width="200">
                            @else
                                <img src="{{asset('/images/vosh_avator.jpg')}}" id="image_preview"
                                     class="img-fluid rounded-circle img-thumbnail" width="200">
                            @endif
                            <input type="hidden" id="distinguish_page" value="{{auth()->user()}}">
                            <div>
                                <label class="fw-bolder">Change Profile Picture</label>
                                <input type="file" for="picture" name="picture" class="form-control rounded-pill"
                                       id="picture">
                            </div>
                            <div class="row">
                                <div class="my-2">
                                    <input type="hidden" class="btn btn-primary rounded-0 float-left"
                                           value="Edit Profile" id="edit_profile_button">
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="user_id" id="user_id" value="{{auth()->user()->id ?? ''}}">
                        <div class="col-lg-8 px-5 bg-gray">
                            <form action="#" method="POST" id="profile_form" class="accordion-flush self_edit">
                                @csrf
                                <div class="row">
                                    <div class="my-2">
                                        <input type="button" hidden="hidden" class="btn btn-primary rounded-0 float-end"
                                               value="Edit Profile" id="edit_profile_btn">
                                    </div>
                                </div>

                                <meta name="csrf-token" content="{{ csrf_token() }}"/>
                                <div class="row">
                                    <div class="col-lg">
                                        <label class="fw-bolder" for="name">First Name</label>
                                        <input type="text" disabled name="firstName"
                                               class="form-control rounded-0 profile" id=""
                                               value="{{explode(' ', auth()->user()->name)[0]??''}}">
                                        <input type="text" hidden="hidden" name="firstName"
                                               class="form-control rounded-0 profile_edit" id="firstName"
                                               value="{{explode(' ', auth()->user()->name)[0]??''}}">
                                    </div>
                                    <div class="col-lg">
                                        <label class="fw-bolder" for="name">Other Names</label>
                                        <input type="text" disabled name="otherNames"
                                               class="form-control rounded-0 profile" id=""
                                               value="{{implode(' ', array_slice(explode(' ', auth()->user()->name), 1))??''}}">
                                        <input type="text" hidden="hidden" name="otherNames"
                                               class="form-control rounded-0 profile_edit" id="otherNames"
                                               value="{{implode(' ', array_slice(explode(' ', auth()->user()->name), 1))??''}}">
                                    </div>
                                    <div class="col-lg">
                                        <label class="fw-bolder" for="name">Email</label>
                                        <input type="email" disabled name="email" class="form-control rounded-0 profile"
                                               id="" value="{{auth()->user()->email??''}}">
                                        <input type="email" hidden name="email"
                                               class="form-control rounded-0 profile_edit" id="email"
                                               value="{{auth()->user()->email??''}}">
                                    </div>
                                    <div class="col-lg profile">
                                        <label class="fw-bolder" for="name">User Name</label>
                                        <input type="user_name" disabled name="user_name"
                                               class="form-control rounded-0 profile" id=""
                                               value="{{auth()->user()->user_name??''}}">
                                        <input type="user_name" disabled hidden name="user_name"
                                               class="form-control rounded-0 profile_edit" id="user_name"
                                               value="{{auth()->user()->user_name??''}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg">
                                        <label class="fw-bolder hide-status" for="phone">Phone</label>
                                        <input type="tel" disabled name="phone" class="form-control rounded-0 profile"
                                               id=""
                                               value="{{'+'.implode(' ', [auth()->user()->dialing_code, auth()->user()->phone])?? ''}}">
                                        <div class="input-group profile_edit hide-status hide-field" hidden="hidden">
                                            <div>
                                                <input type="tel" id="phone" name="phone" placeholder="Phone number">
                                            </div>
                                            <div hidden="hidden">
                                                <select id="country_code" name="country_code"></select>
                                            </div>
                                        </div>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                    <div class="col-lg">
                                        <label class="fw-bolder hide-status" for="marital_status">Marital Status</label>

                                        <?php
                                        if (isset(auth()->user()->marital_status_id)) {
                                            $marital_status_id = is_numeric(auth()->user()->marital_status_id) ? config('membership.statuses.marital_status')[auth()->user()->marital_status_id] : auth()->user()->marital_status_id;
                                        } else {
                                            $marital_status_id = '';
                                        }
                                        ?>

                                        <input type="text" disabled name="marital_status_id"
                                               class="form-control rounded-0 profile" id=""
                                               value="{{$marital_status_id}}">


                                        <select hidden="hidden" name="marital_status" id="marital_status"
                                                class="form-select rounded-0 profile_edit hide-status hide-field">
                                            <option selected disabled>--Select</option>
                                            @foreach(config('membership.marital_status') as $marital_status)
                                                <option value="{{$marital_status['id']}}">
                                                    {{$marital_status['text']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg">
                                        <label class="fw-bolder" for="gender">Gender</label>
                                        <input type="text" disabled name="gender" class="form-control rounded-0 profile"
                                               id=""
                                               value={{config('membership.statuses.gender')[auth()->user()->gender]??''}}>
                                        <select name="gender" hidden="hidden" id="gender"
                                                class="form-select rounded-0 profile_edit">
                                            <option selected disabled>--Select</option>
                                            @foreach(config('membership.gender') as $gender)
                                                <option value="{{$gender['id']}}">
                                                    {{$gender['text']}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="col-lg">
                                        <label class="fw-bolder" for="year_joined">Year Joined VOSH</label>
                                        <input type="text" disabled name="year_joined"
                                               class="form-control rounded-0 profile" id=""
                                               value={{auth()->user()->year_joined?explode('-', explode(' ', auth()->user()->year_joined)[0])[0]:''}}>
                                        <input data-toggle="tooltip" data-placement="bottom"
                                               title="The year you joined VOSH not necessarily Buru Buru!" type="date"
                                               hidden="" name="year_joined" class="form-control rounded-0 profile_edit"
                                               id="year_joined" value="">
                                        <div class="invalid-feedback"></div>
                                    </div>
                                    {{--                                        <div class="col-lg">--}}
                                    {{--                                            <label class="fw-bolder" for="year_joined">Year Joined VOSH</label>--}}
                                    {{--                                            <select name="year_joined" class="form-control rounded-0 profile_edit" id="year_joined">--}}
                                    {{--                                                <option value="">Select Year</option>--}}
                                    {{--                                                <?php--}}
                                    {{--                                                $currentYear = date('Y');--}}
                                    {{--                                                $startYear = 1900; // Define the starting year--}}
                                    {{--                                                $endYear = $currentYear; // Define the ending year (you can change it to your desired maximum year)--}}

                                    {{--                                                for ($year = $endYear; $year >= $startYear; $year--) {--}}
                                    {{--                                                    echo '<option value="' . $year . '">' . $year . '</option>';--}}
                                    {{--                                                }--}}
                                    {{--                                                ?>--}}
                                    {{--                                            </select>--}}
                                    {{--                                            <div class="invalid-feedback"></div>--}}
                                    {{--                                        </div>--}}
                                    <div class="col-lg profile">
                                        <?php
                                        if (isset(auth()->user()->dob)) {
                                            $comp_full_age = \Carbon\Carbon::parse(auth()->user()->dob)->diff(\Carbon\Carbon::now());
                                            $years = $comp_full_age->y;
                                            $months = $comp_full_age->m;
                                            $days = $comp_full_age->d;
                                            $full_age = $years . ' years, ' . $months . ' months and ' . $days . ' days';
                                            $full_age_array = explode(',', $full_age);

                                            $first_age_parameter = $full_age_array[0];
                                            $full_first_age_parameter = explode(' ', $first_age_parameter);
                                            $first_full_first_age_parameter = $full_first_age_parameter[0];

                                            if ($first_full_first_age_parameter == 0) {
                                                array_shift($full_age_array);
                                                $full_age = implode(' ', $full_age_array);
                                            }
                                        } ?>
                                        <label class="fw-bolder text" for="dob" class="profile">Age</label>
                                        <input type="text" disabled name="dob" class="form-control rounded-0 profile"
                                               id="" value="{{$full_age??''}}">
                                    </div>
                                    <div class="col-lg profile_edit" hidden="hidden">
                                        <label class="fw-bolder" for="dob" class="profile_edit">Date of Birth</label>
                                        <input type="date" name="dob" class="form-control rounded-0 profile_edit"
                                               id="dob" value="">
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg">
                                        <label class="fw-bolder" for="estate">Sub County</label>

                                        <input type="text" disabled name="estate" class="form-control rounded-0 profile"
                                               id=""
                                               value="{{isset(auth()->user()->estate_id) ? explode(' ', config('membership.statuses.sub_county')[auth()->user()->estate_id]['text'])[0] : ''}}">

                                        <select hidden="hidden" name="estate" id="estate"
                                                class="form-select rounded-0 profile_edit">
                                            <option selected disabled>--Select</option>
                                            @foreach(config('membership.sub_county') as $sub_county)
                                                <option value="{{$sub_county['id']}}">
                                                    {{count(explode(' ', $sub_county['text'])) > 2 ? explode(' ', $sub_county['text'])[0].' '.explode(' ', $sub_county['text'])[1] : explode(' ', $sub_county['text'])[0]}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg profile">
                                        <label class="fw-bolder" for="estate">Ward</label>

                                        <input type="text" disabled name="estate" class="form-control rounded-0 profile"
                                               id=""
                                               value="{{config('membership.statuses.sub_county')[auth()->user()->estate_id]['wards'][auth()->user()->ward]['text'] ??''}}">

                                    </div>

                                    {{--                            <div class="col-lg hide_ward_get_sub_county profile_edit">--}}

                                    {{--                            </div>--}}

                                    <div class="col-lg">
                                        <label class="fw-bolder" for="cell_group">Cell Group</label>

                                        <input type="text" disabled name="cell_group"
                                               class="form-control rounded-0 profile" id=""
                                               value="{{isset(auth()->user()->cell_group_id) ? config('membership.statuses.cell_group')[auth()->user()->cell_group_id] : ''}}">
                                        <select hidden="hidden" name="cell_group" id="cell_group"
                                                class="form-select rounded-0 profile_edit">
                                            <option selected disabled>--Select</option>
                                            @foreach(config('membership.cell_group') as $cell_group)
                                                <option value="{{$cell_group['id']}}">
                                                    {{$cell_group['text']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">


                                    <div class="col-lg">
                                        <label class="fw-bolder" for="education_level">Level of Education</label>
                                        <input type="text" disabled name="education_level"
                                               class="form-control rounded-0 profile" id=""
                                               value="{{isset(auth()->user()->education_level_id) ? config('membership.statuses.level_of_education')[auth()->user()->education_level_id]  : ''}}">

                                        <select hidden="hidden" name="education_level" id="education_level"
                                                class="form-select rounded-0 profile_edit">
                                            <option selected disabled>--Select</option>
                                            @foreach(config('membership.level_of_education') as $level_of_education)
                                                <option value="{{$level_of_education['id']}}">
                                                    {{$level_of_education['text']}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-lg">
                                        <label class="fw-bolder" for="born_again">Born Again</label>
                                        <input type="text" disabled name="born_again"
                                               class="form-control rounded-0 profile" id=""
                                               value="{{isset(auth()->user()->born_again_id) ? config('membership.statuses.flag')[auth()->user()->born_again_id]  : ''}}">

                                        <select hidden="hidden" name="born_again" id="born_again"
                                                class="form-select rounded-0 profile_edit">
                                            <option selected disabled>--Select</option>
                                            @foreach(config('membership.flag') as $flag)
                                                <option value="{{$flag['id']}}">
                                                    {{$flag['text']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg">
                                        <label class="fw-bolder" for="leadership_status">In Leadership?</label>

                                        <input type="text" disabled name="leadership_status"
                                               class="form-control rounded-0 profile" id=""
                                               value="{{isset(auth()->user()->leadership_status_id) ? config('membership.statuses.flag')[auth()->user()->leadership_status_id]: ''}}">
                                        <select hidden="hidden" name="leadership_status" id="leadership_status"
                                                class="form-select rounded-0 profile_edit">
                                            <option selected disabled>--Select</option>
                                            @foreach(config('membership.flag') as $flag)
                                                <option value="{{$flag['id']}}">
                                                    {{$flag['text']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg">
                                        <label class="fw-bolder" for="ministry">Key Ministry</label>
                                        <input type="text" disabled name="ministry"
                                               class="form-control rounded-0 profile" id=""
                                               value="{{isset(auth()->user()->ministry_id) ? config('membership.statuses.ministry')[auth()->user()->ministry_id] : ''}}">

                                        <select hidden="hidden" name="ministry" id="ministry"
                                                class="form-select rounded-0 profile_edit">
                                            <option selected disabled>--Select</option>
                                            @foreach(config('membership.ministry') as $ministry)
                                                <option value="{{$ministry['id']}}">
                                                    {{$ministry['text']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row profile_edit" hidden="hidden">
                                    <label class="fw-bolder" for="leadership_status">Other Ministries/ Ministries of
                                        Interest (Tick as appropriate)</label>
                                    @foreach(config('membership.ministry') as $ministry)
                                        <div class="form-check col-lg">
                                            <input type="checkbox" class="check_box" id="check_box" name="check_box[]"
                                                   value="{{$ministry['id']}}">
                                            <label class="" class="form-check-label"
                                                   for="check1">{{$ministry['text']}}</label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="row">
                                    <div class="col-lg">
                                        <label class="fw-bolder hide-status" for="occupation">Occupation/
                                            Specialization</label>
                                        <?php
                                        if (isset(auth()->user()->occupation_id)) {
                                            $occupation = is_numeric(auth()->user()->occupation_id) ? config('membership.statuses.occupation')[auth()->user()->occupation_id] : auth()->user()->occupation_id;
                                        } else {
                                            $occupation = '';
                                        }
                                        ?>
                                        <input type="text" disabled name="occupation"
                                               class="form-control rounded-0 profile" id="" value="{{$occupation}}">

                                        <select hidden="hidden" name="occupation" id="occupation"
                                                class="form-select rounded-0 profile_edit hide-status hide-field">
                                            <option selected disabled>--Select</option>
                                            @foreach(config('membership.occupation') as $occupation)
                                                <option value="{{$occupation['id']}}">
                                                    {{$occupation['text']}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-lg">
                                        <label class="fw-bolder hide-status" for="employment_status">Employment
                                            Status</label>


                                        <?php
                                        if (isset(auth()->user()->employment_status_id)) {
                                            $employment_status_id = is_numeric(auth()->user()->employment_status_id) ? config('membership.statuses.employment_status')[auth()->user()->employment_status_id] : auth()->user()->employment_status_id;
                                        } else {
                                            $employment_status_id = '';
                                        }
                                        ?>

                                        <input type="text" disabled name="employment_status"
                                               class="form-control rounded-0 profile" id=""
                                               value="{{$employment_status_id}}">

                                        <select hidden="hidden" name="employment_status" id="employment_status"
                                                class="form-select rounded-0 profile_edit hide-status hide-field">
                                            <option selected disabled>--Select</option>
                                            @foreach(config('membership.employment_status') as $employment_status)
                                                <option value="{{$employment_status['id']}}">
                                                    {{$employment_status['text']}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>

                                <div class="my-2">
                                    <input type="button" hidden="hidden" class="btn btn-secondary rounded-5 float-left"
                                           value="Ignore" id="ignore_btn">
                                    <input type="submit" hidden="hidden" class="btn btn-primary rounded-0 float-end"
                                           value="Update Profile" id="profile_btn">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

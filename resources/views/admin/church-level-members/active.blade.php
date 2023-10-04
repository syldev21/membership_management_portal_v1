<div class="table table-responsive m-2" id="main">
    <input type="hidden" id="auth_user_role" value="">
    <table id="dt_select" class="table table-striped table-bordered thead-dark" style="border-top: 1px solid #dddddd; border-bottom: 1px solid #dddddd ">
        <thead>
        <tr>

            <th>S/R</th>
            <th>Member Number</th>
            <th>Title</th>
            <th>First Name</th>
            <th>Other Names</th>
            <th>Phone</th>
            <th>Age</th>
            <th>Born Again</th>
            <th>Gender</th>
            <th>Marital Status</th>
            <th>Sub-County</th>
            <th>Ward</th>
            <th class="">Cell Group</th>
            <th>Employment Status</th>
            <th>Leadership Status</th>
            <th>Occupation</th>
            <th>Other/ Ministries of Interest</th>
            <th>Level of Education</th>
            <th>Registered</th>
            <th>Year Joined</th>
            <th>Removed</th>
            <th class="hide_for_execs">Actions</th>
        </tr>
        </thead>
        <tboby>
            @foreach($members as $member)
                <input type="hidden" class="limited_view_and_action" data-cell_group="{{\App\Models\User::where('id', auth()->id())->with('roles')->first()->cell_group_id ?? null}}" value="{{\App\Models\User::where('id', auth()->id())->with('roles')->first()->roles[0]->role_id ?? null}}">
                    <?php
                    if($member->ministries_of_interest == null){
                        $ministries = '';
                    }else{
                        if (strpos($member->ministries_of_interest, ',') == true){

                            $ministry_string_array = explode(' ', str_replace(',', ' ', $member->ministries_of_interest));
                            $ministry_name_array = [];
                            foreach ($ministry_string_array as $ministry_id){
                                $ministry_name = config('membership.statuses.ministry')[$ministry_id];
                                array_push($ministry_name_array, $ministry_name);
                            }

                            $ministries = implode(',', $ministry_name_array);
                        }else{
                            $ministries = config('membership.statuses.ministry')[$member->ministries_of_interest];
                        }
                    }



                    if (isset($member->marital_status_id)){
                        $marital_status_id = is_numeric($member->marital_status_id)?config('membership.statuses.marital_status')[$member->marital_status_id] : $member->marital_status_id;
                    }else{
                        $marital_status_id ='';
                    }
                    if (isset($member->employment_status_id)){
                        $employment_status_id = is_numeric($member->employment_status_id)?config('membership.statuses.employment_status')[$member->employment_status_id] : $member->marital_status_id;
                    }else{
                        $employment_status_id = '';
                    }
                    if (isset($member->occupation_id)){
                        $occupation_id = is_numeric($member->occupation_id)?config('membership.statuses.occupation')[$member->occupation_id] : $member->marital_status_id;
                    }else{
                        $occupation_id ='';
                    }
                    if (isset($member->estate_id)){
                        $sub_county = count(explode(' ', config('membership.statuses.sub_county')[$member->estate_id]['text'])) > 2 ? explode(' ', config('membership.statuses.sub_county')[$member->estate_id]['text'])[0].' '.explode(' ', config('membership.statuses.sub_county')[$member->estate_id]['text'])[1] : explode(' ', config('membership.statuses.sub_county')[$member->estate_id]['text'])[0];
                    }else{
                        $sub_county = '';
                    }

                    if (isset($member->dob)){
                        $comp_full_age = \Carbon\Carbon::parse($member->dob)->diff(\Carbon\Carbon::now());
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
                    }
                    ?>
                <tr class="item{--><!--{$member->id}  text-black fw-bolder}">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$member->member_number??''}}</td>
                    <td>{{config('membership.statuses.title')[$member->title]['text']??''}}</td>
                    <td>{{explode(' ', $member->name)[0] ?? ''}}</td>
                    <td>{{implode(' ', array_slice(explode(' ', $member->name), 1)) ?? ''}}</td>
                    <td>{{isset($member->phone)?$member->phone:''}}</td>
                    <td>{{$years??''}}</td>
                    <td>{{isset($member->born_again_id)?config('membership.statuses.flag')[$member->born_again_id]:''}}</td>
                    <td>{{isset($member->gender)?config('membership.statuses.gender')[$member->gender]:''}}</td>
                    <td>{{isset($marital_status_id)?$marital_status_id:''}}</td>
                    <td>{{$sub_county??null}}</td>
                    <td>{{config('membership.statuses.sub_county')[$member->estate_id]['wards'][$member->ward]['text'] ?? ''}}</td>
                    <td class="conditional_show" data-id="">{{config('membership.statuses.cell_group')[$member->cell_group_id??null]}}</td>
                    <td>{{isset($employment_status_id)?$employment_status_id:''}}</td>
                    <td>{{isset($member->leadership_status_id)?config('membership.statuses.flag')[$member->leadership_status_id]:''}}</td>
                    <td>{{isset($occupation_id)?$occupation_id:''}}</td>
                    <td>{{isset($ministries)?$ministries:''}}</td>
                    <td>{{isset($member->education_level_id)?config('membership.statuses.level_of_education')[$member->education_level_id]:''}}</td>
                    <td>{{isset($member->created_at) ? \Carbon\Carbon::parse($member->created_at)->diffForHumans() : ''}}</td>
                    <td>{{$member->year_joined?explode('-', explode(' ', $member->year_joined)[0])[0]:''}}</td>
                    <td>N/A</td>
                    <td class="hide_for_execs">
                        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                            <li class="nav-item dropdown text-center">
                                <a class="text-black nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><span><i class="fa fa-bars"></i></span></a>

                                <ul style="background-color: lightcyan" class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    {{--                                        <ul class="dropdown-menu dropdown-menu-end bg-dark" aria-labelledby="navbarDropdown">--}}
                                    <li>
                                        <a  href="#" data-id="{{$member->id}}" data-user_first_name="{{explode(' ', $member->name)[0]}}" data-user_other_names="{{isset($member->name)?implode(' ', array_slice(explode(' ', $member->name), 1)):''}}" data-u_name="{{$member->user_name}}" data-user_email="{{$member->email}}"  data-user_phone="{{$member->phone}}" id="edit" value="{{$member->id}}" class="dropdown-item text-primary" data-bs-toggle="modal" data-bs-target="#editModal">
                                            <i class="text-primary fw-bold fa fa-edit"></i>&nbsp;&nbsp;
                                            Edit
                                        </a>
                                    </li>
                                    <li>
                                        <a  href="#" data-id="{{$member->id}}" data-existing="{{$member->existing}}"  data-hide="{{auth()->id()}}" data-user_first_name="{{explode(' ', $member->name)[0]}}" data-user_name="{{$member->name}}" id="delete" value="" class="dropdown-item hide-this text-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                            @if($member->existing == 1)
                                                <i class="text-danger fw-bold fa fa-trash"></i>&nbsp;&nbsp;
                                                Delete
                                            @else
                                                <i class="text-danger fw-bold fa fa-undo"></i>&nbsp;&nbsp;
                                                Reinstate
                                            @endif
                                        </a>
                                    </li>
                                    <li>
                                        <a  href="#" data-id="{{$member->id}}" data-hide="{{auth()->id()}}" data-user_name="{{$member->name}}" data-activate="{{$member->active}}" id="deactivate" value="{{$member->id}}" class="dropdown-item user_status  hide-this text-warning" data-bs-toggle="modal" data-bs-target="#activateModal">
                                            @if($member->active == 1)
                                                <i class="text-warning fw-bold fa fa-person-circle-xmark"></i>&nbsp;&nbsp;
                                                Deactivate
                                            @else
                                                <i class="text-warning fw-bold fa fa-person-chart-line"></i>&nbsp;&nbsp;
                                                Activate
                                            @endif
                                        </a>
                                    </li>
                                    @if(auth()->user()->hasPermissionTo(config('membership.permissions.Assign_Role.text')))
                                        <li>
                                            <a href="#" data-id="{{$member->id}}" data-user_title="{{$member->name}}" data-user_name="{{$member->name}}" data-user_email="{{$member->email}}"  data-user_phone="{{$member->phone}}" id="role" value="{{$member->id}}" class="dropdown-item text-success" data-bs-toggle="modal" data-bs-target="#roleModal">
                                                <i class="text-success fw-bold fas fa-user-tag"></i>&nbsp;&nbsp;
                                                Assign Role
                                            </a>
                                        </li>
                                    @endif
                                    <li>
                                        <a href="#" class="dropdown-item text-secondary" data-cell_group="{{config('membership.statuses.cell_group')[$member->cell_group_id]??null}}" data-user_first_name="{{explode(' ', $member->name)[0]}}"  data-user_name="{{$member->name}}" data-id="{{$member->id}}" data-bs-toggle="modal" data-bs-target="#reviewModal" data-registration_status="{{$member->registration_status}}" id="reviewRegistration">
                                            @if($member->registration_status== config('membership.registration_statuses.cell_group_registered.id'))
                                                <i class="text-secondary fw-bold fas fa-clipboard-check"></i>&nbsp;&nbsp;
                                                Prepare
                                            @elseif($member->registration_status== config('membership.registration_statuses.cell_group_approved.id'))
                                                <i class="text-secondary fw-bold fas fa-check"></i>&nbsp;&nbsp;
                                                Submit
                                            @elseif($member->registration_status== config('membership.registration_statuses.church_registered.id'))
                                                <i class="text-secondary fw-bold fas fa-search"></i>&nbsp;&nbsp;
                                                Review
                                            @elseif($member->registration_status== config('membership.registration_statuses.church_provisionally_approved.id'))
                                                <i class="text-secondary fw-bold fas fa-thumbs-up"></i>&nbsp;&nbsp;
                                                Approve
                                            @elseif($member->registration_status== config('membership.registration_statuses.church_approved.id'))
                                                <i class="text-secondary fw-bold fas fa-thumbs-down"></i>&nbsp;&nbsp;
                                                Decline
                                            @else
                                                <i class="text-secondary fw-bold fas fa-undo"></i>&nbsp;&nbsp;
                                                Reinstate
                                            @endif
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tboby>
    </table>
</div>

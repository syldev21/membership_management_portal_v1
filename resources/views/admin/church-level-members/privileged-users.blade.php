<div class="side-profile-here">
    <input type="hidden" value="1" id="testa">
    <div>

        <div style="float: left; width: 75%; height: 38px" class="bar_ups bg-primary text-white"><h2 class="mb-4">Privileged Users<span class=" text-success bg-body"></span> <span class="spanned_conditional_display"></span></h2></div>
        <div style="float: left" class="mr-2 ml-5">
            <div style="float: left">
                <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                    <li class="nav-item dropdown text-center">
                        <ul style="background-color: lightcyan" class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li>
                                <a  href="#" data-id="" data-user_first_name="" data-user_other_names="" data-u_name="" data-user_email=""  data-user_phone="" id="edit" value="" class="dropdown-item text-primary" data-bs-toggle="modal" data-bs-target="#editModal">
                                    <i class="text-primary fw-bold fa fa-edit"></i>&nbsp;&nbsp;
                                    Edit
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <input type="hidden" value="{{auth()->user()->hasPermissionTo(config('membership.permissions.Add_Members.text'))}}" id="can-add-members">
        <div style="float: right" id="add_new_one"><button class="btn btn-primary" id="edit_modal_button"  data-bs-toggle="modal" data-bs-target="#editModal"><span><i class="fa fa-user-plus text-black"></i> </span>Add Member</button></div>



    </div>
    <diV id="tbldv">
        <div class="table table-responsive m-2" id="main">
            <table id="dt_select" class="table table-striped table-bordered thead-dark" style="border-top: 1px solid #dddddd; border-bottom: 1px solid #dddddd ">
                <thead>
                    <tr>
                        <th rowspan="2">S/R</th>
                        <th rowspan="2">Member Number</th>
                        <th rowspan="2">Title</th>
                        <th rowspan="2">First Name</th>
                        <th rowspan="2">Other Names</th>
                        <th rowspan="2">Cell Group</th>
                        <th rowspan="2">Role</th>
                        <th colspan="10" class="permissions-column" style="text-align: center; border: 1px solid #ccc;">
                            Permissions
                        </th>
                        <th rowspan="2" class="hide_for_execs">Actions</th>
                    </tr>
                    <tr>
                        <th>{{config('membership.permissions.Add_Members.text')}}</th>
                        <th>{{config('membership.permissions.Assign_Role.text')}}</th>
                        <th>{{config('membership.permissions.Decline_Membership.text')}}</th>
                        <th>{{config('membership.permissions.Delete_Members.text')}}</th>
                        <th>{{config('membership.permissions.Edit_Members.text')}}</th>
                        <th>{{config('membership.permissions.prepare_registration.text')}}</th>
                        <th>{{config('membership.permissions.review_registration.text')}}</th>
                        <th>{{config('membership.permissions.approve_registration.text')}}</th>
                        <th>{{config('membership.permissions.See_Members.text')}}</th>
                        <th>{{config('membership.permissions.generate_report.text')}}</th>
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
                            <!--                            --><?php
//                            $image = \Intervention\Image\Facades\Image::canvas(500, 500, '#FFFFFF');
//                            $image->text('123', 250, 250, function($fonts) {
//                                $fonts->file(public_path('fonts/arial.ttf'));
//                                $fonts->size(100);
//                                $fonts->color('#CCCCCC');
//                                $fonts->align('center');
//                                $fonts->valign('middle');
//                            });
//
//                            // Return the image as a response
//                            return response($image->encode('png'));
                                                                   ?>

                        <tr class="item{--><!--{$member->id}  text-black fw-bolder}">
                                <td>{{$loop->iteration}}</td>
                                <td>{{$member->member_number??''}}</td>
                                <td>{{config('membership.statuses.title')[$member->title]['text']??''}}</td>
                                <td>{{explode(' ', $member->name)[0] ?? ''}}</td>
                                <td>{{implode(' ', array_slice(explode(' ', $member->name), 1)) ?? ''}}</td>
                                <td>{{isset($member->cell_group_id)?config('membership.statuses.cell_group')[$member->cell_group_id]:''}}</td>
                                <td>{{$member->roles()->first()->name ?? ''}}</td>
                                <td><i class="{{ $member->hasPermissionTO(config('membership.permissions.Add_Members.text')) ? 'fa fa-check' : 'fa fa-x' }}" style="color: white; background-color: {{ $member->hasPermissionTO(config('membership.permissions.Add_Members.text')) ? 'green' : 'red' }}; border-radius: 50%; padding: 5px;"></i></td>
                                <td><i class="{{ $member->hasPermissionTO(config('membership.permissions.Assign_Role.text')) ? 'fa fa-check' : 'fa fa-x' }}" style="color: white; background-color: {{ $member->hasPermissionTO(config('membership.permissions.Assign_Role.text')) ? 'green' : 'red' }}; border-radius: 50%; padding: 5px;"></i></td>
                                <td><i class="{{ $member->hasPermissionTO(config('membership.permissions.Decline_Membership.text')) ? 'fa fa-check' : 'fa fa-x' }}" style="color: white; background-color: {{ $member->hasPermissionTO(config('membership.permissions.Decline_Membership.text')) ? 'green' : 'red' }}; border-radius: 50%; padding: 5px;"></i></td>
                                <td><i class="{{ $member->hasPermissionTO(config('membership.permissions.Delete_Members.text')) ? 'fa fa-check' : 'fa fa-x' }}" style="color: white; background-color: {{ $member->hasPermissionTO(config('membership.permissions.Delete_Members.text')) ? 'green' : 'red' }}; border-radius: 50%; padding: 5px;"></i></td>
                                <td><i class="{{ $member->hasPermissionTO(config('membership.permissions.Edit_Members.text')) ? 'fa fa-check' : 'fa fa-x' }}" style="color: white; background-color: {{ $member->hasPermissionTO(config('membership.permissions.Edit_Members.text')) ? 'green' : 'red' }}; border-radius: 50%; padding: 5px;"></i></td>
                                <td><i class="{{ $member->hasPermissionTO(config('membership.permissions.prepare_registration.text')) ? 'fa fa-check' : 'fa fa-x' }}" style="color: white; background-color: {{ $member->hasPermissionTO(config('membership.permissions.prepare_registration.text')) ? 'green' : 'red' }}; border-radius: 50%; padding: 5px;"></i></td>
                                <td><i class="{{ $member->hasPermissionTO(config('membership.permissions.review_registration.text')) ? 'fa fa-check' : 'fa fa-x' }}" style="color: white; background-color: {{ $member->hasPermissionTO(config('membership.permissions.review_registration.text')) ? 'green' : 'red' }}; border-radius: 50%; padding: 5px;"></i></td>
                                <td><i class="{{ $member->hasPermissionTO(config('membership.permissions.approve_registration.text')) ? 'fa fa-check' : 'fa fa-x' }}" style="color: white; background-color: {{ $member->hasPermissionTO(config('membership.permissions.approve_registration.text')) ? 'green' : 'red' }}; border-radius: 50%; padding: 5px;"></i></td>
                                <td><i class="{{ $member->hasPermissionTO(config('membership.permissions.See_Members.text')) ? 'fa fa-check' : 'fa fa-x' }}" style="color: white; background-color: {{ $member->hasPermissionTO(config('membership.permissions.See_Members.text')) ? 'green' : 'red' }}; border-radius: 50%; padding: 5px;"></i></td>
                                <td><i class="{{ $member->hasPermissionTO(config('membership.permissions.generate_report.text')) ? 'fa fa-check' : 'fa fa-x' }}" style="color: white; background-color: {{ $member->hasPermissionTO(config('membership.permissions.generate_report.text')) ? 'green' : 'red' }}; border-radius: 50%; padding: 5px;"></i></td>
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
    </diV>

    <!-- Role Modal -->

    <div class="modal fade table table-responsive" id="roleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="role-modal-title" id="exampleModalLabel" style="color: white"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <input type="" id="role_user_id" data-user_name='' value="" hidden="hidden">
                <div id="assign_alert"></div>
                <div class="table table-responsive m-2 w-auto" id="main">
                    <div class="modal-body">
                        <form action="#" method="POST" id="assign_role_form">
                            <table class="table table-responsive table-bordered table-striped thread-dark">
                                <thead>
                                <tr>
                                    @foreach(config('membership.roles') as $role)
                                        <th>{{$role['text']}}</th>
                                    @endforeach
                                    <th rowspan="2" class="align-content-center text-center">
                                        <button id="clear_role_button" type="button" class="btn btn-warning">Clear Selection</button>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr id="with_id">

                                </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>

                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="button" class="btn btn-primary" id="assign_role_button" data-bs-popper="" value="Assign">
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Modal -->

    <div class="modal fade table table-responsive" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="edit-modal-title" id="exampleModalLabel">Register New Member </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <input type="" id="user_id" value="" hidden="hidden">
                <div id="edit_alert"></div>
                <div class="modal-body">
                    <div class="col-lg-12">
                        <div id="profile_alert"></div>
                        <div class="row">

                            <input type="hidden" name="user_id" id="user_id" value="">
                            <input type="hidden" name="tiuser_email" id="tiuser_email" value="">
                            <div class="col-lg-12 px-5">
                                <form action="#" method="POST" id="profile_edit_form" class="accordion-flush admin_edit">

                                    <meta name="csrf-token" content="{{ csrf_token() }}" />
                                    <div class="row">
                                        <div class="col-lg" id="conditional_title_array">

                                        </div>
                                        <div class="col-lg">
                                            <label  class="fw-bold"  for="name">First Name</label>
                                            <input type="text" name="firstName" class="form-control rounded-0 " id="firstName" value="">
                                            <div class="invalid-feedback"></div>
                                        </div> <div class="col-lg">
                                            <label  class="fw-bold"  for="name">Other Names</label>
                                            <input type="text" name="otherNames" class="form-control rounded-0 " id="otherNames" value="">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="col-lg">
                                            <label  class="fw-bold" for="name">Email <span class="spanned_or_phone">or Phone</span></label>
                                            <input type="text" name="unique_id" class="form-control rounded-0 " id="unique_id" value="">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg">
                                            <label  class="fw-bold" for="gender">Gender</label>
                                            <select name="gender"  id="gender" class="form-select rounded-0 ">
                                                <option selected value="">--Select--</option>
                                                @foreach(config('membership.gender') as $gender)
                                                    <option value="{{$gender['id']}}" >
                                                        {{$gender['text']}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="col-lg">
                                            <label  class="fw-bolder" for="year_joined">Year Joined VOSH</label>
                                            <input  data-toggle="tooltip" data-placement="bottom" title="The year you joined VOSH Church Int'l not necessarily Buru Buru!" type="date" name="year_joined" class="form-control rounded-0 profile_edit" id="year_joined" value="">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="col-lg">
                                            <label  class="fw-bold" for="dob" class="">Date of Birth</label>
                                            <input type="date"  name="dob" class="form-control rounded-0 " id="dob" value="">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg">
                                            <label class="fw-bold hide-status" for="phone">Phone</label>
                                            <div class="input-group">
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
                                            <label  class="fw-bold hide-status" for="marital_status">Marital Status</label>
                                            <select  name="marital_status" id="marital_status" class="form-select rounded-0  hide-status hide-field">
                                                <option selected value="">--Select--</option>
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


                                            <select name="estate" id="estate" class="form-select rounded-0 profile_edit">
                                                <option selected value="">--Select--</option>
                                                @foreach(config('membership.sub_county') as $sub_county)
                                                    <option value="{{$sub_county['id']}}" >
                                                        {{count(explode(' ', $sub_county['text'])) > 2 ? explode(' ', $sub_county['text'])[0].' '.explode(' ', $sub_county['text'])[1] : explode(' ', $sub_county['text'])[0]}}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="col-lg hide_ward_get_sub_county">

                                        </div>

                                        <div class="col-lg">
                                            <label  class="fw-bold" for="cell_group">Cell Group</label>
                                            <select  name="cell_group" id="cell_group" class="form-select rounded-0 ">
                                                <option selected value="">--Select--</option>
                                                @foreach(config('membership.cell_group') as $cell_group)
                                                    <option value="{{$cell_group['id']}}" >
                                                        {{$cell_group['text']}}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg">
                                            <label  class="fw-bold" for="education_level">Level of Education</label>
                                            <select  name="education_level" id="education_level" class="form-select rounded-0 ">
                                                <option selected value="">--Select--</option>
                                                @foreach(config('membership.level_of_education') as $level_of_education)
                                                    <option value="{{$level_of_education['id']}}" >
                                                        {{$level_of_education['text']}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-lg">
                                            <label  class="fw-bold" for="born_again">Born Again</label>
                                            <select  name="born_again" id="born_again" class="form-select rounded-0 ">
                                                <option selected value="">--Select--</option>
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
                                            <select  name="leadership_status" id="leadership_status" class="form-select rounded-0 ">
                                                <option selected value="">--Select--</option>
                                                @foreach(config('membership.flag') as $flag)
                                                    <option value="{{$flag['id']}}" >
                                                        {{$flag['text']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg" >
                                            <label  class="fw-bold" for="ministry">Key Ministry</label>
                                            <select  name="ministry" id="ministry" class="form-select rounded-0 ">
                                                <option selected value="">--Select--</option>
                                                @foreach(config('membership.ministry') as $ministry)
                                                    <option value="{{$ministry['id']}}" >
                                                        {{$ministry['text']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">`
                                        <label  class="fw-bold" for="leadership_status">Other Ministries/ Ministries of Interest (Tick as appropriate)</label>
                                        @foreach(config('membership.ministry') as $ministry)
                                            <div class="form-check col-lg">
                                                <input type="checkbox" class="check_box" id="check_box" name="check_box[]" value="{{$ministry['id']}}">
                                                <label  class="" class="form-check-label" for="check1">{{$ministry['text']}}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="row">
                                        <div class="col-lg">
                                            <label  class="fw-bold hide-status" for="occupation">Occupation/Specialization</label>
                                            <select  name="occupation" id="occupation" class="form-select rounded-0  hide-status hide-field">
                                                <option selected value="">--Select--</option>
                                                @foreach(config('membership.occupation') as $occupation)
                                                    <option value="{{$occupation['id']}}" >
                                                        {{$occupation['text']}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-lg">
                                            <label  class="fw-bold hide-status" for="employment_status">Employment Status</label>
                                            <select  name="employment_status" id="employment_status" class="form-select rounded-0  hide-status hide-field">
                                                <option selected value="">--Select--</option>
                                                @foreach(config('membership.employment_status') as $employment_status)
                                                    <option value="{{$employment_status['id']}}" >
                                                        {{$employment_status['text']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{--                                    <input type="submit" id="admin_profile_edit_btn" value="Submit" class="btn bg-primary">--}}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" id="admin_profile_edit_btn" value="Submit" class="btn bg-success">
                </div>
            </div>
        </div>
    </div>

    {{--Delete Modal--}}

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-danger">

                    <h5 class="delete-modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <input type="" id="delete_user_id" value="" hidden="hidden">
                <input type="" id="delete_user_fn" value="" hidden="hidden">
                <div id="delete_alert"></div>
                <div class="modal-body">
                    <form method="" id="">
                        <div class="my-2 delete_data">
                            <label  class="fw-bold hide-status" for="delete_data">Reason for Deletion</label>
                            <select  name="delete_data" id="delete_data" class="form-select rounded-0  hide-status hide-field">
                                <option selected value="">--Select--</option>
                                @foreach(config('membership.delete_reason') as $delete_reason)
                                    <option value="{{$delete_reason['id']}}" >
                                        {{$delete_reason['text']}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback"></div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="button" class="btn btn-danger rounded-0 float-end" value="Delete" id="delete_btn">
                    {{--                <button type="submit" class="btn btn-danger">Delete</button>--}}
                </div>
            </div>
        </div>
    </div>

    {{--    Review Registration Modal--}}

    <div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-danger modal_color">

                    <h5 class="decline-modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <input type="" id="decline_user_id" value="" hidden="hidden">
                <input type="" id="registration_status" value="" hidden="hidden">
                <input type="" id="decline_action" value="" hidden="hidden">
                <input type="" id="decline_first_name" value="" hidden="hidden">
                <div class="modal-body">
                    <form method="POST" id="review_form">
                        <div id="decline_alert"></div>
                        <div class="show-for-declining">

                            @csrf
                            <div class="my-2">
                                @if (isset($member) && $member->registration_status ==5)
                                    <label  class="fw-bold hide-status condition_decline_reason_title" for="decline_data">Reason for Approval</label>

                                    <select  name="decline_data" id="decline_data" class="form-select rounded-0  hide-status hide-field">
                                        <option value="">--Select--</option>
                                        @foreach(config('membership.decline_reason') as $decline)
                                            <option value="{{$decline['id']}}" >
                                                {{$decline['text']}}</option>
                                        @endforeach
                                    </select>
                                @endif
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="button" class="btn btn-danger float-end" value="Decline" id="review_btn">
                </div>
            </div>
        </div>
    </div>

    {{--Activate Modal--}}

    <div class="modal fade" id="activateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="deactivate-modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <input type="" id="deactivate_user_id" value="" hidden="hidden">
                <input type="" id="data_activate" value="" hidden="hidden">
                <div id="deactivate_alert"></div>
                <div class="modal-body">
                    <form method="" id="">

                        <div class="my-2 hide-delete-field">
                            <label  class="fw-bold hide-status" for="deactivate_data" id="delete-reason"></label>
                            <input type="hidden" id="deactivate_error_alert">
                            <div class="invalid-feedback"></div>
                            <select  name="deactivate_data" id="deactivate_data" class="form-select rounded-0  hide-status hide-field">
                                <option selected value="">--Select--</option>
                                @foreach(config('membership.deactivate_reason') as $deactivate_reason)
                                    <option value="{{$deactivate_reason['id']}}" >
                                        {{$deactivate_reason['text']}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback"></div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id = 'deactivate_btn' class="btn bg-warning">Deactivate</button>
                </div>
            </div>
        </div>
    </div>
</div>

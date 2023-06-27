<div class="side-profile-here">
    <input type="hidden" value="1" id="testa">
    <input type="hidden" id="display_for_progress" value="{{$display_for_progress?:''}}">
    <input type="hidden" id="progressive_registration" value="{{$progressive_registration}}">
    <div>

        <div style="float: left; width: 75%; height: 38px" class="bar_ups bg-primary text-white"><h2 class="mb-4">{{in_array($category_name, config('membership.statuses.cell_group'))?$category_name. ' Cell Group Members':$category_name.' '.($category_detail_description)}}<span class="spanned_status_category display_for_progress text-danger text-warning text-success bg-body"></span> <span class="spanned_conditional_display"></span></h2></div>
        <div style="float: left" class="mr-2 ml-5">
            <div style="float: left">
                <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                    <li class="nav-item dropdown text-center">
                        <a class="text-black nav-link dropdown-toggle bg-success" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><span><i class=""></i></span>More Criteria</a>

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
            <div style="float: right">
                <select name="" id="report_status_category" class="form-select rounded display_for_progress bg-success bg-warning bg-danger bg-info"  style="color: white">
                    <option value="active">Status</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                    <option value="deleted">Deleted</option>
                    <option value="all">All</option>

                </select>
            </div>
            <input type="hidden" id="member_category_name" data-category="{{$category}}" data-category_name="{{$category_name??null}}" data-member_category="{{$member_age_cluster_category_id ?? null}}">
        </div>
        <input type="hidden" value="{{auth()->user()->hasPermissionTo(config('membership.permissions.Add_Members.text'))}}" id="can-add-members">
        <div style="float: right" id="add_new_one"><button class="btn btn-primary" id="edit_modal_button"  data-bs-toggle="modal" data-bs-target="#editModal"><span><i class="fa fa-user-plus text-black"></i> </span>Add Member</button></div>



    </div>
    <diV id="tbldv">
        <div class="table table-responsive m-2" id="main">
            <input type="hidden" id="auth_user_role" value="{{$auth_user_role}}">
            <table id="dt_select" class="table table-striped table-bordered thead-dark" style="border-top: 1px solid #dddddd; border-bottom: 1px solid #dddddd ">
                <thead>
                @if($priv)
                <tr>
                    <th rowspan="2">S/R</th>
                    <th rowspan="2">Member Number</th>
                    <th rowspan="2">Title</th>
                    <th rowspan="2">First Name</th>
                    <th rowspan="2">Other Names</th>
                    <th rowspan="2">Cell Group</th>
                    <th rowspan="2">Role</th>
                    <th colspan="10" class="permissions-column" style="text-align: center; background-color: #f1f1f1; border: 1px solid #ccc;">
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

                @else
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
                    <th class="conditional_show" data-id="{{in_array($category_name, config('membership.statuses.cell_group')) ?? false}}">Cell Group</th>
                    <th>Employment Status</th>
                    <th>Leadership Status</th>
                    <th>Occupation</th>
                    <th>Other/ Ministries of Interest</th>
                    <th>Level of Education</th>
                    <th>Registered</th>
                    <th>Year Joined</th>
                    <th class="removed removed-table-head"></th>
                    <th class="hide_for_execs">Actions</th>
                </tr>
                @endif
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
                            @if($priv)
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
                            @else
                            <td>{{$loop->iteration}}</td>
                            <td>{{$member->member_number??''}}</td>
                            <td>{{config('membership.statuses.title')[$member->title]['text']??''}}</td>
                            <td>{{explode(' ', $member->name)[0] ?? ''}}</td>
                            <td>{{implode(' ', array_slice(explode(' ', $member->name), 1)) ?? ''}}</td>
                            <td>{{isset($member->phone)?$member->phone:''}}</td>
                            <td>{{$years??''}}</td>
{{--                            <td>{{$full_age??''}}</td>--}}
                            <td>{{isset($member->born_again_id)?config('membership.statuses.flag')[$member->born_again_id]:''}}</td>
                            <td>{{isset($member->gender)?config('membership.statuses.gender')[$member->gender]:''}}</td>
                            <td>{{isset($marital_status_id)?$marital_status_id:''}}</td>
                            <td>{{$sub_county}}</td>
                            <td>{{config('membership.statuses.sub_county')[$member->estate_id]['wards'][$member->ward]['text'] ?? ''}}</td>
                            <td class="conditional_show" data-id="{{in_array($category_name, config('membership.statuses.cell_group')) ?? false}}">{{isset($member->cell_group_id)?config('membership.statuses.cell_group')[$member->cell_group_id]:''}}</td>
                            <td>{{isset($employment_status_id)?$employment_status_id:''}}</td>
                            <td>{{isset($member->leadership_status_id)?config('membership.statuses.flag')[$member->leadership_status_id]:''}}</td>
                            <td>{{isset($occupation_id)?$occupation_id:''}}</td>
                            <td>{{isset($ministries)?$ministries:''}}</td>
                            <td>{{isset($member->education_level_id)?config('membership.statuses.level_of_education')[$member->education_level_id]:''}}</td>
                            <td>{{isset($member->created_at) ? \Carbon\Carbon::parse($member->created_at)->diffForHumans() : ''}}</td>
                            <td>{{$member->year_joined?explode('-', explode(' ', $member->year_joined)[0])[0]:''}}</td>
                            @php
                            if (isset($member->delete_reason)){
                                $removed_reason = config('membership.statuses.delete_reason')[$member->delete_reason]['text'];
                            }else if (isset($member->deactivate_reason)){
                                $removed_reason = config('membership.statuses.deactivate_reason')[$member->deactivate_reason]['text'];
                            }else if (isset($member->decline_reason)){
                                $removed_reason = config('membership.statuses.deactivate_reason')[$member->decline_reason]['text'];
                            }else{
                                $removed_reason = '';
                            }
//                            @endphp
                            <td class="removed removed-table-data">{{$removed_reason}}</td>
                            @endif
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
<script>
        $(document).ready( function () {

            // $('#phone').prop('disabled', true);

            $('#unique_id').on('blur', function (e){
                e.preventDefault()
                var elementContent = $('.edit-modal-title').html();

                if (elementContent.indexOf('Register') !== -1) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: '{{route('align_phone')}}',
                        method: 'post',
                        // data: $(this).serialize()+ "&id="+id,
                        data: {
                            unique_id: $(this).val(),
                        },
                        dataType: 'json',
                        success: function (response) {
                            if (response.status == 200) {
                                // $('#phone').prop('disabled', true);
                                $('#phone').val(response.unique_id)
                            } else {
                                // $('#phone').prop('disabled', false);
                            }
                        }
                    });
                }
            });

            var input = document.querySelector("#phone");
            var iti = window.intlTelInput(input, {
                preferredCountries: ["KE"] // Set Kenya as a preferred country
            });

            var countryCodeInput = document.querySelector("#country_code");
            countryCodeInput.addEventListener("change", function() {
                var countryCode = this.value;
                input.setAttribute("data-country_code", countryCode);
                iti.setCountry(countryCode);
            });

            if ($('#can-add-members').val() != 1) {
                $('#editModal').on('show.bs.modal', function(e) {
                    e.preventDefault();
                    $(this).modal('hide');
                });
                $('#add_new_one').hover(function (e) {
                    e.preventDefault()
                    $('#edit_modal_button').html('Restricted Action')
                    $('#edit_modal_button').removeClass('btn-primary')
                    $('#edit_modal_button').addClass('btn-danger')
                },
                    function(e) {
                        e.preventDefault();
                        $('#edit_modal_button').html('Add New Member');
                        $('#edit_modal_button').addClass('btn-primary')
                        $('#edit_modal_button').removeClass('btn-danger')
                    }
                );
            }
            //have the below section in the status based members file
            if ($('#auth_user_role').val() == 'Cell Group Pastor' && $('#display_for_progress').val() == 1) {
                if ($('#conditional-hide').data('registration_status') > 2) {
                    $('#conditional-hide option').prop('disabled', true);
                }
            } else if ($('#auth_user_role').val() == 'Secretary' && $('#display_for_progress').val() == 1) {
                if ($('#conditional-hide').data('registration_status') > 3) {
                    $('#conditional-hide option').prop('disabled', true);
                }
            } else if ($('#auth_user_role').val() == 'View') {
                $('#conditional-hide option').prop('disabled', true);
            }


            // Event listener for the "Clear Selection" button
            $('#clear_role_button').click(function () {
                // Find all the checked radio buttons within the form
                $('#assign_role_form input[type="radio"]:checked').prop('checked', false);
            });
            $('.removed').hide()
            if ($('#display_for_progress').val() == 1) {
                $('.display_for_progress').hide()
                $('.bar_ups').addClass('text-white')
                $('.bar_ups').addClass('text-center')

                if ($('#progressive_registration').val() == 0) {
                    $('.bar_ups').removeClass('bg-primary')
                    $('.bar_ups').addClass('bg-danger')
                    $('.removed').show()
                    $('.removed-table-head').html('Decline Reason')
                } else if ($('#progressive_registration').val() < 3 && $('#progressive_registration').val() > 0) {
                    $('.spanned_conditional_display').html(' at Cell Group Level')
                    if ($('#progressive_registration').val() == 1) {
                        $('.bar_ups').removeClass('bg-primary')
                        $('.bar_ups').addClass('bg-secondary')
                    } else {
                        $('.bar_ups').removeClass('bg-primary')
                        $('.bar_ups').addClass('bg-warning')
                    }
                } else {
                    $('.spanned_conditional_display').html('  Church Members')
                    if ($('#progressive_registration').val() == 3) {
                    } else if ($('#progressive_registration').val() == 4) {
                        $('.bar_ups').removeClass('bg-primary')
                        $('.bar_ups').addClass('bg-info')
                    } else {
                        $('.bar_ups').removeClass('bg-primary')
                        $('.bar_ups').addClass('bg-success')
                    }
                }
            }

            $('.hide_ward_get_sub_county').hide()
            $('#report_status_category').val('active')
            $('#report_status_category').removeClass('bg-warning')
            $('#report_status_category').removeClass('bg-danger')
            $('#conditional_report_status').val($('#conditional_report_status').data('active'))
            $('.spanned_status_category').html(' -Active')

            $('.spanned_status_category').removeClass('text-danger')
            $('.spanned_status_category').removeClass('text-warning')

            $.getScript("https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js", function () {
                $.getScript("https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js", function () {
                    $.getScript("https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js", function () {
                        $.getScript("https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js", function () {
                            $('<link>')
                                .appendTo('head')
                                .attr({
                                    type: 'text/css',
                                    rel: 'stylesheet',
                                    href: 'https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css'
                                });

                            $('#report_status_category').change(function (e) {
                                e.preventDefault()
                                // return;
                                var active = $(this).val()
                                var category_name = $('#member_category_name').data('category_name')
                                var member_category = $('#member_category_name').data('member_category')
                                var category = $('#member_category_name').data('category')


                                if ($(this).val() == 'inactive') {
                                    $('#report_status_category').removeClass('bg-success')
                                    $('#report_status_category').addClass('bg-warning')
                                    $('#report_status_category').removeClass('bg-danger')
                                    $('#report_status_category').removeClass('bg-info')
                                    $('#conditional_report_status').val($('#conditional_report_status').data('inactive'))
                                    $('.spanned_status_category').html(' -Inactive')
                                    $('.removed').show()
                                    $('.removed-table-head').html('Deactivating Reason')

                                    $('.spanned_status_category').addClass('text-warning')
                                    $('.spanned_status_category').removeClass('text-success')
                                    $('.spanned_status_category').removeClass('text-danger')
                                } else if ($(this).val() == 'deleted') {
                                    $('#report_status_category').removeClass('bg-success')
                                    $('#report_status_category').removeClass('bg-warning')
                                    $('#report_status_category').removeClass('bg-info')
                                    $('#report_status_category').addClass('bg-danger')
                                    $('#conditional_report_status').val($('#conditional_report_status').data('deleted'))
                                    $('.spanned_status_category').html(' -Deleted')
                                    $('.removed').show()
                                    $('.removed-table-head').html('Deleting Reason')

                                    $('.spanned_status_category').removeClass('text-warning')
                                    $('.spanned_status_category').removeClass('text-success')
                                    $('.spanned_status_category').addClass('text-danger')

                                    $('.hide_for_deleted').hide()
                                    $('.show_for_deleted').show()
                                } else if ($(this).val() == 'all') {
                                    $('#report_status_category').removeClass('bg-success')
                                    $('#report_status_category').removeClass('bg-warning')
                                    $('#report_status_category').removeClass('bg-danger')
                                    $('#report_status_category').addClass('bg-info')
                                    $('#conditional_report_status').val($('#conditional_report_status').data('all'))
                                    $('.spanned_status_category').html(' -All Registered')
                                    $('.removed').hide()
                                    $('.removed-table-head').html('Deleting/ Deactivating/ Decline Reason')

                                    $('.spanned_status_category').removeClass('text-warning')
                                    $('.spanned_status_category').removeClass('text-success')
                                    $('.spanned_status_category').removeClass('text-danger')
                                    $('.spanned_status_category').addClass('text-info')
                                } else if ($(this).val() == 'active'){
                                    $('#report_status_category').addClass('bg-success')
                                    $('#report_status_category').removeClass('bg-warning')
                                    $('#report_status_category').removeClass('bg-danger')
                                    $('#report_status_category').removeClass('bg-info')
                                    $('#conditional_report_status').val($('#conditional_report_status').data('active'))
                                    $('.spanned_status_category').html(' -Active')
                                    $('.removed').hide()
                                    $('.removed-table-head').html('')

                                    $('.spanned_status_category').removeClass('text-warning')
                                    $('.spanned_status_category').addClass('text-success')
                                    $('.spanned_status_category').removeClass('text-danger')
                                }

                                $.ajax({
                                    url: '/status-based-members',
                                    method: 'get',
                                    data: {
                                        active: active,
                                        category_name: category_name,
                                        member_category: member_category,
                                        category: category,
                                    },
                                    success: function (response) {
                                        $('#tbldv').html(response)

                                        var buttons = [
                                            'copy', 'csv', 'excel', 'pdf', 'print'
                                        ];

                                        var tableOptions = {
                                            responsive: true,
                                            dom: 'lBfrtip',
                                            buttons: buttons,
                                            // pageLength: 6, // Set the number of records per page
                                            columns: [
                                                { visible: false }, // hide the first column
                                                // { visible: false }, // Show the second column
                                                null, // Show the second column
                                                null, // Show the third column
                                                null, // Show the fourth column
                                                null, // Show the fifth column
                                                null, // Show the sixth column
                                                null, // Show the seventh column
                                                null, // Show the eigth column
                                                null, // Show the nineth column
                                                null, // Show the tenth column
                                                null, // Show the 11th column
                                                null, // Show the 12th column
                                                null, // Show the 13th column
                                                null, // Show the 14th column
                                                null, // Show the 15th column
                                                null, // Show the 16th column
                                                null, // Show the 17th column
                                                // Add more null values for additional visible columns
                                            ],
                                            select: {
                                                style: 'multi', // Allow multiple row selection
                                            },
                                            order: [], // Disable initial sorting
                                            searching: true,
                                        };

                                        if (category_name != 'Privileged Users') {
                                            // tableOptions.pageLength = 8; // Set the number of records per page
                                            tableOptions.columns = [
                                                { visible: false }, // Show the second column
                                                null, // Show the second column
                                                null, // Show the third column
                                                null, // Show the fourth column
                                                null, // Show the fifth column
                                                null, // Show the 6th column
                                                null, // Show the 7th column
                                                null, // Show the 8th column
                                                null, // Show the 9th column
                                                null, // Show the 10th column
                                                null, // Show the 11th column
                                                null, // Show the 12th column
                                                null, // Show the 12th column
                                                null, // Show the 15th column
                                                null, // Show the 16th column
                                                null, // Show the 17th column
                                                { visible: false }, // Show the 18th column
                                                { visible: false }, // Show the 19th column
                                                { visible: false }, // Show the 20th column
                                                { visible: false }, // Show the 21st column
                                                { visible: false }, // Show the 22nd column
                                                null, // Show the 23rd column
                                            ];
                                        }

                                        var table = $('#dt_select').DataTable(tableOptions);


                                        // Show all columns when exporting
                                        table.buttons().container()
                                            .appendTo('#dt_select_wrapper .col-md-6:eq(0)');
                                        // Set the current pageLength value in the length menu
                                        $('.dataTables_length select').val(table.page.len());
                                    }
                                });


                            })
                        });
                    });
                });
            });






            $('.hide_ward').hide()

            // $('.conditional_show').data('id')==true ? $('.conditional_show').hide() : $('.conditional_show').show()
            $("body").on('click', '#delete', function (e) {
                e.preventDefault()
                if ($(this).data('existing') == 1){
                    $('.delete-modal-title').html('Delete '+$(this).data('user_name'))
                }else {
                    $('.delete-modal-title').html('Reinstate '+$(this).data('user_name'))
                    $('.delete_data').hide()
                    $('#delete_btn').val('Reinstate')
                }

                $('#delete_user_id').val($(this).data('id'))
                $('#delete_user_fn').val($(this).data('user_first_name'))
            })
            $("body").on('click', '#deactivate', function (e) {
                e.preventDefault()
                $('#data_activate').val($(this).data('activate'))
                $('#deactivate_user_id').val($(this).data('id'))
                if($('#data_activate').val() ==1){
                    $('#deactivate_btn').html('Deactivate')
                    $('.deactivate-modal-title').html('Deactivate '+$(this).data('user_name'))
                    $('#delete-reason').html('Reason for Deactivating')
                }else{
                    $('#deactivate_btn').html('Activate')
                    $('.deactivate-modal-title').html('Activate '+$(this).data('user_name'))
                    $('#delete-reason').html('Reason for Activating')
                    $('.hide-delete-field').hide()
                }
            })
            $("body").on('click', '#edit, #add_new_one', function (e) {
                if(e.target.id == 'edit'){
                    $('.spanned_or_phone').hide()
                }else {
                    $('.spanned_or_phone').show()
                }
                e.preventDefault()
                $('.edit-modal-title').html('Edit '+$(this).data('user_first_name'))
                $('#user_id').val($(this).data('id'))
                $('#firstName').val($(this).data('user_first_name'))
                $('#otherNames').val($(this).data('user_other_names'))
                $('#email').val($(this).data('user_email'))
                $('#phone').val($(this).data('user_phone'))
                $('#user_name').val($(this).data('u_name'))
                $('.user_name_hide').removeAttr('hidden')

                let email = $('#email').val();
                $.ajax({
                    url: '/conditional_title_array',
                    method: 'get',
                    // data: $(this).serialize()+ "&id="+id,
                    data: {
                        email:email
                    },
                    success: function (response) {
                        $('#conditional_title_array').html(response)
                    }
                });

            })
            $("body").on('click', '#add_new_one', function (e) {
                e.preventDefault()
                $('#user_id').val('')
                $('#name').val('')
                $('#email').val('')
                $('#phone').val('')
                $('.edit-modal-title').html('Register New Member')
                $('.user_name_hide').addAttribute('hidden')
            })
            $('#delete_btn').click(function (e){
                e.preventDefault();
                let id = $('#delete_user_id').val();

                let delete_reason = $('#delete_data').val()
                let first_name = $('#delete_user_fn').val()
                if ($('#delete').data('existing') == 1) {
                    $(this).val('Deleting...');
                }else {
                    $(this).val('Reinstating...')
                    $(this).removeClass('btn-danger')
                    $(this).addClass('btn-warning')
                }


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '{{route('destroy')}}',
                    method: 'post',
                    // data: $(this).serialize()+ "&id="+id,
                    data: {
                        id: id,
                        delete_reason: delete_reason,
                        first_name: first_name,
                    },
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 400){
                            showError('delete_data', response.messages.delete_reason);
                            $('#delete_btn').val('Delete');
                        }
                        else if (response.status == 200){
                            $('#delete_alert').html(showMessage('success', response.messages));
                            $('#delete_btn').val('Delete');

                            setTimeout(function() {
                                window.location.href = "{{route('profile')}}"
                            }, 1000);
                            $('#delete_form')[0].reset();
                        }
                    }
                });
            });
            $('#deactivate_btn').click(function (e){
                e.preventDefault();
                let id = $('#deactivate_user_id').val();
                let deactivate_reason = $('#deactivate_data').val()

                if ($(this).html() == 'Activate'){
                    $(this).val('Activating...');
                }else {
                    $(this).val('Deactivating...');``
                }


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '{{route('deactivate')}}',
                    method: 'post',
                    data: {
                        id: id,
                        deactivate_reason: deactivate_reason
                    },
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 400){
                            showError('deactivate_data', response.messages.deactivate_reason);
                            $('#deactivate_btn').val('Deactivate');
                        }
                        else if (response.status == 200){
                            console.log(response);
                            $('#deactivate_alert').html(showMessage('success', response.messages));
                            $('#deactivate_btn').val('Deactivate');

                            setTimeout(function() {
                                window.location.href = "{{route('profile')}}"
                            }, 1000);
                        }
                    }
                });
            });

            $('body').on('click', '#role', function (e) {
                e.preventDefault()
                $('.role-modal-title').html('Assign Role to '+$(this).data('user_name'))
                $('#role_user_id').val($(this).data('id'))

                let id = $(this).data('id')

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '{{route('members.assign_id')}}',
                    method: 'post',
                    data: {
                        id:id
                    },
                    // dataType: 'json',
                    success: function (response) {
                        $('#with_id').html(response)

                    }
                });

            })

            $('body').on('click', '#admin_profile_edit_btn', function (e){
                e.preventDefault();

                let id = $('#user_id').val()
                $('#admin_profile_edit_btn').val('Submitting...');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '{{route('members.create')}}',
                    method: 'post',
                    data: $('#profile_edit_form').serialize()+ `&id=+${id}`,
                    dataType: 'json',
                    success: function (response) {
                        if(response.status == 400){
                            showError('firstName', response.messages.firstName);
                            showError('otherNames', response.messages.otherNames);
                            showError('unique_id', response.messages.unique_id);
                            showError('dob', response.messages.dob);
                            showError('title', response.messages.title);
                            showError('cell_group', response.messages.cell_group);
                            showError('phone', response.messages.phone);
                            showError('year_joined', response.messages.year_joined);
                            $('#admin_profile_edit_btn').val('Submit');
                        }
                        else if (response.status == 200){

                            $('#profile_alert').html(showMessage('success', response.messages));
                            removeValidationClasses('#profile_edit_form');
                            $('#admin_profile_edit_btn').val('Submit');

                            setTimeout(function() {
                                window.location.href = "{{route('profile')}}"
                            }, 2000);
                        }
                    }
                });
            });
            $('body').on('click', '#assign_role_button', function (e){
                e.preventDefault();



                let id = $('#role_user_id').val();
                let role_id = $('input[name="role_id"]:checked').val(); // Get the selected role ID

                $(this).val('Assigning...');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '{{route('members.assign')}}',
                    method: 'post',
                    // data: $('#assign_role_form').serialize()+ `&id=+${id}`,
                    data: {
                        id: id,
                        role_id: role_id // Pass the selected role ID as role_id
                    },
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 200){
                            console.log(response);
                            $('#assign_alert').html(showMessage('success', response.messages));
                            $(this).val('Assign');

                            setTimeout(function() {
                                window.location.href = "{{route('profile')}}"
                            }, 3000);
                        }
                    }
                });
            });
            $('body').on('click', '#review_btn', function (e) {
                e.preventDefault()
                let member_id = $('#decline_user_id').val()
                let registration_status = $('#registration_status').val()
                let decline_action = $('#decline_action').val()
                let member_first_name = $('#decline_first_name').val()

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '{{route('admin.review-membership')}}',
                    method: 'post',
                    data: $('#review_form').serialize()+ "&id="+member_id+ "&registration_status="+registration_status+ "&decline_action="+decline_action+ "&member_first_name="+member_first_name,
                    // dataType: 'json',
                    success: function (res) {
                        if(res.status == 400){
                            showError('decline_data', res.messages.decline_data);
                        }
                        else if(res.status == 200){
                            $('#decline_alert').html(showMessage('success', res.messages));
                            setTimeout(function() {
                                $('#reviewModal').modal('hide');
                            }, 3000);

                        }
                    }
                });
            })
            $('body').on('click', '#reviewRegistration', function (e) {
                e.preventDefault()
                $('#registration_status').val($(this).data('registration_status'))
                $('#decline_first_name').val($(this).data('user_first_name'))
                if($('#registration_status').val() ==5){
                    $('.show-for-declining').show()
                }else{
                    $('.show-for-declining').hide()
                }
                $('#decline_user_id').val($(this).data('id'))
                if($(this).data('registration_status') == 1){
                    $('.modal_color').removeClass('bg-danger')
                    $('.modal_color').addClass('bg-warning')
                    $('#review_btn').val('Approve')
                    $('#review_btn').removeClass('btn-danger')
                    $('#review_btn').addClass('bg-warning')
                    $('.decline-modal-title').addClass('text-white')
                    $('#review_btn').addClass('text-white')
                    $('.decline-modal-title').html('Prepare '+$(this).data('user_name')+ " 's Member in "+$(this).data('cell_group'))
                }else if($(this).data('registration_status') == 2){
                    $('.modal_color').removeClass('bg-danger')
                    $('.modal_color').addClass('bg-primary')
                    $('#review_btn').val('Approve')
                    $('#review_btn').removeClass('btn-danger')
                    $('#review_btn').addClass('bg-primary')
                    $('.decline-modal-title').addClass('text-white')
                    $('#review_btn').addClass('text-white')
                    $('.decline-modal-title').html('Submit '+$(this).data('user_name')+ " 's Details as a "+$(this).data('cell_group')+' member for Review')
                }else if($(this).data('registration_status') == 3){
                    $('.modal_color').removeClass('bg-danger')
                    $('.modal_color').addClass('bg-info')
                    $('#review_btn').val('Approve')
                    $('#review_btn').removeClass('btn-danger')
                    $('#review_btn').addClass('bg-info')
                    $('.decline-modal-title').addClass('text-white')
                    $('#review_btn').addClass('text-white')
                    $('.decline-modal-title').html('Review '+$(this).data('user_name')+ " 's Membership Request from "+$(this).data('cell_group'))
                }else if($(this).data('registration_status') == 4){
                    $('.modal_color').removeClass('bg-danger')
                    $('.modal_color').addClass('bg-success')
                    $('#review_btn').val('Approve')
                    $('#review_btn').removeClass('btn-danger')
                    $('#review_btn').addClass('bg-success')
                    $('.decline-modal-title').addClass('text-white')
                    $('#review_btn').addClass('text-white')
                    $('.decline-modal-title').html('Approve '+$(this).data('user_name')+ " 's Membership from "+$(this).data('cell_group'))
                }else if($(this).data('registration_status') == 5){
                    $('.decline-modal-title').addClass('text-white')
                    $('#review_btn').addClass('text-white')
                    $('.decline-modal-title').html('Decline '+$(this).data('user_name')+ " 's Membership")
                    $('.condition_decline_reason_title').html('Reason for Decline')
                    $('#decline_action').val(true);
                }else {
                    $('.decline-modal-title').addClass('text-white')
                    $('#review_btn').addClass('text-white')
                    $('.decline-modal-title').html('Reinstate '+$(this).data('user_name')+ " 's Membership")
                    $('.condition_decline_reason_title').html('Reason for Reinstating')
                    $('#review_btn').val('Reinstate')
                }
            })
        })

    </script>



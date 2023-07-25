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
                            <li class="nav-item dropdown bg-info">
                                <a class="text-black nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><span><i class="fa fa-bars"></i></span></a>

                                <ul class="dropdown-menu dropdown-menu-end bg-info" aria-labelledby="navbarDropdown">
                                    <li>
                                        <a  href="#" data-id="{{$member->id}}" data-user_first_name="{{explode(' ', $member->name)[0]}}" data-user_other_names="{{isset($member->name)?implode(' ', array_slice(explode(' ', $member->name), 1)):''}}" data-u_name="{{$member->user_name}}" data-user_email="{{$member->email}}"  data-user_phone="{{$member->phone}}" id="edit" value="{{$member->id}}" class="dropdown-item btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fa fa-edit"></i>
                                            Edit
                                        </a>
                                    </li>
                                    <li>
                                        <a  href="#" data-id="{{$member->id}}" data-existing="{{$member->existing}}"  data-hide="{{auth()->id()}}" data-user_first_name="{{explode(' ', $member->name)[0]}}" data-user_name="{{$member->name}}" id="delete" value="" class="dropdown-item hide-this" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                            @if($member->existing == 1)
                                                <i class="fa fa-trash"></i>
                                                Delete
                                            @else
                                                <i class="fa fa-undo"></i>
                                                Reinstate
                                            @endif
                                        </a>
                                    </li>
                                    <li>
                                        <a  href="#" data-id="{{$member->id}}" data-hide="{{auth()->id()}}" data-user_name="{{$member->name}}" data-activate="{{$member->active}}" id="deactivate" value="{{$member->id}}" class="dropdown-item user_status  hide-this" data-bs-toggle="modal" data-bs-target="#activateModal">
                                            @if($member->active !== 1)
                                                <i class="fa fa-toggle-on"></i>
                                                Activate
                                            @else
                                                <i class="fa fa-toggle-off"></i>
                                                Deactivate
                                            @endif
                                        </a>
                                    </li>
                                    @if(auth()->user()->hasPermissionTo(config('membership.permissions.Assign_Role.text')))
                                        <li>
                                            <a href="#" data-id="{{$member->id}}" data-user_title="{{$member->name}}" data-user_name="{{$member->name}}" data-user_email="{{$member->email}}"  data-user_phone="{{$member->phone}}" id="role" value="{{$member->id}}" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#roleModal">
                                                <i class="fas fa-user-tag"></i>
                                                Assign Role
                                            </a>
                                        </li>
                                    @endif
                                    <li>
                                        <a href="#" class="dropdown-item" data-cell_group="{{config('membership.statuses.cell_group')[$member->cell_group_id]??null}}" data-user_first_name="{{explode(' ', $member->name)[0]}}"  data-user_name="{{$member->name}}" data-id="{{$member->id}}" data-bs-toggle="modal" data-bs-target="#reviewModal" data-registration_status="{{$member->registration_status}}" id="reviewRegistration">
                                            @if($member->registration_status== config('membership.registration_statuses.cell_group_registered.id'))
                                                <i class="fas fa-clipboard-check"></i>
                                                Prepare
                                            @elseif($member->registration_status== config('membership.registration_statuses.cell_group_approved.id'))
                                                <i class="fas fa-check"></i>
                                                Submit
                                            @elseif($member->registration_status== config('membership.registration_statuses.church_registered.id'))
                                                <i class="fas fa-search"></i>
                                                Review
                                            @elseif($member->registration_status== config('membership.registration_statuses.church_provisionally_approved.id'))
                                                <i class="fas fa-thumbs-up"></i>
                                                Approve
                                            @elseif($member->registration_status== config('membership.registration_statuses.church_approved.id'))
                                                <i class="fas fa-thumbs-down"></i>
                                                Decline
                                            @else
                                                <i class="fas fa-undo"></i>
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


<script>
    $(document).ready( function () {

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
    })
</script>

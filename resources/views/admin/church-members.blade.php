<div class="side-profile-here">
    <input type="hidden" value="1" id="testa">
    <div>

        <div style="float: left; width: 75%; height: 38px" class="bg-primary"><h2 class="mb-4">{{in_array($category_name, config('membership.statuses.cell_group'))?$category_name. ' Cell Group Members':$category_name}}<span class="spanned_status_category"></span> </h2></div>
        <div style="float: left">
            <select name="" id="report_status_category" class="form-select rounded  bg-success bg-warning bg-danger"  style="color: white">
                <option value="active">--Choose Report Category--</option>
                <option value="active">Active Members</option>
                <option value="inactive">Inactive Members</option>
                <option value="deleted">Deleted Members</option>

            </select>
            <input type="hidden" id="member_category_name" data-category="{{$category}}" data-category_name="{{$category_name??null}}" data-member_category="{{$member_category ?? null}}">
        </div>
        <div style="float: right"><button class="btn btn-primary"  data-bs-toggle="modal" id="add_new_one" data-bs-target="#editModal">Add New Member</button></div>


    </div>
    <diV id="tbldv">
        <div class="table table-responsive m-2" id="main">
            <table id="dt_select" class="table table-striped table-bordered thead-dark" style="border-top: 1px solid #dddddd; border-bottom: 1px solid #dddddd ">
                <thead>
                <tr>
                    <th>S/R</th>
                    <th>User Name</th>
                    <th>Name</th>
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
                    <th>Ministries of Interest</th>
                    <th>Level of Education</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tboby>
                    @foreach($members as $member)
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


                            ?>


                        <tr class="item{--><!--{$member->id}}">
                            <td>{{$loop->iteration}}</td>
                            <td>{{isset($member->user_name)?$member->user_name:''}}</td>
                            <td>{{isset($member->name)?$member->name:''}}</td>
                            <td>{{isset($member->phone)?$member->phone:''}}</td>
                            <td>{{isset($member->dob)?\Illuminate\Support\Carbon::parse($member->dob)->age:''}}</td>
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
                            <td>
                                <select id="" name="" class="browser-default">
                                    <option data-id="{{$member->id}}" data-user_name="{{$member->name}}" data-u_name="{{$member->user_name}}" data-user_email="{{$member->email}}"  data-user_phone="{{$member->phone}}" id="edit" value="{{$member->id}}" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
                                        Edit
                                    </option>
                                    <option data-id="{{$member->id}}"  data-hide="{{auth()->id()}}" data-user_name="{{$member->name}}" id="delete" value="" class="btn btn-primary hide-this" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</option>
                                    <option data-id="{{$member->id}}" data-hide="{{auth()->id()}}" data-user_name="{{$member->name}}" id="deactivate" value="{{$member->id}}" class="user_status  hide-this" data-bs-toggle="modal" data-bs-target="#activateModal">
                                        @if($member->active !== 1)
                                            Activate

                                        @else
                                            Deactivate
                                        @endif
                                    </option>
                                    <option data-id="{{$member->id}}" data-user_name="{{$member->name}}" data-user_email="{{$member->email}}"  data-user_phone="{{$member->phone}}" id="role" value="{{$member->id}}" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#roleModal">
                                        Assign Role
                                    </option>
                                </select>

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
                                </tr>
                                </thead>
                                <tbody>
                                <div id="with_id">
                                    <tr>
                                        @foreach(config('membership.roles') as $role)

                                            <td>
                                                <input type="checkbox" class="check_box" id="check_box" name="check_box[]" value="{{$role['id']}}" data-role="" @php $model_has_role=\App\Models\ModelHasRole::where('mode_id', $member->id)->where('role_id', $role['id'])->first();@endphp @if(isset($model_has_role)) checked @endif>
                                            </td>
                                        @endforeach

                                    </tr>
                                </div>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>

                <div class="modal-footer">
                    <input type="button" class="btn btn-primary" id="assign_role_button" data-bs-popper="" value="Assign">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
                            <div class="col-lg-12 px-5">
                                <form action="#" method="POST" id="profile_edit_form" class="accordion-flush admin_edit">

                                    <meta name="csrf-token" content="{{ csrf_token() }}" />
                                    {{--                                    <div class="my-2">--}}
                                    {{--                                        <label  class="fw-bold"  for="name">Full Name</label>--}}
                                    {{--                                        <input type="text" name="name" class="form-control rounded-0 " id="name" value="">--}}
                                    {{--                                    </div>--}}
                                    {{--                                    <div class="my-2">--}}
                                    {{--                                        <label  class="fw-bold" for="name">Email</label>--}}
                                    {{--                                        <input type="email" name="email" class="form-control rounded-0 " id="email" value="">--}}
                                    {{--                                    </div>--}}
                                    <div class="row">
                                        <div class="col-lg">
                                            <label  class="fw-bold"  for="name">Full Name</label>
                                            <input type="text" name="name" class="form-control rounded-0 " id="name" value="">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="col-lg">
                                            <label  class="fw-bold" for="name">Email</label>
                                            <input type="email" name="email" class="form-control rounded-0 " id="email" value="">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="col-lg user_name_hide" hidden="hidden">
                                            <label  class="fw-bold" for="name">User Name</label>
                                            <input type="user_name" disabled name="user_name" class="form-control rounded-0 profile_edit" id="user_name" value="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg">
                                            <label  class="fw-bold" for="gender">Gender</label>
                                            <select name="gender"  id="gender" class="form-select rounded-0 ">
                                                <option selected disabled>--Select--</option>
                                                @foreach(config('membership.gender') as $gender)
                                                    <option value="{{$gender['id']}}" >
                                                        {{$gender['text']}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="col-lg"  >
                                            <label  class="fw-bold" for="dob" class="">Date of Birth</label>
                                            <input type="date"  name="dob" class="form-control rounded-0 " id="dob" value="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg">
                                            <label  class="fw-bold hide-status" for="phone">Phone</label>
                                            <input type="tel"   name="phone" class="form-control rounded-0  hide-status hide-field" id="phone" value="">
                                        </div>
                                        <div class="col-lg">
                                            <label  class="fw-bold hide-status" for="marital_status">Marital Status</label>
                                            <select  name="marital_status" id="marital_status" class="form-select rounded-0  hide-status hide-field">
                                                <option selected disabled>--Select--</option>
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
                                                <option selected disabled>--Select--</option>
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
                                                <option selected disabled>--Select--</option>
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
                                            <select  name="education_level" id="education_level" class="form-select rounded-0 ">
                                                <option selected disabled>--Select--</option>
                                                @foreach(config('membership.level_of_education') as $level_of_education)
                                                    <option value="{{$level_of_education['id']}}" >
                                                        {{$level_of_education['text']}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-lg">
                                            <label  class="fw-bold" for="born_again">Born Again</label>
                                            <select  name="born_again" id="born_again" class="form-select rounded-0 ">
                                                <option selected disabled>--Select--</option>
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
                                                <option selected disabled>--Select--</option>
                                                @foreach(config('membership.flag') as $flag)
                                                    <option value="{{$flag['id']}}" >
                                                        {{$flag['text']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg" >
                                            <label  class="fw-bold" for="ministry">Current Ministry</label>
                                            <select  name="ministry" id="ministry" class="form-select rounded-0 ">
                                                <option selected disabled>--Select--</option>
                                                @foreach(config('membership.ministry') as $ministry)
                                                    <option value="{{$ministry['id']}}" >
                                                        {{$ministry['text']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
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
                                            <label  class="fw-bold hide-status" for="occupation">Occupation/Specialization</label>
                                            <select  name="occupation" id="occupation" class="form-select rounded-0  hide-status hide-field">
                                                <option selected disabled>--Select--</option>
                                                @foreach(config('membership.occupation') as $occupation)
                                                    <option value="{{$occupation['id']}}" >
                                                        {{$occupation['text']}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-lg">
                                            <label  class="fw-bold hide-status" for="employment_status">Employment Status</label>
                                            <select  name="employment_status" id="employment_status" class="form-select rounded-0  hide-status hide-field">
                                                <option selected disabled>--Select--</option>
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
                <div id="delete_alert"></div>
                <div class="modal-body">
                    <form method="" id="">
                        <div class="my-2">
                            <label  class="fw-bold hide-status" for="delelete_data">Reason for Deletion</label>
                            <select  name="delelete_data" id="delelete_data" class="form-select rounded-0  hide-status hide-field">
                                <option selected disabled>--Select--</option>
                                @foreach(config('membership.delete_reason') as $delete_reason)
                                    <option value="{{$delete_reason['id']}}" >
                                        {{$delete_reason['text']}}</option>
                                @endforeach
                            </select>
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

    {{--Activate Modal--}}

    <div class="modal fade" id="activateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="deactivate-modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <input type="" id="deactivate_user_id" value="" hidden="hidden">
                <div id="deactivate_alert"></div>
                <div class="modal-body">
                    <form method="" id="">

                        <div class="my-2">
                            <label  class="fw-bold hide-status" for="deactivate_data">Reason for Deactivating</label>
                            <select  name="deactivate_data" id="deactivate_data" class="form-select rounded-0  hide-status hide-field">
                                <option selected disabled>--Select--</option>
                                @foreach(config('membership.deactivate_reason') as $deactivate_reason)
                                    <option value="{{$deactivate_reason['id']}}" >
                                        {{$deactivate_reason['text']}}</option>
                                @endforeach
                            </select>
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
    <script>
        $(document).ready( function () {
            $('.hide_ward_get_sub_county').hide()
            $('#report_status_category').val('active')
            $('#report_status_category').removeClass('bg-warning')
            $('#report_status_category').removeClass('bg-danger')
            $('#conditional_report_status').val($('#conditional_report_status').data('active'))
            $('.spanned_status_category').html(' (Active)')
            $('#report_status_category').change(function (e){
                e.preventDefault()
                var active = $(this).val()
                var category_name =$('#member_category_name').data('category_name')
                var member_category =$('#member_category_name').data('member_category')
                var category =$('#member_category_name').data('category')


                if($(this).val() == 'inactive'){
                    $('#report_status_category').removeClass('bg-success')
                    $('#report_status_category').addClass('bg-warning')
                    $('#report_status_category').removeClass('bg-danger')
                    $('#conditional_report_status').val($('#conditional_report_status').data('inactive'))
                    $('.spanned_status_category').html(' (Inactive)')
                }else if($(this).val() == 'deleted'){
                    $('#report_status_category').removeClass('bg-success')
                    $('#report_status_category').removeClass('bg-warning')
                    $('#report_status_category').addClass('bg-danger')
                    $('#conditional_report_status').val($('#conditional_report_status').data('deleted'))
                    $('.spanned_status_category').html(' (Deleted)')
                    $('.hide_for_deleted').hide()
                    $('.show_for_deleted').show()
                }else {
                    $('#report_status_category').addClass('bg-success')
                    $('#report_status_category').removeClass('bg-warning')
                    $('#report_status_category').removeClass('bg-danger')
                    $('#conditional_report_status').val($('#conditional_report_status').data('active'))
                    $('.spanned_status_category').html(' (Active)')
                }

                $.ajax({
                    url: '/members',
                    method: 'get',
                    // data: $(this).serialize()+ "&id="+id,
                    data: {
                        active: active,
                        category_name:category_name,
                        member_category:member_category,
                        category:category
                    },
                    // dataType: 'json',
                    success: function (response) {
                        $('#tbldv').html(response)
                    }
                });


            })

            $('.hide_ward').hide()

            $('.conditional_show').data('id')==true ? $('.conditional_show').hide() : $('.conditional_show').show()
            $("body").on('click', '#delete', function (e) {
                e.preventDefault()
                $('.delete-modal-title').html('Delete '+$(this).data('user_name'))
                $('#delete_user_id').val($(this).data('id'))
            })
            $("body").on('click', '#deactivate', function (e) {
                e.preventDefault()
                $('.deactivate-modal-title').html('Deactivate '+$(this).data('user_name'))
                $('#deactivate_user_id').val($(this).data('id'))
                if($('#deactivate_user_id').val() ==1){
                    $('#deactivate_btn').html('Deactivate')
                }else{
                    $('#deactivate_btn').html('Activate')
                }
            })
            $("body").on('click', '#edit', function (e) {
                e.preventDefault()
                $('.edit-modal-title').html('Edit '+$(this).data('user_name'))
                $('#user_id').val($(this).data('id'))
                $('#name').val($(this).data('user_name'))
                $('#email').val($(this).data('user_email'))
                $('#phone').val($(this).data('user_phone'))
                $('#user_name').val($(this).data('u_name'))
                $('.user_name_hide').removeAttr('hidden')
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

                let delete_reason = $('#delelete_data').val()
                $(this).val('Deleting...');


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
                        delete_reason: delete_reason
                    },
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 200){
                            console.log(response);
                            $('#delete_alert').html(showMessage('success', response.messages));
                            $('#delete_btn').val('Delete');

                            setTimeout(function() {
                                window.location.href = "{{route('profile')}}"
                            }, 1000);
                        }
                    }
                });
            });
            $('#deactivate_btn').click(function (e){
                e.preventDefault();
                let id = $('#deactivate_user_id').val();

                let deactivate_reason = $('#deactivate_data').val()

                if ($(this).html() == 'Activate'){
                    $(this).val('Deactivating...');
                }else {
                    $(this).val('Activating...');``
                }


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '{{route('deactivate')}}',
                    method: 'post',
                    // data: $(this).serialize()+ "&id="+id,
                    data: {
                        id: id,
                        deactivate_reason: deactivate_reason
                    },
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 200){
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
                        // $('#with_id').html(response)

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
                        // alert()
                        if(response.status == 400){
                            showError('name', response.messages.name);
                            showError('email', response.messages.email);
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



                let id = $('#role_user_id').val()
                $(this).val('Assigning...');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '{{route('members.assign')}}',
                    method: 'post',
                    data: $('#assign_role_form').serialize()+ `&id=+${id}`,
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 200){
                            console.log(response);
                            $('#assign_alert').html(showMessage('success', response.messages));
                            $(this).val('Assign');

                            setTimeout(function() {
                                window.location.href = "{{route('profile')}}"
                            }, 2000);
                        }
                    }
                });
            });
        })
    </script>

</div>

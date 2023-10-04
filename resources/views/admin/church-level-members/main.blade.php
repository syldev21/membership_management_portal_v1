
<div>
    <div style="float: left; width: 75%; height: 38px" class="bar_ups bg-primary text-white"><h2 class="mb-4">{!! $status_member_category_description ?? $member_category_description !!}</h2></div>
    <div style="float: left" class="mr-2 ml-5">
        <div style="float: left">
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown text-center">
                    <a class="text-black nav-link dropdown-toggle bg-success" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><span><i class=""></i></span>More</a>

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
        <input type="hidden" id="under_registration" value="{{$under_registration??null}}">
        <div style="float: right">
            <select name="" id="report_status_category" disabled class="form-select rounded display_for_progress bg-success bg-warning bg-danger bg-info"  style="color: white">
                <option value="active">--Status--</option>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
                <option value="deleted">Deleted</option>
                <option value="all">All</option>

            </select>
        </div>
        <input type="hidden" id="member_category_id" data-category_id="{{$church_membership_category??null}}" data-category_class="{{$category_class??null}}">
        <input type="hidden" id="cell_member_category_id" data-category_id="{{$member_category??null}}" data-category_class="{{$gender_based_member??null}}">
    </div>
    <input type="hidden" value="{{auth()->user()->hasPermissionTo(config('membership.permissions.Add_Members.text'))}}" id="can-add-members">
    <div style="float: right" id="add_new_one"><button class="btn btn-primary" id="edit_modal_button"  data-bs-toggle="modal" data-bs-target="#editModal"><span><i class="fa fa-user-plus text-black"></i> </span>Add Member</button></div>



</div>
<diV id="tbldv">
    @include('admin.church-level-members.active')
</diV>
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
<script>
    $(document).ready(function () {
        function showError(field, message) {
            if (!message){
                $('#' + field)
                    .addClass('is-valid')
                    .removeClass('is-invalid')
                    .siblings('.invalid-feedback')
                    .text('');
            }else {
                $('#' + field)
                    .addClass('is-invalid')
                    .removeClass('is-valid')
                    .siblings('.invalid-feedback')
                    .text(message)
            }
        }
        function removeValidationClasses(form){
            $(form).each(function () {
                $(form).find(":input").removeClass('is-invalid, is-invalid')
            })
        }
        $("body").on('click', '#edit, #add_new_one', function (e) {
            if (e.target.id == 'edit') {
                $('.spanned_or_phone').hide()
            } else {
                $('.spanned_or_phone').show()
            }
            e.preventDefault()
            $('.edit-modal-title').html('Edit ' + $(this).data('user_first_name'))
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
                    email: email
                },
                success: function (response) {
                    $('#conditional_title_array').html(response)
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
                    console.log(response)
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
        if($('#under_registration').val() !== 'under registration'){
            $('#report_status_category').removeAttr('disabled')
        }

        $('#report_status_category').removeClass('bg-danger')
        $('#report_status_category').removeClass('bg-info')
        $('#report_status_category').removeClass('bg-warning')
        $('#report_status_category').addClass('bg-success')

        $('#report_status_category').change(function (e) {
            e.preventDefault()
            var active = $(this).val()
            let member_category_class = $('#member_category_id').data('category_class')
            let member_category_id = $('#member_category_id').data('category_id')

            let cell_member_category_class = $('#cell_member_category_id').data('category_class')
            let cell_member_category_id = $('#cell_member_category_id').data('category_id')

            if (active =='active'){
                $('#report_status_category').removeClass('bg-danger')
                $('#report_status_category').removeClass('bg-info')
                $('#report_status_category').removeClass('bg-warning')
                $('#report_status_category').addClass('bg-success')
            }else if (active =='inactive'){
                $('#report_status_category').removeClass('bg-danger')
                $('#report_status_category').removeClass('bg-info')
                $('#report_status_category').addClass('bg-warning')
                $('#report_status_category').removeClass('bg-success')
            }else  if (active =='deleted'){
                $('#report_status_category').addClass('bg-danger')
                $('#report_status_category').removeClass('bg-info')
                $('#report_status_category').removeClass('bg-warning')
                $('#report_status_category').removeClass('bg-success')
            }else{
                $('#report_status_category').removeClass('bg-danger')
                $('#report_status_category').addClass('bg-info')
                $('#report_status_category').removeClass('bg-warning')
                $('#report_status_category').removeClass('bg-success')
            }
            if(member_category_id !== ''){
                $.ajax({
                    url: '/church-status-based-members',
                    method: 'get',
                    data: {
                        active: active,
                        member_category_class: member_category_class,
                        member_category_id: member_category_id,
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
            }else if (cell_member_category_id !== ''){
                $.ajax({
                    url: '/cell-church-status-based-members',
                    method: 'get',
                    data: {
                        active: active,
                        cell_member_gender_category: cell_member_category_class,
                        cell_group_id: cell_member_category_id,
                    },
                    success: function (response) {
                        $('#tbldv').html(response)
                    }
                });
            }

        })
    })
</script>

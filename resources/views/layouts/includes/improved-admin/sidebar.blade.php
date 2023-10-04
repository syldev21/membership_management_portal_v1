<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
    <div class="nano">
        <div class="nano-content">
            <ul>
                <li class="fw-bolder text-white">
                    VOSH CHURCH BURUBURU
                </li>
                <?php
                    if (auth()->user()){
                        $route = auth()->user()->can('See Members')? route('admin-dashboard'): '/profile-page';
                    }

                ?>
                <a href="{{$route??''}}" style="display: flex; align-items: center;">
                    <img src="{{asset('images/vosh_official_logo.jpg')}}" alt="Vosh Official Logo" data-toggle="tooltip" data-placement="top" style="max-width: 100%; height: auto; margin: 0 auto;">
                </a>
                <li class="label">Membership Management</li>
                @if(auth()->user()->can('See Members'))
                    <li>
                        <a class="nav-link text-white" href="{{ route('admin-dashboard') }}"><i class="ti-home"></i> Dashboard</a>
                    </li>
{{--                    <li>--}}
{{--                        <a class="nav-link text-white" href="{{ route('admin-dashboard') }}"><i class="text-white fa fa-genderless text-white"></i>&nbsp;Dashboard</a>--}}
{{--                    </li>--}}
                <li><a class="sidebar-sub-toggle"><i class="fa fa-church"></i> Members at Church Level <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a class="church-members" href="#" data-id="{{config('membership.age_clusters.All_members.id')}}"><i class="text-white fa fa-group"></i>&nbsp;{{config('membership.age_clusters.All_members.text')}}</a></li>
                        <li>
                            <a class="sidebar-sub-toggle"><i class="ti-bar-chart-alt"></i> Gender <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                <li><a href="#" class="nav-link church-members gender-based" data-id="{{config('membership.gender.male.id')}}"> <i class="text-white fa fa-male"></i> {{config('membership.gender.male.text')}}</li></a>
                                <li><a href="#" class="nav-link church-members gender-based" data-id="{{config('membership.gender.female.id')}}"> <i class="text-white fa fa-female"></i> {{config('membership.gender.female.text')}}</li></a>
                            </ul>
                        </li>
                        <li>
                            <a class="sidebar-sub-toggle"><i class=" fa fa-child"></i> Ages {{config('membership.age_clusters.stage1.start')}}-{{config('membership.age_clusters.stage4.end')}} <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                <li><a class="nav-link church-members text-white" href="#" data-id="{{config('membership.age_clusters.stage1.id')}}"><i class="text-white fa fa-child">&nbsp;</i>{{config('membership.age_clusters.stage1.start')}}-{{config('membership.age_clusters.stage1.end')}}</a></li>
                                <li><a class="nav-link church-members text-white" href="#" data-id="{{config('membership.age_clusters.stage2.id')}}"><i class="text-white fa fa-child">&nbsp;</i>{{config('membership.age_clusters.stage2.start')}}-{{config('membership.age_clusters.stage2.end')}}</a></li>
                                <li><a class="nav-link church-members text-white" href="#" data-id="{{config('membership.age_clusters.stage3.id')}}"><i class="text-white fa fa-child">&nbsp;</i>{{config('membership.age_clusters.stage3.start')}}-{{config('membership.age_clusters.stage3.end')}}</a></li>
                                <li><a class="nav-link church-members text-white" href="#" data-id="{{config('membership.age_clusters.stage4.id')}}"><i class="text-white fa fa-child">&nbsp;</i>{{config('membership.age_clusters.stage4.start')}}-{{config('membership.age_clusters.stage4.end')}}</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="sidebar-sub-toggle"><i class=" fa fa-child-reaching"></i> Ages {{config('membership.age_clusters.stage5.start')}}-{{config('membership.age_clusters.stage8.end')}} <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                <li><a class="nav-link church-members text-white" href="#" data-id="{{config('membership.age_clusters.stage5.id')}}"><i class="text-white fa fa-child-reaching">&nbsp;</i>{{config('membership.age_clusters.stage5.start')}}-{{config('membership.age_clusters.stage5.end')}}</a></li>
                                <li><a class="nav-link church-members text-white" href="#" data-id="{{config('membership.age_clusters.stage6.id')}}"><i class="text-white fa fa-child-reaching">&nbsp;</i>{{config('membership.age_clusters.stage6.start')}}-{{config('membership.age_clusters.stage6.end')}}</a></li>
                                <li><a class="nav-link church-members text-white" href="#" data-id="{{config('membership.age_clusters.stage7.id')}}"><i class="text-white fa fa-child-reaching">&nbsp;</i>{{config('membership.age_clusters.stage7.start')}}-{{config('membership.age_clusters.stage7.end')}}</a></li>
                                <li><a class="nav-link church-members text-white" href="#" data-id="{{config('membership.age_clusters.stage8.id')}}"><i class="text-white fa fa-child-reaching">&nbsp;</i>{{config('membership.age_clusters.stage8.start')}}-{{config('membership.age_clusters.stage8.end')}}</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="sidebar-sub-toggle"><i class="fa fa-person"></i> Ages {{config('membership.age_clusters.stage9.start')}}-{{config('membership.age_clusters.stage12.end')}} <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                <li><a class="nav-link church-members text-white" href="#" data-id="{{config('membership.age_clusters.stage9.id')}}"><i class="text-white fa fa-person">&nbsp;</i>{{config('membership.age_clusters.stage9.start')}}-{{config('membership.age_clusters.stage9.end')}}</a></li>
                                <li><a class="nav-link church-members text-white" href="#" data-id="{{config('membership.age_clusters.stage10.id')}}"><i class="text-white fa fa-person">&nbsp;</i>{{config('membership.age_clusters.stage10.start')}}-{{config('membership.age_clusters.stage10.end')}}</a></li>
                                <li><a class="nav-link church-members text-white" href="#" data-id="{{config('membership.age_clusters.stage11.id')}}"><i class="text-white fa fa-person">&nbsp;</i>{{config('membership.age_clusters.stage11.start')}}-{{config('membership.age_clusters.stage11.end')}}</a></li>
                                <li><a class="nav-link church-members text-white" href="#" data-id="{{config('membership.age_clusters.stage12.id')}}"><i class="text-white fa fa-person">&nbsp;</i>{{config('membership.age_clusters.stage12.start')}}-{{config('membership.age_clusters.stage12.end')}}</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="sidebar-sub-toggle"><i class="fa fa-person-cane"></i> Ages {{config('membership.age_clusters.stage13.start')}}<span class="arrow"> &rarr;</span> <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                <li><a class="nav-link church-members text-white" href="#" data-id="{{config('membership.age_clusters.stage13.id')}}"><i class="text-white fa fa-person-cane">&nbsp;</i>{{config('membership.age_clusters.stage13.start')}}-{{config('membership.age_clusters.stage13.end')}}</a></li>
                                <li><a class="nav-link church-members text-white" href="#" data-id="{{config('membership.age_clusters.stage14.id')}}"><i class="text-white fa fa-person-cane">&nbsp;</i>{{config('membership.age_clusters.stage14.start')}}-{{config('membership.age_clusters.stage14.end')}}</a></li>
                                <li><a class="nav-link church-members text-white" href="#" data-id="{{config('membership.age_clusters.stage15.id')}}"><i class="text-white fa fa-person-cane">&nbsp;</i>{{config('membership.age_clusters.stage15.start')}}-{{config('membership.age_clusters.stage15.end')}}</a></li>
                                <li><a class="nav-link church-members text-white" href="#" data-id="{{config('membership.age_clusters.stage16.id')}}"><i class="text-white fa fa-person-cane">&nbsp;</i>{{config('membership.age_clusters.stage16.start')}}-{{config('membership.age_clusters.stage16.end')}}</a></li>
                                <li><a class="nav-link church-members text-white" href="#" data-id="{{config('membership.age_clusters.stage17.id')}}"><i class="text-white fa fa-person-cane">&nbsp;</i>{{config('membership.age_clusters.stage17.start')}}<span class="arrow"> &rarr;</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a class="sidebar-sub-toggle"><i class="fa fa-group"></i> Cell Group Members <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li>
                            <a class="sidebar-sub-toggle">
                                <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fas fa-k fa-stack-1x fa-inverse"></i>
                                      </span>
                                {{config('membership.cell_group.kiambiu.text')}}
                                <span class="sidebar-collapse-icon ti-angle-down"></span>
                            </a>
                            <ul>
                                <li><a class="nav-link cell_group_members text-white cell-church kiambiu" href="#" data-id="{{config('membership.cell_group.kiambiu.id')}}"><i class="text-white fa fa-group text-white"></i>&nbsp;{{config('membership.age_clusters.All_members.text')}}</a></li>
                                <li><a class="nav-link cell_group_members gender-based text-white kiambiu" data-id="{{config('membership.cell_group.kiambiu.id')}}" href="#" data-gender_cell="{{config('membership.gender.male.id')}}"><i class="text-white fa fa-male text-white"></i>&nbsp;{{config('membership.gender.male.text')}}</a></li>
                                <li><a class="nav-link cell_group_members gender-based text-white kiambiu" data-id="{{config('membership.cell_group.kiambiu.id')}}" href="#" data-gender_cell="{{config('membership.gender.female.id')}}"><i class="text-white fa fa-female text-white"></i>&nbsp;{{config('membership.gender.female.text')}}</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="sidebar-sub-toggle">
                                <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fas fa-u fa-stack-1x fa-inverse"></i>
                                      </span>
                                {{config('membership.cell_group.umoja_bethel.text')}}
                                <span class="sidebar-collapse-icon ti-angle-down"></span>
                            </a>
                            <ul>
                                <li><a class="nav-link cell_group_members text-white cell-church umoja_bethel" href="#" data-id="{{config('membership.cell_group.umoja_bethel.id')}}"><i class="text-white fa fa-group text-white"></i>&nbsp;{{config('membership.age_clusters.All_members.text')}}</a></li>
                                <li><a class="nav-link cell_group_members gender-based text-white umoja_bethel" data-id="{{config('membership.cell_group.umoja_bethel.id')}}" href="#" data-gender_cell="{{config('membership.gender.male.id')}}"><i class="text-white fa fa-male text-white"></i>&nbsp;{{config('membership.gender.male.text')}}</a></li>
                                <li><a class="nav-link cell_group_members gender-based text-white umoja_bethel" data-id="{{config('membership.cell_group.umoja_bethel.id')}}" href="#" data-gender_cell="{{config('membership.gender.female.id')}}"><i class="text-white fa fa-female text-white"></i>&nbsp;{{config('membership.gender.female.text')}}</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="sidebar-sub-toggle">
                                <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fas fa-k fa-stack-1x fa-inverse"></i>
                                      </span>
                                {{config('membership.cell_group.kariobangi_south.text')}}
                                <span class="sidebar-collapse-icon ti-angle-down"></span>
                            </a>
                            <ul>
                                <li><a class="nav-link cell_group_members text-white cell-church kariobangi_south" href="#" data-id="{{config('membership.cell_group.kariobangi_south.id')}}"><i class="text-white fa fa-group text-white"></i>&nbsp;{{config('membership.age_clusters.All_members.text')}}</a></li>
                                <li><a class="nav-link cell_group_members gender-based text-white kariobangi_south" data-id="{{config('membership.cell_group.kariobangi_south.id')}}" href="#" data-gender_cell="{{config('membership.gender.male.id')}}"><i class="text-white fa fa-male text-white"></i>&nbsp;{{config('membership.gender.male.text')}}</a></li>
                                <li><a class="nav-link cell_group_members gender-based text-white kariobangi_south" data-id="{{config('membership.cell_group.kariobangi_south.id')}}" href="#" data-gender_cell="{{config('membership.gender.female.id')}}"><i class="text-white fa fa-female text-white"></i>&nbsp;{{config('membership.gender.female.text')}}</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="sidebar-sub-toggle">
                                <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fas fa-k fa-stack-1x fa-inverse"></i>
                                      </span>
                                {{config('membership.cell_group.chokaa_berea.text')}}
                                <span class="sidebar-collapse-icon ti-angle-down"></span>
                            </a>
                            <ul>
                                <li><a class="nav-link cell_group_members text-white cell-church chokaa_berea" href="#" data-id="{{config('membership.cell_group.chokaa_berea.id')}}"><i class="text-white fa fa-group text-white"></i>&nbsp;{{config('membership.age_clusters.All_members.text')}}</a></li>
                                <li><a class="nav-link cell_group_members gender-based text-white chokaa_berea" data-id="{{config('membership.cell_group.chokaa_berea.id')}}" href="#" data-gender_cell="{{config('membership.gender.male.id')}}"><i class="text-white fa fa-male text-white"></i>&nbsp;{{config('membership.gender.male.text')}}</a></li>
                                <li><a class="nav-link cell_group_members gender-based text-white chokaa_berea" data-id="{{config('membership.cell_group.chokaa_berea.id')}}" href="#" data-gender_cell="{{config('membership.gender.female.id')}}"><i class="text-white fa fa-female text-white"></i>&nbsp;{{config('membership.gender.female.text')}}</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="sidebar-sub-toggle">
                                <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fas fa-c fa-stack-1x fa-inverse"></i>
                                      </span>
                                {{config('membership.cell_group.diaspora.text')}}
                                <span class="sidebar-collapse-icon ti-angle-down"></span>
                            </a>
                            <ul>
                                <li><a class="nav-link cell_group_members text-white cell-church diaspora" href="#" data-id="{{config('membership.cell_group.diaspora.id')}}"><i class="text-white fa fa-group text-white"></i>&nbsp;{{config('membership.age_clusters.All_members.text')}}</a></li>
                                <li><a class="nav-link cell_group_members gender-based text-white diaspora" data-id="{{config('membership.cell_group.diaspora.id')}}" href="#" data-gender_cell="{{config('membership.gender.male.id')}}"><i class="text-white fa fa-male text-white"></i>&nbsp;{{config('membership.gender.male.text')}}</a></li>
                                <li><a class="nav-link cell_group_members gender-based text-white diaspora" data-id="{{config('membership.cell_group.diaspora.id')}}" href="#" data-gender_cell="{{config('membership.gender.female.id')}}"><i class="text-white fa fa-female text-white"></i>&nbsp;{{config('membership.gender.female.text')}}</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="sidebar-sub-toggle">
                                <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fas fa-l fa-stack-1x fa-inverse"></i>
                                      </span>
                                {{config('membership.cell_group.langata.text')}}
                                <span class="sidebar-collapse-icon ti-angle-down"></span>
                            </a>
                            <ul>
                                <li><a class="nav-link cell_group_members text-white cell-church langata" href="#" data-id="{{config('membership.cell_group.langata.id')}}"><i class="text-white fa fa-group text-white"></i>&nbsp;{{config('membership.age_clusters.All_members.text')}}</a></li>
                                <li><a class="nav-link cell_group_members gender-based text-white langata" data-id="{{config('membership.cell_group.langata.id')}}" href="#" data-gender_cell="{{config('membership.gender.male.id')}}"><i class="text-white fa fa-male text-white"></i>&nbsp;{{config('membership.gender.male.text')}}</a></li>
                                <li><a class="nav-link cell_group_members gender-based text-white langata" data-id="{{config('membership.cell_group.langata.id')}}" href="#" data-gender_cell="{{config('membership.gender.female.id')}}"><i class="text-white fa fa-female text-white"></i>&nbsp;{{config('membership.gender.female.text')}}</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="sidebar-sub-toggle">
                                <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fas fa-j fa-stack-1x fa-inverse"></i>
                                      </span>
                                {{config('membership.cell_group.Jericho.text')}}
                                <span class="sidebar-collapse-icon ti-angle-down"></span>
                            </a>
                            <ul>
                                <li><a class="nav-link cell_group_members text-white cell-church Jericho" href="#" data-id="{{config('membership.cell_group.Jericho.id')}}"><i class="text-white fa fa-group text-white"></i>&nbsp;{{config('membership.age_clusters.All_members.text')}}</a></li>
                                <li><a class="nav-link cell_group_members gender-based text-white Jericho" data-id="{{config('membership.cell_group.Jericho.id')}}" href="#" data-gender_cell="{{config('membership.gender.male.id')}}"><i class="text-white fa fa-male text-white"></i>&nbsp;{{config('membership.gender.male.text')}}</a></li>
                                <li><a class="nav-link cell_group_members gender-based text-white Jericho" data-id="{{config('membership.cell_group.Jericho.id')}}" href="#" data-gender_cell="{{config('membership.gender.female.id')}}"><i class="text-white fa fa-female text-white"></i>&nbsp;{{config('membership.gender.female.text')}}</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="sidebar-sub-toggle">
                                <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fas fa-n fa-stack-1x fa-inverse"></i>
                                      </span>
                                {{config('membership.cell_group.not_sure.text')}}
                                <span class="sidebar-collapse-icon ti-angle-down"></span>
                            </a>
                            <ul>
                                <li><a class="nav-link cell_group_members text-white cell-church not_sure" href="#" data-id="{{config('membership.cell_group.not_sure.id')}}"><i class="text-white fa fa-group text-white"></i>&nbsp;{{config('membership.age_clusters.All_members.text')}}</a></li>
                                <li><a class="nav-link cell_group_members gender-based text-white not_sure" data-id="{{config('membership.cell_group.not_sure.id')}}" href="#" data-gender_cell="{{config('membership.gender.male.id')}}"><i class="text-white fa fa-male text-white"></i>&nbsp;{{config('membership.gender.male.text')}}</a></li>
                                <li><a class="nav-link cell_group_members gender-based text-white not_sure" data-id="{{config('membership.cell_group.not_sure.id')}}" href="#" data-gender_cell="{{config('membership.gender.female.id')}}"><i class="text-white fa fa-female text-white"></i>&nbsp;{{config('membership.gender.female.text')}}</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a class="sidebar-sub-toggle"><i class="fa fa-registered"></i> Registration Process <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li>
                            <a class="nav-link progressive-registration text-danger" data-id="{{config('membership.registration_statuses.declined_members.id')}}" href="#" data-bs-toggle="collapse" data-bs-target="#" aria-expanded="false" aria-controls="pagesCollapseSettings">
                                <div class="sb-nav-link-icon text-white"><i class="fas fa-not-equal"></i>{{config('membership.registration_statuses.declined_members.text')}}</div>

                            </a>
                        </li>
                        <li>
                            <a class="sidebar-sub-toggle">
                                <i class="fa fa-group fa-lg">
                                </i>
                                Cell Group Level
                                <span class="sidebar-collapse-icon ti-angle-down"></span>
                            </a>
                            <ul>
                                <li>
                                    <a class="nav-link progressive-registration text-white" href="#" data-id="{{config('membership.registration_statuses.cell_group_registered.id')}}">{{config('membership.registration_statuses.cell_group_registered.text')}}</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="sidebar-sub-toggle">
                                <i class="fa fa-church fa-lg">
                                </i>
                                Church Level
                                <span class="sidebar-collapse-icon ti-angle-down"></span>
                            </a>
                            <ul>
                                <li><a class="nav-link progressive-registration text-white" href="#" data-id="{{config('membership.registration_statuses.church_registered.id')}}">{{config('membership.registration_statuses.church_registered.text')}}</a></li>
                                <li><a class="nav-link progressive-registration text-white" href="#" data-id="{{config('membership.registration_statuses.church_provisionally_approved.id')}}">{{config('membership.registration_statuses.church_provisionally_approved.text')}}</a></li>
                                <li><a class="nav-link progressive-registration text-white" href="#" data-id="{{config('membership.registration_statuses.church_approved.id')}}">{{config('membership.registration_statuses.church_approved.text')}}</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                    <li>
                        <a class="nav-link text-white privilged_users" href="#"><i class="ti-star"></i> Privileged Users</a>
                    </li>
                    <li>
                        <a class="nav-link collapsed text-white activity_log" data-column_filter="1" id="activity_log" href="#" data-bs-toggle="collapse" data-bs-target="#" aria-expanded="false" aria-controls="pagesCollapseSettings">
                            <div class="sb-nav-link-icon text-white"><i class="fas fa-history"></i> Activity Log</div>
                        </a>
                    </li>
                @endif
                <li>
                    <a class="sidebar-sub-toggle"><i class="fa fa-registered"></i> Settings <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a class="nav-link text-white" href="/auth-reset"><i class="fas fa-key text-white"></i>&nbsp;Reset Password</a></li>
                        <li><a class="nav-link text-white" href="/logout"><i class="text-white fa fa-genderless text-white"></i>&nbsp;Logout</a></li>
                        <li><a class="nav-link text-white" id="add-member" href="#"><i class="text-white fa fa-user-plus text-white"></i>&nbsp;Add New Member</a></li>
                    </ul>
                </li>


            </ul>

        </div>

    </div>
</div>
<script>
    $(document).ready(function () {
        $('.activity_log').click(function (e) {
            e.preventDefault()
            $.ajax({
                url: '/activity-log',
                success: function (data) {
                    $('#replace-content').html(data);
                }
            });
        })
        $('.church-members').click(function (e) {
            e.preventDefault()
            let member_category = $(this).data('id');
            let category = $(this).attr('class')
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '/church-members',
                data: {
                    member_category: member_category,
                    category: category,
                },
                success: function (data) {
                    $('#replace-content').html(data);
                }
            });
        })
        $('.cell_group_members').click(function (e) {
                e.preventDefault()
            let member_category = $(this).data('id');
            let gender_based_member = $(this).data('gender_cell')
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/cell-group-members',
                data: {
                    member_category: member_category,
                    gender_based_member: gender_based_member
                },
                success: function (data) {
                    $('#replace-content').html(data);
                }
            });
        })
        $('.progressive-registration').click(function (e) {
                e.preventDefault()
            let registration_level = $(this).data('id');
            $.ajax({
                url: '/members-under-registration',
                data: {
                    registration_level: registration_level,
                },
                success: function (data) {
                    $('#replace-content').html(data);
                }
            });
        })
        $('.privilged_users').click(function (e){
            e.preventDefault()
            $.ajax({
                url: '/privileged-users',
                success: function (response) {
                    $('#replace-content').html(response);
                }
            })
        })
        if ($('#logged_in_user_role').val() == 'Preparer') {
            var logged_in_user_cell_group = $('#logged_in_user_role').data('id');
            $('.collapsed-cell-categories').each(function() {
                if ($(this).data('cell_id') == logged_in_user_cell_group) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }
        $('#add-member').click(function (e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{route('members.create')}}',
                method: 'POST',
                success: function (res) {
                    {{--window.location = '{{ route('profile) }}'--}}
                }
            })
        })
    })
</script>

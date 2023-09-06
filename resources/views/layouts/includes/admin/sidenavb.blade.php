<div id="layoutSidenav_nav" style="background-color: #243c5a; color: white;">
    <nav class="sb-sidenav accordion" style="background-color: #243c5a;">
        <input type="hidden" name="" data-id="{{\Illuminate\Support\Facades\Auth::user()->cell_group_id}}" id="logged_in_user_role" value="{{\Illuminate\Support\Facades\Auth::user()->roles()->first()->name??null}}">
        <div class="sb-sidenav-menu fw-bolder fs-6 text-white" style="background-color: #1b2a42;">
            <div class="nav">
                <div class="">
                    {{--                    <a href="{{route('profile')}}"><img src="{{asset('images/login.jpeg')}}" data-toggle="tooltip" data-placement="top"></a>--}}

                    <a href="{{route('profile')}}" style="display: flex; align-items: center;">
                        <img src="{{asset('images/vosh_official_logo.jpg')}}" alt="Vosh Official Logo" data-toggle="tooltip" data-placement="top" style="max-width: 100%; height: auto; margin: 0 auto;">
                    </a>
                </div>
                <input type="hidden" class="is_a_cell_group_pastor" data-cell_group="{{\App\Models\User::where('id', auth()->id())->with('roles')->first()->cell_group_id??null}}" value="{{\App\Models\User::where('id', auth()->id())->with('roles')->first()->roles[0]->role_id??null}}">
                @if(auth()->user()->can('See Members'))
                    {{--                @if(auth()->user()->hasAnyRole())--}}
                    <a class="nav-link table-responsive admin_dashboard" href="#" style="color: white;">
                        <div class="sb-nav-link-icon"><i class="text-white fa fa-list-ol"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading" style="color: #5cb85c;">Membership Management</div>
                    <a class="nav-link collapsed text-body" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages" style="border-color: #f0ad4e;">
                        <div class="sb-nav-link-icon text-white"><i class="text-white fa fa-group"></i></div>
                        Cell Group Members
                        <div class="sb-sidenav-collapse-arrow text-white"><i class="text-white fa fa-angle-double-down"></i></div>
                    </a>

                    <div class="collapse text-dark" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link church-members" href="#" data-id="{{config('membership.age_clusters.All_members.id')}}"><i class="text-white fa fa-group"></i>&nbsp;{{config('membership.age_clusters.All_members.text')}}</a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseGender" aria-expanded="false" aria-controls="pagesCollapseCellGroupLevel" id="cell">
                                <div class="sb-nav-link-icon"><i class="text-white fas fa-genderless"></i></div>
                                Gender
                                <div class="sb-sidenav-collapse-arrow"><i class="text-white fa fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapseGender" aria-labelledby="headingOne" data-bs-parent="#collapseLayouts">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link church-members gender-based text-dark" href="#" data-id="{{config('membership.gender.male.id')}}"><i class="text-white fa fa-male"></i>{{config('membership.gender.male.text')}}</a>
                                    <a class="nav-link church-members gender-based text-dark" href="#" data-id="{{config('membership.gender.female.id')}}"><i class="text-white fa fa-female"></i>{{config('membership.gender.female.text')}}</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapse41" aria-expanded="false" aria-controls="pagesCollapseCellGroupLevel" id="cell">
                                <div class="sb-nav-link-icon"><i class="text-white fa fa-child"></i></div>
                                Ages {{config('membership.age_clusters.stage1.start')}}-{{config('membership.age_clusters.stage4.end')}}
                                <div class="sb-sidenav-collapse-arrow"><i class="text-white fa fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapse41" aria-labelledby="headingOne" data-bs-parent="#collapseLayouts">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link church-members text-dark" href="#" data-id="{{config('membership.age_clusters.stage1.id')}}"><i class="text-white fa fa-child"></i>&nbsp;{{config('membership.age_clusters.stage1.start')}}-{{config('membership.age_clusters.stage1.end')}}</a>
                                    <a class="nav-link church-members text-dark" href="#" data-id="{{config('membership.age_clusters.stage2.id')}}"><i class="text-white fa fa-child"></i>&nbsp;{{config('membership.age_clusters.stage2.start')}}-{{config('membership.age_clusters.stage2.end')}}</a>
                                    <a class="nav-link church-members text-dark" href="#" data-id="{{config('membership.age_clusters.stage3.id')}}"><i class="text-white fa fa-child"></i>&nbsp;{{config('membership.age_clusters.stage3.start')}}-{{config('membership.age_clusters.stage3.end')}}</a>
                                    <a class="nav-link church-members text-dark" href="#" data-id="{{config('membership.age_clusters.stage4.id')}}"><i class="text-white fa fa-child"></i>&nbsp;{{config('membership.age_clusters.stage4.start')}}-{{config('membership.age_clusters.stage4.end')}}</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapse42" aria-expanded="false" aria-controls="pagesCollapseCellGroupLevel" id="cell">
                                <div class="sb-nav-link-icon"><i class="text-white fa fa-child-reaching"></i></div>
                                Ages {{config('membership.age_clusters.stage5.start')}}-{{config('membership.age_clusters.stage8.end')}}
                                <div class="sb-sidenav-collapse-arrow"><i class="text-white fa fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapse42" aria-labelledby="headingOne" data-bs-parent="#collapseLayouts">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link church-members text-dark" href="#" data-id="{{config('membership.age_clusters.stage5.id')}}"><i class="text-white fa fa-child-reaching">&nbsp;</i>{{config('membership.age_clusters.stage5.start')}}-{{config('membership.age_clusters.stage5.end')}}</a>
                                    <a class="nav-link church-members text-dark" href="#" data-id="{{config('membership.age_clusters.stage6.id')}}"><i class="text-white fa fa-child-reaching">&nbsp;</i>{{config('membership.age_clusters.stage6.start')}}-{{config('membership.age_clusters.stage6.end')}}</a>
                                    <a class="nav-link church-members text-dark" href="#" data-id="{{config('membership.age_clusters.stage7.id')}}"><i class="text-white fa fa-child-reaching">&nbsp;</i>{{config('membership.age_clusters.stage7.start')}}-{{config('membership.age_clusters.stage7.end')}}</a>
                                    <a class="nav-link church-members text-dark" href="#" data-id="{{config('membership.age_clusters.stage8.id')}}"><i class="text-white fa fa-child-reaching">&nbsp;</i>{{config('membership.age_clusters.stage8.start')}}-{{config('membership.age_clusters.stage8.end')}}</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapse43" aria-expanded="false" aria-controls="pagesCollapseCellGroupLevel" id="cell">
                                <div class="sb-nav-link-icon"><i class="text-white fa fa-person"></i></div>
                                Ages {{config('membership.age_clusters.stage9.start')}}-{{config('membership.age_clusters.stage12.end')}}
                                <div class="sb-sidenav-collapse-arrow"><i class="text-white fa fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapse43" aria-labelledby="headingOne" data-bs-parent="#collapseLayouts">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link church-members text-dark" href="#" data-id="{{config('membership.age_clusters.stage9.id')}}"><i class="text-white fa fa-person"></i>&nbsp;{{config('membership.age_clusters.stage9.start')}}-{{config('membership.age_clusters.stage9.end')}}</a>
                                    <a class="nav-link church-members text-dark" href="#" data-id="{{config('membership.age_clusters.stage10.id')}}"><i class="text-white fa fa-person"></i>&nbsp;{{config('membership.age_clusters.stage10.start')}}-{{config('membership.age_clusters.stage10.end')}}</a>
                                    <a class="nav-link church-members text-dark" href="#" data-id="{{config('membership.age_clusters.stage11.id')}}"><i class="text-white fa fa-person"></i>&nbsp;{{config('membership.age_clusters.stage11.start')}}-{{config('membership.age_clusters.stage11.end')}}</a>
                                    <a class="nav-link church-members text-dark" href="#" data-id="{{config('membership.age_clusters.stage12.id')}}"><i class="text-white fa fa-person"></i>&nbsp;{{config('membership.age_clusters.stage12.start')}}-{{config('membership.age_clusters.stage12.end')}}</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapse44" aria-expanded="false" aria-controls="pagesCollapseCellGroupLevel" id="cell">
                                <div class="sb-nav-link-icon"><i class="text-white fa fa-person-cane"></i></div>
                                Ages {{config('membership.age_clusters.stage13.start')}} and Older
                                <div class="sb-sidenav-collapse-arrow"><i class="text-white fa fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapse44" aria-labelledby="headingOne" data-bs-parent="#collapseLayouts">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link church-members text-dark" href="#" data-id="{{config('membership.age_clusters.stage13.id')}}"><i class="text-white fa fa-person-cane"></i>&nbsp;{{config('membership.age_clusters.stage13.start')}}-{{config('membership.age_clusters.stage13.end')}}</a>
                                    <a class="nav-link church-members text-dark" href="#" data-id="{{config('membership.age_clusters.stage14.id')}}"><i class="text-white fa fa-person-cane"></i>&nbsp;{{config('membership.age_clusters.stage14.start')}}-{{config('membership.age_clusters.stage14.end')}}</a>
                                    <a class="nav-link church-members text-dark" href="#" data-id="{{config('membership.age_clusters.stage15.id')}}"><i class="text-white fa fa-person-cane"></i>&nbsp;{{config('membership.age_clusters.stage15.start')}}-{{config('membership.age_clusters.stage15.end')}}</a>
                                    <a class="nav-link church-members text-dark" href="#" data-id="{{config('membership.age_clusters.stage16.id')}}"><i class="text-white fa fa-person-cane"></i>&nbsp;{{config('membership.age_clusters.stage16.start')}}-{{config('membership.age_clusters.stage16.end')}}</a>
                                    <a class="nav-link church-members text-dark" href="#" data-id="{{config('membership.age_clusters.stage17.id')}}"><i class="text-white fa fa-person-cane"></i>&nbsp;{{config('membership.age_clusters.stage17.start')}} and Older</a>
                                </nav>
                            </div>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" hidden="" href="" id="add-member" data-bs-toggle="" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                        <div class="sb-nav-link-icon"><i class="text-white fa fa-columns"></i></div>
                        Add New Member
                    </a>

                    <a class="nav-link collapsed text-body" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseRegistration" aria-expanded="false" aria-controls="pagesCollapseRegistration" id="registration">
                        <div class="sb-nav-link-icon text-white"><i class="text-white fa fa-registered"></i></div>
                        Registration Process
                        <div class="sb-sidenav-collapse-arrow text-white"><i class="text-white fa fa-angle-double-down"></i></div>
                    </a>
                    <div class="collapse" id="pagesCollapseRegistration" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link progressive-registration text-danger" data-id="{{config('membership.registration_statuses.declined_members.id')}}" href="#" data-bs-toggle="collapse" data-bs-target="#" aria-expanded="false" aria-controls="pagesCollapseSettings">
                                <div class="sb-nav-link-icon text-white"><i class="fas fa-not-equal"></i></div>
                                {{config('membership.registration_statuses.declined_members.text')}}
                            </a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseCellGroupLevel" aria-expanded="false" aria-controls="pagesCollapseCellGroupLevel" id="cell">
                                <div class="sb-nav-link-icon"><i class="text-white fa fa-group fa-lg"></i></div>
                                Cell Group Level
                                <div class="sb-sidenav-collapse-arrow"><i class="text-white fa fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapseCellGroupLevel" aria-labelledby="headingOne" data-bs-parent="#pagesCollapseRegistration">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link progressive-registration text-dark" href="#" data-id="{{config('membership.registration_statuses.cell_group_registered.id')}}">{{config('membership.registration_statuses.cell_group_registered.text')}}</a>
                                    {{--                                    <a class="nav-link progressive-registration text-dark" href="#" data-id="{{config('membership.registration_statuses.cell_group_approved.id')}}">{{config('membership.registration_statuses.cell_group_approved.text')}}</a>--}}
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseChurchLevel" aria-expanded="false" aria-controls="pagesCollapseChurchLevel" id="church">
                                <div class="sb-nav-link-icon"><i class="text-white fa fa-church fa-lg"></i></div>
                                Church Level
                                <div class="sb-sidenav-collapse-arrow"><i class="text-white fa fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapseChurchLevel" aria-labelledby="headingOne" data-bs-parent="#pagesCollapseRegistration">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link progressive-registration text-dark" href="#" data-id="{{config('membership.registration_statuses.church_registered.id')}}">{{config('membership.registration_statuses.church_registered.text')}}</a>
                                    <a class="nav-link progressive-registration text-dark" href="#" data-id="{{config('membership.registration_statuses.church_provisionally_approved.id')}}">{{config('membership.registration_statuses.church_provisionally_approved.text')}}</a>
                                    <a class="nav-link progressive-registration text-dark" href="#" data-id="{{config('membership.registration_statuses.church_approved.id')}}">{{config('membership.registration_statuses.church_approved.text')}}</a>
                                </nav>
                            </div>
                        </nav>
                    </div>
                    <a class="nav-link collapsed text-body" data-column_filter="1" id="priviledged_users" href="#" data-bs-toggle="collapse" data-bs-target="#" aria-expanded="false" aria-controls="pagesCollapseSettings">
                        <div class="sb-nav-link-icon text-white"><i class="fas fa-star"></i></div>
                        Privileged Users
                    </a>
                @endif

                <a class="nav-link collapsed text-body" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseSettings" aria-expanded="false" aria-controls="pagesCollapseSettings">
                    <div class="sb-nav-link-icon text-white"><i class="fas fa-tools"></i></div>
                    Settings
                    <div class="sb-sidenav-collapse-arrow text-white"><i class="text-white fa fa-angle-double-down"></i></div>
                </a>
                <div class="collapse" id="pagesCollapseSettings" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-check text-white"></i>&nbsp;</div>
                            Authentication
                            <div class="sb-sidenav-collapse-arrow"><i class="text-white fa fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#pagesCollapseAuth">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link text-dark" href="/forgot"><i class="fas fa-key text-white"></i>&nbsp;Reset Password</a>
                                <a class="nav-link text-dark" href="/logout"><i class="text-white fa fa-genderless text-white"></i>&nbsp;Logout</a>
                            </nav>
                        </div>
                    </nav>
                </div>


            </div>
        </div>
        <div class="sb-sidenav-footer bg-success text-white" style="background-color: #8b572a;">
            <div class="small">Logged in as:</div>
            {{\auth()->user()->title == config('membership.title.member.id')||\auth()->user()->title == config('membership.title.admin.id')?\auth()->user()->name:implode(' ', [config('membership.statuses.title')[auth()->user()->title]['text'], \auth()->user()->name])}}
        </div>
    </nav>
</div>
<script>
    $(document).ready(function () {
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

<div id="layoutSidenav_nav" style="background-color: lightskyblue; text-emphasis-color: white">
    <nav class="sb-sidenav accordion"style="background-color: lightskyblue" id="sidenavAccordion"
    >
        <div class="sb-sidenav-menu fw-bolder fs-6 text-white">
            <div class="nav">
                <div class="">
                    <a href="{{route('profile')}}"><img src="{{asset('images/login.jpeg')}}" data-toggle="tooltip" data-placement="top"></a>
                </div>
                <input type="hidden" class="is_a_cell_group_pastor" data-cell_group="{{\App\Models\User::where('id', auth()->id())->with('roles')->first()->cell_group_id??null}}" value="{{\App\Models\User::where('id', auth()->id())->with('roles')->first()->roles[0]->role_id??null}}">
                @if(auth()->user()->role_as ==1)
                <a class="nav-link table-responsive admin_dashboard" href="#">
                    <div class="sb-nav-link-icon"><i class="fa fa-list-ol"></i></div>
                    Dashboard
                </a>
                    <div class="sb-sidenav-menu-heading">Membership Management</div>
                    <a class="nav-link collapsed text-body" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon text-white"><i class="fa fa-list"></i></div>
                        Church Members
                        <div class="sb-sidenav-collapse-arrow text-white"><i class="fa fa-angle-double-down"></i></div>
                    </a>

                    <div class="collapse text-dark" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link church-members" href="#" data-id="{{config('membership.age_clusters.All_members.id')}}"><i class="fa fa-group"></i>{{config('membership.age_clusters.All_members.text')}}</a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapse41" aria-expanded="false" aria-controls="pagesCollapseCellGroupLevel" id="cell">
                                <div class="sb-nav-link-icon"><i class="fa fa-registered fa-lg"></i></div>
                                Stages 1-4
                                <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapse41" aria-labelledby="headingOne" data-bs-parent="#collapseLayouts">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link church-members text-dark" href="#" data-id="{{config('membership.age_clusters.stage1.id')}}"><i class="fa fa-child"></i>{{config('membership.age_clusters.stage1.text')}}</a>
                                    <a class="nav-link church-members text-dark" href="#" data-id="{{config('membership.age_clusters.stage2.id')}}"><i class="fa fa-person-booth"></i>{{config('membership.age_clusters.stage2.text')}}</a>
                                    <a class="nav-link church-members text-dark" href="#" data-id="{{config('membership.age_clusters.stage3.id')}}"><i class="fa fa-d-and-d"></i>{{config('membership.age_clusters.stage3.text')}}</a>
                                    <a class="nav-link church-members text-dark" href="#" data-id="{{config('membership.age_clusters.stage4.id')}}"><i class="fa fa-d-and-d"></i>{{config('membership.age_clusters.stage4.text')}}</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapse42" aria-expanded="false" aria-controls="pagesCollapseCellGroupLevel" id="cell">
                                <div class="sb-nav-link-icon"><i class="fa fa-registered fa-lg"></i></div>
                                Stages 5-8
                                <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapse42" aria-labelledby="headingOne" data-bs-parent="#collapseLayouts">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link church-members text-dark" href="#" data-id="{{config('membership.age_clusters.stage5.id')}}"><i class="fa fa-female"></i>{{config('membership.age_clusters.stage5.text')}}</a>
                                    <a class="nav-link church-members text-dark" href="#" data-id="{{config('membership.age_clusters.stage6.id')}}"><i class="fa fa-group"></i>{{config('membership.age_clusters.stage6.text')}}</a>
                                    <a class="nav-link church-members text-dark" href="#" data-id="{{config('membership.age_clusters.stage7.id')}}"><i class="fa fa-child"></i>{{config('membership.age_clusters.stage7.text')}}</a>
                                    <a class="nav-link church-members text-dark" href="#" data-id="{{config('membership.age_clusters.stage8.id')}}"><i class="fa fa-child"></i>{{config('membership.age_clusters.stage8.text')}}</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapse43" aria-expanded="false" aria-controls="pagesCollapseCellGroupLevel" id="cell">
                                <div class="sb-nav-link-icon"><i class="fa fa-registered fa-lg"></i></div>
                                Stages 9-12
                                <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapse43" aria-labelledby="headingOne" data-bs-parent="#collapseLayouts">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link church-members text-dark" href="#" data-id="{{config('membership.age_clusters.stage9.id')}}"><i class="fa fa-d-and-d"></i>{{config('membership.age_clusters.stage9.text')}}</a>
                                    <a class="nav-link church-members text-dark" href="#" data-id="{{config('membership.age_clusters.stage10.id')}}"><i class="fa fa-male"></i>{{config('membership.age_clusters.stage10.text')}}</a>
                                    <a class="nav-link church-members text-dark" href="#" data-id="{{config('membership.age_clusters.stage11.id')}}"><i class="fa fa-female"></i>{{config('membership.age_clusters.stage11.text')}}</a>
                                    <a class="nav-link church-members text-dark" href="#" data-id="{{config('membership.age_clusters.stage12.id')}}"><i class="fa fa-female"></i>{{config('membership.age_clusters.stage12.text')}}</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapse44" aria-expanded="false" aria-controls="pagesCollapseCellGroupLevel" id="cell">
                                <div class="sb-nav-link-icon"><i class="fa fa-registered fa-lg"></i></div>
                                Stages 13-17
                                <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapse44" aria-labelledby="headingOne" data-bs-parent="#collapseLayouts">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link church-members text-dark" href="#" data-id="{{config('membership.age_clusters.stage13.id')}}"><i class="fa fa-child"></i>{{config('membership.age_clusters.stage13.text')}}</a>
                                    <a class="nav-link church-members text-dark" href="#" data-id="{{config('membership.age_clusters.stage14.id')}}"><i class="fa fa-person-booth"></i>{{config('membership.age_clusters.stage14.text')}}</a>
                                    <a class="nav-link church-members text-dark" href="#" data-id="{{config('membership.age_clusters.stage15.id')}}"><i class="fa fa-d-and-d"></i>{{config('membership.age_clusters.stage15.text')}}</a>
                                    <a class="nav-link church-members text-dark" href="#" data-id="{{config('membership.age_clusters.stage16.id')}}"><i class="fa fa-male"></i>{{config('membership.age_clusters.stage16.text')}}</a>
                                    <a class="nav-link church-members text-dark" href="#" data-id="{{config('membership.age_clusters.stage17.id')}}"><i class="fa fa-male"></i>{{config('membership.age_clusters.stage17.text')}}</a>
                                </nav>
                            </div>
                        </nav>
                    </div>
                    <a class="nav-link collapsed text-body"  id="" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon text-white"><i class="fa fa-group"></i></div>
                        Cell Group Members
                        <div class="sb-sidenav-collapse-arrow text-white"><i class="fa fa-angle-double-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                            <a class="nav-link cell_group_members text-dark kiambiu" href="#" data-id="{{config('membership.cell_group.kiambiu.id')}}"><i class="fa fa-child"></i>{{config('membership.cell_group.kiambiu.text')}}</a>
                            <a class="nav-link cell_group_members text-dark umoja_bethel" href="#" data-id="{{config('membership.cell_group.umoja_bethel.id')}}"><i class="fa fa-child"></i>{{config('membership.cell_group.umoja_bethel.text')}}</a>
                            <a class="nav-link cell_group_members text-dark kariobangi_south" href="#" data-id="{{config('membership.cell_group.kariobangi_south.id')}}"><i class="fa fa-child"></i>{{config('membership.cell_group.kariobangi_south.text')}}</a>
                            <a class="nav-link cell_group_members text-dark chokaa_berea" href="#" data-id="{{config('membership.cell_group.chokaa_berea.id')}}"><i class="fa fa-child"></i>{{config('membership.cell_group.chokaa_berea.text')}}</a>
                            <a class="nav-link cell_group_members text-dark diaspora" href="#" data-id="{{config('membership.cell_group.diaspora.id')}}"><i class="fa fa-child"></i>{{config('membership.cell_group.diaspora.text')}}</a>
                            <a class="nav-link cell_group_members text-dark langata" href="#" data-id="{{config('membership.cell_group.langata.id')}}"><i class="fa fa-child"></i>{{config('membership.cell_group.langata.text')}}</a>
                            <a class="nav-link cell_group_members text-dark Jericho" href="#" data-id="{{config('membership.cell_group.Jericho.id')}}"><i class="fa fa-child"></i>{{config('membership.cell_group.Jericho.text')}}</a>
                            <a class="nav-link cell_group_members text-dark not_sure" href="#" data-id="{{config('membership.cell_group.not_sure.id')}}"><i class="fa fa-child"></i>{{config('membership.cell_group.not_sure.text')}}</a>

                        </nav>
                    </div>

                    <a class="nav-link collapsed" hidden="" href="" id="add-member" data-bs-toggle="" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                        <div class="sb-nav-link-icon"><i class="fa fa-columns"></i></div>
                        Add New Member
                    </a>

                    <a class="nav-link collapsed text-body" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseRegistration" aria-expanded="false" aria-controls="pagesCollapseRegistration" id="registration">
                        <div class="sb-nav-link-icon text-white"><i class="fa fa-life-bouy"></i></div>
                        Registration Process
                        <div class="sb-sidenav-collapse-arrow text-white"><i class="fa fa-angle-double-down"></i></div>
                    </a>
                    <div class="collapse" id="pagesCollapseRegistration" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                             <a class="nav-link progressive-registration text-danger" href="#" data-id="{{config('membership.registration_statuses.declined_members.id')}}">{{config('membership.registration_statuses.declined_members.text')}}</a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseCellGroupLevel" aria-expanded="false" aria-controls="pagesCollapseCellGroupLevel" id="cell">
                                <div class="sb-nav-link-icon"><i class="fa fa-registered fa-lg"></i></div>
                                Cell Group Level
                                <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapseCellGroupLevel" aria-labelledby="headingOne" data-bs-parent="#pagesCollapseRegistration">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link progressive-registration text-dark" href="#" data-id="{{config('membership.registration_statuses.cell_group_registered.id')}}">{{config('membership.registration_statuses.cell_group_registered.text')}}</a>
                                    <a class="nav-link progressive-registration text-dark" href="#" data-id="{{config('membership.registration_statuses.cell_group_approved.id')}}">{{config('membership.registration_statuses.cell_group_approved.text')}}</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseChurchLevel" aria-expanded="false" aria-controls="pagesCollapseChurchLevel" id="church">
                                <div class="sb-nav-link-icon"><i class="fa fa-stethoscope"></i></div>
                                Church Level
                                <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
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
                    <a class="nav-link collapsed" href="#" id="priviledged_users">Privileged Users</a>
                @endif

                <a class="nav-link collapsed text-body" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseSettings" aria-expanded="false" aria-controls="pagesCollapseSettings">
                    <div class="sb-nav-link-icon text-white"><i class="fas fa-columns"></i></div>
                    Settings
                    <div class="sb-sidenav-collapse-arrow text-white"><i class="fa fa-angle-double-down"></i></div>
                </a>
                <div class="collapse" id="pagesCollapseSettings" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Authentication
                            <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#pagesCollapseAuth">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link text-dark" href="/forgot">Reset Password</a>
                                <a class="nav-link text-dark" href="/logout">Logout</a>
                            </nav>
                        </div>
                    </nav>
                </div>


            </div>
        </div>
        <div class="sb-sidenav-footer bg-success text-white">
            <div class="small">Logged in as:</div>
            {{(\auth()->user()->name)}}
        </div>
    </nav>
</div>
<script>
    $(document).ready(function () {

        if ($('.is_a_cell_group_pastor').val() == 4){
            let multi_cell_group_array = [
                [
                    $('.kiambiu').data('id'), $('.kiambiu')
                ],
                [
                    $('.umoja_bethel').data('id'), $('.umoja_bethel')
                ],
                [
                    $('.kariobangi_south').data('id'), $('.kariobangi_south')
                ],
                [
                    $('.chokaa_berea').data('id'), $('.chokaa_berea')
                ],
                [
                    $('.diaspora').data('id'), $('.diaspora')
                ],
                [
                    $('.langata').data('id'), $('.langata')
                ],
                [
                    $('.Jericho').data('id'), $('.Jericho')
                ],
                [
                    $('.not_sure').data('id'), $('.not_sure')
                ]
            ];
            multi_cell_group_array.forEach(simple_cell_group=>{
                if (simple_cell_group[0] == $('.is_a_cell_group_pastor').data('cell_group')){
                    simple_cell_group[1].show()
                }else {
                    simple_cell_group[1].hide()
                }
            })

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

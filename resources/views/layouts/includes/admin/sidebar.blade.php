<div id="layoutSidenav_nav" style="background-color: lightskyblue; text-emphasis-color: white">
    <nav class="sb-sidenav accordion"style="background-color: lightskyblue" id="sidenavAccordion"
    >
        <input type="hidden" name="" data-id="{{\Illuminate\Support\Facades\Auth::user()->cell_group_id}}" id="logged_in_user_role" value="{{\Illuminate\Support\Facades\Auth::user()->roles()->first()->name??null}}">
        <div class="sb-sidenav-menu fw-bolder fs-6 text-white">
            <div class="nav">
                <div class="">
                    <a href="{{route('profile')}}"><img src="{{asset('images/login.jpeg')}}" data-toggle="tooltip" data-placement="top"></a>
                </div>
                <input type="hidden" class="is_a_cell_group_pastor" data-cell_group="{{\App\Models\User::where('id', auth()->id())->with('roles')->first()->cell_group_id??null}}" value="{{\App\Models\User::where('id', auth()->id())->with('roles')->first()->roles[0]->role_id??null}}">
                @if(auth()->user()->can('See Members'))
{{--                @if(auth()->user()->hasAnyRole())--}}
                <a class="nav-link table-responsive admin_dashboard" href="#">
                    <div class="sb-nav-link-icon"><i class="text-white fa fa-list-ol"></i></div>
                    Dashboard
                </a>
                    <div class="sb-sidenav-menu-heading">Membership Management</div>
                    <a class="nav-link collapsed text-body" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon text-white"><i class="text-white fa fa-church"></i></div>
                        Church Members
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
                                Stages 1-4
                                <div class="sb-sidenav-collapse-arrow"><i class="text-white fa fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapse41" aria-labelledby="headingOne" data-bs-parent="#collapseLayouts">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link church-members text-dark" href="#" data-id="{{config('membership.age_clusters.stage1.id')}}"><i class="text-white fa fa-child"></i>&nbsp;{{config('membership.age_clusters.stage1.text')}}</a>
                                    <a class="nav-link church-members text-dark" href="#" data-id="{{config('membership.age_clusters.stage2.id')}}"><i class="text-white fa fa-child"></i>&nbsp;{{config('membership.age_clusters.stage2.text')}}</a>
                                    <a class="nav-link church-members text-dark" href="#" data-id="{{config('membership.age_clusters.stage3.id')}}"><i class="text-white fa fa-child"></i>&nbsp;{{config('membership.age_clusters.stage3.text')}}</a>
                                    <a class="nav-link church-members text-dark" href="#" data-id="{{config('membership.age_clusters.stage4.id')}}"><i class="text-white fa fa-child"></i>&nbsp;{{config('membership.age_clusters.stage4.text')}}</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapse42" aria-expanded="false" aria-controls="pagesCollapseCellGroupLevel" id="cell">
                                <div class="sb-nav-link-icon"><i class="text-white fa fa-child-reaching"></i></div>
                                Stages 5-8
                                <div class="sb-sidenav-collapse-arrow"><i class="text-white fa fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapse42" aria-labelledby="headingOne" data-bs-parent="#collapseLayouts">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link church-members text-dark" href="#" data-id="{{config('membership.age_clusters.stage5.id')}}"><i class="text-white fa fa-child-reaching">&nbsp;</i>{{config('membership.age_clusters.stage5.text')}}</a>
                                    <a class="nav-link church-members text-dark" href="#" data-id="{{config('membership.age_clusters.stage6.id')}}"><i class="text-white fa fa-child-reaching">&nbsp;</i>{{config('membership.age_clusters.stage6.text')}}</a>
                                    <a class="nav-link church-members text-dark" href="#" data-id="{{config('membership.age_clusters.stage7.id')}}"><i class="text-white fa fa-child-reaching">&nbsp;</i>{{config('membership.age_clusters.stage7.text')}}</a>
                                    <a class="nav-link church-members text-dark" href="#" data-id="{{config('membership.age_clusters.stage8.id')}}"><i class="text-white fa fa-child-reaching">&nbsp;</i>{{config('membership.age_clusters.stage8.text')}}</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapse43" aria-expanded="false" aria-controls="pagesCollapseCellGroupLevel" id="cell">
                                <div class="sb-nav-link-icon"><i class="text-white fa fa-person"></i></div>
                                Stages 9-12
                                <div class="sb-sidenav-collapse-arrow"><i class="text-white fa fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapse43" aria-labelledby="headingOne" data-bs-parent="#collapseLayouts">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link church-members text-dark" href="#" data-id="{{config('membership.age_clusters.stage9.id')}}"><i class="text-white fa fa-person"></i>&nbsp;{{config('membership.age_clusters.stage9.text')}}</a>
                                    <a class="nav-link church-members text-dark" href="#" data-id="{{config('membership.age_clusters.stage10.id')}}"><i class="text-white fa fa-person"></i>&nbsp;{{config('membership.age_clusters.stage10.text')}}</a>
                                    <a class="nav-link church-members text-dark" href="#" data-id="{{config('membership.age_clusters.stage11.id')}}"><i class="text-white fa fa-person"></i>&nbsp;{{config('membership.age_clusters.stage11.text')}}</a>
                                    <a class="nav-link church-members text-dark" href="#" data-id="{{config('membership.age_clusters.stage12.id')}}"><i class="text-white fa fa-person"></i>&nbsp;{{config('membership.age_clusters.stage12.text')}}</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapse44" aria-expanded="false" aria-controls="pagesCollapseCellGroupLevel" id="cell">
                                <div class="sb-nav-link-icon"><i class="text-white fa fa-person-cane"></i></div>
                                Stages 13-17
                                <div class="sb-sidenav-collapse-arrow"><i class="text-white fa fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapse44" aria-labelledby="headingOne" data-bs-parent="#collapseLayouts">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link church-members text-dark" href="#" data-id="{{config('membership.age_clusters.stage13.id')}}"><i class="text-white fa fa-person-cane"></i>&nbsp;{{config('membership.age_clusters.stage13.text')}}</a>
                                    <a class="nav-link church-members text-dark" href="#" data-id="{{config('membership.age_clusters.stage14.id')}}"><i class="text-white fa fa-person-cane"></i>&nbsp;{{config('membership.age_clusters.stage14.text')}}</a>
                                    <a class="nav-link church-members text-dark" href="#" data-id="{{config('membership.age_clusters.stage15.id')}}"><i class="text-white fa fa-person-cane"></i>&nbsp;{{config('membership.age_clusters.stage15.text')}}</a>
                                    <a class="nav-link church-members text-dark" href="#" data-id="{{config('membership.age_clusters.stage16.id')}}"><i class="text-white fa fa-person-cane"></i>&nbsp;{{config('membership.age_clusters.stage16.text')}}</a>
                                    <a class="nav-link church-members text-dark" href="#" data-id="{{config('membership.age_clusters.stage17.id')}}"><i class="text-white fa fa-person-cane"></i>&nbsp;{{config('membership.age_clusters.stage17.text')}}</a>
                                </nav>
                            </div>
                        </nav>
                    </div>
                    <a class="nav-link collapsed text-body"  id="" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon text-white"><i class="text-white fa fa-group"></i></div>
                        Cell Group Members
                        <div class="sb-sidenav-collapse-arrow text-white"><i class="text-white fa fa-angle-double-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">

                            <a class="nav-link collapsed collapsed-cell-categories" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseKiambiu" aria-expanded="false" aria-controls="pagesCollapseCellGroupLevel" data-cell_id='{{config('membership.cell_group.kiambiu.id')}}' id="cell">
                                <div class="sb-nav-link-icon">
                                      <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fas fa-k fa-stack-1x fa-inverse"></i>
                                      </span>
                                </div>
                                {{config('membership.cell_group.kiambiu.text')}}
                                <div class="sb-sidenav-collapse-arrow"><i class="text-white fa fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapseKiambiu" aria-labelledby="headingOne" data-bs-parent="#collapsePages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link cell_group_members text-dark kiambiu" href="#" data-id="{{config('membership.cell_group.kiambiu.id')}}"><i class="text-white fa fa-group text-white"></i>&nbsp;{{config('membership.age_clusters.All_members.text')}}</a>
                                    <a class="nav-link church-members gender-based text-dark" data-gender_cell="{{config('membership.cell_group.kiambiu.id')}}" href="#" data-id="{{config('membership.gender.male.id')}}"><i class="text-white fa fa-male text-white"></i>&nbsp;{{config('membership.gender.male.text')}}</a>
                                    <a class="nav-link church-members gender-based text-dark" data-gender_cell="{{config('membership.cell_group.kiambiu.id')}}" href="#" data-id="{{config('membership.gender.female.id')}}"><i class="text-white fa fa-female text-white"></i>&nbsp;{{config('membership.gender.female.text')}}</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed collapsed-cell-categories" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseUmojaBethel" aria-expanded="false" aria-controls="pagesCollapseCellGroupLevel" data-cell_id='{{config('membership.cell_group.umoja_bethel.id')}}' id="cell">
                                <div class="sb-nav-link-icon">
                                      <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fas fa-u fa-stack-1x fa-inverse"></i>
                                      </span>
                                </div>
                                {{config('membership.cell_group.umoja_bethel.text')}}
                                <div class="sb-sidenav-collapse-arrow"><i class="text-white fa fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapseUmojaBethel" aria-labelledby="headingOne" data-bs-parent="#collapsePages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link cell_group_members text-dark umoja_bethel" href="#" data-id="{{config('membership.cell_group.umoja_bethel.id')}}"><i class="text-white fa fa-group text-white"></i>&nbsp;{{config('membership.age_clusters.All_members.text')}}</a>
                                    <a class="nav-link church-members gender-based text-dark" data-gender_cell="{{config('membership.cell_group.umoja_bethel.id')}}" href="#" data-id="{{config('membership.gender.male.id')}}"><i class="text-white fa fa-male text-white"></i>&nbsp;{{config('membership.gender.male.text')}}</a>
                                    <a class="nav-link church-members gender-based text-dark" data-gender_cell="{{config('membership.cell_group.umoja_bethel.id')}}" href="#" data-id="{{config('membership.gender.female.id')}}"><i class="text-white fa fa-female text-white"></i>&nbsp;{{config('membership.gender.female.text')}}</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed collapsed-cell-categories" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseKariobangiSouth" aria-expanded="false" aria-controls="pagesCollapseCellGroupLevel" data-cell_id='{{config('membership.cell_group.kariobangi_south.id')}}' id="cell">
                                <div class="sb-nav-link-icon">
                                      <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fas fa-k fa-stack-1x fa-inverse"></i>
                                      </span>
                                </div>
                                {{config('membership.cell_group.kariobangi_south.text')}}
                                <div class="sb-sidenav-collapse-arrow"><i class="text-white fa fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapseKariobangiSouth" aria-labelledby="headingOne" data-bs-parent="#collapsePages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link cell_group_members text-dark kariobangi_south" href="#" data-id="{{config('membership.cell_group.kariobangi_south.id')}}"><i class="text-white fa fa-group text-white"></i>&nbsp;{{config('membership.age_clusters.All_members.text')}}</a>
                                    <a class="nav-link church-members gender-based text-dark" data-gender_cell="{{config('membership.cell_group.kariobangi_south.id')}}" href="#" data-id="{{config('membership.gender.male.id')}}"><i class="text-white fa fa-male text-white"></i>&nbsp; {{config('membership.gender.male.text')}}</a>
                                    <a class="nav-link church-members gender-based text-dark" data-gender_cell="{{config('membership.cell_group.kariobangi_south.id')}}" href="#" data-id="{{config('membership.gender.female.id')}}"><i class="text-white fa fa-female"></i>{{config('membership.gender.female.text')}}</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed collapsed-cell-categories" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseChokaaBerea" aria-expanded="false" aria-controls="pagesCollapseCellGroupLevel" data-cell_id='{{config('membership.cell_group.chokaa_berea.id')}}' id="cell">
                                <div class="sb-nav-link-icon">
                                      <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fas fa-c fa-stack-1x fa-inverse"></i>
                                      </span>
                                </div>
                                {{config('membership.cell_group.chokaa_berea.text')}}
                                <div class="sb-sidenav-collapse-arrow"><i class="text-white fa fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapseChokaaBerea" aria-labelledby="headingOne" data-bs-parent="#collapsePages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link cell_group_members text-dark chokaa_berea" href="#" data-id="{{config('membership.cell_group.chokaa_berea.id')}}"><i class="text-white fa fa-group text-white"></i>&nbsp;{{config('membership.age_clusters.All_members.text')}}</a>
                                    <a class="nav-link church-members gender-based text-dark" data-gender_cell="{{config('membership.cell_group.chokaa_berea.id')}}" href="#" data-id="{{config('membership.gender.male.id')}}"><i class="text-white fa fa-male text-white"></i>&nbsp;{{config('membership.gender.male.text')}}</a>
                                    <a class="nav-link church-members gender-based text-dark" data-gender_cell="{{config('membership.cell_group.chokaa_berea.id')}}"  href="#" data-id="{{config('membership.gender.female.id')}}"><i class="text-white fa fa-female text-white"></i>&nbsp;{{config('membership.gender.female.text')}}</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed collapsed-cell-categories" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseDiaspora" aria-expanded="false" aria-controls="pagesCollapseCellGroupLevel" data-cell_id='{{config('membership.cell_group.diaspora.id')}}' id="cell">
                                <div class="sb-nav-link-icon">
                                      <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fas fa-d fa-stack-1x fa-inverse"></i>
                                      </span>
                                </div>
                                {{config('membership.cell_group.diaspora.text')}}
                                <div class="sb-sidenav-collapse-arrow"><i class="text-white fa fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapseDiaspora" aria-labelledby="headingOne" data-bs-parent="#collapsePages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link cell_group_members text-dark diaspora" href="#" data-id="{{config('membership.cell_group.diaspora.id')}}"><i class="text-white fa fa-group text-white"></i>&nbsp;{{config('membership.age_clusters.All_members.text')}}</a>
                                    <a class="nav-link church-members gender-based text-dark" data-gender_cell="{{config('membership.cell_group.diaspora.id')}}" href="#" data-id="{{config('membership.gender.male.id')}}"><i class="text-white fa fa-male text-white"></i>&nbsp;{{config('membership.gender.male.text')}}</a>
                                    <a class="nav-link church-members gender-based text-dark" data-gender_cell="{{config('membership.cell_group.diaspora.id')}}" href="#" data-id="{{config('membership.gender.female.id')}}"><i class="text-white fa fa-female text-white"></i>&nbsp;{{config('membership.gender.female.text')}}</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed collapsed-cell-categories" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseLangata" aria-expanded="false" aria-controls="pagesCollapseCellGroupLevel" data-cell_id='{{config('membership.cell_group.langata.id')}}' id="cell">
                                <div class="sb-nav-link-icon">
                                      <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fas fa-l fa-stack-1x fa-inverse"></i>
                                      </span>
                                </div>
                                {{config('membership.cell_group.langata.text')}}
                                <div class="sb-sidenav-collapse-arrow"><i class="text-white fa fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapseLangata" aria-labelledby="headingOne" data-bs-parent="#collapsePages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link cell_group_members text-dark langata" href="#" data-id="{{config('membership.cell_group.langata.id')}}"><i class="text-white fa fa-group text-white"></i>&nbsp;{{config('membership.age_clusters.All_members.text')}}</a>
                                    <a class="nav-link church-members gender-based text-dark" data-gender_cell="{{config('membership.cell_group.langata.id')}}" href="#" data-id="{{config('membership.gender.male.id')}}"><i class="text-white fa fa-male text-white"></i>&nbsp;{{config('membership.gender.male.text')}}</a>
                                    <a class="nav-link church-members gender-based text-dark" data-gender_cell="{{config('membership.cell_group.langata.id')}}" href="#" data-id="{{config('membership.gender.female.id')}}"><i class="text-white fa fa-female text-white"></i>&nbsp;{{config('membership.gender.female.text')}}</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed collapsed-cell-categories" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseJericho" aria-expanded="false" aria-controls="pagesCollapseCellGroupLevel" data-cell_id='{{config('membership.cell_group.Jericho.id')}}' id="cell">
                                <div class="sb-nav-link-icon">
                                      <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fas fa-j fa-stack-1x fa-inverse"></i>
                                      </span>
                                </div>
                                {{config('membership.cell_group.Jericho.text')}}
                                <div class="sb-sidenav-collapse-arrow"><i class="text-white fa fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapseJericho" aria-labelledby="headingOne" data-bs-parent="#collapsePages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link cell_group_members text-dark Jericho" href="#" data-id="{{config('membership.cell_group.Jericho.id')}}"><i class="text-white fa fa-group text-white"></i>&nbsp;{{config('membership.age_clusters.All_members.text')}}</a>
                                    <a class="nav-link church-members gender-based text-dark" href="#" data-gender_cell="{{config('membership.cell_group.Jericho.id')}}" data-id="{{config('membership.gender.male.id')}}"><i class="text-white fa fa-male text-white"></i>&nbsp;{{config('membership.gender.male.text')}}</a>
                                    <a class="nav-link church-members gender-based text-dark" href="#" data-gender_cell="{{config('membership.cell_group.Jericho.id')}}" data-id="{{config('membership.gender.female.id')}}"><i class="text-white fa fa-female text-white"></i>&nbsp;{{config('membership.gender.female.text')}}</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed collapsed-cell-categories" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseNotSure" aria-expanded="false" aria-controls="pagesCollapseCellGroupLevel" data-cell_id='{{config('membership.cell_group.not_sure.id')}}' id="cell">
                                <div class="sb-nav-link-icon">
                                      <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fas fa-n fa-stack-1x fa-inverse"></i>
                                      </span>
                                </div>
                                {{config('membership.cell_group.not_sure.text')}}
                                <div class="sb-sidenav-collapse-arrow"><i class="text-white fa fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapseNotSure" aria-labelledby="headingOne" data-bs-parent="#collapsePages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link cell_group_members text-dark Not_sure" href="#" data-id="{{config('membership.cell_group.not_sure.id')}}"><i class="text-white fa fa-group text-white"></i>&nbsp;{{config('membership.age_clusters.All_members.text')}}</a>
                                    <a class="nav-link church-members gender-based text-dark" href="#" data-gender_cell="{{config('membership.cell_group.not_sure.id')}}" data-id="{{config('membership.gender.male.id')}}"><i class="text-white fa fa-male text-white"></i>&nbsp;{{config('membership.gender.male.text')}}</a>
                                    <a class="nav-link church-members gender-based text-dark" href="#" data-gender_cell="{{config('membership.cell_group.not_sure.id')}}" data-id="{{config('membership.gender.female.id')}}"><i class="text-white fa fa-female text-white"></i>&nbsp;{{config('membership.gender.female.text')}}</a>
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
                                    <a class="nav-link progressive-registration text-dark" href="#" data-id="{{config('membership.registration_statuses.cell_group_approved.id')}}">{{config('membership.registration_statuses.cell_group_approved.text')}}</a>
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
        <div class="sb-sidenav-footer bg-success text-white">
            <div class="small">Logged in as:</div>
            {{\auth()->user()->title == config('membership.title.member.id')||\auth()->user()->title == config('membership.title.admin.id')?\auth()->user()->name:implode(' ', [config('membership.statuses.title')[auth()->user()->title]['text'], \auth()->user()->name])}}
        </div>
    </nav>
</div>
<script>
    $(document).ready(function () {
        if ($('#logged_in_user_role').val() == 'Cell Group Pastor') {
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

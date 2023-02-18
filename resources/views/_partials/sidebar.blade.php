<!-- BEGIN: SideNav-->
<aside
    class="sidenav-main nav-expanded nav-lock nav-collapsible  sidenav-active-square  sidenav-light">
    <div class="brand-sidebar">
        <h1 class="logo-wrapper">
            <div class="row">
                <div class="col s1"></div>
                <div class="col s10">
                    <a class="darken-1 hide-on-med-and-down" href="{{ url('home') }}">
                        <img class="responsive-img" src="{{ url('images/logo/jubilee_logo.png') }}" alt="Jubilee logo"/>
                    </a>
                    <a class="brand-logo darken-1 show-on-medium-and-down hide-on-med-and-up" href="{{ url('home') }}">
                        <img class="" src="{{ url('images/logo/jubilee_logo.png') }}"
                             alt="Jubilee logo"/>
                    </a>
                </div>
                <div class="col s1"></div>
            </div>
{{--            <a class="navbar-toggler" href="javascript:void(0)"><i class="material-icons">radio_button_checked</i></a>--}}
        </h1>
    </div>
    <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out"
        data-menu="menu-navigation" data-collapsible="menu-accordion">

        <li class="navigation-header">
            <a class="navigation-header-text">Quick Operations</a>
            <i class="navigation-header-icon material-icons">more_horiz</i>
        </li>
        @hasanyrole('Admin|Head Assessor|Assistant Head|Manager|Assessment Manager|Adjuster')
        <li class="bold ">
            <a class="sidenav-link" id="dashboard"
               href="#"
            >
                <i class="material-icons">dashboard</i>
                <span class="menu-title" data-i18n="dashboard">Dashboard</span>
            </a>
        </li>
        @endhasanyrole
        @hasrole(\App\Conf\Config::$ROLES["ADJUSTER"])
        <li class="bold ">
            <a class="collapsible-header sidenav-link"
               href="javascript:void(0) "
            >
                <i class="material-icons">view_list</i>
                <span class="menu-title" data-i18n="Chart">Claims</span>
            </a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">

                    <li class="">
                        <a href="#" class="sidenav-link" id="uploadClaims">
                            <i class="material-icons">file_upload</i>
                            <span data-i18n="ChartJS">Upload</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" class="sidenav-link fetch-claims" data-id="{{\App\Conf\Config::$STATUSES['CLAIM']['UPLOADED']['id']}}">
                            <i class="material-icons">reorder</i>
                            <span data-i18n="ChartJS">Uploaded</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" class="sidenav-link fetch-claims"  data-id="{{\App\Conf\Config::$STATUSES['CLAIM']['ASSIGNED']['id']}}">
                            <i class="material-icons">assignment_ind</i>
                            <span data-i18n="Chartist">Assigned</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" class="sidenav-link fetch-claims"  data-id="{{\App\Conf\Config::$STATUSES['CLAIM']['RE-INSPECTED']['id']}}">
                            <i class="material-icons">assignment_turned_in</i>
                            <span data-i18n="Chartist">Re-inspected</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" class="sidenav-link fetch-claims" data-id="{{\App\Conf\Config::$STATUSES['CLAIM']['RELEASED']['id']}}">
                            <i class="material-icons">next_week</i>
                            <span data-i18n="Chartist">Released</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        @endhasrole
        @if(auth()->user()->userTypeID == \App\Conf\Config::$USER_TYPES['INTERNAL']['ID'])
        <li class="bold ">
            <a class="sidenav-link fetch-claim-types" id="windscreen" data-id="{{App\Conf\Config::CLAIM_TYPES['WINDSCREEN']}}"
               href="#"
            >
                <i class="material-icons">taxi_alert</i>
                <span class="menu-title" data-i18n="Windscreen claims">Windscreen Claims</span>
            </a>
        </li>
        <li class="bold ">
            <a class="collapsible-header sidenav-link"
               href="javascript:void(0) "
            >
                <i class="material-icons">no_transfer</i>
                <span class="menu-title" data-i18n="Chart">Theft Claims</span>
            </a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">

                    <li class="">
                        <a href="#" class="sidenav-link fetch-theft-claims" id="theft" data-id="{{App\Conf\Config::CLAIM_TYPES['THEFT']}}">
                            <i class="material-icons">file_upload</i>
                            <span data-i18n="ChartJS">Uploaded</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" data-id="{{\App\Conf\Config::$STATUSES['ASSESSMENT']['ASSIGNED']['id']}}" class="sidenav-link fetch-theft-assessments">
                            <i class="material-icons">assignment_ind</i>
                            <span data-i18n="ChartJS">{{\App\Conf\Config::$DISPLAY_STATUSES['ASSESSMENT'][\App\Conf\Config::$STATUSES['ASSESSMENT']['ASSIGNED']['id']]}}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" data-id="{{\App\Conf\Config::$STATUSES['ASSESSMENT']['ASSESSED']['id']}}" class="sidenav-link fetch-theft-assessments">
                            <i class="material-icons">compare_arrows</i>
                            <span data-i18n="Chartist">{{\App\Conf\Config::$DISPLAY_STATUSES['ASSESSMENT'][\App\Conf\Config::$STATUSES['ASSESSMENT']['ASSESSED']['id']]}}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" data-id="{{\App\Conf\Config::$STATUSES['ASSESSMENT']['PROVISIONAL-APPROVAL']['id']}}" class="sidenav-link fetch-theft-assessments">
                            <i class="material-icons">done</i>
                            <span data-i18n="Chartist">{{\App\Conf\Config::$DISPLAY_STATUSES['ASSESSMENT'][\App\Conf\Config::$STATUSES['ASSESSMENT']['PROVISIONAL-APPROVAL']['id']]}}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" data-id="{{\App\Conf\Config::$STATUSES['ASSESSMENT']['APPROVED']['id']}}" class="sidenav-link fetch-theft-assessments">
                            <i class="material-icons">done_all</i>
                            <span data-i18n="Chartist">{{\App\Conf\Config::$DISPLAY_STATUSES['ASSESSMENT'][\App\Conf\Config::$STATUSES['ASSESSMENT']['APPROVED']['id']]}}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" data-id="{{\App\Conf\Config::$STATUSES['ASSESSMENT']['CHANGES-DUE']['id']}}" class="sidenav-link fetch-theft-assessments">
                            <i class="material-icons">announcement</i>
                            <span data-i18n="Chartist">{{\App\Conf\Config::$DISPLAY_STATUSES['ASSESSMENT'][\App\Conf\Config::$STATUSES['ASSESSMENT']['CHANGES-DUE']['id']]}}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        @endif
        @hasrole(\App\Conf\Config::$ROLES["ADJUSTER"])
        <li class="bold ">
            <a class="collapsible-header sidenav-link" href="javascript:void(0)">
                <i class="material-icons">assessment</i>
                <span class="menu-title" data-i18n="Chart">Assessments</span>
            </a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">

                    <li class="">
                        <a href="#" data-id="{{\App\Conf\Config::$STATUSES['ASSESSMENT']['ASSIGNED']['id']}}" class="sidenav-link fetch-assessments">
                            <i class="material-icons">assignment_ind</i>
                            <span data-i18n="ChartJS">{{\App\Conf\Config::$DISPLAY_STATUSES['ASSESSMENT'][\App\Conf\Config::$STATUSES['ASSESSMENT']['ASSIGNED']['id']]}}</span>
                        </a>
                    </li>

                    <li class="">
                        <a href="#" data-id="{{\App\Conf\Config::$STATUSES['ASSESSMENT']['IS-DRAFT']['id']}}" class="sidenav-link fetch-assessments">
                            <i class="material-icons">drafts</i>
                            <span data-i18n="Chartist">{{\App\Conf\Config::$DISPLAY_STATUSES['ASSESSMENT'][\App\Conf\Config::$STATUSES['ASSESSMENT']['IS-DRAFT']['id']]}}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" data-id="{{\App\Conf\Config::$STATUSES['ASSESSMENT']['ASSESSED']['id']}}" class="sidenav-link fetch-assessments">
                            <i class="material-icons">compare_arrows</i>
                            <span data-i18n="Chartist">{{\App\Conf\Config::$DISPLAY_STATUSES['ASSESSMENT'][\App\Conf\Config::$STATUSES['ASSESSMENT']['ASSESSED']['id']]}}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" data-id="{{\App\Conf\Config::$STATUSES['ASSESSMENT']['PROVISIONAL-APPROVAL']['id']}}" class="sidenav-link fetch-assessments">
                            <i class="material-icons">done</i>
                            <span data-i18n="Chartist">{{\App\Conf\Config::$DISPLAY_STATUSES['ASSESSMENT'][\App\Conf\Config::$STATUSES['ASSESSMENT']['PROVISIONAL-APPROVAL']['id']]}}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" data-id="{{\App\Conf\Config::$STATUSES['ASSESSMENT']['APPROVED']['id']}}" class="sidenav-link fetch-assessments">
                            <i class="material-icons">done_all</i>
                            <span data-i18n="Chartist">{{\App\Conf\Config::$DISPLAY_STATUSES['ASSESSMENT'][\App\Conf\Config::$STATUSES['ASSESSMENT']['APPROVED']['id']]}}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" data-id="{{\App\Conf\Config::$STATUSES['ASSESSMENT']['CHANGES-DUE']['id']}}" class="sidenav-link fetch-assessments">
                            <i class="material-icons">announcement</i>
                            <span data-i18n="Chartist">{{\App\Conf\Config::$DISPLAY_STATUSES['ASSESSMENT'][\App\Conf\Config::$STATUSES['ASSESSMENT']['CHANGES-DUE']['id']]}}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" class="sidenav-link flagged-assessments">
                            <i class="material-icons">flag</i>
                            <span data-i18n="Chartist">Flagged Assessments</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="bold ">
            <a class="collapsible-header sidenav-link"
               href="javascript:void(0) "
            >
                <i class="material-icons">note</i>
                <span class="menu-title" data-i18n="settings">Supplementaries</span>
            </a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">

                    <li class="">
                        <a href="#"
                           class="adjuster-fetch-supplementaries sidenav-link" data-id="{{\App\Conf\Config::$STATUSES['ASSESSMENT']['ASSESSED']['id']}}"
                        >
                            <i class="material-icons">compare_arrows</i>
                            <span data-i18n="Invoice List">{{\App\Conf\Config::$DISPLAY_STATUSES['ASSESSMENT'][\App\Conf\Config::$STATUSES['ASSESSMENT']['ASSESSED']['id']]}}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#"
                           class="adjuster-fetch-supplementaries sidenav-link" data-id="{{\App\Conf\Config::$STATUSES['ASSESSMENT']['PROVISIONAL-APPROVAL']['id']}}"
                        >
                            <i class="material-icons">done</i>
                            <span data-i18n="Invoice List">{{\App\Conf\Config::$DISPLAY_STATUSES['ASSESSMENT'][\App\Conf\Config::$STATUSES['ASSESSMENT']['PROVISIONAL-APPROVAL']['id']]}}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#"
                           class="adjuster-fetch-supplementaries sidenav-link" data-id="{{\App\Conf\Config::$STATUSES['ASSESSMENT']['APPROVED']['id']}}"
                        >
                            <i class="material-icons">done</i>
                            <span data-i18n="Invoice List">{{\App\Conf\Config::$DISPLAY_STATUSES['ASSESSMENT'][\App\Conf\Config::$STATUSES['ASSESSMENT']['APPROVED']['id']]}}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#"
                           class="adjuster-fetch-supplementaries sidenav-link" data-id="{{\App\Conf\Config::$STATUSES['ASSESSMENT']['CHANGES-DUE']['id']}}"
                        >
                            <i class="material-icons">announcement</i>
                            <span data-i18n="Invoice List">{{\App\Conf\Config::$DISPLAY_STATUSES['ASSESSMENT'][\App\Conf\Config::$STATUSES['ASSESSMENT']['CHANGES-DUE']['id']]}}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" class="sidenav-link flagged-supplementaries">
                            <i class="material-icons">flag</i>
                            <span data-i18n="Chartist">Flagged Supplementaries</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        @endhasrole
        @hasrole(\App\Conf\Config::$ROLES["ASSESSOR"])
        <li class="bold ">
            <a class="collapsible-header sidenav-link" href="javascript:void(0)">
                <i class="material-icons">assessment</i>
                <span class="menu-title" data-i18n="Chart">Assessments</span>
            </a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">

                    <li class="">
                        <a href="#" data-id="{{\App\Conf\Config::$STATUSES['ASSESSMENT']['ASSIGNED']['id']}}" class="sidenav-link assessor-fetch-assessments">
                            <i class="material-icons">assignment_ind</i>
                            <span data-i18n="ChartJS">{{\App\Conf\Config::$DISPLAY_STATUSES['ASSESSMENT'][\App\Conf\Config::$STATUSES['ASSESSMENT']['ASSIGNED']['id']]}}</span>
                        </a>
                    </li>

                    <li class="">
                        <a href="#" data-id="{{\App\Conf\Config::$STATUSES['ASSESSMENT']['IS-DRAFT']['id']}}" class="sidenav-link assessor-fetch-assessments">
                            <i class="material-icons">drafts</i>
                            <span data-i18n="Chartist">{{\App\Conf\Config::$DISPLAY_STATUSES['ASSESSMENT'][\App\Conf\Config::$STATUSES['ASSESSMENT']['IS-DRAFT']['id']]}}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" data-id="{{\App\Conf\Config::$STATUSES['ASSESSMENT']['ASSESSED']['id']}}" class="sidenav-link assessor-fetch-assessments">
                            <i class="material-icons">compare_arrows</i>
                            <span data-i18n="Chartist">{{\App\Conf\Config::$DISPLAY_STATUSES['ASSESSMENT'][\App\Conf\Config::$STATUSES['ASSESSMENT']['ASSESSED']['id']]}}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" data-id="{{\App\Conf\Config::$STATUSES['ASSESSMENT']['PROVISIONAL-APPROVAL']['id']}}" class="sidenav-link assessor-fetch-assessments">
                            <i class="material-icons">done</i>
                            <span data-i18n="Chartist">{{\App\Conf\Config::$DISPLAY_STATUSES['ASSESSMENT'][\App\Conf\Config::$STATUSES['ASSESSMENT']['PROVISIONAL-APPROVAL']['id']]}}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" data-id="{{\App\Conf\Config::$STATUSES['ASSESSMENT']['APPROVED']['id']}}" class="sidenav-link assessor-fetch-assessments">
                            <i class="material-icons">done_all</i>
                            <span data-i18n="Chartist">{{\App\Conf\Config::$DISPLAY_STATUSES['ASSESSMENT'][\App\Conf\Config::$STATUSES['ASSESSMENT']['APPROVED']['id']]}}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" data-id="{{\App\Conf\Config::$STATUSES['ASSESSMENT']['CHANGES-DUE']['id']}}" class="sidenav-link assessor-fetch-assessments">
                            <i class="material-icons">announcement</i>
                            <span data-i18n="Chartist">{{\App\Conf\Config::$DISPLAY_STATUSES['ASSESSMENT'][\App\Conf\Config::$STATUSES['ASSESSMENT']['CHANGES-DUE']['id']]}}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" class="sidenav-link flagged-assessments">
                            <i class="material-icons">flag</i>
                            <span data-i18n="Chartist">Flagged Assessments</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="bold ">
            <a class="collapsible-header sidenav-link"
               href="javascript:void(0) "
            >
                <i class="material-icons">note</i>
                <span class="menu-title" data-i18n="settings">Supplementaries</span>
            </a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">

                    <li class="">
                        <a href="#"
                           class="assessor-fetch-supplementaries sidenav-link" data-id="{{\App\Conf\Config::$STATUSES['ASSESSMENT']['ASSESSED']['id']}}"
                         >
                            <i class="material-icons">compare_arrows</i>
                            <span data-i18n="Invoice List">{{\App\Conf\Config::$DISPLAY_STATUSES['ASSESSMENT'][\App\Conf\Config::$STATUSES['ASSESSMENT']['ASSESSED']['id']]}}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#"
                           class="assessor-fetch-supplementaries sidenav-link" data-id="{{\App\Conf\Config::$STATUSES['ASSESSMENT']['PROVISIONAL-APPROVAL']['id']}}"
                        >
                            <i class="material-icons">done</i>
                            <span data-i18n="Invoice List">{{\App\Conf\Config::$DISPLAY_STATUSES['ASSESSMENT'][\App\Conf\Config::$STATUSES['ASSESSMENT']['PROVISIONAL-APPROVAL']['id']]}}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#"
                           class="assessor-fetch-supplementaries sidenav-link" data-id="{{\App\Conf\Config::$STATUSES['ASSESSMENT']['APPROVED']['id']}}"
                        >
                            <i class="material-icons">done</i>
                            <span data-i18n="Invoice List">{{\App\Conf\Config::$DISPLAY_STATUSES['ASSESSMENT'][\App\Conf\Config::$STATUSES['ASSESSMENT']['APPROVED']['id']]}}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#"
                           class="assessor-fetch-supplementaries sidenav-link" data-id="{{\App\Conf\Config::$STATUSES['ASSESSMENT']['CHANGES-DUE']['id']}}"
                        >
                            <i class="material-icons">announcement</i>
                            <span data-i18n="Invoice List">{{\App\Conf\Config::$DISPLAY_STATUSES['ASSESSMENT'][\App\Conf\Config::$STATUSES['ASSESSMENT']['CHANGES-DUE']['id']]}}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" class="sidenav-link flagged-supplementaries">
                            <i class="material-icons">flag</i>
                            <span data-i18n="Chartist">Flagged Supplementaries</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        @endhasrole
        @hasrole(\App\Conf\Config::$ROLES["HEAD-ASSESSOR"])
        <li class="bold ">
            <a class="collapsible-header sidenav-link"
               href="javascript:void(0) "
            >
                <i class="material-icons">view_list</i>
                <span class="menu-title" data-i18n="Chart">Claims</span>
            </a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li class="">
                        <a href="#" class="sidenav-link head-assessor-claims" data-id="{{\App\Conf\Config::$STATUSES['CLAIM']['UPLOADED']['id']}}">
                            <i class="material-icons">reorder</i>
                            <span data-i18n="ChartJS">Uploaded</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" class="sidenav-link head-assessor-claims" data-id="{{\App\Conf\Config::$STATUSES['CLAIM']['ASSIGNED']['id']}}">
                            <i class="material-icons">assignment_ind</i>
                            <span data-i18n="Chartist">Assigned</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" class="sidenav-link head-assessor-claims" data-id="{{\App\Conf\Config::$STATUSES['CLAIM']['RE-INSPECTED']['id']}}">
                            <i class="material-icons">assignment_turned_in</i>
                            <span data-i18n="Chartist">Re-inspected</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" class="sidenav-link head-assessor-claims" data-id="{{\App\Conf\Config::$STATUSES['CLAIM']['RELEASED']['id']}}">
                            <i class="material-icons">next_week</i>
                            <span data-i18n="Chartist">Released</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        @endhasrole
        @hasrole(\App\Conf\Config::$ROLES["HEAD-ASSESSOR"])
        <li class="bold ">
            <a class="collapsible-header sidenav-link" href="javascript:void(0)">
                <i class="material-icons">assessment</i>
                <span class="menu-title" data-i18n="Chart">Assessments</span>
            </a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">

                    <li class="">
                        <a href="#" data-id="{{\App\Conf\Config::$STATUSES['ASSESSMENT']['ASSIGNED']['id']}}" class="sidenav-link head-assessor-assessments">
                            <i class="material-icons">assignment_ind</i>
                            <span data-i18n="ChartJS">{{\App\Conf\Config::$DISPLAY_STATUSES['ASSESSMENT'][\App\Conf\Config::$STATUSES['ASSESSMENT']['ASSIGNED']['id']]}}</span>
                        </a>
                    </li>

                    <li class="">
                        <a href="#" data-id="{{\App\Conf\Config::$STATUSES['ASSESSMENT']['IS-DRAFT']['id']}}" class="sidenav-link head-assessor-assessments">
                            <i class="material-icons">drafts</i>
                            <span data-i18n="Chartist">{{\App\Conf\Config::$DISPLAY_STATUSES['ASSESSMENT'][\App\Conf\Config::$STATUSES['ASSESSMENT']['IS-DRAFT']['id']]}}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" data-id="{{\App\Conf\Config::$STATUSES['ASSESSMENT']['ASSESSED']['id']}}" class="sidenav-link head-assessor-assessments">
                            <i class="material-icons">compare_arrows</i>
                            <span data-i18n="Chartist">{{\App\Conf\Config::$DISPLAY_STATUSES['ASSESSMENT'][\App\Conf\Config::$STATUSES['ASSESSMENT']['ASSESSED']['id']]}}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" data-id="{{\App\Conf\Config::$STATUSES['ASSESSMENT']['PROVISIONAL-APPROVAL']['id']}}" class="sidenav-link head-assessor-assessments">
                            <i class="material-icons">done</i>
                            <span data-i18n="Chartist">{{\App\Conf\Config::$DISPLAY_STATUSES['ASSESSMENT'][\App\Conf\Config::$STATUSES['ASSESSMENT']['PROVISIONAL-APPROVAL']['id']]}}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" data-id="{{\App\Conf\Config::$STATUSES['ASSESSMENT']['APPROVED']['id']}}" class="sidenav-link head-assessor-assessments">
                            <i class="material-icons">done_all</i>
                            <span data-i18n="Chartist">{{\App\Conf\Config::$DISPLAY_STATUSES['ASSESSMENT'][\App\Conf\Config::$STATUSES['ASSESSMENT']['APPROVED']['id']]}}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" data-id="{{\App\Conf\Config::$STATUSES['ASSESSMENT']['CHANGES-DUE']['id']}}" class="sidenav-link head-assessor-assessments">
                            <i class="material-icons">announcement</i>
                            <span data-i18n="Chartist">{{\App\Conf\Config::$DISPLAY_STATUSES['ASSESSMENT'][\App\Conf\Config::$STATUSES['ASSESSMENT']['CHANGES-DUE']['id']]}}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" class="sidenav-link flagged-assessments">
                            <i class="material-icons">flag</i>
                            <span data-i18n="Chartist">Flagged Assessments</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="bold ">
            <a class="collapsible-header sidenav-link"
               href="javascript:void(0) "
            >
                <i class="material-icons">note</i>
                <span class="menu-title" data-i18n="settings">Supplementaries</span>
            </a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">

                    <li class="">
                        <a href="#"
                           class="head-assessor-fetch-supplementaries sidenav-link" data-id="{{\App\Conf\Config::$STATUSES['ASSESSMENT']['ASSESSED']['id']}}"
                        >
                            <i class="material-icons">compare_arrows</i>
                            <span data-i18n="Invoice List">{{\App\Conf\Config::$DISPLAY_STATUSES['ASSESSMENT'][\App\Conf\Config::$STATUSES['ASSESSMENT']['ASSESSED']['id']]}}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#"
                           class="head-assessor-fetch-supplementaries sidenav-link" data-id="{{\App\Conf\Config::$STATUSES['ASSESSMENT']['PROVISIONAL-APPROVAL']['id']}}"
                        >
                            <i class="material-icons">done</i>
                            <span data-i18n="Invoice List">{{\App\Conf\Config::$DISPLAY_STATUSES['ASSESSMENT'][\App\Conf\Config::$STATUSES['ASSESSMENT']['PROVISIONAL-APPROVAL']['id']]}}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#"
                           class="head-assessor-fetch-supplementaries sidenav-link" data-id="{{\App\Conf\Config::$STATUSES['ASSESSMENT']['APPROVED']['id']}}"
                        >
                            <i class="material-icons">done</i>
                            <span data-i18n="Invoice List">{{\App\Conf\Config::$DISPLAY_STATUSES['ASSESSMENT'][\App\Conf\Config::$STATUSES['ASSESSMENT']['APPROVED']['id']]}}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#"
                           class="head-assessor-fetch-supplementaries sidenav-link" data-id="{{\App\Conf\Config::$STATUSES['ASSESSMENT']['CHANGES-DUE']['id']}}"
                        >
                            <i class="material-icons">announcement</i>
                            <span data-i18n="Invoice List">{{\App\Conf\Config::$DISPLAY_STATUSES['ASSESSMENT'][\App\Conf\Config::$STATUSES['ASSESSMENT']['CHANGES-DUE']['id']]}}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" class="sidenav-link flagged-supplementaries">
                            <i class="material-icons">flag</i>
                            <span data-i18n="Chartist">Flagged Supplementaries</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        @endhasrole


        @hasrole(\App\Conf\Config::$ROLES["MANAGER"])
        <li class="bold ">
            <a class="collapsible-header sidenav-link"
               href="javascript:void(0) "
            >
                <i class="material-icons">view_list</i>
                <span class="menu-title" data-i18n="Chart">Claims</span>
            </a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li class="">
                        <a href="#" class="sidenav-link manager-claims" data-id="{{\App\Conf\Config::$STATUSES['CLAIM']['UPLOADED']['id']}}">
                            <i class="material-icons">reorder</i>
                            <span data-i18n="ChartJS">Uploaded</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" class="sidenav-link manager-claims" data-id="{{\App\Conf\Config::$STATUSES['CLAIM']['ASSIGNED']['id']}}">
                            <i class="material-icons">assignment_ind</i>
                            <span data-i18n="Chartist">Assigned</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" class="sidenav-link manager-claims" data-id="{{\App\Conf\Config::$STATUSES['CLAIM']['RE-INSPECTED']['id']}}">
                            <i class="material-icons">assignment_turned_in</i>
                            <span data-i18n="Chartist">Re-inspected</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" class="sidenav-link manager-claims" data-id="{{\App\Conf\Config::$STATUSES['CLAIM']['RELEASED']['id']}}">
                            <i class="material-icons">next_week</i>
                            <span data-i18n="Chartist">Released</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        @endhasrole
        @hasrole(\App\Conf\Config::$ROLES["MANAGER"])
        <li class="bold ">
            <a class="collapsible-header sidenav-link" href="javascript:void(0)">
                <i class="material-icons">assessment</i>
                <span class="menu-title" data-i18n="Chart">Assessments</span>
            </a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">

                    <li class="">
                        <a href="#" data-id="{{\App\Conf\Config::$STATUSES['ASSESSMENT']['ASSIGNED']['id']}}" class="sidenav-link manager-assessments">
                            <i class="material-icons">assignment_ind</i>
                            <span data-i18n="ChartJS">{{\App\Conf\Config::$DISPLAY_STATUSES['ASSESSMENT'][\App\Conf\Config::$STATUSES['ASSESSMENT']['ASSIGNED']['id']]}}</span>
                        </a>
                    </li>

                    <li class="">
                        <a href="#" data-id="{{\App\Conf\Config::$STATUSES['ASSESSMENT']['IS-DRAFT']['id']}}" class="sidenav-link manager-assessments">
                            <i class="material-icons">drafts</i>
                            <span data-i18n="Chartist">{{\App\Conf\Config::$DISPLAY_STATUSES['ASSESSMENT'][\App\Conf\Config::$STATUSES['ASSESSMENT']['IS-DRAFT']['id']]}}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" data-id="{{\App\Conf\Config::$STATUSES['ASSESSMENT']['ASSESSED']['id']}}" class="sidenav-link manager-assessments">
                            <i class="material-icons">compare_arrows</i>
                            <span data-i18n="Chartist">{{\App\Conf\Config::$DISPLAY_STATUSES['ASSESSMENT'][\App\Conf\Config::$STATUSES['ASSESSMENT']['ASSESSED']['id']]}}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" data-id="{{\App\Conf\Config::$STATUSES['ASSESSMENT']['PROVISIONAL-APPROVAL']['id']}}" class="sidenav-link manager-assessments">
                            <i class="material-icons">done</i>
                            <span data-i18n="Chartist">{{\App\Conf\Config::$DISPLAY_STATUSES['ASSESSMENT'][\App\Conf\Config::$STATUSES['ASSESSMENT']['PROVISIONAL-APPROVAL']['id']]}}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" data-id="{{\App\Conf\Config::$STATUSES['ASSESSMENT']['APPROVED']['id']}}" class="sidenav-link manager-assessments">
                            <i class="material-icons">done_all</i>
                            <span data-i18n="Chartist">{{\App\Conf\Config::$DISPLAY_STATUSES['ASSESSMENT'][\App\Conf\Config::$STATUSES['ASSESSMENT']['APPROVED']['id']]}}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" data-id="{{\App\Conf\Config::$STATUSES['ASSESSMENT']['CHANGES-DUE']['id']}}" class="sidenav-link manager-assessments">
                            <i class="material-icons">announcement</i>
                            <span data-i18n="Chartist">{{\App\Conf\Config::$DISPLAY_STATUSES['ASSESSMENT'][\App\Conf\Config::$STATUSES['ASSESSMENT']['CHANGES-DUE']['id']]}}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" class="sidenav-link flagged-assessments">
                            <i class="material-icons">flag</i>
                            <span data-i18n="Chartist">Flagged Assessments</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="bold ">
            <a class="collapsible-header sidenav-link"
               href="javascript:void(0) "
            >
                <i class="material-icons">note</i>
                <span class="menu-title" data-i18n="settings">Supplementaries</span>
            </a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">

                    <li class="">
                        <a href="#"
                           class="manager-fetch-supplementaries sidenav-link" data-id="{{\App\Conf\Config::$STATUSES['ASSESSMENT']['ASSESSED']['id']}}"
                        >
                            <i class="material-icons">compare_arrows</i>
                            <span data-i18n="Invoice List">{{\App\Conf\Config::$DISPLAY_STATUSES['ASSESSMENT'][\App\Conf\Config::$STATUSES['ASSESSMENT']['ASSESSED']['id']]}}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#"
                           class="manager-fetch-supplementaries sidenav-link" data-id="{{\App\Conf\Config::$STATUSES['ASSESSMENT']['PROVISIONAL-APPROVAL']['id']}}"
                        >
                            <i class="material-icons">done</i>
                            <span data-i18n="Invoice List">{{\App\Conf\Config::$DISPLAY_STATUSES['ASSESSMENT'][\App\Conf\Config::$STATUSES['ASSESSMENT']['PROVISIONAL-APPROVAL']['id']]}}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#"
                           class="manager-fetch-supplementaries sidenav-link" data-id="{{\App\Conf\Config::$STATUSES['ASSESSMENT']['APPROVED']['id']}}"
                        >
                            <i class="material-icons">done</i>
                            <span data-i18n="Invoice List">{{\App\Conf\Config::$DISPLAY_STATUSES['ASSESSMENT'][\App\Conf\Config::$STATUSES['ASSESSMENT']['APPROVED']['id']]}}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#"
                           class="manager-fetch-supplementaries sidenav-link" data-id="{{\App\Conf\Config::$STATUSES['ASSESSMENT']['CHANGES-DUE']['id']}}"
                        >
                            <i class="material-icons">announcement</i>
                            <span data-i18n="Invoice List">{{\App\Conf\Config::$DISPLAY_STATUSES['ASSESSMENT'][\App\Conf\Config::$STATUSES['ASSESSMENT']['CHANGES-DUE']['id']]}}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" class="sidenav-link flagged-supplementaries">
                            <i class="material-icons">flag</i>
                            <span data-i18n="Chartist">Flagged Supplementaries</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        @endhasrole


        @hasrole(\App\Conf\Config::$ROLES["ASSISTANT-HEAD"])
        <li class="bold ">
            <a class="collapsible-header sidenav-link"
               href="javascript:void(0) "
            >
                <i class="material-icons">view_list</i>
                <span class="menu-title" data-i18n="Chart">Claims</span>
            </a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li class="">
                        <a href="#" class="sidenav-link assistant-head-assessor-claims" data-id="{{\App\Conf\Config::$STATUSES['CLAIM']['UPLOADED']['id']}}">
                            <i class="material-icons">reorder</i>
                            <span data-i18n="ChartJS">Uploaded</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" class="sidenav-link assistant-head-assessor-claims" data-id="{{\App\Conf\Config::$STATUSES['CLAIM']['ASSIGNED']['id']}}">
                            <i class="material-icons">assignment_ind</i>
                            <span data-i18n="Chartist">Assigned</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" class="sidenav-link assistant-head-assessor-claims" data-id="{{\App\Conf\Config::$STATUSES['CLAIM']['RE-INSPECTED']['id']}}">
                            <i class="material-icons">assignment_turned_in</i>
                            <span data-i18n="Chartist">Re-inspected</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" class="sidenav-link assistant-head-assessor-claims" data-id="{{\App\Conf\Config::$STATUSES['CLAIM']['RELEASED']['id']}}">
                            <i class="material-icons">next_week</i>
                            <span data-i18n="Chartist">Released</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="bold ">
            <a class="collapsible-header sidenav-link" href="javascript:void(0)">
                <i class="material-icons">assessment</i>
                <span class="menu-title" data-i18n="Chart">Assessments</span>
            </a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li class="">
                        <a href="#" data-id="{{\App\Conf\Config::$STATUSES['ASSESSMENT']['ASSESSED']['id']}}" class="sidenav-link assistant-head-assessor-assessments">
                            <i class="material-icons">compare_arrows</i>
                            <span data-i18n="Chartist">{{\App\Conf\Config::$DISPLAY_STATUSES['ASSESSMENT'][\App\Conf\Config::$STATUSES['ASSESSMENT']['ASSESSED']['id']]}}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" data-id="{{\App\Conf\Config::$STATUSES['ASSESSMENT']['PROVISIONAL-APPROVAL']['id']}}" class="sidenav-link assistant-head-assessor-assessments">
                            <i class="material-icons">done</i>
                            <span data-i18n="Chartist">{{\App\Conf\Config::$DISPLAY_STATUSES['ASSESSMENT'][\App\Conf\Config::$STATUSES['ASSESSMENT']['PROVISIONAL-APPROVAL']['id']]}}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" data-id="{{\App\Conf\Config::$STATUSES['ASSESSMENT']['APPROVED']['id']}}" class="sidenav-link assistant-head-assessor-assessments">
                            <i class="material-icons">done_all</i>
                            <span data-i18n="Chartist">{{\App\Conf\Config::$DISPLAY_STATUSES['ASSESSMENT'][\App\Conf\Config::$STATUSES['ASSESSMENT']['APPROVED']['id']]}}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" data-id="{{\App\Conf\Config::$STATUSES['ASSESSMENT']['CHANGES-DUE']['id']}}" class="sidenav-link assistant-head-assessor-assessments">
                            <i class="material-icons">announcement</i>
                            <span data-i18n="Chartist">{{\App\Conf\Config::$DISPLAY_STATUSES['ASSESSMENT'][\App\Conf\Config::$STATUSES['ASSESSMENT']['CHANGES-DUE']['id']]}}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" class="sidenav-link flagged-assessments">
                            <i class="material-icons">flag</i>
                            <span data-i18n="Chartist">Flagged Assessments</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="bold ">
            <a class="collapsible-header sidenav-link"
               href="javascript:void(0) "
            >
                <i class="material-icons">note</i>
                <span class="menu-title" data-i18n="settings">Supplementaries</span>
            </a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">

                    <li class="">
                        <a href="#"
                           class="assistant-head-assessor-fetch-supplementaries sidenav-link" data-id="{{\App\Conf\Config::$STATUSES['ASSESSMENT']['ASSESSED']['id']}}"
                        >
                            <i class="material-icons">compare_arrows</i>
                            <span data-i18n="Invoice List">{{\App\Conf\Config::$DISPLAY_STATUSES['ASSESSMENT'][\App\Conf\Config::$STATUSES['ASSESSMENT']['ASSESSED']['id']]}}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#"
                           class="assistant-head-assessor-fetch-supplementaries sidenav-link" data-id="{{\App\Conf\Config::$STATUSES['ASSESSMENT']['PROVISIONAL-APPROVAL']['id']}}"
                        >
                            <i class="material-icons">done</i>
                            <span data-i18n="Invoice List">{{\App\Conf\Config::$DISPLAY_STATUSES['ASSESSMENT'][\App\Conf\Config::$STATUSES['ASSESSMENT']['PROVISIONAL-APPROVAL']['id']]}}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#"
                           class="assistant-head-assessor-fetch-supplementaries sidenav-link" data-id="{{\App\Conf\Config::$STATUSES['ASSESSMENT']['APPROVED']['id']}}"
                        >
                            <i class="material-icons">done</i>
                            <span data-i18n="Invoice List">{{\App\Conf\Config::$DISPLAY_STATUSES['ASSESSMENT'][\App\Conf\Config::$STATUSES['ASSESSMENT']['APPROVED']['id']]}}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#"
                           class="assistant-head-assessor-fetch-supplementaries sidenav-link" data-id="{{\App\Conf\Config::$STATUSES['ASSESSMENT']['CHANGES-DUE']['id']}}"
                        >
                            <i class="material-icons">announcement</i>
                            <span data-i18n="Invoice List">{{\App\Conf\Config::$DISPLAY_STATUSES['ASSESSMENT'][\App\Conf\Config::$STATUSES['ASSESSMENT']['CHANGES-DUE']['id']]}}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" class="sidenav-link flagged-supplementaries">
                            <i class="material-icons">flag</i>
                            <span data-i18n="Chartist">Flagged Supplementaries</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        @endhasrole
        @hasrole(\App\Conf\Config::$ROLES["ASSESSMENT-MANAGER"])
        <li class="bold ">
            <a class="collapsible-header sidenav-link"
               href="javascript:void(0) "
            >
                <i class="material-icons">view_list</i>
                <span class="menu-title" data-i18n="Chart">Claims</span>
            </a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li class="">
                        <a href="#" class="sidenav-link assessment-manager-claims" data-id="{{\App\Conf\Config::$STATUSES['CLAIM']['UPLOADED']['id']}}">
                            <i class="material-icons">reorder</i>
                            <span data-i18n="ChartJS">Uploaded</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" class="sidenav-link assessment-manager-claims" data-id="{{\App\Conf\Config::$STATUSES['CLAIM']['ASSIGNED']['id']}}">
                            <i class="material-icons">assignment_ind</i>
                            <span data-i18n="Chartist">Assigned</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" class="sidenav-link assessment-manager-claims" data-id="{{\App\Conf\Config::$STATUSES['CLAIM']['RE-INSPECTED']['id']}}">
                            <i class="material-icons">assignment_turned_in</i>
                            <span data-i18n="Chartist">Re-inspected</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" class="sidenav-link assessment-manager-claims" data-id="{{\App\Conf\Config::$STATUSES['CLAIM']['RELEASED']['id']}}">
                            <i class="material-icons">next_week</i>
                            <span data-i18n="Chartist">Released</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        @endhasrole
        @hasrole(\App\Conf\Config::$ROLES["ASSESSMENT-MANAGER"])
        <li class="bold ">
            <a class="collapsible-header sidenav-link" href="javascript:void(0)">
                <i class="material-icons">assessment</i>
                <span class="menu-title" data-i18n="Chart">Assessments</span>
            </a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li class="">
                        <a href="#" data-id="{{\App\Conf\Config::$STATUSES['ASSESSMENT']['ASSESSED']['id']}}" class="sidenav-link assessment-manager-assessments">
                            <i class="material-icons">compare_arrows</i>
                            <span data-i18n="Chartist">{{\App\Conf\Config::$DISPLAY_STATUSES['ASSESSMENT'][\App\Conf\Config::$STATUSES['ASSESSMENT']['ASSESSED']['id']]}}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" data-id="{{\App\Conf\Config::$STATUSES['ASSESSMENT']['PROVISIONAL-APPROVAL']['id']}}" class="sidenav-link assessment-manager-assessments">
                            <i class="material-icons">done</i>
                            <span data-i18n="Chartist">{{\App\Conf\Config::$DISPLAY_STATUSES['ASSESSMENT'][\App\Conf\Config::$STATUSES['ASSESSMENT']['PROVISIONAL-APPROVAL']['id']]}}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" data-id="{{\App\Conf\Config::$STATUSES['ASSESSMENT']['APPROVED']['id']}}" class="sidenav-link assessment-manager-assessments">
                            <i class="material-icons">done_all</i>
                            <span data-i18n="Chartist">{{\App\Conf\Config::$DISPLAY_STATUSES['ASSESSMENT'][\App\Conf\Config::$STATUSES['ASSESSMENT']['APPROVED']['id']]}}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" data-id="{{\App\Conf\Config::$STATUSES['ASSESSMENT']['CHANGES-DUE']['id']}}" class="sidenav-link assessment-manager-assessments">
                            <i class="material-icons">announcement</i>
                            <span data-i18n="Chartist">{{\App\Conf\Config::$DISPLAY_STATUSES['ASSESSMENT'][\App\Conf\Config::$STATUSES['ASSESSMENT']['CHANGES-DUE']['id']]}}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" class="sidenav-link flagged-assessments">
                            <i class="material-icons">flag</i>
                            <span data-i18n="Chartist">Flagged Assessments</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="bold ">
            <a class="collapsible-header sidenav-link"
               href="javascript:void(0) "
            >
                <i class="material-icons">note</i>
                <span class="menu-title" data-i18n="settings">Supplementaries</span>
            </a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">

                    <li class="">
                        <a href="#"
                           class="assessment-manager-fetch-supplementaries sidenav-link" data-id="{{\App\Conf\Config::$STATUSES['ASSESSMENT']['ASSESSED']['id']}}"
                        >
                            <i class="material-icons">compare_arrows</i>
                            <span data-i18n="Invoice List">{{\App\Conf\Config::$DISPLAY_STATUSES['ASSESSMENT'][\App\Conf\Config::$STATUSES['ASSESSMENT']['ASSESSED']['id']]}}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#"
                           class="assessment-manager-fetch-supplementaries sidenav-link" data-id="{{\App\Conf\Config::$STATUSES['ASSESSMENT']['PROVISIONAL-APPROVAL']['id']}}"
                        >
                            <i class="material-icons">done</i>
                            <span data-i18n="Invoice List">{{\App\Conf\Config::$DISPLAY_STATUSES['ASSESSMENT'][\App\Conf\Config::$STATUSES['ASSESSMENT']['PROVISIONAL-APPROVAL']['id']]}}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#"
                           class="assessment-manager-fetch-supplementaries sidenav-link" data-id="{{\App\Conf\Config::$STATUSES['ASSESSMENT']['APPROVED']['id']}}"
                        >
                            <i class="material-icons">done</i>
                            <span data-i18n="Invoice List">{{\App\Conf\Config::$DISPLAY_STATUSES['ASSESSMENT'][\App\Conf\Config::$STATUSES['ASSESSMENT']['APPROVED']['id']]}}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#"
                           class="assessment-manager-fetch-supplementaries sidenav-link" data-id="{{\App\Conf\Config::$STATUSES['ASSESSMENT']['CHANGES-DUE']['id']}}"
                        >
                            <i class="material-icons">announcement</i>
                            <span data-i18n="Invoice List">{{\App\Conf\Config::$DISPLAY_STATUSES['ASSESSMENT'][\App\Conf\Config::$STATUSES['ASSESSMENT']['CHANGES-DUE']['id']]}}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" class="sidenav-link flagged-supplementaries">
                            <i class="material-icons">flag</i>
                            <span data-i18n="Chartist">Flagged Supplementaries</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        @endhasrole
        @hasanyrole('Admin|Head Assessor|Assistant Head|Manager|Assessment Manager|Adjuster|Assessor')
        <li class="">
            <a href="#" class="re-inspections sidenav-link">
                <i class="material-icons">assignment_turned_in</i>
                <span data-i18n="ChartJS">Re-inspections</span>
            </a>
        </li>
        <li class="bold ">
            <a class="collapsible-header sidenav-link" href="javascript:void(0)">
                <i class="material-icons">filter_none</i>
                <span class="menu-title" data-i18n="Chart">Claim Categories</span>
            </a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">

                    <li class="">
                        <a href="#" data-id="{{\App\Conf\Config::ASSESSMENT_TYPES['AUTHORITY_TO_GARAGE']}}" class="sidenav-link fetch-claims-by-type">
                            <i class="material-icons">build</i>
                            <span data-i18n="ChartJS">{{\App\Conf\Config::DISPLAY_ASSESSMENT_TYPES[\App\Conf\Config::ASSESSMENT_TYPES['AUTHORITY_TO_GARAGE']]}}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" data-id="{{\App\Conf\Config::ASSESSMENT_TYPES['CASH_IN_LIEU']}}" class="sidenav-link fetch-claims-by-type">
                            <i class="material-icons">attach_money</i>
                            <span data-i18n="ChartJS">{{\App\Conf\Config::DISPLAY_ASSESSMENT_TYPES[\App\Conf\Config::ASSESSMENT_TYPES['CASH_IN_LIEU']]}}</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" data-id="{{\App\Conf\Config::ASSESSMENT_TYPES['TOTAL_LOSS']}}" class="sidenav-link fetch-claims-by-type">
                            <i class="material-icons">assignment_ind</i>
                            <span data-i18n="ChartJS">{{\App\Conf\Config::DISPLAY_ASSESSMENT_TYPES[\App\Conf\Config::ASSESSMENT_TYPES['TOTAL_LOSS']]}}</span>
                        </a>
                    </li>

                </ul>
            </div>
        </li>
        @endhasrole
{{--        @hasanyrole('Admin|Head Assessor')--}}
        @if( Auth::user()->hasRole('Admin') ||  Auth::user()->hasRole('Head Assessor') || Auth::user()->can(App\Conf\Config::PERMISSIONS['ADD_VENDOR']))
        <li class="bold">
            <a class="collapsible-header sidenav-link"
               href="javascript:void(0) "
            >
                <i class="material-icons">settings</i>
                <span class="menu-title" data-i18n="settings">Settings</span>
            </a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    @hasanyrole('Admin|Head Assessor')
                    <li class="">
                        <a href="#"
                           class="listUsers sidenav-link"
                        >
                            <i class="material-icons">person</i>
                            <span data-i18n="Invoice List">Users</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#"
                           class="listParts sidenav-link"
                        >
                            <i class="material-icons">build</i>
                            <span data-i18n="Invoice List">Parts</span>
                        </a>
                    </li>
                    @endhasanyrole
                    @can(App\Conf\Config::PERMISSIONS['ADD_VENDOR'])
                    <li class="">
                        <a href="#"
                           class="fetch-vendors sidenav-link"
                        >
                            <i class="material-icons">people_outline</i>
                            <span data-i18n="Invoice List">Vendors</span>
                        </a>
                    </li>
                    @endcan
                </ul>
            </div>
        </li>
        @endif
{{--        @endhasanyrole--}}
        <li class="bold ">
            <a class="sidenav-link fetch-salvage-register"
               href="#"
            >
                <i class="material-icons">compare_arrows</i>
                <span class="menu-title" data-i18n="Salvage Register">Salvage Register</span>
            </a>
        </li>
        @hasanyrole('Admin|Head Assessor')
        <li class="bold " >
            <a class="sidenav-link" id="changeTracker"
               href="#"
            >
                <i class="material-icons">change_history</i>
                <span class="menu-title" data-i18n="Activity Log">Change Tracker</span>
            </a>
        </li>
        @endhasanyrole
        <li class="bold ">
            <a class="sidenav-link" id="showActivityLog"
               href="#"
            >
                <i class="material-icons">update</i>
                <span class="menu-title" data-i18n="Activity Log">Activity Log</span>
            </a>
        </li>
        <li class="bold " >
            <a class="sidenav-link" id="showEscalations"
               href="#"
            >
                <i class="material-icons">trending_up</i>
                <span class="menu-title" data-i18n="Activity Log">Escalations</span>
            </a>
        </li>
        @if(auth()->user()->userTypeID == \App\Conf\Config::$USER_TYPES['INTERNAL']['ID'])
        <li class="bold " >
            <a class="sidenav-link" id="showCourtesyCar"
               href="#"
            >
                <i class="material-icons">directions_car</i>
                <span class="menu-title" data-i18n="Activity Log">Courtesy Car</span>
            </a>

        </li>
            <li class="bold " >
            <a class="sidenav-link" id="subrogationRegister"
               href="#"
            >
                <i class="material-icons">car_rental</i>
                <span class="menu-title" data-i18n="Activity Log">Subrogation Register</span>
            </a>
        </li>
        @endif
        <li class="bold ">
            <a class="waves-effect waves-light"
               href="{{ route('user.logout') }}"
            >
                <i class="material-icons">power_settings_new</i>
                <span class="menu-title" data-i18n="logout">Logout</span>
            </a>
        </li>

    </ul>
    <div class="navigation-background"></div>
    <a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only"
       href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
</aside>  <!-- END: SideNav-->

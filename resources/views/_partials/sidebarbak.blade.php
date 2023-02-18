<!-- BEGIN: SideNav-->
<aside
    class="sidenav-main nav-expanded nav-lock nav-collapsible  sidenav-active-square  sidenav-light">
    <div class="brand-sidebar">
        <h1 class="logo-wrapper">
            <a class="brand-logo darken-1" href="index.html">
                <img class="hide-on-med-and-down" src="{{ url('images/logo/jubilee_logo.png') }}" alt="Jubilee logo"/>
                <img class="show-on-medium-and-down hide-on-med-and-up" src="{{ url('images/logo/jubilee_logo.png') }}"
                     alt="Jubilee logo"/>

                <span class="logo-text hide-on-med-and-down">
                    Insurance
                  </span>
            </a>
            <a class="navbar-toggler" href="javascript:void(0)"><i class="material-icons">radio_button_checked</i></a>
        </h1>
    </div>
    @hasrole('Adjuster')
    <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out"
        data-menu="menu-navigation" data-collapsible="menu-accordion">

        <li class="navigation-header">
            <a class="navigation-header-text">Quick Operations</a>
            <i class="navigation-header-icon material-icons">more_horiz</i>
        </li>
        <li class="bold ">
            <a class="collapsible-header waves-effect waves-cyan "
               href="javascript:void(0) "
            >
                <i class="material-icons">view_list</i>
                <span class="menu-title" data-i18n="Chart">Claims</span>
            </a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">

                    <li class="">
                        <a href="{{ url('/adjuster/uploadClaims') }}" class="">
                            <i class="material-icons">file_upload</i>
                            <span data-i18n="ChartJS">Upload</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ url('/adjuster/fetchUploadedClaims') }}" class="">
                            <i class="material-icons">reorder</i>
                            <span data-i18n="ChartJS">Uploaded</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ url('/adjuster/assignedClaims') }}" class="">
                            <i class="material-icons">assignment_ind</i>
                            <span data-i18n="Chartist">Assigned</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" class="">
                            <i class="material-icons">assignment_turned_in</i>
                            <span data-i18n="Chartist">Re-inspected</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" class="">
                            <i class="material-icons">next_week</i>
                            <span data-i18n="Chartist">Released</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="bold ">
            <a class="collapsible-header waves-effect waves-cyan" href="javascript:void(0)">
                <i class="material-icons">assessment</i>
                <span class="menu-title" data-i18n="Chart">Assessments</span>
            </a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">

                    <li class="">
                        <a href="{{ url('adjuster/fetchAssignedAssessments') }}" class="">
                            <i class="material-icons">assignment_ind</i>
                            <span data-i18n="ChartJS">Assigned</span>
                        </a>
                    </li>

                    <li class="">
                        <a href="charts-chartist.html" class="">
                            <i class="material-icons">drafts</i>
                            <span data-i18n="Chartist">is-draft</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="charts-chartist.html" class="">
                            <i class="material-icons">compare_arrows</i>
                            <span data-i18n="Chartist">Assessed</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="charts-chartist.html" class="">
                            <i class="material-icons">check_box</i>
                            <span data-i18n="Chartist">Approved</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="bold ">
            <a class="collapsible-header waves-effect waves-light "
               href="javascript:void(0) "
            >
                <i class="material-icons">settings</i>
                <span class="menu-title" data-i18n="settings">Settings</span>
            </a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">

                    <li class="">
                        <a href="app-invoice-list.html"
                           class=" "
                        >
                            <i class="material-icons">radio_button_unchecked</i>
                            <span data-i18n="Invoice List">Rechnungsliste</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="bold ">
            <a class="waves-effect waves-light "
               href="{{ route('user.logout') }}"
            >
                <i class="material-icons">power_settings_new</i>
                <span class="menu-title" data-i18n="logout">Logout</span>
            </a>
        </li>
        <li class="bold ">
            <a href="{{ url('assessor/assessments') }}" class="role" data-id="10">Assessor</a>
            <a href="{{ url('adjuster/claims') }}" class="role" data-id="11">Adjuster</a>
            <a href="{{ url('head-assessor/claims') }}" data-id="9">Head Assessor</a>
        </li>
    </ul>
    @endhasrole
    @hasrole('Assessor')
    <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out"
        data-menu="menu-navigation" data-collapsible="menu-accordion">

        <li class="navigation-header">
            <a class="navigation-header-text">Quick Operations</a>
            <i class="navigation-header-icon material-icons">more_horiz</i>
        </li>
        <li class="bold ">
            <a class="waves-effect waves-cyan "
               href="{{ url('/assessor/claims') }}"
            >
                <i class="material-icons">view_list</i>
                <span class="menu-title" data-i18n="work">View Claims</span>
                <span class="new badge pill red darken-2 float-right mr-2">5</span>
            </a>
        </li>
        <li class="bold ">
            <a class="waves-effect waves-cyan "
               href="{{url('/assessor/assessments')}}"
            >
                <i class="material-icons">assessment</i>
                <span class="menu-title" data-i18n="assessment">Assessments</span>
                <span class="new badge pill red darken-2 float-right mr-2">5</span>
            </a>
        </li>
        <li class="bold ">
            <a class="waves-effect waves-light "
               href="javascript:void(0)"
            >
                <i class="material-icons">compare_arrows</i>
                <span class="menu-title" data-i18n="comapre">Re-inspections</span>
                <span class="new badge pill red darken-2 float-right mr-2">5</span>
            </a>
        </li>
        <li class="bold ">
            <a class="waves-effect waves-light "
               href="javascript:void(0)"
            >
                <i class="material-icons">exposure</i>
                <span class="menu-title" data-i18n="exposure">Supplementaries</span>
                <span class="new badge pill red darken-2 float-right mr-2">5</span>
            </a>
        </li>
        <li class="bold ">
            <a class="waves-effect waves-light "
               href="{{ route('user.logout') }}"
            >
                <i class="material-icons">power_settings_new</i>
                <span class="menu-title" data-i18n="logout">Logout</span>
            </a>
        </li>
        <li class="bold ">
            <a href="{{ url('assessor/assessments') }}" class="role" data-id="10">Assessor</a>
            <a href="{{ url('adjuster/claims') }}" class="role" data-id="11">Adjuster</a>
            <a href="{{ url('head-assessor/claims') }}" data-id="9">Head Assessor</a>
        </li>
    </ul>
    @endhasrole
    @hasrole('Head Assessor')
    <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out"
        data-menu="menu-navigation" data-collapsible="menu-accordion">

        <li class="navigation-header">
            <a class="navigation-header-text">Quick Operations</a>
            <i class="navigation-header-icon material-icons">more_horiz</i>
        </li>
        <li class="bold ">
            <a class="waves-effect waves-cyan "
               href="{{ url('/head-assessor/claims') }}"
            >
                <i class="material-icons">view_list</i>
                <span class="menu-title" data-i18n="work">View Claims</span>
                <span class="new badge pill red darken-2 float-right mr-2">5</span>
            </a>
        </li>
        <li class="bold ">
            <a class="waves-effect waves-cyan "
               href="{{url('/head-assessor/assessments')}}"
            >
                <i class="material-icons">assessment</i>
                <span class="menu-title" data-i18n="assessment">Assessments</span>
                <span class="new badge pill red darken-2 float-right mr-2">5</span>
            </a>
        </li>
        <li class="bold ">
            <a class="waves-effect waves-light "
               href="javascript:void(0)"
            >
                <i class="material-icons">compare_arrows</i>
                <span class="menu-title" data-i18n="comapre">Re-inspections</span>
                <span class="new badge pill red darken-2 float-right mr-2">5</span>
            </a>
        </li>
        <li class="bold ">
            <a class="waves-effect waves-light "
               href="javascript:void(0)"
            >
                <i class="material-icons">exposure</i>
                <span class="menu-title" data-i18n="exposure">Supplementaries</span>
                <span class="new badge pill red darken-2 float-right mr-2">5</span>
            </a>
        </li>
        <li class="bold ">
            <a class="waves-effect waves-light "
               href="{{ route('user.logout') }}"
            >
                <i class="material-icons">power_settings_new</i>
                <span class="menu-title" data-i18n="logout">Logout</span>
            </a>
        </li>
        <li class="bold ">
            <a href="#" class="role" data-id="10">Assessor</a>
            <a href="#" class="role" data-id="11">Adjuster</a>
            <a href="{{ url('head-assessor/claims') }}" class="role" data-id="9">Head Assessor</a>
        </li>
    </ul>
    @endhasrole
    <div class="navigation-background"></div>
    <a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only"
       href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
</aside>  <!-- END: SideNav-->

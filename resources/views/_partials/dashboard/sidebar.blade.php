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
            <a class="navigation-header-text">Self Service Support</a>
            <i class="navigation-header-icon material-icons">more_horiz</i>
        </li>
        <li class="bold ">
            <a class="sidenav-link" id="motorAssessment"
               href="#"
            >
                <i class="material-icons">assessment</i>
                <span class="menu-title" data-i18n="Motor Assessment">Motor Assessment</span>
            </a>
        </li>
{{--        @if($user->userTypeID == App\Conf\Config::$USER_TYPES['INTERNAL']['ID'])--}}
        <li class="bold ">
            <a class="sidenav-link"
               href="#"
            >
                <i class="material-icons">monetization_on</i>
                <span class="menu-title" data-i18n="Motor Valuation">Motor Valuation</span>
            </a>
        </li>
        <li class="bold ">
            <a class="sidenav-link"
               href="#"
            >
                <i class="material-icons">autorenew</i>
                <span class="menu-title" data-i18n="Policy Renewals">Policy Renewals</span>
            </a>
        </li>
        <li class="bold ">
            <a class="sidenav-link"
               href="#"
            >
                <i class="material-icons">wifi</i>
                <span class="menu-title" data-i18n="Policy Renewals">Safaricom Home Fiber</span>
            </a>
        </li>
{{--        @endif--}}
        <li class="bold ">
            <a class="sidenav-link"
               href="#"
            >
                <i class="material-icons">contact_mail</i>
                <span class="menu-title" data-i18n="logout">Contact IT</span>
            </a>
        </li>
        <li class="bold ">
            <a class=""
               href="/"
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

<nav class="sb-topnav navbar navbar-expand" style="background-color: lightcyan">
    <!-- Navbar Brand-->
{{--    <a class="navbar-brand ps-3" href="index.html"><img src="{{asset('/images.login.jpeg')}}"></a>--}}
    <div class="sb-sidenav-menu-heading bg-success" style="width: 225px; height: 60px">
        <div class="small m-4 text-white">VOSH Church Buru Buru</div>
    </div>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
{{--        <div class="input-group">--}}
{{--            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />--}}
{{--            <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>--}}
{{--        </div>--}}
    </form>
    <!-- Navbar-->

    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-black" href="#" id="navbarDropdown" role="button"
               data-mdb-toggle="dropdown" aria-expanded="false"> <i class="fas fa-user mx-1"></i> <img src="{{asset('images/favicon/jubilee_favicon.png')}}" sty> </a>
            <!-- Dropdown menu -->
            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <a class="dropdown-item" href="#">My account</a>
                </li>

                <li>
                    <a class="dropdown-item" href="#">Log out</a>
                </li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{route('profile')}}">My Profile</a></li>
                <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li><a class="dropdown-item" href="{{route('auth.logout')}}">Logout</a></li>
            </ul>
        </li>
    </ul>
</nav>

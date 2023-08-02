<nav class="sb-topnav navbar navbar-expand" style="background-color: #243c5a; padding-top: 10px; padding-bottom: 10px;">
    <!-- Navbar Brand -->
    {{-- <a class="navbar-brand ps-3" href="index.html"><img src="{{asset('/images.login.jpeg')}}"></a> --}}
    <div class="sb-sidenav-menu-heading bg-success" style="width: 225px; height: 50px;">
        <div class="small m-4 text-white">VOSH Church Buru Buru</div>
    </div>
    <!-- Sidebar Toggle -->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
        <i class="fa fa-bars text-red"></i>
    </button>
    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
         <div class="input-group">
            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
            <button class="btn btn-primary" id="btnNavbarSearch" type="button">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </form>
    <!-- Navbar -->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown bg-info">
            <a class="nav-link dropdown-toggle text-white" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-user fa-fw"></i> Profile &nbsp;&nbsp; Settings <span><i class="fa fa-bars"></i></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end bg-info" aria-labelledby="navbarDropdown">
                <li>
                    <a class="dropdown-item" href="{{route('profile')}}">
                        <i class="fa fa-user fa-fw"></i> My Profile
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{route('auth.logout')}}">
                        <i class="fa fa-sign-out-alt"></i> Logout
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
<script>
    $(document).ready(function() {
        $("#sidebarToggle").click(function() {
            $("#layoutSidenav").toggleClass("collapsed");
            // $("#layoutSidenav_content").toggleClass("collapsed");
        });
    });
</script>

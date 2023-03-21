<div id="layoutSidenav_nav" style="background-color: lightskyblue; text-emphasis-color: white">
    <nav class="sb-sidenav accordion"style="background-color: lightskyblue" id="sidenavAccordion">
        <div class="sb-sidenav-menu fw-bolder fs-6 text-white">
            <div class="nav">
                <div class="">
                    <img src="{{asset('images/login.jpeg')}}" style="height: 100px; width: 225px">
                </div>
                <a class="nav-link admin_dashboard_button" href="#">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Membership Management</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Members
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link church-members" href="#" data-id="{{config('membership.age_clusters.All_members.id')}}">{{config('membership.age_clusters.All_members.text')}}</a>
                        <a class="nav-link church-members" href="#" data-id="{{config('membership.age_clusters.Children.id')}}">{{config('membership.age_clusters.Children.text')}}</a>
                        <a class="nav-link church-members" href="#" data-id="{{config('membership.age_clusters.Teenies.id')}}">{{config('membership.age_clusters.Teenies.text')}}</a>
                        <a class="nav-link church-members" href="#" data-id="{{config('membership.age_clusters.Youths.id')}}">{{config('membership.age_clusters.Youths.text')}}</a>
                        <a class="nav-link church-members" href="#" data-id="{{config('membership.age_clusters.Middle_Age.id')}}">{{config('membership.age_clusters.Middle_Age.text')}}</a>
                        <a class="nav-link church-members" href="#" data-id="{{config('membership.age_clusters.Adults.id')}}">{{config('membership.age_clusters.Adults.text')}}</a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Cell Groups
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">


                        <a class="nav-link cell_group_members" href="#" data-id="{{config('membership.estate.kiambiu.id')}}">{{config('membership.estate.kiambiu.text')}}</a>
                        <a class="nav-link cell_group_members" href="#" data-id="{{config('membership.estate.umoja_bethel.id')}}">{{config('membership.estate.umoja_bethel.text')}}</a>
                        <a class="nav-link cell_group_members" href="#" data-id="{{config('membership.estate.kariobangi_south.id')}}">{{config('membership.estate.kariobangi_south.text')}}</a>
                        <a class="nav-link cell_group_members" href="#" data-id="{{config('membership.estate.chokaa_berea.id')}}">{{config('membership.estate.chokaa_berea.text')}}</a>
                        <a class="nav-link cell_group_members" href="#" data-id="{{config('membership.estate.diaspora.id')}}">{{config('membership.estate.diaspora.text')}}</a>
                        <a class="nav-link cell_group_members" href="#" data-id="{{config('membership.estate.langata.id')}}">{{config('membership.estate.langata.text')}}</a>
                        <a class="nav-link cell_group_members" href="#" data-id="{{config('membership.estate.Jericho.id')}}">{{config('membership.estate.Jericho.text')}}</a>

                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                    Authentication
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="/forgot">Reset Password</a>
                        <a class="nav-link" href="/logout">Logout</a>
                    </nav>
                </div>


            </div>
        </div>
        <div class="sb-sidenav-footer bg-success">
            <div class="small">Logged in as:</div>
            {{(\auth()->user()->name)}}
        </div>
    </nav>
</div>

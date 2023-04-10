<div id="layoutSidenav_nav" style="background-color: lightskyblue; text-emphasis-color: white">
    <nav class="sb-sidenav accordion"style="background-color: lightskyblue" id="sidenavAccordion">
        <div class="sb-sidenav-menu fw-bolder fs-6 text-white">
            <div class="nav">
                <div class="">
                    <a href="{{route('profile')}}"><img src="{{asset('images/login.jpeg')}}" data-toggle="tooltip" data-placement="top"></a>
                </div>
                @if(auth()->user()->role_as ==1)
                <a class="nav-link table-responsive admin_dashboard" href="#">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                    <div class="sb-sidenav-menu-heading">Membership Management</div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Members
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse text-dark" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link church-members text-dark" href="#" data-id="{{config('membership.age_clusters.All_members.id')}}">{{config('membership.age_clusters.All_members.text')}}</a>
                            <a class="nav-link church-members text-dark" href="#" data-id="{{config('membership.age_clusters.Children.id')}}">{{config('membership.age_clusters.Children.text')}}</a>
                            <a class="nav-link church-members text-dark" href="#" data-id="{{config('membership.age_clusters.Teenies.id')}}">{{config('membership.age_clusters.Teenies.text')}}</a>
                            <a class="nav-link church-members text-dark" href="#" data-id="{{config('membership.age_clusters.Youths.id')}}">{{config('membership.age_clusters.Youths.text')}}</a>
                            <a class="nav-link church-members text-dark" href="#" data-id="{{config('membership.age_clusters.Middle_Age.id')}}">{{config('membership.age_clusters.Middle_Age.text')}}</a>
                            <a class="nav-link church-members text-dark" href="#" data-id="{{config('membership.age_clusters.Adults.id')}}">{{config('membership.age_clusters.Adults.text')}}</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed"  id="" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Cell Groups
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">


                            <a class="nav-link cell_group_members text-dark" href="#" data-id="{{config('membership.cell_group.kiambiu.id')}}">{{config('membership.cell_group.kiambiu.text')}}</a>
                            <a class="nav-link cell_group_members text-dark" href="#" data-id="{{config('membership.cell_group.umoja_bethel.id')}}">{{config('membership.cell_group.umoja_bethel.text')}}</a>
                            <a class="nav-link cell_group_members text-dark" href="#" data-id="{{config('membership.cell_group.kariobangi_south.id')}}">{{config('membership.cell_group.kariobangi_south.text')}}</a>
                            <a class="nav-link cell_group_members text-dark" href="#" data-id="{{config('membership.cell_group.chokaa_berea.id')}}">{{config('membership.cell_group.chokaa_berea.text')}}</a>
                            <a class="nav-link cell_group_members text-dark" href="#" data-id="{{config('membership.cell_group.diaspora.id')}}">{{config('membership.cell_group.diaspora.text')}}</a>
                            <a class="nav-link cell_group_members text-dark" href="#" data-id="{{config('membership.cell_group.langata.id')}}">{{config('membership.cell_group.langata.text')}}</a>
                            <a class="nav-link cell_group_members text-dark" href="#" data-id="{{config('membership.cell_group.Jericho.id')}}">{{config('membership.cell_group.Jericho.text')}}</a>

                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Authentication
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link text-dark" href="/forgot">Reset Password</a>
                            <a class="nav-link text-dark" href="/logout">Logout</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="" id="add-member" data-bs-toggle="" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Add New Member
                    </a>


                @endif
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Authentication
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link text-dark" href="/forgot">Reset Password</a>
                        <a class="nav-link text-dark" href="/logout">Logout</a>
                    </nav>
                </div>

                <a class="nav-link collapsed" href="" id="edit_profile_button" data-bs-toggle="" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Edit Profile
                </a>

{{--                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>--}}


            </div>
        </div>
        <div class="sb-sidenav-footer bg-success">
            <div class="small">Logged in as:</div>
            {{(\auth()->user()->name)}}
        </div>
    </nav>
</div>
<script>
    $(document).ready(function () {
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

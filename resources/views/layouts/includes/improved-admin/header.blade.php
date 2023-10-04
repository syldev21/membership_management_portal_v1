<div class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="float-left">
                    <div class="hamburger sidebar-toggle">
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                    </div>
                </div>
                <div class="float-right" style="min-width: 300px;">
                    <div class="dropdown">
                        <a href="#" class="header-icon" data-toggle="dropdown">
                            <i class="ti-bell"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-content-heading">
                                <span class="text-left">Recent Notifications</span>
                            </div>
                            <div class="dropdown-content-body">
                                <ul>
                                    @php
                                        $activities = \App\Models\ActivityLog::orderBy('created_at', 'DESC')->take(5)->get();
                                    @endphp
                                    @foreach($activities as $notification)
                                        @php
                                            $user = $notification->createdByUser;
                                        @endphp
                                        <li>
                                            <a href="#">
                                                @if($notification->picture)
                                                    <img class="pull-left m-r-10 avatar-img" src="{{ asset('images/profile/sylvester.jpeg') }}" alt="" />
                                                @else
                                                    <img class="pull-left m-r-10 avatar-img"
                                                         src="images/vosh_avator.jpg" alt="" />
                                                @endif
                                                <div class="notification-content">
                                                    <small class="notification-timestamp pull-right">{{\Carbon\Carbon::parse($notification->created_at)->diffForHumans()}}</small>
                                                    <div class="notification-heading" style="min-width: 300px">{{$user->name}}</div>
                                                    <div class="notification-text">{{config('membership.statuses.activity')[$notification->activity]}}</div>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                    <li class="text-center">
                                        <a href="#" class="more-link activity_log">
                                            See All
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown">
                        <a href="#" class="header-icon" data-toggle="dropdown">
                            <i class="ti-email"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-content-heading">
                                <span class="text-left">2 New Messages</span>
                            </div>
                            <div class="dropdown-content-body">
                                <ul>
                                    <li class="notification-unread">
                                        <a href="#">
                                            <img class="pull-left m-r-10 avatar-img"
                                                 src="images/avatar/1.jpg" alt="" />
                                            <div class="notification-content">
                                                <small class="notification-timestamp pull-right">02:34
                                                    PM</small>
                                                <div class="notification-heading">Michael Qin</div>
                                                <div class="notification-text">Hi Teddy, Just wanted to let you
                                                    ...</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="notification-unread">
                                        <a href="#">
                                            <img class="pull-left m-r-10 avatar-img"
                                                 src="images/avatar/2.jpg" alt="" />
                                            <div class="notification-content">
                                                <small class="notification-timestamp pull-right">02:34
                                                    PM</small>
                                                <div class="notification-heading">Mr. John</div>
                                                <div class="notification-text">Hi Teddy, Just wanted to let you
                                                    ...</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img class="pull-left m-r-10 avatar-img"
                                                 src="images/avatar/3.jpg" alt="" />
                                            <div class="notification-content">
                                                <small class="notification-timestamp pull-right">02:34
                                                    PM</small>
                                                <div class="notification-heading">Michael Qin</div>
                                                <div class="notification-text">Hi Teddy, Just wanted to let you
                                                    ...</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img class="pull-left m-r-10 avatar-img"
                                                 src="images/avatar/2.jpg" alt="" />
                                            <div class="notification-content">
                                                <small class="notification-timestamp pull-right">02:34
                                                    PM</small>
                                                <div class="notification-heading">Mr. John</div>
                                                <div class="notification-text">Hi Teddy, Just wanted to let you
                                                    ...</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="text-center">
                                        <a href="#" class="more-link">See All</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown">
                        <a href="#" class="header-icon" data-toggle="dropdown">
                            <span class="user-avatar">{{ \Illuminate\Support\Facades\Auth::user()->name }} <i class="ti-angle-down f-s-10"></i></span>
                        </a>
                        <div class="dropdown-menu dropdown-profile dropdown-menu-right">
                            <div class="dropdown-content-body">
                                <ul>
                                    <li>
                                        <a href="/profile-page">
                                            <i class="ti-user"></i>
                                            <span>Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('auth.logout') }}">
                                            <i class="ti-power-off"></i>
                                            <span>Logout</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/profile-edit-page">
                                            <i class="ti-pencil"></i>
                                            <span>Edit Profile</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- [ Header ] start -->
<header class="navbar pcoded-header navbar-expand-lg navbar-light">
    <div class="m-header">
        <a class="mobile-menu" id="mobile-collapse1" href="javascript:"><span></span></a>
        <a href="{{url('d_home')}}" class="b-brand">
                <span>
                    <i class="feather icon-shopping-cart" style="color: aquamarine; font-size: xx-large"></i>
                </span>
            <span class="b-title">Ace Dashboard</span>
        </a>
    </div>
    <a class="mobile-menu" id="mobile-header" href="javascript:">
        <i class="feather icon-more-horizontal"></i>
    </a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li><a href="javascript:" class="full-screen" onclick="javascript:toggleFullScreen()"><i class="feather icon-maximize"></i></a></li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li>
                <div class="dropdown drp-user mt-3">
                    <a href="javascript:" class="dropdown-toggle" data-toggle="dropdown">
                        {{--<i class="icon feather icon-settings"></i>--}}
                        <img src="{{asset('/images/admin/')}}/{{Auth::user()->uphoto}}" width="60px" height="60px" class="img-radius" alt="User-Profile-Image">
                        <span style="margin-left: 10px">
                                @auth
                                <b>{{Auth::user()->name}}</b>
                                @endauth
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-notification">
                        <div class="pro-head">
                            <span style="margin-left: 25px">
                                @auth
                                    <b>{{Auth::user()->name}}</b>
                                @endauth
                            </span>
                            <span class="text-right">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="feather thisone icon-log-out float-right"></i>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            </span>

                        </div>
                        <ul class="pro-body">
                            <li><a href="/show/admin" class="dropdown-item"><i class="feather icon-user"></i> Profile</a></li>
                            <li><a href="/admin/change-password" class="dropdown-item"><i class="feather icon-lock"></i> Change Password</a></li>
                            <li>
                                <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="feather icon-log-out"></i> Logout </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</header>
<!-- [ Header ] end -->
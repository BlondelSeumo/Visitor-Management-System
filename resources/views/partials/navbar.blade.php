
<div class="navigation navbar navbar-light py-lg-7">

    <!-- Brand -->
    <a href="#" class="d-none d-lg-block">
        <img src="{{ asset('assets/images/brand.svg') }}" class="mx-auto fill-primary" data-inject-svg="" alt="" style="height: 46px;">
    </a>

    <!-- Menu -->
    <ul class="nav navbar-nav flex-row flex-lg-column flex-grow-1 justify-content-between py-2 py-lg-0">

        <!-- Create group -->
        <li class="nav-item mt-lg-8">
            <a class="nav-link position-relative p-0 py-2 active"  href="#" title="Dashboard">
                <i class="icon-lg fe-monitor"></i>
            </a>
        </li>

        <!-- Users -->
        <li class="nav-item mt-lg-8">
            <a class="nav-link position-relative p-0 py-2" href="{{route('users.index')}}" title="Users" >
                <i class="icon-lg fe-users"></i>
            </a>
        </li>

        <!-- Chats -->
        <li class="nav-item mt-lg-8">
            <a class="nav-link position-relative p-0 py-2 "  href="#" title="Chats">
                <i class="icon-lg fe-message-square"></i>
                <div class="badge badge-dot badge-primary badge-bottom-center"></div>
            </a>
        </li>

        <!-- Demo only: Documentation -->
        <li class="nav-item mt-lg-8 d-none d-lg-block">
            <a class="nav-link position-relative p-0 py-2" data-toggle="tab" href="#" title="Demos">
                <i class="icon-lg fe-help-circle"></i>
            </a>
        </li>

        <!-- Settings -->
        <li class="nav-item mt-lg-8">
            <a class="nav-link position-relative p-0 py-2" href="#" title="Settings">
                <i class="icon-lg fe-settings"></i>
            </a>
        </li>

        <!-- Profile: Hidden on lg -->
        <li class="nav-item mt-lg-8 d-block d-lg-none">
            <a class="nav-link position-relative p-0 py-2" href="#" title="User">
                <i class="icon-lg fe-user"></i>
            </a>
        </li>

        <!-- Profile: Hidden on sm -->
        <li class="nav-item mt-lg-8 d-none d-lg-block">
            <a class="nav-link position-relative p-0 py-2"  href="#" title="User">
                <div class="avatar avatar-sm avatar-online mx-auto">
                    <img class="avatar-img" src="{{asset('assets/images/avatars/12.jpg')}}" alt="">
                </div>
            </a>
        </li>

    </ul>
    <!-- Menu -->
</div>

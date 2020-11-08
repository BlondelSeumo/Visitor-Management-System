<!-- Nav bar -->
<div class="navigation navbar navbar-light justify-content-center py-xl-7">

    <!-- Brand -->
    <a href="#" class="d-none d-xl-block mb-6">
        @if(setting('site_logo'))
        <img src="{{ asset('images/'.setting('site_logo')) }}" class="mx-auto fill-primary" data-inject-svg="" alt="" style="height: 46px;">
        @else
        <img src="{{ asset('assets/images/brand.png') }}" class="mx-auto fill-primary" data-inject-svg="" alt="" style="height: 46px;">
        @endif
    </a>

    <!-- Menu -->

    <ul class="nav navbar-nav flex-row flex-xl-column flex-grow-1 justify-content-between justify-content-xl-center py-3 py-lg-0" role="tablist">
        <!-- Create group -->
        <li class="nav-item mt-xl-1" >
            <a class="tooltip-custom nav-link position-relative p-0 py-xl-3 {{ request()->is('profile') ? 'active' : '' }}"  href="{{ url('profile') }}">
                <i class="icon-lg fe-user-check "></i>
                <span class="tooltip-text tooltip-bottom">Profile</span>
            </a>
        </li>

    </ul>

    <ul class="nav navbar-nav flex-row flex-xl-column flex-grow-1 justify-content-between justify-content-xl-center py-3 py-lg-0" role="tablist">
        <!-- Create group -->
        <li class="nav-item mt-xl-1" >
            <a class="tooltip-custom nav-link position-relative p-0 py-xl-3 {{ request()->is('dashboard') ? 'active' : '' }}"  href="{{ url('dashboard') }}">
                <i class="icon-lg fe-monitor "></i>
                <span class="tooltip-text tooltip-bottom">Dashboard</span>
            </a>
        </li>

        @hasanyrole('reception|admin')
        <li class="nav-item mt-xl-1">
            <a class="tooltip-custom nav-link position-relative p-0 py-xl-3 {{ request()->is('users') || request()->is('users/*') ? 'active' : '' }}"  href="{{ url('users') }}" >
                <i class="icon-lg fe-user"></i>
                <span class="tooltip-text tooltip-bottom">User</span>
            </a>
        </li>
        <li class="nav-item mt-xl-1 ">
            <a class="tooltip-custom nav-link position-relative p-0 py-xl-3 {{ request()->is('departments') || request()->is('departments/*') ? 'active' : '' }}" href="{{ url('departments') }}" >
                <i class="icon-lg fe-feather"></i>
                <span class="tooltip-text tooltip-bottom">Department</span>
            </a>
        </li>
        <li class="nav-item mt-xl-1 ">
            <a class="tooltip-custom nav-link position-relative p-0 py-xl-3 {{ request()->is('designations') || request()->is('designations/*') ? 'active' : '' }}" href="{{ url('designations') }}">
                <i class="icon-lg fe-layers"></i>
                <span class="tooltip-text tooltip-bottom">Designation</span>
            </a>
        </li>

        <li class="nav-item mt-xl-1">
            <a class="tooltip-custom nav-link position-relative p-0 py-xl-3 {{ request()->is('employees') || request()->is('employees/*') ? 'active' : '' }}"  href="{{ route('admin.employees.index') }}">
                <i class="icon-lg fe-users"></i>
                <span class="tooltip-text tooltip-bottom">Employee</span>
            </a>
        </li>
        @endhasanyrole

        <!-- Profile -->
        <li class="nav-item mt-xl-1">
            <a class="tooltip-custom nav-link position-relative p-0 py-xl-3 {{ request()->is('bookings') || request()->is('bookings/*') ? 'active' : '' }}"  href="{{route('admin.bookings.index')}}" >
                <i class="icon-lg fe-check-square"></i>
                <span class="tooltip-text tooltip-bottom">Booking</span>
            </a>
        </li>
        <li class="nav-item mt-xl-1">
            <a class="tooltip-custom nav-link position-relative p-0 py-xl-3 {{ request()->is('visitors') || request()->is('visitors/*') ? 'active' : '' }}"  href="{{ route('admin.visitors.index') }}" >
                <i class="icon-lg fe-list"></i>
                <span class="tooltip-text tooltip-bottom">Visitor</span>
            </a>
        </li>
        <li class="nav-item mt-xl-1">
            <a class="tooltip-custom nav-link position-relative p-0 py-xl-3 {{ request()->is('pre-registers') || request()->is('pre-registers/*') ? 'active' : '' }}"  href="{{ route('admin.pre-registers.index') }}" >
                <i class="icon-lg fe-layout"></i>
                <span class="tooltip-text tooltip-bottom">Pre-register</span>
            </a>
        </li>
        <li class="nav-item mt-xl-5" >
            <a class="tooltip-custom nav-link position-relative p-0 py-xl-3" href="{{ url('/logout') }}"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <i class="icon-lg fe-log-out "></i>
                <span class="tooltip-text tooltip-bottom">Logout</span>
            </a>

            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
        @hasanyrole('admin')
        <!-- Settings -->
        <li class="nav-item mt-xl-1">
            <a class="tooltip-custom nav-link position-relative p-0 py-xl-3 {{ request()->is('settings') || request()->is('settings/*') ? 'active' : '' }}" href="{{ route('admin.settings','general') }}" >
                <i class="icon-lg fe-settings"></i>
                <span class="tooltip-text tooltip-top">Setting</span>
            </a>
        </li>
        @endhasanyrole
    </ul>
    <!-- Menu -->
</div>
<!-- Nav bar -->

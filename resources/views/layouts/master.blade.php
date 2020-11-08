<!DOCTYPE html>
<html lang="en">

@include('layouts.partials.head._head')

<body>
    <div class="layout">
        @include('layouts.partials.navigation._navigation')

        @yield('sidebar')
        <!-- Main Content -->
        <div class="main @yield('main-class')" data-mobile-height="">
            @yield('content')
        </div>
        <!-- Main Content -->
    </div>

@yield('extras')

@stack('modals')

@include('layouts.partials.script._scripts')

</body>
</html>

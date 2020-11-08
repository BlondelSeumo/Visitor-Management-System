<!-- Sidebar -->
<div class="sidebar">
    <div class="chat-header border-bottom py-4 py-lg-6 px-lg-2">
        <div class="container-xxl ">

            <div class="row align-items-center">
                <!-- Chat photo -->
                <div class="col-9 col-xl-9 ">
                    <div class="media text-xl-left">

                        <div class="media-body align-self-center text-truncate">
                            <h6 class="text-truncate mb-n1">{{ trans_choice('settings', 1) }}</h6>
                            <small class="text-muted">Update all kind of settings</small>
                        </div>
                    </div>
                </div>

                <!-- Chat toolbar -->
                <div class="col-3 col-xl-3 text-right">
                    <ul class="nav justify-content-end">
                        <!-- Mobile nav -->
                        <li class="nav-item list-inline-item d-block d-xl-none">
                            <a class="nav-link text-muted px-0" href="#" data-chat="open">
                                <i class="icon-md fe-chevron-right"></i>
                            </a>
                        </li>
                        <!-- Mobile nav -->
                    </ul>
                </div>

            </div><!-- .row -->

        </div>
    </div>
    <div class="d-flex flex-column h-100">

        <div class="hide-scrollbar">
            <div class="container-fluid py-6">
                <nav class="mb-n6">
                    <a class="text-reset nav-link p-0 mb-6" href="{{ route('admin.settings','general') }}">
                        <div class="card card-active-listener">
                            <div class="card-body">
                                <div class="media">
                                    <div class="media-body overflow-hidden">
                                        <div class="d-flex align-items-center mb-1">
                                            <h6 class="text-truncate mb-0 mr-auto">General Settings</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a class="text-reset nav-link p-0 mb-6" href="{{ route('admin.settings','notifications') }}">
                        <div class="card card-active-listener">
                            <div class="card-body">
                                <div class="media">
                                    <div class="media-body overflow-hidden">
                                        <div class="d-flex align-items-center mb-1">
                                            <h6 class="text-truncate mb-0 mr-auto">Notification Settings</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a class="text-reset nav-link p-0 mb-6" href="{{ route('admin.settings','photo_id_card') }}">
                        <div class="card card-active-listener">
                            <div class="card-body">
                                <div class="media">
                                    <div class="media-body overflow-hidden">
                                        <div class="d-flex align-items-center mb-1">
                                            <h6 class="text-truncate mb-0 mr-auto">Photo & ID Card Settings</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a class="text-reset nav-link p-0 mb-6"  href="{{ route('admin.settings','template') }}">
                        <div class="card card-active-listener">
                            <div class="card-body">
                                <div class="media">
                                    <div class="media-body overflow-hidden">
                                        <div class="d-flex align-items-center mb-1">
                                            <h6 class="text-truncate mb-0 mr-auto">Email & Sms template Settings</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a class="text-reset nav-link p-0 mb-6"  href="{{ route('admin.settings','email') }}">
                        <div class="card card-active-listener">
                            <div class="card-body">
                                <div class="media">
                                    <div class="media-body overflow-hidden">
                                        <div class="d-flex align-items-center mb-1">
                                            <h6 class="text-truncate mb-0 mr-auto">Email  Settings</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a class="text-reset nav-link p-0 mb-6" href="{{ route('admin.settings','front-end') }}">
                        <div class="card card-active-listener">
                            <div class="card-body">
                                <div class="media">
                                    <div class="media-body overflow-hidden">
                                        <div class="d-flex align-items-center mb-1">
                                            <h6 class="text-truncate mb-0 mr-auto">Front-end Settings</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>

                </nav>
            </div>
        </div>

    </div>
</div>
<!-- Sidebar -->

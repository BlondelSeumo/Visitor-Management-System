@extends('layouts.master')

@section('sidebar')
    @include('admin.booking.partials._sidebar', $bookings)
@endsection
@section('css')
    <style>

        [type=radio] {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* IMAGE STYLES */
        [type=radio] + img {
            cursor: pointer;
        }
    </style>
@endsection

@section('content')
    <!-- Default Page -->
    <div id="chat-2" class="chat">
        <div class="chat-body">
            <!-- Chat: Header -->
            <div class="chat-header border-bottom py-4 py-lg-6 px-lg-4">
                <div class="container-xxl p-0">
                    <div class="row align-items-center p-0">
                        <!-- Close chat(mobile) -->
                        <div class="col-3 d-xl-none">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item">
                                    <a class="text-muted px-0" href="#" data-chat="open">
                                        <i class="icon-md fe-chevron-left"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <!-- Chat photo -->
                        <div class="col-6 col-xl-6">
                            <div class="media text-center text-xl-left">

                                <div class="media-body align-self-center text-truncate">
                                    <h5 class="text-truncate mb-n1">{{__('Select agent or employee')}}</h5>
                                    <span class="badge badge-dot badge-success d-inline-block d-xl-none mr-1"></span>
                                </div>
                            </div>
                        </div>

                        <!-- Chat toolbar -->
                        <div class="col-3 col-xl-6 text-right">

                                <!-- Mobile nav -->
                                <li class="nav-item list-inline-item d-block d-xl-none">
                                    <div class="dropdown">
                                        <a class="nav-link text-muted px-0" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="icon-md fe-more-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item d-flex align-items-center" data-toggle="collapse" data-target="#chat-2-search" href="#">
                                                Search <span class="ml-auto pl-5 fe-search"></span>
                                            </a>

                                            <a class="dropdown-item d-flex align-items-center" href="#" data-chat-sidebar-toggle="#chat-2-info">
                                                Chat Info <span class="ml-auto pl-5 fe-more-horizontal"></span>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <!-- Mobile nav -->
                            </ul>
                        </div>

                    </div><!-- .row -->

                </div>
            </div>
            <!-- Chat: Header -->

            <!-- Chat: Search -->
            <div class="collapse border-bottom px-lg-4" id="chat-2-search">
                <div class="container-xxl py-4 py-lg-6">

                    <div class="input-group">
                        <input type="text" class="form-control form-control-lg" placeholder="Search this chat" aria-label="Search this chat">

                        <div class="input-group-append">
                            <button class="btn btn-lg btn-ico btn-secondary btn-minimal" type="submit">
                                <i class="fe-search"></i>
                            </button>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Chat: Search -->

            <!-- Chat: Content-->
            <div class="chat-content px-lg-8">

                <div class="text-center hide-scrollbar d-flex my-7 scroll-menu">
                    @foreach($departments as $department)
                    <a class="badge badge-secondary m-1"  onclick="getEmployee({{$department->id}})">{{$department->name}}</a>
                    @endforeach
                </div>

                <!-- Chats -->
                <nav class="nav d-block list-discussions-js mb-n6">
                    @if($employee)
                    <div class="row" id="employeeList">
                        @foreach($employees as $employee)
                        <div class="col-md-3" onclick="getEmployeeProfile({{$employee->id}})">
                            <div class="card mb-4 shadow-sm user-box" id="div-card-css">
                                <label>
                                    <input type="radio" name="test" value="small" checked>
                                    @if($employee->user->getFirstMediaUrl('users'))
                                        <img class="bd-placeholder-img card-img-top"  src="{{ asset($employee->user->getFirstMediaUrl('users')) }}" style=" width: 100%; height: 100px;" alt="">
                                    @else
                                        <img class="bd-placeholder-img card-img-top"  src="{{ asset('assets/images/avatars/11.jpg') }}" style=" width: 100%; height: 100px;" alt="profile picture">
                                    @endif
                                </label>
                                <div class="card-body p-2 m-3">
                                    <h5 class="card-subtitle mb-2 text-tertiary">{{$employee->name}}</h5>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                        @endif
                </nav>
                <!-- Chats -->
            </div>

            <div class="chat-footer border-top py-4 py-lg-6 px-lg-4">
                @if($employee)
                <form class="form-horizontal" role="form"  method="POST" action="{{ route('admin.bookings.step-one.next') }}" >
                    {{ csrf_field() }}
                    <input  type="hidden" id="employeeID" value="{{$employee->id}}" name="employeeID">

                    <div class="form-row align-items-center">
                        <div class="col">
                            <a href="{{ route('admin.bookings.index') }}" class="btn btn-lg btn-sm btn-danger float-left text-white">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i> Cancel
                            </a>
                        </div>

                        <!-- Submit button -->
                        <div class="col-auto">
                            <button type="submit" class="btn btn-success btn-sm float-right" id="hide">
                                Next <i class="fa fa-arrow-right" aria-hidden="true"></i>
                            </button>

                        </div>

                    </div>
                </form>
                    @endif
            </div>
            <!-- Chat: Footer -->
        </div>

        <div id="chat-2-info" class="chat-sidebar chat-sidebar-visible">
            <div class="d-flex h-100 flex-column" id="employeeProfile">
                @if($employee)
                <div class="hide-scrollbar flex-fill" >

                    <div class="border-bottom text-center py-9 px-10">
                        <!-- Photo -->
                        <div class="avatar avatar-xl mx-5 mb-5">
                            @if($employee->user->getFirstMediaUrl('users'))
                                <img class="avatar-img" src="{{ asset($employee->user->getFirstMediaUrl('users')) }}" alt="">
                            @else
                                <img class="avatar-img" src="{{ asset('assets/images/avatars/11.jpg') }}" alt="">
                            @endif
                        </div>
                        <h6>{{ $employee->name}}</h6>
                        @if($employee->nickname) <span> ({{$employee->nickname}}) </span>@endif
                        <p class="text-muted text-sm-center">{{ $employee->department->name }}</p>
                    </div>

                    <!-- Details -->
                    <ul class="list-group list-group-flush mb-8">
                        <li class="list-group-item py-6">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <p class="small text-muted mb-0">{{__('Designation')}}</p>
                                    <p>{{$employee->designation->name}}</p>
                                </div>
                                <i class="text-muted icon-sm fe-disc"></i>
                            </div>
                        </li>

                        <li class="list-group-item py-6">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <p class="small text-muted mb-0">{{__('Phone')}}</p>
                                    <p>{{$employee->user->phone}}</p>
                                </div>
                                <i class="text-muted icon-sm fe-phone"></i>
                            </div>
                        </li>

                        <li class="list-group-item py-6">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <p class="small text-muted mb-0">{{__('Email')}}</p>
                                    <p>{{$employee->user->email}}</p>
                                </div>
                                <i class="text-muted icon-sm fe-mail"></i>
                            </div>
                        </li>

                        <li class="list-group-item py-6">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <p class="small text-muted mb-0">{{__('Joining Date')}}</p>
                                    <p>{{$employee->date_of_joining}}</p>
                                </div>
                                <i class="text-muted icon-sm fe-clock"></i>
                            </div>
                        </li>
                        <li class="list-group-item py-6">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <p class="small text-muted mb-0">{{__('Gender')}}</p>
                                    <p>
                                        @foreach(trans('genders') as $key=> $gender)
                                            @if($key == $employee->gender)
                                                {{$gender}}
                                            @endif
                                        @endforeach
                                    </p>
                                </div>
                                <i class="text-muted icon-sm fe-user-x"></i>
                            </div>
                        </li>
                    </ul>

                </div>
                @endif
            </div>
        </div>
    </div>


@endsection
@section('scripts')
    <script src="{{ asset('js/booking/index.js') }}"></script>
@endsection

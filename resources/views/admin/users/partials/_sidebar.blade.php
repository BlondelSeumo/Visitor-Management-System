<!-- Sidebar -->
<div class="sidebar @yield('sidebar-class')">
    <div class="chat-header border-bottom py-4 py-lg-6 px-lg-2">
        <div class="container-xxl ">

            <div class="row align-items-center">
                <!-- Chat photo -->
                <div class="col-9 col-xl-9 ">
                    <div class="media text-xl-left">

                        <div class="media-body align-self-center text-truncate">
                            <h6 class="text-truncate mb-n1">{{ trans_choice('users.title', 1) }}</h6>
                            <small class="text-muted">{{__('Users list & search')}}</small>
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
                <!-- Search -->
                {!! Form::open(['method' => 'GET', 'route' => 'users.index', 'class' => 'mb-6', 'role' => 'search'])  !!}
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm" name="search" placeholder="Search for pre_registers..." aria-label="Search for pre_registers...">
                        <div class="input-group-append">
                            <button class="btn btn-sm btn-ico btn-secondary btn-minimal" type="submit">
                                <i class="fe-search"></i>
                            </button>
                        </div>
                    </div>
                {!! Form::close() !!}
                <!-- Search -->

                <!-- Create Link -->
                <a href="{{ route('users.create') }}" type="button" class="btn btn-sm btn-block btn-primary d-flex align-items-center mb-6">
                    <i class="fe-plus"></i>
                    {{ __(' Add New User')}}
                    <i class="fe-users ml-auto"></i>
                </a>

                <!-- visitors -->
                <nav class="mb-n6">
                @foreach($users as $user)
                    <!-- visitor -->
                        <div class="card mb-6">
                            <div class="card-body">
                                <div class="media">
                                    <div class="avatar mr-5">
                                        @if($user->getFirstMediaUrl('users'))
                                            <img class="avatar-img" src="{{ asset($user->getFirstMediaUrl('users')) }}" alt="">
                                        @else
                                            <img class="avatar-img" src="{{ asset('assets/images/avatars/11.jpg') }}" alt="">
                                        @endif
                                    </div>

                                    <div class="media-body align-self-center overflow-hidden">
                                        <h6 class="mb-0">{{ $user->name }}</h6>
                                        <small class="text-muted">{{$user->email}}</small>
                                    </div>

                                    <div class="align-self-center ml-5">
                                        <div class="dropdown z-index-max">
                                            <a href="#" class="btn btn-sm btn-ico btn-link text-muted w-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fe-more-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item d-flex align-items-center" href="{{route('users.destroy',$user->id)}}" onclick="event.preventDefault(); document.getElementById('delete-form{{$user->id}}').submit()">
                                                    Delete <span class="ml-auto fe-trash-2"></span>
                                                </a>
                                                <form id="delete-form{{$user->id}}" action="{{ route('users.destroy',$user->id) }}" method="POST" style="display: none;">
                                                    {{ method_field('delete') }}
                                                    @csrf
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Link -->
                                <a href="{{route('users.show',$user->id)}}" class="stretched-link"></a>
                            </div>
                        </div>
                    </a>
                @endforeach
                @if(!blank($users->links()))
                    {{ $users->links() }}
                @endif
                </nav>
                <!-- visitors -->
            </div>
        </div>

    </div>
</div>
<!-- Sidebar -->

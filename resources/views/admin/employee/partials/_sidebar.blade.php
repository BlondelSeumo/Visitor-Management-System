<!-- Sidebar -->
<div class="sidebar @yield('sidebar-class')">
    <div class="chat-header border-bottom py-4 py-lg-6 px-lg-2">
        <div class="container-xxl ">

            <div class="row align-items-center">
                <!-- Chat photo -->
                <div class="col-9 col-xl-9 ">
                    <div class="media text-xl-left">

                        <div class="media-body align-self-center text-truncate">
                            <a href="{{route('admin.employees.index')}}">
                            <h6 class="text-truncate mb-n1">{{ trans_choice('entity.employee', 1) }}</h6>
                            <small class="text-muted">Employee list & search</small>
                            </a>
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
                {!! Form::open(['method' => 'GET', 'route' => 'admin.employees.index', 'class' => 'mb-6', 'role' => 'search'])  !!}
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm" name="search" placeholder="Search for employees..." aria-label="Search for employees...">
                        <div class="input-group-append">
                            <button class="btn btn-sm btn-ico btn-secondary btn-minimal" type="submit">
                                <i class="fe-search"></i>
                            </button>
                        </div>
                    </div>
                {!! Form::close() !!}
                <!-- Search -->

                <!-- Create Link -->
                <a href="{{ route('admin.employees.create') }}" type="button" class="btn btn-sm btn-block btn-primary d-flex align-items-center mb-6">
                    <i class="fe-plus"></i>
                    {{ __(' Add New') }} {{ trans_choice('entity.employee', 1) }}
                    <i class="fe-users ml-auto"></i>
                </a>

                <!-- visitors -->
                <nav class="mb-n6">
                    @if(count($employees))
                @foreach($employees as $employee)
                    <!-- visitor -->
                        <div class="card mb-6">
                            <div class="card-body">
                                <div class="media">
                                    <div class="avatar mr-5">
                                        @if($employee->user->getFirstMediaUrl('users'))
                                            <img class="avatar-img" src="{{ asset($employee->user->getFirstMediaUrl('users')) }}" alt="">
                                        @else
                                            <img class="avatar-img" src="{{ asset('assets/images/avatars/11.jpg') }}" alt="">
                                        @endif
                                    </div>

                                    <div class="media-body align-self-center overflow-hidden">
                                        <h6 class="mb-0">{{ $employee->name }}</h6>
                                        <small class="text-truncate">{{$employee->user->email}}</small>
                                    </div>

                                    <div class="align-self-center ml-5">
                                        <div class="dropdown z-index-max">
                                            <a href="#" class="btn btn-sm btn-ico btn-link text-muted w-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fe-more-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item d-flex align-items-center" href="{{route('admin.employees.edit',$employee->id)}}">
                                                    Edit <span class="ml-auto fe-edit-2"></span>
                                                </a>
                                                <a class="dropdown-item d-flex align-items-center" href="{{route('admin.employees.destroy',$employee->id)}}" onclick="event.preventDefault(); document.getElementById('delete-form{{$employee->id}}').submit()">
                                                    Delete <span class="ml-auto fe-trash-2"></span>
                                                </a>
                                                <form id="delete-form{{$employee->id}}" action="{{ route('admin.employees.destroy',$employee->id) }}" method="POST" style="display: none;">
                                                    {{ method_field('delete') }}
                                                    @csrf
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Link -->
                                <a href="{{route('admin.employees.show',$employee->id)}}" class="stretched-link"></a>
                                 </div>
                            </div>
                    <!-- visitor -->
                @endforeach
                @endif
                @if(!blank($employees->links()))
                    {{ $employees->links() }}
                @endif
                </nav>
                <!-- visitors -->

            </div>
        </div>

    </div>
</div>
<!-- Sidebar -->

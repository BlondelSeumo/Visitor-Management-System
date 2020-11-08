<!-- Sidebar -->
<div class="sidebar">
    <div class="d-flex flex-column h-100">

        <div class="hide-scrollbar">
            <div class="container-fluid py-6">
                <h2 class="font-bold mb-6">{{ trans_choice('bookings.title', 1) }}</h2>

                <!-- Search -->
                {!! Form::open(['method' => 'GET', 'route' => 'admin.bookings.index', 'class' => 'mb-6', 'role' => 'search'])  !!}
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm" name="search" placeholder="Search for bookings..." aria-label="Search for bookings...">
                        <div class="input-group-append">
                            <button class="btn btn-sm btn-ico btn-secondary btn-minimal" type="submit">
                                <i class="fe-search"></i>
                            </button>
                        </div>
                    </div>
                {!! Form::close() !!}
                <!-- Search -->

                <!-- Create Link -->
                <a href="{{ route('admin.bookings.create') }}" type="button" class="btn btn-sm btn-block btn-primary d-flex align-items-center mb-6">
                    <i class="fe-plus"></i>
                    {{ __(' Add New') }} {{ trans_choice('entity.booking', 1) }}
                    <i class="fe-users ml-auto"></i>
                </a>
                <nav class="mb-n6">
                @foreach($bookings as $booking)
                    <!-- visitor -->
                        <div class="card mb-6">
                            <div class="card-body">
                                <div class="media">
                                    <div class="avatar mr-5">
                                        @if($booking->invitationFirst->visitor->getFirstMediaUrl('visitor'))
                                            <img class="avatar-img" src="{{ asset($booking->invitationFirst->visitor->getFirstMediaUrl('visitor')) }}" alt="">
                                        @else
                                            <img class="avatar-img" src="{{ asset('assets/images/avatars/11.jpg') }}" alt="">
                                        @endif
                                    </div>
                                    <div class="media-body align-self-center overflow-hidden">
                                        <h6 class="mb-0">{{ $booking->invitationFirst->visitor->name }}</h6>
                                        <small class="text-muted">{{$booking->reg_no}}</small>
                                    </div>

                                    <div class="align-self-center ml-5">
                                        <div class="dropdown z-index-max">
                                            <a href="#" class="btn btn-sm btn-ico btn-link text-muted w-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fe-more-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item d-flex align-items-center" href="{{route('admin.bookings.destroy',$booking->id)}}" onclick="event.preventDefault(); document.getElementById('delete-form{{$booking->id}}').submit()">
                                                    Delete <span class="ml-auto fe-trash-2"></span>
                                                </a>
                                                <form id="delete-form{{$booking->id}}" action="{{ route('admin.bookings.destroy',$booking->id) }}" method="POST" style="display: none;">
                                                    {{ method_field('delete') }}
                                                    @csrf
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                       </div>
                                <!-- Link -->
                                <a href="{{route('admin.bookings.show',$booking->id)}}" class="stretched-link"></a>
                                 </div>
                            </div>
                        @endforeach
                        @if(!blank($bookings->links()))
                            {{ $bookings->links() }}
                        @endif
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Sidebar -->

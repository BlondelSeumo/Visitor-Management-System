@extends('layouts.master')
@section('main-class')
    main-visible bg-secondary
@endsection
@section('content')
    <div class="chat">
        <!-- Chat: body -->
        <div class="chat-body">
            <!-- Chat: Header -->
            <div class="chat-header border-bottom py-4 py-lg-6 px-lg-8">
                <div class="container-xxl">
                    <div class="row align-items-center">
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
                                        <h6 class="text-truncate mb-n1">{{__('Dashboard')}}</h6>
                                        <small class="text-muted">{{__('Dashboard details.')}}</small>
                                </div>
                            </div>
                        </div>
                    </div><!-- .row -->
                </div>
            </div>
            <!-- Chat: Header -->

            <!-- Chat: Content-->
            <div class="chat-content">
                <div class="container py-6">
                    <div class="accordion modified-accordion mb-n6 mb-lg-8" id="profile-settings">
                        @hasanyrole('admin')
                        <div class="row">
                                        <div class="col-sm-3">
                                            <a  href="{{route('admin.employees.index')}}">
                                            <div class="card bg-success">
                                                <div class="card-body">
                                                    <div class="count h3-p" align="center">
                                                        <h3 >{{$allCounts[0]}}</h3>
                                                        <p>Employees</p>
                                                    </div>
                                                </div>
                                            </div>
                                            </a>
                                        </div>
                                        <div class="col-sm-3">
                                            <a  href="{{route('admin.bookings.index')}}">
                                                <div class="card bg-info">
                                                    <div class="card-body">
                                                        <div class="count h3-p" align="center">
                                                            <h3 >{{$allCounts[1]}}</h3>
                                                            <p>Bookings</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-sm-3">
                                            <a  href="{{route('admin.visitors.index')}}">
                                            <div class="card bg-dark" >
                                                <div class="card-body">
                                                    <div class="count h3-p" align="center">
                                                        <h3>{{$allCounts[2]}}</h3>
                                                        <p>Visitors</p>
                                                    </div>
                                                </div>
                                            </div>
                                            </a>
                                        </div>
                                          <div class="col-sm-3">
                                            <a  href="{{route('admin.pre-registers.index')}}">
                                            <div class="card bg-primary" >
                                                <div class="card-body">
                                                    <div class="count h3-p" align="center">
                                                        <h3>{{$allCounts[3]}}</h3>
                                                        <p>Pre-registers</p>
                                                    </div>
                                                </div>
                                            </div>
                                            </a>
                                        </div>
                                    </div>
                       @endhasanyrole
                        @hasanyrole('employee')
                        <div class="row">
                            <div class="col-sm-4">
                                <a  href="{{route('admin.bookings.index')}}">
                                    <div class="card bg-success">
                                        <div class="card-body">
                                            <div class="count h3-p" align="center">
                                                <h3 >{{$allCounts[0]}}</h3>
                                                <p>Bookings</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-4">
                                <a  href="{{route('admin.visitors.index')}}">
                                    <div class="card bg-dark" >
                                        <div class="card-body">
                                            <div class="count h3-p" align="center">
                                                <h3>{{$allCounts[1]}}</h3>
                                                <p>Visitors</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-4">
                                <a  href="{{route('admin.pre-registers.index')}}">
                                    <div class="card bg-primary" >
                                        <div class="card-body">
                                            <div class="count h3-p" align="center">
                                                <h3>{{$allCounts[2]}}</h3>
                                                <p>Pre-registers</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endhasanyrole

                        <div class="card mt-8">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h3 class="text-truncate mb-n1">{{__('Booking Details')}}</h3>
                                    </div>
                                    <div class="col-md-4" >
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="btn-group" style="float: right; margin: 2px">
                                                    <button class="btn btn-outline-info  dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        New Entry
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{ route('admin.bookings.create') }}">New Bookings</a>
                                                        @hasanyrole('admin')
                                                        <a class="dropdown-item" href="{{route('admin.employees.create') }}">New Employees</a>
                                                        @endhasanyrole
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="search" >
                                                    {!! Form::open(['method' => 'GET', 'url' => 'dashboard', 'class' => 'form-inline my-2 my-lg-0 float-left', 'role' => 'search'])  !!}
                                                    <div class="input-group" >
                                                        <input type="text" class="form-control" name="search" placeholder="Search for bookings..." value="{{ request('search') }}">
                                                        <span class="input-group-append">
                                                <button class="btn btn-secondary" type="submit">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                                </span>
                                                    </div>
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="mt-5" id="hide-table">
                                    <div id="allvisitors">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Photo</th>
                                                    <th>Reg No</th>
                                                    <th>Visitor</th>
                                                    <th>Visitor ID</th>
                                                    <th>Employee</th>
                                                    <th>Invitation</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                                </thead>
                                                @if($bookings)
                                                    <tbody>
                                                    @php $i=0; @endphp
                                                    @foreach($bookings as $booking)
                                                        <tr>
                                                            <td data-title="ID">{{$i +=1}}</td>
                                                            <td data-title="Photo">
                                                                <div class="avatar ">
                                                                    @if($booking->invitationFirst->visitor->getFirstMediaUrl('visitor'))
                                                                        <img class="avatar-img" src="{{ asset($booking->invitationFirst->visitor->getFirstMediaUrl('visitor')) }}" alt="">
                                                                    @else
                                                                        <img class="avatar-img" src="{{ asset('assets/images/avatars/11.jpg') }}" alt="">
                                                                    @endif
                                                                </div>
                                                            </td>
                                                            <td data-title="Reg No">{{ $booking->reg_no}}</td>
                                                            <td data-title="Visitor">{{$booking->invitationFirst->visitor->name}}</td>
                                                            <td data-title="Visitor ID">{{$booking->invitationFirst->visitor->vuid}}</td>
                                                            <td data-title="Employee">{{$booking->host->name}}</td>
                                                            <td data-title="Invitation">{{$booking->invitation_people_count}}</td>
                                                            <td data-title="Date">{{date_time($booking->end_at) }}</td>
                                                            <td data-title="Status">
                                                                @foreach(trans('bookingstatus') as $key=> $status)
                                                                    @if($key == $booking->status)
                                                                        {{$status}}
                                                                    @endif
                                                                @endforeach
                                                            </td>
                                                            <td data-title="Actions">
                                                                <a href="{{ route('admin.bookings.approvedUnapproved',$booking->id) }}" title="Edit">
                                                                    @if('10' == $booking->status)
                                                                        <button class="btn btn-success btn-sm"> {{__('Approved')}}</button>
                                                                    @else
                                                                        <button class="btn btn-danger btn-sm">  {{__('Unapproved')}}</button>
                                                                    @endif
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                @endif
                                            </table>
                                        </div>
                                        @if(!blank($bookings->links()))
                                            {{ $bookings->links() }}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

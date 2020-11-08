@extends('layouts.master')

@section('sidebar')
    @include('admin.booking.partials._sidebar', $bookings)
@endsection

@section('main-class')
    main-visible
@endsection

@section('content')
    <div class="chat">
        <div class="chat-body">
            <!-- Chat: Header -->
            <div class="chat-header border-bottom py-4 py-lg-6 px-lg-2">
                <div class="container-xxl py-2">

                    <div class="row align-items-center p-0">

                        <!-- Close chat(mobile) -->
                        <div class="col-2 d-xl-none">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item">
                                    <a class="text-muted px-0" href="#" data-chat="open">
                                        <i class="icon-md fe-chevron-left"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <!-- Chat photo -->
                        <div class="col-5 col-xl-6">
                            <div class="media text-center text-xl-left">

                                <div class="media-body align-self-center text-truncate">
                                    <h6 class="text-truncate mb-n1">{{ trans_choice('entity.booking', 1) }}</h6>
                                    <small class="text-muted">{{__('Visitor profile & Booking details')}}</small>
                                </div>
                            </div>
                        </div>

                        <!-- Chat toolbar -->

                        <div class="col-1 d-xl-none">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item">
                                    <a class="text-muted px-0" href="#" data-chat="open">
                                        <i class="icon-md fe-chevron-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div><!-- .row -->

                </div>
            </div>
            <!-- Chat: Header -->
            <div class="chat-content">
                <div class="container-xxl py-6 ">
                    <div class="row">
                        <div class="col">
                            <ul class="nav nav-tabs nav-justified mb-6" role="tablist">
                                <li class="nav-item">
                                    <a href="#booking" class="nav-link active" data-toggle="tab" role="tab" aria-selected="true">{{__('Booking Details')}}</a>
                                </li>

                                <li class="nav-item">
                                    <a href="#attendance" class="nav-link" data-toggle="tab" role="tab" aria-selected="false">{{__('Group Details')}}</a>
                                </li>
                            </ul>

                            <div class="tab-content" role="tablist">
                                <!-- visitor details -->
                                <div id="booking" class="tab-pane fade show active" role="tabpanel">
                                    <section class="no-more-tables">
                                        <table class="table table-bordered table-striped table-condensed cf ">
                                            <thead class="cf">
                                            <tr>
                                                <th>ID</th>
                                                <th>Reg No</th>
                                                <th>Date</th>
                                                <th>Employee</th>
                                                <th>Invitation</th>
                                                <th>Accept</th>
                                                <th>Attendee</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if($booking)
                                                    <tr>
                                                        <td data-title="ID">#</td>
                                                        <td data-title="Reg No">{{ $booking->reg_no}}</td>
                                                        <td data-title="Date">{{ date_time($booking->start_at)}}</td>
                                                        <td data-title="Employee">{{$booking->host->name}}</td>
                                                        <td data-title="Invitation">{{$booking->invitation_people_count}}</td>
                                                        <td data-title="Accept">{{$booking->accept_invitation_count}}</td>
                                                        <td data-title="Attendee">{{$booking->attendee_count}}</td>
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
                                                @endif
                                            </tbody>
                                        </table>
                                    </section>
                                </div>
                                <!-- visitor details -->

                                <!-- Attendance details -->
                                <div id="attendance" class="tab-pane fade" role="tabpanel">
                                    <section class="no-more-tables">
                                        <table class="table table-bordered table-striped table-condensed cf ">
                                            <thead class="cf">
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Checkin</th>
                                                <th>Checkout</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if($booking)
                                                @php $i = 0; @endphp
                                                @foreach($booking->invitations as $item)
                                                    <tr>
                                                        <td data-title="ID">{{ $i +=1}}</td>
                                                        <td data-title="Name">{{ $item->name }}</td>
                                                        <td data-title="Email">{{ $item->email }}</td>
                                                        <td data-title="Checkin">{{  date_time($item->checkin_at) }}</td>
                                                        <td data-title="Checkout">{{ date_time($item->checkout_at) }}</td>
                                                    </tr>
                                                @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </section>
                                </div>
                                <!-- Attendance details -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="chat-2-info" class="chat-sidebar chat-sidebar-visible">
            <!-- Chat: Header -->
            <div class="chat-header border-bottom py-4 py-lg-6 px-lg-2">
                <div class="container-xxl py-2">

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
                                    <h6 class="text-truncate mb-n1">{{ trans_choice('entity.booking', 1) }}</h6>
                                    <small class="text-muted">{{__('Visitor profile details')}}</small>
                                </div>
                            </div>
                        </div>

                        <!-- Chat toolbar -->
                        <div class="col-3 col-xl-6 text-right">
                            <ul class="nav justify-content-end">

                                <!-- Mobile nav -->
                                <li class="nav-item list-inline-item d-block d-xl-none">
                                    <a class="nav-link text-muted px-3" href="#" data-chat-sidebar-close>
                                        <i class="icon-md fe-user"></i>
                                    </a>
                                </li>
                                <!-- Mobile nav -->
                            </ul>
                        </div>

                    </div><!-- .row -->

                </div>
            </div>
            <!-- Chat: Header -->
            <div class="d-flex h-100 flex-column">
                <!-- Body -->
                @if($booking)
                <div class="hide-scrollbar flex-fill">
                    <div class="border-bottom text-center py-9 px-10">
                        <!-- Photo -->
                        <div class="avatar avatar-xl mx-5 mb-5">
                            @if($booking->invitationFirst->visitor->getFirstMediaUrl('visitor'))
                                <img class="avatar-img" src="{{ asset($booking->invitationFirst->visitor->getFirstMediaUrl('visitor')) }}" alt="">
                            @else
                                <img class="avatar-img" src="{{ asset('assets/images/avatars/11.jpg') }}" alt="">
                            @endif
                        </div>
                        <h6>{{ $booking->invitationFirst->visitor->name}}</h6>
                        <p class="text-muted text-sm-center">{{ $booking->invitationFirst->visitor->email }}</p>
                    </div>

                    <!-- Details -->
                    <ul class="list-group list-group-flush mb-8">
                        <li class="list-group-item py-6">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <p class="small text-muted mb-0">{{__('Phone')}}</p>
                                    <p>{{$booking->invitationFirst->visitor->phone}}</p>
                                </div>
                                <i class="text-muted icon-sm fe-phone"></i>
                            </div>
                        </li>

                        <li class="list-group-item py-6">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <p class="small text-muted mb-0">{{__('Email')}}</p>
                                    <p>{{$booking->invitationFirst->visitor->email}}</p>
                                </div>
                                <i class="text-muted icon-sm fe-mail"></i>
                            </div>
                        </li>

                        <li class="list-group-item py-6">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <p class="small text-muted mb-0">{{__('Address')}}</p>
                                    <p>{{$booking->invitationFirst->visitor->address}}</p>
                                </div>
                                <i class="text-muted icon-sm fe-clock"></i>
                            </div>
                        </li>
                    </ul>

                </div>
                @endif
                <!-- Body -->
            </div>
        </div>
    </div>
@endsection

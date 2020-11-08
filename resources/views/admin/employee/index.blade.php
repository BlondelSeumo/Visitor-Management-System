@extends('layouts.master')

@section('sidebar')
    @include('admin.employee.partials._sidebar', $employees)
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
                                        <h6 class="text-truncate mb-n1">{{ trans_choice('entity.employee', 1) }}</h6>
                                        <small class="text-muted">Employee profile & visitor details</small>

                                </div>
                            </div>
                        </div>

                        <!-- Chat toolbar -->
                        @if($employee)
                        <div class="col-3 col-xl-6 text-right px-0">
                                <div class=" nav justify-content-end list-inline-item">
                                    <div class="form-group">
                                        <a data-toggle="modal" data-target="#attendance-check" type="button" class="btn btn-primary btn-sm"><span style="color: #ffffff"><i class="fe-plus"></i>{{ __('Add Attendance') }}</span></a>
                                    </div>
                                    <div class="form-group ml-5">
                                        <form class="form-horizontal" role="form"  method="POST" action="{{ route('admin.employees.booking.step-one.next') }}" >
                                            {{ csrf_field() }}
                                            <input  type="hidden" id="employeeID" value="{{$employee->id}}" name="employeeID">
                                            <button type="submit" class="btn btn-primary btn-sm"><span style="color: #ffffff"><i class="fe-plus"></i>{{__('Add a Booking')}}</span></button>
                                        </form>
                                    </div>
                                </div>

                                <!-- Mobile nav -->
                                <div class="nav-item list-inline-item d-block d-xl-none">
                                    <div class="form-group">
                                        <a data-toggle="modal" data-target="#attendance-check" type="button" class="btn btn-primary btn-sm"><span style="color: #ffffff"><i class="fe-plus"></i>{{ __('Add Attendance') }}</span></a>
                                    </div>
                                    <div class="form-group ml-5">
                                        <button type="submit" class="btn btn-primary btn-sm"><span style="color: #ffffff"><i class="fe-plus"></i>{{__('Add a Booking')}}</span></button>
                                    </div>
                                </div>
                        </div>
                        @endif
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
            @if($employee)
            <div class="chat-content">
                <div class="container-xxl py-6 ">
                    <div class="row">
                        <div class="col">
                            <ul class="nav nav-tabs nav-justified mb-6" role="tablist">
                                <li class="nav-item">
                                    <a href="#booking" class="nav-link active" data-toggle="tab" role="tab" aria-selected="true">{{__('Booking Details')}}</a>
                                </li>

                                <li class="nav-item">
                                    <a href="#attendance" class="nav-link" data-toggle="tab" role="tab" aria-selected="false">{{__('Attendance Details')}}</a>
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
                                                <th>Invitation</th>
                                                <th>Accept</th>
                                                <th>Attendee</th>
                                                <th>Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if($employee && count($employee->bookings))
                                                @foreach($employee->bookings as $booking)
                                                    @php $i = 0; @endphp
                                                    <tr>
                                                        <td data-title="ID">{{ $i += 1}}</td>
                                                        <td data-title="Reg No">{{ $booking->reg_no}}</td>
                                                        <td data-title="Date">{{ date_time($booking->start_at)}}</td>
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
                                                    </tr>
                                                @endforeach
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
                                                <th>Date</th>
                                                <th>Checkin</th>
                                                <th>Checkout</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if($employee && count($employee->attendance))
                                                @php $i = 0; @endphp
                                                @foreach($employee->attendance as $item)
                                                    <tr>
                                                        <td data-title="ID">{{ $i +=1}}</td>
                                                        <td data-title="Date">{{ $item->date }}</td>
                                                        <td data-title="Checkin">{{$item->checkin_time}}</td>
                                                        <td data-title="Checkout">{{$item->checkout_time}}</td>
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
                @else
                <div class="main" data-mobile-height="">

                    <!-- Default Page -->
                    <div class="chat flex-column justify-content-center text-center">
                        <div class="container-xxl">
                            <p>Please select a Employee to start Employee details & visitor details.</p>
                        </div>
                    </div>
                    <!-- Default Page -->

                </div>
            @endif
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
                                    <h6 class="text-truncate mb-n1">{{ trans_choice('entity.employee', 1) }}</h6>
                                    <small class="text-muted">Employee profile & visitor details</small>
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
                @if($employee)
                <div class="hide-scrollbar flex-fill">

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
                <!-- Body -->
            </div>
        </div>
    </div>
@endsection
@section('extras')
    <div class="modal fade" id="attendance-check" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            @if($employee)
            <div class="modal-content">
                <div class="modal-header">
                    <div class="media flex-fill">
                        <div class="icon-shape rounded-lg bg-primary text-white mr-5">
                            <i class="fe-users"></i>
                        </div>
                        <div class="media-body align-self-center">
                            <h5 class="modal-title">{{$employee->name}}</h5>
                            <p class="small">{{$employee->user->email}}</p>
                        </div>
                    </div>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @if($attendanceCheck)
                    @if($attendanceCheck->status==1)
                        <form class="form-horizontal" role="form"  method="POST" action="{{ route('admin.employees.check',$employee->id) }}" enctype="multipart/form-data">
                            <div class="modal-body">
                                {{ method_field('PUT') }}
                                @csrf
                                <input type="hidden" name="status" value="2">
                                <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                                    <label for="date" class="control-label">{{ __('Checkin Date') }}  <span class="required">*</span></label>
                                    <div class="input-group" >
                                        <input class="form-control form-control-lg datepickers" data-date-format="dd-mm-yyyy"  name="date" value="{{ old('date') }}">
                                        <span class="input-group-append"></span>
                                    </div>
                                    @if ($errors->has('date'))
                                        <span class="text-danger">
                                        {{ $errors->first('date') }}
                                         </span>
                                    @endif
                                </div>
                                <div class="form-group mb-0 {{ $errors->has('checkout_time') ? 'has-error' : ''}}">
                                    <label for="checkout_time" class="control-label">{{ __('Checkout Time') }}<span class="required">*</span></label>
                                    <div class="input-group bootstrap-timepicker timepicker">
                                        <input type="text" class="form-control form-control-lg" id='timepicker1' name="checkout_time" value="{{ old('checkout_time') }}" />
                                    </div>
                                    @if ($errors->has('checkout_time'))
                                        <span class="text-danger">
                                              {{ $errors->first('checkout_time') }}
                                             </span>
                                    @endif
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-lg  btn-primary d-flex align-items-center">
                                    Check Out
                                </button>
                            </div>
                        </form>
                    @endif
                @else
                    <form class="form-horizontal" role="form"  method="POST" action="{{ route('admin.employees.check',$employee->id) }}" enctype="multipart/form-data">
                        <div class="modal-body">
                            {{ method_field('PUT') }}
                            @csrf
                            <input type="hidden" name="status" value="1">
                            <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                                <label for="date" class="control-label">{{ __('Checkin Date') }}  <span class="required">*</span></label>
                                <div class="input-group" >
                                    <input class="form-control form-control-lg datepickers" data-date-format="dd-mm-yyyy"  name="date" value="{{ old('date') }}">
                                    <span class="input-group-append"></span>
                                </div>
                                @if ($errors->has('date'))
                                    <span class="text-danger">
                                        {{ $errors->first('date') }}
                                         </span>
                                @endif
                            </div>
                            <div class="form-group mb-0 {{ $errors->has('checkin_time') ? 'has-error' : ''}}">
                                <label for="checkin_time" class="control-label">{{ __('Checkin Time') }}<span class="required">*</span></label>
                                <div class="input-group bootstrap-timepicker timepicker">
                                    <input type="text" class="form-control form-control-lg" id='timepicker1' name="checkin_time" value="{{ old('checkin_time') }}" />
                                </div>
                                @if ($errors->has('checkin_time'))
                                    <span class="text-danger">
                                              {{ $errors->first('checkin_time') }}
                                             </span>
                                @endif
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-lg  btn-success d-flex align-items-center">
                                Check in
                            </button>
                        </div>
                    </form>
                @endif
            </div>
             @endif
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('#timepicker1').timepicker({
            'timeFormat': 'H:i:s'
        });

        $('.datepickers').datepicker({
            weekStart: 1,
            autoclose: true,
            todayHighlight: true,
        });
        $('.datepickers').datepicker("setDate", new Date());

        $('.datepickers').change(function () {});

        var start = moment().subtract(6, 'days');
        var end = moment();

        function cb(start, end) {
            $('#reportrangess span').html(start.format(' D MMMM YYYY') + ' - ' + end.format('D MMMM YYYY'));
            $('#datess').val(start.format('D MMMM YYYY')+ '-' +end.format('D MMMM YYYY'));
            $('#visdate').val(start.format('D MMMM YYYY')+ '-' +end.format('D MMMM YYYY'));

        }

        $('#reportrangess').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, cb);

        cb(start, end);

        $('.remove-record').click(function() {
            var id = $(this).attr('data-id');
            var url = $(this).attr('data-url');
            $(".remove-record-model").attr("action",url);
            $('body').find('.remove-record-model').append('<input name="_method" type="hidden" value="DELETE">');
            $('body').find('.remove-record-model').append('<input name="id" type="hidden" value="'+ id +'">');
        });

        $('.remove-data-from-delete-form').click(function() {
            $('body').find('.remove-record-model').find( "input" ).remove();
        });
        $('.modal').click(function() {
            // $('body').find('.remove-record-model').find( "input" ).remove();
        });
    </script>

@endsection

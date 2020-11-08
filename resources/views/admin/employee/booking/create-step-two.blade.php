@extends('layouts.master')

@section('sidebar')
    @include('admin.employee.partials._sidebar', $employees)
@endsection

@section('content')
    <!-- Default Page -->
    <div class="chat">
        <!-- Chat: body -->
        <div class="chat-body">
            <!-- Chat: Header -->
            <div class="chat-header border-bottom py-4 py-lg-6 px-lg-8">
                <div class="container-xxl p-0">
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
                                    <h6 class="text-truncate mb-n1">{{__('Visitor information')}}</h6>
                                    <small class="text-muted">{{__('Update your profile details')}}</small>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="chat-content  py-3 px-lg-8">
                {!! Form::open(['route' => 'admin.employees.booking.step-two.next','method' => 'post', 'class' => 'form-horizontal', 'files' => true]) !!}
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-6 {{ $errors->has('name') ? 'has-error' : ''}}">
                        {!! Html::decode(Form::label('name', 'Name <span class="text-danger">*</span>', ['class' => 'control-label col-form-label-sm'])) !!}
                        {!! Form::text('name', isset($visitor->name) ? $visitor->name : null, ('' == 'required') ? ['class' => 'form-control input form-control-sm','id '=>'name', 'placeholder' => 'Your name'] : ['class' => 'form-control input form-control-sm', 'id '=>'name', 'placeholder' => 'Your name']) !!}
                        {!! $errors->first('name', '<p class="text-danger">:message</p>') !!}
                    </div>
                    <div class="form-group col-md-6 {{ $errors->has('email') ? 'has-error' : ''}}">
                        {!! Html::decode(Form::label('email', 'Email <span class="text-danger">*</span>', ['class' => 'control-label col-form-label-sm'])) !!}
                        {!! Form::email('email', isset($visitor->email) ? $visitor->email : null, ('required' == 'required') ? ['class' => 'form-control input form-control-sm', 'id '=>'email',  'placeholder' => 'Your email'] : ['class' => 'form-control input form-control-sm','id '=>'email',  'placeholder' => 'Your email']) !!}
                        {!! $errors->first('email', '<p class="text-danger">:message</p>') !!}
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6 {{ $errors->has('company_name') ? 'has-error' : ''}}">
                        {!! Form::label('company_name', 'Company Name', ['class' => 'control-label col-form-label-sm']) !!}
                        {!! Form::text('company_name', isset($visitor->company_name) ? $visitor->company_name : null, ('' == 'required') ? ['class' => 'form-control input form-control-sm', 'id '=>'company_name'] : ['class' => 'form-control input form-control-sm','id '=>'company_name', 'placeholder' => 'Your company name']) !!}
                        {!! $errors->first('company_name', '<p class="text-danger">:message</p>') !!}
                    </div>
                    <div class="form-group col-md-6 {{ $errors->has('company_employee_id') ? 'has-error' : ''}}">
                        {!! Form::label('company_employee_id', 'Company Employee Id', ['class' => 'control-label col-form-label-sm']) !!}
                        {!! Form::text('company_employee_id', isset($visitor->company_employee_id) ? $visitor->company_employee_id : null, ('' == 'required') ? ['class' => 'form-control input form-control-sm','id '=>'company_employee_id', 'placeholder' => 'Your employee id'] : ['class' => 'form-control input form-control-sm','id '=>'company_employee_id', 'placeholder' => 'Your employee id']) !!}
                        {!! $errors->first('company_employee_id', '<p class="text-danger">:message</p>') !!}
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6 {{ $errors->has('phone') ? 'has-error' : ''}}">
                        {!! Html::decode(Form::label('phone', 'Phone <span class="text-danger">*</span>', ['class' => 'control-label col-form-label-sm'])) !!}
                        {!! Form::text('phone', isset($visitor->phone) ? $visitor->phone : null, ('' == 'required') ? ['class' => 'form-control input form-control-sm', 'id '=>'phone', 'placeholder' => 'Your phone no'] : ['class' => 'form-control input form-control-sm','id '=>'phone', 'placeholder' => 'Your phone no']) !!}
                        {!! $errors->first('phone', '<p class="text-danger">:message</p>') !!}
                    </div>
                    <div class="form-group col-md-6 {{ $errors->has('national_identification_no') ? 'has-error' : ''}}">
                        {!! Form::label('national_identification_no', 'NID', ['class' => 'control-label col-form-label-sm']) !!}
                        {!! Form::text('national_identification_no', isset($visitor->national_identification_no) ? $visitor->national_identification_no : null, ('' == 'required') ? ['class' => 'form-control input form-control-sm','id '=>'national_identification_no', 'placeholder' => 'Your NID '] : ['class' => 'form-control input form-control-sm','id '=>'national_identification_no', 'placeholder' => 'Your nid no']) !!}
                        {!! $errors->first('national_identification_no', '<p class="text-danger">:message</p>') !!}
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6 {{ $errors->has('address') ? 'has-error' : ''}}">
                        {!! Form::label('address', 'Address', ['class' => 'control-label col-form-label-sm']) !!}
                        {!! Form::text('address', isset($visitor->address) ? $visitor->address : null, ('' == 'required') ? ['class' => 'form-control input form-control-sm','id '=>'address', 'placeholder' => 'Your address'] : ['class' => 'form-control input form-control-sm','id '=>'address', 'placeholder' => 'Your address']) !!}
                        {!! $errors->first('address', '<p class="text-danger">:message</p>') !!}
                    </div>
                    <div class="form-group col-md-6">
                        <label for="gender" class="control-label col-form-label-sm">{{ __('Group enable') }}
                        </label>
                        <select class="form-control input form-control-sm" name="is_group_enabled"  onchange="showGroup(this);">
                                <option value="10">{{__('No')}}</option>
                                <option value="5">{{__('Yes')}}</option>
                        </select>
                    </div>
                </div>
                <div class="card" id="GroupShow">
                    <div class="card-header"><h5>{{__('Booking Group Details')}}</h5></div>
                    <div class="card-body">
                        <input  type="hidden" id="counter" value="0" name="counter">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group" id="people-name-div">
                                    <label class="control-label col-form-label-sm" for="people_name">{{__('Name')}}<span class="text-danger"> *</span></label>
                                    <input id="people_name" type="text" class="form-control input form-control-sm" value="">
                                </div>
                                <div class="form-group" id="people-email-div">
                                    <label class="control-label col-form-label-sm" for="people_email">{{__('Email')}}<span class="text-danger"> *</span></label>
                                    <input id="people_email" type="email" class="form-control input form-control-sm" value="">
                                </div>
                                <div class="form-group">
                                    <button type="button" id="addPeople" class="btn btn-primary">
                                        {{ __('Add') }}
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="GroupList">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="chat-footer border-top py-4 py-lg-6 px-lg-8">
                    <div class="form-row align-items-center">
                        <div class="col">
                            <a href="{{ route('admin.employees.index') }}" class="btn btn-lg btn-sm btn-danger float-left text-white">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i> Cancel
                            </a>
                        </div>

                        <!-- Submit button -->
                        <div class="col-auto">
                            <button class="btn btn-lg btn-sm btn-success float-left text-white " id="step-one-submit" type="submit">
                                Next <i class="fe-arrow-right ml-auto"></i>
                            </button>
                        </div>

                    </div>
                </div>
                {!! Form::close() !!}

            </div>

        </div>
        <div id="chat-2-info" class="chat-sidebar chat-sidebar-visible">
            <div class="d-flex h-100 flex-column" id="employeeProfile">
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
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/booking/index.js') }}"></script>
@endsection

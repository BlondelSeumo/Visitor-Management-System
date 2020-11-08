@extends('layouts.site')
@section('sidebar')
    <div class="sidebar">
        <div class="d-flex flex-column h-100">
            <div class="hide-scrollbar">
                <div class="container-fluid py-6">
                    <div class="border-bottom text-center py-9 px-10">
                        <!-- Photo -->
                        <h4 class="font-bold mb-6 text-lg-center">
                            <a href="#" class="d-none d-xl-block mb-6">
                                @if(setting('site_logo'))
                                <img src="{{ asset('images/'.setting('site_logo')) }}" class="mx-auto fill-primary" data-inject-svg="" alt="" style="height: 46px;">
                                @else
                                 <img src="{{ asset('assets/images/brand.png') }}" class="mx-auto fill-primary" data-inject-svg="" alt="" style="height: 46px;">
                                @endif
                            </a>
                            {{setting('site_name')}}
                        </h4>
                        <p class="text-muted">{{setting('site_address')}}</p>
                    </div>
                    <div class="border-bottom text-center py-9 px-10">
                        <!-- Photo -->
                        <h6>{{setting('site_name')}}</h6>
                        <p class="text-muted text-sm-center">
                            {{__('Call')}} {{setting('site_phone')}} {{__('for help')}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('main-class')
    main-visible
@endsection

@section('content')
    <div class="chat">
        <div class="chat-body">
            <div class="chat-header border-bottom py-4 py-lg-6 px-lg-8">
                <div class="container-xxl p-0">
                    <div class="row align-items-center">
                        <div class="col-3 d-xl-none">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item">
                                    <a class="text-muted px-0" href="#" data-chat="open">
                                        <i class="icon-md fe-chevron-left"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
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
                {!! Form::open(['route' => 'invitations.register', 'class' => 'form-horizontal', 'files' => true, 'id' => "register"]) !!}
                    <div class="form-row">
                        <input type="hidden" name="activation_token" value="{{$invitation->activation_token}}">
                        <div class="form-group col-md-6 {{ $errors->has('name') ? 'has-error' : ''}}">
                            {!! Html::decode(Form::label('name', 'Name <span class="text-danger">*</span>', ['class' => 'control-label col-form-label-sm'])) !!}
                            {!! Form::text('name', null, ('' == 'required') ? ['class' => 'form-control input form-control-sm','id '=>'name', 'placeholder' => 'Your name'] : ['class' => 'form-control input form-control-sm', 'id '=>'name', 'placeholder' => 'Your name']) !!}
                            {!! $errors->first('name', '<p class="text-danger">:message</p>') !!}
                        </div>
                        <div class="form-group col-md-6 {{ $errors->has('email') ? 'has-error' : ''}}">
                            {!! Html::decode(Form::label('email', 'Email <span class="text-danger">*</span>', ['class' => 'control-label col-form-label-sm'])) !!}
                            {!! Form::email('email', null, ('required' == 'required') ? ['class' => 'form-control input form-control-sm', 'id '=>'email',  'placeholder' => 'Your email'] : ['class' => 'form-control input form-control-sm','id '=>'email',  'placeholder' => 'Your email']) !!}
                            {!! $errors->first('email', '<p class="text-danger">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 {{ $errors->has('company_name') ? 'has-error' : ''}}">
                            {!! Form::label('company_name', 'Company Name', ['class' => 'control-label col-form-label-sm']) !!}
                            {!! Form::text('company_name',  null,('' == 'required') ? ['class' => 'form-control input form-control-sm', 'id '=>'company_name'] : ['class' => 'form-control input form-control-sm','id '=>'company_name', 'placeholder' => 'Your company name']) !!}
                            {!! $errors->first('company_name', '<p class="text-danger">:message</p>') !!}
                        </div>
                        <div class="form-group col-md-6 {{ $errors->has('company_employee_id') ? 'has-error' : ''}}">
                            {!! Form::label('company_employee_id', 'Company Employee Id', ['class' => 'control-label col-form-label-sm']) !!}
                            {!! Form::text('company_employee_id', null, ('' == 'required') ? ['class' => 'form-control input form-control-sm','id '=>'company_employee_id', 'placeholder' => 'Your employee id'] : ['class' => 'form-control input form-control-sm','id '=>'company_employee_id', 'placeholder' => 'Your employee id']) !!}
                            {!! $errors->first('company_employee_id', '<p class="text-danger">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 {{ $errors->has('phone') ? 'has-error' : ''}}">
                            {!! Form::label('phone', 'Phone', ['class' => 'control-label col-form-label-sm']) !!}
                            {!! Form::text('phone', null,('' == 'required') ? ['class' => 'form-control input form-control-sm', 'id '=>'phone', 'placeholder' => 'Your phone no'] : ['class' => 'form-control input form-control-sm','id '=>'phone', 'placeholder' => 'Your phone no']) !!}
                            {!! $errors->first('phone', '<p class="text-danger">:message</p>') !!}
                        </div>
                        <div class="form-group col-md-6 {{ $errors->has('national_identification_no') ? 'has-error' : ''}}">
                            {!! Form::label('national_identification_no', 'National Identification No', ['class' => 'control-label col-form-label-sm']) !!}
                            {!! Form::text('national_identification_no',null, ('' == 'required') ? ['class' => 'form-control input form-control-sm','id '=>'national_identification_no', 'placeholder' => 'Your  nid no'] : ['class' => 'form-control input form-control-sm','id '=>'national_identification_no', 'placeholder' => 'Your nid no']) !!}
                            {!! $errors->first('national_identification_no', '<p class="text-danger">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 {{ $errors->has('address') ? 'has-error' : ''}}">
                                {!! Form::label('address', 'Address', ['class' => 'control-label col-form-label-sm']) !!}
                                {!! Form::text('address', null,('' == 'required') ? ['class' => 'form-control input form-control-sm','id '=>'address', 'placeholder' => 'Your address'] : ['class' => 'form-control input form-control-sm','id '=>'address', 'placeholder' => 'Your address']) !!}
                                {!! $errors->first('address', '<p class="text-danger">:message</p>') !!}
                            </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register Visitor') }}
                        </button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
        <!-- Chat: body -->
        <div id="chat-2-info" class="chat-sidebar chat-sidebar-visible">
            <div class="d-flex h-100 flex-column" id="employeeProfile">
                <div class="hide-scrollbar flex-fill" >
                    <div class="border-bottom text-center py-9 px-10">
                        <div class="avatar avatar-xl mx-5 mb-5">
                            <img class="avatar-img" src="{{ asset('assets/images/avatars/11.jpg') }}" alt="">
                        </div>
                        <h6>{{$visitor->name}}</h6>
                    </div>
                    <ul class="list-group list-group-flush mb-8">
                        <li class="list-group-item py-6">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <p class="small text-muted mb-0">{{__('Invitation Name')}}</p>
                                    <p>{{$visitor->name}}</p>
                                </div>
                                <i class="text-muted icon-sm fe-disc"></i>
                            </div>
                        </li>
                        <li class="list-group-item py-6">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <p class="small text-muted mb-0">{{__('Invitation Email')}}</p>
                                    <p>{{$visitor->email}}</p>
                                </div>
                                <i class="text-muted icon-sm fe-disc"></i>
                            </div>
                        </li>

                        <li class="list-group-item py-6">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <p class="small text-muted mb-0">{{__('Invitation Phone')}}</p>
                                    <p>{{$visitor->phone}}</p>
                                </div>
                                <i class="text-muted icon-sm fe-phone"></i>
                            </div>
                        </li>

                        <li class="list-group-item py-6">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <p class="small text-muted mb-0">{{__('Invitation address')}}</p>
                                    <p>{{$visitor->address}}</p>
                                </div>
                                <i class="text-muted icon-sm fe-mail"></i>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection


@extends('layouts.master')

@section('sidebar')
    @include('admin.pre-register.partials._sidebar', $pre_registers)
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
                                    <h6 class="text-truncate mb-n1">{{ __('Pre-Register information') }}</h6>
                                    <small class="text-muted">{{__('Update your profile details')}}</small>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            @if($pre_register)
            <div class="chat-content  py-3 px-lg-8">
                @if($pre_register)
                <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.pre-registers.update',$pre_register->id) }}" enctype="multipart/form-data">
                    <input name="_method" type="hidden" value="PUT">
                    {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-6 {{ $errors->has('name') ? 'has-error' : ''}}">
                        {!! Html::decode(Form::label('name', 'Name <span class="text-danger">*</span>', ['class' => 'control-label col-form-label-sm'])) !!}
                        {!! Form::text('name', isset($pre_register->name) ? $pre_register->name : null, ('' == 'required') ? ['class' => 'form-control input form-control-sm','id '=>'name', 'placeholder' => 'Your name'] : ['class' => 'form-control input form-control-sm', 'id '=>'name', 'placeholder' => 'Your name']) !!}
                        {!! $errors->first('name', '<p class="text-danger">:message</p>') !!}
                    </div>
                    <div class="form-group col-md-6 {{ $errors->has('email') ? 'has-error' : ''}}">
                        {!! Html::decode(Form::label('email', 'Email <span class="text-danger">*</span>', ['class' => 'control-label col-form-label-sm'])) !!}
                        {!! Form::email('email', isset($pre_register->email) ? $pre_register->email : null, ('required' == 'required') ? ['class' => 'form-control input form-control-sm', 'id '=>'email',  'placeholder' => 'Your email'] : ['class' => 'form-control input form-control-sm','id '=>'email',  'placeholder' => 'Your email']) !!}
                        {!! $errors->first('email', '<p class="text-danger">:message</p>') !!}
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6 {{ $errors->has('company_name') ? 'has-error' : ''}}">
                        {!! Form::label('company_name', 'Company Name', ['class' => 'control-label col-form-label-sm']) !!}
                        {!! Form::text('company_name', isset($pre_register->company_name) ? $pre_register->company_name : null, ('' == 'required') ? ['class' => 'form-control input form-control-sm', 'id '=>'company_name'] : ['class' => 'form-control input form-control-sm','id '=>'company_name', 'placeholder' => 'Your company name']) !!}
                        {!! $errors->first('company_name', '<p class="text-danger">:message</p>') !!}
                    </div>
                    <div class="form-group col-md-6 {{ $errors->has('company_employee_id') ? 'has-error' : ''}}">
                        {!! Form::label('company_employee_id', 'Company Employee Id', ['class' => 'control-label col-form-label-sm']) !!}
                        {!! Form::text('company_employee_id', isset($pre_register->company_employee_id) ? $pre_register->company_employee_id : null, ('' == 'required') ? ['class' => 'form-control input form-control-sm','id '=>'company_employee_id', 'placeholder' => 'Your employee id'] : ['class' => 'form-control input form-control-sm','id '=>'company_employee_id', 'placeholder' => 'Your employee id']) !!}
                        {!! $errors->first('company_employee_id', '<p class="text-danger">:message</p>') !!}
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6 {{ $errors->has('phone') ? 'has-error' : ''}}">
                        {!! Form::label('phone', 'Phone', ['class' => 'control-label col-form-label-sm']) !!}
                        {!! Form::text('phone', isset($pre_register->phone) ? $pre_register->phone : null, ('' == 'required') ? ['class' => 'form-control input form-control-sm', 'id '=>'phone', 'placeholder' => 'Your phone no'] : ['class' => 'form-control input form-control-sm','id '=>'phone', 'placeholder' => 'Your phone no']) !!}
                        {!! $errors->first('phone', '<p class="text-danger">:message</p>') !!}
                    </div>
                    <div class="form-group col-md-6 {{ $errors->has('national_identification_no') ? 'has-error' : ''}}">
                        {!! Form::label('national_identification_no', 'NID', ['class' => 'control-label col-form-label-sm']) !!}
                        {!! Form::text('national_identification_no', isset($pre_register->national_identification_no) ? $pre_register->national_identification_no : null, ('' == 'required') ? ['class' => 'form-control input form-control-sm','id '=>'national_identification_no', 'placeholder' => 'Your NID'] : ['class' => 'form-control input form-control-sm','id '=>'national_identification_no', 'placeholder' => 'Your nid no']) !!}
                        {!! $errors->first('national_identification_no', '<p class="text-danger">:message</p>') !!}
                    </div>
                </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="customFile">{{ __('picture') }}</label>
                            <div class="custom-file">
                                <input name="picture" type="file" class="custom-file-input @error('picture') is-invalid @enderror" id="customFile" onchange="readURL(this);">
                                <label  class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                            @if ($errors->has('picture'))
                                <div class="help-block text-danger">
                                    {{ $errors->first('picture') }}
                                </div>
                            @endif
                            @if($pre_register->getFirstMediaUrl('visitor'))
                                <img class="img-thumbnail image-width-site-logo mt-3 mb-3" id="previewImage"  src="{{ asset($pre_register->getFirstMediaUrl('visitor')) }}" alt="">
                            @else
                                <img class="img-thumbnail image-width-site-logo mt-4 mb-3" id="previewImage"  src="{{ asset('assets/images/avatars/11.jpg') }}" alt="">
                            @endif
                        </div>
                        <div class="form-group col-md-6 {{ $errors->has('address') ? 'has-error' : ''}}">
                            {!! Form::label('address', 'Address', ['class' => 'control-label col-form-label-sm']) !!}
                            {!! Form::text('address', isset($pre_register->address) ? $pre_register->address : null, ('' == 'required') ? ['class' => 'form-control input form-control-sm','id '=>'address', 'placeholder' => 'Your address'] : ['class' => 'form-control input form-control-sm','id '=>'address', 'placeholder' => 'Your address']) !!}
                            {!! $errors->first('address', '<p class="text-danger">:message</p>') !!}
                        </div>

                    </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Update') }}
                    </button>
                </div>
                </form>
                @endif
            </div>
            @else
                <div class="main" data-mobile-height="">
                    <div class="chat flex-column justify-content-center text-center">
                        <div class="container-xxl">
                            <p>Please select a Pre-register to start Pre-register details & profile.</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <!-- Chat: body -->
        <div id="chat-2-info" class="chat-sidebar chat-sidebar-visible">
            <div class="d-flex h-100 flex-column">
                @if($pre_register)
                <div class="hide-scrollbar flex-fill">

                    <div class="border-bottom text-center py-9 px-10">
                        <!-- Photo -->
                        <div class="avatar avatar-xl mx-5 mb-5">
                            @if($pre_register->getFirstMediaUrl('visitor'))
                                <img class="avatar-img" src="{{ asset($pre_register->getFirstMediaUrl('visitor')) }}" alt="">
                            @else
                                <img class="avatar-img" src="{{asset('assets/images/avatars/11.jpg')}}" alt="">
                            @endif
                        </div>
                        <h5>{{ $pre_register->name}}</h5>
                        <p class="text-muted">{{$pre_register->vuid}}</p>
                    </div>


                    <!-- Details -->
                    <ul class="list-group list-group-flush mb-8">
                        <li class="list-group-item py-6">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <p class="small text-muted mb-0">{{__('Name')}}</p>
                                    <p>{{$pre_register->name}}</p>
                                </div>
                                <i class="text-muted icon-sm fe-user"></i>
                            </div>
                        </li>

                        <li class="list-group-item py-6">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <p class="small text-muted mb-0">{{__('Phone')}}</p>
                                    <p>{{$pre_register->phone}}</p>
                                </div>
                                <i class="text-muted icon-sm fe-phone"></i>
                            </div>
                        </li>

                        <li class="list-group-item py-6">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <p class="small text-muted mb-0">{{__('Email')}}</p>
                                    <p>{{$pre_register->email}}</p>
                                </div>
                                <i class="text-muted icon-sm fe-mail"></i>
                            </div>
                        </li>
                        @if($pre_register->company_name)
                        <li class="list-group-item py-6">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <p class="small text-muted mb-0">{{__('Company Name')}}</p>
                                    <p>{{$pre_register->company_name}}</p>
                                </div>
                                <i class="text-muted icon-sm fe-monitor"></i>
                            </div>
                        </li>
                        @endif
                        @if($pre_register->company_employee_id)
                        <li class="list-group-item py-6">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <p class="small text-muted mb-0">{{__('Company Employee ID')}}</p>
                                    <p>{{$pre_register->company_employee_id}}</p>
                                </div>
                                <i class="text-muted icon-sm fe-user"></i>
                            </div>
                        </li>
                        @endif
                        @if($pre_register->national_identification_no)
                        <li class="list-group-item py-6">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <p class="small text-muted mb-0">{{__('NID')}}</p>
                                    <p>{{$pre_register->national_identification_no}}</p>
                                </div>
                                <i class="text-muted icon-sm fe-activity"></i>
                            </div>
                        </li>
                        @endif
                        @if($pre_register->address)
                        <li class="list-group-item py-6">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <p class="small text-muted mb-0">{{__('Address')}}</p>
                                    <p>{{$pre_register->address}}</p>
                                </div>
                                <i class="text-muted icon-sm fe-globe"></i>
                            </div>
                        </li>
                        @endif
                    </ul>
                </div>
                 @endif
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/setting/index.js') }}"></script>
@endsection

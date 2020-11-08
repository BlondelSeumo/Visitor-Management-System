@extends('layouts.master')
@section('main-class')
    main-visible
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
                                    <h6 class="text-truncate mb-n1">{{__('Profile')}}</h6>
                                    <small class="text-muted">{{__('Profile details.')}}</small>
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
                    <div class="accordion modified-accordion mb-n6 mb-lg-10" id="profile-settings">
                        <div class="row">
                            @if(isset($user))
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="h-100">
                                                <div class="d-flex flex-column h-100">
                                                    <div class="hide-scrollbar">
                                                        <form action="{{ route('admin.profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                                <div class="form-group{{ $errors->has('name') ? 'has-error' : ''}}">
                                                                    {!! Html::decode(Form::label('name', 'Name <span class="text-danger">*</span>', ['class' => 'control-label col-form-label-sm'])) !!}
                                                                    {!! Form::text('name', isset($user->name) ? $user->name : null, ('' == 'required') ? ['class' => 'form-control input form-control-sm','id '=>'name', 'placeholder' => 'Your name'] : ['class' => 'form-control input form-control-sm', 'id '=>'name', 'placeholder' => 'Your name']) !!}
                                                                    {!! $errors->first('name', '<p class="text-danger">:message</p>') !!}
                                                                </div>
                                                                <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                                                                    {!! Html::decode(Form::label('email', 'Email <span class="text-danger">*</span>', ['class' => 'control-label col-form-label-sm'])) !!}
                                                                    {!! Form::email('email', isset($user->email) ? $user->email : null, ('required' == 'required') ? ['class' => 'form-control input form-control-sm', 'id '=>'email',  'placeholder' => 'Your email'] : ['class' => 'form-control input form-control-sm','id '=>'email',  'placeholder' => 'Your email']) !!}
                                                                    {!! $errors->first('email', '<p class="text-danger">:message</p>') !!}
                                                                </div>

                                                            <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                                                                <label for="phone" class="control-label col-form-label-sm small">{{ __('Phone') }}
                                                                    <span class="required">*</span>
                                                                </label>
                                                                <input id="phone" type="text" class="form-control input form-control-sm" name="phone" value="{{ old('phone', $user->phone) }}">
                                                                @if ($errors->has('phone'))
                                                                    <span class="text-danger">
                                                            {{ $errors->first('phone') }}
                                                         </span>
                                                                @endif
                                                            </div>
                                                            <div class="form-group">
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
                                                                @if($user->getFirstMediaUrl('users'))
                                                                    <img class="img-thumbnail image-width-site-logo mt-3 mb-3" id="previewImage"  src="{{ asset($user->getFirstMediaUrl('users')) }}" alt="">
                                                                @else
                                                                    <img class="img-thumbnail image-width-site-logo mt-4 mb-3" id="previewImage"  src="{{ asset('assets/images/avatars/11.jpg') }}" alt="">
                                                                @endif
                                                            </div>
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-primary">
                                                                    {{ __('Update') }}
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card">
                                                <form method="post" action="{{ route('admin.profile.change') }}">
                                                    @csrf
                                                    @method('put')
                                                    <div class="card-header">
                                                        <h4>{{ __('Change Password') }}</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="form-group col-md-12 col-12">
                                                                <label for="old_password">{{ __('Old Password') }}</label> <span class="text-danger">*</span>
                                                                <input id="old_password" name="old_password"  type="password" class="form-control @error('old_password') is-invalid @enderror">
                                                                @error('old_password')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group col-md-12 col-12">
                                                                <label for="password">{{ __('Password') }}</label> <span class="text-danger">*</span>
                                                                <input id="password" name="password"  type="password" class="form-control @error('password') is-invalid @enderror"/>
                                                                @error('password')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group col-md-12 col-12">
                                                                <label for="password_confirmation">{{ __('Password Confirmation') }}</label> <span class="text-danger">*</span>
                                                                <input id="password_confirmation" name="password_confirmation"  type="password" class="form-control @error('password_confirmation') is-invalid @enderror"/>
                                                                @error('password_confirmation')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <button class="btn btn-primary">{{ __('Save Password') }}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="h-100 bg-secondary">
                                        <div class="d-flex flex-column h-100">
                                            <div class="container-fluid py-6">
                                                <!-- Card -->
                                                <div class="card mb-6">
                                                    <div class="card-body ">
                                                        <div class="text-center py-6">
                                                            <!-- Photo -->
                                                            <div class="avatar avatar-xl mb-5">
                                                                @if($user->getFirstMediaUrl('users'))
                                                                    <img class="avatar-img" src="{{ asset($user->getFirstMediaUrl('users')) }}" alt="">
                                                                @else
                                                                    <img class="avatar-img" src="{{asset('assets/images/avatars/11.jpg')}}" alt="">
                                                                @endif
                                                            </div>
                                                            <h5>{{ $user->name}}</h5>
                                                            @if(!empty($user->getRoleNames()))
                                                                @foreach($user->getRoleNames() as $v)
                                                                    <span class="text-tertiary">{{ ucfirst($v) }}</span>
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Card -->
                                                <!-- Card -->
                                                <div class="card mb-6">
                                                    <div class="card-body">
                                                        <ul class="list-group list-group-flush">
                                                            <li class="list-group-item px-0 py-6">
                                                                <div class="media align-items-center">
                                                                    <div class="media-body">
                                                                        <p class="small text-muted mb-0">{{__('Phone')}}</p>
                                                                        <p>{{$user->phone}}</p>
                                                                    </div>
                                                                    <i class="text-muted icon-sm fe-phone"></i>
                                                                </div>
                                                            </li>

                                                            <li class="list-group-item px-0 py-6">
                                                                <div class="media align-items-center">
                                                                    <div class="media-body">
                                                                        <p class="small text-muted mb-0">{{__('Email')}}</p>
                                                                        <p>{{$user->email}}</p>
                                                                    </div>
                                                                    <i class="text-muted icon-sm fe-mail"></i>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!-- Card -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/setting/index.js') }}"></script>
@endsection

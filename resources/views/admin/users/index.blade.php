@extends('layouts.master')

@section('sidebar')
    @include('admin.users.partials._sidebar', $users)
@endsection
@section('main-class')
    main-visible
@endsection
@section('content')
    <div class="chat">
        <!-- Chat: body -->
        <div class="chat-body">
            <!-- Chat: Header -->
            <div class="chat-header border-bottom py-4 py-lg-6 px-lg-2">
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
                                    <h6 class="text-truncate mb-n1">{{ trans_choice('entity.user', 1) }}</h6>
                                    <small class="text-muted">{{ trans_choice('users.index_header', 1) }}</small>
                                </div>
                            </div>
                        </div>
                    </div><!-- .row -->
                </div>
            </div>
            <div class="chat-content px-lg-8">
                <div class="container-xxl py-6 ">
                    <!-- Accordion -->
                    <div class="accordion modified-accordion mb-n6 mb-lg-8" id="profile-settings">
                        <div class="row">
                            @if(isset($user))
                                <div class="col-md-7">
                                    <div class="h-100">
                                        <div class="d-flex flex-column h-100">
                                            <div class="hide-scrollbar">
                                                <form class="form-horizontal" role="form" method="POST" action="{{ route('users.update',$user->id) }}" enctype="multipart/form-data">
                                                    <input name="_method" type="hidden" value="PATCH">
                                                    {{ csrf_field() }}
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6 {{ $errors->has('name') ? 'has-error' : ''}}">
                                                            {!! Html::decode(Form::label('name', 'Name <span class="text-danger">*</span>', ['class' => 'control-label col-form-label-sm'])) !!}
                                                            {!! Form::text('name', isset($user->name) ? $user->name : null, ('' == 'required') ? ['class' => 'form-control input form-control-sm','id '=>'name', 'placeholder' => 'Your name'] : ['class' => 'form-control input form-control-sm', 'id '=>'name', 'placeholder' => 'Your name']) !!}
                                                            {!! $errors->first('name', '<p class="text-danger">:message</p>') !!}
                                                        </div>
                                                        <div class="form-group col-md-6 {{ $errors->has('email') ? 'has-error' : ''}}">
                                                            {!! Html::decode(Form::label('email', 'Email <span class="text-danger">*</span>', ['class' => 'control-label col-form-label-sm'])) !!}
                                                            {!! Form::email('email', isset($user->email) ? $user->email : null, ('required' == 'required') ? ['class' => 'form-control input form-control-sm', 'id '=>'email',  'placeholder' => 'Your email'] : ['class' => 'form-control input form-control-sm','id '=>'email',  'placeholder' => 'Your email']) !!}
                                                            {!! $errors->first('email', '<p class="text-danger">:message</p>') !!}
                                                        </div>
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
                                                        <label for="roles" class="control-label col-form-label-sm small">{{ __('Role') }}
                                                            <span class="required">*</span>
                                                        </label>
                                                        <select id="roles" name="roles[]" class="form-control select2 input {{ $errors->has('roles') ? " is-invalid " : '' }}" multiple="multiple">
                                                            @if(!blank($roles))
                                                                @foreach($roles as $role)
                                                                    @if(in_array($role, $userRole))
                                                                        <option value="{{ $role }}" selected>{{ $role }}</option>
                                                                    @else
                                                                        <option value="{{ $role }}">{{ $role }}</option>
                                                                    @endif
                                                                    @endforeach
                                                            @endif
                                                        </select>
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
                                <div class="col-md-5">
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

    <script src="{{ asset('assets/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('js/setting/index.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#roles').select2();
        });
    </script>
@endsection

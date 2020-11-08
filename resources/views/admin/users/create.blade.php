@extends('layouts.master')
@section('sidebar')
    @include('admin.users.partials._sidebar', $users)
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
                        <div class="col-6 col-xl-6">
                            <div class="media text-center text-xl-left">
                                <div class="media-body align-self-center text-truncate">
                                    <h6 class="text-truncate mb-n1">{{ trans_choice('entity.user', 1) }}</h6>
                                    <small class="text-muted">{{ trans_choice('users.header', 1) }}</small>
                                </div>
                            </div>
                        </div>
                    </div><!-- .row -->
                </div>
            </div>
            <div class="chat-content">
                <div class="card-body">
                    <form class="form-horizontal" role="form"  method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label for="name" class="control-label col-form-label-sm">{{ __('Name') }}
                                        <span class="required">*</span>
                                    </label>
                                    <input id="name" type="text" class="form-control input form-control-sm" name="name" value="{{ old('name') }}" />
                                    @if ($errors->has('name'))
                                        <span class="text-danger">
                                                        {{ $errors->first('name') }}
                                                    </span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                                    <label for="phone" class="control-label col-form-label-sm">{{ __('Phone') }}
                                        <span class="required">*</span>
                                    </label>
                                    <input id="phone" type="text" class="form-control input form-control-sm" name="phone" value="{{ old('phone') }}">
                                    @if ($errors->has('phone'))
                                        <span class="text-danger">
                                                        {{ $errors->first('phone') }}
                                                    </span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                                    <label for="password-confirm" class="control-label col-form-label-sm">{{ __('Confirm Password') }}
                                        <span class="required">*</span>
                                    </label>
                                    <input id="password-confirm" type="password" class="form-control input form-control-sm" name="password_confirmation"  autocomplete="new-password">
                                    @if ($errors->has('password_confirmation'))
                                        <span class="text-danger">
                                                {{ $errors->first('password_confirmation') }}
                                                 </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="roles" class="control-label col-form-label-sm">{{ __('Role') }}
                                        <span class="required">*</span>
                                    </label>
                                    <select id="roles" name="roles[]" class="form-control select2 input {{ $errors->has('roles') ? " is-invalid " : '' }}" multiple="multiple">
                                        @if(!blank($roles))
                                            @foreach($roles as $role)
                                                <option value="{{ $role }}">{{ $role }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @if ($errors->has('roles'))
                                        <div class="help-block text-danger">
                                            {{ $errors->first('roles') }}
                                        </div>
                                    @endif
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <label for="email" class="control-label col-form-label-sm">{{ __('E-Mail Address') }}
                                        <span class="required">*</span>
                                    </label>
                                    <input id="email" type="email" class="form-control input form-control-sm" name="email" value="{{ old('email') }}" />
                                    @if ($errors->has('email'))
                                        <span class="text-danger">
                                                        {{ $errors->first('email') }}
                                                    </span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                    <label for="password" class="control-label col-form-label-sm">{{ __('Password') }}  <span class="required">*</span></label>
                                    <input id="password" type="password" class="form-control input form-control-sm" name="password" autocomplete="new-password">
                                    @if ($errors->has('password'))
                                        <span class="text-danger">
                                                {{ $errors->first('password') }}
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
                                    <img class="img-thumbnail image-width-site-logo mt-4 mb-3" id="previewImage"  src="{{ asset('assets/images/avatars/11.jpg') }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Create') }}
                            </button>
                        </div>
                    </form>
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

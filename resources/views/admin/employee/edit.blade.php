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
                                    <h6 class="text-truncate mb-n1">{{ trans_choice('entity.employee', 1) }}</h6>
                                    <small class="text-muted">Update employee register</small>
                                </div>
                            </div>
                        </div>
                    </div><!-- .row -->
                </div>
            </div>
            <div class="chat-content px-lg-2">
                <div class="container-xxl py-6 ">
                    <!-- Accordion -->
                    <div class=" mb-n6 mb-lg-8">
                        <div class="row">
                            <div class="col-md-10">
                                <form class="form-horizontal" role="form"  method="POST" action="{{ route('admin.employees.update',$employee->id) }}" enctype="multipart/form-data">
                                    <input name="_method" type="hidden" value="PUT">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                                                <label for="first_name" class="control-label">{{ __('First Name') }}
                                                    <span class="required">*</span>
                                                </label>
                                                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name',$employee->first_name) }}" />
                                                @if ($errors->has('first_name'))
                                                    <span class="text-danger">
                                                      {{ $errors->first('first_name') }}
                                                     </span>
                                                @endif
                                            </div>
                                            <div class="form-group {{ $errors->has('nickname') ? 'has-error' : '' }}">
                                                <label for="nickname" class="control-label">{{ __('Nickname') }}</label>
                                                <input id="nickname" type="text" class="form-control" name="nickname" value="{{ old('nickname',$employee->nickname) }}" />
                                                @if ($errors->has('nickname'))
                                                    <span class="text-danger">
                                                      {{ $errors->first('nickname') }}
                                                     </span>
                                                @endif
                                            </div>

                                            <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                                                <label for="phone" class="control-label">{{ __('Phone') }}
                                                    <span class="required">*</span>
                                                </label>
                                                <input id="phone" type="phone" class="form-control" name="phone" value="{{ old('phone',$employee->user->phone) }}">
                                                @if ($errors->has('phone'))
                                                    <span class="text-danger">
                                                             {{ $errors->first('phone') }}
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group {{ $errors->has('department_id') ? 'has-error' : '' }}">
                                                <label for="department_id" class="control-label">{{ __('Department') }}
                                                    <span class="required">*</span>
                                                </label>
                                                <select class="form-control" name="department_id" >
                                                    @foreach($departments as $department)
                                                        <option value="{{$department->id}}" @if($department->id == old('department_id', $employee->department_id)) selected @endif>{{$department->name}}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('department_id'))
                                                    <span class="text-danger">
                                                {{ $errors->first('department_id') }}
                                                 </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="gender" class="control-label">{{ __('Gender') }}
                                                    <span class="required">*</span>
                                                </label>
                                                <select class="form-control" name="gender" >
                                                    @foreach(trans('genders') as $key=> $gender)
                                                        <option value="{{$key}}" @if($gender == old('gender', $employee->gender)) selected @endif>{{$gender}}</option>
                                                    @endforeach

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
                                                @if($employee->user->getFirstMediaUrl('users'))
                                                    <img class="img-thumbnail image-width-site-logo mt-3 mb-3" id="previewImage"  src="{{ asset($employee->user->getFirstMediaUrl('users')) }}" alt="">
                                                @else
                                                    <img class="img-thumbnail image-width-site-logo mt-4 mb-3" id="previewImage"  src="{{ asset('assets/images/avatars/11.jpg') }}" alt="">
                                                @endif
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
                                                <label for="last_name" class="control-label">{{ __('Last Name') }}
                                                    <span class="required">*</span>
                                                </label>
                                                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name',$employee->last_name) }}" />
                                                @if ($errors->has('last_name'))
                                                    <span class="text-danger">
                                                      {{ $errors->first('last_name') }}
                                                     </span>
                                                @endif
                                            </div>

                                            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                                <label for="email" class="control-label">{{ __('E-Mail Address') }}
                                                    <span class="required">*</span>
                                                </label>
                                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email',$employee->user->email) }}" />
                                                @if ($errors->has('email'))
                                                    <span class="text-danger">
                                                       {{ $errors->first('email') }}
                                                     </span>
                                                @endif
                                            </div>
                                            <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                                                <label for="date_of_joining" class="control-label">{{ __('Joining Date') }}  <span class="required">*</span></label>
                                                <div class="input-group" >
                                                    <input class="form-control form-control-lg datepickers" data-date-format="yyyy-mm-dd"  name="date_of_joining" value="{{ old('date_of_joining',$employee->date_of_joining) }}">
                                                    <span class="input-group-append"></span>
                                                </div>
                                                @if ($errors->has('date_of_joining'))
                                                    <span class="text-danger">
                                                {{ $errors->first('date_of_joining') }}
                                                 </span>
                                                @endif
                                            </div>
                                            <div class="form-group {{ $errors->has('designation_id') ? 'has-error' : '' }}">
                                                <label for="designation_id" class="control-label">{{ __('Designation') }}
                                                    <span class="required">*</span>
                                                </label>
                                                <select class="form-control" name="designation_id" >
                                                    @foreach($designations as $designation)
                                                        <option value="{{$designation->id}}" @if($designation->id == old('designation_id', $employee->designation_id)) selected @endif>{{$designation->name}}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('designation_id'))
                                                    <span class="text-danger">
                                                {{ $errors->first('designation_id') }}
                                                 </span>
                                                @endif
                                            </div>
                                            <div class="form-group {{ $errors->has('about') ? 'has-error' : '' }}">
                                                <label for="about" class="control-label">{{ __('About') }}</label>
                                                <textarea class="form-control form-control-lg" id="about" rows="3" name="about" placeholder="Express yourself" data-autosize="true">{{old('about',$employee->about)}}</textarea>
                                                @if ($errors->has('about'))
                                                    <span class="text-danger">
                                                {{ $errors->first('about') }}
                                                 </span>
                                                @endif
                                            </div>
                                        </div>
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
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/setting/index.js') }}"></script>

    <script>

        $('.datepickers').datepicker({
            weekStart: 1,
            autoclose: true,
            todayHighlight: true,
        });

        $('.datepickers').change(function () {});
    </script>
@endsection

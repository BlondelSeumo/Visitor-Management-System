<!-- Sidebar -->
<div class="sidebar">
    <div class="chat-header border-bottom py-4 py-lg-6 px-lg-2">
        <div class="container-xxl ">

            <div class="row align-items-center">
                <!-- Chat photo -->
                <div class="col-9 col-xl-9 ">
                    <div class="media text-xl-left">

                        <div class="media-body align-self-center text-truncate">
                            <h6 class="text-truncate mb-n1">{{ trans_choice('departments.title', 1) }}</h6>
                            <small class="text-muted">Department list & search</small>
                        </div>
                    </div>
                </div>

                <!-- Chat toolbar -->
                <div class="col-3 col-xl-3 text-right">
                    <ul class="nav justify-content-end">
                        <!-- Mobile nav -->
                        <li class="nav-item list-inline-item d-block d-xl-none">
                            <a class="nav-link text-muted px-0" href="#" data-chat="open">
                                <i class="icon-md fe-chevron-right"></i>
                            </a>
                        </li>
                        <!-- Mobile nav -->
                    </ul>
                </div>

            </div><!-- .row -->

        </div>
    </div>
    <div class="h-100">
        <div class="tab-pane h-100" >
            <div class="d-flex flex-column h-100">
                <div class="hide-scrollbar">
                    <div class="container-fluid py-6">
                        <!-- Create chat -->
                        <div class="tab-content">
                            <!-- Chat details -->
                            <div id="create-group-details" class="tab-pane fade show active">
                                @if(isset($department))
                                    <form class="form-horizontal" role="form" method="POST" action="{{ route('departments.update',$department->id) }}">
                                        {{ method_field('PATCH') }}
                                        @csrf
                                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                            <label for="name" class="control-label">{{ __('Name') }}
                                                <span class="required">*</span>
                                            </label>
                                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name',$department->name) }}" />
                                            @if ($errors->has('name'))
                                                <span class="text-danger">
                                            {{ $errors->first('name') }}
                                        </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="gender" class="control-label">{{ __('Status') }}
                                                <span class="required">*</span>
                                            </label>
                                            <select class="form-control" name="status" >
                                                @foreach(trans('statues') as $key=> $status)
                                                    <option value="{{$key}}" @if($key == old('status', $department->status)) selected @endif>{{$status}}</option>
                                                @endforeach

                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-lg btn-primary btn-block">
                                                {{ __('Update') }}
                                            </button>
                                        </div>
                                    </form>

                                @else
                                    <form class="form-horizontal" role="form" method="POST" action="{{ route('departments.store') }}">
                                        {{ csrf_field() }}

                                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                            <label for="name" class="control-label small">{{ __('Name') }}
                                                <span class="required">*</span>
                                            </label>
                                            <input id="first_name" type="text" class="form-control" name="name" value="{{ old('name') }}" />
                                            @if ($errors->has('name'))
                                                <span class="text-danger">
                                                {{ $errors->first('name') }}
                                            </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="gender" class="control-label small">{{ __('Status') }}
                                                <span class="required">*</span>
                                            </label>
                                            <select class="form-control" name="status" >
                                                @foreach(trans('statues') as $key=> $status)
                                                    <option value="{{$key}}">{{$status}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-lg btn-primary btn-block">
                                                {{ __('Create') }}
                                            </button>
                                        </div>
                                    </form>
                                @endif
                            </div>
                            <!-- Chat details -->
                        </div>
                        <!-- Create chat -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Sidebar -->

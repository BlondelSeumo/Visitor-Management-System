@extends('layouts.site')

@section('sidebar')
    @include('check-in.partials._sidebar')
@endsection

@section('content')
    <!-- Default Page -->
    <div class="chat">

        <!-- Chat: body -->
        <div class="chat-body">

            <!-- Chat: Header -->
            <div class="chat-header border-bottom py-4 px-lg-4">
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
                                    <h6 class="text-truncate mb-n1">Return Visitor Details</h6>
                                    <small class="text-muted">Insert your email address to get details</small>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Chat: Header -->

            <!-- Chat: Content-->
            <div class="chat-content  py-4 py-lg-6 px-lg-4">
                {!! Form::open(['route' => 'check-in.find.visitor', 'id' => 'myForm']) !!}
                <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                    {!!  Html::decode(Form::label('email', "Visitor's Email <span class='text-danger'>*</span>", ['class' => 'control-label'])) !!}
                    {!! Form::text('email', null, ('' == 'required') ? ['class' => 'form-control input','id '=>'email','required' => 'required', 'placeholder'=>"Search email.."] : ['class' => 'form-control input','id '=>'email', 'placeholder'=>"Search email.."]) !!}
                    {!! $errors->first('email', '<p class="text-danger">:message</p>') !!}
                </div>
                {!! Form::close() !!}
            </div>
            <div class="chat-footer border-top py-4 py-lg-6 px-lg-4">
                <div class="form-row align-items-center">
                    <div class="col">
                        <a href="{{ route('/') }}" class="btn btn-lg btn-sm btn-danger float-left text-white">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                        </a>
                    </div>

                    <!-- Submit button -->
                    <div class="col-auto">
                        <button class="btn btn-lg btn-sm btn-success float-left text-white " id="form-submit" type="submit">
                            Next <i class="fe-arrow-right ml-auto"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="application/javascript">
        $(document).ready(function(){
            $("#form-submit").click(function(){
                $("#myForm").submit(); // Submit the form
            });
        });
    </script>
@endsection

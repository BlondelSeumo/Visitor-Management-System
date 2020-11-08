@extends('layouts.site')

@push('css')
    <style>
        .retake-photo > img {
            height: 50px;
            float: left;
        }
        #myOnlineCamera video {width:320px;height:240px;margin:15px;float:left;}
        #myOnlineCamera canvas{width:320px;height:240px;margin:15px;float:left;}
        #myOnlineCamera button{clear:both;margin:30px;}
        .has-error > input, select {
            border-color: red;
        }
    </style>
@endpush
@section('sidebar')
    @include('check-in.partials._sidebar')
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
                                    <h6 class="text-truncate mb-n1">Booking information</h6>
                                    <small class="text-muted">Update your Booking details</small>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Chat: Header -->

            <!-- Chat: Content-->
            <div class="chat-content  py-3 px-lg-8">
                <form id="myForm" class="form-horizontal" role="form"  method="POST" action="{{ route('check-in.step-three.next') }}" >
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12 my-3">
                            <div style="margin: auto" align="center">
                                <video width="180" height="140" id="videos" style="border:5px solid #d3d3d3;" autoplay></video>
                                <canvas id="canvas" width="160" height="130" style="border:5px solid #d3d3d3;"></canvas>
                                <input type="hidden" id="image" name="photo" value="">
                            </div>
                            <button type="button" id="play-video" class='retake-photo btn btn-md btn-dark float-left'>
                                <img src="{{ asset('website/img/retake.png')}}" alt="">
                            </button>
                            <button type="button" id="snap" class='retake-photo btn btn-md btn-danger float-right'>
                                <img class="img" src="{{ asset('website/img/camera.png')}}" alt="">
                            </button>
                        </div>
                        <span class="text-center">{!! $errors->first('photo', '<p class="text-danger">:message</p>') !!}</span>
                    </div>
                </form>
            </div>
            <div class="chat-footer border-top py-4 py-lg-6 px-lg-8">
                <div class="form-row align-items-center">
                    <div class="col">
                        <a href="{{ route('check-in.step-two') }}" class="btn btn-lg btn-sm btn-danger float-left text-white">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                        </a>
                    </div>

                    <!-- Submit button -->
                    <div class="col-auto">
                        <button class="btn btn-lg btn-sm btn-success float-left text-white " id="step-three-submit" type="submit">
                            Next <i class="fe-arrow-right ml-auto"></i>
                        </button>
                    </div>
                </div>
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
                        <h6>{{$visitor['name']}}</h6>
                    </div>
                    <ul class="list-group list-group-flush mb-8">
                        <li class="list-group-item py-6">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <p class="small text-muted mb-0">{{__('Visitor Name')}}</p>
                                    <p>{{$visitor['name']}}</p>
                                </div>
                                <i class="text-muted icon-sm fe-disc"></i>
                            </div>
                        </li>
                        <li class="list-group-item py-6">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <p class="small text-muted mb-0">{{__('Visitor Email')}}</p>
                                    <p>{{$visitor['email']}}</p>
                                </div>
                                <i class="text-muted icon-sm fe-disc"></i>
                            </div>
                        </li>

                        <li class="list-group-item py-6">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <p class="small text-muted mb-0">{{__('Visitor Phone')}}</p>
                                    <p>{{$visitor['phone']}}</p>
                                </div>
                                <i class="text-muted icon-sm fe-phone"></i>
                            </div>
                        </li>

                        <li class="list-group-item py-6">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <p class="small text-muted mb-0">{{__('Employee Name')}}</p>
                                    <p>{{$employee->name}}</p>
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
@section('scripts')
    <script src="{{ asset('js/photo.js') }}"></script>
    <script>

        $(document).ready(function(){
            $("#step-three-submit").click(function(){
                $("#myForm").submit(); // Submit the form
            });
        });
    </script>
@endsection

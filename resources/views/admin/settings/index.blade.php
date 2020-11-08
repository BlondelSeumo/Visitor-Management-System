@extends('layouts.master')
@section('sidebar')
    @include('admin.settings.partials._sidebar')
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
                                        @if(isset($type))
                                            @if($type=='general')
                                                <h6 class="text-truncate mb-n1">{{__('General Setting')}}</h6>
                                                <small class="text-muted">{{__('Update General Setting details.')}}</small>
                                            @elseif($type=='notifications')
                                                <h6 class="text-truncate mb-n1">{{__('Notifications')}}</h6>
                                                <small class="text-muted">{{__('Update template details.')}}</small>
                                            @elseif($type=='template')
                                                <h6 class="text-truncate mb-n1">{{__('Email & Sms template Setting')}}</h6>
                                                <small class="text-muted">{{__('Update Front-end details.')}}</small>
                                            @elseif($type=='photo_id_card')
                                                <h6 class="text-truncate mb-n1">{{__('Photo ID Card Setting')}}</h6>
                                                <small class="text-muted">{{__('Update details.')}}</small>
                                            @elseif($type=='front-end')
                                                <h6 class="text-truncate mb-n1">{{__('Front-end')}}</h6>
                                                <small class="text-muted">{{__('Update Front-end details.')}}</small>
                                            @elseif($type=='email')
                                                <h6 class="text-truncate mb-n1">{{__('Email settings')}}</h6>
                                                <small class="text-muted">{{__('Update email details.')}}</small>
                                            @else
                                                @include('admin.settings.general')
                                            @endif
                                        @else
                                            <h6 class="text-truncate mb-n1">{{__('General Setting')}}</h6>
                                            <small class="text-muted">{{__('Update General Setting details.')}}</small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div><!-- .row -->
                    </div>
                </div>
                <!-- Chat: Header -->

                <!-- Chat: Content-->
                <div class="chat-content">
                    @if(isset($type))
                        @if($type=='general')
                            @include('admin.settings.general')
                        @elseif($type=='notifications')
                            @include('admin.settings.notifications')
                        @elseif($type=='template')
                            @include('admin.settings.template')
                        @elseif($type=='photo_id_card')
                            @include('admin.settings.photo_id_card')
                        @elseif($type=='front-end')
                            @include('admin.settings.front-end')
                        @elseif($type=='email')
                            @include('admin.settings.email')
                        @else
                            @include('admin.settings.general')
                        @endif
                    @else
                        @include('admin.settings.general')
                    @endif
                </div>
            </div>
        </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/setting/index.js') }}"></script>
@endsection


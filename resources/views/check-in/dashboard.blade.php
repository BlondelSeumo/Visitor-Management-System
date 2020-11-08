@extends('layouts.site')
@section('sidebar')
    @include('check-in.partials._sidebar')
@endsection

@section('content')
    <div class="chat flex-column justify-content-center text-center">
        <div class="container-xxl">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    @if(setting('site_logo'))
                        <img src="{{ asset('images/'.setting('site_logo')) }}" class="mx-auto fill-primary" data-inject-svg="" alt="" style="width: 150px;height: 150px">
                    @else
                        <img src="{{ asset('assets/images/brand.png') }}" class="mx-auto fill-primary" data-inject-svg="" alt="" style="width: 150px;height: 150px">
                    @endif
                </div>
            </div>
            <h6>{!! setting('site_name') !!}</h6>

            <div class="avatar avatar-lg mb-5 mt-5">
                <a href="{{ route('check-in.step-one') }}">
                    <img class="img-thumbnail" src="{{ asset('website/img/check-in-icon.png')}}" alt="">
                </a>
            </div>
            <h6>{!! setting('welcome_screen') !!}</h6>
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <form method="POST">
                        <a href="{{ route('check-in.return') }} ">I have been here before</a>
                    </form>
                </div>

                <div class="col-md-4 col-sm-12">
                    @if (!Auth::guest() && Auth::user()->hasRole('admin'))
                        <a href="{{ route('admin') }}">go to admin panel</a>
                    @elseif(!Auth::guest() && Auth::user()->employee)
                        <a href="{{ route('dashboard') }}">go to employee panel</a>
                    @else
                        <a href="{{ route('login') }}">Sign in to admin panel</a>
                    @endif
                </div>
                <div class="col-md-4 col-sm-12">
                    <form method="POST">
                        <a href="{{ route('check-in.pre.registered') }}">I have been here Pre-register</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {

            $('#allemployees').hide();
            $('#allpre_registers').hide();
            $('#selectall').change(function(){
                if($('#selectall').val() == 'Visitors') {
                    $('#allvisitors').show();
                    $('.all').val('Visitors');
                    $('#allemployees').hide();
                    $('#allpre_registers').hide();
                }
                if($('#selectall').val() == 'Employees') {
                    $('#allemployees').show();
                    $('.all').val('Employees');
                    $('#allvisitors').hide();
                    $('#allpre_registers').hide();
                }
                if($('#selectall').val() == 'pre_registers') {
                    $('#allpre_registers').show();
                    $('.all').val('pre_registers');
                    $('#allvisitors').hide();
                    $('#allemployees').hide();
                }

            });
        });
    </script>
@endsection

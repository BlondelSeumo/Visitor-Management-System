@extends('layouts.frontend')

@section('content')
    <div class="container">
                <div class="row">
                    <div class="col-md-2 col-sm-12"></div>
                    <div class="col-md-8 col-sm-12">
                    <div class="card"  style="margin-top:40px;">
                        <div class="card-header" id="Details" align="center"><h4 style="color: #111570;font-weight: bold">Visitor Details</h4></div>
                        <div class="card-header" id="Visitorimg" align="center"><h4 style="color: #111570;font-weight: bold">Visitor's Photo</h4></div>
                        <div class="card-header" id="VisitorAgreement" align="center"><h4 style="color: #111570;font-weight: bold">Visitor Agreement</h4></div>
                        <div style="margin: 10px;">
                            @if ($errors->any())
                                <ul class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                                @if($visitor)
                            {!! Form::open(['url' => ['/frontend/visitors/update',$visitor->id], 'method' => 'PUT', 'class' => 'form-horizontal', 'files' => true]) !!}
                         <div class="save">
                                <div class="visitor" id="visitor">
                                    @include ('frontend.editform', ['formMode' => 'create'])
                                </div>

                                <div class="visitorPhoto" id="visitorPhoto">
                                    <div class="panel-body">
                                        <div class="card">
                                            <div class="card-body">
                                        <form  class="form-horizontal" method="post">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div style="margin: auto" align="center">
                                                        <video id="videos" width="200" height="200" autoplay  style="width: 200px;height: 200px;"></video>
                                                        <canvas id="canvas" width="180" height="175"></canvas>
                                                        <input type="hidden" id="image" name="photo" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top: 10px">
                                                <div class="col-md-5 col-sm-12">
                                                        <button type="button" id="playvideo" class='retakephoto btn btn-md btn-dark'>
                                                            <img src="{{ asset('website/img/retake.png')}}">
                                                        </button>
                                                </div>
                                                <div class="col-md-4 col-sm-12">
                                                    <div >
                                                        <button type="button" id="snap" class='retakephoto btn btn-md btn-danger '>
                                                            <img class="img" src="{{ asset('website/img/cemara1.png')}}">
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-12">
                                                    <div>
                                                        <button type="button" id="continue2" class='arrows btn btn-primary '>
                                                            <img class="img" src="{{ asset('website/img/arrow9.jpg')}}"> <span>Continue</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="Agreement" id="Agreement">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="strp">
                                                <div class="">
                                                    {{strip_tags($settings[0]->welcome_screen)}}
                                                </div>
                                                <div class="">
                                                    {{strip_tags($settings[0]->agreement_screen)}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="margin-top: 50px">
                                        <div class="row">
                                            <div class="col-md-6" align="center">
                                                <h3 style="color: #111570;font-weight: bold">Visitor's Name</h3>
                                                <p id="VisitorAgreementtag">{{$visitor->first_name}} {{$visitor->last_name}}</p>
                                            </div>
                                            <div class="col-md-6" align="center">
                                                <h3 style="color: #111570;font-weight: bold">Date</h3>
                                                <p>{{date('d-m-Y')}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr style="border: 1px solid lightslategrey">
                                    <div class="row">
                                        <div style="margin: auto;width: 400px;">
                                            <div style="float: left">
                                                <div style="float: left">
                                                        @if($settings[0]->visitor_agreement==1)
                                                            <label class="switch" id="switch">
                                                                <input type="checkbox" name="agreement" id="chekbox" checked>
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @else
                                                            <label class="switch" id="unswitch">
                                                                <input type="checkbox" name="agreement" id="unchekbox">
                                                                <span class="slider round"></span>
                                                            </label>
                                                        @endif
                                                </div>
                                                <div style="color: #111570;font-weight: bold;float: left;margin: 8px;">
                                                    <h4>I Agree</h4>
                                                </div>
                                            </div>
                                            <div style="float: right;">
                                                <div style="margin: 8px">
                                                    <input type="checkbox" id="myCheck" name="emailCheck"  onclick="myFunction()"> <span style="color: #111570;">Email Visitor Agreement</span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6"></div>
                                        <div class="col-md-6">
                                            @if($settings[0]->visitor_agreement==1)
                                                <button  class="btn btn-primary float-right" id="show">
                                                    <i class="fa fa-arrow-right" aria-hidden="true"></i> Continue
                                                </button>
                                            @else
                                                <button  class="btn btn-primary float-right" id="hide">
                                                    <i class="fa fa-arrow-right" aria-hidden="true"></i> Continue
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                             </div>
                                {!! Form::close() !!}
                                    @else
                                    <div>
                                        <h4 align="center" style="color: #ff6666">ID Not Available</h4>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
@endsection

@section('scripts')
    <script>



        $('#switch').change(function(){
            var data=  $("#chekbox").prop( "checked" );
            if(data == true){
                $("#show").removeAttr("disabled");
            }else{
                $("#show").attr("disabled", "disabled");
            }
        });

        $("#hide").attr("disabled", "disabled");

        $('#unswitch').change(function(){
            var data=  $("#unchekbox").prop( "checked" );
            if(data == true){
                $("#hide").removeAttr("disabled");
            }else{
                $("#hide").attr("disabled", "disabled");
            }
        });


        $('#visitorPhoto').hide();
        $('#Visitorimg').hide();
        $('#VisitorAgreement').hide();
        $('#Agreement').hide();

        $('#continue').click(function () {
            $('#visitorPhoto').show();
            $('#visitor').hide();
            $('#Details').hide();
            $('#Visitorimg').show();
        });

        $("#continue2").attr("disabled", "disabled");
        $('#continue2').click(function () {
            $('#visitorPhoto').hide();
            $('#visitor').hide();
            $('#VisitorAgreement').show();
            $('#Agreement').show();
            $('#Visitorimg').hide();
        });



        $('#canvas').hide();
        $('#playvideo').click(function () {
            $('#videos').show();
            $('#canvas').hide();

        });

        var video = document.getElementById('videos');

        // Get access to the camera!
        if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
            // Not adding `{ audio: true }` since we only want video now
            navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream) {
                video.src = window.URL.createObjectURL(stream);
                video.play();
            });
        }

        var canvas = document.getElementById('canvas');
        var context = canvas.getContext('2d');
        var video = document.getElementById('videos');

        // Trigger photo take
        document.getElementById("snap").addEventListener("click", function() {
            context.drawImage(video, 0, 0, 180, 175);
            var img = canvas.toDataURL('image/png');
            if(img){
                $("#continue2").removeAttr("disabled");
            }            document.getElementById('image').value =img;
            $('#canvas').show();
            $('#videos').hide();
        });
    </script>
@stop

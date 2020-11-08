@extends('layouts.site')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/id-card-print.css') }}">
@endpush
@section('sidebar')
    @include('check-in.partials._sidebar')
@endsection
@section('content')
    <div class="container">
        <div class="row" style="margin-top: 10px;">
            <div class="col-sm-12">
                <div class="card border-0">
                    <div class="card-body">
                        @if($booking->invitations)
                            @foreach($booking->invitations as $invitation)
                                @if(isset($invitation->visitor_id))
                                    <div class="card" style="border: 0;">
                                        <div class="card-body">
                                            <div class="id-card-hook"></div>
                                            <div class="img-cards" id="printidcard">
                                                <div class="id-card-holder">
                                                    <div class="id-card">
                                                        <div class="id-card-header">
                                                            @if(setting('id_card_logo'))
                                                                <img src="{{ asset('images/'.setting('id_card_logo')) }}">
                                                            @endif
                                                        </div>
                                                        <div class="id-card-header">
                                                            @if(setting('id_card_logo'))
                                                            <img src="{{ asset('images/'.setting('id_card_logo')) }}">
                                                             @endif
                                                        </div>
                                                        <div class="id-card-photo">
                                                            @if($invitation->visitor->getFirstMediaUrl('visitor'))
                                                                <img src="{{ asset($invitation->visitor->getFirstMediaUrl('visitor')) }}" alt="">
                                                            @endif
                                                        </div>
                                                        <h2>{{$invitation->visitor->name}}</h2>
                                                        <h3>{{$invitation->booking->reg_no}}</h3>
                                                        <h3>{{$invitation->visitor->company_name}}</h3>
                                                        <h2>VISITED TO</h2>
                                                        <h3>Host: {{$booking->host->name}}</h3>
                                                        <hr>
                                                        <p><strong>{{ setting('site_name') }} </strong></p>
                                                        <p><strong>{{ setting('site_address') }} </strong></p>
                                                        <p>Ph: {{ setting('site_phone') }} | E-mail: {{ setting('site_email') }} </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row justify-content-md-center">
                                                <div class="col-md-4">
                                                    <div style="margin-top: 10px;" class="justify-content-center">
                                                        <div class="btn-group btn-group-justified">
                                                            <a href="{{ route('check-in.step-three') }}" class="btn btn-primary">
                                                                <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                                                            </a>
                                                            @if($invitation->visitor)
                                                            <a href="{{ route('check-in.step-one') }}" class="btn btn-warning">
                                                                <i class="fa fa-edit" aria-hidden="true"></i> Edit
                                                            </a>
                                                            <a href="#" id="print" class="btn btn-success">
                                                                <i class="fa fa-print" aria-hidden="true"></i> Print
                                                            </a>
                                                            @endif
                                                            <a href="{{ route('check-in') }}" class="btn btn-primary ">
                                                                <i class="fa fa-home" aria-hidden="true"></i> Home
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @else
                            <div>
                                <p align="center" style="color: red">ID Not Available</p>
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
        function printData(data)
        {
            var frame1 = $('<iframe />');
            var css = "{{ asset('css/id-card-print.css') }}";
            frame1[0].name = "frame1";
            frame1.css({ "position": "absolute", "top": "-1000000px" });
            $("body").append(frame1);
            var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
            frameDoc.document.open();
            //Create a new HTML document.
            frameDoc.document.write('<html><head><title>visitor Card</title>');
            frameDoc.document.write('<link href="'+css+'" rel="stylesheet" type="text/css" />');
            frameDoc.document.write('</head><body>');
            //Append the external CSS file.
            //Append the DIV contents.
            frameDoc.document.write(data);
            frameDoc.document.write('</body></html>');
            frameDoc.document.close();
            setTimeout(function () {
                window.frames["frame1"].focus();
                window.frames["frame1"].print();
                frame1.remove();
            }, 500);
        }

        $('#print').on('click',function(){
            var data = $("#printidcard").html();
            printData(data);
        });
    </script>

@endsection


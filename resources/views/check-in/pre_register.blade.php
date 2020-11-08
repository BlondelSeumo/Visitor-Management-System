@extends('layouts.frontend')

@section('content')
    <div class="container">
                <div class="row">
                    <div class="col-md-2 col-sm-12"></div>
                    <div class="col-md-8 col-sm-12">
                    <div class="card"  style="margin-top:40px;">
                        <div class="card-header" id="Details" align="center"><h4 style="color: #111570;font-weight: bold">Return Pre-Register Details</h4></div>
                        <div style="margin: 10px;">
                            @if ($errors->any())
                                <ul class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif

                            {!! Form::open(['url' => '/frontend/visitors/getpreregister','method' => 'POST', 'class' => 'form-horizontal', 'files' => true]) !!}
                         <div class="save">
                             <div class="row">
                                 <div class="col-md-6">
                                     <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                                         {!! Html::decode(Form::label('email', 'Email <span class="text-danger">*</span>', ['class' => 'control-label'])) !!}
                                         {!! Form::text('email', null, ('' == 'required') ? ['class' => 'form-control ','id '=>'name','required' => 'required'] : ['class' => 'form-control','placeholder'=>'Search Email....','id '=>'name']) !!}
                                         {!! $errors->first('email', '<p class="text-danger">:message</p>') !!}
                                     </div>
                                 </div>
                             </div>

                             <div class="row">
                                 <div class="col-md-6">
                                     <a href="{{ url('/frontend') }}"><button type="button"  class="btn btn-primary">
                                         <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                                     </button></a>
                                 </div>
                                 <div class="col-md-6">
                                     <button  class="btn btn-primary float-right">
                                         <i class="fa fa-arrow-right" aria-hidden="true"></i> Continue
                                     </button>
                                 </div>

                             </div>

                             </div>
                                {!! Form::close() !!}
                        </div>
                            </div>
                        </div>
                    </div>
            </div>
@endsection

@section('scripts')
    <script>

    </script>
@stop

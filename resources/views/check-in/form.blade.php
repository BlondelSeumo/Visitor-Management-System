
<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="form-group {{ $errors->has('first_name') ? 'has-error' : ''}}">
            {!! Form::label('first_name', 'First Name', ['class' => 'control-label']) !!}
            {!! Form::text('first_name', null, ('' == 'required') ? ['class' => 'form-control input','id '=>'first_name','required' => 'required'] : ['class' => 'form-control input','id '=>'first_name']) !!}
            {!! $errors->first('first_name', '<p class="text-danger">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group {{ $errors->has('last_name') ? 'has-error' : ''}}">
            {!! Form::label('last_name', 'Last Name', ['class' => 'control-label']) !!}
            {!! Form::text('last_name', null, ('' == 'required') ? ['class' => 'form-control input', 'id '=>'last_name', 'required' => 'required'] : ['class' => 'form-control input','id '=>'last_name']) !!}
            {!! $errors->first('last_name', '<p class="text-danger">:message</p>') !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="form-group {{ $errors->has('company_name') ? 'has-error' : ''}}">
            {!! Form::label('company_name', 'Company Name', ['class' => 'control-label']) !!}
            {!! Form::text('company_name', null, ('' == 'required') ? ['class' => 'form-control input', 'id '=>'company_name', 'required' => 'required'] : ['class' => 'form-control input','id '=>'company_name']) !!}
            {!! $errors->first('company_name', '<p class="text-danger">:message</p>') !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
            {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
            {!! Form::email('email', null, ('required' == 'required') ? ['class' => 'form-control input', 'id '=>'email','required' => 'required'] : ['class' => 'form-control input','id '=>'email']) !!}
            {!! $errors->first('email', '<p class="text-danger">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
            {!! Form::label('phone', 'Phone', ['class' => 'control-label']) !!}
            {!! Form::text('phone', null, ('required' == 'required') ? ['class' => 'form-control input', 'id '=>'phone', 'required' => 'required'] : ['class' => 'form-control input','id '=>'phone']) !!}
            {!! $errors->first('phone', '<p class="text-danger">:message</p>') !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div id="div_id_hostID" class="form-group">
            <label for="id_hostID" class="control-label   requiredField"> Select Host  </label>
            <div class="controls " style="margin-bottom: 10px;">
                <select name="host_id" id="host_name" class="textinput textInpu form-control">
                    @foreach($employees as $key => $employee)
                        <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
            <button type="button" class="btn btn-primary float-right" id="continue">
                <i class="fa fa-arrow-right" aria-hidden="true"></i> Continue
            </button>
    </div>
</div>


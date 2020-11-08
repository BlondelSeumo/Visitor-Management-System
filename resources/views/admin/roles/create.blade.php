@extends('layouts.backend')
@section('sub-menu')
    <li class="nav-item {{ str_is('roles.create', Route::currentRouteName()) ? 'active' : '' }}" role="presentation">
        <a class="nav-link" href="{{ url('admin/roles/create') }}">
            Create
        </a>
    </li>
@endsection
@section('content')
<div class="col-md-9">
    <div class="card">
        <div class="card-header">Create New Role
            <a href="{{ url('/admin/roles') }}" title="Back"><button class="btn btn-default btn-sm pull-right"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
        </div>
        <div class="card-body">
            {!! Form::open(['url' => '/admin/roles', 'class' => 'form-horizontal']) !!}

            @include ('admin.roles.form', ['formMode' => 'create'])

            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

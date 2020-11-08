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
        <div class="card-header">
            Role
            <span class="pull-right">
                 <a href="{{ url('/admin/roles') }}" title="Back"><button class="btn btn-default btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                <a href="{{ url('/admin/roles/' . $role->id . '/edit') }}" title="Edit Role"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                {!! Form::open([
                    'method' => 'DELETE',
                    'url' => ['/admin/roles', $role->id],
                    'style' => 'display:inline'
                ]) !!}
                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-sm',
                            'title' => 'Delete Role',
                            'onclick'=>'return confirm("Confirm delete?")'
                    ))!!}
                {!! Form::close() !!}

            </span>
        </div>
        <div class="card-body">
            <div id="hide-table">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID.</th> <th>Name</th><th>Label</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td data-title="ID">{{ $role->id }}</td>
                                <td data-title="Name"> {{ $role->name }} </td>
                                <td data-title="Label"> {{ $role->label }} </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

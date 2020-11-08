@extends('layouts.master')
@section('sidebar')
    @include('admin.designations.partials._sidebar')
@endsection
@section('main-class')
    main-visible
@endsection
@section('content')
    <div class="chat">
        <!-- Chat: body -->
        <div class="chat-body">
            <!-- Chat: Header -->
            <div class="chat-header border-bottom py-4 py-lg-6 px-lg-8">
                <div class="container-xxl py-2">
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
                                    <h6 class="text-truncate mb-n1">{{ trans_choice('entity.designation', 1) }}</h6>
                                    <small class="text-muted">{{ trans_choice('designations.index_header', 1) }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="chat-content">
                <div class="container-xxl py-6 ">
                    <section class="no-more-tables">
                        <table class="table table-bordered table-striped table-condensed cf ">
                            <thead class="cf">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $i = 0; @endphp
                            @foreach($designations as $item)
                                <tr>
                                    <td data-title="ID">{{ $i +=1}}</td>
                                    <td data-title="Name">{{ $item->name }}</td>
                                    <td data-title="Status">
                                        @foreach(trans('statues') as $key=> $status)
                                            @if($key == $item->status)
                                                {{$status}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td data-title="Actions">
                                        <a href="{{ route('designations.edit',$item->id) }}" class="tooltip-custom "><span class="tooltip-text tooltip-bottom">Edit</span><button class="btn btn-secondary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                        {!! Form::open([
                                            'method' => 'DELETE',
                                            'route' => ['designations.destroy', $item->id],
                                            'style' => 'display:inline'
                                        ]) !!}
                                        {!! Form::button('<span class="tooltip-text tooltip-bottom">Delete</span><i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                                'type' => 'submit',
                                                'class' => 'btn btn-secondary btn-sm tooltip-custom ',
                                                'onclick'=>'return confirm("Confirm delete?")'
                                        )) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection

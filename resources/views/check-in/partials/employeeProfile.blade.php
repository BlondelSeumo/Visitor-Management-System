<div class="hide-scrollbar flex-fill" >

    <div class="border-bottom text-center py-9 px-10">
        <!-- Photo -->
        <div class="avatar avatar-xl mx-5 mb-5">
            @if($employee->user->getFirstMediaUrl('users'))
                <img class="avatar-img" src="{{ asset($employee->user->getFirstMediaUrl('users')) }}" alt="">
            @else
                <img class="avatar-img" src="{{ asset('assets/images/avatars/11.jpg') }}" alt="">
            @endif
        </div>
        <h6>{{ $employee->name}}</h6>
        @if($employee->nickname) <span> ({{$employee->nickname}}) </span>@endif
        <p class="text-muted text-sm-center">{{ $employee->department->name }}</p>
    </div>

    <!-- Details -->
    <ul class="list-group list-group-flush mb-8">
        <li class="list-group-item py-6">
            <div class="media align-items-center">
                <div class="media-body">
                    <p class="small text-muted mb-0">{{__('Designation')}}</p>
                    <p>{{$employee->designation->name}}</p>
                </div>
                <i class="text-muted icon-sm fe-disc"></i>
            </div>
        </li>

        <li class="list-group-item py-6">
            <div class="media align-items-center">
                <div class="media-body">
                    <p class="small text-muted mb-0">{{__('Phone')}}</p>
                    <p>{{$employee->user->phone}}</p>
                </div>
                <i class="text-muted icon-sm fe-phone"></i>
            </div>
        </li>

        <li class="list-group-item py-6">
            <div class="media align-items-center">
                <div class="media-body">
                    <p class="small text-muted mb-0">{{__('Email')}}</p>
                    <p>{{$employee->user->email}}</p>
                </div>
                <i class="text-muted icon-sm fe-mail"></i>
            </div>
        </li>

        <li class="list-group-item py-6">
            <div class="media align-items-center">
                <div class="media-body">
                    <p class="small text-muted mb-0">{{__('Joining Date')}}</p>
                    <p>{{$employee->date_of_joining}}</p>
                </div>
                <i class="text-muted icon-sm fe-clock"></i>
            </div>
        </li>
        <li class="list-group-item py-6">
            <div class="media align-items-center">
                <div class="media-body">
                    <p class="small text-muted mb-0">{{__('Gender')}}</p>
                    <p>
                        @foreach(trans('genders') as $key=> $gender)
                            @if($key == $employee->gender)
                                {{$gender}}
                            @endif
                        @endforeach
                    </p>
                </div>
                <i class="text-muted icon-sm fe-user-x"></i>
            </div>
        </li>
    </ul>

</div>

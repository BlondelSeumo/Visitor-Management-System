@foreach($employees as $employee)
    <div class="col-md-3" onclick="getEmployeeProfile({{$employee->id}})">
        <div class="card mb-4 shadow-sm user-box">
            <label>
                <input type="radio" name="test" value="small" checked>
                @if($employee->user->getFirstMediaUrl('users'))
                    <img class="bd-placeholder-img card-img-top"  src="{{ asset($employee->user->getFirstMediaUrl('users')) }}" style=" width: 100%; height: 100px;" alt="">
                @else
                    <img class="bd-placeholder-img card-img-top"  src="{{ asset('assets/images/avatars/11.jpg') }}" style=" width: 100%; height: 100px;" alt="profile picture">
                @endif
            </label>
            <div class="card-body p-2 m-3">
                <h5 class="card-subtitle mb-2 text-tertiary">{{$employee->name}}</h5>
            </div>
        </div>
    </div>
@endforeach

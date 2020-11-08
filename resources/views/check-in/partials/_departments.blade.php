<div class="text-center hide-scrollbar d-flex my-7 scroll-menu">
    @foreach($departments as $department)
        <a class="badge badge-secondary m-1"  onclick="getEmployee({{$department->id}})">{{$department->name}}</a>
    @endforeach
</div>

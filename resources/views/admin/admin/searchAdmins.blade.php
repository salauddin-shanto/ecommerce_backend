<!-- Table rows are initially populated from the server-side rendering -->
@foreach ($users as $user)
    <tr id="userRow{{ $user->id }}">
        <td>{{ $user->name }}</td>
        <td>{{ $user->user_name }}</td>
        <td>   
            @foreach ($user->roles as $role)
                <div class="permission">{{$role->name}}</div>
                
            @endforeach
        </td>
        <td>{{ $user->phone }}</td>
    {{--                             <td>
            <a href="{{route('edit-user',['id'=>$user->id])}}" class="btn btn-primary">Edit</a>
            <button class="btn btn-danger" onclick="confirmDelete({{ $user->id }})">Delete</button>
        </td> --}}
        <td>edit</td>
    </tr>
@endforeach
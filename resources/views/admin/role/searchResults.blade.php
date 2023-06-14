@foreach ($roles as $role)
    <tr>
        <td>{{$role->name}}</td> 
        @php
            $permissions=$role->permissions;
        @endphp
        <td>
            
            @foreach ($permissions as $permission)
                <div class="permission">{{$permission->name}}</div>
                
            @endforeach
        </td>
        <td>
            <a href="#" class="btn btn-primary">Edit</a>
            <button class="btn btn-danger" onclick="confirmDelete({{ $role->id }})">Delete</button>
        </td>
    </tr>

@endforeach


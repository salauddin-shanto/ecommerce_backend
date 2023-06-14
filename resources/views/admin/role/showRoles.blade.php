@extends('admin/layout/layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/admin/role/showRoles.css') }}">
    <div class="content-margin">
        <div class="form-upper-row">
            <div class="table-title">
                <h4>Roles List</h4>
            </div>

            <div>
                <input type="text" class="form-control" id="searchInput" placeholder="Search here...">
            </div>
            <div>
                <a class="btn btn-md btn-secondary" href="{{route('show-roles')}}">Refresh</a>

            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-primary table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Role Name</th>
                        <th scope="col">Permissions</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="searchResults">
                    <!-- Table rows are initially populated from the server-side rendering -->
                    @foreach ($roles as $role)
                        <tr id="roleRow{{ $role->id }}">
                            <td>{{ $role->name }}</td>
                            @php
                                $permissions=$role->permissions;
                            @endphp
                            <td>
                                
                                @foreach ($permissions as $permission)
                                    <div class="permission">{{$permission->name}}</div>
                                    
                                @endforeach
                            </td>
                            <td>
                                <a href="{{route('edit-role',['id'=>$role->id])}}" class="btn btn-primary">Edit</a>
                                <button class="btn btn-danger" onclick="confirmDelete({{ $role->id }})">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal for delete confirmation -->
    <div class="modal" id="confirmModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <p>Are you sure you want to delete this role?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="cancelBtn">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        // Function to handle live search
        document.getElementById('searchInput').addEventListener('input', function(event) {
            var query = event.target.value;

            axios.get('/search-role', {
                params: {
                    query: query
                }
            })
            .then(function(response) {
                var searchResults = document.getElementById('searchResults');
                searchResults.innerHTML = response.data;
            })
            .catch(function(error) {
                console.log(error);
            });
        });

        // Function to show delete confirmation modal
        function confirmDelete(roleId) {
            var confirmModal = document.getElementById('confirmModal');
            var cancelBtn = document.getElementById('cancelBtn');
            var confirmDeleteBtn = document.getElementById('confirmDeleteBtn');

            confirmDeleteBtn.onclick = function() {
                deleteRole(roleId);
                confirmModal.style.display = 'none';
            };

            confirmModal.style.display = 'block';
        }

        cancelBtn.onclick = function() {
            confirmModal.style.display = 'none';
            };

        // Function to delete the role
        function deleteRole(roleId) {
            axios.delete('/delete-role/' + roleId)
                .then(function(response) {
                    var roleRow = document.getElementById('roleRow' + roleId);
                    roleRow.remove();
                })
                .catch(function(error) {
                    console.log(error);
                });
        }
    </script>
@endsection

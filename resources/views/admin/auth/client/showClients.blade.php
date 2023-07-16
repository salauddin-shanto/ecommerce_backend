@extends('admin/layout/layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/admin/admin/showAdmins.css') }}">
    <div class="content-margin">
        <div class="form-upper-row"> 

            <div class="table-title">
                <h4>Admins List</h4>  
            </div>  
            
            <form action="{{route('search-admin')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md">
                      <input type="text" class="form-control" name="search_field" id="">
                    </div>
                    <div class="col-md">
                        <button type="submit" class="btn btn-success search-btn">Search</button>
                    </div>
                    <div class="col-md">
                        <a href="{{route('show-admins')}}" class="btn btn-success default-btn">Show Default</a>
                    </div> 

                </div> 
            </form>

        </div>

        <div class="table-responsive">
            <table class="table table-primary table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Positions</th>
                        <th scope="col">Phone No.</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody id="searchResults">
                    <!-- Table rows are initially populated from the server-side rendering -->
                    @foreach ($users as $user)
                        <tr id="userRow{{ $user->id }}">
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->user_name }}</td>
                            <td>   
                                @foreach ($user->roles as $role)
                                    <div class="roles">{{$role->name}}</div>                                  
                                @endforeach
                            </td>
                            <td>{{ $user->phone }}</td>
                            <td>
                                <a href="{{route('details-admin',['id'=>$user->id])}}" class="btn btn-success">Details</a>
                                <a href="{{route('edit-admin',['id'=>$user->id])}}" class="btn btn-primary">Edit</a>
                                <a href="{{route('delete-admin',['id'=>$user->id])}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

{{-- 
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        // Function to handle live search
        document.getElementById('searchInput').addEventListener('input', function(event) {
            var query = event.target.value;

            axios.get('/search-admin', {
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
        function confirmDelete(userId) {
            var confirmModal = document.getElementById('confirmModal');
            var cancelBtn = document.getElementById('cancelBtn');
            var confirmDeleteBtn = document.getElementById('confirmDeleteBtn');

            confirmDeleteBtn.onclick = function() {
                deleteuser(userId);
                confirmModal.style.display = 'none';
            };

            confirmModal.style.display = 'block';
        }

        cancelBtn.onclick = function() {
            confirmModal.style.display = 'none';
            };

        // Function to delete the user
        function deleteuser(userId) {
            axios.delete('/delete-user/' + userId)
                .then(function(response) {
                    var userRow = document.getElementById('userRow' + userId);
                    userRow.remove();
                })
                .catch(function(error) {
                    console.log(error);
                });
        }
    </script>
 --}}
@endsection

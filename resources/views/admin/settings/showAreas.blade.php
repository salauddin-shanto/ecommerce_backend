@extends('admin/layout/layout')

@section('content')
    <link rel="stylesheet" href="{{asset('css/admin/settings/showAreas.css')}}">
    <div class="content-margin">
        
        <div class="form-upper-row">
            <div class="table-title">
                <h4>Aria List</h4>
            </div>

            <form action="{{route('show-areas.filter')}}" method="POST" class="form-inline">
                @csrf  
                <div class="row">
                    <div class="col-md">
                            <input type="text" class="form-control" name="search_field" id="" aria-describedby="emailHelpId" placeholder="Mirpur-11">
                    </div>

                    <div class="col-md">
                            <button type="submit" class="search-btn btn btn-primary">Search</button>
                    </div>

                    <div class="col-md">
                            <a href="{{route('show-areas')}}" type="submit" class="default-btn btn btn-success">Make Default</a>
                    </div>
                </div>
            </form>     
        </div>

        <div class="table-responsive">
            <table class="table table-primary table-striped table-hover">
                <thead>
                    <tr> 
                            <th scope="col">Aria Name</th>
                            <th scope="col">Parent Aria</th>
                            <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($arias as $aria)
                            <tr>
                                <td>{{$aria->aria_name}}</td>
                                <td>{{$aria->parent_aria}}</td>
                                <td>
                                    <a href="{{route('area-edit',['aria_id'=>$aria->aria_id])}}" class="btn btn-primary">Edit</a>
                                    <a href="{{route('area-delete',['aria_id'=>$aria->aria_id])}}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                    @endforeach

                        
                </tbody>
            </table>
        </div>
        
    </div>

@endsection
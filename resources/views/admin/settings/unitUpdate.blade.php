@extends('admin/master')
     
@section('content')
    <link rel="stylesheet" href="{{asset('css/unitUpdate.css')}}">
    <div class="content-margin">
        <div class="create-unit"> 
            <div class="form-title">
                <h4>Update Unit</h4>
            </div>  
            
            <form action="{{route('unit-update',['unit_id'=>$unit->unit_id])}}" method="post">
                @csrf
                <div class="unit-form row">
                    <div class="col-md">
                        <label for="" class="form-label">Unit Name</label>
                        <input type="text" class="form-control" name="unit_name" id="unit_name" value="{{$unit->unit_name}}" aria-describedby="textHelpId" placeholder="kg">
                        <span class="text-danger">
                            @error('unit_name')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="col-md">
                        <label for="" class="form-label">Parent Unit</label>
                        <input type="text" class="form-control" name="parent_unit" id="parent_unit" value="{{$unit->parent_unit}}" aria-describedby="textHelpId" placeholder="kg">
                        <span class="text-danger">
                            @error('parent_unit')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="col">
                        <label for="" class="form-label">Description</label>
                        <input type="text" class="form-control" name="description" id="description" value="{{$unit->description}}" aria-describedby="textHelpId" placeholder="optional" >
                    </div>
                    
                    <div>
                        <button type="submit" class="btn btn-primary submit-unit">Submit</button>
                    </div>
                    
                    
                    
                </div>
                
            </form>
        </div>

    
        <div class="show-units">
            <div class="table-title">
                <h4>Unit list</h4>
            </div>
            <div class="table-responsive">
                <table class="table table-primary">
                    <thead>
                        <tr>
                            <th scope="col">Unit Name</th>
                            <th scope="col">Parent Unit</th>
                            <th scope="col">Description</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($units as $unit)
                            <tr class="">
                                <td> {{$unit->unit_name}} </td>
                                <td> {{$unit->parent_unit}} </td>
                                <td> {{$unit->description}} </td>
                                <td>
                                    <a href="{{route('unit-settings.edit',['unit_id'=>$unit->unit_id])}}" class="btn btn-primary">Edit</a>
                                    <a href="{{route('unit-settings.delete',['unit_id'=>$unit->unit_id])}}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach

                        
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
@endsection
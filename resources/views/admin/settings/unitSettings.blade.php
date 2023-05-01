@extends('admin/master')
     
@section('content')
    <link rel="stylesheet" href="{{asset('css/unitSettings.css')}}">
    <div class="content-margin">
        <div class="create-unit">
            <div class="form-title">
                <h4>Create Unit</h4>
            </div> 
             
            <form action="{{url('/')}}/unit-settings" method="post">
                @csrf
                <div class="unit-form row">
                    <div class="col-md">
                        <label for="" class="form-label">Unit Name</label>
                        <input type="text" class="form-control" name="unit_name" id="unit_name" value="{{old('unit_name')}}" aria-describedby="textHelpId" placeholder="kg">
                        <span class="text-danger">
                            @error('unit_name')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="col-md">
                        <label for="" class="form-label">Parent Unit</label>
                        <input type="text" class="form-control" name="parent_unit" id="parent_unit" value="{{old('parent_unit')}}" aria-describedby="textHelpId" placeholder="kg">
                        <span class="text-danger">
                            @error('parent_unit')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="col-md">
                        <label for="" class="form-label">Description</label>
                        <input type="text" class="form-control" name="description" id="description" value="{{old('description')}}" aria-describedby="textHelpId" placeholder="optional" >
                    </div>
                    
                    <div class="col-md">
                        <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                    </div>
                    
                    
                    
                </div>
                
            </form>
        </div>
    
        <div class="divider-line">
        </div>

        <div class="show-units">
            <div class="form-upper-row">
                
                <div class="table-title">
                    <h4>Unit list</h4>
                </div>

                <form action="{{route('unit-settings.filter')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md">
                          <input type="text" class="form-control" name="search_field" id="" placeholder="kg">
                        </div>
                        <div class="col-md">
                            <button type="submit" class="btn btn-primary search-btn">Search</button>
                        </div>
                        <div class="col-md">
                            <a href="{{route('unit-settings')}}" class="btn btn-success default-btn">Make Default</a>
                        </div>
                    </div>
 

                </form>

            </div>

            <div class="table-responsive">
                <table class="table table-primary table-striped table-hover">
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
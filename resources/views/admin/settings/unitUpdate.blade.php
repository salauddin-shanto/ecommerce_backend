@extends('admin/layout/layout') 

@section('content')
    <link rel="stylesheet" href="{{asset('css/admin/settings/unitSettings0.css')}}">
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
                        <select class="form-select form-select-md" name="parent_unit" id="parent_unit">
                            <option value="">{{$unit->parent_unit == '' ? 'Select One' : ''}}</option>
                            @foreach ($units as $unitEle)
                                <option value="{{$unitEle->unit_name}}" {{$unit->parent_unit==$unitEle->unit_name ? 'selected' : ''}}>{{$unitEle->unit_name}}</option>
                            @endforeach
                        </select> 
                    </div>

                    <div class="col-md">
                        <label for="" class="form-label">Description</label>
                        <input type="text" class="form-control" name="description" id="description" value="{{$unit->description}}" aria-describedby="textHelpId" placeholder="optional" >
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
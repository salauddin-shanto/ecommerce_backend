@extends('admin/layout/layout')

@section('content')
     <link rel="stylesheet" href="{{asset('css/admin/settings/addArea.css')}}">
     <div class="content-margin">
          <div class="create-aria">  
               <div class="form-title"> 
                    <h4>Add Area</h4>          
               </div>  
      
               <form action="{{route('add-area')}}" method="post">
                    @csrf
                    <div class="row">
                         <div class="column ">
                           <label for="" class="form-label">Area Name</label>
                           <input type="text" class="form-control" name="aria_name" value="{{old('aria_name')}}" id="aria_name" aria-describedby="emailHelpId" placeholder="London...">
                           <span class="text-danger">
                              @error('aria_name')
                                  {{$message}}
                              @enderror
                           </span>    
                         </div>
     
                         <div class="column ">
                              <label for="" class="form-label">Parent Area</label>
                              <select class="form-select form-select-md" name="parent_aria" id="parent_aria">
                                   <option value="{{old('parent_aria')}}">{{old('parent_aria') ? old("parent_aria"):'Select One'}}</option>
                                   @foreach ($arias as $aria)
                                       <option value="{{$aria->aria_name}}">{{$aria->aria_name}}</option>
                                   @endforeach
                               </select> 
                         </div>

                         <div class="column "> 
                              <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                         </div>
                         
                    </div>
      
     
               </form>
     
     
         </div>
     

 

@endsection
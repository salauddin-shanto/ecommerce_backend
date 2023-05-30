@extends('admin/layout/layout')

@section('content')
     <link rel="stylesheet" href="{{asset('css/admin/settings/addArea.css')}}">
     <div class="content-margin">
          <div class="create-aria"> 
               <div class="form-title">
                    <h4>Update Aria</h4>
               </div>
      
               <form action="{{route('area-update',['aria_id'=>$aria->aria_id])}}" method="post">
                    @csrf     
                    <div class="row">
                         <div class="col-md ">
                           <label for="" class="form-label">Aria Name</label>
                           <input type="text" class="form-control" name="aria_name" value="{{$aria->aria_name}}" id="aria_name" aria-describedby="emailHelpId" placeholder="London">
                           <span class="text-danger">
                              @error('aria_name')
                                  {{$message}}
                              @enderror
                           </span>    
                         </div>
     
                         <div class="col-md ">
                           <label for="" class="form-label">Parent Aria</label>
                           <input type="text" class="form-control" name="parent_aria" value="{{$aria->parent_aria}}" id="parent_aria" aria-describedby="emailHelpId" placeholder="England">    
                         </div>

                         <div>
                              <button type="submit" class="btn btn-primary submit-aria">Submit</button>
                         </div>
                         
                    </div>
     
     
               </form>
     
     
         </div>
     
         
     </div>  

 

@endsection
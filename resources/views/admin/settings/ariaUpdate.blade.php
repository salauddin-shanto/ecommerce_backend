@extends('admin/master')

@section('content')
    <link rel="stylesheet" href="{{asset('css/ariaSettings.css')}}">
     <div class="content-margin">
          <div class="create-aria"> 
               <div class="form-title">
                    <h4>Update Aria</h4>
               </div>
      
               <form action="{{route('aria-settings.update',['aria_id'=>$aria->aria_id])}}" method="post">
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
     
     
         <div class="show-aria">
               <div class="table-title">
                    <h4>Aria List</h4>
               </div>

               <div class="table-responsive">
                    <table class="table table-primary table-striped">
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
                                             <a href="{{route('aria-settings.edit',['aria_id'=>$aria->aria_id])}}" class="btn btn-primary">Edit</a>
                                             <a href="{{route('aria-settings.delete',['aria_id'=>$aria->aria_id])}}" class="btn btn-danger">Delete</a>
                                        </td>
                                   </tr>
                              @endforeach

                               
                         </tbody>
                    </table>
               </div>
               
         </div>
         
     </div>  

 

@endsection
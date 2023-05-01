@extends('admin/master')

@section('content')
    <link rel="stylesheet" href="{{asset('css/ariaSettings.css')}}">
     <div class="content-margin">
          <div class="create-aria">  
               <div class="form-title"> 
                    <h4>Create Aria</h4>          
               </div> 
      
               <form action="{{route('aria-settings')}}" method="post">
                    @csrf
                    <div class="row">
                         <div class="col-md ">
                           <label for="" class="form-label">Aria Name</label>
                           <input type="text" class="form-control" name="aria_name" value="{{old('aria_name')}}" id="aria_name" aria-describedby="emailHelpId" placeholder="London">
                           <span class="text-danger">
                              @error('aria_name')
                                  {{$message}}
                              @enderror
                           </span>    
                         </div>
     
                         <div class="col-md ">
                           <label for="" class="form-label">Parent Aria</label>
                           <input type="text" class="form-control" name="parent_aria" value="{{old('parent_aria')}}" id="parent_aria" aria-describedby="emailHelpId" placeholder="England">    
                         </div>

                         <div class="col-md"> 
                              <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                         </div>
                         
                    </div>
      
     
               </form>
     
     
         </div>
     
          <div class="divider-line">
          </div>

         <div class="show-aria">
               <div class="form-upper-row">
                    <div class="table-title">
                         <h4>Aria List</h4>
                    </div>
 
                    
                    <form action="{{route('aria-settings.filter')}}" method="POST" class="form-inline">
                         @csrf  
                         <div class="row">
                              <div class="col-md">
                                   <input type="text" class="form-control" name="search_field" id="" aria-describedby="emailHelpId" placeholder="Mirpur-11">
                              </div>

                              <div class="col-md">
                                   <button type="submit" class="search-btn btn btn-primary">Search</button>
                              </div>

                              <div class="col-md">
                                   <a href="{{route('aria-settings')}}" type="submit" class="default-btn btn btn-success">Make Default</a>
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
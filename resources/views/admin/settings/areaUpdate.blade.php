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
                         <div class="column ">
                           <label for="" class="form-label">Aria Name</label>
                           <input type="text" class="form-control" name="aria_name" value="{{$aria->aria_name}}" id="aria_name" aria-describedby="emailHelpId" placeholder="London">
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
                                   @foreach ($arias as $ariaEle)
                                       <option value="{{$ariaEle->aria_name}}" {{$ariaEle->aria_name==$aria->parent_aria?'selected': ''}}>{{$ariaEle->aria_name}}</option>
                                   @endforeach
                               </select> 
                         </div>

                         <div>
                              <button type="submit" class="btn btn-primary submit-aria">Submit</button>
                         </div>
                         
                    </div>
     
     
               </form>
     
     
         </div>
     
         
     </div>  

 

@endsection
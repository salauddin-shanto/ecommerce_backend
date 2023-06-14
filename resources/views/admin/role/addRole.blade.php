@extends('admin/layout/layout')

@section('content')
    <link rel="stylesheet" href="{{asset('css/admin/role/addRole.css')}}">
    <div class="content-margin">
        <div class="form-title">
            <h4>Add Role</h4>       
        </div>  

        <div class="add-supplier">
           
            <form action="{{route('add-role')}}" method="POST" class="add-supplier-form" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md ">
                      <label for="" class="form-label">Role Name</label>
                      <input type="text" class="form-control" name="name" value="{{old('name')}}" id="name">
                      <span class="text-danger">
                         @error('name')
                             {{$message}}
                         @enderror
                      </span>     
                    </div>
                </div>
                 
                <h6>Select Permissions</h6><br>
                <h5>
                    <span class="text-danger">
                        @error('permissions')
                            {{$message}}
                        @enderror
                    </span>
                </h5>
 
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="checkAll">
                    <label class="form-check-label" for="">Select All</label>
                </div>
                <hr>

                @foreach ($groups as $group)
                    <div class="row">
                        <div class="col-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="{{$group->group}}" onclick="checkByGroups(this,'{{$group->group}}')">
                                <label class="form-check-label" for="">{{$group->group}}</label>
                            </div>
                        </div>

                        <div class="col-9">
                            @php
                                $permissions=\Spatie\Permission\Models\Permission::where('group','=',$group->group)->get();
                            @endphp

                            @foreach ($permissions as $permission)
                                <div class="form-check {{$group->group}} sameline">
                                    <input class="form-check-input {{$group->group}}" type="checkbox" name="permissions[]" value="{{$permission->name}}" id="permission{{$permission->id}}">
                                    <label class="form-check-label" for="">{{$permission->name}} </label>
                                </div>
                                
                            @endforeach
                        </div>
                    </div>

                    <hr>

                @endforeach 

                <div>
                    <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                </div>
                    
               </div>
 
            </form>
        </div>
    </div>
    

    <script>
        $('#checkAll').click(function(){
            if($(this).is(':checked')){
                $('input[type=checkbox]').prop('checked',true);
            }
            else{
                $('input[type=checkbox]').prop('checked',false);
            }
        })

        function checkByGroups(This,groupElements){
            if($('#'+This.id).is(':checked')){
                $('.'+groupElements+ ' input').prop('checked',true);
            }
            else{
                $('.'+groupElements+ ' input').prop('checked',false);
            }
        }
    </script>
        

@endsection
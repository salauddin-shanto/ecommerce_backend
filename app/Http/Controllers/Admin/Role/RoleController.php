<?php

namespace App\Http\Controllers\Admin\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function add(){
        $permissions=Permission::all();
        $groups=Permission::select('group')->distinct()->get();
        return view('admin/role/addRole',['permissions'=>$permissions,'groups'=>$groups]);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|unique:roles',
            'permissions' => 'required|array',
            'permissions.*' => 'required',

        ]);
        
        $role= Role::create([
            'name'=>$request->input('name')
        ]) ;

        $permissions=Permission::whereIn('name',$request->input('permissions'))->get();

        $role->syncPermissions($permissions);

        return redirect('show-roles');
    }

    public function show(){
        $roles=Role::orderBy('created_at','desc')->get();
        return view('admin/role/showRoles',['roles'=>$roles]);
    }

    public function search(Request $request){
        $query=$request->input('query');
        $roles=Role::where('name','like','%'.$query.'%')
                    ->get();
        return view('admin/role/searchResults',['roles'=>$roles]);
        
    }
    public function destroy(Role $role)
    {
        $role->delete();

        return response()->json(['message' => 'Role deleted successfully']);
    }
    
    public function edit($id){
        $role=Role::find($id);
        $permissions=Permission::all();
        $groups=Permission::select('group')->distinct()->get();
        return view('admin/role/updateRole',['role'=>$role,'permissions'=>$permissions,'groups'=>$groups]);
    }

    public function update($id,Request $request){
        $request->validate([
            'name' => 'required|unique:roles,name,'.$id,
            'permissions' => 'required|array',
            'permissions.*' => 'required',

        ]);
        
        $role=Role::find($id);
        $role->name=$request->input('name');
        $role->save();

        $permissions=Permission::whereIn('name',$request->input('permissions'))->get();

        $role->syncPermissions($permissions);


        return redirect('show-roles');
    }


/* 
    public function delete($rid){
        $role=DB::table('roles')
                ->where('id',$id)
                ->delete();

        return redirect('show-roles');
    } 





 */


}

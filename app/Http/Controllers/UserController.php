<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function add(){
        $roles=Role::all(); 
        return view('admin/admin/addAdmin',['roles'=>$roles]);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'user_name' => 'required|unique:users',
            'phone'=>'required|unique:users',
            'phone2'=>'nullable|unique:users',
            'email'=>'nullable|email|unique:users',
            'nid'=>'required|size:10|unique:users',
            'password'=>'required|string|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/',
            'confirm_password'=>'required|same:password',
            'roles'=>'required|array',
            'roles.*' => 'required',
            'image'=>'required|image|mimes:jpeg,jpg,png|max:3072'

        ]
        ,
        [
            'password.regex' => 'The password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one digit, and one special character.',
            'phone.regex' => 'Invalid Phone Number',
        ]);

        $timeDate=Carbon::now(); 

        $imageName=time().'_User.'.$request->file('image')->getClientOriginalExtension();
        $request->file('image')->storeAs('/images/users',$imageName);

        $user=User::create([
            'name' => $request->input('name'),
            'user_name'=>$request->input('user_name'),
            'phone'=>$request->input('phone'),
            'phone2'=>$request->input('phone2'),
            'email'=>$request->input('email'),
            'password'=>Hash::make($request->input('password')) ,
            'nid'=>$request->input('nid'),
            'image'=>$imageName,
            'create_at'=>$timeDate
            
        ]);
        
        $roles= Role::whereIn('name',$request->input('roles'))->get();

        $user->syncRoles($roles);

        return redirect('show-admins');

        return redirect()->back()->withInput()->withErrors($request->errors());
    }

    public function show(){
        $users=User::with('roles')
                    ->orderBy('created_at','desc')
                    ->get();
        return view('admin/admin/showAdmins',['users'=>$users]);
    }

    public function search(Request $request){
        $users=User::where('name','like','%'.$request['search_field'].'%')
                    ->orWhere('user_name','like','%'.$request['search_field'].'%')
                    ->orWhere('phone','like','%'.$request['search_field'].'%')
                    ->orWhere('nid','like','%'.$request['search_field'].'%')
                    ->get();
        
        return view('admin/admin/showAdmins',['users'=>$users]);
  
    }

    public function delete($id){
        $user=User::find($id);
        $roles=$user->roles;
        $user->roles()->detach($roles);
        $user->delete();
        return redirect()->back();


    }

    public function details($id){
        $user=User::with('roles')->find($id);
        return view('admin/admin/adminDetails',['user'=>$user]);
    }


    public function edit($id){
        $allRoles=Role::all();
        $user=User::with('roles')->find($id);

        return view('admin/admin/updateAdmin',['allRoles'=>$allRoles,'user'=>$user]);
    }

    public function update($id,Request $request){
        $request->validate([
            'name' => 'required',
            'user_name' => 'required|unique:users,user_name,'.$id,
            'phone'=>'required|unique:users,phone,'.$id,
            'phone2'=>'nullable|unique:users,phone2,'.$id,
            'email'=>'nullable|email|unique:users,email,'.$id,
            'password'=>'nullable|string|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/',
            'confirm_password'=>'nullable|same:password',
            'nid'=>'required|size:10|unique:users,nid,'.$id,
            'roles'=>'required|array',
            'roles.*' => 'required',
            'image'=>'nullable|image|mimes:jpeg,jpg,png|max:3072'

        ]
        ,
        [
            'password.regex' => 'The password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one digit, and one special character.',
            'phone.regex' => 'Invalid Phone Number',
        ]
    
    );

        $timeDate=Carbon::now(); 

        $user=User::find($id);
        $user->name=$request->input('name');
        $user->user_name=$request->input('user_name');
        $user->phone=$request->input('phone');
        $user->phone2=$request->input('phone2');
        $user->email=$request->input('email');
        $user->nid=$request->input('nid');
        $user->updated_at=$timeDate;

        if($request->input('password')){            
            $user->password = Hash::make($request->input('password'));
        }

        if($request->file('image')){
            $imageName=time().'_User.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('/images/users',$imageName);
            $user->image=$imageName;
        }

        $user->save();
        
        $roles= Role::whereIn('name',$request->input('roles'))->get();

        $user->syncRoles($roles);

        return redirect('show-admins');

        return redirect()->back()->withInput()->withErrors($request->errors());
    }

/* 
    public function search(Request $request){
        $query=$request->input('query');
        $users=User::where('name','like','%'.$query.'%')
                    ->get();
        return view('admin/admin/searchAdmins',['users'=>$users]);
        
    } */
}

/* 

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



    public function delete($rid){
        $role=DB::table('roles')
                ->where('id',$id)
                ->delete();

        return redirect('show-roles');
    } 





*/

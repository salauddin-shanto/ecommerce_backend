<?php

namespace App\Http\Controllers\Client;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use App\Rules\PhoneNumberCheck;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ClientLoginController extends Controller
{ 
    public function loginForm(){
        if(!Auth::guard('clients')->check()){
            return view('admin/auth/client/clientLoginForm');
        }

        return redirect()->route('profile');
    }

    public function profile(){
        if(Auth::guard('clients')->check()){
            $client=Auth::guard('clients')->user();
            return view('admin/auth/client/clientDetails',['client'=>$client]);
        }

        else{
            return redirect('login');
        }
    }

    public function logout(){
        if(Auth::guard('clients')->check()){
            $client=Auth::guard('clients')->logout();
            return redirect()->route('profile');
        }

        return redirect()->route('login');

    }
    

    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }
 
    public function  handleGoogleCallback(){
        $google_user=Socialite::driver('google')->user();
        $client=Client::where('google_id',$google_user->id)->first();

        if(!$client){ 
            if(!Auth::guard('clients')->check()){
                $client = new Client();
                $client->name = $google_user->name;
                $client->email = $google_user->email;
                $client->google_id = $google_user->id;
                $client->save();

            }
            else{
                $client_previous=Auth::guard('clients')->user();
                $client=Client::find($client_previous->id);
                $client->email=$google_user->email;
                $client->google_id = $google_user->id;
                $client->save();
            }

        } 

        auth()->guard('clients')->login($client);
        return redirect()->route('profile');
    }



    public function edit(Request $request){
        $auth_client=Auth::guard('clients')->user();
        $validated=$request->validate([
            'name'=>'nullable',      
            'phone'=>'nullable|unique:clients,phone,'.$auth_client->id,
            'phone2'=>'nullable|different:phone|unique:clients,phone2,'.$auth_client->id,
            'password'=>'nullable|min:8',
            'confirm_password'=>'same:password',
            'city'=>'nullable',
            'area'=>'nullable',
            'zone'=>'nullable',
            'location'=>'nullable',
            'google_id'=>'nullable',
            'facebook_id'=>'nullable',
/*             
            'bikash'=>'nullable|unique:clients,bikash,'.$client->bikash,
            'nagad'=>'nullable|unique:clients,nagad,'.$client->nagad,
            'rocket'=>'nullable|unique:clients,rocket,'.$client->rocket,
 */
        ],
        [
            'phone2' => 'Phone number and Another phone number must be different'
        ]
    
    );

        $client=Client::find($auth_client->id);
         
        $client->name=$request->input('name');
        $client->phone=$request->input('phone');
        $client->phone2=$request->input('phone2');
        $client->password=$request->input('password');
        $client->city=$request->input('city');
        $client->area=$request->input('area');
        $client->zone=$request->input('zone');
        $client->location=$request->input('location');

        $client->save();

        return redirect()->route('profile');


    }
    


}

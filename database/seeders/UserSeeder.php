<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker=Faker::create();
        $roles=Role::all();

        for($i=0;$i<10;$i++){
            $user=User::create([
                'name'=> $faker->name ,
                'user_name'=>$faker->userName(),
                'phone'=>$faker->unique()->numerify('01#########'),
                'phone2'=>$faker->unique()->numerify('01#########'),
                'email'=>$faker->unique()->safeEmail(),
                'password'=>Hash::make('password'),
                'nid'=> $faker->numerify('##########'),
                'aria'=> $faker->city,
                'address'=> $faker->city,
                'shop_location'=> $faker->city,

                'image'=>'1686302518_User.jpeg',
            ]);
            
            $randomRoles=$roles->random(rand(1,3));
            $user->assignRole($randomRoles);
        }
    }
}

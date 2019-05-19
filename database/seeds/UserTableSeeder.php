<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $role_admin =Role::where('name','Admin')->first();
       $role_user = Role::where('name','user')->first();

       $user = new User();
       $user->name ='user';
       $user->email='user@example.com';
       $user->password = bcrypt('1234');
       $user->save();
       $user->roles()->attach($role_user);
     
	   $user = new User();
       $user->name ='admin';
       $user->email='admin@example.com';
       $user->password = bcrypt('4321');
       $user->save();
       $user->roles()->attach($role_admin);

	}
}

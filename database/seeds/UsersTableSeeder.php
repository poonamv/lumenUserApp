<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name', 'User')->first();
        $role_author = Role::where('name', 'Author')->first();
        $role_admin = Role::where('name', 'Admin')->first();
       
        $user = new User();
        $user->name = 'Raj';
        $user->email = 'raj@gmail.com';
        $user->address = '12 street';
        $user->save();
        $user->roles()->attach($role_user);
        
        $author = new User();
        $author->name = 'Nav';
        $author->email = 'nav@gmail.com';
        $author->address = '13 street';
        $author->save();
        $author->roles()->attach($role_author);
        
        $admin = new User();
        $admin->name = 'Poonam';
        $admin->email = 'poonam@gmail.com';
        $admin->address = '15 street';
        $admin->save();
        $admin->roles()->attach($role_admin);
    }
}

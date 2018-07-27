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
        $role_author = Role::where('name', 'author')->first();
        $role_guest = Role::where('name', 'guest')->first();
        $role_admin = Role::where('name', 'admin')->first();

        $user = new User();
        $user->name = 'Boban Sugareski';
        $user->email = 'bobz@test.com';
        $user->company = "Google";
        $user->password = bcrypt("root");
        $user->save();
        $user->roles()->attach($role_author);

        $user = new User();
        $user->name = "Adam Snow";
        $user->email = "adam@test.com";
        $user->company = "Facebook";
        $user->password = bcrypt("root");
        $user->save();
        $user->roles()->attach($role_guest);

        $user = new User();
        $user->name = "John Doe";
        $user->email = "john@test.com";
        $user->company = "Youtube";
        $user->password = bcrypt("root");
        $user->save();
        $user->roles()->attach($role_admin);
    }
}

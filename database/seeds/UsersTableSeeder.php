<?php

use Illuminate\Database\Seeder;
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
        //
        User::truncate();

        $role_admin     = Role::where('name', 'admin')->first();
        $role_writer    = Role::where('name', 'writer')->first();

        $user = new User;
        $user->name = 'Ernesto';
        $user->email = 'eroman@gmail.com';
        $user->password = bcrypt('eroman');
        $user->save();
        $user->roles()->attach($role_admin);

        $user = new User;
        $user->name = 'Juan';
        $user->email = 'juan@gmail.com';
        $user->password = bcrypt('123');
        $user->save();
        $user->roles()->attach($role_writer);

    }
}

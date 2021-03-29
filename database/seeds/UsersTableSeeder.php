<?php

use Illuminate\Database\Seeder;
use App\User;
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

        $user = new User;
        $user->name = 'Ernesto';
        $user->email = 'eroman@gmail.com';
        $user->password = bcrypt('eroman');
        $user->save();

        $user = new User;
        $user->name = 'Juan';
        $user->email = 'juan@gmail.com';
        $user->password = bcrypt('123');
        $user->save();

    }
}

<?php

use Illuminate\Database\Seeder;
use App\Role;
use Illuminate\Database\Eloquent\Model;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Model::unguard();


        Role::create([
            'name'=>"admin",
            'description'=>"Administrador"
        ]);

        Role::create([
            'name'=>"writer",
            'description'=>"Escritor"
        ]);
    }
}

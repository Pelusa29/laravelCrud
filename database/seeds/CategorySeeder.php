<?php

use Illuminate\Database\Seeder;
use App\Category;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class CategorySeeder extends Seeder
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
        Category::create([
            'name'=>"Categoria 1",
        ]);

        Category::create([
            'name'=>"Categoria 2",
        ]);
        Category::create([
            'name'=>"Categoria 3",
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ]);

    }
}

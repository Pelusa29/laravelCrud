<?php

use Illuminate\Database\Seeder;
use App\Tag;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class TagSeeder extends Seeder
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
        Tag::create([
            'name'=>"Laravel Master",
        ]);

        Tag::create([
            'name'=>"Vue js",
        ]);

        Tag::create([
            'name'=>"JavaScript",
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ]);
    }
}

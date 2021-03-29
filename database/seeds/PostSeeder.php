<?php

use Illuminate\Database\Seeder;
use App\Post;
use Illuminate\Database\Eloquent\Model;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Model::unguard();
        Post::create([
            'title'=>"Mi Primer post",
            'execerpt' => "Contenido Machine",
            'body'=> "Contenido de mi Body",
            'published_at'=> '2021-03-12 12:25:40',
            'category_id'=> 1,
            'user_id'=> 1,
            'created_at'=> '2021-03-12 12:25:40',
            'updated_at'=> '2021-03-12 12:25:40'
        ]);

        Post::create([
            'title'=>"Mi Segundo post",
            'execerpt' => "Contenido Megaupload",
            'body'=> "Contenido parsero para latinoamerica",
            'published_at'=> '2021-03-13 12:25:40',
            'category_id'=> 2,
            'user_id'=> 1,
            'created_at'=> '2021-03-13 12:25:40',
            'updated_at'=> '2021-03-13 12:25:40'
        ]);
        Post::create([
            'title'=>"Mi Tercer post",
            'execerpt' => "Contenido Electronico",
            'body'=> "Contenido de un mundo globalizado",
            'published_at'=> '2021-03-14 12:25:40',
            'category_id'=> 3,
            'user_id'=> 2,
            'created_at'=> '2021-03-14 12:25:40',
            'updated_at'=> '2021-03-14 12:25:40'
        ]);
        Post::create([
            'title'=>"Mi Cuarto post",
            'execerpt' => "Contenido Anime",
            'body'=> "Contenido de un mundo anime",
            'published_at'=> '2021-03-15 11:25:40',
            'category_id'=> 3,
            'user_id'=> 2,
            'created_at'=> '2021-03-15 11:25:40',
            'updated_at'=> '2021-03-15 11:25:40'
        ]);

    }
}

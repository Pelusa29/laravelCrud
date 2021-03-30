<?php

namespace Tests\Feature;

use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function list_posts_retrived(){
        $this->withoutExceptionHandling();
        $this->expectException('Illuminate\Auth\AuthenticationException');

        factory(Post::class,3)->create();

        $response = $this->get('/admin/posts');
        $response->assertOk();

        $posts = Post::all();

        $response->assertViewIs('admin.posts.index');
        $response->assertViewHas('posts',$posts);
    }

    public function testExample()
    {
        $this->withoutExceptionHandling();
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $response = $this->post('/admin/posts',[
            'title' => 'Titulo Testing Unit comando',
            'user_id' => 2
        ]);

        $response->assertOk();
        $this->assertCount(1, Post::all());

        $post = Post::first();

        $this->assertEquals($post->title ,'Titulo Testing Unit comando');

        /*$response = $this->get('/');
        $response->assertStatus(200);*/
    }
}

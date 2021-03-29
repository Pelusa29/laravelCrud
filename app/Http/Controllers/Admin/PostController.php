<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use Carbon\Carbon;

//Request
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
    //
    public function index(){
        //$posts =  Post::all()->sortBy('updated_at');
        $posts = auth()->user()->posts;
        return view('admin.posts.index',compact('posts'));
    }

    /*public function create(){
        $categories = Category::all();
        $tags       = Tag::all();
        return view('admin.posts.create',compact('tags','categories'));
    }*/

    public function store(Request $request){

        $this->validate($request,
        [
            'postTitulo' => 'required'
        ]);

        $post = new Post;
        $post->title  = $request->get('postTitulo');
        $post->user_id = auth()->id();
        if($post->save()){
            return redirect()->route('admin.posts.edit',compact('post'));
        }else{
            dd('no paso');
        }
    }

    public function edit(Post $post){

        //Aplicamos Policy (Administración d evisualización)
        $this->authorize('view',$post);

        $categories = Category::all();
        $tags       = Tag::all();
        return view('admin.posts.edit',compact('tags','categories','post'));
    }

    public function update(Post $post, StorePostRequest $request){

        //return $request->all();

        //dd($request->all());

        $post->title        = $request->get('postTitulo');
        $post->body         = $request->get('postBody');
        $post->execerpt     = $request->get('postExtracto');
        $post->published_at = $request->get('postFecha') ? Carbon::parse($request->get('postFecha')) : null;
        $post->category_id  = $request->get('postSelectCategoria');
        //Save post
        if($post->save()){
            //Relacion etiquetas
            $post->tags()->sync($request->get('postTags'));

            //alert
            $notification =array(
                'message' => 'Tu Publicacion ha sido guardada',
                'alert-type' => 'success'
            );
        }else{
            $notification =array(
                'message' => 'Error al generar Post',
                'alert-type' => 'error'
            );
        }

        return back()->with($notification);
    }
}

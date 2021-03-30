<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Post;
use App\Photo;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
    //
    public function store(Post $post){
        $photo = request()->file('photo')->store('public');

        //almacenar en Servidor
        //$urlDir = Storage::url($photo);
        //guardar
        Photo::create([
            'url'=> Storage::url($photo),
            'post_id'=> $post->id
        ]);
    }

    public function guardarPhoto(User $user){

        $photo = request()->file('photo')->store('public');
        //Update avatarImage
        $user->avatar = Storage::url($photo);
        if($user->save()){
            $extension = "mifoto";
            $imageName = time() . '.' . $extension;
            return response()->json(['success' => $imageName]);
        }else{

        }
        //return request();
    }
}

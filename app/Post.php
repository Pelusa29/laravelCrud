<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    //Configuramos para que laravel tome la fecha de publicacion como instancia  de Carbon
    protected $dates = ['published_at'];

    //Creamos el metodo para la categoria
    public function category(){

        return $this->belongsTo(Category::class);
    }
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    //Relacion de uno a Muchos (un post puede tener varias fotos)
    public function photos(){
        return $this->hasMany(Photo::class);
    }

    //queryScopes
    public function scopePublished($query){
        $query->whereNotNull('published_at')
        ->latest('published_at');
    }
}

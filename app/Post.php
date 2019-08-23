<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['titulo','descripcion','contenido','foto','user_id'];

    public function categorias(){
        return $this->belongsToMany('App\Categoria');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}


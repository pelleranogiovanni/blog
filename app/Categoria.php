<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = ['nombre'];

    public function posts(){
        return $this->belongsToMany('App\Post');
    }
}

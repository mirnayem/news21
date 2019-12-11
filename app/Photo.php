<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $uploads = '/images/';
    protected $fillable = ['image'];


    public function getImageAttribute($photo)
    {

        return $this->uploads . $photo;
    }


    public function post()
    {

        return $this->belongsTo('App\Post');
    }
}

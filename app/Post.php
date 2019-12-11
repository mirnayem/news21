<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['category_id', 'title', 'body', 'is_relevant', 'is_breaking', 'is_editor'];



    public function user()
    {

        return $this->belongsTo('App\User');
    }



    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function tags()
    {

        return $this->belongsToMany('App\Tag');
    }


    public static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $post->user_id = auth()->user()->id;
        });
    }


    public function images()
    {
        return $this->hasMany('App\PostImage');
    }

    public function scopeFilter($query, $filters)
    {

        if (isset($filters['month'])) {
            $query->whereMonth('created_at', Carbon::parse($filters['month'])->month);
        }

        if (isset($filters['year'])) {
            $query->whereYear('created_at', $filters['year']);
        }
    }
}

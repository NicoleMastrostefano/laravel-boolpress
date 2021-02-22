<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
      'title',
      'slug',
      'subtitle',
      'text',
      'author',
      'publication_date'
    ];

    // relazioni
    public function infoPost(){
      return $this->hasOne('App\InfoPost');
    }

    public function comments(){
      return $this->hasMany('App\Comment');
    }

    public function tags(){
      return $this->belongToMany('App\Tag');
    }
}

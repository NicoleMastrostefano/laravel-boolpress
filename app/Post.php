<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
      'title',
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
}

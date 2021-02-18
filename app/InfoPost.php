<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoPost extends Model
{
    // notazione per eliminare un campo di default
    // public $timestamps = false;

    // relazioni
    public function post(){
      return $this->belongTo('App\Post');
    }
    
}

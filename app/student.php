<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    protected $guarded = [];

    public  function department(){
      return $this->belongsTo('App\department');
    }
    public  function semester(){
        return $this->belongsTo('App\semester');
    }

}

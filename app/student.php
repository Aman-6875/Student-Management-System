<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    protected $fillable = [
        'name','phone','email','roll','reg_id','department_id','semester_id','father_name','mother_name','present_address','permanent_address',
    ];
    public  function department(){
      return $this->belongsTo('App\department');
    }
    public  function semester(){
        return $this->belongsTo('App\semester');
    }

}

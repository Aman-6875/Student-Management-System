<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class studentAttendence extends Model
{

    protected $fillable = [
         'reg_id','date'
    ];
}

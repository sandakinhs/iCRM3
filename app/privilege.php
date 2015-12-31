<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class privilege extends Model
{
    protected $fillable = array('group_id','call_log','contact','account','user','group','sales','ticket');
}

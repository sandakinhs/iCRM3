<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_group extends Model
{
    protected $table = 'user_group';

    protected $fillable = array('user_id','group_id','call_log','contact','account','user','group','sales','ticket');
}

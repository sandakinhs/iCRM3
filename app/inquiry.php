<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class inquiry extends Model
{

    protected $table = 'inquiry';

    protected $fillable = array('call_log_id', 'subject', 'body','status','inquiry_end_time');

}

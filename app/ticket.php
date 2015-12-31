<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ticket extends Model
{
    protected $table = 'ticket';

    protected $fillable = array('category', 'priority', 'account', 'contact_id', 'owner','created_time','subject', 'problem','status','call_log_id','group_id','assignedto','modified_by','deleted');
}

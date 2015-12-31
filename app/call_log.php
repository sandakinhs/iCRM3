<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class call_log extends Model
{
    protected $table = 'call_log';

    protected $fillable = array('cli', 'call_owner', 'call_created_time', 'call_description', 'call_status', 'contact_id', 'assignedto', 'call_type','group_id', 'remark_subject', 'remark_body','deleted','call_modified_by');
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class status_history extends Model
{
    protected $table = 'status_history';

    protected $fillable = array('sales_id', 'new_status', 'old_status','changed_by');
}

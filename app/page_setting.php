<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class page_setting extends Model
{
    protected $fillable = array('column_name', 'tablename', 'status');
}

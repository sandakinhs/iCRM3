<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class group extends Model
{
    protected $primaryKey = 'group_id';

    protected $fillable = array('group_name','group_owner','group_modified_by','group_description','deleted');
}

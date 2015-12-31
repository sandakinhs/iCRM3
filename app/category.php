<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table = 'category';

    protected $fillable = array('name', 'description', 'owner', 'created_time', 'modified_by', 'modified_time', 'level','main_id','deleted');
}

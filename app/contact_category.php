<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contact_category extends Model
{
    protected $table = 'contact_category';

    protected $fillable = array('name', 'description', 'owner','created_time','modified_by','deleted');
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    protected $table = 'item';

    protected $fillable = array('name', 'code', 'description', 'owner', 'created_time','modified_by','modified_time','category', 'uof', 'unit_price', 'tax_code','deleted');

}

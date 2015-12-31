<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tax extends Model
{
    protected $table = 'tax';

    protected $fillable = array( 'code', 'name', 'description', 'owner', 'created_time', 'modified_by', 'modified_time', 'tax_code','deleted');

}

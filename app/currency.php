<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class currency extends Model
{
    protected $table = 'currency';

    protected $fillable = array('currency','description','status');
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ticket_category extends Model
{
    protected $table = 'ticket_category';

    protected $fillable = array('category', 'description', 'owner');
}

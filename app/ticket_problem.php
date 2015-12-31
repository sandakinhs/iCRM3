<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ticket_problem extends Model
{
    protected $table = 'ticket_problem';

    protected $fillable = array('ticket_id', 'problem','owner');
}

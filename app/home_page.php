<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class home_page extends Model
{
    protected $table = 'home_page';

    protected $fillable = array('graph_1','graph_2','graph_3','graph_4','graph_5','graph_6');
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use DB;

class Main extends Controller
{
    public function location($loc){

      if($loc == "home") {

          $graphs = new Graphs();

          $sql = $graphs->last_activities();

          $sql2 = $graphs->last_pendingactivities();

          $sql3 = DB::select(DB::raw("SELECT * FROM `home_page`"));

          return View::make('home.home_', compact('sql', 'sql2', 'sql3', 'loc'));


      }
    }
}

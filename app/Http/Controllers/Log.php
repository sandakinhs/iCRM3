<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use View;

class Log extends Controller
{
    public function add_log($table,$field_id,$action)
    {

        if(isset($_SESSION['user_id'])){
            $loguser=$_SESSION['user_id'];
        }else{
            $loguser="0";
        }

        //$sql="INSERT INTO `crm_log`(`user`, `table`,`field_id`,`action`, `time`) VALUES ('$loguser','$table','$field_id','$action',SYSDATE() )";

        //sql query
        DB::table('crm_log')->insert([
            ['user' => $loguser, 'table' => $table , 'field_id'=> $field_id , 'action' => $action , 'time' => DATE('Y-m-d H:i:s') ]
        ]);
        //sql query end


    }


    function view_log()
    {

        $sql = "SELECT crm_log.*, users.user_name FROM crm_log
 	                                       LEFT OUTER JOIN users ON users.id = crm_log.user ORDER BY crm_log.id DESC LIMIT 50" ;
        $result = DB::select(DB::raw($sql));

        return($result);

    }

    function index()
    {
        session_start();
        $_SESSION['loc'] = "admin";

        $log_details = $this->view_log();

       return View::make('crm_log',compact('log_details'));


    }

}

<?php

namespace App\Http\Controllers\functions;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App;

class pagesettings extends Controller
{
    function addnew($column_name,$tablename,$status)
    {
       // $sql = "INSERT INTO `crm_db`.`page_settings` (`column_name`, `tablename`, `status`) VALUES ('$column_name', '$tablename', '$status')";
        $data = ['column_name'=>$column_name , 'tablename' =>$tablename , 'status'=> $status ];
        App\page_setting::create($data);

        return(1);
    }

    function truncate()
    {
        $ob1 = new connect;
        $sql="TRUNCATE TABLE `page_settings`";
        mysqli_query($ob1->dbcon(), $sql) or trigger_error("SQL", E_USER_ERROR);
    }

    function delete($tablename)
    {
        App\page_setting::where('tablename',$tablename)->delete();
    }

    function check($column_name,$tablename)
    {

        $settings_check = App\page_setting::where('column_name',$column_name)->where('tablename',$tablename)->count();

        if($settings_check > 0)
        {
            return(1);
        }else
        {
            return(0);
        }
    }

     function fname($tablename,$status){

         //sql query
         $result = DB::table('page_settings')
             ->select('*')
             ->where('tablename', $tablename)
             ->where('status',$status)
             ->get();
         //sql query end

        return($result);
    }

    function rows($tablename){

        $ob1 = new connect;
        $sql = mysqli_query($ob1->dbcon(),"SELECT * FROM `page_settings` WHERE `tablename`='$tablename' AND status = '0' ");
        $row = mysqli_fetch_assoc($sql);
        return($row['column_name']);
    }

    function viewcolumns($tablename)
    {

        //sql query
        $result = DB::select(DB::raw("SELECT column_name, column_comment FROM information_schema.columns WHERE table_name = '$tablename' AND table_schema = 'crm_db' "));
        //sql query end
        return($result);
    }


    function viewcolumncomment($field,$tablename)
    {
         $result = DB::select(DB::raw("SELECT column_name, column_comment FROM information_schema.columns WHERE table_name = '$tablename' AND table_schema = 'crm_db' AND column_name = '$field' "));
         return($result);
    }

    function countrows($tablename)
    {
        $ob1 = new connect;
        $ids = join(',',$_SESSION['user_groups']);

        $sql = mysqli_query($ob1->dbcon(),"SELECT COUNT(id) AS `count` FROM `$tablename` WHERE `deleted` = '0' AND `group` IN ($ids)");  //  this use for users

        if($_SESSION['user_type']=='1'){
            $sql = mysqli_query($ob1->dbcon(),"SELECT COUNT(id) AS `count` FROM `$tablename` WHERE `deleted` = '0'");  // this use for admin
        }

        $row = mysqli_fetch_assoc($sql);

        return($row['count']);
    }

    function viewdatalimit($limit,$offset,$tablename)
    {
        $ob1 = new connect;
        $sql = mysqli_query($ob1->dbcon(),"SELECT * FROM `$tablename` WHERE `deleted` = '0' ORDER BY `id` DESC LIMIT $limit OFFSET $offset ");
        return($sql);

    }

    function countrows1($tablename,$field,$value)
    {
        $ob1 = new connect;
        $ids = join(',',$_SESSION['user_groups']);



        $sql = mysqli_query($ob1->dbcon(),"SELECT COUNT(id) AS `count` FROM `$tablename` WHERE `deleted` = '0' AND `$field`='$value' AND `group` IN ($ids)");  //  this use for users

        if($_SESSION['user_type']=='1'){
            $sql = mysqli_query($ob1->dbcon(),"SELECT COUNT(id) AS `count` FROM `$tablename` WHERE `deleted` = '0' AND `$field`='$value' ");  // this use for admin
        }

        $row = mysqli_fetch_assoc($sql);

        return($row['count']);
    }

}

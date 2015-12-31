<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use View;
use App;

class check_privileges
{

    function view_prvilege($group,$table,$assignto)
    {
        if($_SESSION['user_type'] == 1){

            return("1");
        }

        if($_SESSION['_'.$group][$table]>0){

            return("1");

        }elseif ($assignto == $_SESSION['user_id']) {
            # code...
            return("1");
        }else{

            return("0");
        }
    }


    function edit_privilege($group,$table,$assignto)
    {

        if($_SESSION['user_type'] == 1){

            return("1");
        }

        if($_SESSION['_'.$group][$table]==2 || $_SESSION['_'.$group][$table]==3 || $_SESSION['_'.$group][$table]==6 || $_SESSION['_'.$group][$table]==7 ){

            return("1");

        }elseif ($assignto == $_SESSION['user_id']) {

            return("1");
        }else{

            return("0");
        }
    }


    function delete_privilege($group,$table,$assignto)
    {

        if($_SESSION['user_type'] == 1){

            return("1");
        }

        if($_SESSION['_'.$group][$table]%2==1){

            return("1");

            // }elseif ($assignto == $_SESSION['user_id']) {

            // return("1");

        }else{

            return("0");
        }
    }

    function add_privilege($table)
    {

        if($_SESSION['user_type'] == 1){

            return("1");
        }

        foreach ($_SESSION['user_groups'] as $key => $group) {

            if($_SESSION['_'.$group][$table]>3 && $_SESSION['_'.$group][$table]<8){
                return("1");
            }
        }
    }

    function edit_privilege_one($table,$id)
    {


        if($_SESSION['user_type'] == 1){

            return("1");
        }

        $ob1 = new connect;

        if($table=="users"){


            $sql=mysqli_query($ob1->dbcon(),"SELECT * FROM `$table` WHERE  `user_id` = '$id'");

        }else{


            $sql=mysqli_query($ob1->dbcon(),"SELECT * FROM `$table` WHERE  `id` = '$id'");

        }



        if($row = mysqli_fetch_array($sql))
        {

            if($table!="accounts"){                               //check if this assigned to this user
                if ($row['assignedto']==$_SESSION['user_id']) {
                    return("1");
                }
            }



            if($_SESSION['_'.$row['group']][$table]==2 || $_SESSION['_'.$row['group']][$table]==3 || $_SESSION['_'.$row['group']][$table]==6 || $_SESSION['_'.$row['group']][$table]==7 ){

                return("1");

            }else{

                return("0");
            }


        }
    }


}


?>
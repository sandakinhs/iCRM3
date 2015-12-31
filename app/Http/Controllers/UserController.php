<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class UserController extends Controller
{
    function adduser($username,$password,$user_firstname,$user_lastname,$user_email,$user_mobile,$user_is_admin,$user_status)
    {
        $ob1 = new connect;
        $conn = $ob1->dbcon();
        $sql1 = mysqli_query($conn,"SELECT `user_id` FROM `users` WHERE `user_name`='$username'");
        if($re=mysqli_fetch_assoc($sql1))
        {
            return(0);
        }else{


            $loguser=$_SESSION['user_id'];
            $sql = "INSERT INTO `users`(`user_id`, `user_name`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_mobile`, `user_owner`, `user_created_time`, `user_modified_by`, `user_modified_time`, `user_is_admin`, `user_status`, `deleted`) VALUES (NULL,'$username','$password','$user_firstname','$user_lastname','$user_email','$user_mobile','$loguser',SYSDATE(),NUll,NUll,'$user_is_admin','$user_status','0')";
            mysqli_query($conn, $sql) or trigger_error("SQL", E_USER_ERROR);
            $userid = mysqli_insert_id($conn);

            $log = new crm_log;
            $log->add_log("users",$userid,"insert"); // add a log


            // foreach ($_POST['user_group'] as $groupid ){
            //                // echo $groupid."\n";
            //            $sql2 = mysqli_query($conn,"SELECT * FROM `privileges` WHERE `group_id`='$groupid'");
            //            $re2=mysqli_fetch_assoc($sql2);

            //            echo $re2['call_log']."\n";

            //            $sql3="INSERT INTO `user_group`(`user_id`,`group_id`,`call_log`,`contact`,`account`,`user`,`group`) VALUES ('$userid','$groupid','$re2[call_log]','$re2[contact]','$re2[account]','$re2[user]','$re2[group]') ";
            //            mysqli_query($conn, $sql3) or trigger_error("SQL", E_USER_ERROR);

            //            }

            foreach ($_SESSION['groups'] as $group_name){
                // echo $group_name."\n";

                $sql3 = mysqli_query($conn,"SELECT `group_id` FROM `groups` WHERE `group_name`='$group_name'");    //get group id
                $re3=mysqli_fetch_assoc($sql3);

                $sql2 = mysqli_query($conn,"SELECT * FROM `privileges` WHERE `group_id`='$re3[group_id]'");      // get group default privileges
                $re2=mysqli_fetch_assoc($sql2);

                $sql3="INSERT INTO `user_group`(`user_id`,`group_id`,`call_log`,`contact`,`account`,`user`,`group`,`sales`,`ticket`) VALUES ('$userid','$re3[group_id]','$re2[call_log]','$re2[contact]','$re2[account]','$re2[user]','$re2[group]','$re2[sales]','$re2[ticket]') ";    // add detials to user_group table
                mysqli_query($conn, $sql3) or trigger_error("SQL", E_USER_ERROR);


            }


            return(1);
        }
    }


    function viewuser()
    {
        $ob1 = new connect;
        $conn=$ob1->dbcon();
        // $sql = "SELECT users.*, groups.group_name FROM users INNER JOIN groups ON users.user_group = groups.group_id WHERE users.deleted ='0' ";

        if($_SESSION['user_type']!='1'){
            // $sql = "SELECT users.* FROM users LEFT OUTER JOIN user_group  ON users.user_id = user_group.user_id WHERE users.deleted='0' AND users.user_is_admin <> '1' AND users.user_is_admin <> '2' ";

            $sql="SELECT users.*, owner.user_name AS owner, modi.user_name AS modify FROM users
			LEFT OUTER JOIN user_group ON users.user_id = user_group.user_id
			INNER JOIN users AS owner ON users.user_owner = owner.user_id
			LEFT OUTER JOIN users AS modi ON users.user_modified_by = modi.user_id
					 WHERE users.deleted='0' AND users.user_is_admin <> '1' AND users.user_is_admin <> '2'"	;

            $sql1 = mysqli_query($conn," SELECT `group_id` FROM `user_group` WHERE `user_id` = '$_SESSION[user_id]' AND `user` > '1' ");

            while ($row = mysqli_fetch_array($sql1)) {
                $groups[] = $row['group_id'];
            }

            if(isset($groups)){     // check if user have user view privilages
                $ids = join(',', $groups); // user groups
                $sql .= "AND user_group.group_id IN ($ids) GROUP BY users.user_id";
            }else{
                $sql .= "AND user_group.group_id IN ('0')"; // reslut to desplay
            }

        }elseif ($_SESSION['user_type']=='1') {
            // $sql="SELECT users.* FROM users WHERE deleted = '0'";

            $sql="SELECT users.*, owner.user_name AS owner, modi.user_name AS modify FROM users
			LEFT OUTER JOIN user_group ON users.user_id = user_group.user_id
			INNER JOIN users AS owner ON users.user_owner = owner.user_id
			LEFT OUTER JOIN users AS modi ON users.user_modified_by = modi.user_id
					 WHERE users.deleted='0' GROUP BY users.user_id";
        }




        // if($_SESSION['user_type']!='1'){
        // $sql .= "AND user_is_admin <> '1' AND user_is_admin <> '2' ";
        // }

        // echo  $sql;
        return( mysqli_query($conn,$sql) );
    }


    function viewoneuser($uid)
    {
        $ob1 = new connect;
        $sql = mysqli_query($ob1->dbcon(),"SELECT * FROM `users` WHERE `user_id`='$uid' ");
        return($sql);
    }

    function edituser($uid,$user_firstname,$user_lastname,$user_email,$user_mobile,$user_is_admin,$user_status,$user_group)
    {

        $loguser=$_SESSION['user_id'];
        $ob1 = new connect;
        $conn = $ob1->dbcon();

        $sql = "UPDATE `users` SET `user_firstname` = '$user_firstname',`user_lastname` = '$user_lastname',`user_email` = '$user_email',`user_mobile` = '$user_mobile',`user_is_admin` = '$user_is_admin',`user_status` = '$user_status', `user_modified_by`='$loguser', `user_modified_time`=SYSDATE() WHERE `user_id` = '$uid' ";
        mysqli_query($conn, $sql) or trigger_error("SQL", E_USER_ERROR);

        $log = new crm_log;
        $log->add_log("users",$uid,"update"); // add a log

        // $sql4 = "DELETE FROM `user_group` WHERE `user_id` = '$uid' ";
        // mysqli_query($conn, $sql4) or trigger_error("SQL", E_USER_ERROR);






        foreach ($_SESSION['groups'] as $group_name){
            // echo $group_name."\n";

            $sql3 = mysqli_query($conn,"SELECT `group_id` FROM `groups` WHERE `group_name`='$group_name'");    //get group id
            $re3=mysqli_fetch_assoc($sql3);

            $group_ids[]=$re3['group_id'];

            $sql5=mysqli_query($conn,"SELECT * FROM `user_group` WHERE `group_id`='$re3[group_id]' AND `user_id` = '$uid' ");    //check user is in this group
            if($re5=mysqli_fetch_assoc($sql5)){

                // nothing

            }else{

                $sql2 = mysqli_query($conn,"SELECT * FROM `privileges` WHERE `group_id`='$re3[group_id]'");      // get group default privileges
                $re2=mysqli_fetch_assoc($sql2);

                $sql3="INSERT INTO `user_group`(`user_id`,`group_id`,`call_log`,`contact`,`account`,`user`,`group`,`sales`,`ticket`) VALUES ('$uid','$re3[group_id]','$re2[call_log]','$re2[contact]','$re2[account]','$re2[user]','$re2[group]','$re2[sales]','$re2[ticket]') ";    // add detials to user_group table
                mysqli_query($conn, $sql3) or trigger_error("SQL", E_USER_ERROR);

            }

        }

        $ids = join(',',$group_ids);
        $sql4 = "DELETE FROM `user_group` WHERE `user_id` = '$uid' AND `group_id` NOT IN ($ids)";   // delete other groups not in the array
        mysqli_query($conn, $sql4) or trigger_error("SQL", E_USER_ERROR);

    }

    function deleteuser($uid)
    {
        $loguser=$_SESSION['login_user'];
        $ob1 = new connect;
        $sql = "UPDATE `users` SET `user_modified_by`='$loguser', `user_modified_time`=SYSDATE(),`deleted` = '1' WHERE `user_id` = '$uid' ";
        mysqli_query($ob1->dbcon(), $sql) or trigger_error("SQL", E_USER_ERROR);

        $log = new crm_log;
        $log->add_log("users",$uid,"delete"); // add a log

    }

    function changepassword($old_password,$password)
    {
        $loguser=$_SESSION['user_id'];
        $ob1 = new connect;

        $sql="SELECT * FROM `users` WHERE `user_id`= '$loguser' AND `user_password` = '$old_password'";
        // echo $sql;
        $sql=mysqli_query($ob1->dbcon(), $sql);
        if(mysqli_fetch_assoc($sql)){   //check old password

            $sql1 = "UPDATE `users` SET `user_password`='$password' WHERE `user_id` = '$loguser' ";
            mysqli_query($ob1->dbcon(), $sql1) or trigger_error("SQL", E_USER_ERROR);

            $log = new crm_log;
            $log->add_log("users",$loguser,"password changed"); // add a log

            return "1";
        }else{
            return "0";
        }

    }


    function usergroup($udi){
        $ob1 = new connect;
        $sql="SELECT groups.group_name,user_group.id FROM groups INNER JOIN user_group ON groups.group_id=user_group.group_id WHERE user_group.user_id='$udi'";
        return( mysqli_query($ob1->dbcon(),$sql) );
    }


    function user_privilage($pri){            // to check peivilages using privilage id
        $ob1 = new connect;
        $sql="SELECT * FROM user_group WHERE id='$pri' ";
        return( mysqli_query($ob1->dbcon(),$sql) );
    }

    function user_privilages($gid){                      //use to check login user privilages for the group

        //sql query
        $query = DB::table('user_group')
            ->select('*')
            ->where('user_id', $_SESSION['user_id'])
            ->where('group_id',$gid)
            ->get();
        //sql query end

       return $query;

    }


}

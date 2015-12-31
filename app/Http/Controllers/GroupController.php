<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class GroupController extends Controller
{
    function addgroup($group_name,$group_description)
    {
        $ob1 = new connect;
        $conn=$ob1->dbcon();
        $loguser=$_SESSION['user_id'];
        $sql = "INSERT INTO `groups` VALUES (NULL,'$group_name','$loguser',SYSDATE(),NUll,NUll,'$group_description','0')";
        mysqli_query($conn, $sql) or trigger_error("SQL", E_USER_ERROR);
        $group_id = mysqli_insert_id($conn); // get id of last insert query

        $log = new crm_log;
        $log->add_log("groups",$group_id,"insert"); // add a log

        // add = 4
        // edit = 2
        // delete = 1
        // view only = 8

        $calllog=NULL;
        if(isset($_POST['calllog_view'])){

            if(isset($_POST['calllog_add'])){
                $calllog=$calllog+$_POST['calllog_add'];
            }
            if(isset($_POST['calllog_edit'])){
                $calllog=$calllog+$_POST['calllog_edit'];
            }
            if(isset($_POST['calllog_delete'])){
                $calllog=$calllog+$_POST['calllog_delete'];
            }
            if($calllog==NULL){
                $calllog=8;
            }
        }

        $contact=NULL;
        if(isset($_POST['contact_view'])){

            if(isset($_POST['contact_add'])){
                $contact=$contact+$_POST['contact_add'];
            }
            if(isset($_POST['contact_edit'])){
                $contact=$contact+$_POST['contact_edit'];
            }
            if(isset($_POST['contact_delete'])){
                $contact=$contact+$_POST['contact_delete'];
            }
            if($contact==NULL){
                $contact=8;
            }
        }


        $account=NULL;
        if(isset($_POST['account_view'])){

            if(isset($_POST['account_add'])){
                $account=$account+$_POST['account_add'];
            }
            if(isset($_POST['account_edit'])){
                $account=$account+$_POST['account_edit'];
            }
            if(isset($_POST['account_delete'])){
                $account=$account+$_POST['account_delete'];
            }
            if($account==NULL){
                $account=8;
            }
        }

        $sales=NULL;
        if(isset($_POST['sales_view'])){

            if(isset($_POST['sales_add'])){
                $sales=$sales+$_POST['sales_add'];
            }
            if(isset($_POST['sales_edit'])){
                $sales=$sales+$_POST['sales_edit'];
            }
            if(isset($_POST['sales_delete'])){
                $sales=$sales+$_POST['sales_delete'];
            }
            if($sales==NULL){
                $sales=8;
            }
        }

        $user=NULL;
        if(isset($_POST['user_view'])){

            if(isset($_POST['user_add'])){
                $user=$user+$_POST['user_add'];
            }
            if(isset($_POST['user_edit'])){
                $user=$user+$_POST['user_edit'];
            }
            if(isset($_POST['user_delete'])){
                $user=$user+$_POST['user_delete'];
            }
            if($user==NULL){
                $user=8;
            }
        }

        $ticket=NULL;
        if(isset($_POST['ticket_view'])){

            if(isset($_POST['ticket_add'])){
                $ticket=$ticket+$_POST['ticket_add'];
            }
            if(isset($_POST['ticket_edit'])){
                $ticket=$ticket+$_POST['ticket_edit'];
            }
            if(isset($_POST['ticket_delete'])){
                $ticket=$ticket+$_POST['ticket_delete'];
            }
            if($ticket==NULL){
                $ticket=8;
            }
        }

        $group=NULL;
        // if(isset($_POST['group_view'])){

        // 	if(isset($_POST['group_add'])){
        // 	$group=$group+$_POST['group_add'];
        // 	}
        // 	if(isset($_POST['group_edit'])){
        // 	$group=$group+$_POST['group_edit'];
        // 	}
        // 	if(isset($_POST['group_delete'])){
        // 	$group=$group+$_POST['group_delete'];
        // 	}
        // 	if($group==NULL){
        //  	$group=8;
        //  	}
        // }


        $sql = "INSERT INTO `privileges`(`id`,`group_id`,`call_log`,`contact`,`account`,`user`,`group`,`sales`,`ticket`) VALUES (NULL,'$group_id','$calllog','$contact','$account','$user','$group','$sales','$ticket')";
        mysqli_query($conn, $sql) or trigger_error("SQL", E_USER_ERROR);


    }

    function viewgroup()
    {
        $ob1 = new connect;
        $sql = mysqli_query($ob1->dbcon(),"SELECT groups.* , owner.user_name AS owner , modi.user_name AS modi  FROM groups
												INNER JOIN users AS owner ON owner.user_id = groups.group_owner
												LEFT OUTER JOIN users AS modi ON modi.user_id = groups.group_modified_by
																											WHERE groups.deleted ='0' ");
        return($sql);
    }

    function viewonegroup($gid)
    {
        $ob1 = new connect;
        $sql = mysqli_query($ob1->dbcon(),"SELECT groups.*, privileges.* FROM groups INNER JOIN privileges ON groups.group_id=privileges.group_id WHERE groups.group_id='$gid'  ");
        return($sql);
    }

    function editgroup($gid,$group_name,$group_description)
    {

        $loguser=$_SESSION['user_id'];
        $ob1 = new connect;

        $sql = "UPDATE `groups` SET `group_name` = '$group_name', `group_modified_by`='$loguser', `group_modified_time`=SYSDATE(), `group_description`='$group_description' WHERE `group_id` = '$gid' ";
        // echo $sql;
        mysqli_query($ob1->dbcon(), $sql) or trigger_error("SQL", E_USER_ERROR);

        $log = new crm_log;
        $log->add_log("groups",$gid,"update"); // add a log


        $calllog=NULL;
        if(isset($_POST['calllog_view'])){

            if(isset($_POST['calllog_add'])){
                $calllog=$calllog+$_POST['calllog_add'];
            }
            if(isset($_POST['calllog_edit'])){
                $calllog=$calllog+$_POST['calllog_edit'];
            }
            if(isset($_POST['calllog_delete'])){
                $calllog=$calllog+$_POST['calllog_delete'];
            }
            if($calllog==NULL){
                $calllog=8;
            }
        }

        $contact=NULL;
        if(isset($_POST['contact_view'])){

            if(isset($_POST['contact_add'])){
                $contact=$contact+$_POST['contact_add'];
            }
            if(isset($_POST['contact_edit'])){
                $contact=$contact+$_POST['contact_edit'];
            }
            if(isset($_POST['contact_delete'])){
                $contact=$contact+$_POST['contact_delete'];
            }
            if($contact==NULL){
                $contact=8;
            }
        }


        $account=NULL;
        if(isset($_POST['account_view'])){

            if(isset($_POST['account_add'])){
                $account=$account+$_POST['account_add'];
            }
            if(isset($_POST['account_edit'])){
                $account=$account+$_POST['account_edit'];
            }
            if(isset($_POST['account_delete'])){
                $account=$account+$_POST['account_delete'];
            }
            if($account==NULL){
                $account=8;
            }
        }

        $sales=NULL;
        if(isset($_POST['sales_view'])){

            if(isset($_POST['sales_add'])){
                $sales=$sales+$_POST['sales_add'];
            }
            if(isset($_POST['sales_edit'])){
                $sales=$sales+$_POST['sales_edit'];
            }
            if(isset($_POST['sales_delete'])){
                $sales=$sales+$_POST['sales_delete'];
            }
            if($sales==NULL){
                $sales=8;
            }
        }

        $user=NULL;
        if(isset($_POST['user_view'])){

            if(isset($_POST['user_add'])){
                $user=$user+$_POST['user_add'];
            }
            if(isset($_POST['user_edit'])){
                $user=$user+$_POST['user_edit'];
            }
            if(isset($_POST['user_delete'])){
                $user=$user+$_POST['user_delete'];
            }
            if($user==NULL){
                $user=8;
            }
        }

        $ticket=NULL;
        if(isset($_POST['ticket_view'])){

            if(isset($_POST['ticket_add'])){
                $ticket=$ticket+$_POST['ticket_add'];
            }
            if(isset($_POST['ticket_edit'])){
                $ticket=$ticket+$_POST['ticket_edit'];
            }
            if(isset($_POST['ticket_delete'])){
                $ticket=$ticket+$_POST['ticket_delete'];
            }
            if($ticket==NULL){
                $ticket=8;
            }
        }

        $group=NULL;


        $sql="UPDATE `privileges` SET `call_log`='$calllog',`contact`='$contact',`account`='$account',`user`='$user',`group`='$group', `sales`='$sales', `ticket`='$ticket' WHERE `group_id`='$gid' ";
        mysqli_query($ob1->dbcon(), $sql) or trigger_error("SQL", E_USER_ERROR);

    }


    function deletegroup($gid)
    {
        $loguser=$_SESSION['user_id'];
        $ob1 = new connect;
        $sql = "UPDATE `groups` SET `group_modified_by`='$loguser', `group_modified_time`=SYSDATE(),`deleted` = '1' WHERE `group_id` = '$gid' ";
        mysqli_query($ob1->dbcon(), $sql) or trigger_error("SQL", E_USER_ERROR);

        $log = new crm_log;
        $log->add_log("groups",$gid,"delete"); // add a log

    }


    function viewusergroups()
    {

        $loguser=$_SESSION['user_id'];

        //$sql="SELECT groups.group_name, groups.group_id FROM `groups` INNER JOIN `user_group` ON groups.group_id = user_group.group_id WHERE user_group.user_id = '$loguser' ";
        //sql query
        $query = DB::table('groups')
            ->join('user_group', 'groups.group_id','=','user_group.group_id')
            ->select('groups.group_name', 'groups.group_id')
            ->where('user_group.user_id', $loguser )
            ->get();
        //sql query end

//            var_dump($query);
        return $query;

    }

    function viewusergroups1($uid)
    {

        // $loguser=$_SESSION['user_id'];
        $ob1 = new connect;

        $sql="SELECT groups.group_name, groups.group_id FROM `groups` INNER JOIN `user_group` ON groups.group_id = user_group.group_id WHERE user_group.user_id = '$uid' ";

        // echo $sql;
        return(mysqli_query($ob1->dbcon(),$sql));
    }



    function viewgroupmembers($gid)
    {
        $ob1 = new connect;
        $sql="SELECT users.user_name, users.user_id FROM `users` INNER JOIN `user_group` ON users.user_id = user_group.user_id WHERE user_group.group_id = '$gid' ";
        return(mysqli_query($ob1->dbcon(),$sql));
    }

    function user_can_edit_groups($table)
    {
        $loguser=$_SESSION['user_id'];
        $ob1 = new connect;

        // $sql=" SELECT * FROM `user_group` WHERE `user_id` = '$loguser' AND ($table > '2' OR $table > '3' OR $table > '6' OR $table > '7' )";

        if($_SESSION['user_type']=='1')
        {

            $sql ="SELECT * FROM groups WHERE deleted = '0' ";

        }else{

            $sql="SELECT user_group.*,groups.group_name FROM user_group
                           LEFT OUTER JOIN groups ON user_group.group_id = groups.group_id
                           WHERE user_group.user_id = '$loguser' AND (user_group.$table ='2' OR user_group.$table = '3' OR user_group.$table = '6' OR user_group.$table = '7' )";
        }
        // echo $sql;
        return(mysqli_query($ob1->dbcon(),$sql));

    }

    function user_can_add_groups($table)
    {
        $loguser=$_SESSION['user_id'];
        $ob1 = new connect;

        // $sql=" SELECT * FROM `user_group` WHERE `user_id` = '$loguser' AND ($table > '2' OR $table > '3' OR $table > '6' OR $table > '7' )";

        if($_SESSION['user_type']=='1')
        {

            $sql ="SELECT * FROM groups WHERE deleted = '0'";

        }else{

            $sql="SELECT user_group.*,groups.group_name FROM user_group
                           LEFT OUTER JOIN groups ON user_group.group_id = groups.group_id
                           WHERE user_group.user_id = '$loguser' AND (user_group.$table >'3' AND user_group.$table < '8' )";
        }
        // echo $sql;
        return(mysqli_query($ob1->dbcon(),$sql));
        // return($sql);


    }

    function user_can_delete_groups($table)
    {
        $loguser=$_SESSION['user_id'];
        $ob1 = new connect;

        // $sql=" SELECT * FROM `user_group` WHERE `user_id` = '$loguser' AND ($table > '2' OR $table > '3' OR $table > '6' OR $table > '7' )";

        if($_SESSION['user_type']=='1')
        {
            $sql = "SELECT * FROM groups WHERE deleted = '0' ";
        }
        else{
            $sql="SELECT user_group.*,groups.group_name FROM user_group
                           LEFT OUTER JOIN groups ON user_group.group_id = groups.group_id
                           WHERE user_group.user_id = '$loguser' AND (user_group.$table ='1' OR user_group.$table = '3' OR user_group.$table = '5' OR user_group.$table = '7' )";
        }
        // echo $sql;
        return(mysqli_query($ob1->dbcon(),$sql));

    }
}

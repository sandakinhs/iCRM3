<?php

namespace App\Http\Controllers\functions;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class Call extends Controller
{
    function checkcall($cli)
    {
        $ob1 = new connect;

        $sql=mysqli_query($ob1->dbcon(),"SELECT * FROM `contacts` WHERE `deleted` = '0' AND `contact_no` = '$cli'");
        if($count=mysqli_fetch_assoc($sql))
        {
            return(1);
        }else
        {

            $sql1 = mysqli_query($ob1->dbcon(),"SELECT COUNT(`id`) FROM `contacts` WHERE `deleted` = '0' AND (`contact_mobile2` = '$cli'  OR `contact_work_phone` = '$cli')");
            $count=mysqli_fetch_assoc($sql1);

            foreach ($count as $key => $val)
            {
                if($val==0){ return(0); }
                elseif ($val==1){ return(1); }
                elseif ($val>1){ return(3); }
            }

        }

    }

    function viewcallcontactcli($cli)
    {
        $ob1 = new connect;
        $sql = mysqli_query($ob1->dbcon(),"SELECT * FROM `contacts` WHERE `deleted` = '0' AND ( `contact_no` = '$cli' OR  `contact_mobile2` = '$cli' OR  `contact_res_phone` = '$cli' OR `contact_work_phone1` = '$cli')");
        return($sql);


    }


    function viewlastcalls($cli)
    {
        $ob1 = new connect;
        $sql = mysqli_query($ob1->dbcon(),"SELECT * FROM `call_log` WHERE `cli` = '$cli' AND `deleted` ='0' ORDER BY `id` DESC LIMIT 5 ");
        return($sql);

    }

    function viewcall_log()
    {
        $ob1 = new connect;
        $sql = mysqli_query($ob1->dbcon(),"SELECT * FROM `call_log` WHERE `deleted` ='0'  ");
        return($sql);

    }


    function viewonecall_log($id)
    {
        $ob1 = new connect;
        $sql = mysqli_query($ob1->dbcon(),"SELECT * FROM `call_log` WHERE `id` ='$id' ");
        return($sql);

    }


    function count_calllog()
    {
        $ob1 = new connect;
        $sql = mysqli_query($ob1->dbcon(),"SELECT COUNT(id) AS `count` FROM `call_log` WHERE `deleted` ='0'");
        $row = mysqli_fetch_assoc($sql);
        return($row['count']);
    }


    function viewinquiry($id)
    {
        $ob1 = new connect;
        $sql = mysqli_query($ob1->dbcon(),"SELECT * FROM `inquiry` WHERE `call_log_id` ='$id' ");
        return($sql);

    }

    function viewdatalimit($limit,$offset)
    {

        $ids = join(',',$_SESSION['user_groups']); // user groups

        $sql="SELECT call_log.* , users.user_name AS owner, modi.user_name AS modified, assi.user_name AS assigned, contacts.contact_firstname, groups.group_name, stat.status AS 'Status', stat1.status AS 'Status1', stat2.status AS 'Status2', accounts.account_name
														FROM call_log INNER JOIN users ON
		                                                          call_log.call_owner=users.id
		                                                INNER JOIN contacts ON
		                                                		  call_log.contact_id=contacts.id
		                                                LEFT OUTER JOIN users AS modi ON
		                                                		  call_log.call_modified_by=modi.id
		                                                LEFT OUTER JOIN users AS assi ON
		                                                		  call_log.assignedto=assi.id
														INNER JOIN groups ON
								                                  call_log.group_id=groups.group_id
														LEFT OUTER JOIN inquiry AS stat ON
																  call_log.id = stat.call_log_id
														LEFT OUTER JOIN sales AS stat1 ON
																   call_log.id = stat1.call_log_id
														LEFT OUTER JOIN ticket AS stat2 ON
																   call_log.id = stat2.call_log_id
														LEFT OUTER JOIN accounts ON
																  contacts.account_id = accounts.id
		                                                		             WHERE call_log.deleted = '0' " ;

        if($_SESSION['user_type'] != 1){

            $sql .= "AND call_log.group_id IN ($ids) ";
        }


        // if($_SESSION['user_type']!='1'){     // view call log filter with group
        //   	$sql.=" AND groups.group_id='$_SESSION[user_group]' ";
        // }


        if(isset($_POST['submit'])){  // search contact by name and number

            if($_POST['cli']!=''){

                $sql .= "AND call_log.cli LIKE '$_POST[cli]%' ";
            }

            if($_POST['fdate']!=''){

                $sql .= "AND call_log.call_created_time BETWEEN '$_POST[fdate] 00:00:00' AND '$_POST[tdate] 23:59:59' ";
            }

            if(isset($_POST['search'])){
                if($_POST['search']!=''){


                    if($_POST['field_name']=="status"){

                        $sql .="AND ( stat.status LIKE '$_POST[search]%' OR stat1.status LIKE '$_POST[search]%')";

                    }else{

                        $sql .="AND $_POST[field_name] LIKE '$_POST[search]%' ";

                    }
                }
            }


            $result = DB::select(DB::raw($sql));
            return($result);


        }else{



            $sql .="ORDER BY call_log.id $_SESSION[sort] LIMIT $limit OFFSET $offset" ; //set lime and offset

            $result = DB::select(DB::raw($sql));
            return($result);

        }

    }

    function viewdatalimit_pending($limit,$offset)
    {
        $ob1 = new connect;
        $ids = join(',',$_SESSION['user_groups']); // user groups

        $sql="SELECT call_log.* , users.user_name AS owner, modi.user_name AS modified, assi.user_name AS assigned, contacts.contact_firstname, groups.group_name, stat.status AS 'Status', stat1.status AS 'Status1', accounts.account_name
														FROM call_log INNER JOIN users ON
		                                                          call_log.call_owner=users.user_id
		                                                INNER JOIN contacts ON
		                                                		  call_log.contact_id=contacts.id
		                                                LEFT OUTER JOIN users AS modi ON
		                                                		  call_log.call_modified_by=modi.user_id
		                                                LEFT OUTER JOIN users AS assi ON
		                                                		  call_log.assignedto=assi.user_id
														INNER JOIN groups ON
								                                  call_log.group_id=groups.group_id
														LEFT OUTER JOIN inquiry AS stat ON
																  call_log.id = stat.call_log_id
														LEFT OUTER JOIN sales AS stat1 ON
																   call_log.id = stat1.call_log_id
														LEFT OUTER JOIN accounts ON
																  contacts.contact_account = accounts.id
		                                                		             WHERE call_log.deleted = '0' AND ( stat.status LIKE 'pending' OR stat1.status LIKE 'pending')   " ;

        if($_SESSION['user_type'] != 1){

            $sql .= "AND call_log.group IN ($ids) ";
        }

        $sql .="ORDER BY `id` DESC LIMIT $limit OFFSET $offset" ; //set lime and offset

        return(mysqli_query($ob1->dbcon(),$sql));

    }

    function viewsales($id)
    {
        $ob1 = new connect;
        $sql = mysqli_query($ob1->dbcon(),"SELECT * FROM `sales` WHERE `call_log_id` ='$id' ");
        return($sql);

    }


    function viewdatalimit_contact($limit,$offset,$contact)
    {
        $ob1 = new connect;
        $ids = join(',',$_SESSION['user_groups']); // user groups

        $sql="SELECT call_log.* , users.user_name AS owner, modi.user_name AS modified, assi.user_name AS assigned, contacts.contact_firstname, groups.group_name, accounts.account_name
														FROM call_log INNER JOIN users ON
		                                                          call_log.call_owner=users.user_id
		                                                INNER JOIN contacts ON
		                                                		  call_log.contact_id=contacts.id
		                                                LEFT OUTER JOIN users AS modi ON
		                                                		  call_log.call_modified_by=modi.user_id
		                                                LEFT OUTER JOIN users AS assi ON
		                                                		  call_log.assignedto=assi.user_id
														INNER JOIN groups ON
								                                  call_log.group_id=groups.group_id
								                        LEFT OUTER JOIN accounts ON
																  contacts.contact_account = accounts.id
		                                                		             WHERE call_log.deleted = '0' AND call_log.cli = '$contact' " ;

        if($_SESSION['user_type'] != 1){

            $sql .= "AND call_log.group IN ($ids) ";
        }


        // if($_SESSION['user_type']!='1'){     // view call log filter with group
        //   	$sql.=" AND groups.group_id='$_SESSION[user_group]' ";
        // }



        $sql .="ORDER BY `id` DESC LIMIT $limit OFFSET $offset" ; //set lime and offset
        // echo $sql;
        return(mysqli_query($ob1->dbcon(),$sql));



    }
}

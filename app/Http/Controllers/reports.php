<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use View;
use App;

class reports extends Controller
{

    function summery_view(){

        session_start();

        $_SESSION['loc'] = "sumreport";

        if(isset($_POST['submit'])){

            $_SESSION['fdate']=$_POST['from_date']." 00:00:00";
            $_SESSION['tdate']=$_POST['to_date']." 23:59:59";


        }else{

            unset( $_SESSION['fdate']);
            unset( $_SESSION['tdate']);

        }

        $inquiry = $this->summery();
        $sales = $this->summery_sales();
        $ticket = $this->summery_ticket();

       return View::make('report.summaryreport',compact('inquiry','sales','ticket'));


    }

    public function detail_view()
    {

        session_start();

        if($_GET['type'] == "Inquiry")
        {

            $result = $this->detial('Inquiry',$_GET['view']);

        }

        if($_GET['type'] == "sales")
        {

            $result = $this->detail_sales($_GET['view']);

        }

        if($_GET['type'] == "ticket")
        {

            $result = $this->detail_ticket($_GET['view']);

        }


        return View::make('report.detailreport',compact('result'));

    }

    function summery(){


            $type="Inquiry";



        //$connect = new connect;
        //$conn=$connect->dbcon();


        if(!isset($_SESSION['fdate'])){

            $sql = "SELECT COUNT(`id`) AS `type` FROM `call_log` WHERE `deleted` = '0' AND `call_type` = '$type'";
            $count=DB::select(DB::raw($sql));

            foreach($count as $count_){
                $tot=$count_->type;
            }


            $sql = "SELECT COUNT('id') AS `comp` FROM call_log INNER JOIN $type ON call_log.id=$type.call_log_id WHERE call_log.deleted='0' AND $type.status='complete'";
            $count=DB::select(DB::raw($sql));

            foreach($count as $count_){
                $comp=$count_->comp;
            }

            $sql = "SELECT COUNT('id') AS `pend` FROM call_log INNER JOIN $type ON call_log.id=$type.call_log_id WHERE call_log.deleted='0' AND $type.status='pending'";
            $count=DB::select(DB::raw($sql));

            foreach($count as $count_){
                $pend=$count_->pend;
            }

        }else{


            $fdate=$_SESSION['fdate'];
            $tdate=$_SESSION['tdate'];


            $sql ="SELECT COUNT(`id`) AS `type` FROM `call_log` WHERE `deleted` = '0' AND `call_type` = '$type' AND (call_log.call_created_time BETWEEN '$fdate' AND '$tdate') ";
            $count=DB::select(DB::raw($sql));

            foreach($count as $count_){
                $tot=$count_->type;
            }

            $sql = "SELECT COUNT('id') AS `comp` FROM call_log INNER JOIN $type ON call_log.id=$type.call_log_id WHERE call_log.deleted='0' AND $type.status='complete' AND (call_log.call_created_time BETWEEN '$fdate' AND '$tdate') ";
            $count=DB::select(DB::raw($sql));

            foreach($count as $count_){
                $comp=$count_->comp;
            }

            $sql ="SELECT COUNT('id') AS `pend` FROM call_log INNER JOIN $type ON call_log.id=$type.call_log_id WHERE call_log.deleted='0' AND $type.status='pending' AND (call_log.call_created_time BETWEEN '$fdate' AND '$tdate') ";
            $count=DB::select(DB::raw($sql));


            foreach($count as $count_){
                $pend=$count_->pend;
            }


        }

        return array($tot,$pend,$comp);


    }


    function summery_sales(){


        if(!isset($_SESSION['fdate'])){

            $sql = "SELECT COUNT(`id`) AS `all` FROM `sales` WHERE `deleted` = '0' ";
            $count=DB::select(DB::raw($sql));
            foreach($count as $count_){
                $tot=$count_->all;
            }

            $sql = "SELECT COUNT(`id`) AS `pending` FROM `sales` WHERE `deleted` = '0' AND `status` = 'pending' ";
            $count=DB::select(DB::raw($sql));
            foreach($count as $count_){
                $pending=$count_->pending;
            }


            $sql = "SELECT COUNT(`id`) AS `posted` FROM `sales` WHERE `deleted` = '0' AND `status` = 'posted' ";
            $count=DB::select(DB::raw($sql));
            foreach($count as $count_){
                $posted=$count_->posted;
            }

            $sql = "SELECT COUNT(`id`) AS `authorized` FROM `sales` WHERE `deleted` = '0' AND `status` = 'authorized' ";
            $count=DB::select(DB::raw($sql));
            foreach($count as $count_){
                $authorized=$count_->authorized;
            }

            $sql = "SELECT COUNT(`id`) AS `ready` FROM `sales` WHERE `deleted` = '0' AND `status` = 'ready' ";
            $count=DB::select(DB::raw($sql));
            foreach($count as $count_){
                $ready=$count_->ready;
            }

            $sql = "SELECT COUNT(`id`) AS `delivered` FROM `sales` WHERE `deleted` = '0' AND `status` = 'delivered' ";
            $count=DB::select(DB::raw($sql));
            foreach($count as $count_){
                $delivered=$count_->delivered;
            }


        }else{

            $fdate=$_SESSION['fdate'];
            $tdate=$_SESSION['tdate'];

            $sql = "SELECT COUNT(`id`) AS `all` FROM `sales` WHERE `deleted` = '0'  AND (created_time BETWEEN '$fdate' AND '$tdate') ";
            $count=DB::select(DB::raw($sql));
            foreach($count as $count_){
                $tot=$count_->all;
            }

            $sql ="SELECT COUNT(`id`) AS `pending` FROM `sales` WHERE `deleted` = '0' AND `status` = 'pending' AND (created_time BETWEEN '$fdate' AND '$tdate') ";
            $count=DB::select(DB::raw($sql));
            foreach($count as $count_){
                $pending=$count_->pending;
            }

            $sql = "SELECT COUNT(`id`) AS `posted` FROM `sales` WHERE `deleted` = '0' AND `status` = 'posted' AND (created_time BETWEEN '$fdate' AND '$tdate') ";
            $count=DB::select(DB::raw($sql));
            foreach($count as $count_){
                $posted=$count_->posted;
            }

            $sql = "SELECT COUNT(`id`) AS `authorized` FROM `sales` WHERE `deleted` = '0' AND `status` = 'authorized' AND (created_time BETWEEN '$fdate' AND '$tdate') ";
            $count=DB::select(DB::raw($sql));
            foreach($count as $count_){
                $authorized=$count_->authorized;
            }

            $sql ="SELECT COUNT(`id`) AS `ready` FROM `sales` WHERE `deleted` = '0' AND `status` = 'ready' AND (created_time BETWEEN '$fdate' AND '$tdate') ";
            $count=DB::select(DB::raw($sql));
            foreach($count as $count_){
                $ready=$count_->ready;
            }

            $sql = "SELECT COUNT(`id`) AS `delivered` FROM `sales` WHERE `deleted` = '0' AND `status` = 'delivered' AND (created_time BETWEEN '$fdate' AND '$tdate') ";
            $count=DB::select(DB::raw($sql));
            foreach($count as $count_){
                $delivered=$count_->delivered;
            }


        }


        return array($tot,$pending,$posted,$authorized,$ready,$delivered);


    }

    function summery_ticket(){



        if(!isset($_SESSION['fdate'])){

            $sql = "SELECT COUNT(`id`) AS `all` FROM `ticket` WHERE `deleted` = '0' ";
            $count= DB::select(DB::raw($sql));
            foreach($count as $count_){
                $tot=$count_->all;
            }

            $sql = "SELECT COUNT(`id`) AS `pending` FROM `ticket` WHERE `deleted` = '0' AND `status` = 'pending' ";
            $count= DB::select(DB::raw($sql));
            foreach($count as $count_){
                $pending=$count_->pending;
            }

            $sql = "SELECT COUNT(`id`) AS `complete` FROM `ticket` WHERE `deleted` = '0' AND `status` = 'complete' ";
            $count= DB::select(DB::raw($sql));
            foreach($count as $count_){
                $complete=$count_->complete;
            }

        }else{

            $fdate=$_SESSION['fdate'];
            $tdate=$_SESSION['tdate'];

            $sql = "SELECT COUNT(`id`) AS `all` FROM `ticket` WHERE `deleted` = '0'  AND (created_time BETWEEN '$fdate' AND '$tdate') ";
            $count=DB::select(DB::raw($sql));
            foreach($count as $count_){
                $tot=$count_->all;
            }

            $sql ="SELECT COUNT(`id`) AS `pending` FROM `ticket` WHERE `deleted` = '0' AND `status` = 'pending' AND (created_time BETWEEN '$fdate' AND '$tdate') ";
            $count=DB::select(DB::raw($sql));
            foreach($count as $count_){
                $pending=$count_->pending;
            }

            $sql = "SELECT COUNT(`id`) AS `complete` FROM `ticket` WHERE `deleted` = '0' AND `status` = 'complete' AND (created_time BETWEEN '$fdate' AND '$tdate') ";
            $count=DB::select(DB::raw($sql));
            foreach($count as $count_){
                $complete=$count_->complete;
            }
        }

        return array($tot,$pending,$complete);
    }


    function detial($type,$view){


        if($type=="Inquiry"){
            $type="inquiry";
        }elseif($type=="Sales"){
            $type="sales";
        }


        if(!isset($_SESSION['fdate'])){ // view total call log



            $sql="SELECT call_log.cli AS CLI,DATE(call_log.call_created_time) AS 'Start_Date',TIME(call_log.call_created_time) AS 'Start_Time',call_log.call_type AS Type, DATE($type.inquiry_end_time) AS 'End_Date',TIME($type.inquiry_end_time) AS 'End_Time',$type.status AS Status,contacts.contact_firstname AS Name,contacts.contact_address_city AS City, users.user_name AS owner , assi.user_name AS 'assinged_to', accounts.account_name AS Account, groups.group_name AS Groups
                              					FROM call_log INNER JOIN $type ON
		                                                    call_log.id=$type.call_log_id
		                                            INNER JOIN contacts ON
		                                                    call_log.contact_id=contacts.id
		                                            LEFT OUTER JOIN accounts ON
		                                            	    accounts.id=contacts.account_id
													INNER JOIN users ON
															call_log.call_owner=users.id
													LEFT OUTER JOIN users AS assi ON
															call_log.assignedto=assi.id
													INNER JOIN groups ON
							                               call_log.group_id=groups.group_id
															             WHERE call_log.deleted='0' " ;



            if(isset($_POST['submit'])){

                if(isset($_POST['search'])){
                    if($_POST['search']!=''){
                        $sql .="AND $_POST[field_name] LIKE '$_POST[search]%' ";
                    }

                }

            }


            if($view!="tot"){     // view call log filter with status

                $sql.=" AND $type.status='$view' ";

            }



            if($_SESSION['user_type'] != 1){

                $sql1 = " SELECT `group_id` FROM `user_group` WHERE `user_id` = '$_SESSION[user_id]' AND `call_log` > '1' ";
                $result = DB::select(DB::raw($sql1));

                foreach ($result as $row) {
                    $groups[] = $row->group_id;
                }


                $ids = join(',', $groups); // user groups
                $sql .= "AND call_log.group IN ($ids) ";
            }

            $_SESSION['sql']=$sql;   // Use export to excel files

            $result = DB::select(DB::raw($sql));
            return($result);

        }else{      // view call log filter with date

            $fdate=$_SESSION['fdate'];
            $tdate=$_SESSION['tdate'];


            $sql ="SELECT call_log.cli AS CLI,DATE(call_log.call_created_time) AS 'Start Date',TIME(call_log.call_created_time) AS 'Start Time',call_log.call_type AS Type, $type.subject AS Subject ,$type.remark AS Remark ,DATE($type.inquiry_end_time) AS 'End Date',TIME($type.inquiry_end_time) AS 'End Time',$type.status AS Status,contacts.contact_firstname AS Name,contacts.contact_address_city AS City, users.user_name AS owner , assi.user_name AS 'assinged to', accounts.account_name AS Account, groups.group_name AS Groups
                              					FROM call_log INNER JOIN $type ON
		                                                    call_log.id=$type.call_log_id
		                                            INNER JOIN contacts ON
		                                                    call_log.contact_id=contacts.id
		                                            LEFT OUTER JOIN accounts ON
		                                            	    accounts.id=contacts.account_id
													INNER JOIN users ON
															call_log.call_owner=users.id
													LEFT OUTER JOIN users AS assi ON
															call_log.assignedto=assi.id
													INNER JOIN groups ON
							                               users.group_id=groups.group_id
															   WHERE call_log.deleted='0' AND (call_log.call_created_time BETWEEN '$fdate%' AND '$tdate%') ";


            if(isset($_POST['submit'])){

                if(isset($_POST['search'])){
                    if($_POST['search']!=''){
                        $sql .="AND $_POST[field_name] LIKE '$_POST[search]%' ";
                    }

                }

            }

            if($view!="tot"){    // filter with status

                $sql .=" AND $type.status='$view' ";

            }



            if($_SESSION['user_type'] != 1){

                $sql1 = " SELECT `group_id` FROM `user_group` WHERE `user_id` = '$_SESSION[user_id]' AND `call_log` > '1' ";
                $result = DB::select(DB::raw($sql1));

                foreach ($result as $row) {
                    $groups[] = $row->group_id;
                }


                $ids = join(',', $groups); // user groups
                $sql .= "AND call_log.group IN ($ids) ";
            }

            //echo $sql;

            $_SESSION['sql']=$sql; // Use export to excel files

            $result = DB::select(DB::raw($sql));
            return($result);

        }



    }


    function detail_sales($view){


        $sql="SELECT contacts.contact_firstname AS Name, contacts.contact_no AS 'Contact_No', contacts.contact_address_city AS City , sales.total,  DATE(sales.created_time) AS 'Date',TIME(sales.created_time) AS 'Time', accounts.account_name AS Account, groups.group_name AS 'Group', assi.user_name AS Assinged , sales.status , owners.user_name AS Owner
		 					FROM sales
							LEFT OUTER JOIN contacts ON sales.customer_id = contacts.id
							INNER JOIN users AS owners ON sales.owner_id = owners.id
							LEFT OUTER JOIN users AS moddi ON sales.modified_by = moddi.id
							LEFT OUTER JOIN accounts ON contacts.account_id = accounts.id
							LEFT OUTER JOIN groups ON sales.group_id = groups.group_id
							LEFT OUTER JOIN users AS assi ON sales.assignedto = assi.id
							WHERE sales.deleted = '0'";



        if(isset($_SESSION['fdate'])){ // view total call log

            $fdate=$_SESSION['fdate'];
            $tdate=$_SESSION['tdate'];

            $sql .= "AND (sales.created_time BETWEEN '$fdate%' AND '$tdate%') ";
        }

        if($view!='tot'){
            $sql .="AND sales.status = '$view' ";
        }

        // check user groups

        if(isset($_POST['submit'])){

        }


        if($_SESSION['user_type'] != 1){

            $sql1 = " SELECT `group_id` FROM `user_group` WHERE `user_id` = '$_SESSION[user_id]' AND `call_log` > '1' ";
            $result = DB::select(DB::raw($sql1));

            foreach ($result as $row) {
                $groups[] = $row->group_id;
            }


            $ids = join(',', $groups); // user groups
            $sql .= "AND sales.group IN ($ids) ";
        }


        $_SESSION['sql']=$sql; // Use export to excel files

        $result = DB::select(DB::raw($sql));
        return($result);

    }

    function detail_ticket($view){

        $sql="SELECT DATE(ticket.created_time) AS 'Date' , TIME(ticket.created_time) AS 'Time', contacts.contact_firstname AS 'Name', contacts.contact_no AS 'Number' ,assi.user_name AS 'Assign', own.user_name AS 'Owner', ticket.status AS 'Status',ticket.subject AS 'Subject', ticket.priority AS 'Priority' ,groups.group_name AS 'Group'
                              FROM ticket
										INNER JOIN contacts ON contacts.id = ticket.contact_id
										INNER JOIN users AS assi ON assi.id = ticket.assignedto
										INNER JOIN users AS own ON own.id = ticket.owner
										INNER JOIN groups ON groups.group_id = ticket.group_id
										WHERE ticket.deleted = '0' ";


        if(isset($_SESSION['fdate'])){ // view total call log

            $fdate=$_SESSION['fdate'];
            $tdate=$_SESSION['tdate'];

            $sql .= "AND (ticket.created_time BETWEEN '$fdate%' AND '$tdate%') ";
        }

        if($view!='tot'){
            $sql .="AND ticket.status = '$view' ";
        }



        if($_SESSION['user_type'] != 1){

            $sql1 = " SELECT `group_id` FROM `user_group` WHERE `user_id` = '$_SESSION[user_id]' AND `call_log` > '1' ";
            $result = DB::select(DB::raw($sql1));

            foreach ($result as $row) {
                $groups[] = $row->group_id;
            }


            $ids = join(',', $groups); // user groups
            $sql .= "AND ticket.group IN ($ids) ";
        }

        // echo $sql;

        $_SESSION['sql']=$sql; // Use export to excel files

        $result = DB::select(DB::raw($sql));
        return($result);
    }

}

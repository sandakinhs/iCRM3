<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class post extends Controller
{
    public function contact_values()
    {
        session_start();

        $_SESSION['flag1']="1";   // this session is use to identify

        if (isset($_GET['n'])) {

            $_SESSION['contact_firstname']=$_POST['contact_firstname'];
            $_SESSION['contact_lastname']=$_POST['contact_lastname'];
            $_SESSION['contact_title']=$_POST['contact_title'];
            $_SESSION['contact_gender']=NULL;
            $_SESSION['contact_email1']=NULL;
            $_SESSION['contact_no']=$_POST['cli'];
            $_SESSION['contact_mobile2']=NULL;
            $_SESSION['contact_work_phone']=NULL;
            $_SESSION['contact_work_fax']=NULL;
            $_SESSION['contact_category']=NULL;
            $_SESSION['contact_address_number']=NULL;
            $_SESSION['contact_address_street']=NULL;
            $_SESSION['contact_address_city']=NULL;
            $_SESSION['contact_address_district']=NULL;
            $_SESSION['contact_shipping_address_number']=NULL;
            $_SESSION['contact_shipping_address_street']=NULL;
            $_SESSION['contact_shipping_address_city']=NULL;
            $_SESSION['contact_shipping_address_district']=NULL;
            $_SESSION['contact_work_address_number']=NULL;
            $_SESSION['contact_work_address_street']=NULL;
            $_SESSION['contact_work_address_city']=NULL;
            $_SESSION['contact_work_address_district']=NULL;
            $_SESSION['contact_work_companyname']=NULL;
            $_SESSION['contact_work_email']=NULL;
            $_SESSION['contact_work_department']=NULL;
            $_SESSION['contact_birthday']=NULL;
            $_SESSION['contact_assign']=NULL;
            $_SESSION['group1']=NULL;
            $_SESSION['contact_report_to']=NULL;
            $_SESSION['contact_report_name']=NULL;
            $_SESSION['account_id']=NULL;
            $_SESSION['contact_work_email1']=NULL;
            $_SESSION['designation']=NULL;

        }else{

            $_SESSION['contact_firstname']=$_POST['contact_firstname'];
            $_SESSION['contact_lastname']=$_POST['contact_lastname'];
            $_SESSION['contact_title']=$_POST['contact_title'];
            $_SESSION['contact_gender']=$_POST['contact_gender'];
            $_SESSION['contact_email1']=$_POST['contact_email1'];
            $_SESSION['contact_no']=$_POST['contact_no'];
            $_SESSION['contact_mobile2']=$_POST['contact_mobile2'];
            $_SESSION['contact_work_phone']=$_POST['contact_work_phone'];
            $_SESSION['contact_work_fax']=$_POST['contact_work_fax'];
            $_SESSION['contact_category']=$_POST['contact_category'];
            $_SESSION['contact_address_number']=$_POST['contact_address_number'];
            $_SESSION['contact_address_street']=$_POST['contact_address_street'];
            $_SESSION['contact_address_city']=$_POST['contact_address_city'];
            $_SESSION['contact_address_district']=$_POST['contact_address_district'];
            $_SESSION['contact_shipping_address_number']=$_POST['contact_shipping_address_number'];
            $_SESSION['contact_shipping_address_street']=$_POST['contact_shipping_address_street'];
            $_SESSION['contact_shipping_address_city']=$_POST['contact_shipping_address_city'];
            $_SESSION['contact_shipping_address_district']=$_POST['contact_shipping_address_district'];
            $_SESSION['contact_work_address_number']=$_POST['contact_work_address_number'];
            $_SESSION['contact_work_address_street']=$_POST['contact_work_address_street'];
            $_SESSION['contact_work_address_city']=$_POST['contact_work_address_city'];
            $_SESSION['contact_work_address_district']=$_POST['contact_work_address_district'];
            $_SESSION['contact_work_companyname']=$_POST['contact_work_companyname'];
            $_SESSION['contact_work_email']=NULL;
            $_SESSION['contact_work_department']=$_POST['contact_work_department'];
            $_SESSION['contact_birthday']=$_POST['contact_birthday'];
            $_SESSION['contact_assign']=$_POST['assignedto'];
            $_SESSION['group1']=$_POST['group_id'];
            $_SESSION['contact_report_to']=$_POST['contact_report_to'];
            $_SESSION['contact_report_name']=$_POST['contact_report_name'];

//            $_SESSION['contact_id']=$_POST['contact_id'];

            $_SESSION['account_id']=$_POST['account_id'];
            $_SESSION['contact_work_email1']=$_POST['contact_work_email1'];
            $_SESSION['designation']=$_POST['designation'];

        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class formsubmit extends Controller
{

    /**
     * @return int|string
     */
    public function login_submit()
    {
        $username=$_POST['username'];
        $password=$_POST['password'];


        session_start();
        $password=md5($password);

//	    Super admin login
        $super_username="s_admin";
        $super_password=md5("iphonik");

        if($username == $super_username){

            if ($password == $super_password) {

                $_SESSION['user_type'] == "s_admin";   // set user type session
                return("5");    // return value
            }
        }
        // End super admin login

        DB::enableQueryLog();
        $ip=$this->get_client_ip(); // get user ip

        //sql query
        $query = DB::table('users')
                       ->select('user_id', 'user_group', 'user_is_admin')
                       ->where('user_name',$username  )
                       ->where('user_password',$password)
                       -> get();
        //sql query end


        foreach($query as $re)
        {

            $_SESSION['user_id'] = $re->user_id;

        if($re->user_is_admin != "1") {   // check if user is admin or not

            //sql query
            $query1 = DB::table('user_login')
                ->select('*')
                ->where('user_id', $re->user_id)
                ->where('user_login_status',1)
                ->get();
            //sql query end

            var_dump($query1);

            foreach ($query1 as $rew) {

                if ($rew->ip != $ip) {

//                    $this->log_model->add_log("logging attempt 1",$ip,$username);  // add a log
                    return ($rew->ip);

                }

//                $sql_l="UPDATE `user_login` SET `user_logout_time`=SYSDATE(), `user_login_status`= '0' WHERE `user_id` = '$re[user_id]' AND `user_login_status` = '1' "	;
//                $this->db->query($sql_l);
                echo date('Y-m-d H:i:s');
                //sql query
                DB::table('user_login')
                    ->where('user_id', $re->user_id)
                    ->update(['user_logout_time' => DATE()],['user_login_status' => 0]);
                //sql query end


            }  // end of foreach

        } //end of if

            dd(DB::getQueryLog());
            die();


            $this->load->model('group_model');

            foreach($this->group_model->viewusergroups() as $row1){

                $_SESSION['user_groups'][] = $row1['group_id']; 	// add user groups to session

                $this->load->model('user_model');

                foreach($this->user_model->user_privilages($row1['group_id']) as $row2) {

                    $_SESSION['_' . $row1['group_id']]['call_log'] = $row2['call_log'];
                    $_SESSION['_' . $row1['group_id']]['contacts'] = $row2['contact'];
                    $_SESSION['_' . $row1['group_id']]['accounts'] = $row2['account'];
                    $_SESSION['_' . $row1['group_id']]['users'] = $row2['user'];
                    $_SESSION['_' . $row1['group_id']]['groups'] = $row2['group'];
                    $_SESSION['_' . $row1['group_id']]['sales'] = $row2['sales'];
                    $_SESSION['_' . $row1['group_id']]['ticket'] = $row2['ticket'];
                }
            }

            $_SESSION['user_type'] = $re['user_is_admin'];

            $ip=$this->get_client_ip(); // get user ip

            $sql = "INSERT INTO `user_login` VALUES (NULL,'$re[user_id]',SYSDATE(),NUll,'1','1','$ip')";  //add to user_login table
            $this->db->query($sql);

            $last_id = $this->db->insert_id();
            $_SESSION['user_login_id']=$last_id;

            $this->log_model->add_log(" "," ","User Login"); // add a log

            $query=$this->db->query("SELECT * FROM `s_admin` WHERE `id` = '1' ");
            $result=$query->row_array();

            $_SESSION['per_inquiry']= $result['Inquiry'] ;
            $_SESSION['per_sales']= $result['Sales'] ;
            $_SESSION['per_tickets']= $result['Tickets'] ;

            return 1;

        }

        $this->log_model->add_log("logging attempt",$ip,$username); // add a log

        return("0");

    }

    function get_client_ip() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

}

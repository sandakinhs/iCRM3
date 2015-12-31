<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
//use App\Http\Controllers\Log;


class formsubmit extends Controller
{

    /**
     * @return int|string
     */
    public function login_submit()
    {
        $username=$_POST['username'];
        $password=$_POST['password'];
        $log = new Log();
        $group = new GroupController();
        $user = new UserController();


        session_start();
        $password=md5($password);

        //Super admin login
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
                       ->select('id', 'user_group', 'user_is_admin')
                       ->where('user_name',$username  )
                       ->where('user_password',$password)
                       -> get();
        //sql query end


        foreach($query as $re)
        {

            $_SESSION['user_id'] = $re->id;

        if($re->user_is_admin != "1") {   // check if user is admin or not

            //sql query
            $query1 = DB::table('user_login')
                ->select('*')
                ->where('user_id', $re->id)
                ->where('user_login_status',1)
                ->get();
            //sql query end

            foreach ($query1 as $rew) {

                if ($rew->ip != $ip) {

                    $log->add_log("logging attempt 1",$ip,$username);
                    return ($rew->ip);

                }

                //sql query
                DB::table('user_login')
                    ->where('user_id', $re->id)
                    ->update(['user_logout_time' => DATE('Y-m-d H:i:s'),'user_login_status' => 0]);
                //sql query end


            }  // end of foreach

        } //end of if


            foreach($group->viewusergroups() as $row1){

                $_SESSION['user_groups'][] = $row1->group_id; 	// add user groups to session

//                add user privileges to sessions
                foreach($user->user_privilages($row1->group_id) as $row2) {

                    $_SESSION['_' . $row1->group_id]['call_log'] = $row2->call_log;
                    $_SESSION['_' . $row1->group_id]['contacts'] = $row2->contact;
                    $_SESSION['_' . $row1->group_id]['accounts'] = $row2->account;
                    $_SESSION['_' . $row1->group_id]['users'] = $row2->user;
                    $_SESSION['_' . $row1->group_id]['groups'] = $row2->group;
                    $_SESSION['_' . $row1->group_id]['sales'] = $row2->sales;
                    $_SESSION['_' . $row1->group_id]['ticket'] = $row2->ticket;
                }
//                end

            }


            $_SESSION['user_type'] = $re->user_is_admin;

            $ip=$this->get_client_ip(); // get user ip

            //sql query
            DB::table('user_login')
                ->where('user_id', $re->id)
                ->update(['user_logout_time' => DATE('Y-m-d H:i:s'),'user_login_status' => 0]);
            //sql query end

           //sql query start
            $last_id=DB::table('user_login')
                ->insertGetId(['user_id' => $re->id, 'user_login_time' => DATE('Y-m-d H:i:s'), 'user_session'=>1,'user_login_status'=>1,'ip'=>$ip]); //add to user_login table
            //sql query end


            $_SESSION['user_login_id']=$last_id;

            $log->add_log(" "," ","User Login");  // add a log


            //sql query
            $query = DB::table('s_admin')
                ->select('*')
                ->where('id', 1)
                ->get();
            //sql query end


            foreach($query as $result) {
                $_SESSION['per_inquiry'] = $result->Inquiry;
                $_SESSION['per_sales'] = $result->Sales;
                $_SESSION['per_tickets'] = $result->Tickets;
            }

            $_SESSION['login_user']=$username;
            return redirect('home');

        }

        
        $log->add_log("logging attempt ",$ip,$username);

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

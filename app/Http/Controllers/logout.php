<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;
use DB;

class logout extends Controller
{


    public function index()
    {

        session_start();

        if(isset($_GET['user'])){    // check if this php call from user.php

            $this -> logout_one_user($_GET['user']);

            return redirect('login_users');

        }else{


            $this->logout_all();

            session_destroy();

            if(isset($_GET['logout'])){

                //header("Location: index.php?logout");
                return redirect('login');

            }else{

                return redirect('login');

            }

        }

    }

    function logout_all()
    {

        $log = new Log;
        $id = $_SESSION['user_login_id'];

        $sql = "UPDATE `user_login` SET `user_logout_time` = SYSDATE() , `user_login_status` = '0' WHERE `id` = '$id' ";
        DB::update(DB::raw($sql));

        $log->add_log(" "," ","User Logout"); // add a log
    }

    function logout_one_user($id){


        $sql="UPDATE `user_login` SET `user_logout_time`=SYSDATE(),`user_login_status`='0' WHERE `user_id` = '$id' ";  // set user login status 0 to log out

        DB::update(DB::raw($sql));


    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;
use View;
use DB;

class user extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session_start();

        $_SESSION['loc'] = "admin";

        $user_details = $this->viewuser();

        return View::make('user.user',compact('user_details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        session_start();

        unset($_SESSION['group_name_can_edit']);
        unset($_SESSION['group_names']);

        $groups_details = App\group::all();

        foreach($groups_details as $row)
        {
            $_SESSION['group_name_can_edit'][] = $row->group_name;
            $_SESSION['group_names'][] = $row->group_name;
        }

        return View::make('user.user_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        session_start();

        $data = $request->all();

        $count = App\User::where('user_name',$data['user_name'])->count();

        if($count != 0)
        {
            return(0);

        }else{

            $data['user_owner']=$_SESSION['user_id'];

            $data['user_password'] = md5($data['user_password']);

            $userid = App\User::create($data)->id;

            $log = new Log;
            $log->add_log("users",$userid,"insert"); // add a log


            foreach ($_SESSION['groups'] as $group_name){

                $group_d = App\group::where('group_name',$group_name)->first();

                $group_pri = App\privilege::where('group_id',$group_d->group_id)->first();

                $data_pri = ['user_id'=> $userid,'group_id'=> $group_d->group_id,'call_log'=> $group_pri->call_log,'contact'=>$group_pri->contact,'account'=>$group_pri->account,'user'=>$group_pri->user,'group'=>$group_pri->group,'sales'=>$group_pri->sales,'ticket'=>$group_pri->ticket];
                App\user_group::create($data_pri);

            }

            return redirect('user');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        session_start();

        unset($_SESSION['group_name_can_edit']);
        unset($_SESSION['group_names']);

        $user_details = App\User::where('id',$id)->where('deleted','0')->first();
        $user_group_details = $this->usergroup($id);
        $groups_details = App\group::all();

        foreach($groups_details as $row)
        {
            $_SESSION['group_name_can_edit'][] = $row->group_name;
            $_SESSION['group_names'][] = $row->group_name;
        }


        foreach (array_keys($_SESSION['groups'], 'empty') as $key) {  //unset empty from the settion
            unset($_SESSION['groups'][$key]);
        }

        foreach ($user_group_details as $rowgroup){   // add user values to settion

            foreach (array_keys($_SESSION['group_names'],$rowgroup->group_name) as $key) {
                unset($_SESSION['group_names'][$key]);
            }

            if(in_array($rowgroup->group_name,$_SESSION['groups'])){

            }else{
                $_SESSION['groups'][]=$rowgroup->group_name; }
        }



        return View::make('user.user_edit', compact('user_details','user_group_details'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        session_start();
        $loguser=$_SESSION['user_id'];

        $data=['modified_by'=>$loguser , 'deleted' => '1'];

        App\user::find($id)->update($data);
    }

    public function viewuser()
    {


        if($_SESSION['user_type']!='1'){


            $sql="SELECT users.*, owner.user_name AS owner, modi.user_name AS modify FROM users
			LEFT OUTER JOIN user_group ON users.id = user_group.user_id
			INNER JOIN users AS owner ON users.user_owner = owner.id
			LEFT OUTER JOIN users AS modi ON users.user_modified_by = modi.id
					 WHERE users.deleted='0' AND users.user_is_admin <> '1' AND users.user_is_admin <> '2'"	;

            $sql1 = " SELECT `group_id` FROM `user_group` WHERE `user_id` = '$_SESSION[user_id]' AND `user` > '1' ";
            $result1 = DB::select(DB::raw($sql1));

            foreach ($result1 as $row) {
                $groups[] = $row->group_id;
            }

            if(isset($groups)){     // check if user have user view privilages
                $ids = join(',', $groups); // user groups
                $sql .= "AND user_group.group_id IN ($ids) GROUP BY users.id";
            }else{
                $sql .= "AND user_group.group_id IN ('0')"; // reslut to desplay
            }

        }elseif ($_SESSION['user_type']=='1') {

            $sql="SELECT users.*, owner.user_name AS owner, modi.user_name AS modify FROM users
			LEFT OUTER JOIN user_group ON users.id = user_group.user_id
			INNER JOIN users AS owner ON users.user_owner = owner.id
			LEFT OUTER JOIN users AS modi ON users.user_modified_by = modi.id
					 WHERE users.deleted='0' GROUP BY users.id";
        }


        $result = DB::select(DB::raw($sql));
        return($result);

        //return( mysqli_query($conn,$sql) );

    }

    public function groupselect()
    {

        session_start();

        return View::make('user.groupselect');
    }

    public function grouppost()
    {
        session_start();

        foreach (array_keys($_SESSION['groups'], 'empty') as $key) {  //unset empty from the settion
            unset($_SESSION['groups'][$key]);
        }

        if(isset($_POST['group1'])){

            foreach ($_POST['group1'] as $value1){

                if(in_array($value1,$_SESSION['groups'])){

                }else{
                    $_SESSION['groups'][]=$value1;
                }

                foreach (array_keys($_SESSION['group_names'],$value1) as $key) {
                    unset($_SESSION['group_names'][$key]);
                }
            }
        }


        if(isset($_POST['group2'])){

            foreach ($_POST['group2'] as $value2){


                if($_SESSION['user_type']=='1'){	// check if user is admin
                    foreach (array_keys($_SESSION['groups'],$value2) as $key) {  //unset values from the settion
                        unset($_SESSION['groups'][$key]);
                        $_SESSION['group_names'][]=$value2;
                    }
                }else{
                    foreach (array_keys($_SESSION['groups'],$value2) as $key) {

                        foreach ($_SESSION['group_name_can_edit'] as $value3) {
                            if($value2==$value3){   //check user can edit or add to this group
                                unset($_SESSION['groups'][$key]);  //unset values from the settion
                                $_SESSION['group_names'][]=$value2;   //set again values to session

                            } //end of edit
                        } // enn of foreach
                    }
                }

            }
        }

    }

    function usergroup($udi){

        $sql="SELECT groups.group_name,user_group.id FROM groups INNER JOIN user_group ON groups.group_id=user_group.group_id WHERE user_group.user_id='$udi'";

        $result = DB::select(DB::raw($sql));
        return($result);
    }

    function user_privilege()
    {
        session_start();

        if (isset($_POST['pri_id'])) {
            $_SESSION['pri_id']=$_POST['pri_id'];
        }

        $user_privilege = App\user_group::find($_SESSION['pri_id']);

        return View::make('user.userprivilage',compact('user_privilege'));
    }

    function submit_privilege()
    {

        session_start();



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


        $data['call_log'] = $calllog;


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

        $data['contact'] = $contact;

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

        $data['account'] = $account;

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

        $data['sales'] = $sales;


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

        $data['user'] = $user;

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

        $data['ticket'] = $ticket;

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

        $data['group'] = $group;

        //$sql="UPDATE `user_group` SET `call_log`='$calllog',`contact`='$contact',`account`='$account',`user`='$user',`group`='$group', `sales`='$sales', `ticket`='$ticket' WHERE `id`='$_SESSION[pri_id]' ";
        // mysqli_query($ob1->dbcon(), $sql) or trigger_error("SQL", E_USER_ERROR);

        App\user_group::find($_SESSION['pri_id'])->update($data);
    }

    function login_user(){

        $sql ="SELECT user_login.*, users.user_name FROM user_login
		                                    INNER JOIN users ON users.id = user_login.user_id
                                                                 WHERE user_login.user_login_status = '1'";
        $result = DB::select(DB::raw($sql));
        return($result);
    }

    public function view_login_users()
    {
        session_start();
        $_SESSION['loc'] = "admin";

        $users_details = $this->login_user();

        return View::make('user.users_login',compact('users_details'));
    }
}

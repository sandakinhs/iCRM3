<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use View;
use App\Http\Controllers\functions;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use DB;
use App;

class groups extends Controller
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

        $groups_details = $this->viewgroup();

        return View::make('group.group',compact('groups_details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        session_start();
        $groups_details = $this->viewgroup();

        return View::make('group.group_create',compact('groups_details'));
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
        $loguser=$_SESSION['user_id'];

        $data = $request->all();

        $data['group_owner'] = $loguser;

        $group_id = App\group::create($data)->group_id;

        $log = new Log;
        $log->add_log("groups",$group_id,"insert"); // add a log


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

        $pri_data['call_log'] = $calllog;

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
        $pri_data['contact'] =$contact;


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
        $pri_data['account'] =$account;

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
        $pri_data['sales'] =$sales;

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
        $pri_data['user'] =$user;

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
        $pri_data['ticket'] =$ticket;

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
        $pri_data['group'] = $group;

        $pri_data['group_id'] = $group_id;

        App\privilege::create($pri_data);

        return redirect('group');
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
        $group_detail = $this->viewonegroup($id);

        return View::make('group.group_edit',compact('group_detail'));

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
        session_start();
        $loguser=$_SESSION['user_id'];

        $data = $request->all();

        $data['group_modified_by'] = $loguser;

        App\group::find($id)->update($data);


        $log = new Log;
        $log->add_log("groups",$id,"update"); // add a log


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

        $data_pri['call_log']=$calllog;

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

        $data_pri['contact']=$contact;

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

        $data_pri['account']=$account;

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

        $data_pri['sales']=$sales;

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

        $data_pri['user']=$user;

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

        $data_pri['ticket']=$ticket;

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

        $data_pri['group']=$group;

        App\privilege::where('group_id',$id)->first()->update($data_pri);

        return redirect('group');
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

        $data=['group_modified_by'=>$loguser , 'deleted' => '1'];

        App\group::find($id)->update($data);

    }

    function user_can_add_groups($table)
    {

        if($_SESSION['user_type']=='1')
        {

            $sql ="SELECT * FROM groups WHERE deleted = '0'";

        }else{

            $sql="SELECT user_group.*,groups.group_name FROM user_group
                           LEFT OUTER JOIN groups ON user_group.group_id = groups.group_id
                           WHERE user_group.user_id = '$loguser' AND (user_group.$table >'3' AND user_group.$table < '8' )";
        }

        $result = DB::select(DB::raw($sql));
        return($result);

    }

    function user_can_edit_groups($table)
    {
        $loguser=$_SESSION['user_id'];

        if($_SESSION['user_type']=='1')
        {

            $sql ="SELECT * FROM groups WHERE deleted = '0' ";

        }else{

            $sql="SELECT user_group.*,groups.group_name FROM user_group
                           LEFT OUTER JOIN groups ON user_group.group_id = groups.group_id
                           WHERE user_group.user_id = '$loguser' AND (user_group.$table ='2' OR user_group.$table = '3' OR user_group.$table = '6' OR user_group.$table = '7' )";
        }

        $result = DB::select(DB::raw($sql));
        return($result);

    }

    function viewgroupmembers($gid)
    {
        $sql="SELECT users.user_name, users.id FROM `users` INNER JOIN `user_group` ON users.id = user_group.user_id WHERE user_group.group_id = '$gid' ";
        $result = DB::select(DB::raw($sql));
        return($result);
    }

    function viewgroup()
    {

        $sql ="SELECT groups.* , owner.user_name AS owner , modi.user_name AS modi  FROM groups
												INNER JOIN users AS owner ON owner.id = groups.group_owner
												LEFT OUTER JOIN users AS modi ON modi.id = groups.group_modified_by
																											WHERE groups.deleted ='0' ";
        $result = DB::select(DB::raw($sql));
        return($result);
    }

    function viewonegroup($gid)
    {
        $sql = "SELECT groups.*, privileges.* FROM groups INNER JOIN privileges ON groups.group_id=privileges.group_id WHERE groups.group_id='$gid'  ";
        $result = DB::select(DB::raw($sql));
        return($result);
    }
}

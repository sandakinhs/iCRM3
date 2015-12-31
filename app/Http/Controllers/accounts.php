<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\Http\Requests;
use View;
use App\Http\Controllers\functions;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use DB;
use App;

class accounts extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        session_start();

        //create a session for location
        $_SESSION['loc']="account";

        //creating objects
        $pagesettings = new functions\pagesettings();

        //get selected columns
        $selected_columns = $pagesettings->fname('accounts','1');

        //get select columns names
        foreach($selected_columns AS $result){
            $column_comment=$pagesettings->viewcolumncomment($result->column_name,'accounts');

            foreach($column_comment as $result_2){
                $table_headings[]= $result_2->column_comment;
            }
        }

        $_SESSION['sort']="DESC";

        //get data for call log
        $result=$this->viewdatalimit(1000,0);

        //Get current page form url e.g. &page=6
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        //pagination starting form 0. e.g. &page=1 mean page=0
        if($currentPage != NULL) {
            $currentPage = $currentPage - 1;
        }

        //Create a new Laravel collection from the array data
        $collection = new Collection($result);

        //Define how many items we want to be visible in each page
        $perPage = 8;

        //Slice the collection to get the items to display in current page
        $currentPageSearchResults = $collection->slice($currentPage * $perPage, $perPage)->all();

        //Create our paginator and pass it to the view
        $result= new LengthAwarePaginator($currentPageSearchResults, count($collection), $perPage);

        //return this data to the view
        return View::make('account.account',compact('table_headings','selected_columns','result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        session_start();

        $group = new groups();

        $add_group_accounts = $group->user_can_add_groups('accounts');

        return view::make('account.account_create',compact('add_group_accounts'));


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

        $input=Request::all();
        $input['owner'] =$_SESSION['user_id'];

        App\account::create($input);

        return redirect('account');
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

        $account_details = App\account::find($id);

        $group = new groups();

        $edit_group_accounts = $group->user_can_edit_groups('accounts');

       // var_dump($account_details);

        return view::make('account.account_edit',compact('account_details','edit_group_accounts'));
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

        $update=Request::all();

        $update['modified_by']=$_SESSION['user_id'];

        $account = App\account::findOrFail($id);

        $account->update($update);

        return redirect('account');
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

        App\account::find($id)->update($data);
    }


    private function viewdatalimit($limit,$offset)
    {


        $sql="SELECT accounts.*,groups.group_name, users.user_name, modi.user_name AS modified, assi.user_name AS assign FROM accounts
				 	INNER JOIN groups ON groups.group_id = accounts.group_id
					INNER JOIN users ON users.id = accounts.owner
					LEFT OUTER JOIN users AS assi ON assi.id = accounts.assignedto
					LEFT OUTER JOIN users AS modi ON modi.id=accounts.modified_by WHERE accounts.deleted ='0' ";


        if(isset($_POST['submit'])){  // search account by name and type

            if($_POST['account_name']!=''){

                $sql .= "AND  accounts.account_name LIKE '$_POST[account_name]%' ";
            }

            if($_POST['account_type']!=''){

                $sql .= "AND  accounts.account_type LIKE '$_POST[account_type]%' ";
            }

            if(isset($_POST['search'])){  // advance search
                if($_POST['search']!=''){
                    $sql .="AND $_POST[field_name] LIKE '$_POST[search]%' ";
                }
            }

            $ids = join(',',$_SESSION['user_groups']); // user groups
            if($_SESSION['user_type'] != 1){

                $sql .= "AND  accounts.group_id IN ($ids) "; }

            $result = DB::select(DB::raw($sql));
            return($result);

        }else{

            $ids = join(',',$_SESSION['user_groups']); // user groups
            if($_SESSION['user_type'] != 1){

                $sql .= "AND  accounts.group_id IN ($ids) "; }

            $sql .="ORDER BY  accounts.id $_SESSION[sort] LIMIT $limit OFFSET $offset" ; //set lime and offset

            $result = DB::select(DB::raw($sql));
            return($result);

        }
    }

    public function searchaccount($aname)
    {

        $sql = "SELECT * FROM `accounts` WHERE `account_name` LIKE '$aname%' ";

        $result = DB::select(DB::raw($sql));
        return($result);
    }

    public function viewoneaccount($aid)
    {
        $sql ="SELECT * FROM `accounts` WHERE `id`='$aid'" ;
        $result = DB::select(DB::raw($sql));
        return($result);
    }

    public function account_contacts($id)
    {
        session_start();

        //create a session for location
        $_SESSION['loc']="account";

        //creating objects
        $pagesettings = new functions\pagesettings();

        //get selected columns
        $selected_columns = $pagesettings->fname('accounts','1');

        //get select columns names
        foreach($selected_columns AS $result){
            $column_comment=$pagesettings->viewcolumncomment($result->column_name,'accounts');

            foreach($column_comment as $result_2){
                $table_headings[]= $result_2->column_comment;
            }
        }

        $_SESSION['sort']="DESC";

        //get data for call log
        $result=$this->viewdatalimit(1000,0);

        //Get current page form url e.g. &page=6
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        //pagination starting form 0. e.g. &page=1 mean page=0
        if($currentPage != NULL) {
            $currentPage = $currentPage - 1;
        }

        //Create a new Laravel collection from the array data
        $collection = new Collection($result);

        //Define how many items we want to be visible in each page
        $perPage = 8;

        //Slice the collection to get the items to display in current page
        $currentPageSearchResults = $collection->slice($currentPage * $perPage, $perPage)->all();

        //Create our paginator and pass it to the view
        $result= new LengthAwarePaginator($currentPageSearchResults, count($collection), $perPage);

        //return this data to the view
        return View::make('account.account_contacts',compact('table_headings','selected_columns','result'));
    }

    public function search()
    {
        session_start();

        //create a session for location
        $_SESSION['loc']="account";

        //creating objects
        $pagesettings = new functions\pagesettings();

        //get selected columns
        $selected_columns = $pagesettings->fname('accounts','1');

        //get select columns names
        foreach($selected_columns AS $result){
            $column_comment=$pagesettings->viewcolumncomment($result->column_name,'accounts');

            foreach($column_comment as $result_2){
                $table_headings[]= $result_2->column_comment;
            }
        }

        $_SESSION['sort']="DESC";

        //get data for call log
        $result=$this->viewdatalimit(100000,0);

        //Get current page form url e.g. &page=6
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        //pagination starting form 0. e.g. &page=1 mean page=0
        if($currentPage != NULL) {
            $currentPage = $currentPage - 1;
        }

        //Create a new Laravel collection from the array data
        $collection = new Collection($result);

        //Define how many items we want to be visible in each page
        $perPage = 1000000;

        //Slice the collection to get the items to display in current page
        $currentPageSearchResults = $collection->slice($currentPage * $perPage, $perPage)->all();

        //Create our paginator and pass it to the view
        $result= new LengthAwarePaginator($currentPageSearchResults, count($collection), $perPage);

        //return this data to the view
        return View::make('account.account',compact('table_headings','selected_columns','result'));
    }
}

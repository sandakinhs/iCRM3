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


class contacts extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        session_start();

        unset($_SESSION['flag1']);
        unset($_SESSION['from']);
        unset($_SESSION['contact_assign']);
        unset($_SESSION['contact_123']);
        unset($_SESSION['contact_report_to']);

        //create a session for location
        $_SESSION['loc']="contact";

        //creating objects
        $pagesettings = new functions\pagesettings();

        //get selected columns
        $selected_columns = $pagesettings->fname('contacts','1');

        //get select columns names
        foreach($selected_columns AS $result){
            $column_comment=$pagesettings->viewcolumncomment($result->column_name,'contacts');

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
        $perPage = 10;

        //Slice the collection to get the items to display in current page
        $currentPageSearchResults = $collection->slice($currentPage * $perPage, $perPage)->all();

        //Create our paginator and pass it to the view
        $result= new LengthAwarePaginator($currentPageSearchResults, count($collection), $perPage);

        //return this data to the view
        return View::make('contact.contact',compact('table_headings','selected_columns','result'));
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

        //get contact category detials
        $contact_category_data = $this->view_c_category();

        // get user can add groups
        $add_group_contacts = $group->user_can_add_groups('contacts');

        // get user can add groups
        $add_group_accounts = $group->user_can_add_groups('account');

        return View::make('contact.contact_create',compact('contact_category_data','add_group_contacts','add_group_accounts'));
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
        $account = new App\account();
        $contact = new App\contact();

        $input=Request::all();
        $input['contact_owner'] =$loguser;


        if( $input['account_id'] == '' ){

            if($input['contact_work_companyname'] != ''){

                $toAccount=['account_name' => $input['contact_work_companyname'] ,'account_telephone' => $input['contact_work_phone'],'account_fax' => $input['contact_work_fax'],'account_email' => $input['contact_work_email1'],'owner' => $loguser,
                    'account_address_number' => $input['contact_work_address_number'], 'account_address_street' => $input['contact_work_address_street'], 'account_address_city' => $input['contact_work_address_city'], 'account_address_district' => $input['contact_work_address_district'],'group_id' => $input['group_id_2']];

                $account::create($toAccount)->contacts()->create($input);

            }else{

                $contact::create($input);

            }


        }elseif( $input['account_id'] != '' ) {

            $account::find($input['account_id'])->contacts()->create($input);

        }


        return $input;


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

        $contact = new App\contact();
        $account = new App\account();
        $group = new groups();

        $_SESSION['cid']= $id;

        $contact_detial = $contact::find($id);

        $account_detial = $account::find($contact_detial->account_id);

        if($account_detial == NULL){
            $account_detial= $contact_detial;
        }

        //get contact category detials
        $contact_category_data = $this->view_c_category();

        // get user can add groups
        $edit_group_contacts = $group->user_can_edit_groups('contacts');

        if(isset($_SESSION['contact_report_to'])){
            $report_to=$this->viewonecontact($_SESSION['contact_report_to']);
        }else{
            $report_to=$this->viewonecontact($contact_detial->contact_report_to);
        }


        return View::make('contact.contact_edit',compact('contact_detial','account_detial','contact_category_data','edit_group_contacts','report_to'));
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

        $update['contact_modified_by']=$_SESSION['user_id'];

        $contact = App\contact::findOrFail($id);

        $contact->update($update);

        return redirect('contact');

        //$update = Request::except('_method', '_token');

        //$update['contact_modified_by'] = $_SESSION['user_id'];

        //$contact::where('id',$id)->update($update);
        //$contact::where('id',$id)->save($update);
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

        $data=['contact_modified_by'=>$loguser , 'deleted' => '1'];

        App\contact::find($id)->update($data);
    }

    private function viewdatalimit($limit,$offset)
    {

        $sql="SELECT contacts.*, users.user_name, groups.group_name, assin.user_name AS Assign, contact_category.name AS Category FROM contacts
						INNER JOIN users ON contacts.contact_owner = users.id
	         			INNER JOIN groups ON contacts.group_id = groups.group_id
	         			LEFT OUTER JOIN users AS assin ON contacts.assignedto = assin.id
	         			LEFT OUTER JOIN contact_category ON contacts.contact_category = contact_category.id
	         			WHERE contacts.deleted = '0' ";


        if(isset($_POST['submit'])){  // search contact by name and number

            if($_POST['contact_no']!=''){

                $sql .= "AND contacts.contact_no LIKE '$_POST[contact_no]%' ";
            }

            if($_POST['contact_name']!=''){

                $sql .= "AND contacts.contact_firstname LIKE '$_POST[contact_name]%' ";
            }

            if(isset($_POST['search'])){	// advance search
                if($_POST['search']!=''){
                    $sql .="AND $_POST[field_name] LIKE '$_POST[search]%' ";
                }
            }


            $ids = join(',',$_SESSION['user_groups']); // user groups
            if($_SESSION['user_type'] != 1){

                $sql .= "AND contacts.group_id IN ($ids) "; }


            $result = DB::select(DB::raw($sql));
            return($result);

        }else{

            $ids = join(',',$_SESSION['user_groups']); // user groups
            if($_SESSION['user_type'] != 1){

                $sql .= "AND contacts.group_id IN ($ids) ";	}


            $sql .="ORDER BY contacts.id $_SESSION[sort] LIMIT $limit OFFSET $offset" ; //set lime and offset

            // echo $sql;
            $result = DB::select(DB::raw($sql));
            return($result);

        }

    }

    //use to get contact category
    private function view_c_category()
    {
        $sql="SELECT contact_category.* , owner.user_name AS owner_name, modi.user_name AS modi FROM contact_category
							INNER JOIN users AS owner ON owner.id = contact_category.owner
							LEFT OUTER JOIN users AS modi ON modi.id = contact_category.modified_by
                            WHERE contact_category.deleted = '0' ";
        $result = DB::select(DB::raw($sql));
        return($result);
    }

    public function viewonecontact($cid)
    {
        $sql = "SELECT * FROM `contacts` WHERE `id` = '$cid' AND `deleted` = '0' ";
        $result = DB::select(DB::raw($sql));
        return($result);
    }

    public function searchcontact($cname)
    {

        $sql="SELECT * FROM `contacts` WHERE (`contact_firstname` LIKE '$cname%' OR `contact_lastname` LIKE '$cname%') AND `deleted` = '0' ";

        if(isset($_SESSION['contact_account'])){
            if($_SESSION['contact_account']!=''){
                $sql.="AND `account_id` = '$_SESSION[contact_account]' ";
            }

        }

        $result = DB::select(DB::raw($sql));
        return($result);
    }

    public function contact_call_log($id)
    {
        session_start();



        //creating objects
        $pagesettings = new functions\pagesettings();

        //get selected columns
        $selected_columns = $pagesettings->fname('contacts','1');

        //get select columns names
        foreach($selected_columns AS $result){
            $column_comment=$pagesettings->viewcolumncomment($result->column_name,'contacts');

            foreach($column_comment as $result_2){
                $table_headings[]= $result_2->column_comment;
            }
        }

        $_SESSION['sort']="DESC";

        //get data for call log
        $result=$this->viewdatalimit_contact($id);

        //Get current page form url e.g. &page=6
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        //pagination starting form 0. e.g. &page=1 mean page=0
        if($currentPage != NULL) {
            $currentPage = $currentPage - 1;
        }

        //Create a new Laravel collection from the array data
        $collection = new Collection($result);

        //Define how many items we want to be visible in each page
        $perPage = 10;

        //Slice the collection to get the items to display in current page
        $currentPageSearchResults = $collection->slice($currentPage * $perPage, $perPage)->all();

        //Create our paginator and pass it to the view
        $result= new LengthAwarePaginator($currentPageSearchResults, count($collection), $perPage);

        //return this data to the view
        return View::make('contact.contact_call_log',compact('table_headings','selected_columns','result'));
    }


    function viewdatalimit_contact($contact)
    {

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
								                                  call_log.group=groups.group_id
								                        LEFT OUTER JOIN accounts ON
																  contacts.account_id = accounts.id
		                                                		             WHERE call_log.deleted = '0' AND call_log.cli = '$contact' " ;

        if($_SESSION['user_type'] != 1){

            $sql .= "AND call_log.group IN ($ids) ";
        }


        //$sql .="ORDER BY `id` DESC LIMIT $limit OFFSET $offset" ; //set lime and offset
        // echo $sql;

        $sql .="ORDER BY `id` DESC";

        $result = DB::select(DB::raw($sql));
        return($result);

    }

    public function cart()
    {


    }

    public function search()
    {
        session_start();

        unset($_SESSION['flag1']);
        unset($_SESSION['from']);
        unset($_SESSION['contact_assign']);
        unset($_SESSION['contact_123']);
        unset($_SESSION['contact_report_to']);

        //create a session for location
        $_SESSION['loc']="contact";

        //creating objects
        $pagesettings = new functions\pagesettings();

        //get selected columns
        $selected_columns = $pagesettings->fname('contacts','1');

        //get select columns names
        foreach($selected_columns AS $result){
            $column_comment=$pagesettings->viewcolumncomment($result->column_name,'contacts');

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
        $perPage = 100000;

        //Slice the collection to get the items to display in current page
        $currentPageSearchResults = $collection->slice($currentPage * $perPage, $perPage)->all();

        //Create our paginator and pass it to the view
        $result= new LengthAwarePaginator($currentPageSearchResults, count($collection), $perPage);

        //return this data to the view
        return View::make('contact.contact',compact('table_headings','selected_columns','result'));
    }


}

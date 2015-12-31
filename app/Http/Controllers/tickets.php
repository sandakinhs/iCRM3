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


class tickets extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session_start();

        unset($_SESSION['contact_report_to']);

        //create a session for location
        $_SESSION['loc']="ticket";

        //creating objects
        $pagesettings = new functions\pagesettings();

        //get selected columns
        $selected_columns = $pagesettings->fname('ticket','1');

        //get select columns names
        foreach($selected_columns AS $result){
            $column_comment=$pagesettings->viewcolumncomment($result->column_name,'ticket');

            foreach($column_comment as $result_2){
                $table_headings[]= $result_2->column_comment;
            }
        }

        $_SESSION['sort']="DESC";

        //get data for call log
        $result=$this->view_tickets_all(1000,0);

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
        return View::make('ticket.ticket',compact('table_headings','selected_columns','result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        session_start();

        if(isset($_SESSION['contact_report_to'])) // this will set if
        {

            $contact_details = App\contact::where('deleted','0')->where('id',$_SESSION['contact_report_to'])->first();

            return View::make('ticket.ticket_create',compact('contact_details'));

        }else{

            return View::make('ticket.ticket_create');

        }


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

        $data=Request::all();

        $data['contact_id'] =$_POST['id'];
        $data['call_log_id'] = 0 ;
        $data['owner'] = $loguser;
        $data['group_id'] = $_POST['group_id1'];
        $data['assignedto'] = $_POST['assignedto1'];

        $ticket =  App\ticket::create($data);

        $last_id_ticket = $ticket->id;

       // $log = new crm_log;
        //$log->add_log("ticket",$last_id_ticket,"insert"); // add a log

        if($_POST['problem'] != ''){

            $problem_data['ticket_id'] = $last_id_ticket;
            $problem_data['problem'] = $_POST['problem'];
            $problem_data['owner'] = $loguser;

            App\ticket_problem::create($problem_data);

        }

        return redirect('ticket');
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

        $ticket_details = App\ticket::where('deleted', '0')->where('id',$id)->first();

        $ticket_category = App\ticket_category::all();

        $group = new groups();

        // get user can add groups
        $edit_groups = $group->user_can_edit_groups('ticket');

        $problems = $this->view_problem($id);

        return View::make('ticket.ticket_edit',compact('ticket_details','ticket_category','edit_groups','problems'));
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

        $data=Request::all();

        $data['modified_by'] = $loguser;


        if($_POST['problem'] == ''){

            unset($data['problem']);

            }


        $ticket = App\ticket::findOrFail($id);

        $ticket->update($data);

//        $log = new crm_log;
//        $log->add_log("ticket",$_GET['tid'],"update"); // add a log

        if($_POST['problem'] != ''){

            $problem_data['ticket_id'] = $id;
            $problem_data['problem'] = $_POST['problem'];
            $problem_data['owner'] = $loguser;

            App\ticket_problem::create($problem_data);
        }

        return redirect('ticket');
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

        App\ticket::find($id)->update($data);
    }

    function view_tickets_all($limit,$offset)
    {

        $sql="SELECT ticket.*, contacts.contact_firstname, users.user_name, modi.user_name AS modif, assi.user_name AS assign, groups.group_name FROM ticket
						INNER JOIN contacts ON ticket.contact_id = contacts.id
						INNER JOIN users ON ticket.owner = users.id
						LEFT OUTER JOIN users AS modi ON ticket.modified_by = modi.id
						INNER JOIN users AS assi ON ticket.assignedto = assi.id
						INNER JOIN groups ON ticket.group_id = groups.group_id
							WHERE ticket.deleted = '0' ";

        if(isset($_POST['submit'])){
            // var_dump($_POST);

            if($_POST['contact']!=''){
                $sql .= "AND contacts.contact_firstname LIKE '$_POST[contact]%' ";
            }

            if($_POST['date1']!=''){
                $sql .= "AND ticket.created_time LIKE '$_POST[date1]%' ";
            }

            if(isset($_POST['search'])){
                if($_POST['search']!=''){
                    $sql .="AND $_POST[field_name] LIKE '$_POST[search]%' ";  // advance search
                }
            }

        }

        // $sql .="ORDER BY ticket.id $_SESSION[sort] " ; //set lime and offset

        $ids = join(',',$_SESSION['user_groups']); // user groups
        if($_SESSION['user_type'] != 1){

            $sql .= "AND  ticket.group_id IN ($ids) "; }


        $sql .="ORDER BY ticket.id $_SESSION[sort] LIMIT $limit OFFSET $offset" ; //set lime and offset

        // echo $sql;


        $result = DB::select(DB::raw($sql));
        return($result);

    }

    public function ticket_load()
    {

        session_start();

        $ticket_category = App\ticket_category::all();

        $group = new groups();

        // get user can add groups
        $add_groups = $group->user_can_add_groups('ticket');

        return View::make('ticket.ticket_load',compact('ticket_category','add_groups'));

    }

    function view_problem($id)
    {

        $sql="SELECT ticket_problem.*, users.user_name FROM ticket_problem
			INNER JOIN users ON ticket_problem.owner = users.id
						WHERE ticket_problem.ticket_id = '$id' ";

        $result = DB::select(DB::raw($sql));
        return($result);

    }

    public function search()
    {
        session_start();

        unset($_SESSION['contact_report_to']);

        //create a session for location
        $_SESSION['loc']="ticket";

        //creating objects
        $pagesettings = new functions\pagesettings();

        //get selected columns
        $selected_columns = $pagesettings->fname('ticket','1');

        //get select columns names
        foreach($selected_columns AS $result){
            $column_comment=$pagesettings->viewcolumncomment($result->column_name,'ticket');

            foreach($column_comment as $result_2){
                $table_headings[]= $result_2->column_comment;
            }
        }

        $_SESSION['sort']="DESC";

        //get data for call log
        $result=$this->view_tickets_all(1000,0);

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
        return View::make('ticket.ticket',compact('table_headings','selected_columns','result'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use View;
use App\Http\Controllers\functions;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use DB;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    private function viewdatalimit($limit,$offset)
    {

        $sql="SELECT contacts.*, users.user_name, groups.group_name, assin.user_name AS Assign, contact_category.name AS Category FROM contacts
						INNER JOIN users ON contacts.contact_owner = users.user_id
	         			INNER JOIN groups ON contacts.group = groups.group_id
	         			LEFT OUTER JOIN users AS assin ON contacts.assignedto = assin.user_id
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

                $sql .= "AND contacts.group IN ($ids) "; }


            $result = DB::select(DB::raw($sql));
            return($result);

        }else{

            $ids = join(',',$_SESSION['user_groups']); // user groups
            if($_SESSION['user_type'] != 1){

                $sql .= "AND contacts.group IN ($ids) ";	}


            $sql .="ORDER BY contacts.id $_SESSION[sort] LIMIT $limit OFFSET $offset" ; //set lime and offset

            // echo $sql;
            $result = DB::select(DB::raw($sql));
            return($result);

        }

    }
}

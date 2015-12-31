<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use View;
use App;

class category extends Controller
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

        $category_detail = $this->viewcategory();

        return View::make('sale.admin.category',compact('category_detail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        session_start();
        return View::make('sale.admin.category_create');
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
        $loguser=$_SESSION['user_id'];
        $data['owner'] = $loguser;

        if(isset($data['main_category'])){
            $data['main_id']=$data['main_category'];
        }else{
            $data['main_id']="0";
        }

        $last_id = App\category::create($data)->id;

        $log = new Log();
        $log->add_log("category",$last_id,"insert"); // add a log

       return redirect('category');
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
        $category_detail = App\category::where('id',$id)->where('deleted','0')->first();

        return View::make('sale.admin.category_edit',compact('category_detail'));
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
       $data = $request->all();

        session_start();
        $loguser=$_SESSION['user_id'];
        $data['modified_by'] = $loguser;

        App\category::find($id)->update($data);

        $log = new Log;
        $log->add_log("category",$_POST['id'],"update"); // add a log
        return redirect('category');
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

        App\category::find($id)->update($data);
    }

    function viewcategory()
    {

        $sql="SELECT category.*, users.user_name AS owner_name, modi.user_name AS modi FROM category
										INNER JOIN users ON category.owner = users.id
										LEFT OUTER JOIN users AS modi ON category.modified_by = modi.id WHERE category.deleted ='0' ";

        $result = DB::select(DB::raw($sql));

        return($result);

    }

    public function load_main_category()
    {
        $main_category = App\category::where('level','1')->where('deleted','0')->get();

        return View::make('sale.admin.main_category_load',compact('main_category'));
    }
}

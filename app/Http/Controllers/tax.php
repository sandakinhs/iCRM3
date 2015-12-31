<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App;
use View;

class tax extends Controller
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

        $tax_detail = $this->viewtax();

        return View::make('sale.admin.tax', compact('tax_detail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        session_start();

        return View::make('sale.admin.tax_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        session_start();
        $loguser=$_SESSION['user_id'];

        $data['owner'] = $loguser;

        $last_id = App\tax::create($data)->id;

        $log = new Log;
        $log->add_log("tax",$last_id,"insert"); // add a log

        return redirect('tax');

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

        $tax_detail = App\tax::where('id',$id)->where('deleted','0')->first();

       return View::make('sale.admin.tax_edit',compact('tax_detail'));
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
        $data = $request->all();
        $loguser=$_SESSION['user_id'];

       // $sql="UPDATE `tax` SET `code`='$_POST[code]',`name`='$_POST[name]',`description`='$_POST[description]' ,`modified_by`='$loguser',`modified_time`=SYSDATE(),`tax_code`='$_POST[tax_code]' WHERE `id` = '$_POST[id]' ";

       $data['modified_by'] = $loguser;

        App\tax::find($id)->update($data);

        $log = new Log;
        $log->add_log("tax",$id,"update"); // add a log

        return redirect('tax');
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

        App\tax::find($id)->update($data);
    }

    public function viewtax()
    {

        $sql="SELECT tax.*, users.user_name AS owner_name, modi.user_name AS modi FROM tax
										INNER JOIN users ON tax.owner = users.id
										LEFT OUTER JOIN users AS modi ON tax.modified_by = modi.id WHERE tax.deleted ='0' ";

        $result = DB::select(DB::raw($sql));

        return($result);

    }
}

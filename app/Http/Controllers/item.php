<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App;
use View;

class item extends Controller
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

        $item_details = $this -> viewitems();

        return View::make('sale.admin.item', compact('item_details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        session_start();



        $category = new category();
        $tax = new tax();

        $category_details = $category ->viewcategory();
        $tax_details = $tax->viewtax();

        return View::make('sale.admin.item_create', compact('category_details','tax_details'));
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

        $last_id = App\item::create($data)->id;

        $log = new Log();
        $log->add_log("item",$last_id,"insert"); // add a log

        return redirect('item');

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
        $item_detail = App\item::where('id',$id)->where('deleted','0')->first();

        $category = new category();
        $tax = new tax();

        $category_details = $category ->viewcategory();
        $tax_details = $tax->viewtax();

        return View::make('sale.admin.item_edit', compact('item_detail','category_details','tax_details'));
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

        $data['modified_by'] = $loguser;

        App\item::find($id)->update($data);

        $log = new Log();
        $log->add_log("item",$_POST['id'],"update"); // add a log

        return redirect('item');
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

        App\item::find($id)->update($data);
    }

    function viewitem_in_cart($cid)
    {

        $sql="SELECT * FROM `item` WHERE `category` = '$cid' AND `deleted` = '0' ";

        $result = DB::select(DB::raw($sql));
        return($result);
    }

    function viewitems()
    {

        $sql="SELECT item.*, users.user_name AS owner_name, modi.user_name AS modi, category.name AS category_name, tax.name AS tax_name FROM item
										INNER JOIN users ON item.owner = users.id
										LEFT OUTER JOIN users AS modi ON item.modified_by = modi.id
										INNER JOIN category ON item.category = category.id
										LEFT OUTER JOIN tax ON tax.id = item.tax_code
										WHERE item.deleted ='0' ";

        $result = DB::select(DB::raw($sql));

        return($result);

    }
}

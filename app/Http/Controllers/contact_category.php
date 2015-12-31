<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use View;
use App;

class contact_category extends Controller
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

        $contact_category_details = $this->view_c_category();

        return View::make('contact.category.category',compact('contact_category_details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        session_start();
        return View::make('contact.category.category_create');
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

        $data['owner'] = $loguser;

        App\contact_category::create($data);

        return redirect('contact_category');
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

        $contact_category_detail = App\contact_category::where('id',$id)->where('deleted','0')->first();

        return View::make('contact.category.category_edit',compact('contact_category_detail'));
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

        $data['modified_by'] = $loguser;

        App\contact_category::find($id)->update($data);

        return redirect('contact_category');
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

        App\contact_category::find($id)->update($data);
    }

    function view_c_category()
    {

        $sql="SELECT contact_category.* , owner.user_name AS owner_name, modi.user_name AS modi FROM contact_category
							INNER JOIN users AS owner ON owner.id = contact_category.owner
							LEFT OUTER JOIN users AS modi ON modi.id = contact_category.modified_by
                            WHERE contact_category.deleted = '0' ";

        $result = DB::select(DB::raw($sql));

        return($result);
    }
}

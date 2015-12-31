<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;
use DB;
use View;

class ticket_category extends Controller
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

        $ticket_detail = App\ticket_category::all();

        return View::make('ticket.category.ticket_category',compact('ticket_detail'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        session_start();

        return View::make('ticket.category.ticket_category_create');
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
        $data['owner'] = $_SESSION['user_id'];

        $last_id = App\ticket_category::create($data);

        $log = new Log;
        $log->add_log("ticket_category",$last_id,"insert"); // add a log

        return redirect('ticket_category');
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

        $ticket_details = App\ticket_category::find($id);

        return View::make('ticket.category.ticket_category_edit',compact('ticket_details'));
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
        $data['modified_by'] = $_SESSION['user_id'];

        App\ticket_category::find($id)->update($data);

        $log = new Log;
        $log->add_log("ticket_category",$id,"update"); // add a log

        return redirect('ticket_category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        App\ticket_category::find($id)->delete();
    }
}

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

class call_log extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session_start();

        $cart = new cart();

        $cart->delete_user_cart();  // remove cart data

        //create a session for location
        $_SESSION['loc']="call_log";

        //creating objects
        $pagesettings = new functions\pagesettings();
        $call = new functions\Call();

        //get selected columns
        $selected_columns = $pagesettings->fname('call_log','1');

        //get select columns names
        foreach($selected_columns AS $result){
             $column_comment=$pagesettings->viewcolumncomment($result->column_name,'call_log');

            foreach($column_comment as $result_2){
                $table_headings[]= $result_2->column_comment;
            }
        }


        $_SESSION['sort']="DESC";

        //get data for call log
        $result=$call->viewdatalimit(1000,0);

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
        return View::make('call_log.call_log_view',compact('table_headings','selected_columns','result'));
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
        session_start();

        $loguser=$_SESSION['user_id'];

        $input=Request::except('tax');

//        var_dump($input);
//
//        die();

       if(isset($_GET['cid'])){

           $input['contact_id'] = $_GET['cid'];
           $input['customer_id']=$_GET['cid'];

       }else{

           $input['contact_no'] = $input['cli'];
           $input['contact_owner'] = $loguser;
           $input['contact_id'] = App\contact::create($input)->id;
           $input['customer_id'] = $input['contact_id'];

       }

           $input['call_owner'] = $loguser;
           $input['assignedto'] = $input['assignedto1'];
           $input['group_id'] = $input['group_id1'];


           $last_id = App\call_log::create($input)->id;

           $input['call_log_id'] = $last_id;

           if($input['call_type'] == "Inquiry")
           {
               if($input['status']=="complete"){
                   $endtime=date('Y-m-d H:i:s');
               }else{
                   $endtime=NULL;
               }

               $input['inquiry_end_time'] = $endtime;

               App\inquiry::create($input);

           }
           elseif($input['call_type'] == "Sales")
           {


               $input['owner_id']= $loguser;
               $input['total']= $_POST['sub_total'];

               $sale =  App\sale::create($input);
               $last_id1 = $sale->id;

               //$log = new crm_log;
               //$log->add_log("sales",$last_id1,"insert"); // add a log


               $cart_details = App\cart::where('user', $loguser)->get();


               foreach ($cart_details as $row4) {      // select data from cart table

                   $input = ['category' => $row4->category, 'product' => $row4->product, 'price' => $row4->price, 'sale_id' => $last_id1, 'qty' => $row4->qty, 'tax' => $row4->tax, 'discount' => $row4->discount];

                   $last_sp_id = DB::table('sales_product')->insertGetId($input);

                   //$sql5="INSERT INTO `sales_product`(`id`, `category`, `product`,`price`,`sale_id`, `qty`, `tax`, `discount`) VALUES(NULL,'$row4[category]','$row4[product]','$row4[price]','$last_id1','$row4[qty]','$row4[tax]','$row4[discount]')";


                   $cart_tax_details = App\cart_tax::where('cart_id', $row4->id)->get();

                   foreach ($cart_tax_details as $row6) {

                       $sql_s = "INSERT INTO `s_p_tax`(`s_p_id`, `tax_id`, `tax_name`, `tax_value`, `user`) VALUES ('$last_sp_id','$row6->tax_id','$row6->tax_name','$row6->tax_value','$loguser')";
                       DB::insert(DB::raw($sql_s));  // add data to sales product tax table

                   }
               }

               $cart = new cart();

               $cart->delete_user_cart();  // remove cart data

           }
           elseif($input['call_type'] == "Tickets")
           {
               $input['owner'] = $loguser;

               $ticket_id = App\ticket::create($input)->id;

               $input['last_id_ticket'] = $ticket_id;

               App\ticket_problem::create($input);

           }



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

        $call_log_detials = App\call_log::where('deleted','0')->find($id);

        $group = new groups();

        if($call_log_detials->call_type == "Sales")
        {

            $edit_group = $group->user_can_edit_groups('sales');

            $sales_detials = App\sale::where('call_log_id',$id)->where('deleted','0')->first();

            return View::make('call_log.call_log_edit', compact('sales_detials','edit_group','call_log_detials'));

        }elseif($call_log_detials->call_type == "Inquiry")
        {
            $edit_group = $group->user_can_edit_groups('inquiry');

            $inquiry_details = App\inquiry::where('call_log_id',$id)->first();

            return View::make('call_log.call_log_edit', compact('inquiry_details','edit_group','call_log_detials'));

        }elseif($call_log_detials->call_type == "Tickets")
        {
            $edit_group = $group->user_can_edit_groups('tickets');

            $ticket_detials = App\ticket::where('call_log_id',$id)->where('deleted','0')->first();

            $ticket_cat = App\ticket_category::all();

            $problem = new tickets();

            $ticket_problems = $problem->view_problem($ticket_detials->id);

            return View::make('call_log.call_log_edit', compact('ticket_detials','edit_group','ticket_cat','ticket_problems','call_log_detials'));
        }

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

        $log = new Log();
        $data=Request::all();

        $loguser=$_SESSION['user_id'];



        $call_log_detials = App\call_log::where('deleted','0')->find($id);

        if($call_log_detials->call_type == "Sales"){


            $sales_detail = App\sale::where('call_log_id',$id)->first();
            $row=$sales_detail;

            if($_POST['status'] != $row->status)
            {

                $data_status = ['sales_id'=>$row->id, 'new_status' => $data['status'] , 'old_status' => $row->status, 'changed_by' =>$loguser ];
                App\status_history::create($data_status);

            }

            $data_call_log = ['call_modified_by' => $loguser, 'assignedto'=> $data['assignedto'] , 'group_id' => $data['group_id'] ];
            App\call_log::find($id)->update($data_call_log);

            $log->add_log("call_log",$id,"update"); // add a log

            $data['modified_by'] = $loguser;
            App\sale::find($row->id)->update($data);

            $log->add_log("sales",$row->id,"update"); // add a log    id must change


        }
        elseif($call_log_detials->call_type == "Inquiry")
        {
            $data_call_log = ['call_modified_by' => $loguser, 'assignedto'=> $data['assignedto'] , 'group_id' => $data['group_id'] ];
            App\call_log::find($id)->update($data_call_log);

            $log->add_log("call_log",$id,"update"); // add a log

            $inquiry_detail = App\inquiry::where('call_log_id',$id)->first();
            $row=$inquiry_detail;


            if($data['status']=="complete")
            {
                $endtime=date('Y-m-d H:i:s');
            }else
            {
                $endtime=NULL;
            }


            $data['inquiry_end_time'] = $endtime;
            App\inquiry::find($row->id)->update($data);

            $log->add_log("inquiry",$row->id,"update"); // add a log



        }
        elseif($call_log_detials->call_type == "Tickets")
        {

            $data_call_log = ['call_modified_by' => $loguser, 'assignedto'=> $data['assignedto'] , 'group_id' => $data['group_id'] ];
            App\call_log::find($id)->update($data_call_log);

            $log->add_log("call_log",$id,"update"); // add a log

            $ticket_detail = App\ticket::where('call_log_id',$id)->first();
            $row=$ticket_detail;

            $data['modified_by'] = $loguser;
            App\ticket::find($row->id)->update($data);

            $log->add_log("ticket",$row->id,"update"); // add a log

            if($data['problem'] != ''){

                $data_ticket_problem = ['ticket_id' => $row->id,'problem' => $data['problem'], 'owner'=> $loguser ];
                App\ticket_problem::create($data_ticket_problem);

            }

        }

        return redirect('call_log');
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

        $data=['call_modified_by'=>$loguser , 'deleted' => '1'];

        App\call_log::find($id)->update($data);
    }

    public  function test()
    {
//        $data= DB::table('contacts');
        $sql="SELECT * FROM `contacts`";
        $data1 = DB::select(DB::raw($sql));



        //Get current page form url e.g. &page=6
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        //Create a new Laravel collection from the array data
        $collection = new Collection($data1);

        //Define how many items we want to be visible in each page
        $perPage = 10;

        //Slice the collection to get the items to display in current page
        $currentPageSearchResults = $collection->slice($currentPage * $perPage, $perPage)->all();

        //Create our paginator and pass it to the view
        $data= new LengthAwarePaginator($currentPageSearchResults, count($collection), $perPage);

        return View::make('view',compact('data'));

    }

    public function search_contact()
    {
        session_start();

        if (isset($_POST['Submit'])){


            return View::make('call_log.new_call');
            //echo '<script>window.location.href="new_call.php?cli='.$_POST['contact_number'].'";</script> ';

        }

        return View::make('call_log.search');

    }

    public function new_call()
    {
        session_start();

        $group = new groups();

        if(isset($_GET['cid'])){

            $contact = App\contact::where('id',$_GET['cid'])->first();

            $calls = App\call_log::where('contact_id',$_GET['cid'])
                ->where('deleted','0')
                ->orderby('id','desc')
                ->take(5)->get();

            $_SESSION['cid'] = $contact->id;

            return View::make('call_log.call_log_create', compact('contact','calls'));

        }

        $_SESSION['cli']= $_POST['contact_number'];

        $count= $this->checkcall($_POST['contact_number']);

        if($count==0)
        {

            $_SESSION['cid']=NULL;

            $add_group_contacts = $group->user_can_add_groups('contacts');

            return View::make('call_log.call_log_create',compact('add_group_contacts'));

        }
        elseif ($count==1)
        {

            $contact = App\contact::where(function($query)
            {
                $query->where('contact_no',$_POST['contact_number']);
                $query->orwhere('contact_mobile2' , $_POST['contact_number']);
                $query->orwhere('contact_work_phone' ,$_POST['contact_number']);
            })
                ->where('deleted','0')->first();

            $calls = App\call_log::where('cli',$_POST['contact_number'])
                                 ->where('deleted','0')
                                 ->orderby('id','desc')
                                 ->take(5)->get();

            $_SESSION['cid'] = $contact->id;

            return View::make('call_log.call_log_create', compact('contact','calls'));

        }
        elseif ($count==3)      // more than 2 customers found
        {

            $contact = App\contact::where(function($query)
            {
                $query->where('contact_no',$_POST['contact_number']);
                $query->orwhere('contact_mobile2' , $_POST['contact_number']);
                $query->orwhere('contact_work_phone' ,$_POST['contact_number']);
            })
                ->where('deleted','0')->get();

            return View::make('call_log.new_call', compact('contact'));
       }

    }


    public function checkcall($cli)
    {

        $contact = App\contact::where('deleted','0')->where('contact_no', $cli)->first();

        if($contact)
        {
           return(1);

        }else
        {

            $count = App\contact::where('deleted','0')->where('contact_mobile2',$cli)->orwhere('contact_work_phone',$cli)->count();

                if( $count==0 ){ return(0); }
                elseif ( $count==1 ) { return(1); }
                elseif ( $count>1 ){ return(3); }

        }

    }

    public function load_remark()
    {
        session_start();

        $group = new groups();

        // get user can add groups
        $add_group_contacts = $group->user_can_add_groups('call_log');

        return View::make('call_log.load.remark', compact('add_group_contacts'));

    }

    public function load_sale()
    {
        session_start();

        $category = new category();
        $tax = new tax();
        $group = new groups();

        $categories = $category ->viewcategory();

        $taxs = $tax->viewtax();

        $add_group_sales = $group->user_can_add_groups('sales');

        return View::make('call_log.load.sale', compact('categories','taxs','add_group_sales'));

    }

    public function load_ticket()
    {
        session_start();

        $ticket_category = App\ticket_category::all();

        $group = new groups();

        // get user can add groups
        $add_groups = $group->user_can_add_groups('ticket');


        return View::make('call_log.load.ticket', compact('ticket_category','add_groups'));
    }

    public function search()
    {
        session_start();

        $cart = new cart();

        $cart->delete_user_cart();  // remove cart data

        //create a session for location
        $_SESSION['loc']="call_log";

        //creating objects
        $pagesettings = new functions\pagesettings();
        $call = new functions\Call();

        //get selected columns
        $selected_columns = $pagesettings->fname('call_log','1');

        //get select columns names
        foreach($selected_columns AS $result){
            $column_comment=$pagesettings->viewcolumncomment($result->column_name,'call_log');

            foreach($column_comment as $result_2){
                $table_headings[]= $result_2->column_comment;
            }
        }


        $_SESSION['sort']="DESC";

        //get data for call log
        $result=$call->viewdatalimit(1000,0);

        //Get current page form url e.g. &page=6
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        //pagination starting form 0. e.g. &page=1 mean page=0
        if($currentPage != NULL) {
            $currentPage = $currentPage - 1;
        }

        //Create a new Laravel collection from the array data
        $collection = new Collection($result);

        //Define how many items we want to be visible in each page
        $perPage = 10000;

        //Slice the collection to get the items to display in current page
        $currentPageSearchResults = $collection->slice($currentPage * $perPage, $perPage)->all();

        //Create our paginator and pass it to the view
        $result= new LengthAwarePaginator($currentPageSearchResults, count($collection), $perPage);

        //return this data to the view
        return View::make('call_log.call_log_view',compact('table_headings','selected_columns','result'));
    }
}

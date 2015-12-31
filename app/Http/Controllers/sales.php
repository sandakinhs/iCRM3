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

class sales extends Controller
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

        unset($_SESSION['contact_report_to']);

        //create a session for location
        $_SESSION['loc']="sale";

        //creating objects
        $pagesettings = new functions\pagesettings();

        //get selected columns
        $selected_columns = $pagesettings->fname('sales','1');

        //get select columns names
        foreach($selected_columns AS $result){
            $column_comment=$pagesettings->viewcolumncomment($result->column_name,'sales');

            foreach($column_comment as $result_2){
                $table_headings[]= $result_2->column_comment;
            }
        }

        $_SESSION['sort']="DESC";

        //get data for call log
        $result=$this->view_sales_limit(1000,0);

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
        return View::make('sale.sale',compact('table_headings','selected_columns','result'));
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

        // get user can add groups
        $add_group_sales = $group->user_can_add_groups('sales');

        if(isset($_SESSION['contact_report_to'])) // this will set if
        {

            $contact_detial = App\contact::findOrFail($_SESSION['contact_report_to']);

            return View::make('sale.sales_create',compact('add_group_sales','contact_detial'));

        }

        return View::make('sale.sales_create',compact('add_group_sales'));
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

        $data=Request::except('tax');

        $data['customer_id']=$_SESSION['contact_report_to'];
        $data['call_log_id']= 0 ;
        $data['owner_id']= $loguser;
        $data['total']= $_POST['sub_total'];


        $sale =  App\sale::create($data);
        $last_id1 = $sale->id;

        //$sql3="INSERT INTO `sales`(`id`,`call_log_id`, `customer_id`, `category_id`,`product_id`, `qty`, `owner_id`, `created_time`, `modified_by`, `modified_time`, `assignedto`, `tax`, `discount`, `total`, `status`,  `account_id`, `date`, `remark`,`group`) VALUES
								//(NULL,'0','$_SESSION[contact_report_to]',NULL,NULL,NULL,'$loguser',SYSDATE(),NULL,NULL,'$_POST[assigned_to]',NULL,NULL,'$_POST[sub_total]','$_POST[status]',NULL,'$_POST[date]','$_POST[remark1]','$_POST[group_id]')";



        //$log = new crm_log;
        //$log->add_log("sales",$last_id1,"insert"); // add a log


        $cart_details = App\cart::where('user', $loguser)->get();


            foreach ($cart_details as $row4) {      // select data from cart table

            $data = ['category' => $row4->category, 'product' => $row4->product, 'price' => $row4->price, 'sale_id' => $last_id1, 'qty' => $row4->qty, 'tax' => $row4->tax, 'discount' => $row4->discount];

                $last_sp_id = DB::table('sales_product')->insertGetId($data);

            //$sql5="INSERT INTO `sales_product`(`id`, `category`, `product`,`price`,`sale_id`, `qty`, `tax`, `discount`) VALUES(NULL,'$row4[category]','$row4[product]','$row4[price]','$last_id1','$row4[qty]','$row4[tax]','$row4[discount]')";


            $cart_tax_details= App\cart_tax::where('cart_id',$row4->id)->get();

            foreach ($cart_tax_details as $row6) {

                $sql_s="INSERT INTO `s_p_tax`(`s_p_id`, `tax_id`, `tax_name`, `tax_value`, `user`) VALUES ('$last_sp_id','$row6->tax_id','$row6->tax_name','$row6->tax_value','$loguser')"	;
                DB::insert(DB::raw($sql_s));  // add data to sales product tax table

            }

        }

        App\cart::where('user', $loguser)->delete();

        App\cart_tax::where('user', $loguser)->delete();

        return redirect('sale');

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
        $cart = new cart();
        $group = new groups();


            $cart->delete_user_cart();  // remove cart data
            $cart->add_cart_edit($id);   // add sales product to cart

            unset($_SESSION['form_cart_edit']);


        $one_sale = $this->view_one_sale($id);

        $user_can_edit_group = $group->user_can_edit_groups('sales');


        return View::make('sale.sales_edit',compact('one_sale','user_can_edit_group'));

        if(isset($_POST['sales'])){   // check if submit button click or not

           // $sales->edit_sale($_GET['lid']);  //edit sales data

            echo '<script>window.location.href="'.$_SERVER['PHP_SELF'].'?loc=sales&action=view&alert=successful";</script> ';
        }else{


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
        $this->edit_sale($id);

        return redirect('sale');
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

        App\sale::find($id)->update($data);
    }

    private function view_sales_limit($limit,$offset)
    {

        $sql="SELECT sales.*, contacts.contact_firstname, owners.user_name AS owner, moddi.user_name AS moddi, assi.user_name AS assigned, groups.group_name  FROM sales
							INNER JOIN contacts ON sales.customer_id = contacts.id
							INNER JOIN users AS owners ON sales.owner_id = owners.id
							LEFT OUTER JOIN users AS moddi ON sales.modified_by = moddi.id
							LEFT OUTER JOIN users AS assi ON sales.assignedto = assi.id
							INNER JOIN groups ON sales.group_id = groups.group_id
							WHERE sales.deleted ='0' ";

        if(isset($_POST['submit'])){  // search contact by name and number

            if($_POST['name']!=''){

                $sql .= "AND contacts.contact_firstname LIKE '$_POST[name]%' ";
            }

            if($_POST['fdate']!=''){

                $sql .= "AND sales.created_time BETWEEN '$_POST[fdate] 00:00:00' AND '$_POST[tdate] 23:59:59' ";
            }

            if(isset($_POST['search'])){
                if($_POST['search']!=''){

                    if($_POST['field_name']=="value_e"){

                        $sql .="AND sales.total = '$_POST[search]' ";

                    }elseif ($_POST['field_name']=="value_p") {

                        $sql .="AND sales.total < '$_POST[search]' ";

                    }elseif ($_POST['field_name']=="value_m") {

                        $sql .="AND sales.total > '$_POST[search]' ";

                    }else{
                        $sql .="AND $_POST[field_name] LIKE '$_POST[search]%' ";
                    }
                }
            }

        }

        $ids = join(',',$_SESSION['user_groups']); // user groups
        if($_SESSION['user_type'] != 1){

            $sql .= "AND sales.group_id IN ($ids) ";
        }

        $sql .="ORDER BY sales.id $_SESSION[sort] LIMIT $limit OFFSET $offset" ; //set lime and offset

        // echo $sql;

        $result = DB::select(DB::raw($sql));
        return($result);

    }

    public function sale_add_products()
    {
        session_start();
        $category = new category();
        $tax = new tax();

        $categories = $category ->viewcategory();

        $taxs = $tax->viewtax();

        return View::make('sale.sale_add_products', compact('categories','taxs'));
    }

    public function products_load()
    {
        session_start();

        $item = new item();

        if(isset($_POST['cat_id'])){
            $_SESSION['cat_id']=$_POST['cat_id'];
        }

        $items_in_cart = $item->viewitem_in_cart($_SESSION['cat_id']);

        return View::make('sale.products_load', compact('items_in_cart'));
    }

    public function price_load()
    {
        session_start();

        if(isset($_POST['p_id'])){
            $_SESSION['price_load_p_id']=$_POST['p_id'];
        }

        $sql="SELECT `unit_price` FROM `item` WHERE `id` = '$_SESSION[price_load_p_id]' ";
        $result = DB::select(DB::raw($sql));

        return View::make('sale.price_load', compact('result'));
    }

    function view_one_sale($id)
    {

        $sql="SELECT sales.*,sales.id AS order_num,sales.group_id AS sgroup, sales.assignedto AS asi1, contacts.* , owners.user_name AS owner, moddi.user_name AS moddi,accounts.account_name, assi.user_name AS assig FROM sales
							INNER JOIN contacts ON sales.customer_id = contacts.id
							INNER JOIN users AS owners ON sales.owner_id = owners.id
							LEFT OUTER JOIN users AS moddi ON sales.modified_by = moddi.id
							LEFT OUTER JOIN users AS assi ON sales.assignedto = assi.id
							LEFT OUTER JOIN accounts ON contacts.account_id = accounts.id
							WHERE sales.deleted ='0' AND sales.id ='$id' ";

        $result = DB::select(DB::raw($sql));
        return($result);

    }

    public function sale_edit_load()
    {

        $category = new category();
        $tax = new tax();

        $category_details = $category->viewcategory();
        $tax_details = $tax->viewtax();

        return View::make('sale.sales_edit_load', compact('category_details','tax_details'));
    }

    function edit_sale($id){

        $loguser=$_SESSION['user_id'];


        $sale_select = App\sale::where('id',$id)->first();

        $row=$sale_select;

        if($_POST['status'] != $row->status){
            $sql_status="INSERT INTO `status_history`(`sales_id`, `new_status`, `old_status`,`changed_by`) VALUES ('$id','$_POST[status]','$row[status]','$loguser')";
            DB::insert(DB::raw($sql_status));
        }

        $sql="UPDATE `sales` SET `status`='$_POST[status]' , `date`='$_POST[date]' , `remark`='$_POST[remark]' ,`group_id`='$_POST[group_id]' , `assignedto`='$_POST[assignedto]' ,`modified_by`='$loguser',`modified_time`=SYSDATE(), `total`='$_POST[sub_total]' WHERE `id` = '$id' ";
        DB::update(DB::raw($sql));


        //$log = new crm_log;
        //$log->add_log("sales",$id,"update"); // add a log

        $sql5="DELETE FROM `sales_product` WHERE `sale_id` = '$id'";
        DB::delete(DB::raw($sql5));


        $sql4="SELECT * FROM `cart` WHERE `user` = '$loguser' ";
        $cart_details = DB::select(DB::raw($sql4));

        foreach ($cart_details as $row4) {      // select data from cart table

            $sql5="INSERT INTO `sales_product`(`id`, `category`, `product`,`price`,`sale_id`, `qty`, `tax`, `discount`) VALUES(NULL,'$row4->category','$row4->product','$row4->price','$id','$row4->qty','$row4->tax','$row4->discount')";
            DB::insert(DB::raw($sql5));  // add data to sales product table

            $sql5="DELETE FROM `cart` WHERE `user` = '$loguser'";
            DB::insert(DB::raw($sql5));  // delete data from cart

        }



    }

    public function cart_edit($id)
    {
        $cart = new cart();
        $tax = new tax();

        $cart_item = $cart->view_cart_oneitem($id);
        $tax_details = $tax->viewtax();

        return View::make('sale.cart_edit', compact('cart_item','tax_details'));
    }

    public function cart_edit_update($id)
    {
        session_start();
        $loguser=$_SESSION['user_id'];


        $sql= "DELETE FROM `cart_tax` WHERE `cart_id` = '$id'";
        DB::delete(DB::raw($sql));

        $t_tax=0;

        if(isset($_POST['tax'])) {

            foreach ($_POST['tax'] as $value) {

                //$sql1 = "SELECT tax_code,name FROM `tax` WHERE `id` = '$value'";
                $row = App\tax::first($value);

                var_dump($row);
                $t_tax = $t_tax + $row->tax_code;

                $sql = "INSERT INTO `cart_tax`(`cart_id`, `tax_id`,`tax_name`,`tax_value`,`user`) VALUES ('$id','$value','$row->name','$row->tax_code','$loguser')";
                mysqli_query($conn, $sql) or trigger_error("SQL", E_USER_ERROR);

            }

        }


        $sql="UPDATE `cart` SET `qty`='$_POST[qty]',`tax`='$t_tax',`discount`='$_POST[discount]',`price`='$_POST[price]' WHERE `id` = '$id' ";
        DB::update(DB::raw($sql));



        return View::make('sale.cart_edit');
    }

    public function search()
    {
        session_start();

        $cart = new cart();

        $cart->delete_user_cart();  // remove cart data

        unset($_SESSION['contact_report_to']);

        //create a session for location
        $_SESSION['loc']="sale";

        //creating objects
        $pagesettings = new functions\pagesettings();

        //get selected columns
        $selected_columns = $pagesettings->fname('sales','1');

        //get select columns names
        foreach($selected_columns AS $result){
            $column_comment=$pagesettings->viewcolumncomment($result->column_name,'sales');

            foreach($column_comment as $result_2){
                $table_headings[]= $result_2->column_comment;
            }
        }

        $_SESSION['sort']="DESC";

        //get data for call log
        $result=$this->view_sales_limit(1000,0);

        //Get current page form url e.g. &page=6
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        //pagination starting form 0. e.g. &page=1 mean page=0
        if($currentPage != NULL) {
            $currentPage = $currentPage - 1;
        }

        //Create a new Laravel collection from the array data
        $collection = new Collection($result);

        //Define how many items we want to be visible in each page
        $perPage = 10000000;

        //Slice the collection to get the items to display in current page
        $currentPageSearchResults = $collection->slice($currentPage * $perPage, $perPage)->all();

        //Create our paginator and pass it to the view
        $result= new LengthAwarePaginator($currentPageSearchResults, count($collection), $perPage);

        //return this data to the view
        return View::make('sale.sale',compact('table_headings','selected_columns','result'));
    }

}

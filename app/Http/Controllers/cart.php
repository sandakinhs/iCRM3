<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use View;

class cart extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session_start();
        $cart_product = $this->view_cart();

        return View::make('sale.cart', compact('cart_product'));
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

        if(isset($_POST['category'])){
            $this->add_cart();
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

    function view_cart(){

        $loguser=$_SESSION['user_id'];

        $sql="SELECT cart. *, category.name AS category_name, item.name AS product_name FROM cart
													INNER JOIN category ON category.id = cart.category
													INNER JOIN item ON item.id = cart.product WHERE user='$loguser' ";

        $result = DB::select(DB::raw($sql));
        return($result);

    }

    function add_cart()
    {

        $loguser=$_SESSION['user_id'];


        $last_id = DB::table('cart')->insertGetId(
            ['category' => $_POST['category'] , 'product' => $_POST['product'], 'qty' => $_POST['qty_'], 'discount' => $_POST['discount'], 'user' => $loguser , 'price' => $_POST['price']  ]
        );


        $t_tax=0;

        if(isset($_POST['tax'])) {

            if($_POST['tax'] != 0)
            {

                foreach ($_POST['tax'] as $value) {

                    $sql1 = "SELECT tax_code,name FROM `tax` WHERE `id` = '$value'";
                    $result = DB::select(DB::raw($sql1));

                    foreach ($result as $row) {

                        $t_tax = $t_tax + $row->tax_code;

                        $sql = "INSERT INTO `cart_tax`(`cart_id`, `tax_id`,`tax_name`,`tax_value`,`user`) VALUES ('$last_id','$value','$row->name','$row->tax_code','$loguser')";
                        DB::insert(DB::raw($sql));

                    }
                }
            }

            $sql = "UPDATE `cart` SET `tax`='$t_tax' WHERE `id` = '$last_id'";
            DB::update(DB::raw($sql));

        }

        //return(1);

    }

    function remove_cart(){


        $id=$_POST['id'];

        $sql="DELETE FROM `cart` WHERE `id`='$id' ";
        DB::delete(DB::raw($sql));

        $sql= "DELETE FROM `cart_tax` WHERE `cart_id` = '$id'";
        DB::delete(DB::raw($sql));

    }

    function delete_user_cart(){

        $loguser=$_SESSION['user_id'];

        $sql="DELETE FROM `cart` WHERE `user` = '$loguser'";
        DB::delete(DB::raw($sql));  // delete data from cart

        $sql= "DELETE FROM `cart_tax` WHERE `user` = '$loguser'";
        DB::delete(DB::raw($sql));


    }

    function add_cart_edit($id)
    {

        $loguser=$_SESSION['user_id'];


        $sql1 = " SELECT * FROM `sales_product` WHERE `sale_id` = '$id' ";
        $s_product = DB::select(DB::raw($sql1));

        foreach ($s_product as $row1) {

            $sql="INSERT INTO `cart`(`category`, `product`, `qty`, `tax`, `discount`, `user`,`price`) VALUES ($row1->category,$row1->product,$row1->qty,$row1->tax,$row1->discount,$loguser,$row1->price)";
             DB::insert(DB::raw($sql));

        }

        return(1);

    }

    function view_cart_oneitem($id){

        $sql="SELECT cart. *, category.name AS category_name, item.name AS product_name FROM cart
													INNER JOIN category ON category.id = cart.category
													INNER JOIN item ON item.id = cart.product WHERE cart.id = '$id' ";

        $result = DB::select(DB::raw($sql));

        return($result);

    }
}

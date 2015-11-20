@extends('app')

@section('content')

    <style>
        .modal-dialog{
            position: absolute;
            left: 60%;
            margin-left: -312px;
            height: 500px;
            top: 45%;
            margin-top: -150px;
            width: 350px;
        }
        .control-label{
            text-align: right;
        }
        .table th, .table td {
            border-top: none !important;
        }
        .table tbody>tr>td{
            vertical-align: top;
        }
        .navbar-fixed-top {
            padding-top: 0;
        }
    </style>

    <?php


    // session_start();
    $status=null;
    if(isset($_POST['Submit'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $status = 'Invalid User Id or Password !';

//    $this->load->model('login_model');

        $status = $this->login_model->test123('aa');

        echo $status;
//$status=$ob1->logincheck($username,$password);   //check user name and password
//}
//if($status==1)
//{
//	$_SESSION['login_user']= $username;
//    header("Location:main.php?loc=home");
//}elseif ($status==5) {
//    header("Location:s_admin.php");
//}else {

        echo $status;
    }
    ?>

    <html>
    <body>


    <div class="row">

        <div class="col-md-4">
            &nbsp&nbsp<a href="http://iphonik.com" ><img src="jquery/images/iplogo.png"></a>

        </div>
        <div class="col-md-4"><h1 align="center">Welcome To iCRM</h1></div>
        <div class="col-md-4"><div class="pull-right">
                <a href="http://iphonik.com" target="blank"><img src="jquery/images/icrm.png"></a>&nbsp&nbsp
            </div>
        </div>
    </div>


    <form class="form" id="form1" name="loginform" method="post" action="form/index_submit">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div id="loginModal" class="modal show" role="dialog" aria-hidden="true" id="dd">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> -->
                        <!-- <div class="alert alert-success" role="alert"><h4 class="text-center"> Login Page</h4></div> -->
                        <h4 class="text-center">iCRM Login</h4>

                    </div>
                    <div class="modal-body">
                        <table class="table">
                            <tr>
                                <td> <label class="control-label"><h5 > User Name: </h5></label></td>
                                <td><input type="text" class="form-control" id="username" name="username"    ></td>
                            </tr>

                            <tr>
                                <td><label class="control-label"><h5>Password:</h5></label></td>
                                <td><input type="password" class="form-control  " id="password" name="password"></td>
                            </tr>
                            <tr>
                                <td   >
                                    <button class="btn btn-success    pull-left"  type="submit" name="Submit">
                                        Sign In <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                </td>
                                <td  >

                                    <button class="btn btn-primary     pull-right" type="reset" name="reset" value="reset" id="checkBtn">
                                        Cancel <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    </button>
                                </td>
                            </tr>
                        </table>

                    </div>
                    <div class="modal-footer">
                        <div class="col-md-12">
                            <?php
                            if (isset($status)) {

                            if($status=="0"){ ?>

                            <div class="alert alert-danger">
                                Username or Password Incorrect !!
                            </div>

                            <?php }else {
                                echo '<div class="alert alert-danger">
                    User Already Logged In ip'.$status.'!!
                </div>';
                            }
                            }
                            if(isset($_GET['logout'])){
                                echo  '<div class="alert alert-danger">
                   User Login Form Different Browser !!
                   </div>';
                            }
                            ?>
                                    <!-- <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button> -->


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>




@stop

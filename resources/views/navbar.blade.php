<script type="text/javascript" src="{{ asset("assets/js/external/jquery/jquery.js") }}"></script>
<script type="text/javascript" src="{{ asset("assets/js/jquery-ui.js") }}"></script>
<script type="text/javascript" src="{{ asset("assets/js/bootstrap.min.js") }}"></script>
<link rel="stylesheet" href="{{ asset("assets/css/bootstrap.min.css") }}" />
<link href="{{ asset("assets/css/jquery-ui.css") }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset("assets/css/custom-style.css") }}" />



    <script type="text/javascript">
        (function($){  // admin page settings drop down menu
            $(document).ready(function(){

//      $(your_div_element).load('controller/method');

                $('ul.dropdown-menu [data-toggle=dropdown]').on('click', function(event) {
                    event.preventDefault();
                    event.stopPropagation();
                    $(this).parent().siblings().removeClass('open');
                    $(this).parent().toggleClass('open');

                });
            });
        })(jQuery);
    </script>


    <?php

    //session_start();
    //include_once('checklogin.php');  // check if user is log or not
    // var_dump($_SESSION);
    // echo date("Y-m-d");

    //function echoActiveClassIfRequestMatches($requestUri)
    //{
    //    $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");
    //    if ($current_file_name == $requestUri)
    //        echo 'class="active"';
    //}

      //      $loc=$_GET['loc'];
        $loc = $_SESSION['loc'];

    ?>
    <html>
    <head>
        <title></title>
        <style>
        </style>

    </head>
    <body>

    <table style="width:100%">
        <tr>
            <td>&nbsp</td>
        </tr>
        <tr>
            <td style="width:30%"><a  href="http://iphonik.com" target="blank"> &nbsp <img src="{{ asset("assets/images/iplogo.png") }}"></a></td>
            <td style="width:55%"><font size="5">Phonik-IP CRM </font></td>
            <td style="width:15%"><aa>Welcome</aa>&nbsp<a href="<?php $_SERVER['PHP_SELF']?>?loc=settings"><?php echo $_SESSION['login_user']; ?></a>&nbsp &nbsp<a1>Logout</a1>&nbsp<a href="logout" class="glyphicon glyphicon-log-out"></a><br><a1>version 3.5.13 </a1></td>
        </tr>
    </table>

    <div class="row">
        <div class="col-sm-12">
            <nav class="navbar navbar-default" >
                <ul class="nav navbar-nav">
                    <li <?php if ($loc == "home") {echo 'class="active"';} ?> ><a href="{{asset('home?loc=home')}}">Home</a></li>

                    <li <?php if ($loc == "call_log") {echo 'class="active"';} ?> ><a href="{{asset('call_log?loc=call_log')}}">Call Log</a></li>

                    <li <?php if ($loc == "contact") {echo 'class="active"';} ?> ><a href="{{asset('contact?loc=contact')}}">Contact</a></li>

                    <li <?php if ($loc == "account") {echo 'class="active"';} ?> ><a href="{{asset('account?loc=account')}}">Account</a></li>

                    <?php
                    //              if($_SESSION['per_sales'] == 1){
                    ?>
                    <li <?php if ($loc == "sale") {echo 'class="active"';} ?> ><a href="{{asset('sale?loc=sale')}}">Sales</a></li>
                    <?php
                    //              }
                    //              if($_SESSION['per_tickets']== 1){
                    ?>
                    <li <?php if ($loc == "ticket") {echo 'class="active"';} ?> ><a href="{{asset('ticket?loc=ticket')}}">Ticket</a></li>
                    <?php
                    //              }
                    ?>
                    <?php  if(isset($_SESSION['cli'])){   ?>
                    <li <?php if ($loc == "phonikip") {echo 'class="active"';}?> ><a href="<?php $_SERVER['PHP_SELF']?>?loc=phonikip&action=view&alert=">Current Call Log</a></li>
                    <?php }
                    if($_SESSION['user_type']=='1'){ ?>
                    <li class="dropdown <?php if ($loc == "pagesettings" OR $loc == "calltype" OR $loc == "admin") {echo 'active';} ?>"  ><a class="dropdown-toggle" data-toggle="dropdown" href="#">Admin<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <!-- <li><a href="<?php $_SERVER['PHP_SELF']?>?loc=calltype&action=view&alert=">Call Types</a></li> -->

                            <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages Settings</a>
                                <ul class="dropdown-menu">
                                    <li><a href="pagesetting?tablename=call_log">Call Log View</a></li>
                                    <li><a href="pagesetting?tablename=contacts">Contact View</a></li>
                                    <li><a href="pagesetting?tablename=accounts">Account View</a></li>
                                    <li><a href="pagesetting?tablename=sales">Sales View</a></li>
                                    <li><a href="pagesetting?tablename=ticket">Ticket View</a></li>
                                    <li><a href="homesetting">Home Page</a></li>

                                    <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Report View Settings</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="<?php $_SERVER['PHP_SELF']?>?loc=reportSettings&action=view&report_name=agent_report">Agent Report View</a></li>
                                            <li><a href="<?php $_SERVER['PHP_SELF']?>?loc=reportSettings&action=view&report_name=queue_report">Queue Report View</a></li>
                                            <li><a href="<?php $_SERVER['PHP_SELF']?>?loc=reportSettings&action=view&report_name=callbycall_report">Call By Call Report View</a></li>
                                        </ul>
                                    </li>



                                </ul>
                            </li>

                            <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Sales</a>
                                <ul class="dropdown-menu">
                                    <li><a href="item">Item</a></li>
                                    <li><a href="category">Category</a></li>
                                    <li><a href="tax">Tax</a></li>
                                    <li><a href="currency">Currency</a></li>
                                </ul>
                            </li>

                            <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Users</a>
                                <ul class="dropdown-menu">
                                    <li><a href="user">View</a></li>
                                    <!--   <li><a href="<?php $_SERVER['PHP_SELF']?>?loc=settings">Settings</a></li> -->
                                    <li><a href="login_users">Login Users</a></li>
                                    <li><a href="group">Group</a></li>
                                </ul>
                            </li>

                            <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Contacts</a>
                                <ul class="dropdown-menu">
                                    <li><a href="contact_category">Category</a></li>
                                    <!-- <li><a href="<?php $_SERVER['PHP_SELF']?>?loc=settings">Settings</a></li> -->
                                    <!-- <li><a href="<?php $_SERVER['PHP_SELF']?>?loc=group&action=view&alert=">Group</a></li> -->
                                </ul>
                            </li>
                            <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Ticket</a>
                                <ul class="dropdown-menu">
                                    <li><a href="ticket_category">Category</a></li>
                                </ul>
                            </li>
                            <li  ><a href="<?php $_SERVER['PHP_SELF']?>?loc=sla&action=view&alert=" >SLA</a></li>
                            <li  ><a href="crm_log" >CRM Log</a></li>
                        </ul>
                    </li>
                    <?php  } ?>
                            <!--
        <li class="dropdown <?php if ($loc == "user" OR $loc == "settings" OR $loc == "group") {echo 'active';} ?> "><a class="dropdown-toggle" data-toggle="dropdown" href="#">Users<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php $_SERVER['PHP_SELF']?>?loc=user&action=view&alert=">View</a></li>
            <li><a href="<?php $_SERVER['PHP_SELF']?>?loc=settings">Settings</a></li>
            <li><a href="<?php $_SERVER['PHP_SELF']?>?loc=group&action=view&alert=">Group</a></li>
          </ul>
        </li> -->
                    <li class="dropdown <?php if ($loc == "sumreport" OR $loc == "detreport" OR $loc == "report") {echo 'active';} ?>" ><a class="dropdown-toggle" data-toggle="dropdown" href="#">Reports<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="sumreport">Summary Report</a></li>

                            <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Detail Report</a>
                                <ul class="dropdown-menu">
                                    <li><a href="detailreport?view=tot&type=Inquiry">Inquiry</a></li>
                                    <li><a href="detailreport?view=tot&type=sales">Sales</a></li>
                                    <li><a href="detailreport?view=tot&type=ticket">Ticket</a></li>
                                </ul>
                            </li>

                            <li><a href="<?php $_SERVER['PHP_SELF']?>?loc=report&view=tot&type=Inquiry">Call Center Report</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <?php if(isset($_GET['alert'])){ if($_GET['alert']=="successful"){ ?>

    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Successful!!</strong>
    </div>
    <br>

    <?php }elseif($_GET['alert']=="deleted") { ?>

    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong> Successfully Deleted!!</strong>
    </div>
    <br>

    <?php  }elseif($_GET['alert']=="error") { ?>

    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong> Error !!!</strong>
    </div>
    <br>

    <?php  }
    } ?>

   @yield('navbar')



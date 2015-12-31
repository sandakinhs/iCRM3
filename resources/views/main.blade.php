@extends('app')

@section('content')

<link href="style1.css" rel="stylesheet">

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
session_start();
//include_once('checklogin.php');  // check if user is log or not
// var_dump($_SESSION);
// echo date("Y-m-d");

//function echoActiveClassIfRequestMatches($requestUri)
//{
//    $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");
//    if ($current_file_name == $requestUri)
//        echo 'class="active"';
//}


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
        <td style="width:30%"><a  href="http://iphonik.com" target="blank"> &nbsp <img src="jquery/images/iplogo.png"></a></td>
        <td style="width:55%"><font size="5">Phonik-IP CRM </font></td>
        <td style="width:15%"><aa>Welcome</aa>&nbsp<a href="<?php $_SERVER['PHP_SELF']?>?loc=settings"><?php echo $_SESSION['login_user']; ?></a>&nbsp &nbsp<a1>Logout</a1>&nbsp<a href="logout.php" class="glyphicon glyphicon-log-out"></a><br><a1>version 3.5.13 </a1></td>
    </tr>
</table>

<div class="row">
    <div class="col-sm-12">
        <nav class="navbar navbar-default" >
            <ul class="nav navbar-nav">
                <li <?php if ($loc == "home") {echo 'class="active"';} ?> ><a href="<?php $_SERVER['PHP_SELF']?>?loc=home">Home</a></li>

                <li <?php if ($loc == "call_log") {echo 'class="active"';} ?> ><a href="{{asset('main/call_log/view')}}">Call Log</a></li>

                <li <?php if ($loc == "contact") {echo 'class="active"';} ?> ><a href="<?php $_SERVER['PHP_SELF']?>?loc=contact&action=view&alert=">Contact</a></li>

                <li <?php if ($loc == "account") {echo 'class="active"';} ?> ><a href="<?php $_SERVER['PHP_SELF']?>?loc=account&action=view&alert=">Account</a></li>

                <?php
                //              if($_SESSION['per_sales'] == 1){
                ?>
                <li <?php if ($loc == "sales") {echo 'class="active"';} ?> ><a href="<?php $_SERVER['PHP_SELF']?>?loc=sales&action=view">Sales</a></li>
                <?php
                //              }
                //              if($_SESSION['per_tickets']== 1){
                ?>
                <li <?php if ($loc == "ticket") {echo 'class="active"';} ?> ><a href="<?php $_SERVER['PHP_SELF']?>?loc=ticket&action=view">Ticket</a></li>
                <?php
                //              }
                ?>
                <?php  if(isset($_SESSION['cli'])){   ?>
                <li <?php if ($loc == "phonikip") {echo 'class="active"';}?> ><a href="<?php $_SERVER['PHP_SELF']?>?loc=phonikip&action=view&alert=">Current Call Log</a></li>
                <?php }
                if($_SESSION['user_type']=='1'){ ?>
                <li class="dropdown <?php if ($loc == "pagesettings" OR $loc == "calltype") {echo 'active';} ?>"  ><a class="dropdown-toggle" data-toggle="dropdown" href="#">Admin<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <!-- <li><a href="<?php $_SERVER['PHP_SELF']?>?loc=calltype&action=view&alert=">Call Types</a></li> -->

                        <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages Settings</a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php $_SERVER['PHP_SELF']?>?loc=pagesettings&action=view&tablename=call_log">Call Log View</a></li>
                                <li><a href="<?php $_SERVER['PHP_SELF']?>?loc=pagesettings&action=view&tablename=contacts">Contact View</a></li>
                                <li><a href="<?php $_SERVER['PHP_SELF']?>?loc=pagesettings&action=view&tablename=accounts">Account View</a></li>
                                <li><a href="<?php $_SERVER['PHP_SELF']?>?loc=pagesettings&action=view&tablename=sales">Sales View</a></li>
                                <li><a href="<?php $_SERVER['PHP_SELF']?>?loc=pagesettings&action=view&tablename=ticket">Ticket View</a></li>
                                <li><a href="<?php $_SERVER['PHP_SELF']?>?loc=home_settings&action=view">Home Page</a></li>

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
                                <li><a href="<?php $_SERVER['PHP_SELF']?>?loc=item&action=view&alert=">Item</a></li>
                                <li><a href="<?php $_SERVER['PHP_SELF']?>?loc=category&action=view&alert=">Category</a></li>
                                <li><a href="<?php $_SERVER['PHP_SELF']?>?loc=tax&action=view&alert=">Tax</a></li>
                                <li><a href="<?php $_SERVER['PHP_SELF']?>?loc=currency&action=view&alert=">Currency</a></li>
                            </ul>
                        </li>

                        <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Users</a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php $_SERVER['PHP_SELF']?>?loc=user&action=view&alert=">View</a></li>
                                <!--   <li><a href="<?php $_SERVER['PHP_SELF']?>?loc=settings">Settings</a></li> -->
                                <li><a href="<?php $_SERVER['PHP_SELF']?>?loc=user&action=login_users&alert=">Login Users</a></li>
                                <li><a href="<?php $_SERVER['PHP_SELF']?>?loc=group&action=view&alert=">Group</a></li>
                            </ul>
                        </li>

                        <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Contacts</a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php $_SERVER['PHP_SELF']?>?loc=c_category&action=view&alert=">Category</a></li>
                                <!-- <li><a href="<?php $_SERVER['PHP_SELF']?>?loc=settings">Settings</a></li> -->
                                <!-- <li><a href="<?php $_SERVER['PHP_SELF']?>?loc=group&action=view&alert=">Group</a></li> -->
                            </ul>
                        </li>
                        <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Ticket</a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php $_SERVER['PHP_SELF']?>?loc=tic_category&action=view&alert=">Category</a></li>
                            </ul>
                        </li>
                        <li  ><a href="<?php $_SERVER['PHP_SELF']?>?loc=sla&action=view&alert=" >SLA</a></li>
                        <li  ><a href="<?php $_SERVER['PHP_SELF']?>?loc=crm_log&action=view&alert=" >CRM Log</a></li>
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
                        <li><a href="<?php $_SERVER['PHP_SELF']?>?loc=sumreport&action=view&alert=">Summary Report</a></li>

                        <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Detail Report</a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php $_SERVER['PHP_SELF']?>?loc=detreport&view=tot&type=Inquiry">Inquiry</a></li>
                                <li><a href="<?php $_SERVER['PHP_SELF']?>?loc=detreport&view=tot&type=sales">Sales</a></li>
                                <li><a href="<?php $_SERVER['PHP_SELF']?>?loc=detreport&view=tot&type=ticket">Ticket</a></li>
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

<div class="row" id="load_page">
    <div class="col-sm-12">

        <?php
        if($loc=="user"){ include_once('user.php'); }
        elseif ($loc=="settings") { include_once('settings.php');  }
        elseif ($loc=="contact") { include_once('contact.php'); }
        elseif ($loc=="account") { include_once('account.php'); }
        elseif ($loc=="call_log") { ?> @include('call_log.call_log_view') <?php }
        elseif ($loc=="pagesettings") { include_once('pagesettings.php'); }
        elseif ($loc=="group") { include_once('group.php'); }
        elseif ($loc=="calltype") { include_once('call_type.php'); }
        elseif ($loc=="producttype") { include_once('product_type.php'); }
        elseif ($loc=="phonikip") { include_once('phonikip.php'); }
        elseif ($loc=="sumreport") { include_once('reports/summaryreport.php'); }
        elseif ($loc=="detreport") { include_once('reports/detailcallreport.php'); }
        elseif ($loc=="category") { include_once('sales/category.php'); }
        elseif ($loc=="item") { include_once('sales/item.php'); }
        elseif ($loc=="tax") { include_once('sales/tax.php'); }
        elseif ($loc=="home") { ?> @include('home.home_') <?php}
        elseif ($loc=="sales") { include_once('sales_all.php'); }
        elseif ($loc=="c_category") { include_once('contact_category.php'); }
        elseif ($loc=="currency") { include_once('currency.php'); }
        elseif ($loc=="ticket") { include_once('ticket_all.php'); }
        elseif ($loc=="crm_log") { include_once('crm_log.php'); }
        elseif ($loc=="home_settings") { include_once('home/home_settings.php'); }
        elseif ($loc=="tic_category") { include_once('ticket_category.php'); }
        elseif ($loc=="reportSettings") { include_once('reportSettings.php'); }
        elseif ($loc=="sla") { include_once('sla.php'); }
        elseif ($loc=="report") {
        ?><h3>&nbsp;&nbsp;Call Center Report</h3>
        <iframe frameborder="0" scrolling="yes" scrolling="no" width="100%" height="100%" src="../report/main.php"></iframe>
        <?php  }
        ?>

    </div>
</div>



@stop
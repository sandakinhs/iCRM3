@extends('navbar')
@section('navbar')

<head>

    <?php

    //$cid = $_SESSION['cid'];    // session cid will unset after the submit of this form
    $_SESSION['from']="phonikip";
    ?>

    <script type="text/javascript">

        var root_url = "<?php echo Request::root(); ?>/"; // put this in php file

        function load_remark(){

            $("#content").load(root_url+"call_logs/remark");
        }

        function load_sales(){
            $("#content").load(root_url+"call_logs/sale");
        }

        function load_ticket(){
            $("#content").load(root_url+"call_logs/ticket");
        }

        function pop_up(url,windowName) {
            newwindow=window.open(url,windowName,'height=400,width=600');
            if (window.focus) {newwindow.focus()}

        }

        function AlertIt() {

            $.ajax({
                type: 'post',
                url: 'post.php?n=1',
                data: $('form').serialize(),
                success: function () {
                    // alert('form was submitted');
                }
            });


            confirm(function(e,btn){ //event + button clicked
                // e.preventDefault();
                window.location="<?php $_SERVER['PHP_SELF']?>?loc=contact&action=add&alert=";
            });

        }
    </script>
    <meta charset="utf-8">
    <title>Phonik-IP CRM Call Log</title>
</head>


<body>
<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">

        <div id='content-wrapper'>


            <?php if(isset($contact))  {  //load with data


            ?>

            <form id="form" method="post" action="call_log?cid=<?php  echo $contact->id; ?>">
                <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                <div id='sidebar-title'>
                    Caller Information
                </div>

                <div id='main-wrapper'>
                    <div id="tabs">
                        <ul>
                            <li><a href="#Call-Log">Call Log</a></li>
                            <li><a href="#IM">IM</a></li>
                            <li><a href="#e-mail">e-mail</a></li>
                        </ul>
                        <div id="Call-Log">

                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border">
                                    <aa>Additional Caller Info</aa>
                                </legend >
                                <table style="width:100%">
                                    <tr>
                                        <td><a1><div align="left">Date :<?php echo date("Y/m/d") ; ?></div></a1></td>
                                        <td><a1>Time :<?php echo date("h:ia"); ?></a1></td>
                                        <!-- <td>NIC: <?php echo $contact->contact_nic; ?></td> -->
                                        <td align="right"><a href="<?php $_SERVER['PHP_SELF']?>?loc=contact&action=edit&cid=<?php echo $contact->id; ?>"><button type="button">
                                                    Edit Contact</button></a></td>
                                    </tr>
                                </table>
                                <br><a1>

                                    Address: <?php echo $contact->contact_address_number.",".$contact->contact_address_street.",".$contact->contact_address_city.",".$contact->contact_address_district."."; ?>

                                </a1><br>
                                <table style="width:100%">
                                    <tr>
                                        <td style="width:100%">
                                            <fieldset class="scheduler-border">
                                                <legend class="scheduler-border">
                                                    <aa>Call Type</aa>
                                                </legend><a1>

                                                    <div class="row">
                                                        <div class="col-sm-4" align="center">

                                                            <?php if($_SESSION['per_inquiry'] == 1){ ?>
                                                            <input type="radio" name="call_type" id="call_type" value="Inquiry"  onclick="load_remark()">Inquiry </div><div class="col-sm-4" align="center">
                                                            <?php }  if($_SESSION['per_sales'] == 1){  ?>
                                                            <input type="radio" name="call_type" id="call_type" value="Sales" onclick="load_sales()" >Sales </div><div class="col-sm-4" align="center">
                                                            <?php }  if($_SESSION['per_tickets'] == 1){  ?>
                                                            <input type="radio" name="call_type" id="call_type" value="Tickets" onclick="load_ticket()">Tickets</div>
                                                        <?php } ?>

                                                    </div>

                                            </fieldset></a1>
                                        </td>
                                        <td>&nbsp</td>

                                    </tr>


                                </table>
                            </fieldset>


                            <div id ="content" > </div>



                        </div>
                        <div id="IM">IM
                        </div>
                        <div id="e-mail">e-mail
                        </div>
                    </div>
                </div>
                <br>
                <div id='sidebar-wrapper'>
                    <fieldset class="scheduler-border" >

                        <legend class="scheduler-border">
                            <aa>Caller Info</aa>
                        </legend><a1>
                            Title
                            <select name="selectin" disabled="disabled">
                                <option selected="selected">Mr.</option>
                                <option>Mrs.</option>
                                <option>Miss.</option>
                                <option>Ms.</option>

                            </select></a1>
                        <br><br><a1>
                            First Name<br>
                            <input type="text" name="contact_firstname" id="contact_firstname" value="<?php echo $contact->contact_firstname; ?>" readonly="readonly"><br><br>
                            Last Name<br>
                            <input type="text" name="contact_lastname" id="contact_lastname" value="<?php echo $contact->contact_lastname; ?>" readonly="readonly"><br><br>
                            Caller ID<br>
                            <input type="number" name="cli" id="cli" value="<?php echo $contact->contact_no; ?>" readonly="readonly"><br><br></a1>


                    </fieldset><br><br>
                    <fieldset class="scheduler-border">

                        <legend class="scheduler-border">
                            <aa>History</aa>
                        </legend>

                        <div id="accordion">

                            <?php

                            foreach ( $calls as $row )
                            {
                            ?>  <h3> <?php echo $row->call_created_time; ?> </h3>
                            <div> <a href="#" onclick="pop_up('logpopup.php?id=<?php echo $row->id; ?>','1');"><?php echo $row->call_type; ?></a></div>
                            <?php
                            }
                            ?>
                        </div>

                    </fieldset>
                </div>


                <script type="text/javascript" src="{{ asset("assets/js/custom/jquery-1-custom.js") }}"></script>
            </form>


            <?php
            } else        //load form without data
                {
            ?>

            <form id="form" method="post" action="call_log">
                <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">

                <div id='sidebar-title'>
                    <aa>Caller Information</aa>
                </div>

                <div id='main-wrapper'>
                    <div id="tabs">
                        <ul>
                            <li><a href="#Call-Log">Call Log</a></li>
                            <li><a href="#IM">IM</a></li>
                            <li><a href="#e-mail">e-mail</a></li>
                        </ul>
                        <div id="Call-Log">

                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border">
                                    <aa>Additional Caller Info</aa>
                                </legend>
                                <table style="width:100%">
                                    <tr>
                                        <td><a1><div align="left">Date :<?php echo date("Y/m/d") ; ?></div></a1></td>
                                        <td><a1>Time :<?php echo date("h:ia"); ?></a1></td>

                                    </tr>
                                </table>
                                <br>

                                <a1>Address:</a1>

                                <br>
                                <table style="width:100%">
                                    <tr>
                                        <td style="width:100%">
                                            <fieldset class="scheduler-border">
                                                <legend class="scheduler-border">
                                                    <aa>Call Type</aa>
                                                </legend><a1>

                                                    <div class="row">
                                                        <div class="col-sm-4" align="center">

                                                            <?php if($_SESSION['per_inquiry'] == 1){ ?>
                                                            <input type="radio" name="call_type" id="call_type" value="Inquiry"  onclick="load_remark()">Inquiry </div><div class="col-sm-4" align="center">
                                                            <?php }  if($_SESSION['per_sales'] == 1){  ?>
                                                            <input type="radio" name="call_type" id="call_type" value="Sales" onclick="load_sales()" >Sales </div><div class="col-sm-4" align="center">
                                                            <?php }  if($_SESSION['per_tickets'] == 1){  ?>
                                                            <input type="radio" name="call_type" id="call_type" value="Tickets" onclick="load_ticket()">Tickets</div>
                                                        <?php } ?>

                                                    </div>

                                                </a1>
                                            </fieldset>
                                        </td>
                                        <td>&nbsp</td>

                                    </tr>

                                </table>
                            </fieldset>

                            <div id ="content" > </div>



                        </div>
                        <div id="IM">IM
                        </div>
                        <div id="e-mail">e-mail
                        </div>
                    </div>
                </div>
                <br>
                <div id='sidebar-wrapper'>
                    <fieldset class="scheduler-border">

                        <legend class="scheduler-border">
                            <aa>Caller Info</aa>
                        </legend><a1>
                            Title
                            <select name="contact_title" id="contact_title"  >
                                <option selected="selected" value="Mr">Mr.</option>
                                <option value="Mrs">Mrs.</option>
                                <option value="Miss">Miss.</option>
                                <option value="Ms">Ms.</option>

                            </select></a1>
                        <br><br><a1>
                            First Name<br>
                            <input type="text" name="contact_firstname" id="contact_firstname" ><br><br>
                            Last Name<br>
                            <input type="text" name="contact_lastname" id="contact_lastname" ><br><br>
                            Caller ID<br>
                            <input type="number" name="cli" id="cli" value="<?php echo $_SESSION['cli']; ?>"><br><br>
                            Group  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp    Assigned To<br>
                            <select name="group_id" id="group_id"  onchange="load_assignedto()">
                                            <?php

                                            foreach ($add_group_contacts as $row1) {
                                            ?>
                                            <option value="<?php  echo $row1->group_id; ?>"><?php echo $row1->group_name;  ?></option>
                                            <?php
                                            }
                                            ?>
                            </select>  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                            <div id="assignedto" style="display:inline-block" ><br><br>


                            <a  href="javascript:AlertIt();">more</a></a1>


                    </fieldset><br><br>
                    <fieldset sclass="scheduler-border">

                        <legend class="scheduler-border">
                            <aa>History</aa>
                        </legend>

                        <div id="accordion">

                        </div>

                    </fieldset>
                </div>

                <script type="text/javascript">
                    var root_url = "<?php echo Request::root(); ?>/"; // put this in php file
                </script>
                <script type="text/javascript" src="{{ asset("assets/js/custom/jquery-1-custom.js") }}"></script>
                <script type="text/javascript" src="{{ asset("assets/js/custom/assigned-to.js") }}"></script>

            </form>

            <?php
            }
            ?>

        </div>


    </div>
    <div class="col-sm-1"></div>
</div>
</body>
</html>

    @stop
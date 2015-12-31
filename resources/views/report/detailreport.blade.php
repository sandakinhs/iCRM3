@extends('navbar')
@section('navbar')

<html>
<head>
    <title></title>
</head>
<body>

<?php

//$reports = new reports;

if(isset($_POST['submit'])){


    if($_POST['fdate']!=''){

        $_SESSION['fdate']=$_POST['fdate']." ".date('H:i:s', strtotime($_POST['ftime']));  //covert date and save to the session
    }else{

        unset( $_SESSION['fdate']);
        unset( $_SESSION['tdate']);
    }

    if($_POST['tdate']!=''){

        $_SESSION['tdate']=$_POST['tdate']." ".date('H:i:s', strtotime($_POST['ttime']));  //covert date and save to the session
    }

}

$type=$_GET['type'];
$view=$_GET['view'];



?>

<table style="width:100%">

    <tr>
        <td style="width:40%"></td>
        <td style="width:45%" align="left">
            <?php  if($_GET['type']=='Inquiry'){
                echo "<h4>Inquiry Report</h4>";
            }elseif ($_GET['type']=='sales') {
                echo "<h4>Sales Report</h4>";
            }elseif ($_GET['type']=='ticket') {
                echo "<h4>Ticket Report</h4>";
            }

            ?>
        </td>
        <td style="width:15%"><a1>Export to </a1>&nbsp<a href="reports/xls.php"><img src="images/icons/excel.png" height="30" width="30"></a>&nbsp<a href="pdf.php"><img src="images/icons/pdf.png" height="24" width="24"></a> &nbsp<a href="javascript:window.print()"><img src="images/icons/printer.png" height="25" width="25"></a></td>
    </tr>
</table>

<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">

        <form id="form2" method="post" action="<?php $_SERVER['PHP_SELF']?>?loc=detreport&type=<?php echo $type; ?>&view=<?php echo $view; ?>">

            <fieldset class="scheduler-border">
                <legend class="scheduler-border">
                    <aa>Select Date</aa>
                </legend>
                <table>
                    <tr>
                        <?php
                        if(isset($_POST['submit'])){

                        ?>

                        <td><a1>From:</a1></td>
                        <td>&nbsp</td>
                        <td><input type='date' id='fdate' name="fdate" required="required" value="<?php echo $_POST['fdate']; ?>" /><input type='time' id='ftime' name="ftime" required="required" value="<?php echo $_POST['ftime']; ?>" /></td>
                        <td>&nbsp &nbsp </td>
                        <td><a1>To:</a1></td>
                        <td>&nbsp</td>
                        <td><input type='date' id='tdate' name="tdate" required="required" value="<?php echo $_POST['tdate']; ?>" /><input type='time' id='ttime' name="ttime" required="required" value="<?php echo $_POST['ttime']; ?>" /></td>
                        <td>&nbsp &nbsp </td>
                        <td><input  type="submit" name="submit" value="Filter"></td>
                        <td>&nbsp</td>


                        <?php
                        }else {

                        ?>
                        <td><a1>From:</a1></td>
                        <td>&nbsp</td>
                        <td><input type='date' id='fdate' name="fdate" required="required" <?php if(isset($_SESSION['fdate'])){ echo 'value='.$_SESSION['fdate'];  }  ?> /><input type='time' id='ftime' name="ftime" required="required"/></td>
                        <td>&nbsp &nbsp </td>
                        <td><a1>To:</a1></td>
                        <td>&nbsp</td>
                        <td><input type='date' id='tdate' name="tdate" required="required" <?php if(isset($_SESSION['tdate'])){ echo 'value='.$_SESSION['tdate'];  }  ?> /><input type='time' id='ttime' name="ttime" required="required"/></td>
                        <td>&nbsp &nbsp </td>
                        <td><input  type="submit" name="submit" value="Filter"> <!-- <input  type="reset"  value="Cancel" onclick="window.location='<?php $_SERVER['PHP_SELF']?>?loc=call_log&action=view&alert=';"> --></td>
                        <td>&nbsp</td>

                        <?php

                        }
                        ?>
                    </tr>
                </table>

                <table>
                    <tr>
                        <td>&nbsp</td><td></td>
                    </tr>
                    <tr>
                        <td>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                        </td>
                        <td>
                            <?php if($_GET['type']=='Inquiry'){   ?>
                            <?php  }  ?>
                        </td>
                        <td>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                        </td>
                        <td>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                        </td>

                    </tr>
                </table>

            </fieldset>
        </form>

    </div>
    <div class="col-sm-1"></div>
</div>


<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">

        <?php
        if($_GET['type']=='Inquiry'){

        ?>

        <table class="table table-hover table-condensed table-bordered">

            <tr>
                <th><aa>No</aa></th>
                <th><aa>Start Date</aa></th>
                <th><aa>Start Time</aa></th>
                <th><aa>End Date</aa></th>
                <th><aa>End Time</aa></th>
                <th><aa>CLI</aa></th>
                <th><aa>Contact</aa></th>
                <th><aa>City</aa></th>
                <th><aa>Assigned To</aa></th>
                <th><aa>Owner</aa></th>
                <th><aa>Call Type</aa></th>
                <th><aa>Status</aa></th>
                <th><aa>Account</aa></th>
                <th><aa>Group</aa></th>
            </tr>

            <?php
            $i=0;
            foreach($result as $row){
            $i++
            ?>

            <tr>
                <td><a1><?php echo $i;  ?></a1></td>
                <td><a1><?php echo $row->Start_Date; ?></a1></td>
                <td><a1><?php echo $row->Start_Time;   ?></a1></td>

                <?php if($row->End_Date !="0000-00-00"){ ?>
                <td><a1><?php echo $row->End_Date;   ?></a1></td>
                <td><a1><?php echo $row->End_Time;   ?></a1></td>
                <?php }else{ ?>
                <td></td>
                <td></td>
                <?php } ?>

                <td><a1><?php echo $row->CLI;  ?></a1></td>
                <td><a1><?php echo $row->Name;  ?></a1></td>
                <td><a1><?php echo $row->City;  ?></a1></td>
                <td><a1><?php echo $row->assinged_to;  ?></a1></th>
                <td><a1><?php echo $row->owner;  ?></a1></td>
                <td><a1><?php echo $row->Type;  ?></a1></td>
                <td><a1><?php echo $row->Status;  ?></a1></td>
                <td><a1><?php echo $row->Account;  ?></a1></td>
                <td><a1><?php echo $row->Groups;  ?></a1></td>
            </tr>

            <?php
            }
            ?>

        </table>



        <?php
        }elseif ($_GET['type']=='sales') {

        ?>

        <table class="table table-hover table-condensed table-bordered">

            <tr>
                <th><aa>No</aa></th>
                <th><aa>Date</aa></th>
                <th><aa>Time</aa></th>
                <th><aa>Number</aa></th>
                <th><aa>Contact</aa></th>
                <th><aa>City</aa></th>
                <th><aa>Assigned To</aa></th>
                <th><aa>Owner</aa></th>
                <th><aa>Status</aa></th>
                <th><aa>Total</aa></th>
                <th><aa>Account</aa></th>
                <th><aa>Group</aa></th>
            </tr>

            <?php
            $i=0;
            foreach($result as $row){
            $i++
            ?>

            <tr>
                <td><a1><?php echo $i;  ?></a1></td>
                <td><a1><?php echo $row->Date; ?></a1></td>
                <td><a1><?php echo $row->Time;   ?></a1></td>
                <td><a1><?php echo $row->Contact_No;  ?></a1></td>
                <td><a1><?php echo $row->Name;  ?></a1></td>
                <td><a1><?php echo $row->City;  ?></a1></td>
                <td><a1><?php echo $row->Assinged;  ?></a1></th>
                <td><a1><?php echo $row->Owner;  ?></a1></td>
                <td><a1><?php echo $row->status;  ?></a1></td>
                <td><a1><?php echo $row->total;  ?></a1></td>
                <td><a1><?php echo $row->Account;  ?></a1></td>
                <td><a1><?php echo $row->Group;  ?></a1></td>
            </tr>

            <?php
            }
            ?>

        </table>

        <?php
        }elseif ($_GET['type']=='ticket') {

        ?>

        <table class="table table-hover table-condensed table-bordered">

            <tr>
                <th><aa>No</aa></th>
                <th><aa>Date</aa></th>
                <th><aa>Time</aa></th>
                <th><aa>Contact</aa></th>
                <th><aa>Number</aa></th>
                <th><aa>Subject</aa></th>
                <th><aa>Priority</aa></th>
                <th><aa>Assigned To</aa></th>
                <th><aa>Owner</aa></th>
                <th><aa>Status</aa></th>
                <th><aa>Group</aa></th>
            </tr>

            <?php
            $i=0;
            foreach($result as $row){
            $i++
            ?>

            <tr>
                <td><a1><?php echo $i;  ?></a1></td>
                <td><a1><?php echo $row->Date; ?></a1></td>
                <td><a1><?php echo $row->Time; ?></a1></td>
                <td><a1><?php echo $row->Name;  ?></a1></td>
                <td><a1><?php echo $row->Number;  ?></a1></td>
                <td><a1><?php echo $row->Subject;  ?></a1></td>
                <td><a1><?php echo $row->Priority;  ?></a1></td>
                <td><a1><?php echo $row->Assign;  ?></a1></th>
                <td><a1><?php echo $row->Owner;  ?></a1></td>
                <td><a1><?php echo $row->Status;  ?></a1></td>
                <td><a1><?php echo $row->Group;  ?></a1></td>
            </tr>



            <?php
            }
            }
            ?>
        </table>

    </div>
    <div class="col-sm-1"></div>
</div>

</body>
</html>



<script type="text/javascript">

    function load_search(){
        $("#search").load("search/detail_report_advanced_search.php");
    }

    $(document).ready(function()    // if from to date selected other fileds must not be empty
    {

        document.getElementById("fdate").required = false;
        document.getElementById("tdate").required = false;
        document.getElementById("ftime").required = false;
        document.getElementById("ttime").required = false;


        $("#fdate").change(function()
        {
            document.getElementById("tdate").required = true;
            document.getElementById("ftime").required = true;
        });


        $("#tdate").change(function()
        {
            document.getElementById("fdate").required = true;
            document.getElementById("ttime").required = true;
        });

        $("#ftime").change(function()
        {
            document.getElementById("fdate").required = true;
        });

        $("#ttime").change(function()
        {
            document.getElementById("tdate").required = true;
        });

    });

</script>

    @stop

     

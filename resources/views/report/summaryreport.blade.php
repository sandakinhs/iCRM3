
@extends('navbar')
@section('navbar')

<html>
<head>
    <title></title>
</head>
<body>


<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">

        <form id="form2" method="post" action="<?php $_SERVER['PHP_SELF']?>?loc=sumreport&action=view&alert=">

            <fieldset class="scheduler-border">
                <legend class="scheduler-border">
                    <aa>Search</aa>
                </legend>
                <table>
                    <tr>
                        <td>&nbsp</td>
                        <td><a1>From :</a1></td>
                        <td>&nbsp</td>
                        <td><input type="date"  id="from_date" name="from_date" required="required" <?php if(isset($_SESSION['fdate'])){ echo 'value='.$_SESSION['fdate'];  }  ?> ></td>
                        <td>&nbsp &nbsp &nbsp</td>
                        <td><a1>To :</a1></td>
                        <td>&nbsp</td>
                        <td><input type="date" id="to_date" name="to_date" required="required"  <?php if(isset($_SESSION['tdate'])){ echo 'value='.$_SESSION['tdate'];  }  ?>  ></td>
                        <td>&nbsp &nbsp &nbsp</td>
                        <td><a1><input type="submit" name="submit" value="Search"></a1></td>
                        <td>&nbsp</td>
                    </tr>
                </table>

            </fieldset>


        </form>

    </div>
    <div class="col-sm-1"></div>
</div>



<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10" style="overflow: scroll;">

        <h4 align="center">Summery Reports</h4>
        <table class="table table-hover table-condensed table-bordered">

            <tr>
                <th><a1>Type</a1></th>
                <th><a1>Total</a1></th>
                <th><a1>Pending</a1></th>
                <th><a1>Completed</a1></th>
            </tr>

            <tr>
                <td><a1>Inquiry</a1></td>
                <td><a href="<?php $_SERVER['PHP_SELF']?>?loc=detreport&view=tot&type=Inquiry"><a1><?php echo $inquiry['0']; ?></a1></a></td>
                <td><a href="<?php $_SERVER['PHP_SELF']?>?loc=detreport&view=pending&type=Inquiry"><a1><?php echo $inquiry['1']; ?></a1></a></td>
                <td><a href="<?php $_SERVER['PHP_SELF']?>?loc=detreport&view=complete&type=Inquiry"><a1><?php echo $inquiry['2']; ?></a1></a></td>
            </tr>

        </table>

        <table class="table table-hover table-condensed table-bordered">
            <tr>
                <th><a1>Type</a1></th>
                <th><a1>Total</a1></th>
                <th><a1>Pending</a1></th>
                <th><a1>Posted</a1></th>
                <th><a1>Authorized</a1></th>
                <th><a1>Ready</a1></th>
                <th><a1>Delivered</a1></th>
            </tr>

            <tr>
                <td><a1>Sales</a1></td>
                <td><a href="<?php $_SERVER['PHP_SELF']?>?loc=detreport&view=tot&type=sales"><a1><?php echo $sales['0']; ?></a1></a></td>
                <td><a href="<?php $_SERVER['PHP_SELF']?>?loc=detreport&view=pending&type=sales"><a1><?php echo $sales['1']; ?></a1></a></td>
                <td><a href="<?php $_SERVER['PHP_SELF']?>?loc=detreport&view=posted&type=sales"><a1><?php echo $sales['2']; ?></a1></a></td>
                <td><a href="<?php $_SERVER['PHP_SELF']?>?loc=detreport&view=authorized&type=sales"><a1><?php echo $sales['3']; ?></a1></a></td>
                <td><a href="<?php $_SERVER['PHP_SELF']?>?loc=detreport&view=ready&type=sales"><a1><?php echo $sales['4']; ?></a1></a></td>
                <td><a href="<?php $_SERVER['PHP_SELF']?>?loc=detreport&view=delivered&type=sales"><a1><?php echo $sales['5']; ?></a1></a></td>
            </tr>
        </table>

        <table class="table table-hover table-condensed table-bordered">

            <tr>
                <th><a1>Type</a1></th>
                <th><a1>Total</a1></th>
                <th><a1>Pending</a1></th>
                <th><a1>Completed</a1></th>
            </tr>

            <tr>
                <td><a1>Ticket</a1></td>
                <td><a href="<?php $_SERVER['PHP_SELF']?>?loc=detreport&view=tot&type=ticket"><a1><?php echo $ticket['0']; ?></a1></a></td>
                <td><a href="<?php $_SERVER['PHP_SELF']?>?loc=detreport&view=pending&type=ticket"><a1><?php echo $ticket['1']; ?></a1></a></td>
                <td><a href="<?php $_SERVER['PHP_SELF']?>?loc=detreport&view=complete&type=ticket"><a1><?php echo $ticket['2']; ?></a1></a></td>
            </tr>

        </table>

    </div>
    <div class="col-sm-1"></div>
</div>


</body>
</html>

    @stop
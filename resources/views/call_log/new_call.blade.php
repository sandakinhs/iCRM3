@extends('navbar')
@section('navbar')

<?php

if(isset($_GET['sphone'])){

    $_SESSION['sphone']='1';
}elseif (!isset($_GET['flag'])) {
    unset($_SESSION['sphone']);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <h4 align="center">Select a Customer</h4>


        <table class="table table-hover table-bordered">
            <tr>
                <th><a1>Name</a1></th>
                <th><a1>Number</a1></th>
                <th><a1>Number 2</a1></th>
                <th><a1>Work Number</a1></th>
                <th><a1>Address</a1></th>
                <th></th>
            </tr>

            <?php

            foreach ($contact as $row)
            {
            ?>

            <tr>
                <td><a1><?php echo $row->contact_firstname; ?><br><?php echo $row->contact_lastname; ?></a1></td>
                <td><a1><?php echo $row->contact_no; ?></a1></td>
                <td><a1><?php echo $row->contact_mobile2; ?></a1></td>
                <td><a1><?php echo $row->contact_work_phone; ?></a1></td>
                <td><a1><?php echo $row->contact_address_street; ?>,<?php echo $row->contact_address_city; ?>,<?php echo $row->contact_address_district; ?></a1></td>
                <td><a1><a href="call_log_searchs?cid=<?php echo $row->id; ?>" >select</a></a1></td>
            </tr>

        <?php } ?>

        </table>

    </div>
    <div class="col-sm-1"></div>
</div>

</body>
</html>

@stop

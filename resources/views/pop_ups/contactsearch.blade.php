@extends('app')
@section('content')


<fieldset class="scheduler-border">
    <legend class="scheduler-border">
        <aa>Search Contacts</aa>
    </legend >
    <form method="post" action="<?php $_SERVER['PHP_SELF']?>">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="text" id="contact_name" name="contact_name">
        <input type="submit" name="submit" value="Search">
    </form>
</fieldset>

<?php

if(isset($_POST['submit'])){

?>

<table class="table table-condensed table-bordered">
    <tr class="info">
        <th><aa>Name</aa></th>
        <th><aa>Email</aa></th>
        <th><aa>Telephone</aa></th>
        <th><aa>Address</aa></th>
        <th></th>
    </tr>

    <?php

    foreach($contacts as $row){

    ?>

    <tr>
        <td><a1><?php echo $row->contact_firstname."&nbsp ".$row->contact_lastname; ?></a1></td>
        <td><a1><?php echo $row->contact_email1; ?></a1></td>
        <td><a1><?php echo $row->contact_no; ?></a1></td>
        <td><a1><?php echo $row->contact_address_number.",".$row->contact_address_street.",".$row->contact_address_city.",".$row->contact_address_district."."; ?></a1></td>
        <td><a href="<?php $_SERVER['PHP_SELF']?>?id=<?php echo $row->id; ?>">select<a></td>
    </tr>


    <?php
    }
    ?>

</table>

<?php
}elseif(isset($_GET['id'])){

?>

<script type="text/javascript">

    window.onunload = refreshParent;
    function refreshParent() {
        window.opener.location.reload();
    }


    window.close();


</script>
<?php

}


?>


<input type="button" value="Cancel" onclick="close_win()" style="float: right; margin-right: 10px;">


<script type="text/javascript">

    function close_win(){

        window.close();
    }

</script>
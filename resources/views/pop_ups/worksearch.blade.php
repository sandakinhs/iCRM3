@extends('app')
@section('content')


<fieldset class="scheduler-border">
    <legend class="scheduler-border">
        <aa>Search Company</aa>
    </legend >
    <form method="post" action="<?php $_SERVER['PHP_SELF']?>">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="text" id="accont_name" name="account_name">
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

    @foreach($company as $row)

    <tr>
        <td><a1> {{$row->account_name}} </a1></td>
        <td><a1> {{$row->account_email}} </a1></td>
        <td><a1> {{$row->account_telephone}} </a1></td>
        <td><a1> {{$row->account_address_number}},{{$row->account_address_street }},{{$row->account_address_city}},{{$row->account_address_district}}. </a1></td>
        <td><a href="worksearch?id={{$row->id}}">select</a></td>
    </tr>

   @endforeach

</table>

<?php

}elseif(isset($_GET['id'])){


foreach($one_company as $row){

$_SESSION['account_id']=$row->id;
$_SESSION['contact_work_phone']=$row->account_telephone;
$_SESSION['contact_work_fax']=$row->account_telephone;
$_SESSION['contact_work_address_number']=$row->account_address_number;
$_SESSION['contact_work_address_street']=$row->account_address_street;
$_SESSION['contact_work_address_city']=$row->account_address_city;
$_SESSION['contact_work_address_district']=$row->account_address_district;
$_SESSION['contact_work_companyname']=$row->account_name;
$_SESSION['contact_work_email']=$row->account_email;

        }

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

    @stop

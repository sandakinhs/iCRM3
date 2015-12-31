@extends('navbar')
@section('navbar')

<?php
if(isset($_POST['Submit'])){

// var_dump($_POST);

$status=$category_contact->edit_c_category();
if($status==1)
{
// header("Location:".$_SERVER['PHP_SELF']."?loc=category&action=view&alert=successful");

?>
<script type="text/javascript">
    window.location="<?php $_SERVER['PHP_SELF']?>?loc=c_category&action=view&alert=successful";
</script>
<?php

}else
{
// header("Location:".$_SERVER['PHP_SELF']."?loc=category&action=add&alert=error");

?>
<script type="text/javascript">
    window.location="<?php $_SERVER['PHP_SELF']?>?loc=c_category&action=add&alert=error";
</script>
<?php

}

}



$row = $contact_category_detail;

?>

<form id="form" method="post" action="../{{$row->id}}">

    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" id="_method" name="_method" value="PATCH">

    <div id='main-wrapper-contact'>
        <div id="tabs">
            <ul>
                <li><a href="#Contact-Edit">Edit Category</a></li>
            </ul>
            <div id="Contact-Edit">

                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">
                        <aa>Basic Information</aa>
                    </legend>
                    <table>
                        <tr>
                            <input type="hidden" id="id" name="id" value="<?php echo $row->id; ?>">
                            <td><a>Name:</a></td><td> <a1><input type="text" id="name" name="name" required="required" value="<?php echo $row->name; ?>"></a1> </td>
                            <td><a>&nbsp Description:</a></td><td> <a1><input type="text" id="description" name="description" value="<?php echo $row->description; ?>" ></a1> </td>
                            <td>&nbsp</td>
                            <td>&nbsp <a1><button type="submit" name="Submit" id="submit">Save</button>&nbsp<button type="button" onclick="window.location='<?php $_SERVER['PHP_SELF']?>?loc=c_category&action=view&alert=';" >Cancel </button></a1> </td>
                        </tr>

                    </table>

                </fieldset>


            </div>
        </div>
    </div>
    <br>

    <script type="text/javascript" src="{{ asset("assets/js/custom/jquery-1-custom.js") }}"></script>
</form>

    @stop

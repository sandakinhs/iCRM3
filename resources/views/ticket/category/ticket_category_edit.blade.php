@extends('navbar')
@section('navbar')

<?php

$row=$ticket_details;

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
                            <td><a>Category:</a></td><td> <a1><input type="text" id="category" name="category" required="required" value="<?php echo $row->category; ?>"></a1> </td>
                            <td><a>&nbsp Description:</a></td><td> <a1><input type="text" id="description" name="description" value="<?php echo $row->description; ?>" ></a1> </td>

                            <td>&nbsp</td>
                            <td>&nbsp <a1><button type="submit" name="Submit" id="submit">Save</button>&nbsp<button type="button" onclick="window.location='<?php $_SERVER['PHP_SELF']?>?loc=tic_category&action=view&alert=';">Cancel </button></a1> </td>
                        </tr>

                    </table>

                </fieldset>


            </div>
        </div>
    </div>
    <br>
</form>

<script type="text/javascript" src="{{ asset("assets/js/custom/jquery-1-custom.js") }}"></script>

    @stop
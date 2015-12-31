@extends('navbar')
@section('navbar')

<?php

$row=$tax_detail;

?>

<form id="form" method="post" action="../{{ $row->id }}">
    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" id="_method" name="_method" value="PATCH">

    <div id='main-wrapper-contact'>
        <div id="tabs">
            <ul>
                <li><a href="#Contact-Edit">Edit Tax</a></li>
            </ul>
            <div id="Contact-Edit">

                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">
                        <aa>Information</aa>
                    </legend>
                    <table>
                        <tr>

                            <input type="hidden" id="id" name="id" value="<?php echo $row->id; ?>">
                            <td><a>Name:</a></td><td> <a1><input type="text" id="name" name="name" required="required" value="<?php echo $row->name; ?>"></a1> </td>
                            <td><a>&nbsp</a></td><td> <a1><input type="hidden" id="code" name="code" value="<?php echo $row->code; ?>"></a1> </td>
                            <td><a>&nbsp Description:</a></td><td> <a1><input type="text" id="description" name="description" value="<?php echo $row->description; ?>"></a1> </td>
                            <td><a>&nbsp Tax Code:</a></td><td> <a1><input type="text" id="tax_code" name="tax_code" value="<?php echo $row->tax_code; ?>" required="required" ></a1> </td>

                            <td>&nbsp <a1><button type="submit" name="Submit" id="submit">Save</button>&nbsp<button type="button" onclick="window.location='<?php $_SERVER['PHP_SELF']?>?loc=tax&action=view&alert=';">Cancel </button></a1> </td>
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
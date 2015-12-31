@extends('navbar')
@section('navbar')


    <?php

$row=$item_detail;

?>

<form id="form" method="post" action="../{{ $row->id }}">
    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" id="_method" name="_method" value="PATCH">

    <div id='main-wrapper-contact'>
        <div id="tabs">
            <ul>
                <li><a href="#Contact-Edit">Edit Item</a></li>
            </ul>
            <div id="Contact-Edit">

                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">
                        Information
                    </legend>
                    <table>
                        <tr>
                            <input type="hidden" id="id" name="id" value="<?php echo $row->id; ?>">
                            <td><a>Name:</a></td><td> <a1><input type="text" id="name" name="name" required="required" value="<?php echo $row->name; ?>" ><a1> </td>
                            <td><a>&nbsp Code:</a></td><td> <a1><input type="text" id="code" name="code" value="<?php echo $row->code; ?>" ></a1> </td>
                            <td><a>&nbsp Description:</a></td><td> <a1><input type="text" id="description" name="description" value="<?php echo $row->description; ?>" ><a1> </td>
                            <td><a>&nbsp Category:</a></td><td>
                                <a1><select name="category" id="category">
                                        <?php

                                        foreach ($category_details as $row2) {
                                        ?>
                                        <option value="<?php  echo $row2->id; ?>" <?php if($row2->id==$row->category){echo "selected='selected'"; }  ?> ><?php echo $row2->name;  ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select></a1>
                            </td>

                        </tr>
                        <tr><td>
                                &nbsp</td>
                        </tr>
                        <tr>
                            <td><a>Unit of Measurement:</a></td><td> <a1><input type="text" id="uof" name="uof" value="<?php echo $row['uof']; ?>" ><a1> </td>
                            <td><a>&nbsp Unit Price:</a></td><td> <a1><input type="text" id="unit_price" name="unit_price" value="<?php echo $row['unit_price']; ?>"><a1> </td>
                            <td><a>&nbsp Tax:</a></td><td>
                                <a1><select name="tax_code" id="tax_code">
                                        <?php

                                        foreach ($tax_details as $row2) {
                                        ?>
                                        <option value="<?php  echo $row2->id; ?>" <?php if($row2->id==$row->tax_code){echo "selected='selected'"; }  ?>><?php echo $row2->name;  ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select><a1>
                            </td>
                            <td></td>
                            <td>&nbsp <a1><button type="submit" name="Submit" id="submit">Save</button>&nbsp<button type="button" onclick="window.location='<?php $_SERVER['PHP_SELF']?>?loc=item&action=view&alert=';">Cancel </button></a1> </td>
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
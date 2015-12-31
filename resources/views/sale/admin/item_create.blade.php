@extends('navbar')
@section('navbar')



<form id="form" method="post" action="../item">
    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">

    <div id='main-wrapper-contact'>
        <div id="tabs">
            <ul>
                <li><a href="#Contact-Edit">Add Item</a></li>
            </ul>
            <div id="Contact-Edit">

                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">
                        <aa>Information</aa>
                    </legend>
                    <table>
                        <tr>

                            <td><a>Name:</a></td><td> <a><input type="text" id="name" name="name" required="required"></a> </td>
                            <td><a>&nbsp Code:</a></td><td> <a><input type="text" id="code" name="code" ></a> </td>
                            <td><a>&nbsp Description:</a></td><td> <a><input type="text" id="description" name="description" ></a> </td>
                            <td><a>&nbsp Category:</a></td><td><a>
                                    <select name="category" id="category">
                                        <?php

                                        foreach ($category_details as $row2) {
                                        ?>
                                        <option value="<?php  echo $row2->id; ?>"><?php echo $row2->name;  ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select></a>
                            </td>

                        </tr>
                        <tr><td>
                                &nbsp</td>
                        </tr>
                        <tr>
                            <td><a>Unit of Measurement:</a></td><td> <a><input type="text" id="uof" name="uof" ></a> </td>
                            <td><a>&nbsp Unit Price:</a></td><td> <a><input type="text" id="unit_price" name="unit_price" ></a> </td>
                            <td><a>&nbsp Tax:</a></td><td>
                                <a>
                                    <select name="tax_code" id="tax_code">
                                        <?php
                                        foreach ($tax_details as $row2) {
                                        ?>
                                        <option value="<?php  echo $row2->id; ?>"><?php echo $row2->name;  ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select></a>
                            </td>
                            <td></td>
                            <td>&nbsp <a><button type="submit" name="Submit" id="submit">Save</button></a> &nbsp <a><button type="button" onclick="window.location='<?php $_SERVER['PHP_SELF']?>?loc=item&action=view&alert=';">Cancel </button></a> </td>
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
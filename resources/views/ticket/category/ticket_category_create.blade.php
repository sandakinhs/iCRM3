@extends('navbar')
@section('navbar')

<form id="form" method="post" action="../ticket_category">

    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">

    <div id='main-wrapper-contact'>
        <div id="tabs">
            <ul>
                <li><a href="#Contact-Edit">Add Category</a></li>
            </ul>
            <div id="Contact-Edit">

                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">
                        <aa>Information</aa>
                    </legend>
                    <table>
                        <tr>

                            <td><a>Category:</a></td><td> <a1><input type="text" id="category" name="category" required="required"></a1> </td>
                            <td><a>&nbsp Description:</a></td><td> <a1><input type="text" id="description" name="description" ></a1> </td>
                            <td>&nbsp</td>
                            <td>&nbsp <a1><button type="submit" name="Submit" id="submit">Save</button>&nbsp<button type="button" onclick="window.location='<?php $_SERVER['PHP_SELF']?>?loc=category&action=view&alert=';">Cancel </button></a1> </td>
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
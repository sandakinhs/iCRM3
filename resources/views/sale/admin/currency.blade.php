@extends('navbar')
@section('navbar')

<form id="form" method="post" action="currency">
    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">

    <div id='main-wrapper-contact'>
        <div id="tabs">
            <ul>
                <li><a href="#Contact-Edit">Currency</a></li>
            </ul>
            <div id="Contact-Edit">

                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">
                        <aa>Information</aa>
                    </legend>
                    <table>
                        <tr>

                            <td><a>Currency :</a></td><td>
                                <a1><select name="currency" id="currency">
                                        <option value="LKR" <?php if($curr=="LKR"){ echo 'selected="selected"'; }   ?> >LKR</option>
                                        <option value="USD" <?php if($curr=="USD"){ echo 'selected="selected"'; }   ?> >USD</option>
                                        <option value="EUR" <?php if($curr=="EUR"){ echo 'selected="selected"'; }   ?> >EUR</option>
                                        <option value="INR" <?php if($curr=="INR"){ echo 'selected="selected"'; }   ?> >INR</option>
                                        <option value="MYR" <?php if($curr=="MYR"){ echo 'selected="selected"'; }   ?> >MYR</option>
                                        <option value="MVR" <?php if($curr=="MVR"){ echo 'selected="selected"'; }   ?> >MVR</option>
                                    </select></a1> </td>

                            <td>&nbsp</td>
                            <td>&nbsp <a1><button type="submit" name="Submit" id="submit">Save</button>&nbsp<button type="button" onclick="window.location='<?php $_SERVER['PHP_SELF']?>?loc=home';">Cancel </button> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Default Currency :<?php echo ' <b>'.$curr.'</b>';  ?> </a1></td>
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
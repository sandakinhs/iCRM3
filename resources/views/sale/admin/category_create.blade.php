@extends('navbar')
@section('navbar')



<form id="form" method="post" action="../category">
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

                            <td><a>Name:</a></td><td> <a1><input type="text" id="name" name="name" required="required"></a1> </td>
                            <td><a>&nbsp Description:</a></td><td> <a1><input type="text" id="description" name="description" ></a1> </td>
                            <td><a>&nbsp Level:</a></td><td> <a1><!-- <input type="text" id="level" name="level" > -->
                                    <select  id="level" name="level" onchange="load_main_cat()">
                                        <option value="1">Main Category</option>
                                        <option value="2">Sub Category</option>
                                    </select></a1> </td>
                            <td> <div id="main_cat" style="display:inline-block"></div></td>

                            <td>&nbsp</td>
                            <td>&nbsp <a1><button type="submit" name="Submit" id="submit">Save</button>&nbsp<button type="button" onclick="window.location='<?php $_SERVER['PHP_SELF']?>?loc=category&action=view&alert=';">Cancel </button></a1> </td>
                        </tr>

                    </table>

                </fieldset>

            </div>
        </div>
    </div>
    <br>

    <script type="text/javascript" src="{{ asset("assets/js/custom/jquery-1-custom.js") }}"></script>
    <script type="text/javascript">
        var root_url = "<?php echo Request::root(); ?>/"; // put this in php file

        function load_main_cat(){

            var value = $("#level").val();

            if(value=='2'){
                $("#main_cat").load( root_url+"categories/main_category" );
                evt.preventDefault();
            }else{
                $("#main_cat").load("empty.php");
                evt.preventDefault();
            }


        }
    </script>
</form>

    @stop
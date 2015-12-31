@extends('navbar')
@section('navbar')


    <?php

//if ($_SESSION['user_type']!='0'){  //check privilege

?>

<html>
<head>
    <title></title>



</head>
<body>


<form id="form" method="post" action="../user">
    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">


    <div id='main-wrapper-contact'>
        <div id="tabs">
            <ul>
                <li><a href="#Contact-Edit">Add User</a></li>
            </ul>
            <div id="Contact-Edit">

                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">
                        <aa>Basic Information</aa>
                    </legend>
                    <table>
                        <tr>
                            <td> <a>First Name:</a> </td><td> <a><input type="text" id="user_firstname" name="user_firstname"></a> </td>
                            <td><a>&nbsp Last Name:</a></td><td> <a><input type="text" id="user_lastname" name="user_lastname" required></a> </td>
                            <td><a>&nbsp Type:</a></td><td> <a><select  id="user_is_admin" name="user_is_admin">
                                        <option value="0">User</option>
                                        <?php  if($_SESSION['user_type']=='1'){ ?>
                                        <option value="2">Supervisor</option>
                                        <option value="1">Admin</option>
                                    <?php } ?></a>
                                </select>
                            </td>

                        </tr>

                        <tr>
                            <td>&nbsp</td><td></td>
                            <td>&nbsp</td><td></td>
                            <td>&nbsp</td><td></td>
                            <td>&nbsp</td><td></td>
                        </tr>

                        <tr>
                            <td><a>Status :</a></td><td> <a><select  id="user_status" name="user_status">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select></a>
                            </td>
                            <td>&nbsp</td><td></td>
                            <td>&nbsp</td><td></td>
                            <td>&nbsp</td><td></td>
                        </tr>

                        <tr><td>&nbsp</td></tr>

                        <tr>
                            <td><a>Email :</a></td><td> <a><input type="email" id="user_email" name="user_email" required></a> </td>
                            <td><a>&nbsp Mobile :</a></td><td> <a><input type="number" id="user_mobile" name="user_mobile"></a> </td>
                            <td><a>&nbsp</a></td><td></td>
                            <td><a>&nbsp</a></td><td></td>
                        </tr>
                    </table>

                </fieldset>

                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">
                        <aa>User Group</aa>
                    </legend>

                    <div id="group"></div>   <!-- load groupselete php -->

                </fieldset>


                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">
                        <aa>Login Information</aa>
                    </legend>

                    <table>
                        <tr>
                            <td><a>User Name :</a></td><td> <a><input type="text" id="user_name" name="user_name" required></a> </td>
                            <td><a>&nbsp Password :</a></td><td> <a><input type="password" id="user_password" name="user_password" required></a> </td>
                            <td><a>&nbsp Re.Passsword :</a></td><td> <a><input type="password" id="user_password2" name="user_password2" required></a> </td>
                            <td><a>&nbsp</a></td><td></td>
                        </tr>
                        <tr>
                            <td>&nbsp</td><td> <a1><span id="availability_status"></span></a1> </td>
                            <td>&nbsp</td><td></td>
                            <td>&nbsp</td><td> <a1><span id="password_status"></span></a1> </td>
                            <td>&nbsp</td><td></td>
                        </tr>
                        <tr>
                            <td>&nbsp</td><td></td>
                            <td>&nbsp</td><td></td>
                            <td><a><input type="submit" name="Submit" id="submit" ></a></td><td><a href="<?php $_SERVER['PHP_SELF']?>?loc=user&action=view&alert="><button type="button">Cancel </button></a></td>
                            <td></td><td></td>
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

        $(document).ready(function()
        {

            $("#group").load(root_url+"users/groupselect");
        });



                function submitform(){
                    $.ajax({
                        type: 'post',
                        url: root_url+'users/grouppost',
                        data: $('form').serialize(),

                        success: function () {
                            // alert('form was submitted');
                            $("#group").load(root_url+"users/groupselect");
                            evt.preventDefault();
                        },
                        error: function(xhr, textStatus, error){
                            alert(error);
                        }
                    });
                }

    </script>
@stop
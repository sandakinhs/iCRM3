@extends('navbar')
@section('navbar')

<?php


// if ($_SESSION['user_type']!='0'){ //check privilege

?>


<html>
<head>
    <title></title>
</head>
<body>

<?php

$row = $user_details;

?>

<form id="form" method="post" action="">
    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">

    <div id='main-wrapper-contact'>
        <div id="tabs">
            <ul>
                <li><a href="#Contact-Edit">Edit User</a></li>
                <li><a href="#Group_privilege">Group</a></li>
            </ul>
            <div id="Contact-Edit">

                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">
                        <aa>Basic Information </aa>
                    </legend>
                    <table>
                        <tr>
                            <td><a>First Name:</a></td><td> <a><input type="text"  id="user_firstname" name="user_firstname" value="<?php echo $row->user_firstname; ?>" ></a> </td>
                            <td><a>&nbsp Last Name:</a></td><td> <a><input type="text"  id="user_lastname" name="user_lastname" value=<?php echo $row->user_lastname; ?> required></a> </td>
                            <td>
                                <a>&nbsp Type:</a></td><td> <a><select  id="user_is_admin" name="user_is_admin">
                                        <option value="0" <?php if($row->user_is_admin==0){echo "selected";} ?>  >User</option>
                                        <?php  if($_SESSION['user_type']=='1'){ ?>
                                        <option value="2" <?php if($row->user_is_admin==2){echo "selected";} ?>  >Supervisor</option>
                                        <option value="1" <?php if($row->user_is_admin==1){echo "selected";} ?>  >Admin</option>
                                        <?php } ?>
                                    </select></a>
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
                                        <option value="1" <?php if($row->user_status==1){echo "selected";} ?> >Active</option>
                                        <option value="0" <?php if($row->user_status==0){echo "selected";} ?> >Inactive</option>
                                    </select></a>
                            </td>
                            <td>&nbsp</td><td></td>
                            <td>&nbsp</td><td></td>
                            <td>&nbsp</td><td></td>
                        </tr>
                        <tr> <td>&nbsp</td> </tr>
                        <tr>

                            <td><a>Email :</a></td><td> <a><input type="email" id="user_email" name="user_email" value="<?php echo $row->user_email; ?>" ></a> </td>
                            <td><a>&nbsp Mobile :</a></td><td> <a><input type="number"  id="user_mobile" name="user_mobile" value=<?php echo $row->user_mobile; ?> ></a> </td>
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
                        <aa>Submit</aa>
                    </legend>

                    <table>
                        <tr>
                            <td><a>&nbsp</a></td><td></td>
                            <td><a>&nbsp</a></td><td> <a><input type="submit"  name="Submit" ></a> &nbsp <a href="<?php $_SERVER['PHP_SELF']?>?loc=user&action=view&alert="><button type="button">Cancel </button></a> </td>
                        </tr>

                    </table>

                </fieldset>


            </div>

            <div id="Group_privilege">

                <select  name="pri_id" id="pri_id" onchange="loaduserprivi()">
                    <option value="0">Please Select</option>
                    <?php


                    foreach ($user_group_details as $row )
                    { ?>
                    <option value="<?php echo $row->id; ?>"><?php echo $row->group_name; ?></option>
                    <?php  }


                    ?>
                </select>

                <form id="form" method="post" action="userprivilegepost.php">

                    <fieldset class="scheduler-border">
                        <legend class="scheduler-border">
                            <aa>Privilege</aa>
                        </legend>
                        <div id="userpri">Select a Group...</div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>

    <br>

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


        function loaduserprivi(){

            var value = $("#pri_id").val();
            var token =$("#_token").val();


            if(value != 0){

                $.ajax({
                    type: 'post',
                    url: root_url+'users/userprivilege',
                    data:{"_token": token,"pri_id": value},

                    success: function () {

                    },
                    error: function(xhr, textStatus, error){
                        alert(error);
                    }

                });

                $("#userpri").load(root_url+"users/userprivilege");
                evt.preventDefault(); }else{
                $("#userpri").load("empty.php");
            }
        }


        function submitprivi(){       // submit edited privilege data
            $.ajax({
                type: 'post',
                url: root_url+'users/submitprivilege',
                data: $('form').serialize(),

                success: function () {
                    // alert('form was submitted');
                    $("#userpri").load(root_url+"users/userprivilege");
                    evt.preventDefault();
                },
                error: function(xhr, textStatus, error){
                    alert(error);
                }
            });
        }

    </script>

    <script type="text/javascript" src="{{ asset("assets/js/custom/jquery-1-custom.js") }}"></script>

</form>


    @stop
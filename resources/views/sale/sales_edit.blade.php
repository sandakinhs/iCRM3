@extends('navbar')
@section('navbar')

<script type="text/javascript">

    var root_url = "<?php echo Request::root(); ?>/"; // put this in php file

    $(document).ready(function(){
        $("#content").load(root_url+"sales/sale_edit_load");
    });

</script>

<?php

foreach($one_sale as $row1){

//if($privilege->edit_privilege($row1['group'],"sales",$row1['asi1']) == "1" ){
?>
<body>

<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <form id="form" method="post" action="../{{ $row1->order_num }} " >

            <div class="panel panel-primary">
                <div class="panel-heading">Sales Edit</div>

                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10">

                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border">
                                Sales
                            </legend>

                            <div id ="content"> </div>

                            <table >

                                <tr><td>&nbsp</td><td><input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}"> <input type="hidden" id="_method" name="_method" value="PATCH"></td></tr>
                                <tr>
                                    <td><a1>Status:</a1></td>
                                    <td><a1><select name="status" id="status"  >

                                                <?php if($_SESSION['user_type'] != "0" || $row1->status !="pending"){ ?>
                                                <option <?php if($row1->status=="pending"){echo 'selected="selected"';} ?>  value="pending">Pending</option>
                                                <?php if($_SESSION['user_type'] != "0"){ ?>
                                                <option <?php if($row1->status=="authorized"){echo 'selected="selected"';} ?> value="authorized">Authorized</option>
                                                <option <?php if($row1->status=="ready"){echo 'selected="selected"';} ?> value="ready">Ready</option>
                                                <option <?php if($row1->status=="posted"){echo 'selected="selected"';} ?>  value="posted">Posted</option>
                                                <option <?php if($row1->status=="delivered"){echo 'selected="selected"';} ?> value="delivered">Delivered</option>
                                                <?php }
                                                }else{
                                                    echo '<option selected="selected" value="'.$row1->status.'">'.$row1->status.'</option>';
                                                } ?>
                                            </select></a1>
                                    </td>
                                    <!--  <td>Contact Person:</td>
                  <td><input type="text" name="contact" id="contact" value="<?php echo $row1->contact_id; ?>"></td> -->
                                    <td><a1> &nbsp Date:</a1></td>
                                    <td> <a1><input type="date" name="date" id="date" value="<?php echo $row1->date; ?>"></a1> </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr><td>&nbsp</td><td></td></tr>
                            </table>

                            <table>
                                <tr>
                                    <td> <a1>Remark: </a1></td>
                                    <td> <a1><textarea type="text" name="remark" id="remark" rows="4" cols="56" ><?php echo $row1->remark; ?></textarea></a1> </td>
                                </tr>

                                <tr><td>&nbsp</td><td></td></tr>

                                <td align="right"><a1>Group :</a1></td>
                                <td><a1>
                                        <select name="group_id" id="group_id"  onchange="load_assignedto()">

                                            <?php

                                            foreach ($user_can_edit_group as $row2) {
                                            ?>
                                            <option value="<?php  echo $row2->group_id; ?>" <?php if($row1->sgroup==$row2->group_id){ echo 'selected="selected"';} ?> ><?php echo $row2->group_name;  ?></option>
                                            <?php
                                            }
                                            ?>

                                        </select></a1> &nbsp &nbsp &nbsp

                                    <a1>Assigned To</a1> <div id="assignedto"  style="display:inline-block" ></div>

                                </td>

                                <tr><td>&nbsp</td><td></td></tr>
                                <tr>
                                    <td></td>
                                    <td><input type="submit" name="sales"> <a1><button type="button"  onclick="window.location='<?php $_SERVER['PHP_SELF']?>?loc=sales&action=view&alert=';">Cancel</button></a1></td>
                                </tr>
                            </table>

                        </fieldset>


                    </div>
                    <div class="col-sm-1"></div>
                </div>

            </div>

        </form>
    </div>
    <div class="col-sm-1"></div>
</div>

</body>

<?php

        }

        ?>


<script type="text/javascript">

    $(document).ready(function(){

        var value = $("#group_id").val();

        $.ajax({
            type: 'post',
            url: 'assignedto.php',
            data:"user_group="+ value,

            success: function () {
                // alert('form was submitted');
                $("#assignedto").load("assignedto.php");
                evt.preventDefault();
            }
        });
    });


    function load_assignedto(){

        var value = $("#group_id").val();

        $.ajax({
            type: 'post',
            url: 'assignedto.php',
            data:"user_group="+ value,

            success: function () {
                // alert('form was submitted');
                $("#assignedto").load("assignedto.php");
                evt.preventDefault();
            }
        });

    }

    function pop_up(url,windowName) {
        newwindow=window.open(url,windowName,'height=400,width=700');
        if (window.focus) {newwindow.focus()}
    }

</script>

<script type="text/javascript" src="{{ asset("assets/js/custom/assigned-to.js") }}"></script>

@stop
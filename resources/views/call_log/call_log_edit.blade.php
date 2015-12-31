@extends('navbar')
@section('navbar')

<?php
$row = $call_log_detials;

$_SESSION['contact_assign']=$row['assignedto'];

if(isset($inquiry_details)){

$row1 = $inquiry_details;

?>

<body>

<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <form id="form" method="post" action="../{{ $row->id }}" >

            <input type="hidden" id="_method" name="_method" value="PATCH">
            <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" id="call_type" name="call_type" value="{{$row->call_type}}">

            <div class="panel panel-primary">
                <div class="panel-heading"><aa>Inquiry Edit</aa></div>

                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10">

                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border">
                                <aa>Remark</aa>
                            </legend>


                            <div id ="content"> </div>

                            <table  >
                                <tr>
                                    <td align="right"><a1>Subject :</a1></td>
                                    <td> <a1><input type="text" name="subject" id="subject"  value="<?php echo $row1->subject; ?>" size="80%"></a1> </td>
                                </tr>
                                <tr><td>&nbsp</td><td></td></tr>
                                <tr>
                                    <td align="right"><a1>Body :</a1></td>
                                    <td><a1> <textarea type="text" name="body" id="body" rows="4"  cols="80%" > <?php echo $row1->body; ?> </textarea></a1></td>
                                </tr>
                                <tr><td>&nbsp</td><td></td></tr>
                                <tr>
                                    <td align="right"><a1>Status :</a1></td>
                                    <td><a1><select name="status" id="status"  >
                                                <option  <?php if($row1->status=="pending"){echo 'selected="selected"';} ?>  value="pending">Pending</option>
                                                <option  <?php if($row1->status=="complete"){echo 'selected="selected"';} ?> value="complete">Complete</option>
                                            </select></a1></td>
                                </tr>
                                <tr><td>&nbsp</td><td></td></tr>

                                <tr>
                                    <td align="right"><a1>Group :</a1></td>
                                    <td>
                                        <select name="group_id" id="group_id"  onchange="load_assignedto()">

                                            <?php

                                            foreach ($edit_group as $row1) {
                                            ?>

                                            <option value="<?php  echo $row1->group_id; ?>"><?php echo $row1->group_name;  ?></option>
                                            <?php
                                            }
                                            ?>

                                        </select> &nbsp &nbsp &nbsp

                                        <a1>Assigned To</a1> <div id="assignedto"  style="display:inline-block" ></div>

                                    </td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <td>&nbsp</td><td>&nbsp</td>
                                </tr>

                                <tr>
                                    <td>&nbsp</td>
                                    <td><input type="submit" name="remark" value="Save"> <a1><button type="button"  onclick="window.location='<?php $_SERVER['PHP_SELF']?>?loc=call_log&action=view&alert=';">Cancel</button></a1> </td>
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
}elseif (isset($sales_detials)) {


$row1= $sales_detials;

?>
<body>

<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <form id="form" method="post" action="../{{$row->id}}" >

            <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" id="_method" name="_method" value="PATCH">
            <input type="hidden" id="call_type" name="call_type" value="{{$row->call_type}}">

            <div class="panel panel-primary">
                <div class="panel-heading"><aa>Sales Edit</aa></div>

                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10">

                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border">
                                <aa>Sales</aa>
                            </legend>

                            <div id ="content"> </div>

                            <table >
                                <tr><td>&nbsp</td><td></td></tr>
                                <tr>
                                    <td><a1>Status :&nbsp &nbsp</a1></td>
                                    <td><select name="status" id="status"  >
                                            <option <?php if($row1->status=="pending"){echo 'selected="selected"';} ?>  value="pending">Pending</option>
                                            <?php if($_SESSION['user_type'] != "0"){ ?>
                                            <option <?php if($row1->status=="posted"){echo 'selected="selected"';} ?>  value="posted">Posted</option>
                                            <option <?php if($row1->status=="authorized"){echo 'selected="selected"';} ?> value="authorized">Authorized</option>
                                            <option <?php if($row1->status=="ready"){echo 'selected="selected"';} ?> value="ready">Ready</option>
                                            <option <?php if($row1->status=="delivered"){echo 'selected="selected"';} ?> value="delivered">Delivered</option>
                                            <?php   } ?>
                                        </select>
                                    </td>

                                    <td><a1>&nbsp Date:</a1></td>
                                    <td><input type="date" name="date" id="date" value="<?php echo $row1->date; ?>"></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr><td>&nbsp</td><td></td></tr>
                            </table>

                            <table>
                                <tr>
                                    <td><a1>Remark :</a1></td>
                                    <td><a1><textarea type="text" name="remark" id="remark" rows="4" cols="56" ><?php echo $row1->remark; ?></textarea></a1></td>
                                </tr>

                                <tr><td>&nbsp</td><td></td></tr>

                                <td align="right"><a1>Group :</a1></td>
                                <td>
                                    <select name="group_id" id="group_id"  onchange="load_assignedto()">

                                        <?php
                                        foreach ($edit_group as $row1) {
                                        ?>

                                        <option value="<?php  echo $row1->group_id; ?>"><?php echo $row1->group_name;  ?></option>
                                        <?php
                                        }
                                        ?>

                                    </select> &nbsp &nbsp &nbsp

                                    <a1>Assigned To :</a1> <div id="assignedto"  style="display:inline-block" ></div>

                                </td>

                                <tr><td>&nbsp</td><td></td></tr>
                                <tr>
                                    <td></td>
                                    <td><input type="submit" name="sales" value="Save"> <a1><button type="button"  onclick="window.location='<?php $_SERVER['PHP_SELF']?>?loc=call_log&action=view&alert=';">Cancel</button></a1> </td>
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
}elseif (isset($ticket_detials)) {

$row1= $ticket_detials;



?>

<body>

<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <form id="form" method="post" action="../{{$row->id}}" >

            <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" id="_method" name="_method" value="PATCH">
            <input type="hidden" id="call_type" name="call_type" value="{{$row->call_type}}">

            <div class="panel panel-primary">
                <div class="panel-heading"><aa>Ticket Edit</aa></div>

                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10">

                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border">
                                <aa>Ticket</aa>
                            </legend>


                            <div id ="content"> </div>

                            <table  >
                                <tr>
                                    <td align="right"><a1>Subject :</a1></td>
                                    <td> <a1><input type="text" name="subject" id="subject"  value="<?php echo $row1->subject; ?>" size="80%"></a1> </td>
                                </tr>
                                <tr><td>&nbsp</td><td></td></tr>
                                <tr>
                                    <td align="right"><a1>Problem  :</a1></td>
                                    <td><a1> <textarea type="text" name="problem" id="problem" rows="4"  cols="80%" ></textarea></a1></td>
                                </tr>
                                <tr><td>&nbsp</td><td></td></tr>
                                <tr>
                                    <td align="right"><a1>Priority :</a1></td>
                                    <td><a1><select name="priority" id="priority"  >
                                                <option value="normal" <?php if($row1->priority=="pending"){echo 'selected="selected"';} ?> >Normal</option>
                                                <option value="high" <?php if($row1->priority=="pending"){echo 'selected="selected"';} ?> >High</option>
                                                <option value="critical" <?php if($row1->priority=="pending"){echo 'selected="selected"';} ?> >Critical</option>
                                                <option value="minimal" <?php if($row1->priority=="pending"){echo 'selected="selected"';} ?> >Minimal</option>
                                            </select></a1>

                                        <a1>&nbsp Category   :</a1>
                                        <a1><select name="category" id="category" >

                                                <?php

                                                foreach ($ticket_cat as $row_cat) {

                                                    if($row1->category == $row_cat->category ){
                                                        echo '<option value="'.$row_cat->category.'" selected="selected">'.$row_cat->category .'</option>';
                                                    }else{
                                                        echo '<option value="'.$row_cat->category.'">'.$row_cat->category.'</option>';
                                                    }
                                                }
                                                ?>

                                            </select></a1>

                                        <a1>&nbsp Status:</a1>
                                        <a1>
                                            <select name="status" id="status" >
                                                <option value="pending" <?php if($row1->status=="pending"){ echo 'selected="selected"';} ?> >Pending</option>
                                                <option value="complete" <?php if($row1->status=="complete"){ echo 'selected="selected"';} ?>>Complete</option>
                                            </select>
                                        </a1>

                                    </td>
                                </tr>
                                <tr><td>&nbsp</td><td></td></tr>

                                <tr>
                  <td align="right"><a1>Group :</a1></td>
                   <td>
                    <select name="group_id" id="group_id"  onchange="load_assignedto()">

                      <?php
                                foreach ($edit_group as $row_g ) {

                                ?>

                                        <option value="<?php  echo $row_g->group_id; ?>"><?php echo $row_g->group_name;  ?></option>
                      <?php
                                }
                                ?>

                                        </select> &nbsp &nbsp &nbsp

                                        <a1>Assigned To</a1> <div id="assignedto"  style="display:inline-block" ></div>

                                      </td>
                                      <td></td>
                                    </tr>

                                <tr>
                                    <td>&nbsp</td><td>&nbsp</td>
                                </tr>

                                <tr>
                                    <td>&nbsp</td>
                                    <td><input type="submit" name="ticket" value="Save"> <a1><button type="button"  onclick="window.location='<?php $_SERVER['PHP_SELF']?>?loc=call_log&action=view&alert=';">Cancel</button></a1> </td>
                                </tr>

                            </table>

                        </fieldset>

                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border">
                                <aa>Problems</aa>
                            </legend>

                            <table class="table table-hover table-condensed table-bordered" >
                                <?php

                                foreach ($ticket_problems as $row2) {

                                    echo "<tr>
                  <td><a1>".$row2->user_name."</a1></td> <td><a1>".$row2->created_time."</a1></td> <td>&nbsp &nbsp<a1>".$row2->problem."</a1></td>
                </tr>";
                                }

                                ?>
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
    var root_url = "<?php echo Request::root(); ?>/"; // put this in php file
</script>
<script type="text/javascript" src="{{ asset("assets/js/custom/assigned-to.js") }}"></script>
@stop
@extends('navbar')
@section('navbar')

<?php


$row1= $ticket_details;



?>

<body>

<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <form id="form" method="post" action="../{{ $row1->id }} " >

            <input type="hidden" id="_method" name="_method" value="PATCH">
            <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">

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
                                                <option value="minimal" <?php if($row1->priority=="pending"){echo 'selected="selected"';} ?> >Minimal</option>
                                                <option value="normal" <?php if($row1->priority=="normal"){echo 'selected="selected"';} ?> >Normal</option>
                                                <option value="high" <?php if($row1->priority=="high"){echo 'selected="selected"';} ?> >High</option>
                                                <option value="critical" <?php if($row1->priority=="critical"){echo 'selected="selected"';} ?> >Critical</option>
                                            </select></a1>

                                        <a1>&nbsp Category   :</a1>
                                        <a1><select name="category" id="category"  >
                                                <?php

                                                foreach ($ticket_category as $row_cat) {
                                                    echo '<option value="'.$row_cat->category.'">'.$row_cat->category.'</option>';
                                                }
                                                ?>
                                            </select></a1>
                                        <a1>&nbsp Status:</a1>
                                        <a1>
                                            <select name="status" id="status" >
                                                <option value="pending" <?php if($row1->status == "pending"){ echo 'selected="selected"';} ?> >Pending</option>
                                                <option value="complete" <?php if($row1->status == "complete"){ echo 'selected="selected"';} ?> >Complete</option>
                                            </select>
                                        </a1>
                                    </td>
                                </tr>
                                <tr><td>&nbsp</td><td></td></tr>


                                <tr>
                                    <td>&nbsp</td><td>&nbsp</td>
                                </tr>

                                <tr>
                                    <td>&nbsp</td>
                                    <td><input type="submit" name="Submit" id="submit" value="Save"> <a1><button type="button"  onclick="window.location='<?php $_SERVER['PHP_SELF']?>?loc=call_log&action=view&alert=';">Cancel</button></a1> </td>
                                </tr>

                            </table>

                        </fieldset>

                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border">
                                <aa>Problems</aa>
                            </legend>

                            <table class="table table-hover table-condensed table-bordered" >
                                <?php

                                echo '<tr><th><a1>Changed By</a1></th><th><a1>Date</a1></th><th><a1>Problem</a1></th></tr>';


                                foreach ($problems as $row2) {

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

    @stop
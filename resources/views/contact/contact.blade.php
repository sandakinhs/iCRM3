@extends('navbar')
@section('navbar')

<div class="row">
<div class="col-sm-1"></div>
<div class="col-sm-10">

<form id="form2" method="post" action="<?php $_SERVER['PHP_SELF']?>?loc=contact&action=view&alert=">

<fieldset class="scheduler-border">
<legend class="scheduler-border">
<aa>Search</aa>
</legend>
<table>
<tr>
<td>&nbsp</td>
<td><a1>Name</a1></td>
<td>&nbsp</td>
<td><input type="text"  id="contact_name" name="contact_name" ></td>
<td>&nbsp &nbsp &nbsp</td>
<td><a1>Number</a1></td>
<td>&nbsp</td>
<td><input type="number" id="contact_no" name="contact_no" ></td>
<td>&nbsp &nbsp &nbsp</td>
<td><input type="submit" name="submit" value="Search"></td>
<td>&nbsp</td>
</tr>
</table>

<table>
<tr>
<td>&nbsp</td><td></td>
</tr>
<tr>
<td>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
</td>
<td>
<div id="search"><a1>Advance Search</a1> &nbsp <a href="#" onclick="load_search()" class="glyphicon glyphicon-search" ></a></div>
</td>
</tr>
</table>
</form>

<div class="row">
<div class="col-sm-11"></div>
<div class="col-sm-1">

<form id="form" method="post" action="<?php $_SERVER['PHP_SELF']?>?loc=contact&action=view&alert=">
<a1><select id="sort" name="sort" onchange="this.form.submit()">
<option value="DESC" <?php if ($_SESSION['sort']=="DESC"){echo "selected='selected'";} ?> >DESC</option>
<option value="ASC"  <?php if ($_SESSION['sort']=="ASC"){echo "selected='selected'";} ?> >ASC</option>
</select></a1>
</form>

</div>
</div>

</fieldset>


</div>
<div class="col-sm-1"></div>
</div>


<div class="row"><br></div>
<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-2">

        <?php // if ($privilege->add_privilege("contacts") == "1"){    //check privilege
        ?>
        <a href="<?php $_SERVER['PHP_SELF']?>?loc=contact&action=add&alert=">Add Contact</a>
        <?php  //
        //}
            ?>

    </div>
    <div class="col-sm-2" align="left">
    </div>
    <div class="col-sm-8">
    </div>
</div>

<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10" style="overflow: scroll;">
        <table class="table table-condensed table-bordered">

            <tr class="info">

                @foreach($table_headings as $heads)
                    <th><aa>{{ $heads }}</aa></th>
                @endforeach

                <th></th>

            </tr>

            <?php

            foreach ($result as $row)
            {

            //if($privilege->view_prvilege($row['group'],"contacts",$row['assignedto']) == "1" ){   // check user can viwe this data

            ?>
            <tr>
                <?php
                foreach($selected_columns as $b){

                    if($b=="contact_owner"){
                        echo "<td><a1>".$row->user_name."</a1></td>";
                    }elseif ($b=="group") {
                        echo "<td><a1>".$row->group_name."</a1></td>";
                    }elseif ($b=="assignedto") {
                        echo "<td><a1>".$row->Assign."</a1></td>";
                    }elseif ($b=="contact_firstname") {
                        echo "<td><a href='".$_SERVER['PHP_SELF']."?loc=contact&action=edit&cid=".$row->id." ' >".$row->{$b->column_name}."</a></td>";
                    }elseif ($b=="contact_category") {
                        echo "<td><a1>".$row->category."</a1></td>";
                    }else{
                        echo "<td><a1>".$row->{$b->column_name}."</a1></td>";
                    }
                }
                ?>
                <td><?php // if ($privilege->edit_privilege($row['group'],"contacts",$row['assignedto']) == "1" ){ ?><a href="<?php $_SERVER['PHP_SELF']?>?loc=contact&action=edit&cid=<?php echo $row->id; ?>" class="glyphicon glyphicon-pencil" ></a><?php //} ?>
                    <?php // if ($privilege->delete_privilege($row['group'],"contacts",$row['assignedto']) == "1" ){ ?><a href="#" onclick="AlertIt('functions/delete.php?table=contacts&id=<?php echo $row->id; ?>','1');" class="glyphicon glyphicon-remove-circle" style="color:red" ></a> <?php // } ?>
                </td>
            </tr>

            <?php

           // }//end of if
            }// end of while

            ?>

        </table>
    </div>
    <div class="col-sm-1"></div>
</div>

<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">


        {!! $result->setPath('contact')->render() !!}


    </div>
    <div class="col-sm-1"></div>
</div>


</body>
</html>

    @stop


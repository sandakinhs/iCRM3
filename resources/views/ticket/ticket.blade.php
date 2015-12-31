@extends('navbar')
@section('navbar')

    @inject('privilege', 'App\Http\Controllers\check_privileges')

<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">

        <form id="form2" method="post" action="ticket/search">
            <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">

            <fieldset class="scheduler-border">
                <legend class="scheduler-border">
                    <aa>Search</aa>
                </legend>
                <table>
                    <tr>
                        <td>&nbsp</td>
                        <td><a1>Contact</a1></td>
                        <td>&nbsp</td>
                        <td><input type="text"  id="contact" name="contact" ></td>
                        <td>&nbsp &nbsp &nbsp</td>
                        <td><a1>Date</a1></td>
                        <td>&nbsp</td>
                        <td><input type="date" id="date1" name="date1" ></td>
                        <td>&nbsp &nbsp &nbsp</td>
                        <td><a1><input type="submit" name="submit" value="Search"></a1></td>
                        <td>&nbsp</td>
                    </tr>
                </table>

                <table style="width:100%">
                    <tr>
                        <td>&nbsp</td><td></td><td></td>
                    </tr>
                    <tr>
                        <td>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                        </td>
                        <td>
                            <div id="search"><a1>Advance Search</a1> &nbsp <a href="#" onclick="load_search()" class="glyphicon glyphicon-search" ></a></div></form>
        </td>
        <td align="right" width="70%">

            <form id="form" method="post" action="<?php $_SERVER['PHP_SELF']?>?loc=ticket&action=view&alert=">
                <a1><select id="sort" name="sort" onchange="this.form.submit()">
                        <option value="DESC" <?php if ($_SESSION['sort']=="DESC"){echo "selected='selected'";} ?> >DESC</option>
                        <option value="ASC"  <?php if ($_SESSION['sort']=="ASC"){echo "selected='selected'";} ?> >ASC</option>
                    </select></a1>
            </form>

        </td>
        </tr>
        </table>

        </fieldset>


    </div>
    <div class="col-sm-1"></div>
</div>


<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10" style="overflow: scroll;">

        <?php
         if ($privilege->add_privilege("ticket") == "1"){  //check privilege
        ?>
        <a href="{{ 'ticket/create' }}">Add Ticket</a>
        <?php
        }
        ?>

        <table class="table table-condensed table-bordered">

            <tr class="info">

                @foreach($table_headings as $heads)
                    <th><aa>{{ $heads }}</aa></th>
                @endforeach

                <th></th>
            </tr>

            <?php

            foreach ($result as $row){

            if($privilege->view_prvilege($row->group_id,"ticket",$row->assignedto) == "1" ){   // check user can viwe this data
            ?>

            <tr>
                <?php
                foreach($selected_columns as $b){

                if($b->column_name=="contact"){ ?>
                <td><a href="#" onclick="pop_up('popup_ticket.php?id=<?php echo $row->id; ?>','1');"><?php echo $row->contact_firstname;  ?></a> </td>
                <?php
                }elseif ($b->column_name=="owner") {
                    echo "<td><a1>".$row->user_name."</a1></td>";
                }elseif ($b->column_name=="group") {
                    echo "<td><a1>".$row->group_name."</a1></td>";
                }elseif ($b->column_name=="assignedto") {
                    echo "<td><a1>".$row->assign."</a1></td>";
                }elseif ($b->column_name=="modified_by") {
                    echo "<td><a1>".$row->modif."</a1></td>";
                }
                else{
                    echo "<td><a1>".$row->{$b->column_name}."</a1></td>";
                }
                }

                ?>
                <td>
                    <?php if ($privilege->edit_privilege($row->group_id,"ticket",$row->assignedto)=="1"){    // check privilege ?>
                    <a href="ticket/{{$row->id}}/edit" class="glyphicon glyphicon-pencil" ></a> <?php  } ?>
                    <?php  if ($privilege->delete_privilege($row->group_id,"ticket",$row->assignedto)=="1"){    //check privileges ?>
                    <a href="#" onclick="deleted({{ $row->id }})" class="glyphicon glyphicon-remove-circle" style="color:red" ></a><?php  } ?>
                </td>
            </tr>

            <?php
            }
            }
            ?>


        </table>

    </div>
    <div class="col-sm-1"></div>
</div>


<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">


        {!! $result->setPath('ticket')->render() !!}


    </div>
    <div class="col-sm-1"></div>
</div>

<script type="text/javascript">

    var root_url = "<?php echo Request::root(); ?>/"; // put this in php file

    function deleted(id){

        var token   = "{{ csrf_token() }}";
        var method  = "DELETE";

        var r = confirm("Confirm Delete!");

        if (r == true) {

            $.ajax({
                type: 'post',
                url: root_url + 'ticket/' + id,
                data: {"_token": token, "_method": method},

                success: function () {

                    alert('Delete Successful');
                    location.reload();

                },
                error: function (xhr, textStatus, error) {
                    alert(error);
                }
            });

        }
    }

    function load_search(){
        $("#search").load(root_url+"ticket_ad_search");
    }
</script>

@stop


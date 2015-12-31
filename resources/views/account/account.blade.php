@extends('navbar')
@section('navbar')

    @inject('privilege', 'App\Http\Controllers\check_privileges')

<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">

        <form id="form2" method="post" action="account/search">
            <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">

            <fieldset class="scheduler-border">
                <legend class="scheduler-border">
                    <aa>Search</aa>
                </legend>
                <table>
                    <tr>
                        <td>&nbsp</td>
                        <td><a1>Account Name</a1></td>
                        <td>&nbsp</td>
                        <td><input type="text"  id="account_name" name="account_name" ></td>
                        <td>&nbsp &nbsp &nbsp</td>
                        <td><a1>Account Type</a1></td>
                        <td>&nbsp</td>
                        <td><input type="text" id="account_type" name="account_type" ></td>
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

            <form id="form" method="post" action="<?php $_SERVER['PHP_SELF']?>?loc=account&action=view&alert=">
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

        <?php if ($privilege->add_privilege("accounts") == "1"){    //check privileges
        ?>
        <a href="{{ 'account/create' }}">Add Account</a>
        <?php } ?>

        <div class="panel panel-primary">
            <table class="table table-hover table-condensed table-bordered">
                <tr class="info">

                    @foreach($table_headings as $heads)
                        <th><aa>{{ $heads }}</aa></th>
                    @endforeach

                    <th></th>

                </tr>

                <?php

                foreach ($result as $row)
                {

                if($privilege->view_prvilege($row->group_id,"accounts",$row->owner) == "1" ){   // check user can viwe this data

                ?>

                <tr>
                    <?php
                    foreach($selected_columns as $b){

                        if($b=="group_id"){
                            echo "<td><a1>".$row->group_name."</a1></td>";
                        }elseif ($b=="modified_by") {
                            echo "<td><a1>".$row->modified."</a1></td>";
                        }elseif ($b=="owner") {
                            echo "<td><a1>".$row->user_name."</a1></td>";
                        }elseif ($b=="account_name") {
                            echo "<td><a href='".$_SERVER['PHP_SELF']."?loc=account&action=edit&aid=".$row->id." ' >".$row->{$b->column_name}."</a></td>";
                        }elseif ($b=="assignedto") {
                            echo "<td><a1>".$row->assign."</a1></td>";
                        }else{
                            echo "<td><a1>".$row->{$b->column_name}."</a1></td>";
                        }

                    }
                    ?>

                    <td><small>
                            <?php if ($privilege->edit_privilege($row->group_id,"accounts",$row->owner)=="1"){    // check privilege
                            ?>
                            <a href="account/{{$row->id}}/edit" class="glyphicon glyphicon-pencil" ></a>  <?php  } ?>
                            <?php if ($privilege->delete_privilege($row->group_id,"accounts",$row->owner)=="1"){    //check privileges
                            ?>
                            <a href="#" onclick="deleted({{ $row->id }})" class="glyphicon glyphicon-remove-circle" style="color:red" ></a>  <?php  } ?>
                        </small></td>

                </tr>

                <?php
                } //end of if
                } //end of while


                ?>

            </table>
        </div>
    </div>
    <div class="col-sm-1"></div>
</div>

<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">


        {!! $result->setPath('account')->render() !!}


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
                url: root_url + 'account/' + id,
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
        $("#search").load(root_url+"account_ad_search");
    }

</script>

@stop

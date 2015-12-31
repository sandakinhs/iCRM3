@extends('navbar')
@section('navbar')

<?php
/**
 * Created by PhpStorm.
 * User: Sandakin
 * Date: 11/27/2015
 * Time: 9:37 AM
 */



//unset($_SESSION['contact_assign']); // this session use to select assign user
//unset($_SESSION['sphone']);// this session use to close the pop up

if(isset($_GET['cancel'])){
    unset($_SESSION['cli']);
    echo '<script>window.location.href="'.$_SERVER['PHP_SELF'].'?loc=call_log&action=view&alert=";</script> ';
}



if(isset($_POST['sort'])){
    $_SESSION['sort']=$_POST['sort']; //use to sort results data
}

if(!isset($_SESSION['sort'])){
    $_SESSION['sort']="DESC";
}

?>

        <!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">

        <form id="form2" method="post" action="call_log/search">
            <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">

            <fieldset class="scheduler-border">

                <legend class="scheduler-border">
                    <aa>Search</aa>
                </legend>

                <table>
                    <tr>
                        <td>&nbsp</td>
                        <td><a1>CLI</a1></td>
                        <td>&nbsp</td>
                        <td><input type="number"  id="cli" name="cli" ></td>
                        <td>&nbsp &nbsp &nbsp</td>
                        <td><a1>From</a1></td>
                        <td>&nbsp</td>
                        <td><input type="date" id="fdate" name="fdate" required="required"></td>
                        <td>&nbsp &nbsp &nbsp</td>
                        <td><a1>To</a1></td>
                        <td>&nbsp</td>
                        <td><input type="date" id="tdate" name="tdate" required="required"></td>
                        <td>&nbsp &nbsp &nbsp</td>
                        <td><input  type="submit" name="submit" value="Search"></td>
                        <td>&nbsp </td>
                    </tr>
                </table>

                <table>
                    <tr>
                        <td>&nbsp</td><td></td>
                    </tr>
                    <tr>
                        <td>&nbsp &nbsp &nbsp &nbsp
                        </td>
                        <td>
                            <div id="search"><a1>Advance Search</a1> &nbsp <a href="#" onclick="load_search()" class="glyphicon glyphicon-search" ></a></div>
        </form>
        </td>
        </tr>
        </table>

        <div class="row">
            <div class="col-sm-11"></div>
            <div class="col-sm-1">

                <form id="form" method="post" action="<?php $_SERVER['PHP_SELF']?>?loc=call_log&action=view&alert=">
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


<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10" style="overflow: scroll;">
        <a href="call_log_search">Add Call Log</a>
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

                if($row->call_type=="Tickets"){
                    $type="ticket";
                }elseif ($row->call_type=="Inquiry") {
                    $type="call_log";
                }elseif ($row->call_type=="Sales") {
                    $type="sales";
                }

                ?>
                @inject('privilege', 'App\Http\Controllers\check_privileges')


               @if(  $privilege->view_prvilege($row->group_id,$type,$row->assignedto) == 1)

                <tr>

                    <?php
                    foreach($selected_columns as $b){

                    if($b->column_name=="contact_id"){ //to display contact name
                    ?>
                    <td><a1><?php echo $row->contact_firstname; ?></a1></td>
                    <?php
                    }elseif($b->column_name=="call_owner"){     //to display call owner name
                    ?>
                    <td><a1><?php echo $row->owner; ?></a1></td>
                    <?php
                    }elseif ($b->column_name=="call_modified_by") {  //to display call modified by name
                    ?>
                    <td><a1><?php echo $row->modified; ?></a1></td>
                    <?php
                    }elseif ($b->column_name=="assignedto") {  //to display call modified by name
                    ?>
                    <td><a1><?php echo $row->assigned; ?></a1></td>

                    <?php
                    }elseif ($b->column_name=="group") { ?>
                    <td><a1><?php echo $row->group_name; ?></a1></td>
                    <?php
                    }
                    elseif($b->column_name=="call_type"){ //to display call type detials
                    ?>

                    <td><a href="#" onclick="pop_up('logpopup.php?id=<?php echo $row->id; ?>','1');"><?php echo $row->{$b->column_name}; ?><a></td>

                    <?php
                    }elseif ($b->column_name=="call_status") {?>

                    <td><a1><?php echo $row->Status.$row->Status1.$row->Status2; ?></a1></td>

                    <?php
                    }elseif ($b->column_name=="account") {?>

                    <td><a1><?php echo $row->account_name; ?></a1></td>

                    <?php
                    }else{
                    ?>
                    <td><a1><?php echo $row->{$b->column_name} ?></a1></td>
                    <?php
                    }
                    }

                    ?>

                    <td>
                        <?php  if ($privilege->edit_privilege($row->group_id,$type,$row->assignedto) == "1" ){ ?> <a href="call_log/{{ $row->id }}/edit" class="glyphicon glyphicon-pencil" ></a> <?php } ?>
                        <?php  if ($privilege->delete_privilege($row->group_id,$type,$row->assignedto) == "1" ){ ?><a href="#" onclick="deleted({{ $row->id }})" class="glyphicon glyphicon-remove-circle" style="color:red" ></a> <?php } ?>
                    </td>
                </tr>
                @endif
                <?php
               // } //end if
                }  //end while

                ?>


            </table>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">

              {!! $result->setPath('call_log')->render() !!}

    </div>
    <div class="col-sm-1"></div>
</div>

</body>
</html>

<script type="text/javascript">

    var root_url = "<?php echo Request::root(); ?>/"; // put this in php file

    function deleted(id){

        var token   = "{{ csrf_token() }}";
        var method  = "DELETE";

        var r = confirm("Confirm Delete!");

        if (r == true) {

            $.ajax({
                type: 'post',
                url: root_url + 'call_log/' + id,
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

    $(document).ready(function()    // if from to date selected other fileds must not be empty
    {

        document.getElementById("fdate").required = false;
        document.getElementById("tdate").required = false;

        $("#fdate").change(function()
        {
            document.getElementById("tdate").required = true;
        });

        $("#tdate").change(function()
        {
            document.getElementById("fdate").required = true;
        });

    });

    function load_search(){
        $("#search").load(root_url+"calllog_ad_search");
    }
</script>

@stop

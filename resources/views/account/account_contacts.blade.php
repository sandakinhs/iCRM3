@extends('app')
@section('content')


    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10" style="overflow: scroll;">

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

                    //if($privilege->view_prvilege($row['group'],"accounts",$row['owner']) == "1" ){   // check user can viwe this data

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

                    </tr>

                    <?php
                    // } //end of if
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

@stop

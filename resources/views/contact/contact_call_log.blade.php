@extends('app')
@section('content')




    <div class="row"><br></div>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-2">


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
                    }elseif ($b=="group_id") {
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


            {!! $result->setPath('')->render() !!}


        </div>
        <div class="col-sm-1"></div>
    </div>


    </body>
    </html>

@stop


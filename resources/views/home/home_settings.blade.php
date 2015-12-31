@extends('navbar')
@section('navbar')

<?php

if(isset($_POST['Submit'])){


    // var_dump($_POST);
    $graph -> save_settings($_POST['graph_1'],$_POST['graph_2'],$_POST['graph_3'],$_POST['graph_4'],$_POST['graph_5'],$_POST['graph_6']);

    echo'<script type="text/javascript">
	 window.location="'.$_SERVER['PHP_SELF'].'?loc=home&action=view&alert=";
    </script>';
}


        foreach($home_setting as $row)
            {
                $achecked[]=$row->graph_1;
                $achecked[]=$row->graph_2;
                $achecked[]=$row->graph_3;
                $achecked[]=$row->graph_4;
                $achecked[]=$row->graph_5;
                $achecked[]=$row->graph_6;
            }
// add detials to an array


?>
<html>
<head>
    <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
<body>

<div class="col-sm-2"></div>
<div class="col-sm-8" >
    <form  method="post" action="homesetting">

        <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">

        <div class="panel panel-primary">
            <div class="panel-heading"> Home Page Graphs</div>

            <form  method="post" action="<?php $_SERVER['PHP_SELF']?>">
                <table class="table">

                    <tr>
                        <td>Graph 1</td>
                        <td>
                            <select id="graph_1" name="graph_1" onchange="graphselect()">
                                <option value="1">Select..</option>
                                <option value="pie_plot" id="pie_plot1" <?php if($achecked[0]=="pie_plot"){ echo 'selected="selected"';}  ?> >Call Pie Graph</option>
                                <option value="line_tot_call" id="line_tot_call1" <?php if($achecked[0]=="line_tot_call"){ echo 'selected="selected"';}  ?> >Call Line Graph</option>
                                <option value="bar_tot_call" id="bar_tot_call1" <?php if($achecked[0]=="bar_tot_call"){ echo 'selected="selected"';}  ?> >Call Bar Graph</option>
                                <option value="bar_rev" id="bar_rev1" <?php if($achecked[0]=="bar_rev"){ echo 'selected="selected"';}  ?> >Product Revenu Bar Graph</option>
                                <option value="pie_rev" id="pie_rev1" <?php if($achecked[0]=="pie_rev"){ echo 'selected="selected"';}  ?> >Product Revenu Pie Graph</option>
                                <option value="last_10_act" id="last_10_act1" <?php if($achecked[0]=="last_10_act"){ echo 'selected="selected"';}  ?> >Last 10 Activities</option>
                                <option value="last_10_pen" id="last_10_pen1" <?php if($achecked[0]=="last_10_pen"){ echo 'selected="selected"';}  ?> >Last 10 Pending Items</option>
                            </select>
                        </td>
                        <td>Graph 2</td>
                        <td>
                            <select id="graph_2" name="graph_2" onchange="graphselect()">
                                <option value="2">Select..</option>
                                <option value="pie_plot" id="pie_plot2" <?php if($achecked[1]=="pie_plot"){ echo 'selected="selected"';}  ?> >Call Pie Graph</option>
                                <option value="line_tot_call" id="line_tot_call2" <?php if($achecked[1]=="line_tot_call"){ echo 'selected="selected"';}  ?> >Call Line Graph</option>
                                <option value="bar_tot_call" id="bar_tot_call2" <?php if($achecked[1]=="bar_tot_call"){ echo 'selected="selected"';}  ?> >Call Bar Graph</option>
                                <option value="bar_rev" id="bar_rev2" <?php if($achecked[1]=="bar_rev"){ echo 'selected="selected"';}  ?> >Product Revenu Bar Graph</option>
                                <option value="pie_rev" id="pie_rev2" <?php if($achecked[1]=="pie_rev"){ echo 'selected="selected"';}  ?> >Product Revenu Pie Graph</option>
                                <option value="last_10_act" id="last_10_act2" <?php if($achecked[1]=="last_10_act"){ echo 'selected="selected"';}  ?> >Last 10 Activities</option>
                                <option value="last_10_pen" id="last_10_pen2" <?php if($achecked[1]=="last_10_pen"){ echo 'selected="selected"';}  ?> >Last 10 Pending Items</option>
                            </select>
                        </td>
                        <td>Graph 3</td>
                        <td>
                            <select id="graph_3" name="graph_3" onchange="graphselect()">
                                <option value="3">Select..</option>
                                <option value="pie_plot" id="pie_plot3" <?php if($achecked[2]=="pie_plot"){ echo 'selected="selected"';}  ?> >Call Pie Graph</option>
                                <option value="line_tot_call" id="line_tot_call3" <?php if($achecked[2]=="line_tot_call"){ echo 'selected="selected"';}  ?> >Call Line Graph</option>
                                <option value="bar_tot_call" id="bar_tot_call3" <?php if($achecked[2]=="bar_tot_call"){ echo 'selected="selected"';}  ?> >Call Bar Graph</option>
                                <option value="bar_rev" id="bar_rev3" <?php if($achecked[2]=="bar_rev"){ echo 'selected="selected"';}  ?> >Product Revenu Bar Graph</option>
                                <option value="pie_rev" id="pie_rev3" <?php if($achecked[2]=="pie_rev"){ echo 'selected="selected"';}  ?> >Product Revenu Pie Graph</option>
                                <option value="last_10_act" id="last_10_act3" <?php if($achecked[2]=="last_10_act"){ echo 'selected="selected"';}  ?> >Last 10 Activities</option>
                                <option value="last_10_pen" id="last_10_pen3" <?php if($achecked[2]=="last_10_pen"){ echo 'selected="selected"';}  ?> >Last 10 Pending Items</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>Graph 4</td>
                        <td>
                            <select id="graph_4" name="graph_4" onchange="graphselect()">
                                <option value="4">Select..</option>
                                <option value="pie_plot" id="pie_plot4" <?php if($achecked[3]=="pie_plot"){ echo 'selected="selected"';}  ?> >Call Pie Graph</option>
                                <option value="line_tot_call" id="line_tot_call4" <?php if($achecked[3]=="line_tot_call"){ echo 'selected="selected"';}  ?> >Call Line Graph</option>
                                <option value="bar_tot_call" id="bar_tot_call4" <?php if($achecked[3]=="bar_tot_call"){ echo 'selected="selected"';}  ?> >Call Bar Graph</option>
                                <option value="bar_rev" id="bar_rev4" <?php if($achecked[3]=="bar_rev"){ echo 'selected="selected"';}  ?> >Product Revenu Bar Graph</option>
                                <option value="pie_rev" id="pie_rev4" <?php if($achecked[3]=="pie_rev"){ echo 'selected="selected"';}  ?> >Product Revenu Pie Graph</option>
                                <option value="last_10_act" id="last_10_act4" <?php if($achecked[3]=="last_10_act"){ echo 'selected="selected"';}  ?> >Last 10 Activities</option>
                                <option value="last_10_pen" id="last_10_pen4" <?php if($achecked[3]=="last_10_pen"){ echo 'selected="selected"';}  ?> >Last 10 Pending Items</option>
                            </select>
                        </td>
                        <td>Graph 5</td>
                        <td>
                            <select id="graph_5" name="graph_5" onchange="graphselect()">
                                <option value="5">Select..</option>
                                <option value="pie_plot" id="pie_plot5" <?php if($achecked[4]=="pie_plot"){ echo 'selected="selected"';}  ?> >Call Pie Graph</option>
                                <option value="line_tot_call" id="line_tot_call5" <?php if($achecked[4]=="line_tot_call"){ echo 'selected="selected"';}  ?> >Call Line Graph</option>
                                <option value="bar_tot_call" id="bar_tot_call5" <?php if($achecked[4]=="bar_tot_call"){ echo 'selected="selected"';}  ?> >Call Bar Graph</option>
                                <option value="bar_rev" id="bar_rev5" <?php if($achecked[4]=="bar_rev"){ echo 'selected="selected"';}  ?> >Product Revenu Bar Graph</option>
                                <option value="pie_rev" id="pie_rev5" <?php if($achecked[4]=="pie_rev"){ echo 'selected="selected"';}  ?> >Product Revenu Pie Graph</option>
                                <option value="last_10_act" id="last_10_act5" <?php if($achecked[4]=="last_10_act"){ echo 'selected="selected"';}  ?> >Last 10 Activities</option>
                                <option value="last_10_pen" id="last_10_pen5" <?php if($achecked[4]=="last_10_pen"){ echo 'selected="selected"';}  ?> >Last 10 Pending Items</option>
                            </select>
                        </td>
                        <td>Graph 6</td>
                        <td>
                            <select id="graph_6" name="graph_6" onchange="graphselect()">
                                <option value="6">Select..</option>
                                <option value="pie_plot" id="pie_plot6" <?php if($achecked[5]=="pie_plot"){ echo 'selected="selected"';}  ?> >Call Pie Graph</option>
                                <option value="line_tot_call" id="line_tot_call6" <?php if($achecked[5]=="line_tot_call"){ echo 'selected="selected"';}  ?> >Call Line Graph</option>
                                <option value="bar_tot_call" id="bar_tot_call6" <?php if($achecked[5]=="bar_tot_call"){ echo 'selected="selected"';}  ?> >Call Bar Graph</option>
                                <option value="bar_rev" id="bar_rev6" <?php if($achecked[5]=="bar_rev"){ echo 'selected="selected"';}  ?> >Product Revenu Bar Graph</option>
                                <option value="pie_rev" id="pie_rev6" <?php if($achecked[5]=="pie_rev"){ echo 'selected="selected"';}  ?> >Product Revenu Pie Graph</option>
                                <option value="last_10_act" id="last_10_act6" <?php if($achecked[5]=="last_10_act"){ echo 'selected="selected"';}  ?> >Last 10 Activities</option>
                                <option value="last_10_pen" id="last_10_pen6" <?php if($achecked[5]=="last_10_pen"){ echo 'selected="selected"';}  ?> >Last 10 Pending Items</option>
                            </select>
                        </td>

                    </tr>

                    <tr>
                        <td></td><td><input type="submit" name="Submit" id="submit"></td>
                        <td></td><td></td>
                        <td></td><td></td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="col-sm-2"></div>

</body>
</html>

<script type="text/javascript">
    $(document).ready(function()//When the dom is ready
    {

        var value1 = $("#graph_1").val();

        if(value1 != 1){
            document.getElementById(value1+"2").disabled = true;
            document.getElementById(value1+"3").disabled = true;
            document.getElementById(value1+"4").disabled = true;
            document.getElementById(value1+"5").disabled = true;
            document.getElementById(value1+"6").disabled = true;
        }


        var value2 = $("#graph_2").val();

        if(value2 != 2){
            document.getElementById(value2+"1").disabled = true;
            document.getElementById(value2+"3").disabled = true;
            document.getElementById(value2+"4").disabled = true;
            document.getElementById(value2+"5").disabled = true;
            document.getElementById(value2+"6").disabled = true;
        }

        var value3 = $("#graph_3").val();

        if(value3 != 3){
            document.getElementById(value3+"1").disabled = true;
            document.getElementById(value3+"2").disabled = true;
            document.getElementById(value3+"4").disabled = true;
            document.getElementById(value3+"5").disabled = true;
            document.getElementById(value3+"6").disabled = true;
        }

        var value4 = $("#graph_4").val();

        if(value4 != 4){
            document.getElementById(value4+"1").disabled = true;
            document.getElementById(value4+"2").disabled = true;
            document.getElementById(value4+"3").disabled = true;
            document.getElementById(value4+"5").disabled = true;
            document.getElementById(value4+"6").disabled = true;
        }

        var value5 = $("#graph_5").val();

        if(value5 != 5){
            document.getElementById(value5+"1").disabled = true;
            document.getElementById(value5+"2").disabled = true;
            document.getElementById(value5+"3").disabled = true;
            document.getElementById(value5+"4").disabled = true;
            document.getElementById(value5+"6").disabled = true;
        }

        var value6 = $("#graph_6").val();

        if(value6 != 6){
            document.getElementById(value6+"1").disabled = true;
            document.getElementById(value6+"2").disabled = true;
            document.getElementById(value6+"3").disabled = true;
            document.getElementById(value6+"4").disabled = true;
            document.getElementById(value6+"5").disabled = true;
        }


    });

    function graphselect(){

        document.getElementById("line_tot_call1").disabled = false;
        document.getElementById("line_tot_call2").disabled = false;
        document.getElementById("line_tot_call3").disabled = false;
        document.getElementById("line_tot_call4").disabled = false;
        document.getElementById("line_tot_call5").disabled = false;
        document.getElementById("line_tot_call6").disabled = false;

        document.getElementById("pie_plot1").disabled = false;
        document.getElementById("pie_plot2").disabled = false;
        document.getElementById("pie_plot3").disabled = false;
        document.getElementById("pie_plot4").disabled = false;
        document.getElementById("pie_plot5").disabled = false;
        document.getElementById("pie_plot6").disabled = false;

        document.getElementById("bar_tot_call1").disabled = false;
        document.getElementById("bar_tot_call2").disabled = false;
        document.getElementById("bar_tot_call3").disabled = false;
        document.getElementById("bar_tot_call4").disabled = false;
        document.getElementById("bar_tot_call5").disabled = false;
        document.getElementById("bar_tot_call6").disabled = false;

        document.getElementById("bar_rev1").disabled = false;
        document.getElementById("bar_rev2").disabled = false;
        document.getElementById("bar_rev3").disabled = false;
        document.getElementById("bar_rev4").disabled = false;
        document.getElementById("bar_rev5").disabled = false;
        document.getElementById("bar_rev6").disabled = false;

        document.getElementById("pie_rev1").disabled = false;
        document.getElementById("pie_rev2").disabled = false;
        document.getElementById("pie_rev3").disabled = false;
        document.getElementById("pie_rev4").disabled = false;
        document.getElementById("pie_rev5").disabled = false;
        document.getElementById("pie_rev6").disabled = false;

        document.getElementById("last_10_act1").disabled = false;
        document.getElementById("last_10_act2").disabled = false;
        document.getElementById("last_10_act3").disabled = false;
        document.getElementById("last_10_act4").disabled = false;
        document.getElementById("last_10_act5").disabled = false;
        document.getElementById("last_10_act6").disabled = false;

        document.getElementById("last_10_pen1").disabled = false;
        document.getElementById("last_10_pen2").disabled = false;
        document.getElementById("last_10_pen3").disabled = false;
        document.getElementById("last_10_pen4").disabled = false;
        document.getElementById("last_10_pen5").disabled = false;
        document.getElementById("last_10_pen6").disabled = false;


        var value1 = $("#graph_1").val();

        if(value1 != 1){
            document.getElementById(value1+"2").disabled = true;
            document.getElementById(value1+"3").disabled = true;
            document.getElementById(value1+"4").disabled = true;
            document.getElementById(value1+"5").disabled = true;
            document.getElementById(value1+"6").disabled = true;
        }


        var value2 = $("#graph_2").val();

        if(value2 != 2){
            document.getElementById(value2+"1").disabled = true;
            document.getElementById(value2+"3").disabled = true;
            document.getElementById(value2+"4").disabled = true;
            document.getElementById(value2+"5").disabled = true;
            document.getElementById(value2+"6").disabled = true;
        }

        var value3 = $("#graph_3").val();

        if(value3 != 3){
            document.getElementById(value3+"1").disabled = true;
            document.getElementById(value3+"2").disabled = true;
            document.getElementById(value3+"4").disabled = true;
            document.getElementById(value3+"5").disabled = true;
            document.getElementById(value3+"6").disabled = true;
        }

        var value4 = $("#graph_4").val();

        if(value4 != 4){
            document.getElementById(value4+"1").disabled = true;
            document.getElementById(value4+"2").disabled = true;
            document.getElementById(value4+"3").disabled = true;
            document.getElementById(value4+"5").disabled = true;
            document.getElementById(value4+"6").disabled = true;
        }

        var value5 = $("#graph_5").val();

        if(value5 != 5){
            document.getElementById(value5+"1").disabled = true;
            document.getElementById(value5+"2").disabled = true;
            document.getElementById(value5+"3").disabled = true;
            document.getElementById(value5+"4").disabled = true;
            document.getElementById(value5+"6").disabled = true;
        }

        var value6 = $("#graph_6").val();

        if(value6 != 6){
            document.getElementById(value6+"1").disabled = true;
            document.getElementById(value6+"2").disabled = true;
            document.getElementById(value6+"3").disabled = true;
            document.getElementById(value6+"4").disabled = true;
            document.getElementById(value6+"5").disabled = true;
        }


        // if (value1==value2) {

        // }

        // if(value1==value3){

        // }

        // if(value1==value4){

        // }

        // if(value2==value3){

        // }

        // if(value2==value4){

        // }

        // if(value3==value4){

        // }
    }
</script>

    @stop
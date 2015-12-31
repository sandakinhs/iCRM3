
@extends('navbar')

@section('navbar')


<link rel="stylesheet" href="/resources/demos/style.css">
<style type="text/css">
  /*.ui-dialog .ui-dialog-title, .ui-dialog .ui-dialog-buttonpane {
    text-align:center;
    padding-left: 0.4em;
    padding-right: 0.4em;
}*/

  #targetElement {
    height: 700px;
    width: 1250px;
    margin: 50px;
    /*background: #9cf;*/
  }
 /* .positionDiv {
    position: absolute;
    width: 75px;
    height: 75px;
    background: #080;
  }*/
  </style>

<?php


foreach($sql3 as $gra){
    $graph['0']=$gra->graph_1;
    $graph['1']=$gra->graph_2;
    $graph['2']=$gra->graph_3;
    $graph['3']=$gra->graph_4;
    $graph['4']=$gra->graph_5;
    $graph['5']=$gra->graph_6;
}


?>


<html>
<head>
	<title>home</title>
</head>
<body >
<div id="targetElement" >

<!-- dialog -->


<?php



for ($i=0; $i < 6; $i++) { 
  if($graph[$i]=='pie_plot'){

// generateGraphplot('day');  //generate graph
 $pie_plot=$i;  //set a flag

echo '<div id="dialog" title="Call Type">
 <p style="text-align: right;">Duration : <select id="date" onchange="load_plot()">
  <option value="day">Day</option>
  <option value="week">Week</option>
  <option value="month">Month</option>
  <option value="year">Year</option>
</select></p>

  <img id="plot_image" style=" display: block; margin: 0 auto;">
</div>';
}
}

//<!-- <div id="dialog_1" title="Last 4 weeks Sales vs Inquiry" >
//  <br><br>
//  <img src="line.png" style=" display: block; margin: 0 auto;">
// </div> -->

for ($i=0; $i < 6; $i++) { 
  if($graph[$i]=='last_10_act'){

 $last_10_act=$i;  //set a flag

echo '<div id="dialog_2" title="Last 10 Activities" >
 <table class="table table-striped table-condensed">
 <tr>
   <th><a1>CLI</a1></th>
   <th><a1>customer</a1></th>
   <th><a1>Type</a1></th>
   <th><a1>status</a1></th>
 </tr>';
?>

 @foreach($sql as $row)

<tr>
    <td><a1>{{$row->contact_no}}</a1></td>
    <td><a1>{{$row->customer}}</a1></td>
    <td><a1>{{$row->type}}</a1></td>
    <td><a1>{{$row->status}}</a1></td>
</tr>

@endforeach

<?php
 echo '</table>
</div>';

}
}

for ($i=0; $i < 6; $i++) { 
  if($graph[$i]=='last_10_pen'){

 $last_10_pen=$i;  //set a flag

echo '<div id="dialog_3" title="Last 10 Pending Items" >
 <table class="table table-striped table-condensed">
 <tr>
   <th><a1>CLI</a1></th>
   <th><a1>customer</a1></th>
   <th><a1>Type</a1></th>
   <th><a1>status</a1></th>
 </tr>';
?>
      @foreach($sql2 as $row)

<tr>
    <td><a1>{{$row->contact_no}}</a1></td>
    <td><a1>{{$row->customer}}</a1></td>
    <td><a1>{{$row->type}}</a1></td>
    <td><a1>{{$row->status}}</a1></td>
</tr>

    @endforeach

 <?php
 echo '</table>
</div>';
}
}

for ($i=0; $i < 6; $i++) { 
  if($graph[$i]=='pie_rev'){

//generateGraphplotrev('day');   //generate graph
$pie_rev=$i;

echo '<div id="dialog_4" title="Product Revenu">
 <p style="text-align: right;">Duration : <select id="date_rev" onchange="load_plot_rev()">
  <option value="day">Day</option>
  <option value="week">Week</option>
  <option value="month">Month</option>
  <option value="year">Year</option>
</select></p>

  <img id="plot_rev_image" style=" display: block; margin: 0 auto;">

</div>';



  }

}

for ($i=0; $i < 6; $i++) { 
  if($graph[$i]=='bar_rev'){

//    generateGraphbarrev('day');   //generate graph
    $bar_rev=$i;

  echo '<div id="dialog_5" title="Product Revenu">
 <p style="text-align: right;">Duration : <select id="date_bar_rev" onchange="load_bar_rev()">
  <option value="day">Day</option>
  <option value="week">Week</option>
  <option value="month">Month</option>
  <option value="year">Year</option>
</select></p>

  <img id="bar_rev_image" style=" display: block; margin: 0 auto;">
</div>';  

  }
}

for ($i=0; $i < 6; $i++) { 
  if($graph[$i]=='bar_tot_call'){

//    generateGraphbartotcalls('day');  //generate graph
    $bar_tot_call=$i;

echo '<div id="dialog_6" title="Total Calls">
 <p style="text-align: right;">Duration : <select id="date_bar_tcall" onchange="load_bar_tcall()">
  <option value="day">Day</option>
  <option value="week">Week</option>
  <option value="month">Month</option>
  <option value="year">Year</option>
</select></p>

  <img id="bar_tcall_image" style=" display: block; margin: 0 auto;">
</div>';
  }
}

for ($i=0; $i < 6; $i++) { 
  if($graph[$i]=='line_tot_call'){

//    generateGraphlinetotcalls('day');   //generate graph
    $line_tot_call=$i;

    echo '<div id="dialog_7" title="Total Calls">
 <p style="text-align: right;">Duration : <select id="date_line_tcall" onchange="load_line_tcall()">
  <option value="day">Day</option>
  <option value="week">Week</option>
  <option value="month">Month</option>
  <option value="year">Year</option>
</select></p>

  <img id="line_tcall_image" style=" display: block; margin: 0 auto;">
</div>';
    }
  }

?>

<!-- dialog end -->

<?php
// dialog position
$position[0]='position: { my: "right center-215", at: "center-210", of:"#targetElement" }';
$position[1]='position: { my: "center center-215", at: "center", of:"#targetElement" }';
$position[2]='position: { my: "left+170 bottom-15", at: "center+40", of:"#targetElement" }';
$position[3]='position: { my: "right center+200", at: "center-210", of:"#targetElement" }';
$position[4]='position: { my: "center center+200", at: "center", of:"#targetElement" }';
$position[5]='position: { my: "left+170 top", at: "center+40", of:"#targetElement" }';
// dialog position end
?>


</div>
</body>
</html>

<script type="text/javascript">



    $(document).ready(function()//When the dom is ready
    {


        $("#plot_rev_image").attr("src", "{{ asset('assets/tmp/day_pie_rev.png') }}");
        $("#bar_rev_image").attr("src", "{{ asset('assets/tmp/day_bar_rev.png') }}");
        $("#bar_tcall_image").attr("src", "{{ asset('assets/tmp/day_bar_tcall.png') }}" );
        $("#line_tcall_image").attr("src", "{{ asset('assets/tmp/day_line_tcall.png') }}");
         // evt.preventDefault();

<?php


if(isset($pie_plot)){

echo '$("#plot_image").attr("src", "'.asset("assets/tmp/day.png").'");';

echo '$( "#dialog" ).dialog({
      width: 400,
      height: 400,

      '.$position[$pie_plot].',

      //position: { my: "right center-215", at: "left", of:"#targetElement" },
      // modal: true,
      // resizable: false,
      closeOnEscape: false,
      // draggable: false,
      open: function(event, ui) { $(".ui-dialog-titlebar-close", ui.dialog | ui).hide(); },
    }); ';

}



    // $( "#dialog_1" ).dialog({
    //   width: 400,
    //   height: 400,
    //   // position: { my: 'center-40 center+20'},

    //   position: { my: "center center-60", at: "center-50", of:"#targetElement" },
    //   // modal: true,
    //   // resizable: false,
    //   closeOnEscape: false,
    //   // draggable: false,
    //   open: function(event, ui) { $(".ui-dialog-titlebar-close", ui.dialog | ui).hide(); },

    // });

if(isset($last_10_act)){
    echo '$( "#dialog_2" ).dialog({
      width: 400,
      height: 400,

      '.$position[$last_10_act].',
      //position: { my: "left+170 bottom-15", at: "center+40", of:"#targetElement" },
      // modal: true,
      // resizable: false,
      closeOnEscape: false,
      // draggable: false,
      open: function(event, ui) { $(".ui-dialog-titlebar-close", ui.dialog | ui).hide(); },
    });';
}


if(isset($last_10_pen)){
     echo '$( "#dialog_3" ).dialog({
      width: 400,
      height: 400,

      '.$position[$last_10_pen].',
      //position: { my: "left+170 top", at: "center+40", of:"#targetElement" },
      // modal: true,
      // resizable: false,
      closeOnEscape: false,
      // draggable: false,
      open: function(event, ui) { $(".ui-dialog-titlebar-close", ui.dialog | ui).hide(); },
    });';
}

  if(isset($pie_rev)){
     echo '$( "#dialog_4" ).dialog({
      width: 400,
      height: 400,

      '.$position[$pie_rev].',
      //position: { my: "right center+200", at: "left", of:"#targetElement" },
      // modal: true,
      // resizable: false,
      closeOnEscape: false,
      // draggable: false,
      open: function(event, ui) { $(".ui-dialog-titlebar-close", ui.dialog | ui).hide(); },
    });';

    }

    if(isset($bar_rev)){
      echo '$( "#dialog_5" ).dialog({
      width: 400,
      height: 400,

      '.$position[$bar_rev].',
      //position: { my: "right center-60", at: "left", of:"#targetElement" },
      // modal: true,
      // resizable: false,
      closeOnEscape: false,
      // draggable: false,
      open: function(event, ui) { $(".ui-dialog-titlebar-close", ui.dialog | ui).hide(); },
    });';
    }


if(isset($bar_tot_call)){
  echo '$( "#dialog_6" ).dialog({
      width: 400,
      height: 400,

      '.$position[$bar_tot_call].',
      //position: { my: "center center+200", at: "center-50", of:"#targetElement" },
      // modal: true,
      // resizable: false,
      closeOnEscape: false,
      // draggable: false,
      open: function(event, ui) { $(".ui-dialog-titlebar-close", ui.dialog | ui).hide(); },
    });';
}

if(isset($line_tot_call)){
  echo '$( "#dialog_7" ).dialog({
      width: 400,
      height: 400,

      '.$position[$line_tot_call].',
      // position: { my: "center center-215", at: "center-50", of:"#targetElement" },
      // modal: true,
      // resizable: false,
      closeOnEscape: false,
      // draggable: false,
      open: function(event, ui) { $(".ui-dialog-titlebar-close", ui.dialog | ui).hide(); },
    });';
}
    ?>

    });

    var token ="{{ csrf_token() }}";

    function load_plot()
    {


    	var date = $("#date").val();

    	$.ajax({  //Make the Ajax Request
    type: "POST",
    url:"{{asset('make_plot/make') }}",  //file name
    data: {"_token": token,"date": date}, //data
    success: function(){

        $("#plot_image").attr("src", "{{asset('assets/tmp')}}/"+date+".png");
//          evt.preventDefault();

    },

            error: function(xhr, textStatus, error){

                alert(error);
            }

    });

  }

   function load_plot_rev()
    {

        var date = $("#date_rev").val();


      $.ajax({  //Make the Ajax Request
    type: "POST",
    url: "{{asset('make_plot/make') }}",  //file name
    data: {"_token":token,"date_rev": date}, //data
    success: function(){

        $("#plot_rev_image").attr("src","{{asset('assets/tmp')}}/"+date+"_pie_rev.png");
         // evt.preventDefault();
      },

          error: function(xhr, textStatus, error){

              alert(error);
          }

    });

  }

   function load_bar_rev()
    {

      var date = $("#date_bar_rev").val();

      $.ajax({  //Make the Ajax Request
    type: "POST",
    url: "{{asset('make_plot/make') }}",  //file name
    data: {"_token":token,"date_bar_rev": date}, //data
    success: function(){

        $("#bar_rev_image").attr("src","{{asset('assets/tmp')}}/"+date+"_bar_rev.png");
         // evt.preventDefault();
      },

          error: function(xhr, textStatus, error){

              alert(error);
          }

    });

  }

    function load_bar_tcall()
    {

      var date = $("#date_bar_tcall").val();

      $.ajax({  //Make the Ajax Request
    type: "POST",
    url: "{{asset('make_plot/make') }}",  //file name
    data: {"_token":token,"date_bar_tcall": date}, //data
    success: function(){

        $("#bar_tcall_image").attr("src", "{{asset('assets/tmp')}}/"+date+"_bar_tcall.png");
         // evt.preventDefault();

      },

          error: function(xhr, textStatus, error){

              alert(error);
          }

    });

  }

    function load_line_tcall()
    {

      var date = $("#date_line_tcall").val();

      $.ajax({  //Make the Ajax Request
    type: "POST",
    url: "{{asset('make_plot/make') }}",  //file name
    data: {"_token":token,"date_line_tcall": date}, //data
    success: function(){

        $("#line_tcall_image").attr("src", "{{asset('assets/tmp')}}/"+date+"_line_tcall.png");
         // evt.preventDefault();


      },

          error: function(xhr, textStatus, error){

              alert(error);
          }

    });

  }

</script>

@stop





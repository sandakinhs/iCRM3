<?php

namespace App\Http\Controllers\graphs;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

include('library\jpgraph\src\jpgraph.php' );
include('library\jpgraph\src\jpgraph_bar.php');
include('library\jpgraph\src\jpgraph_line.php');

class Line_tot_call extends Controller
{

    function generateGraphlinetotcalls($type)
    {


for ($i = 0; $i < 4; $i++) {

$time = DATE('Y-m-d');
$date = strtotime($time . ' -' . $i . $type);

if ($type == "year") {

$labels[] = date('Y', $date);
$date = date('Y', $date);

} elseif ($type == "month") {

    $labels[] = date('M', $date);
    $date = date('Y-m', $date);

} elseif ($type == "week") {


    $labels = array(4, 3, 2, 1);
    $date = date('oW', $date);

} else {

    $labels[] = date('d', $date);
    $date = date('Y-m-d', $date);

}


   if ($type == "week") {

 $sql=DB::select( DB::raw("SELECT COUNT(*) AS 'count', `call_type` FROM `call_log` WHERE YEARWEEK(call_created_time,1) LIKE '$date' GROUP BY `call_type` ORDER BY `call_type`"));

   } else {

 $sql=DB::select( DB::raw("SELECT COUNT(*) AS 'count', `call_type` FROM `call_log` WHERE `call_created_time` LIKE '$date%' GROUP BY `call_type` ORDER BY `call_type`"));
   }



   foreach ($sql as $row) {

       $call[$row->call_type][$i] = $row->count;

   }

   if (!isset($call['Inquiry'][$i])) {
       $call['Inquiry'][$i] = "0";
   }

   if (!isset($call['Sales'][$i])) {
       $call['Sales'][$i] = "0";
   }

   if (!isset($call['Tickets'][$i])) {
       $call['Tickets'][$i] = "0";
   }

  }


  $inquiry = $call['Inquiry'];
  $sales = $call['Sales'];
  $ticket = $call['Tickets'];
// $datay3 = array(5,17,32,24);

// Setup the graph
  $graph = new \Graph(300, 250);
  $graph->SetScale("textlin");

  $theme_class = new \UniversalTheme;

  $graph->SetTheme($theme_class);
  $graph->img->SetAntiAliasing(false);
//$graph->title->Set('Last 4 weeks Sales vs Inquiry');
  $graph->title->SetFont(FF_ARIAL, FS_BOLD, 12);
  $graph->SetBox(false);

  $graph->img->SetAntiAliasing();

  $graph->yaxis->HideZeroLabel();
  $graph->yaxis->HideLine(false);
  $graph->yaxis->HideTicks(false, false);
  $graph->yaxis->title->Set('Calls');

  $graph->xgrid->Show();
  $graph->xgrid->SetLineStyle("solid");
  $graph->xaxis->SetTickLabels($labels);
  $graph->xgrid->SetColor('#E3E3E3');
  $graph->xaxis->title->Set($type);
  $graph->legend->SetPos(0.4, 0.995, 'center', 'bottom');

// Create the second line
  $p2 = new \LinePlot($inquiry);
  $graph->Add($p2);
  $p2->SetColor("#ADFF2F");
  $p2->SetLegend('Inquiry');

// Create the first line
  $p1 = new \LinePlot($sales);
  $graph->Add($p1);
  $p1->SetColor("#DC143C");
  $p1->SetLegend('Sales');

//Create the third line
  $p3 = new \LinePlot($ticket);
  $graph->Add($p3);
  $p3->SetColor("#9966FF");
  $p3->SetLegend('Ticket');

  $graph->legend->SetFrameWeight(1);

// Output line
// $graph->Stroke();
  $gdImgHandler = $graph->Stroke(_IMG_HANDLER);


  $fileName = "assets/tmp/" . $type . "_line_tcall.png";
  $graph->img->Stream($fileName);


 }
}

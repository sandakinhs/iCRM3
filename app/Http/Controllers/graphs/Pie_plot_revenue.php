<?php

namespace App\Http\Controllers\graphs;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

include('library\jpgraph\src\jpgraph.php' );
include('library\jpgraph\src\jpgraph_pie.php');
include('library\jpgraph\src\jpgraph_pie3d.php');

class Pie_plot_revenue extends Controller
{
    function generateGraphplotrev($type){


        if($type == "year"){

            $start = date("Y-");
            $start .="01-01 00-00-00";

            $end = date("Y-");
            $end .="12-31 23-59-59";

        }elseif ($type == "month") {

            $start = date("Y-m-");
            $start .="01 00-00-00";

            $end = date("Y-m-");
            $end .="31 23-59-59";

        }elseif ($type == "day") {

            $start = date("Y-m-d");
            $start .=" 00-00-00";

            $end = date("Y-m-d");
            $end .=" 23-59-59";

        }elseif ($type == "week") {

            $date = date("Y-m-d");
        }




        if ($type == "week") {

            $sql = "SELECT `id` FROM `sales` WHERE week(`created_at`) = week('$date') AND `deleted` = '0' ";

        }else{

            $sql = "SELECT `id` FROM `sales` WHERE (`created_at` BETWEEN '$start' AND '$end') AND `deleted` = '0'";

        }

        $sql=DB::select( DB::raw($sql));
        foreach($sql as $row){
            $sales_id[]=$row->id;
        }

        if(!isset($sales_id)){

            $sales_id[]=0;
            $sales_id[]=0;
        }

        $ids = join(',',$sales_id); // user groups

        $sql ="SELECT COUNT(sales_product.id) AS 'Count', item.name AS 'Name' FROM sales_product INNER JOIN item ON item.id = sales_product.product WHERE sales_product.sale_id IN ($ids) GROUP BY sales_product.product ORDER BY `Count` DESC";

        $sql=DB::select( DB::raw($sql));
        foreach ($sql as $row) {

            $inq[]=$row->Count;
            $leg[]=$row->Name;

        }

        if(!isset($inq)){
            $inq[]=1;
            $leg[]="null";
        }


        if(sizeof($inq)>5){

            $c=sizeof($inq)-1;
            $other = 0;

            for ($x = 4; $x <= $c; $x++) {

                $other =$other+$inq[$x];
                unset($inq[$x]);
                unset($leg[$x]);
            }

            $inq[4]=$other;
            $leg[4] = "other";
        }


// Some data
        $data = $inq;

// Create the Pie Graph.
        $graph = new \PieGraph(350,250);
        $graph->SetShadow();

        $legends = $leg;

// $graph->legend->Pos(0.3, 0.85);

        $theme_class="DefaultTheme";


// Set A title for the plot
        $graph->title->SetFont(FF_ARIAL,FS_BOLD,12);
        $graph->SetBox(true);

// Create
        $p1 = new \PiePlot3d($data);
        $graph->Add($p1);

        $p1->ShowBorder();
        $p1->SetColor('black');
        $p1->SetSliceColors(array('#ADFF2F','#DC143C','#9966FF','#EBB000','#6EDBFF'));
        $p1->SetLegends($legends);
        $p1->ExplodeSlice(2);
        $p1->SetAngle(30);
        $p1->SetSize(0.5);
        $p1->SetCenter(0.5, 0.4);

// $graph->legend->SetColumns(3);
        $graph->legend->SetFrameWeight(1);
        $graph->legend->SetColumns(3);

        $gdImgHandler = $graph->Stroke(_IMG_HANDLER);

        $fileName = "assets/tmp/" . $type . "_pie_rev.png";

        $graph->img->Stream($fileName);

    }
}

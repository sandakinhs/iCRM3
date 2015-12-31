<?php

namespace App\Http\Controllers;

use App\Http\Controllers\functions\pagesettings;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;

class other extends Controller
{

    public function assignedto()
    {
        session_start();
        $group = new groups();

        if(isset($_POST['user_group'])){
            $_SESSION['group_id1']=$_POST['user_group'];
        }

        $group_members = $group->viewgroupmembers($_SESSION['group_id1']);

        return View::make('other.assignedto', compact('group_members'));

    }

    public function assignedto1()
    {
        session_start();
        $group = new groups();

        if(isset($_POST['user_group'])){
            $_SESSION['group_id1']=$_POST['user_group'];
        }

        $group_members = $group->viewgroupmembers($_SESSION['group_id1']);

        return View::make('other.assignedto1', compact('group_members'));

    }

    public function pagesetting()
    {
        session_start();

        $_SESSION['loc'] = "admin";

        $pagesetting = new pagesettings();

        $_SESSION['tablename']=$_GET['tablename'];

        if($_SESSION['tablename']=="call_log"){
            $name="Call Log";
            $locc="call_log";

        }elseif ($_SESSION['tablename']=="contacts") {
            $name="Contacts";
            $locc="contact";

        }elseif ($_SESSION['tablename']=="sales") {
            $name="Sales";
            $locc="sales";

        }elseif ($_SESSION['tablename']=="ticket") {
            $name="Ticket";
            $locc="ticket";
        }
        else{
            $name="Accounts";
            $locc="account";
        }

        $columns_details = $pagesetting->viewcolumns($_SESSION['tablename']);

        $page_details = $pagesetting->fname($_SESSION['tablename'],'0');

        return View::make('pagesetting', compact('columns_details','page_details','locc','name'));

    }

    public function pagesettingstore()
    {

        session_start();
        $pagesetting = new pagesettings();

        $pagesetting->delete($_SESSION['tablename']);

        $count = $_POST['checkbox'];

        $N = count($count);

        for($i=0; $i < $N; $i++)
        {
            $pagesetting->addnew($count[$i],$_SESSION['tablename'],'1');
        }

        $pagesetting->addnew($_POST['rows'],$_SESSION['tablename'],'0');

        return redirect($_SESSION['tablename']);
    }

    public function homesettings()
    {
        session_start();
        $_SESSION['loc'] = "admin";

        $graph = new Graphs();

        $home_setting = $graph->view_settings();

        return View::make('home.home_settings', compact('home_setting'));
    }

    public function homesettingstore()
    {
        $graph = new Graphs();

        $graph->save_settings();

        return redirect('homesetting');

    }
}

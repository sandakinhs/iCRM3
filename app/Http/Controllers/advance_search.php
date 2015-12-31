<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;

class advance_search extends Controller
{
    public function account()
    {
        return View::make('search.account_ad_search');
    }

    public function calllog()
    {
        return View::make('search.calllog_ad_search');
    }

    public function contact()
    {
        return View::make('search.contact_ad_search');
    }

    public function sales()
    {
        return View::make('search.sales_ad_search');
    }

    public function ticket()
    {
        return View::make('search.ticket_ad_search');
    }

}

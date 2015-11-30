<?php
/**
 * Created by PhpStorm.
 * User: Sandakin
 * Date: 11/19/2015
 * Time: 9:30 AM
 */

namespace App\Http\Controllers;

class welcomecontroller extends Controller
{
    public function index()
    {
//        return view('welcome');;
        return 'hello';
    }

    public function newfun()
{
    return 'this is new function';
}

    public function test()
    {
        return view('test.newtest');
    }

    public function test2()
    {
        echo "AAAA";
    }
}
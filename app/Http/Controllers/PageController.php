<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PageController extends Controller
{

    public function about()
    {
        $data=[];
        $data['fname']='Sandakin';
        $data['lname']='Hasanka';
        return view('test/aboutme',$data);
    }

    public function submit(Requests\Formrequest $request){

        $data=[];
        $data['fname']=$_POST['fname'];
        $data['lname']=$_POST['lname'];
        return view('test/aboutme', $data);
    }
}

<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('/','welcomecontroller@index');

Route::get('new','welcomecontroller@newfun');

Route::get('test', 'welcomecontroller@test');

Route::get('test1', function(){
   return view('test.newtest');
});

Route::get('about','PageController@about');

Route::get('form', function(){
   return view('test.form');
});

Route::post('submitform','PageController@submit');

Route::get('testdb','test_db@index');

Route::get('login', function(){
   return view('login');
});

Route::post('form/index_submit','formsubmit@login_submit');



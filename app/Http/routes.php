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

Route::get('test1','call_log@test');

Route::get('about','PageController@about');

Route::get('form', function(){
   return view('test.form');
});

Route::post('submitform','PageController@submit');

Route::get('graphs','graphs\Bar_revenue@generateGraphbarrev');

Route::get('login', function(){
   return view('login');
});

Route::post('form/index_submit','formsubmit@login_submit');

Route::post('make_plot/make','make_plot@make');

Route::get('plot','make_plot@new1');

Route::get('home', 'home@index');

Route::get('call_log','call_log@index');

Route::get('contact','contacts@index');

Route::get('account','accounts@index');



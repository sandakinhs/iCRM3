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

Route::get('login', function(){
   return view('login');
});

Route::post('form/index_submit','formsubmit@login_submit');

Route::post('make_plot/make','make_plot@make');

Route::get('plot','make_plot@new1');

Route::get('home','home@index');



Route::resource('call_log','call_log');

Route::post('call_log/search','call_log@search');

Route::get('call_log_search','call_log@search_contact');

Route::post('call_log_search','call_log@new_call');

Route::get('call_log_searchs','call_log@new_call');

Route::get('call_logs/remark','call_log@load_remark');

Route::get('call_logs/sale','call_log@load_sale');

Route::get('call_logs/ticket','call_log@load_ticket');



Route::resource('contact','contacts');

Route::post('contact/search','contacts@search');

Route::get('contact_call_log/{id}','contacts@contact_call_log');



Route::resource('account','accounts');

Route::post('account/search','accounts@search');

Route::get('account_contacts/{id}','accounts@account_contacts');




Route::resource('sale','sales');

Route::post('sale/search','sales@search');

Route::get('sales/sale_add_products','sales@sale_add_products');

Route::get('cart','cart@index');

Route::post('cart','cart@store');

Route::post('cart/delete','cart@remove_cart');

Route::get('sales/products_load', 'sales@products_load');

Route::post('sales/products_load', 'sales@products_load');

Route::get('sales/price_load', 'sales@price_load');

Route::post('sales/price_load', 'sales@price_load');

Route::post('cart/add','cart@add_cart');

Route::get('sales/sale_edit_load', 'sales@sale_edit_load');

Route::get('sales/{id}/cart_edit', 'sales@cart_edit');

Route::post('sales/{id}/cart_edit', 'sales@cart_edit_update');




Route::resource('ticket','tickets');

Route::post('ticket/search','tickets@search');

Route::get('tickets/ticket_load','tickets@ticket_load');






Route::get('popup/worksearch','popup@worksearch');

Route::post('popup/worksearch','popup@worksearch');

Route::get('popup/contactsearch','popup@contactsearch');

Route::post('popup/contactsearch','popup@contactsearch');

Route::post('post/contact_values','post@contact_values');

Route::patch('post/contact_values','post@contact_values');


Route::post('other/assignedto','other@assignedto');

Route::get('other/assignedto','other@assignedto');

Route::post('other/assignedto1','other@assignedto1');

Route::get('other/assignedto1','other@assignedto1');


Route::get('pagesetting','other@pagesetting');

Route::post('pagesetting','other@pagesettingstore');


Route::get('homesetting','other@homesettings');

Route::post('homesetting','other@homesettingstore');


Route::resource('item','item');


Route::resource('category','category');

Route::get('categories/main_category','category@load_main_category');


Route::resource('tax','tax');


Route::resource('currency','currency');


Route::resource('user','user');

Route::get('users/groupselect','user@groupselect');

Route::post('users/grouppost','user@grouppost');

Route::get('users/userprivilege','user@user_privilege');

Route::post('users/userprivilege','user@user_privilege');

Route::post('users/submitprivilege','user@submit_privilege');

Route::get('login_users','user@view_login_users');



Route::resource('group','groups');


Route::resource('contact_category','contact_category');


Route::resource('ticket_category','ticket_category');


Route::get('crm_log','log@index');



Route::get('sumreport','reports@summery_view');


Route::get('detailreport','reports@detail_view');


Route::get('logout','logout@index');




Route::get('account_ad_search','advance_search@account');

Route::get('calllog_ad_search','advance_search@calllog');

Route::get('contact_ad_search','advance_search@contact');

Route::get('sales_ad_search','advance_search@sales');

Route::get('ticket_ad_search','advance_search@ticket');





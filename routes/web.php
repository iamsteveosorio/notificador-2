<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
  Route::get('/', 'HomeController@index')->name('home');

  Route::get('/pointsales', 'PointSalesController@index')->name('pointsales');
  Route::get('/pointsales/create', 'PointSalesController@create')->name('pointsales.create');
  Route::post('/pointsales/save', 'PointSalesController@save')->name('pointsales.save');
  Route::get('/pointsales/edit/{id}', 'PointSalesController@edit')->name('pointsales.edit');
  Route::post('/pointsales/update/{id}', 'PointSalesController@update')->name('pointsales.update');
  Route::get('/pointsales/delete/{id}', 'PointSalesController@delete')->name('pointsales.delete');


  Route::get('/users', 'UsersController@index')->name('users');
  Route::get('/users/create', 'UsersController@create')->name('users.create');
  Route::post('/users/save', 'UsersController@save')->name('users.save');
  Route::get('/users/edit/{id}', 'UsersController@edit')->name('users.edit');
  Route::post('/users/update/{id}', 'UsersController@update')->name('users.update');
  Route::get('/users/delete/{id}', 'UsersController@delete')->name('users.delete');


  Route::get('/campaings', 'CampaingsController@index')->name('campaings');
  Route::get('/campaings/create', 'CampaingsController@create')->name('campaings.create');
  Route::post('/campaings/save', 'CampaingsController@save')->name('campaings.save');
  Route::get('/campaings/edit/{id}', 'CampaingsController@edit')->name('campaings.edit');
  Route::post('/campaings/update/{id}', 'CampaingsController@update')->name('campaings.update');
  Route::get('/campaings/delete/{id}', 'CampaingsController@delete')->name('campaings.delete');


  Route::get('/calls/{type_id?}', 'CallsController@index')->name('calls');
  Route::get('/calls/point/{point_id}/campaing/{id}', 'CallsController@campaing')->name('calls.campaing');
  Route::get('/calls/grid/{point_id}/campaing/{id}', 'CallsController@grid')->name('calls.grid');
  Route::get('/calls/end/{id}', 'CallsController@end')->name('calls.end');

  Route::get('/calls/new_calls_grid/{point_id}/campaing/{id}', 'CallsController@new_calls_grid')->name('calls.new_calls_grid');

  Route::get('reports', 'ReportController@index')->name('report');
  Route::get('feedback_report', 'ReportController@feedbacks')->name('feedback_report');
  Route::get('done_order/{id}', 'ReportController@done_order')->name('done_order');
});

Route::get('siesa', 'TestController@get_siesa')->name('siesa');
// Route::get('get_siesa_date', 'TestController@get_siesa_date')->name('get_siesa_date');
// Route::get('v3', 'TestController@v3')->name('siesa');


Route::get('delivered/{id}', 'OrdersController@delivered')->name('order.delivered');
Route::get('ready/{id}', 'OrdersController@ready')->name('order.ready');
Route::get('call/{id}', 'OrdersController@call')->name('order.call');
Route::get('whatsapp/{id}', 'OrdersController@send_notification')->name('order.whatsapp');
Route::post('manual_call', 'OrdersController@manual_call')->name('order.manual_call');

// Route::get('wompi', 'WompiController@index')->name('wompi');
// Route::post('webhook', 'WompiController@webhook')->name('webhook');
// Route::get('wompi_feedback', 'WompiController@wompi_feedback')->name('wompi_feedback');

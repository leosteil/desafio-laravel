<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('agendas', 'AgendaController@index');
Route::get('agendas/{id}', 'AgendaController@show');
Route::post('agendas', 'AgendaController@store');
Route::put('agendas/{id}', 'AgendaController@update');
Route::delete('agendas/{id}', 'AgendaController@delete');


Route::get('atividades', 'AtividadeController@index');
Route::get('atividades/{id}', 'AtividadeController@show');
Route::post('atividades', 'AtividadeController@store');
Route::put('atividades/{id}', 'AtividadeController@update');
Route::patch('atividades/{id}', 'AtividadeController@update');
Route::delete('atividades/{id}', 'AtividadeController@delete');
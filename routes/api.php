<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::get('/lists', 'ListController@index'); // просмотреть списки
Route::post('/add', 'ListController@addList'); // добавить список
Route::put('/listupd/{list}', 'ListController@updList'); // обновить список
Route::delete('/listdel/{list}', 'ListController@delList'); // удалить список

Route::get('/case', 'CaseController@index'); // просмотреть дела
Route::post('/addcase', 'CaseController@addCase'); // добавить дело
Route::put('/caseupd/{case}', 'CaseController@updCase'); // обновить дело
Route::post('/mark-done/{case}', 'CaseController@markDone'); // пометить дело как выполненное
Route::delete('/delcase/{case}', 'CaseController@delCase'); // удалить дело

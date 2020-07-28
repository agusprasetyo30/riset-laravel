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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('todos_api', 'TodoApiController@index');
Route::get('todos_api/{todo}', 'TodoApiController@show');
Route::post('todos_api', 'TodoApiController@store');
Route::put('todos_api/{todo}', 'TodoApiController@update');
Route::delete('todos_api/{todo}', 'TodoApiController@delete');

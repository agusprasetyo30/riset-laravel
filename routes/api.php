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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => 'auth:api', 'namespace' => 'Riset\Laravel'], function () {
    Route::get('todos', 'TodoApiController@index');
    Route::get('todos/{todo}', 'TodoApiController@show');
    Route::post('todos', 'TodoApiController@store');
    Route::put('todos/{todo}', 'TodoApiController@update');
    Route::delete('todos/{todo}', 'TodoApiController@delete');
});



Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');
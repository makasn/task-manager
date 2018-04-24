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

Route::group(['middleware' => 'api'], function () {
    Route::post('authenticate',  'AuthenticateController@authenticate');
    Route::get('logout',  'AuthenticateController@logout')->middleware('jwt.refresh');

    Route::group(['middleware' => 'jwt.auth'], function () {
        Route::resource('tasks',  'TaskController');
        Route::post('task/create',  'TaskController@store');
        Route::get('me',  'AuthenticateController@getCurrentUser');
    });
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

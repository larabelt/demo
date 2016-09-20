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
/**
 * Front
 */
Route::group(['middleware' => ['web']], function () {
    Route::get('/widgets', function () {
        return '';
    });
});

/**
 * Admin
 */
Route::group([
    'prefix' => 'admin',
    'middleware' => ['web', 'auth.admin']
],
    function () {
        Route::get('/widgets', function () {
            return view('widgets.admin.dashboard');
        });
    }
);

/**
 * API
 */
Route::group([
    'prefix' => 'api/v1',
    'middleware' => ['api']
],
    function () {
        Route::get('/widgets/{id}', 'WidgetsController@show');
        Route::put('/widgets/{id}', 'WidgetsController@update');
        Route::delete('/widgets/{id}', 'WidgetsController@destroy');
        Route::get('/widgets', 'WidgetsController@index');
        Route::post('/widgets', 'WidgetsController@store');
    }
);
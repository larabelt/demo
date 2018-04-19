<?php

Route::group([
    'prefix' => 'v1',
],
    function () {
        # projects
        Route::get('projects/{id}', 'Api\ProjectsController@show');
        Route::put('projects/{id}', 'Api\ProjectsController@update');
        Route::delete('projects/{id}', 'Api\ProjectsController@destroy');
        Route::get('projects', 'Api\ProjectsController@index');
        Route::post('projects', 'Api\ProjectsController@store');
    }
);
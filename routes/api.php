<?php

Route::group([
    'prefix' => 'v1',
],
    function () {

        Route::group([
            'prefix' => 'projects/{project}',
        ],
            function () {
                # packages
                Route::get('packages/{owner}/{name}', 'Api\PackagesController@show');
                Route::put('packages/{owner}/{name}', 'Api\PackagesController@update');
            }
        );

        # projects
        Route::get('projects/{project}', 'Api\ProjectsController@show');
        Route::get('projects', 'Api\ProjectsController@index');
    }
);
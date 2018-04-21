<?php

Route::group([
    'prefix' => 'v1',
],
    function () {

        Route::group([
            'prefix' => 'projects/{projectKey}',
        ],
            function () {
                # packages
                Route::get('packages/{packageKey}', 'Api\PackagesController@show');
                Route::put('packages/{packageKey}', 'Api\PackagesController@update');
            }
        );

        # projects
        Route::get('projects/{projectKey}', 'Api\ProjectsController@show');
        Route::get('projects', 'Api\ProjectsController@index');
    }
);
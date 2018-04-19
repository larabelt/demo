<?php

# admin/app home
Route::get('app/{any?}', function () {
    return view('base.admin.dashboard');
})->where('any', '(.*)');
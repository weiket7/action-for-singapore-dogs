<?php

Route::get('/', 'SiteController@index');
Route::get('adopt', 'SiteController@adopt');
Route::get('contact', function () { return view("contact"); });
Route::get('volunteer', function () { return view("volunteer"); });
Route::get('api/adopt', 'ApiController@adopt');

/*Route::get('/', function () {
    return view('welcome');
});*/

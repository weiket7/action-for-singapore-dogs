<?php

Route::get('/', 'SiteController@index');
Route::get('/', function () { return view("home"); });
Route::get('adopt', function () { return view("adopt"); });
Route::get('adopt/{slug}', 'SiteController@adoptView' );
Route::get('contact', function () { return view("contact"); });
Route::get('volunteer', function () { return view("volunteer"); });
Route::get('donate', function () { return view("donate"); });
Route::get('events', function () { return view("events"); });
Route::post('donate', 'SiteController@donate');

Route::get('api/adopt', 'ApiController@adopt');
Route::get('api/adopt-view/{slug}', 'ApiController@adoptView');
Route::get('api/events', 'ApiController@events');

/*Route::get('/', function () {
    return view('welcome');
});*/

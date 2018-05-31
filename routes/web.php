<?php

Route::get('/', function () { return view("welcome"); });
Route::get('backend', function () { return view("admin"); });
Route::get('api/dogs', 'ApiController@dogs');
Route::get('api/dogs/{adopt_id}', 'ApiController@dog');


Route::get('api/adopt', 'ApiController@adopt');
Route::get('api/adopt-view/{slug}', 'ApiController@adoptView');
Route::get('api/events', 'ApiController@events');

/*Route::get('/', function () {
    return view('welcome');
});*/

<?php

Route::get('/', function () { return view("welcome"); });
Route::get('welcome2', function () { return view("welcome2"); });
Route::get('backend', function () { return view("admin"); });

Route::get('api/adopt', 'AdoptController@all');
Route::get('api/adopt/get/{adopt_id}', 'AdoptController@get');
Route::get('api/events', 'EventController@all');
Route::get('api/events/{adopt_id}', 'EventController@get');
Route::get('api/rescuer/search', 'RescuerController@search');
Route::get('api/rescuer/get/{rescuer_id}', 'RescuerController@get');

/*Route::get('/', function () {
    return view('welcome');
});*/

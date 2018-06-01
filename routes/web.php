<?php

Route::get('/', function () { return view("welcome"); });
Route::get('backend', function () { return view("admin"); });
Route::get('api/dogs', 'ApiController@dogs');
Route::get('api/dogs/{adopt_id}', 'ApiController@dog');


Route::get('admin/adopt/get/{adopt_id}', 'Admin\AdoptController@get');
Route::get('admin/rescuer/search', 'Admin\RescuerController@search');
Route::get('admin/rescuer/get/{rescuer_id}', 'Admin\RescuerController@get');
Route::get('api/adopt-view/{slug}', 'ApiController@adoptView');
Route::get('api/events', 'ApiController@events');

/*Route::get('/', function () {
    return view('welcome');
});*/

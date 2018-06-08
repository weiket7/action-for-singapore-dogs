<?php

Route::get('/', function () { return view("welcome"); });
Route::get('welcome2', function () { return view("welcome2"); });
Route::get('backend', function () { return view("admin"); });

Route::get('api/adopt', 'AdoptController@all');
Route::post('api/adopt/save', 'AdoptController@save');
Route::post('api/adopt/save/{adopt_id}', 'AdoptController@save');
Route::get('api/adopt/page/{current_page}', 'AdoptController@page');
Route::get('api/adopt/get/{adopt_id}', 'AdoptController@get');
Route::get('api/adopt/list/{adopt_ids}', 'AdoptController@list');
Route::get('api/adopt/slug/{slug}', 'AdoptController@slug');

Route::get('api/adopt/temp/{count}', 'AdoptController@temp');


Route::get('api/events', 'EventController@all');
Route::get('api/events/{adopt_id}', 'EventController@get');

Route::get('api/person', 'PersonController@all');
Route::get('api/person/search', 'PersonController@search');
Route::get('api/person/get/{person_id}', 'PersonController@get');


/*Route::get('/', function () {
    return view('welcome');
});*/

<?php

Route::get('/', function () { return view("welcome"); });
Route::get('backend', function () { return view("admin"); });

Route::get('api/adopt', 'AdoptController@all');
Route::post('api/adopt/save', 'AdoptController@save');
Route::post('api/adopt/save/{adopt_id}', 'AdoptController@save');
Route::get('api/person/get-single/{person_id}', 'PersonController@getSingle');
Route::get('api/adopt/get-single/{adopt_id}', 'AdoptController@getSingle');

Route::get('api/adopt/page/{current_page}', 'AdoptController@page');
Route::get('api/adopt/get/{adopt_id}', 'AdoptController@get');
Route::get('api/adopt/list/{adopt_ids}', 'AdoptController@list');
Route::get('api/adopt/slug/{slug}', 'AdoptController@slug');
Route::get('api/adopt/search', 'AdoptController@search');



Route::get('api/events', 'EventController@all');
Route::get('api/events/{adopt_id}', 'EventController@get');

Route::get('api/person', 'PersonController@all');
Route::get('api/person/search', 'PersonController@search');
Route::get('api/person/get/{person_id}', 'PersonController@get');
Route::post('api/person/save', 'PersonController@save');
Route::post('api/person/save/{person_id}', 'PersonController@save');

Route::get('api/adopter/get/{adopter_id}', 'AdopterController@get');
Route::post('api/adopter/save/{adopter_id}', 'AdopterController@save');

Route::get('api/volunteer', 'VolunteerController@all');
Route::get('api/volunteer/get/{person_id}', 'VolunteerController@get');

Route::get('api/adopt/temp/{count}', 'AdoptController@temp');

/*Route::get('/', function () {
    return view('welcome');
});*/

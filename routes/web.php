<?php

Route::get('/', function () { return view("welcome"); });
Route::get('backend', function () { return view("admin"); });

Route::get('api/adopt/random', 'AdoptController@random'); //for home
Route::get('api/adopt/page/{current_page}', 'AdoptController@page'); //for adopt grid
Route::get('api/adopt/list/{adopt_ids}', 'AdoptController@list'); //for heart list
Route::get('api/adopt/slug/{slug}', 'AdoptController@slug'); //for adopt view
Route::get('api/adopt/form', 'AdoptController@form');
Route::post('api/donation/form', 'DonationController@form');
Route::post('api/volunteer/form', 'VolunteerController@form');

Route::get('api/adopt', 'AdoptController@all');
Route::get('api/adopt/search', 'AdoptController@search');
Route::get('api/adopt/get/{adopt_id}', 'AdoptController@get');
Route::post('api/adopt/save', 'AdoptController@save');
Route::post('api/adopt/save/{adopt_id}', 'AdoptController@save');

Route::get('api/adopt/get-single/{adopt_id}', 'AdoptController@getSingle');
Route::get('api/person/get-single/{person_id}', 'PersonController@getSingle');

Route::get('api/person', 'PersonController@all');
Route::get('api/person/search', 'PersonController@search');
Route::get('api/person/get/{person_id}', 'PersonController@get');
Route::post('api/person/save', 'PersonController@save');
Route::post('api/person/save/{person_id}', 'PersonController@save');

Route::get('api/adopter/get/{adopter_id}', 'AdopterController@get');
Route::post('api/adopter/save/', 'AdopterController@save');
Route::post('api/adopter/save/{adopter_id}', 'AdopterController@save');

Route::get('api/foster/get/{foster_id}', 'FosterController@get');
Route::post('api/foster/save/', 'FosterController@save');
Route::post('api/foster/save/{foster_id}', 'FosterController@save');

Route::get('api/rescuer/get/{rescuer_id}', 'RescuerController@get');
Route::post('api/rescuer/save/', 'RescuerController@save');
Route::post('api/rescuer/save/{rescuer_id}', 'RescuerController@save');

Route::get('api/volunteer', 'VolunteerController@all');
Route::get('api/volunteer/get/{person_id}', 'VolunteerController@get');

Route::get('api/donation', 'DonationController@all');
Route::get('api/donation/get/{donation_id}', 'DonationController@get');

Route::get('api/event', 'EventController@all');
Route::get('api/event/get/{event_id}', 'EventController@get');
Route::post('api/event/save/', 'EventController@save');
Route::post('api/event/save/{event_id}', 'EventController@save');

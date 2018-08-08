<?php

Route::get('/', function () { return view("welcome"); });
Route::get('login', 'AdminController@login');
Route::post('login', 'AdminController@login');
Route::get('logout', 'AdminController@logout');
Route::get('backend', 'AdminController@backend');

Route::get('api/home', 'SiteController@home');
Route::get('api/event/latest', 'EventController@latest');
Route::post('api/event/filter', 'EventController@filter');
Route::get('api/page/get/{page_id}', 'PageController@get');
Route::post('api/donation/form', 'DonationController@form');
Route::post('api/volunteer/form', 'VolunteerController@form');
Route::post('api/contact/form', 'SiteController@form');
Route::get('api/event/get/{event_id}', 'EventController@get');

Route::get('api/adopt/page/{current_page}', 'AdoptController@page'); //for adopt grid
Route::get('api/adopt/list/{adopt_ids}', 'AdoptController@list'); //for heart list
Route::get('api/adopt/slug/{slug}', 'AdoptController@slug'); //for adopt view
Route::post('api/adopt/filter', 'AdoptController@filter'); //for adopt view

Route::post('api/adoption-form/enquiry', 'AdoptionFormController@enquiry'); //step 1 - fill in basic info
Route::get('api/adoption-form/get-application/{application_token}', 'AdoptionFormController@getApplication'); //step 2 - open
Route::post('api/adoption-form/save-application/{application_token}', 'AdoptionFormController@saveApplication');
Route::get('api/adoption-form/get-agreement/{agreement_token}', 'AdoptionFormController@getAgreement');
Route::post('api/adoption-form/save-agreement/{agreement_token}', 'AdoptionFormController@saveAgreement');

Route::group(['middleware' => 'auth'], function () {
  Route::get('api/permission', 'AdminController@permission');
  
  Route::get('api/adopt', 'AdoptController@all');
  Route::get('api/adopt/search', 'AdoptController@search');
  Route::get('api/adopt/get/{adopt_id}', 'AdoptController@get');
  Route::post('api/adopt/save', 'AdoptController@save');
  Route::post('api/adopt/save/{adopt_id}', 'AdoptController@save');
  Route::post('api/adopt/delete/{adopt_id}', 'AdoptController@delete');
  
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
  Route::post('api/volunteer/save/', 'VolunteerController@save');
  Route::post('api/volunteer/save/{volunteer_id}', 'VolunteerController@save');
  
  Route::get('api/donation', 'DonationController@all');
  Route::get('api/donation/get/{donation_id}', 'DonationController@get');
  Route::post('api/donation/save/', 'DonationController@save');
  Route::post('api/donation/save/{donation_id}', 'DonationController@save');
  
  Route::get('api/event', 'EventController@all');
  Route::post('api/event/save/', 'EventController@save');
  Route::post('api/event/save/{event_id}', 'EventController@save');
  
  Route::get('api/banner', 'BannerController@all');
  Route::get('api/banner/get/{banner_id}', 'BannerController@get');
  Route::post('api/banner/save/', 'BannerController@save');
  Route::post('api/banner/save/{banner_id}', 'BannerController@save');
  
  Route::get('api/adoption-form', 'AdoptionFormController@all');
  Route::get('api/adoption-form/get/{adoption_form_id}', 'AdoptionFormController@get');
  Route::post('api/adoption-form/approve/{adoption_form_id}', 'AdoptionFormController@approve');
  Route::post('api/adoption-form/delete/{adoption_form_id}', 'AdoptionFormController@delete');
  
  /*Route::get('api/question', 'QuestionController@all');
  Route::get('api/question/get/{question_id}', 'QuestionController@get');
  Route::post('api/question/save/', 'QuestionController@save');
  Route::post('api/question/save/{question_id}', 'QuestionController@save');*/
  
  
  Route::get('api/user', 'UserController@all');
  Route::get('api/user/get/{user_id}', 'UserController@get');
  Route::post('api/user/save/', 'UserController@save');
  Route::post('api/user/save/{user_id}', 'UserController@save');
  Route::post('api/user/delete/{user_id}', 'UserController@delete');
  
  Route::get('api/page', 'PageController@all');
  Route::post('api/page/save/{page_id}', 'PageController@save');
  
  Route::post('api/delete-record', 'AdminController@deleteRecord');
  Route::post('api/upload-image', 'AdminController@uploadImage');
  
  Route::get('settings', function () { return view("settings"); });
});
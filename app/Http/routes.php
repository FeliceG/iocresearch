<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/eligibility', function () {
    return view('eligibility');
});

Route::get('/guidelines', function () {
    return view('guidelines');
});

Route::get('/paper', function () {
    return view('paper');
});


Route::group(['middleware' => ['web']], function () {

      Route::get('information', 'IOCController@getInformation');
      Route::get('guidelines', 'IOCController@getGuidelines');

      Route::get('research', 'IOCController@getCreateResearch');

      Route::get('/research/add', 'IOCController@getCreateResearch');
      Route::post('/research/add', 'IOCController@postCreateResearch');

      Route::get('/author/add', 'IOCController@getCreateAuthors');
      Route::post('/author/add', 'IOCController@postCreateAuthors');

      Route::get('/research/show', 'IOCController@getShowResearch');
      Route::post('/research/show', 'IOCController@postShowResearch');
      Route::get('/research/edit', 'IOCController@getEditResearch');
      Route::post('/research/edit', 'IOCController@postEditResearch');

      Route::get('/research/delete', 'IOCController@getConfirmDelete');
      Route::post('/research/delete', 'IOCController@postDoDelete');

      Route::get('/authors/add', 'IOCController@getCreateAuthors');
      Route::post('/authors/add', 'IOCController@postCreateAuthors');

});


Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/', 'HomeController@index');

});

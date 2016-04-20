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

Route::get('/debug', function() {

    echo '<pre>';

    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';

    echo '<h1>Debugging?</h1>';
    if(config('app.debug')) echo "Yes"; else echo "No";

    echo '<h1>Database Config</h1>';
    /*
    The following line will output your MySQL credentials.
    Uncomment it only if you're having a hard time connecting to the database and you
    need to confirm your credentials.
    When you're done debugging, comment it back out so you don't accidentally leave it
    running on your live server, making your credentials public.
    */
    //print_r(config('database.connections.mysql'));

    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    }
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }

    echo '</pre>';

});

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

Route::get('/poster', function () {
    return view('poster');
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

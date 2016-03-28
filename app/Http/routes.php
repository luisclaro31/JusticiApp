<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['prefix' => 'user', 'middleware' => ['web'], 'namespace' => 'App\User' ],
    function() {
        Route::resource('type','TypeController');
        Route::resource('actor','ActorController');

    });

Route::group(['prefix' => 'info', 'middleware' => ['web'], 'namespace' => 'App\Information' ],
    function() {
        Route::resource('state','StateController');
        Route::resource('stage','StageController');
        Route::resource('action','ActionController');
        Route::resource('notification','NotificationController');
        Route::resource('travel','TravelController');
        Route::resource('location','LocationController');
        Route::resource('speciality','SpecialityController');
        Route::resource('office','OfficeController');
    });

Route::group(['prefix' => 'execution', 'middleware' => ['web'], 'namespace' => 'App\Execution' ],
    function() {
        Route::resource('process','ProcessController');
        Route::resource('process_actors','ProcessActorsController');
        Route::resource('process_offices','ProcessOfficesController');
        Route::resource('process_audiences','ProcessAudiencesController');
        Route::resource('process_movements','ProcessMovementsController');
    });


Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/home', 'HomeController@index');
    Route::get('/', 'HomeController@index');
});

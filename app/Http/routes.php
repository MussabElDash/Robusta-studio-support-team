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


Route::get('/twitter', function () {
    return Twitter::getHomeTimeline(['count' => 1, 'format' => 'json']);
});
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

Route::group(['middleware' => ['web']], function () {
    Route::auth();
    // Single Routes
    Route::get('/', [function () {
        return view('landing');
    }]);
    Route::get('/home', ['uses' => 'HomeController@index']);
    Route::get('/get-skin', function () {
        return response(view('skin'))->header('Content-Type', 'text/css');
    });
    Route::post('/home', ['uses' => 'HomeController@store']);
    Route::post('/agent/{id}/edit', function ($id) {
        return redirect()->action('AgentsController@edit', [$id]);
    });

    Route::group(['middleware' => ['auth']], function () {
        // Resources
        Route::resource('department', 'DepartmentsController', ['only' => [
            'store'
        ]]);

        Route::resource('agent', 'AgentsController', ['except' => [
            'index', 'create'
        ]]);

        Route::resource('priority', 'PrioritiesController', ['only' => [
            'store'
        ]]);

        Route::resource('ticket', 'TicketsController', ['only' => [
            'store'
        ]]);

        Route::resource('customer', 'CustomersController', ['only' => [
            'store'
        ]]);

        Route::resource('label', 'LabelsController', ['only' => [
            'store'
        ]]);
    });
});

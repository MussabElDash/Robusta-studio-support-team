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

// Single Routes
Route::get('/', ['middleware' => 'web', function () {
    return view('landing');
}]);

Route::get('/home', ['middleware' => 'web', 'uses' => 'HomeController@index']);
Route::get('/get-skin', function(){
    return response(view('skin'))->header('Content-Type', 'text/css');
});
Route::post('/home', ['middleware' => 'web','uses' => 'HomeController@store']);
// Resources

Route::resource('department', 'DepartmentsController', ['only' => [
    'store'
]]);

Route::resource('agent', 'AgentsController', ['only' => [
    'store'
]]);

Route::resource('priority', 'PrioritiesController', ['only' => [
    'store'
]]);

Route::resource('customer', 'CustomersController', ['only' => [
    'store'
]]);

Route::resource('label', 'LabelsController', ['only' => [
    'store'
]]);

Route::get('/twitter', function () {
    return Twitter::getHomeTimeline(['count' => 1, 'format' => 'json']);
});

Route::group(['middleware' => 'auth'], function ()
{

    Route::group(['prefix' => 'tickets'], function ()
    {
        // CRUD
        Route::get( '/create', [ 'as' => 'tickets.new', 'uses' => 'TicketsController@new' ]);
        Route::post( '/', [ 'as' => 'tickets.store', 'uses' => 'TicketsController@store' ]);
        Route::get( '/',  [ 'as' => 'tickets.index', 'uses' => 'TicketsController@index' ]);
        Route::get( '/edit/{id}', [ 'as' => 'tickets.edit', 'uses' => 'TicketsController@edit' ]);
        Route::delete( '/{id}', [ 'as' => 'tickets.destroy', 'uses' => 'TicketsController@destroy' ]);
        Route::put( '/{id}', [ 'as' => 'tickets.update', 'uses' => 'TicketsController@update' ]);
        Route::get( '/{id}', [ 'as' => 'tickets.show', 'uses' => 'TicketsController@show' ]);

        Route::get('pool', [ 'as' => 'tickets.pool', 'uses' => 'TicketsController@pool']);
    });

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
});

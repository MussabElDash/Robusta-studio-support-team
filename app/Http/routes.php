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

    Route::group(['middleware' => ['auth']], function () {
        // Resources
        Route::resource('department', 'DepartmentsController', ['only' => [
            'store'
        ]]);

        Route::resource('agent', 'AgentsController', ['except' => [
            'index', 'create'
        ]]);
        Route::post('/agent/{agent}/edit', function ($id) {
            return redirect()->route('agent.edit', [$id]);
        });

        Route::resource('priority', 'PrioritiesController', ['only' => [
            'store'
        ]]);

        Route::resource('ticket', 'TicketsController', ['only' => [
            'store'
        ]]);

        Route::resource('customer', 'CustomersController', ['only' => [
            'store'
        ]]);

        Route::resource('comments', 'CommentsController', ['only' => ['store']]);


        Route::resource('label', 'LabelsController', ['only' => [
            'store'
        ]]);

        Route::group(['prefix' => 'tickets'], function () {

            Route::group(['middleware' => 'userRole:Admin,Supervisor'], function () {
                Route::delete('{id}', ['as' => 'tickets.destroy', 'uses' => 'TicketsController@destroy'])->where('id', '[1-9][0-9]*');
            });

            Route::get('pool', ['as' => 'tickets.pool', 'uses' => 'TicketsController@pool']);
            Route::post('{id}/claim', ['as' => 'tickets.claim', 'uses' => 'TicketsController@claim'])->where('id', '[1-9][0-9]*');

            // CRUD
            Route::get('create', ['as' => 'tickets.new', 'uses' => 'TicketsController@new']);
            Route::post('', ['as' => 'tickets.store', 'uses' => 'TicketsController@store']);
            Route::get('', ['as' => 'tickets.index', 'uses' => 'TicketsController@index']);
            Route::get('{id}/edit', ['as' => 'tickets.edit', 'uses' => 'TicketsController@edit'])->where('id', '[1-9][0-9]*');

            Route::put('{id}', ['as' => 'tickets.update', 'uses' => 'TicketsController@update'])->where('id', '[1-9][0-9]*');
            Route::get('{id}', ['as' => 'tickets.show', 'uses' => 'TicketsController@show'])->where('id', '[1-9][0-9]*');

            Route::post('{id}/comment', ['as' => 'tickets.comment.store', 'uses' => 'CommentsController@store'])
                ->where('id', '[1-9][0-9]*');
        });
    });
});

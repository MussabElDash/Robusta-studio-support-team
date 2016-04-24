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

Route::resource('departments', 'DepartmentsController');

Route::resource('agent', 'AgentsController', ['only' => [
    'store'
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
});

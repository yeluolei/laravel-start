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
    return view('layout');
});

Route::get('/partials/index', function () {
    return view('partials.index');
});

Route::get('/partials/{category}/{action?}', function ($category, $action = 'index') {
    return view(join('.', ['partials', $category, $action]));
});

Route::get('/partials/{category}/{action}/{id}', function ($category, $action = 'index', $id) {
    return view(join('.', ['partials', $category, $action]));
});

// Additional RESTful routes.
$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {
    /**
     * @var Dingo\Api\Routing\Router $api
     */
    $api->group(['namespace' => 'App\Api\Controllers'], function($api){
        /**
         * @var Dingo\Api\Routing\Router $api
         */
        $api->post('/auth/authenticate', 'AuthController@authenticate');
        $api->group( [ 'middleware' => 'jwt.refresh' ], function ($api) {
            /**
             * @var Dingo\Api\Routing\Router $api
             */
            $api->get('users/me', 'AuthController@me');
            $api->get('validate_token', 'AuthController@validateToken');

            $api->resource('/users', 'UserController');
        });
    });
});

// Catch all undefined routes. Always gotta stay at the bottom since order of routes matters.
Route::any('{undefinedRoute}', function ($undefinedRoute) {
    return view('layout');
})->where('undefinedRoute', '([A-z\d-\/_.]+)?');

// Using different syntax for Blade to avoid conflicts with AngularJS.
// You are well-advised to go without any Blade at all.
//Blade::setContentTags('<%', '%>'); // For variables and all things Blade.
//Blade::setEscapedContentTags('<%%', '%%>'); // For escaped data.
<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' => 'v1', 'middleware' => 'cors'], function() { 

    // users route
    Route::get('users', 'api\UserController@index');
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('user/{id}', 'api\UserController@show');
        Route::put('user/edit/{id}', 'api\UserController@edit');
    });
    Route::post('user/register', 'AuthController@store');
    Route::post('user/signin', 'api\AuthController@sigin');
    
    // event route
    Route::get('events', 'api\EventController@index');
    Route::get('event/{id}', 'api\EventController@show');
    Route::post('event', 'api\EventController@store');
    Route::put('event', 'api\EventController@store');
    Route::delete('event/delete/{id}', 'api\EventController@destroy');
    Route::get('events/trash', 'api\EventController@trash');
    Route::get('event/restore/{id}', 'api\EventController@restore');
    
    // categories route
    Route::get('categories', 'api\CategoriesController@index');
    Route::get('category/{id}', 'api\CategoriesController@show');
    Route::post('category', 'api\CategoriesController@store');
    Route::put('category', 'api\CategoriesController@store');
    Route::delete('category/delete/{id}', 'api\CategoriesController@destroy');
    Route::get('categories/trash', 'api\CategoriesController@trash');
    Route::get('category/restore/{id}', 'api\CategoriesController@restore');
    
    // registration route
    Route::get('registration', 'api\RegistrationController@index');
    Route::get('registration/{id}', 'api\RegistrationController@show');
    
    // payment route
    Route::get('payments', 'api\PaymentController@index');
    Route::get('payment/{id}', 'api\PaymentController@show');
    Route::post('payment', 'api\PaymentController@store');
    Route::put('payment', 'api\PaymentController@store');
    Route::delete('payment/delete/{id}', 'api\PaymentController@destroy');
    Route::get('payments/trash', 'api\PaymentController@trash');
    Route::get('payment/restore/{id}', 'api\PaymentController@restore');

});

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


Route::pattern('id', '[0-9]+');


Route::group(['middleware' => ['web']], function () {

    Route::auth();
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index');
    Route::get('auth/login', 'HomeController@index');

    Route::post('oauth/access_token', function() {
        return Response::json(Authorizer::issueAccessToken());
    });

    Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'as' => 'admin.'], function() {

        Route::get('categories', ['as' => 'categories.index', 'uses' => 'CategoriesController@index']);
        Route::get('categories/create', ['as' => 'categories.create', 'uses' => 'CategoriesController@create']);
        Route::post('categories/store', ['as' => 'categories.store', 'uses' => 'CategoriesController@store']);
        Route::get('categories/edit/{id}', ['as' => 'categories.edit', 'uses' => 'CategoriesController@edit']);
        Route::put('categories/update/{id}', ['as' => 'categories.update', 'uses' => 'CategoriesController@update']);
        Route::get('categories/destroy/{id}', ['as' => 'categories.destroy', 'uses' => 'CategoriesController@destroy']);

        Route::get('products', ['as' => 'products.index', 'uses' => 'ProductsController@index']);
        Route::get('products/create', ['as' => 'products.create', 'uses' => 'ProductsController@create']);
        Route::post('products/store', ['as' => 'products.store', 'uses' => 'ProductsController@store']);
        Route::get('products/edit/{id}', ['as' => 'products.edit', 'uses' => 'ProductsController@edit']);
        Route::put('products/update/{id}', ['as' => 'products.update', 'uses' => 'ProductsController@update']);
        Route::get('products/destroy/{id}', ['as' => 'products.destroy', 'uses' => 'ProductsController@destroy']);
        Route::get('productslists', ['as' => 'products.lists', 'uses' => 'ProductsController@lists']);
        Route::get('productprice/{id}', ['as' => 'products.price', 'uses' => 'ProductsController@productPrice']);

        Route::get('clients', ['as' => 'clients.index', 'uses' => 'ClientsController@index']);
        Route::get('clients/create', ['as' => 'clients.create', 'uses' => 'ClientsController@create']);
        Route::post('clients/store', ['as' => 'clients.store', 'uses' => 'ClientsController@store']);
        Route::get('clients/edit/{id}', ['as' => 'clients.edit', 'uses' => 'ClientsController@edit']);
        Route::put('clients/update/{id}', ['as' => 'clients.update', 'uses' => 'ClientsController@update']);
        Route::get('clients/destroy/{id}', ['as' => 'clients.destroy', 'uses' => 'ClientsController@destroy']);

        Route::get('orders', ['as' => 'orders.index', 'uses' => 'OrdersController@index']);
        Route::get('orders/create', ['as' => 'orders.create', 'uses' => 'OrdersController@create']);
        Route::post('orders/store', ['as' => 'orders.store', 'uses' => 'OrdersController@store']);
        Route::get('orders/edit/{id}', ['as' => 'orders.edit', 'uses' => 'OrdersController@edit']);
        Route::put('orders/update/{id}', ['as' => 'orders.update', 'uses' => 'OrdersController@update']);
        Route::get('orders/destroy/{id}', ['as' => 'orders.destroy', 'uses' => 'OrdersController@destroy']);

        Route::get('cupoms', ['as' => 'cupoms.index', 'uses' => 'CupomsController@index']);
        Route::get('cupoms/create', ['as' => 'cupoms.create', 'uses' => 'CupomsController@create']);
        Route::post('cupoms/store', ['as' => 'cupoms.store', 'uses' => 'CupomsController@store']);
        Route::get('cupoms/edit/{id}', ['as' => 'cupoms.edit', 'uses' => 'CupomsController@edit']);
        Route::put('cupoms/update/{id}', ['as' => 'cupoms.update', 'uses' => 'CupomsController@update']);
        Route::get('cupoms/destroy/{id}', ['as' => 'cupoms.destroy', 'uses' => 'CupomsController@destroy']);
    });

    Route::group(['prefix' => 'customer', 'middleware' => 'auth.checkrole:client', 'as' => 'customer.'], function() {

        Route::get('order', ['as' => 'order.index', 'uses' => 'CheckoutController@index']);
        Route::get('order/create', ['as' => 'order.create', 'uses' => 'CheckoutController@create']);
        Route::post('order/store', ['as' => 'order.store', 'uses' => 'CheckoutController@store']);
    });

    Route::group(['prefix' => 'api', 'middleware' => 'oauth', 'as' => 'api.'], function() {

        Route::get('teste', function() {
            return [
                'id' => "1",
                'client' => "Fernando",
                'total' => 10
            ];
        });

    });
});


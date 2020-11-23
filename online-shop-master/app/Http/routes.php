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

Route::get('/', [
    'uses' => 'ImageCrudController@getIndex',
    'as' => 'shop.index'
]);
Route::get('/category/{name}', [
    'uses' => 'ProductCrudController@getIndex',
    'as' => 'product.index'
]);
Route::get('/category/', [
    'uses' => 'ProductCrudController@getAll',
    'as' => 'product.all'
]);

Route::get('/results/{keyword}', [
    'uses' => 'ProductCrudController@getResults',
    'as' => 'results'
]);
Route::post('/search/',['before' => 'csrf', 'uses' => 'ProductCrudController@postSearch', 'as' => 'search']);

Route::get('/add-to-cart/{id}',[
   'uses' => 'ProductCrudController@getAddToCart',
    'as' => 'product.addToCart'
]);
Route::get('/reduce/{id}',[
    'uses' => 'ProductCrudController@reduceByCart',
    'as' => 'product.reduceByCart'
]);
Route::get('/reduceall/{id}',[
    'uses' => 'ProductCrudController@reduceAllByCart',
    'as' => 'product.reduceAllByCart'
]);
Route::get('/addbycart/{id}',[
    'uses' => 'ProductCrudController@addByCart',
    'as' => 'product.addByCart'
]);
Route::get('/item/{id}',[
    'uses' => 'ProductCrudController@getItem',
    'as' => 'product.item'
]);
Route::get('/shopping-cart',[
    'uses' => 'ProductCrudController@getCart',
    'as' => 'product.shoppingCart'
]);
Route::get('/checkout',[
    'uses' => 'ProductCrudController@getCheckout',
    'as' => 'checkout',
    'middleware' => 'auth:api'
]);
Route::post('/checkout',[
    'uses' => 'ProductCrudController@postCheckout',
    'as' => 'checkout',
    'middleware' => 'auth:api'
]);
Route::group(['prefix'=>'user'], function (){
    Route::group(['middleware' => 'guest:api'], function (){
        Route::get('/signup', [
            'uses' => 'UserController@getSignUp',
            'as' => 'user.signup'
        ]);
        Route::post('/signup', [
            'uses' => 'UserController@postSignUp',
            'as' => 'user.signup'
        ]);
        Route::get('/signin', [
            'uses' => 'UserController@getSignIn',
            'as' => 'user.signin'
        ]);
        Route::post('/signin', [
            'uses' => 'UserController@postSignIn',
            'as' => 'user.signin'
        ]);

    });
    Route::group(['middleware' => 'auth:api'], function(){
        Route::get('/profile', [
            'uses' => 'UserController@getProfile',
            'as' => 'user.profile'
        ]);

        Route::get('/logout', [
            'uses' => 'UserController@getLogout',
            'as' => 'user.logout'
        ]);
    });

});

// Admin Interface Routes
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function()
{
    Route::get('dashboard', 'Admin\AdminController@index');

    CRUD::resource('links', 'LinksCrudController');
    CRUD::resource('images', 'ImageCrudController');
    CRUD::resource('blocks', 'BlocksCrudController');
    CRUD::resource('product', 'ProductCrudController');
    CRUD::resource('category_product', 'Category_productCrudController');
});

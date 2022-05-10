<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    \Illuminate\Support\Facades\Log::error('Test Error');
    \Illuminate\Support\Facades\Log::info('Test Info 2');
    return view('welcome');
});






Route::prefix('backend')
->namespace('Backend')
->middleware(['auth','role:admin,admod'])
->group(function(){
    Route::get('/dashboard','DashboardController@index')->middleware('auth')->name('backend.dashboard.index');


    //  Route::Resource('users', UsersController::class);
    Route::group(['prefix' => 'users'],function(){
        Route::get('/index','UserController@index')->name('backend.users.index');

        Route::get('/create','UserController@create')->name('backend.users.create');
        Route::post('/store','UserController@store')->name('backend.users.store');

        Route::get('/edit/{id}','UserController@edit')->name('backend.users.edit');
        Route::get('/show/{user}','UserController@show')->name('backend.users.show');
        Route::put('/update/{id}','UserController@update')->name('backend.users.update');
        Route::delete('/delete/{id}','UserController@destroy')->name('backend.users.destroy');

    });

    // Route::Resource('posts', PostsController::class);
    Route::group(['prefix' => 'posts'],function(){


        Route::get('/index','PostController@index')->name('backend.posts.index');

        Route::get('/create','PostController@create')->name('backend.posts.create');
        Route::post('/store','PostController@store')->name('backend.posts.store');

        Route::get('/edit/{post}','PostController@edit')->name('backend.posts.edit');
        Route::get('/show/{id}','UserController@show')->name('backend.users.show');
        Route::put('/update/{id}','PostController@update')->name('backend.posts.update');
        Route::delete('/delete/{id}','PostController@destroy')->name('backend.posts.destroy');

    });

    Route::group(['prefix' => 'categories'],function(){
        Route::get('/index','CategoryController@index')->name('backend.categories.index');

        Route::get('/create','CategoryController@create')->name('backend.categories.create');
        Route::post('/store','CategoryController@store')->name('backend.categories.store');
        Route::get('/edit/{id}','CategoryController@edit')->name('backend.categories.edit');
        Route::put('/update/{id}','CategoryController@update')->name('backend.categories.update');
        Route::delete('/delete/{id}','CategoryController@destroy')->name('backend.categories.destroy');

    });

    //categoryproduct

    Route::group([
        'prefix' => 'categoryproducts',
     ], function (){
        Route::get('/list', 'CategoryProductController@index')->name('backend.categoryproducts.index');

        Route::get('/create', 'CategoryProductController@create')->name('backend.categoryproducts.create');

        Route::post('/store','CategoryProductController@store')->name('backend.categoryproducts.store');

        Route::get('/edit/{id}', 'CategoryProductController@edit')->name('backend.categoryproducts.edit');

        Route::post('/update/{id}', 'CategoryProductController@update')->name('backend.categoryproducts.update');

        Route::delete('/destroy/{id}', 'CategoryProductController@destroy')->name('backend.categoryproducts.destroy');

        Route::get('/show/{id}', 'CategoryProductController@show')->name('backend.categoryproducts.show');

        Route::get('/restore/{id}', 'CategoryProductController@restore')->name('backend.categoryproducts.restore');

        Route::get('/delete', 'CategoryProductController@delete')->name('backend.categoryproducts.delete');
     });

    //Product
    Route::group([
        'prefix' => 'products',
    ],function(){
        Route::get('/create','ProductController@create')->name('backend.products.create');

        Route::post('/store', 'ProductController@store')->name('backend.products.store');

        Route::get('/list','ProductController@index')->name('backend.products.index');

        Route::get('/edit/{id}','ProductController@edit')->name('backend.products.edit');

        Route::post('/update/{id}', 'ProductController@update')->name('backend.products.update');

        Route::delete('/delete/{product}','ProductController@destroy')->name('backend.products.destroy');

        Route::post('/show','ProductController@show')->name('backend.products.show');
    });

    //Brand
    Route::group([
        'prefix' => 'brands',
     ], function (){

        Route::get('/create','BrandController@create')->name('backend.brands.create');

        Route::post('/store', 'BrandController@store')->name('backend.brands.store');

        Route::get('/list','BrandController@index')->name('backend.brands.index');

        Route::get('/edit/{id}','BrandController@edit')->name('backend.brands.edit');

        Route::post('/update/{id}', 'BrandController@update')->name('backend.brands.update');

        Route::delete('/delete/{id}','BrandController@destroy')->name('backend.brands.destroy');


     });

     //Order
     Route::group([
        'prefix' => 'orders',
     ], function (){
        Route::get('/list','OrderController@index')->name('backend.orders.index');

        Route::get('/show/{id}','OrderController@show')->name('backend.orders.show');

        Route::post('/update/{id}','OrderController@update')->name('backend.orders.update');

        Route::delete('/destroy/{order}','OrderController@delete')->name('backend.orders.destroy');
     });

});

//Frontend

Route::prefix('')
->namespace('Frontend')
->group(function(){
    Route::get('/','HomeController@index')->name('frontend.home');
    Route::get('/posts/index','PostController@index')->name('frontend.posts.index');
    Route::get('/show/{id}','ProductController@showProduct')->name('frontend.products.show');
    Route::get('/categoryproduct/{id}','ProductController@categoryproduct')->name('frontend.products.categoryproduct');
    Route::get('/carts/add/{id}','CartController@add')->name('frontend.carts.add');
    Route::get('/carts/list','CartController@index')->name('frontend.carts.index');
    Route::get('/carts/checkout','CartController@checkout')->name('frontend.carts.checkout');

});

Route::prefix('/')
->namespace('Auth')
->group(function(){
    Route::get('/register','RegisteredUserController@create');
    Route::post('/register','RegisteredUserController@store')
    ->name('register');

    Route::get('/login','LoginController@create')
    ->name('login');

    Route::post('/login','LoginController@authenticate')
    ->name('login');

    Route::post('/logout', 'LoginController@logout')->name('logout');
});

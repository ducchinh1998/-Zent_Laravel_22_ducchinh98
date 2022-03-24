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
        Route::get('/show/{id}','UserController@show')->name('backend.users.show');
        Route::put('/update/{id}','UserController@update')->name('backend.users.update');
        Route::delete('/delete/{id}','UserController@destroy')->name('backend.users.destroy');

    });

    // Route::Resource('posts', PostsController::class);
    Route::group(['prefix' => 'posts'],function(){


        Route::get('/index','PostController@index')->name('backend.posts.index');

        Route::get('/create','PostController@create')->name('backend.posts.create');
        Route::post('/store','PostController@store')->name('backend.posts.store');

        Route::get('/edit/{id}','PostController@edit')->name('backend.posts.edit');
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

});

//Frontend

Route::prefix('/frontend')
->namespace('Frontend')
->group(function(){
    Route::get('/home','HomeController@index')->name('frontend.home');
    Route::get('/posts/index','PostController@index')->name('frontend.posts.index');
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

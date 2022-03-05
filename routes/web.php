<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use \App\Http\Controllers\DashboardController;

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
->name('backend.')
->namespace('Backend')
->group(function(){
    Route::get('dashboard','DashboardController@index');

    Route::get('/dashboard',function(){
        return view('backend.dashboard');
    })->name('backend.dashboard.index');

    //  Route::Resource('users', UsersController::class);
    Route::group(['prefix' => 'users'],function(){
        Route::get('/index',function(){
            return view('backend.users.index');
        });

        Route::get('/create',function(){
            return view('backend.users.create');
        });

        Route::get('/edit',function(){
            return view('backend.users.edit');
        });

    });

    // Route::Resource('posts', PostsController::class);
    Route::group(['prefix' => 'posts'],function(){

        
        Route::get('/index',function(){
            return view('backend.posts.index');
        });

        Route::get('/create',function(){
            return view('backend.posts.create');
        });

        Route::get('/edit',function(){
            return view('backend.posts.edit');
        });
       
    });
    



    Route::group(['prefix' => 'categories'],function(){
        Route::get('/index',function(){
            return view('backend.categories.dashboard');
        })->name('backend.categories.index');

    
    
        Route::get('/create/{id}',function($id){
            return view('backend.categories.create', [ 'id'=> 1 ]);
        })->name('backend.create.category');
    
        Route::post('/store/{id}',function($id){
            return redirect()->route('backend.categories.index');
        })->name('backend.store.category');
    
        Route::get('/edit/{id}',function($id){
            return view('backend.categories.edit', [ 'id'=> 1 ]);
        })->name('backend.edit.category');
    
        Route::post('/update/{id}',function($id){
            return redirect()->route('backend.categories.index');
        })->name('backend.update.category');
    
        Route::get('/show/{id}',function($id){
            return view('backend.categories.show', [ 'id'=> 1 ]);
        })->name('backend.show.category');
    
        Route::delete('/delete/{id}',function($id){
            return redirect()->route('backend.categories.index');
        })->name('backend.delete.category');
    
    });
    
    // Quản lý Blog
    Route::group(['prefix' => 'blogs'],function(){
        Route::get('/index',function(){
            return view('backend.blogs.dashboard');
        })->name('backend.blogs.index');

        Route::get('/create/{id}',function($id){
            return view('backend.blogs.create', [ 'id'=> 1 ]);
        })->name('backend.create.blog');

        Route::post('/store/{id}',function($id){
            return redirect()->route('backend.blogs.index');
        })->name('backend.store.blog');

        Route::get('/edit/{id}',function($id){
            return view('backend.blogs.edit', [ 'id'=> 1 ]);
        })->name('backend.edit.blog');

        Route::post('/update/{id}',function($id){
            return redirect()->route('backend.blogs.index');
        })->name('backend.update.blog');

        Route::get('/show/{id}',function($id){
            return view('backend.blogs.show', [ 'id'=> 1 ]);
        })->name('backend.show.blog');

        Route::delete('/delete/{id}',function($id){
            return redirect()->route('backend.blogs.index');
        })->name('backend.delete.blog');
    
    });

});
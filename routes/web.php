<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::prefix('backend')->group(function(){
    Route::group(['prefix' => 'categories'],function(){
        Route::get('/index',function(){
            return view('BT.categories.dashboard');
        })->name('backend.categories.index');
    
    
        Route::get('/create/{id}',function($id){
            return view('BT.categories.create', [ 'id'=> 1 ]);
        })->name('backend.create.category');
    
        Route::post('/store/{id}',function($id){
            return redirect()->route('backend.categories.index');
        })->name('backend.store.category');
    
        Route::get('/edit/{id}',function($id){
            return view('BT.categories.edit', [ 'id'=> 1 ]);
        })->name('backend.edit.category');
    
        Route::post('/update/{id}',function($id){
            return redirect()->route('backend.categories.index');
        })->name('backend.update.category');
    
        Route::get('/show/{id}',function($id){
            return view('BT.categories.show', [ 'id'=> 1 ]);
        })->name('backend.show.category');
    
        Route::delete('/delete/{id}',function($id){
            return redirect()->route('backend.categories.index');
        })->name('backend.delete.category');
    
    });
    
    // Quản lý Blog
    Route::group(['prefix' => 'blogs'],function(){
        Route::get('/index',function(){
            return view('BT.blogs.dashboard');
        })->name('backend.blogs.index');

        Route::get('/create/{id}',function($id){
            return view('BT.blogs.create', [ 'id'=> 1 ]);
        })->name('backend.create.blog');

        Route::post('/store/{id}',function($id){
            return redirect()->route('backend.blogs.index');
        })->name('backend.store.blog');

        Route::get('/edit/{id}',function($id){
            return view('BT.blogs.edit', [ 'id'=> 1 ]);
        })->name('backend.edit.blog');

        Route::post('/update/{id}',function($id){
            return redirect()->route('backend.blogs.index');
        })->name('backend.update.blog');

        Route::get('/show/{id}',function($id){
            return view('BT.blogs.show', [ 'id'=> 1 ]);
        })->name('backend.show.blog');

        Route::delete('/delete/{id}',function($id){
            return redirect()->route('backend.blogs.index');
        })->name('backend.delete.blog');
    
    });

});

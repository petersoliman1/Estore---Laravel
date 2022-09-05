<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
| This file Route Responsible about Backend and dashboard.
|
|
*/

/** ======================= Translate All Pages ======================== */
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth', 'CheckIfAdmin']
    ], function(){

        /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/

        route::group(['namespace' => 'BackEnd'], function(){

            /** ============= Start Dashboard Routes ============= */
            Route::get('/dashboard', 'AdminController@index')->name('dashboard');


            /** ============= Start Users Routes ============= */
            route::group(['prefix' => 'users'], function(){
                Route::get('/create', 'AdminController@create')->name('users.create');
                Route::post('/store', 'AdminController@store')->name('users.store');
                Route::get('/show/{id}', 'AdminController@show')->name('users.show');
                Route::get('/edit/{id}', 'AdminController@edit')->name('users.edit');
                Route::post('/update/{id}', 'AdminController@update')->name('users.update');
                Route::get('/delete/{id}', 'AdminController@delete')->name('users.delete');
            });


            /** ============= Start Gategories Routes ============= */
            Route::resource('categories', 'CategoriesController');


            /** ============= Start products Routes ============= */
            Route::resource('products', 'ProductsController');


            /** ============= Start comments Routes ============= */
            Route::resource('comments', 'CommentsController');

        });
    }
);

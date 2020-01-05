<?php

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

Route::get('/posts', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function(){
        
Route::get('/', 'postcontroller@index')->name('posts.home');
Route::get('/posts', 'postcontroller@index')->name('posts.index');
Route::get('/posts/create', 'postcontroller@create');
Route::post('/posts', 'postcontroller@store');
Route::get('/posts/{post}', 'postcontroller@show')->name('posts.show');
Route::get('/posts/{post}/edit', 'postcontroller@edit')->name('posts.edit');
Route::put('/posts/{post}', 'postcontroller@update')->name('posts.update');
Route::delete('/posts/{post}', 'postcontroller@delete')->name('posts.delete');
    });



// Route::get('login/github', 'Auth\LoginController@redirectToProvider');
// Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('login/{driver}', 'Auth\LoginController@redirectToProvider')
    ->where('driver', implode('|', config('auth.socialite.drivers')));
    
Route::get('login/{driver}/callback', 'Auth\LoginController@handleProviderCallback')
    ->name('login.callback')
    ->where('driver', implode('|', config('auth.socialite.drivers')));

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

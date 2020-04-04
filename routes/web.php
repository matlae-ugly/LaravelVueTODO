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

Route::get('/profile', 'ProfileController@index')->name('profile');

//API
Route::get('/api/lists', 'ApiController@getLists');
Route::get('/api/todos', 'ApiController@getTodos');
Route::post('/api/lists', 'ApiController@addList');
Route::post('/api/todos', 'ApiController@addTodo');
Route::delete('/api/lists/del/{id}', 'ApiController@removeLists');
Route::delete('/api/todos/del/{id}', 'ApiController@removeTodo');
Route::post('/api/todos/edit', 'ApiController@updateTodo');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

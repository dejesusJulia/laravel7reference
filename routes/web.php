<?php
// 43/53 - Todo List Mini Project 23 | Introduction to Laravel LiveWire
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

// Upload Image for User
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
    // return env('APP_NAME');
    return view('welcome');
    // return View::make('welcome'); using alias
});

Route::get('/user', 'UserController@index');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/upload', 'UserController@uploadAvatar');

/* 
*
* TODO MINI APPLICATION
*
 */

// MIDDLEWARE APPLICATION METHOD ONE
Route::middleware('auth')->group(function(){

    Route::resource('/todo', 'TodoController');
    // Route::get('/todos', 'TodoController@index')->name('todo.index');
    // Route::get('/todos/create', 'TodoController@create');
    // Route::post('/todos/create', 'TodoController@add')->name('todo.add');
    // Route::get('/todos/{todo}/edit', 'TodoController@edit');
    // Route::patch('/todos/{todo}/edit', 'TodoController@update')->name('todo.update');
    // Route::delete('/todos/{todo}/delete', 'TodoController@delete')->name('todo.delete');

    Route::put('/todos/{todo}/complete', 'TodoController@complete')->name('todo.complete');
    Route::delete('/todos/{todo}/incomplete', 'TodoController@incomplete')->name('todo.incomplete');
});

// MIDDLEWARE APPLICATION METHOD TWO
// Route::resource('/todo', 'TodoController')->middleware('auth');







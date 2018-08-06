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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/todos', 'TodosController@index')->name('todos');

Route::get('/todos/delete/{id}', 'TodosController@delete')->where(['id' => '[0-9]+'])->name('todo.delete');

Route::get('/todo/edit/{id}', 'TodosController@edit')->where(['id' => '[0-9]+'])->name('todo.edit');

Route::get('/todo/completed/{id}', 'TodosController@completed')->name('todo.completed');

Route::post('/create/todo', 'TodosController@store');

Route::post('/update/todo/{id}', 'TodosController@update')->where(['id' => '[0-9]+'])->name('todo.update');
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
    return view('layouts.app');
});

Route::get('/test', 'TestController@index')->name('test');

Route::get('/users', 'UserController@index')->name('users.index');
Route::get('/ideas', 'IdeaController@index')->name('ideas.index');
Route::get('/ideas/{id}', 'IdeaController@group')->name('ideas.group');
Route::get('/groups', 'GroupController@index')->name('groups.index');

Route::get('/vote/{voter_id}/{group_id}', 'VoteController@voting')->name('votes.voting');
Route::post('/vote/{voter_id}/{group_id}', 'VoteController@store')->name('votes.store');
Route::get('/vote/show/{group_id}', 'VoteController@show')->name('votes.show');

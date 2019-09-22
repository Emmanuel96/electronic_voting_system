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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/vote/candidates', 'ElectionController@viewCandidates')->name('candidates');

Route::get('/vote', 'ElectionController@voteCandidate')->name('vote.candidate');

Route::get('/results', 'ElectionController@viewResults')->name('results');

Route::get('/candidate/new', 'ElectionController@newCandidate')->middleware('admin')->name('candidate.new');

Route::post('/candidate/create', 'ElectionController@createCandidate')->middleware('admin')->name('candidate.create');

Route::get('voters/list', 'ElectionController@votersList')->name('voters.list');

Route::get('/positions/list', 'ElectionController@viewPositions')->middleware('admin')->name('positions.list');

Route::get('/positions/new', 'ElectionController@new_position')->middleware('admin')->name('new.position');

Route::post('/position/create', 'ElectionController@create_position')->middleware('admin')->name('create.position');

Route::get('/position/delete/{id}', 'ElectionController@deletePosition')->middleware('admin')->name('delete.position');

Route::get('/user/verify/{id}', 'ElectionController@verifyUser')->middleware('admin')->name('verify.user');

Route::get('/users', 'ElectionController@viewUsers')->middleware('admin')->name('users.list');

Route::get('/edit/position/{id}', 'ElectionController@editPosition')->middleware('admin')->name('edit.position');

Route::post('/update/position', 'ElectionController@updatePosition')->middleware('admin')->name('update.position');

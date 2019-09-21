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

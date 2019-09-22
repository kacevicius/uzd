<?php


Route::group(['middleware' => ['customAuth']], function () {
    Route::view('/', 'home')->name('home');
});

Route::view('/login', 'login');
Route::post('/login', 'Auth\LoginController@Login');
Route::get('/logout', 'Auth\LoginController@Logout');

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

Route::get("/", function () {
    return view("welcome");
});

Route::get("/method/1", "EndUserController@viewMethodOne");

Route::get("/method/2", "EndUserController@viewMethodTwo");

Route::get("/faq", "EndUserController@viewFaq");

Route::get("/track/calendar", "EndUserController@viewTrackCalendar")->name('login');

Route::get("/track/statistic", "EndUserController@viewTrackStatistic")->name('login');

Route::get("/track/calendar/add", "EndUserController@viewTrackAdd")->name('login');

Route::get("/track/statistic/add", "EndUserController@viewTrackAdd")->name('login');
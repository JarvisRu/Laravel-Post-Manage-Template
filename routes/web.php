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

# Auth
Auth::routes();

# 前台
Route::get('/', function () {
    return view('welcome');
});


# 後台
Route::prefix('/manage')->group(function () {
    Route::get('/index', 'AnnouncementController@showManageIndex')->name('manage-index');

    Route::get('/view-new', 'AnnouncementController@viewNewPage')->name('view-new');
    Route::post('/index', 'AnnouncementController@newAnnouncement')->name('new-announcement');
    Route::get('/view-announcement/{announcement}/{mode}', 'AnnouncementController@viewAnnouncement')->name('view-edit-announcement');
    Route::put('/update-announcement/{announcement}', 'AnnouncementController@updateAnnouncement')->name('update-announcement');
});


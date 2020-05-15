<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Admin'], function () {

    Route::group(['middleware' => ['admin.auth:admin']], function () {

        Route::get('/', 'HomeController@index')->name('admin.dashboard');
        // Route::get('sendNotifications', 'HomeController@notificationCreate')->name('notifications.view');
        // Route::POST('sendNotifications', 'HomeController@sendNotifications')->name('notifications.send');
        // Route::get('/users/archive',        ['as' => 'users.archive',   'uses' => 'UserController@archive']);
        // Route::PATCH('/users/restore/{id}', ['as' => 'users.restore',   'uses' => 'UserController@restore']);
        // Route::Delete('/users/delete/{id}', ['as' => 'users.delete',    'uses' => 'UserController@destroyFinal']);
        // Route::resource('/users', 'UserController');
        // Route::resource('/admins', 'AdminController');
        // Route::resource('/cities', 'CityController');
        // Route::get('/cities/neighborhoods/{id}', ['as' => 'cities.neighborhoods', 'uses' => 'NieghbourhoodController@getCityNeighborhoods']);
        // Route::resource('/nieghbourhoods', 'NieghbourhoodController');
        // Route::resource('/accessories', 'AccessorieController');
        // Route::resource('/categories', 'CategoryController');
        // Route::resource('/departments', 'DepartmentController');
        // Route::resource('/projects', 'ProjectController');
        // Route::resource('/sections', 'SectionController');
        // Route::resource('/departments-files', 'DepartmentFileController');
        // Route::resource('/tasks', 'TaskController');
        // Route::resource('/buildings', 'BuildingController');
        // Route::resource('/bookings', 'BookingController');
        // Route::resource('/bookes', 'BookingUserController');
        // Route::resource('/offices', 'OfficesController');

        // Route::get('/image/{id}','imageController@destroy')->name('imageDestroy');

        // Route::resource('/tasks-costs', 'TaskCostController');
        // Route::resource('/settings', 'SettingController')
        // ->except(['create', 'store', 'destroy']);

    });





    // Login
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login');

    Route::post('login', 'Auth\LoginController@login');

    Route::post('logout', 'Auth\LoginController@logout')->name('admin.logout');




});

<?php

use Illuminate\Support\Facades\Route;


Route::group(['namespace' => 'Admin'], function () {

    Route::group(['middleware' => ['admin.auth:admin']], function () {

        Route::group(['namespace' => 'Admins'], function () {

            // Admin Lists
            Route::get('/show', 'AdminController@show')->name('admin.show');
            Route::get('/me', 'AdminController@me')->name('admin.me');

            // Admin Roles
            Route::post('/{admin}/role/{role}', 'AdminRoleController@attach')->name('admin.attach.roles');
            Route::delete('/{admin}/role/{role}', 'AdminRoleController@detach');

            // Roles
            Route::get('/role', 'RoleController@index')->name('admin.role');
            Route::get('/role/create', 'RoleController@create')->name('admin.role.create');
            Route::post('/role/store', 'RoleController@store')->name('admin.role.store');
            Route::delete('/role/{role}', 'RoleController@destroy')->name('admin.role.delete');
            Route::get('/role/{role}/edit', 'RoleController@edit')->name('admin.role.edit');
            Route::patch('/role/{role}', 'RoleController@update')->name('admin.role.update');

            // Permission
            Route::get('/permission', 'PermissionController@index')->name('admin.permission');
            Route::get('/permission/create', 'PermissionController@create')->name('admin.permission.create');
            Route::post('/permission/store', 'PermissionController@store')->name('admin.permission.store');
            Route::delete('/permission/{permission}', 'PermissionController@destroy')->name('admin.permission.delete');
            Route::get('/permission/{permission}/edit', 'PermissionController@edit')->name('admin.permission.edit');
            Route::patch('/permission/{permission}', 'PermissionController@update')->name('admin.permission.update');
        });

        Route::group(['namespace' => 'Auth'], function () {

            // Register Admins
            Route::get('register', 'RegisterController@showRegistrationForm')->name('admin.register');
            Route::post('register', 'RegisterController@register');
            Route::get('/{admin}/edit', 'RegisterController@edit')->name('admin.edit');
            Route::delete('/{admin}', 'RegisterController@destroy')->name('admin.delete');
            Route::patch('/{admin}', 'RegisterController@update')->name('admin.update');
        });

        Route::get('/', 'HomeController@index')->name('admin.dashboard');

    });
    Route::group(['namespace' => 'Auth'], function () {
        // Login and Logout
        Route::get('login', 'LoginController@showLoginForm')->name('admin.login');
        Route::post('login', 'LoginController@login');
        Route::post('logout', 'LoginController@logout')->name('admin.logout');
    });
});

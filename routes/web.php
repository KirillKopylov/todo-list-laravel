<?php

use Illuminate\Support\Facades\Route;

Route::namespace('App\\Http\\Controllers')->group(function () {
    Route::get('/', 'TaskController@getAllTasks')
        ->name('all_tasks');
    Route::get('/task/{id}', 'TaskController@getTask')
        ->where('id', '\d+')
        ->name('task_by_id');
    Route::get('/create-task', 'TaskController@createTask')
        ->name('create_task');
    Route::post('/store-task', 'TaskController@storeTask')
        ->name('store_task');

    Route::middleware('guest')->group(function () {
        Route::get('/login', 'LoginController@index')
            ->name('login');
        Route::post('/handle-login', 'LoginController@login')
            ->name('handle_login');
    });

    Route::middleware('auth')->group(function () {
        Route::get('/logout', 'LoginController@logout')
            ->name('logout');
        Route::get('/edit-task/{id}', 'TaskController@editTaskIndex')
            ->where('id', '\d+')
            ->name('edit_task_by_id');
        Route::post('/handle-edit-task/{id}', 'TaskController@editTask')
            ->where('id', '\d+')
            ->name('handle_edit_task');
    });
});

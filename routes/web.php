<?php

use Illuminate\Support\Facades\Route;

Route::namespace('App\\Http\\Controllers')->group(function () {
    Route::get('/', 'TaskController@getAllTasks')
        ->name('all_tasks');
    Route::get('/task/{id}', 'TaskController@getTask')
        ->where('id', '\d+')
        ->name('task_by_id');

});

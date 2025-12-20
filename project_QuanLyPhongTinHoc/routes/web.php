<?php

use App\Http\Controllers\IssuesController;
use Illuminate\Support\Facades\Route;

Route::prefix('/')->controller(IssuesController::class)
->name('issues.')
->group(function(){
    Route::get('/','index')->name('index');
    Route::get('/create','create')->name('create');
    Route::post('/','store')->name('store');
    Route::get('/{id}','edit')->name('edit');
    Route::put('/{id}','update')->name('update');
    Route::delete('/{id}','destroy')->name('destroy');
});
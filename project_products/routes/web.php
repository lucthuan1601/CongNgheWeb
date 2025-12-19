<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::prefix('posts')
->controller(PostController::class)
->name('posts.')
->group(function(){
    Route::get('/','index')->name('index');
    Route::get('/create','create')->name('create');
    Route::post('/','store')->name('store');
    Route::get('/{id}','edit')->name('edit');
    Route::put('/{id}','update')->name('update');
    Route::delete('/{id}','destroy')->name('destroy');
});

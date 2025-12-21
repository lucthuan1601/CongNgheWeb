<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\ThesesController;
use Illuminate\Support\Facades\Route;

// cài đặt boostrap 
// 1. cài đặt package
// composer require laravel/ui
// 2.thiết lập boostrap
// php artisan ui bootstrap
// 3.cài thư viện Node
// npm install
// npm run dev
// 4.cài đặt ở giao diện chính câu lệnh sau
// @vite(['resources/sass/app.scss', 'resources/js/app.js'])
// Lưu ý khi bị lỗi hiển thị
// Nếu bạn đã cài xong nhưng giao diện vẫn không thay đổi:
// Chạy lại lệnh: npm run build (để tạo file tĩnh cuối cùng).
// Xóa cache view: php artisan view:clear.
// Kiểm tra lỗi Console: Nhấn F12 xem có file CSS/JS nào bị báo lỗi 404 không.
Route::prefix('/students')->controller(StudentController::class)
->name('students.')
->group(function(){
    Route::get('/','index')->name('index');
    Route::get('/create','create')->name('create');
    Route::post('/','store')->name('store');
    Route::get('/{id}','edit')->name('edit');
    Route::put('/{id}','update')->name('update');
    Route::delete('/{id}','destroy')->name('destroy');
});
Route::prefix('/')->controller(ThesesController::class)
->name('theses.')
->group(function(){
    Route::get('/','index')->name('index');
    Route::get('/create','create')->name('create');
    Route::post('/','store')->name('store');
    Route::get('/{id}','edit')->name('edit');
    Route::put('/{id}','update')->name('update');
    Route::delete('/{id}','destroy')->name('destroy'); 
});
<?php
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use Laravel\Mcp\Enums\Role;

Route::get('/', [PageController::class, 'showHomepage']);
Route::get('/about', [PageController::class, 'showHomepage']);
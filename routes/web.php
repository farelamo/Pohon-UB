<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuth;
use App\Http\Controllers\AdminDashboard;
use App\Http\Controllers\AdminTree;
use App\Http\Controllers\AdminType;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return redirect('/dev/login');
});

// Auth
Route::get('/dev/login', [AdminAuth::class, 'index']);
Route::post('/dev/login', [AdminAuth::class, 'login']);

// Admin Page
Route::get('/dev', [AdminDashboard::class, 'index']);
Route::get('/dev/tree', [AdminTree::class, 'index']);
Route::get('/dev/type', [AdminType::class, 'index']);

<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::view('/counter', 'counter.index')->name('counter');
    Route::name('tasks.')->prefix('tasks')->group(function () {
        Route::view('/', 'tasks.index')->name('index');
        Route::view('/create', 'tasks.create')->name('create');
    });
});

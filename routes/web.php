<?php

use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', [PagesController::class, 'dashboard'])->name('dashboard');
Route::get('/test', [PagesController::class, 'test'])->name('test');



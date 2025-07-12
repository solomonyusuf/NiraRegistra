<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PagesController;
use App\Jobs\KeyGenerateJob;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::post('/login', [PagesController::class, 'Login'])->name('login');
Route::get('/logout', [PagesController::class, 'Logout'])->name('logout');

Route::middleware(['auth:sanctum'])->group(function (){
    Route::get('/dashboard', [PagesController::class, 'Dashboard'])->name('dashboard');
    Route::get('/profiles', [PagesController::class, 'AllProfile'])->name('all_profiles');
    Route::get('/expired-profiles', [PagesController::class, 'ExpiredProfile'])->name('expired_profiles');
    Route::get('/create-profile', [PagesController::class, 'CreateProfile'])->name('create_profile');
    Route::get('/view-profile/{id}', [PagesController::class, 'ViewProfile'])->name('view_profile');
    Route::get('/edit-profile/{id}', [PagesController::class, 'EditProfile'])->name('edit_profile');
    Route::get('/educational', [PagesController::class, 'Educational'])->name('educational');
    Route::get('/forum', [PagesController::class, 'Forum'])->name('forum');
    Route::get('/emails', [PagesController::class, 'Emails'])->name('emails');
    Route::get('/schedules', [PagesController::class, 'Schedules'])->name('schedules');
    Route::get('/all_payments', [PagesController::class, 'AllPayment'])->name('all_payment');
    Route::get('/all_users', [PagesController::class, 'AllUsers'])->name('all_users');
    Route::get('/account/{id}', [PagesController::class, 'Account'])->name('account');


//REQUESTS

    Route::post('/create-profile', [AdminController::class, 'CreateProfile'])->name('post_profile');
    Route::post('/edit-profile', [AdminController::class, 'UpdateProfile'])->name('put_profile');

    Route::post('/create_educational', [AdminController::class, 'CreateEducational'])->name('create_educational');
    Route::get('/delete_educational/{id}', [AdminController::class, 'DeleteEducational'])->name('delete_educational');

    Route::post('/create_forum', [AdminController::class, 'CreateForum'])->name('create_forum');
    Route::get('/delete_forum/{id}', [AdminController::class, 'DeleteForum'])->name('delete_forum');

    Route::post('/create_event', [AdminController::class, 'CreateEvent'])->name('create_event');
    Route::get('/delete_event/{id}', [AdminController::class, 'DeleteEvent'])->name('delete_event');

    Route::post('/create_emails', [AdminController::class, 'CreateEmail'])->name('create_emails');
    Route::get('/delete_email/{id}', [AdminController::class, 'DeleteEmail'])->name('delete_email');

    Route::post('/renew_payment', [AdminController::class, 'CreatePayment'])->name('renew_payment');
    Route::get('/delete_payment/{id}', [AdminController::class, 'DeletePayment'])->name('delete_payment');

    Route::post('/create_user', [AdminController::class, 'CreateUser'])->name('create_user');
    Route::post('/update_user', [AdminController::class, 'UpdateUser'])->name('update_user');
    Route::get('/delete_user/{id}', [AdminController::class, 'DeleteUser'])->name('delete_user');

});



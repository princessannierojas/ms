<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MeetingsController;
use App\Http\Controllers\MembersController;
use App\Http\Controllers\AccountSettingsController;

Route::get('/sign_up_form', [SignupController::class, 'sign_up_form']);
Route::post('/sign_up_process', [SignupController::class, 'sign_up_process']);
Route::get('/', [LoginController::class, 'login_form']);
Route::get('/', [LoginController::class, 'login_form'])->name('login'); //for logout, kasi... https://chatgpt.com/c/39609e5a-5619-48ef-8f1b-d9586a2b7d30 
Route::post('/login_process', [LoginController::class, 'login_process']);

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'manager_home'])->name('manager.home');
    Route::get('/meetings', [MeetingsController::class, 'manager_meetings'])->name('manager.meetings');
    Route::post('/add_meeting', [MeetingsController::class, 'add_meeting']);
    Route::get('/edit_notes/{id}', [MeetingsController::class, 'edit_notes']);
    Route::delete('/delete_meeting/{id}', [MeetingsController::class, 'delete_meeting']);
    Route::put('/update_meeting/{id}', [MeetingsController::class, 'update_meeting']);
    Route::get('/members', [MembersController::class, 'members_table']);
    Route::post('/add_member', [MembersController::class, 'add_member']);
    Route::get('/account_settings', [AccountSettingsController::class, 'account_settings']);
    Route::put('/update_account_settings', [AccountSettingsController::class, 'update_account_settings']);
    Route::get('/logout', [LoginController::class, 'logout']);

    Route::get('/homem', [HomeController::class, 'member_home'])->name('member.home');
    Route::get('/meetingsm', [MeetingsController::class, 'member_meetings'])->name('member.meetings');
    Route::get('/account_settingsm', [AccountSettingsController::class, 'member_account_settings'])->name('member.account_settings');
});


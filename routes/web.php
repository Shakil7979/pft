<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\TransectionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
 
Route::get('/', function () {
    if (Auth::check()) { 
        return redirect()->route('dashboard');
    } else { 
        return redirect()->route('login');
    }
});
 

// Login Route 

Route::middleware(['guest'])->group(function () {

    // Login Route 
    Route::any('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::any('login_request', [LoginController::class, 'login_request'])->name('login_form');

    // Registraion Route 
    Route::any('register', [RegistrationController::class, 'registerForomShow'])->name('register');
    Route::any('register_request', [RegistrationController::class, 'register_request'])->name('register_form');

    // Forgote Route 
    Route::any('forgot', [ForgotPasswordController::class, 'ForgotForomShow'])->name('forgot');
    Route::any('forgot_request', [ForgotPasswordController::class, 'forgot_request'])->name('forgot_form');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
 
    // google registraion 
    Route::get('auth/google', [RegistrationController::class, 'redirectToGoogle'])->name('auth.google');
    Route::get('auth/google/callback', [RegistrationController::class, 'handleGoogleCallback']);

    // facebook registration 
    Route::get('auth/facebook', [RegistrationController::class, 'redirectToFacebook'])->name('auth.facebook');
    Route::get('auth/facebook/callback', [RegistrationController::class, 'handleFacebookCallback']);

    


});


// Logout 
Route::any('logout', [LoginController::class, 'logout'])->name('logout');


Route::group(['middleware' => 'auth'], function (){
    Route::any('/dashboard',[HomeController::class, 'index'])->name('dashboard');

    // Account Route 
    Route::get('account', [AccountController::class, 'show'])->name('account.show');

    // Income Route 
    Route::get('income', [IncomeController::class, 'show'])->name('income.show');

    // Expense Route 
    Route::get('expense', [ExpenseController::class, 'show'])->name('expense.show');

    // Statistic Route 
    Route::get('statistic', [StatisticController::class, 'show'])->name('statistic.show');

    // Transection Route 
    Route::get('transection', [TransectionController::class, 'show'])->name('transection.show');

    // Transection Route 
    Route::get('settings', [SettingsController::class, 'show'])->name('settings.show');



});


 

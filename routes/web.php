<?php

use App\Http\Controllers\AuthController;
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

Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('home');

Route::get('/recipes', [App\Http\Controllers\RecipeController::class, 'index'])->name('recipes.index');
Route::get('/recipes/{id}', [App\Http\Controllers\RecipeController::class, 'show'])->name('recipes.show');

Route::middleware("auth")->group(function () {
    Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
    Route::post('/recipes/comment/{id}', [App\Http\Controllers\RecipeController::class, 'comment'])->name('comment');

});

Route::middleware("guest")->group(function () {
    Route::get('/login', [App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login-process', [App\Http\Controllers\AuthController::class, 'login'])->name('login-process');

    Route::get('/forgot', [App\Http\Controllers\AuthController::class, 'showForgotForm'])->name('forgot');
    Route::post('/forgot_process', [App\Http\Controllers\AuthController::class, 'forgot'])->name('forgot_process');

    Route::get('/register', [App\Http\Controllers\AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register-process', [App\Http\Controllers\AuthController::class, 'register'])->name('register-process');
});

Route::get('/contacts', [App\Http\Controllers\IndexController::class, 'showContactForm'])->name('contacts');
Route::post('/contact_form_process', [App\Http\Controllers\IndexController::class, 'contactForm'])->name('contact_form_process');

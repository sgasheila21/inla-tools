<?php

use App\Http\Controllers\AnalysisController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\VariableController;
use Illuminate\Support\Facades\Auth;
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
})->name('welcome');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.auth');

Route::get('/forgot-password', [PasswordController::class, 'showForgotPassword'])->name('forgot.password');
Route::post('/forgot-password', [PasswordController::class, 'forgotPassword'])->name('forgot.password.action');

Route::get('/change-password', [PasswordController::class, 'showChangePassword'])->name('change.password');
Route::get('/change-password/{token}', [PasswordController::class, 'showChangePasswordForgot'])->name('change.password.forgot');
Route::post('/change-password', [PasswordController::class, 'changePassword'])->name('change.password.action');

Route::middleware(['auth', 'mustLogin'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/data', [DataController::class, 'index'])->name('data');
    Route::get('/data/create', [DataController::class, 'createShow'])->name('data.create');
    Route::post('/data/create', [DataController::class, 'create'])->name('data.create.action');

    Route::get('/data/detail/{id}', [DataController::class, 'detail'])->name('data.detail');
    Route::get('/data/update/{id}', [DataController::class, 'updateShow'])->name('data.update');
    Route::post('/data/update/{id}', [DataController::class, 'update'])->name('data.update.action');
    Route::delete('/data/delete/{id}', [DataController::class, 'delete'])->name('data.delete');

    Route::get('/variable', [VariableController::class, 'index'])->name('variable');
    Route::get('/variable/update/{id}', [VariableController::class, 'updateShow'])->name('variable.update');
    Route::post('/variable/update/{id}', [VariableController::class, 'update'])->name('variable.update.action');
    Route::delete('/variable/delete/{id}', [VariableController::class, 'delete'])->name('variable.delete');

    Route::get('/analysis', [AnalysisController::class, 'index'])->name('analysis');
    Route::post('/analysis', [AnalysisController::class, 'create'])->name('analysis.create');
    Route::post('/analysis/data', [AnalysisController::class, 'getDataDropdown'])->name('dropdown.data');
    Route::post('/analysis/dependent-variable', [AnalysisController::class, 'getDependentVariableDropdown'])->name('dropdown.dependent.variable');
    Route::post('/analysis/independent-variable', [AnalysisController::class, 'getIndependentVariableDropdown'])->name('dropdown.independent.variable');
});
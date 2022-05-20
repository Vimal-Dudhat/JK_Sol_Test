<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CandidateController;

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
    $msg = "";
    return view('login',compact('msg'));
})->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('user.login');

Route::group(['middleware' => 'auth'], function()
{
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/logout', [DashboardController::class, 'logout'])->name('logout');

    Route::post('/add/candidate', [CandidateController::class, 'store'])->name('add.candidate');
    Route::get('/edit/candidate', [CandidateController::class, 'edit'])->name('edit.candidate');
    Route::post('/update/candidate', [CandidateController::class, 'update'])->name('update.candidate');
    Route::post('/delete/candidate', [CandidateController::class, 'destroy'])->name('delete.candidate');

});


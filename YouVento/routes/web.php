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

Route::get('/user',function(){
    return 'user';
});

use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClubController;


Route::get('/users', [UserController::class, 'index']);

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);

Route::get('dashboard', function () {
    return view('admin.dashboard');
})->name('admin');


Route::get('student', function () {
    return view('student.index');
})->name('student');

Route::get('addClub',function(){
    return view('admin.addClub');
})->name('addclub');

Route::post('/creatClub',[ClubController::class,'store'])->name('club.store');
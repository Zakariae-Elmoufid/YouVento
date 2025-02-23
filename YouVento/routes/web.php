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
use App\Http\Controllers\CategoryController;


Route::get('/users', [UserController::class, 'index']);
Route::get('/', function () {
    return view('home');
});
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);



;

Route::get('createClub',function(){
    return view('admin.club.create');
})->name('club.create');

Route::get('/clubs', [ClubController::class, 'index'])->name('club.index'); 
Route::post('/stroreClub',[ClubController::class,'store'])->name('club.store');
Route::get('/{id}/edit',[ClubController::class,'edit'])->name('club.edit');
Route::post('/{id}/update', [ClubController::class, 'update'])->name('club.update');
Route::delete('/{id}/delete',[ClubController::class,'destroy'])->name('club.destroy');

Route::resource('category',CategoryController::class)->except(['show']);

use App\Http\Controllers\EventController;

Route::prefix('events')->group(function () {
    Route::get('/', [EventController::class, 'index'])->name('events.index');
    Route::get('/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/', [EventController::class, 'store'])->name('events.store');
    Route::get('/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/{event}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/{event}', [EventController::class, 'destroy'])->name('events.destroy');
    
    Route::get('/calendar-events', [EventController::class, 'getEvents'])->name('events.calendar');
});

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware('role:1');

Route::get('/student', function () {
    return view('student.dashboard');
})->middleware('role:2');


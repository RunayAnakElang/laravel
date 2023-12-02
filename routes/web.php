<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KontenController;

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
// Route::get('/',[AuthController::class,'login']);
// Route::get('/register',[AuthController::class,'register']);
// Route::post('/register',[AuthController::class,'registerpost']);
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [KontenController::class, 'index'])->name('dashboard');
    Route::get('/createcategory', [KontenController::class, 'createcategory'])->name('createcategory');
    Route::post('/createcategory', [KontenController::class, 'storecategory'])->name('storecategory');
    Route::get('/createquestion', [KontenController::class, 'createquestion'])->name('createquestion');
    Route::post('/createquestion/image', [KontenController::class, 'storeimage'])->name('reiki');
    Route::post('/createquestion', [KontenController::class, 'storequestion'])->name('storequestion');
    Route::put('/updatecategory/{id}',[KontenController::class,'updatecategory']);
    Route::delete('/categorydelete/{id}',[KontenController::class,'destroy']);
    Route::get('/profile', [KontenController::class,'profile'])->name('profile');
    Route::put('/users/{id}', [KontenController::class,'profileupdate'])->name('profileyuh');
    Route::get('/profile', [KontenController::class,'profile'])->name('profile');
    Route::get('/showquestion/{id}', [KontenController::class,'showquestion'])->name('show.questiom');

});
Auth::routes();
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');


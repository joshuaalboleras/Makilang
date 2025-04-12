<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::name('student.')->group(function(){
    Route::get('students',[StudentController::class,'index'])->name('index');
    Route::get('students/create',[StudentController::class,'create'])->name('create');
    Route::get('students/edit',[StudentController::class,'edit'])->name('edit');
    Route::get('students/show',[StudentController::class,'show'])->name('show');
    Route::post('students/store',[StudentController::class,'store'])->name('store');
});
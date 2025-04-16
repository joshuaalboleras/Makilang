<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Auth;

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
    Route::get('students/edit/{student}',[StudentController::class,'edit'])->name('edit');
    Route::put('students/update/{student}',[StudentController::class,'update'])->name('update');
    Route::get('students/show/{student}',[StudentController::class,'show'])->name('show');
    Route::delete('students/delete/{student}',[StudentController::class,'destroy'])->name('delete');
    Route::post('students/store',[StudentController::class,'store'])->name('store');
});
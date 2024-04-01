<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassRoomController;
use App\Http\Controllers\CollageController;
use App\Http\Controllers\ResController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('index');
})->middleware('auth');


Route::middleware(['auth'])->group(function (){
//----------subject-------//

    Route::resource('subjects',SubjectController::class);
    Route::get('subject',[SubjectController::class,'index'])->name('subjects');
    Route::get('subjects',[SubjectController::class,'create'])->name('subjects.create');
    Route::post('subjects',[SubjectController::class,'store'])->name('subjects.store');

//----------subject-------//
    ////----------collage-------//

    Route::get('collage',[CollageController::class,'index']);
    Route::resource('collage',CollageController::class);
    Route::get('collages',[CollageController::class,'create'])->name('collage_name');
    Route::post('collages',[CollageController::class,'store'])->name('collages.store');
    Route::get('collage_s/{id}',[CollageController::class,'get_taecher'])->name('collages.show');

//----------collage-------//
//
/// ////----------teachers-------//

    Route::get('teachers',[TeacherController::class,'index']);
    Route::resource('teachers',TeacherController::class);
    Route::get('teacher',[TeacherController::class,'create'])->name('teachers.create');
    Route::post('teacher',[TeacherController::class,'store'])->name('teachers.store');
    Route::post('teacher',[TeacherController::class,'update'])->name('teacher.update');
    Route::get('teacher/edit/{id}',[TeacherController::class,'edit'])->name('teacher.edit');
    Route::post('teacher/delete',[TeacherController::class,'destroy'])->name('teacher.destroy');
    Route::get('taecher_s',[TeacherController::class,'get_subjects'])->name('teachers.show');

//----------teachers-------//
////----------class-------//

    Route::get('classRooms',[ClassRoomController::class,'index']);
    Route::resource('classroom',ClassRoomController::class);
    Route::get('classroom',[ClassRoomController::class,'create'])->name('classRooms.create');
    Route::post('classroom',[ClassRoomController::class,'store'])->name('classRooms.store');

//----------class-------//


////----------res-------//

    Route::get('ress',[ResController::class,'index']);
    Route::get('res',[ResController::class,'create'])->name('res.create');
    Route::post('res',[ResController::class,'store'])->name('res.store');
    Route::get('res/edit/{id}',[ResController::class,'edit'])->name('res.edit');
    Route::post('res/update',[ResController::class,'update'])->name('res.update');
    Route::post('res/delete',[ResController::class,'destroy'])->name('res.destroy');

//----------res-------//

//----------user-----//
    Route::resource('users',UserController::class);
//----------user-----//
////----------user-----//
    Route::get('searchs',[SearchController::class,'index'])->name('search-index');
    Route::post('searchs',[SearchController::class,'search'])->name('search-res');
//----------user-----//

});











require __DIR__.'/auth.php';

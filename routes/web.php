<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Profile;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Course\CourseFunctionController;

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
    return view('contents.home');
})->name('home');

// User related pages-----------------------------------------------------------------------------------------------------------------------
Route::prefix('user')->middleware(['auth', 'verified'])->name('user.')->group(function () {
    Route::get('edit-profile', [Profile::class, 'edit'])->name('edit-profile');
    Route::get('profile', [Profile::class, 'view'])->name('profile');
});

// Course related pages-----------------------------------------------------------------------------------------------------------------------
Route::get('/courses-list', [CourseFunctionController::class, 'index'])->name('courses-list');
Route::get('/course-info/{id}', [CourseFunctionController::class, 'show'])->name('info');
Route::get('/course/watch/{id}', [CourseFunctionController::class, 'watch'])->middleware('auth', 'auth.isStudent')->name('watch');
Route::get('/course/watch/unit/{id}', [CourseFunctionController::class, 'unit'])->middleware('auth', 'auth.isStudent')->name('unit');

// Admin Routes-----------------------------------------------------------------------------------------------------------------------
Route::prefix('admin')->middleware(['auth', 'auth.isAdmin'])->name('admin.')->group(function () {
    Route::resource('/users', UserController::class);
});

//List page routes-----------------------------------------------------------------------------------------------------------------------
Route::get('/users-list', [UserController::class, 'list'])->middleware('auth')->name('users-list');

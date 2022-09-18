<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\ProgrammesController;
use App\Http\Controllers\SubjectsController;
use App\Http\Controllers\StudentsController;

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

/* Page Routes */
Route::get('/dashboard', function () {
    return view('pages.dashboard');
});
Route::get('/users/new_user', function () {
    return view('pages.users.new');
});

Route::resource('users', UsersController::class);
Route::resource('departments', DepartmentsController::class);
Route::resource('programmes', ProgrammesController::class);
Route::resource('subjects', SubjectsController::class);
Route::resource('students', StudentsController::class);

Route::post('students_import', [StudentsController::class, 'fileImport']);






// Route::get('users/tutors', 'TutorsController@tutorsPage');
// Route::get('users/students', 'StudentsController@studentsPage');
// Route::get('academics/courses', 'AcademicsController@coursesPage');
// Route::get('academics/units', 'AcademicsController@unitsPage');

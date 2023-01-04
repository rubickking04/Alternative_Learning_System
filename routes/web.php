<?php

use Illuminate\Support\Facades\Route;

/**
 * Routes to Students.
 */

use App\Http\Controllers\Student\RegisterController as StudentRegisterController;
use App\Http\Controllers\Student\LoginController as StudentLoginController;
use App\Http\Controllers\Student\HomeController as StudentHomeController;
use App\Http\Controllers\Student\JoinClassController as JoinClassController;
use App\Http\Controllers\Student\ClassViewerController as StudentClassViewerController;
use App\Http\Controllers\Student\PeopleController as PeopleController;
use App\Http\Controllers\Student\QuizController as QuizzesController;
use App\Http\Controllers\Student\AnswerController as AnswerController;
use App\Http\Controllers\Student\LogoutController as StudentLogoutController;

/**
 * Routes to Teachers.
 */

use App\Http\Controllers\Teacher\LoginController as TeacherLoginController;
use App\Http\Controllers\Teacher\RegisterController as TeacherRegisterController;
use App\Http\Controllers\Teacher\HomeController as TeacherHomeController;
use App\Http\Controllers\Teacher\CreateClassesController as TeacherClassController;
use App\Http\Controllers\Teacher\ClassViewerController as TeacherClassViewerController;
use App\Http\Controllers\Teacher\PeopleController as TeacherStudentViewerController;
use App\Http\Controllers\Teacher\ClassworkController as TeacherClassworkController;
use App\Http\Controllers\Teacher\QuizController as TeacherQuizzesController;
use App\Http\Controllers\Teacher\GradeController as TeacherGradeController;
use App\Http\Controllers\Teacher\TurnedInController as TeacherTurnInController;
use App\Http\Controllers\Teacher\LogoutController as TeacherLogoutController;

/**
 * Routes to Administrators.
 */

use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\StudentsTableController as AdminStudentController;
use App\Http\Controllers\Admin\TeachersTableController as AdminTeacherController;
use App\Http\Controllers\Admin\LoginController as AdminLoginController;
use App\Http\Controllers\Admin\LogoutController as AdminLogoutController;





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
    return redirect()->route('student.home');
});
Route::group(['middleware' => 'prevent-back-history'], function () {
    Route::group(['middleware' => 'guest'], function () {
        /**
         * Routes to Login of the Students Account.
         */
        Route::controller(StudentLoginController::class)->group(function () {
            Route::get('/auth/login', 'index')->name('student.login');
            Route::post('/auth/login', 'store')->name('auth.login');
        });
        /**
         * Routes to Register the Students Account.
         */
        Route::controller(StudentRegisterController::class)->group(function () {
            Route::get('/auth/register', 'index')->name('student.register');
            Route::post('/auth/register', 'store')->name('auth.register');
        });
    });
    /**
     * Routes to Dashboard of the Students Account.
     */
    Route::group(['middleware' => 'auth'], function () {
        Route::controller(StudentHomeController::class)->group(function () {
            Route::get('/home', 'index')->name('student.home');
            Route::get('/destroy/{id}', 'destroy')->name('student.destroy');
        });
        Route::controller(JoinClassController::class)->group(function () {
            Route::post('/auth/join/class', 'store')->name('student.join_class');
        });
        Route::controller(StudentClassViewerController::class)->group(function () {
            Route::get('/auth/stream/{studClass:uuid}', 'index')->name('student.class.home');
        });
        Route::controller(PeopleController::class)->group(function () {
            Route::get('/auth/peoples/{studClass:uuid}', 'index')->name('student.class.peoples');
        });
        Route::controller(QuizzesController::class)->group(function () {
            Route::get('/auth/quiz/{quizz:id}', 'index')->name('student.quizzes');
        });
        Route::controller(AnswerController::class)->group(function () {
            Route::post('/auth/answer', 'store')->name('student.quizzes.answer');
        });
        Route::controller(StudentLogoutController::class)->group(function () {
            Route::post('/auth/logout', 'logout')->name('student.logout');
        });
    });

    /**
     * Routes to Login of the Teachers Account.
     */
    Route::controller(TeacherLoginController::class)->group(function () {
        Route::get('/teacher/auth/login', 'index')->name('teacher.login');
        Route::post('/teacher/auth/login', 'login')->name('auth.teacher.login');
    });
    /**
     * Routes to Register the Teachers Account.
     */
    Route::controller(TeacherRegisterController::class)->group(function () {
        Route::get('/teacher/auth/register', 'index')->name('teacher.register');
        Route::post('/teacher/auth/register', 'store')->name('auth.teacher.register');
    });
    /**
     * Routes to Dashboard of the Teachers Account.
     */
    Route::group(['middleware' => 'auth:teacher'], function () {
        Route::controller(TeacherHomeController::class)->group(function () {
            Route::get('/teacher/home', 'index')->name('teacher.home');
            Route::post('/teacher/create/class', 'store')->name('teacher.home');
            Route::get('/class/destroy/{id}', 'destroy')->name('teacher.destroy');
        });
        Route::controller(TeacherClassController::class)->group(function () {
            Route::post('/teacher/create/class', 'store')->name('teacher.create.class');
        });
        Route::controller(TeacherClassViewerController::class)->group(function () {
            Route::get('/teacher/stream/{teachClass:uuid}', 'index')->name('teacher.class.home');
        });
        Route::controller(TeacherStudentViewerController::class)->group(function () {
            Route::get('/teacher/peoples/{teachClass:uuid}', 'index')->name('teacher.peoples');
            Route::get('/teacher/peoples/delete/{id}', 'destroy')->name('teacher.delete.peoples');
        });
        Route::controller(TeacherClassworkController::class)->group(function () {
            Route::get('/teacher/classworks/{teachClass:uuid}', 'index')->name('teacher.classworks');
            Route::post('/teacher/classworks/add/{teachClass:uuid}', 'store')->name('teacher.add.classworks');
            Route::get('/teacher/classworks/delete/{id}', 'destroy')->name('teacher.delete.classworks');
        });
        Route::controller(TeacherQuizzesController::class)->group(function () {
            Route::get('/teacher/quiz/{quizz:id}', 'index')->name('teacher.quizzes');
            Route::get('/teacher/answer/delete/{id}', 'destroy')->name('teacher.remove.answer');
        });
        Route::controller(TeacherTurnInController::class)->group(function () {
            Route::get('/teacher/quiz/turnedin/{quizz:id}', 'index')->name('teacher.turnin');
        });
        Route::controller(TeacherGradeController::class)->group(function () {
            Route::post('/teacher/upload/{id}', 'store')->name('teacher.quizzes.grade');
        });
        Route::controller(TeacherLogoutController::class)->group(function () {
            Route::post('/teacher/auth/logout', 'logout')->name('teacher.logout');
        });
    });

    /**
     * Routes to Login of the Teachers Account.
     */
    Route::controller(AdminLoginController::class)->group(function (){
        Route::get('/admin/auth/login', 'index')->name('admin.login');
        Route::post('/admin/auth/login', 'login')->name('auth.admin.login');
    });
    /**
     * Routes to Dashboard of the Administrators Account.
     */
    Route::group(['middleware' => 'auth:admin'], function () {
        Route::controller(AdminHomeController::class)->group(function () {
            Route::get('/admin/dashboard', 'index')->name('admin.home');
        });
        Route::controller(AdminStudentController::class)->group(function () {
            Route::get('/admin/tables/students', 'index')->name('admin.students');
            Route::post('/admin/students/update/{id}', 'update')->name('admin.students.update');
            Route::get('/admin/students/search', 'search')->name('admin.student.search');
            Route::get('/admin/students/delete{id}', 'destroy')->name('admin.students.delete');
        });
        Route::controller(AdminTeacherController::class)->group(function () {
            Route::get('/admin/tables/teachers', 'index')->name('admin.teachers');
            Route::post('/admin/teachers/update/{id}', 'update')->name('admin.teachers.update');
            Route::get('/admin/teachers/search', 'search')->name('admin.teacher.search');
            Route::get('/admin/teachers/delete{id}', 'destroy')->name('admin.teacher.delete');
        });
        Route::controller(AdminLogoutController::class)->group(function () {
            Route::post('/admin/auth/logout', 'logout')->name('admin.logout');
        });
    });
});

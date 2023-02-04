<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\SbadminController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TeacherDashboardController;
use App\Http\Controllers\UserController;
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
// start for mastering
// Route::get('/',[SbadminController::class, 'index']);
// Route::get('/contact',[SbadminController::class,'contact']);
Route::controller(SbadminController::class)->group(function(){
    Route::get('/','index')->name('index');
    // Route::get('/dashboard','dashboard')->name('dashboard');
    Route::get('/contact','contact')->name('contact');
});
// end for mastering 
// start for auth
Route::post('/new-login',[AuthController::class,'newLogin'])->name('new-login');
// end for auth
// start for jetstream liveware
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
    // start for user
    Route::controller(UserController::class)->group(function(){
        Route::get('/dashboard','dashboard')->name('dashboard');
        Route::get('/add-user','addUser','superadmin')->name('add-user');
        Route::post('/new-user','create','superadmin')->name('new-user');
        Route::get('/manage-user','manage','superadmin')->name('manage-user');
        Route::get('/edit-user/{id}','edit','superadmin')->name('edit-user');
        Route::post('/update-user/{id}','update','superadmin')->name('update-user');
        Route::get('/delete-user/{id}','delete','superadmin')->name('delete-user');
    });
    // end for user 

    // start for teacher 
    Route::controller(TeacherController::class)->group(function(){
        Route::get('/add-teacher','add')->name('add-teacher');
        Route::get('/manage-teacher','manage')->name('manage-teacher');
        Route::get('/manage-teacher/trash','trash')->name('manage-teacher-trash');
        Route::post('/new-teacher','create')->name('new-teacher');
        Route::get('/edit-teacher/{id}','edit')->name('edit-teacher');
        Route::post('/update-teacher/{id}','update')->name('update-teacher');
        Route::get('/delete-teacher/{id}','delete')->name('delete-teacher');
        Route::get('/force-delete-teacher/{id}','forceDelete')->name('force-delete-teacher');
        Route::get('/restore-teacher/{id}','restore')->name('restore-teacher');
    });
    // end for teacher 

    // start for login
    Route::get('/master-login',[LoginController::class,'mesterLogin'])->name('master-login');
    Route::post('new-login',[LoginController::class,'newLogin'])->name('new-login');
    Route::get('/teacher-dashboard',[TeacherDashboardController::class,'teacherDashboard'])->name('teacher-dashboard');
    // Route::post('/user-logout',[LoginController::class,'logout'])->name('user-logout');
    // end for login 
});
// end for jetstream liveware 

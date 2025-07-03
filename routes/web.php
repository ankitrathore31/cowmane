<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MsgController;
use App\Http\Controllers\UserController;


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
    return view('auth.login');
});

Route::get('/admin', function () {
    return view('admin.Dashboard');
})->middleware(['auth'])->name('admin');

Route::controller(AdminController::class)->group(function () {
    Route::get('admin/profile', 'viewprofile')->middleware('auth')->name('profile');
});


// User Controller

Route::get('/user', function () {
    return view('user.Dashboard');
})->middleware(['auth'])->name('user');

Route::controller(UserController::class)->group(function () {
    Route::get('admin/user-list', 'userlist')->middleware('auth')->name('user-list');
    Route::get('admin/add-user', 'adduser')->middleware('auth')->name('add-user');
    Route::post('admin/save-user', 'saveuser')->middleware('auth')->name('save-user');
    Route::get('admin/edit-user/{id}', 'edituser')->middleware('auth')->name('edit-user');
    Route::post('admin/update-user/{id}', 'updateuser')->middleware('auth')->name('update-user');
    Route::get('admin/change-password/{id}', 'changepassword')->middleware('auth')->name('change-password');
    Route::post('admin/update-password/{id}', 'updatepassword')->middleware('auth')->name('update-password');
    Route::get('admin/view-user/{id}', 'viewuser')->middleware('auth')->name('view-user');

});

Route::controller(MsgController::class)->group(function(){
    Route::get('admin/send-msg', 'msgpage')->middleware('auth')->name('send-msg');
});


require __DIR__.'/auth.php';

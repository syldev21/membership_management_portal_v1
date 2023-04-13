<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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


Route::get('/register', [\App\Http\Controllers\UserController::class, 'register']);
Route::get('/forgot', [\App\Http\Controllers\UserController::class, 'forgot']);
Route::get('/reset/{email}/{token}', [\App\Http\Controllers\UserController::class, 'reset'])->name('reset');

Route::post('/register', [\App\Http\Controllers\UserController::class, 'saveUser'])->name('auth.register');
Route::post('/login', [\App\Http\Controllers\UserController::class, 'loginUser'])->name('auth.login');
Route::get('/signin', function (){
    return view('dashboard.index');
});
Route::post('/forgot-password', [\App\Http\Controllers\UserController::class, 'forgotPassword'])->name('auth.forgot');
Route::post('/reset-password', [\App\Http\Controllers\UserController::class, 'resetPassword'])->name('auth.reset');

Route::group(['middleware'=>['LoginCheck']], function (){
    Route::get('/', [\App\Http\Controllers\UserController::class, 'index'])->name('register');
    Route::get('logout', [\App\Http\Controllers\UserController::class, 'logout'])->name('auth.logout');
    Route::get('/profile',[\App\Http\Controllers\UserController::class, 'profile'])->name('profile');
    Route::post('/profile-image', [\App\Http\Controllers\UserController::class, 'profileImageUpdate'])->name('profile.image');
    Route::post('/profile-edit', [\App\Http\Controllers\UserController::class, 'profileEdit'])->name('profile.edit');
    Route::post('/profile-update', [\App\Http\Controllers\UserController::class, 'profileUpdate'])->name('profile.update');
    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/main-church-members', [\App\Http\Controllers\Admin\DashboardController::class, 'churchMembers'])->name('members.index');
    Route::get('/members', [\App\Http\Controllers\Admin\DashboardController::class, 'members']);
    Route::post('delete-member', [\App\Http\Controllers\UserController::class, 'destroy'])->name('destroy');
    Route::post('deactivate-member', [\App\Http\Controllers\UserController::class, 'deactivate'])->name('deactivate');
    Route::post('/edit-member', [\App\Http\Controllers\UserController::class, 'profileUpdate'])->name('profile.admin_update');
    Route::post('/admin-add-member', [\App\Http\Controllers\Admin\DashboardController::class, 'adminRegisterMember'])->name('members.create');
});



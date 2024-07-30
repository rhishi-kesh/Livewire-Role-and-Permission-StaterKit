<?php

use App\Http\Controllers\auth\AdminController;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\dashboard\PermissionController;
use App\Http\Controllers\dashboard\RoleController;
use App\Http\Controllers\dashboard\SmtpController;
use App\Http\Controllers\dashboard\SystemInformationController;
use App\Http\Controllers\ErrorRedirectController;
use App\Http\Controllers\frontend\FrontendController;
use Illuminate\Support\Facades\Route;

//Frontend
Route::get('/', [FrontendController::class, 'index'])->name('index');

//Admin Auth
Route::get('/admin', [AdminController::class, 'adminLogin'])->name('adminLogin');
Route::post('/login-post', [AdminController::class, 'loginPost'])->name('loginPost');

// Error Redirect
Route::get('/404', [ErrorRedirectController::class, 'notFound'])->name('notFound');

//Dashboard
Route::group(['prefix'=>'admin', 'middleware' => ['auth']], function () {

    //Dashboard
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    //Admin
    Route::get('/register', [AdminController::class, 'register'])->name('register');
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::get('/edit-user/{id}', [AdminController::class, 'userEdit'])->name('userEdit');
    Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

    //Admin Profile
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');

    //System Information
    Route::get('/system-information', [SystemInformationController::class, 'systemInformation'])->name('systemInformation');

    //Roles & Permission
    Route::get('/roles', [RoleController::class, 'role'])->name('role');
    Route::get('/role-have-permission/{id}', [RoleController::class, 'roleHavePermission'])->name('roleHavePermission');
    Route::post('/permission-on-role-post', [RoleController::class, 'permissionOnRolePost'])->name('permissionOnRolePost');
    Route::get('/permission', [PermissionController::class, 'permission'])->name('permission');

    //SMTP Settings
    Route::get('/smtp-settings', [SmtpController::class, 'smtpSettings'])->name('smtpSettings');
});



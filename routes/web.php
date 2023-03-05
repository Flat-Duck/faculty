<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SpecializationController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\AdminsController;
use App\Http\Controllers\Admin\DecisionController;
use App\Http\Controllers\Admin\NoticeController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ReportController;

//use Auth;
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

//Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});

// Admin routes
Route::name('admin.')->prefix('admin')->group(function () {
    Route::namespace('Auth')->middleware('guest:admin')->group(function () {
        // Login
        Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
        Route::post('/', [LoginController::class, 'login']);
        
        // Forget and reset Password
        Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('forgot_password');
        Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail']);
        Route::get('password/reset/{token}/{email?}', [ResetPasswordController::class, 'showResetForm'])->name('reset_password_link');
        Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('reset_password');
   });

    // Logged in admin user required
    Route::group(['middleware' => 'auth:admin'], function () {
        // Dashboard
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::resource('admins', AdminsController::class);
        Route::resource('decisions', DecisionController::class);
        Route::get('members/this_month', [MemberController::class, 'this_month'])->name('members.this_month');
        Route::get('members/this_year', [MemberController::class, 'this_year'])->name('members.this_year');
        Route::post('members/import', [MemberController::class, 'import'])->name('bulk.import');
        Route::get('members/archive', [MemberController::class, 'archive'])->name('members.archive');
        Route::get('members/{member}/decisions/create', [DecisionController::class, 'create'])->name('decisions.create');
        Route::post('members/{member}/upload_cv', [MemberController::class, 'upload_cv'])->name('members.upload_cv');
        Route::post('members/{member}/upload_research', [MemberController::class, 'upload_research'])->name('members.upload_research');
        Route::resource('members', MemberController::class);
        Route::resource('profiles', ProfileController::class);
        Route::resource('specializations', SpecializationController::class);
        Route::resource('departments', DepartmentController::class);
        Route::resource('notices', NoticeController::class);
        Route::name('reports.')->prefix('reports')->group(function () {
            Route::get('/', [ReportController::class,'index'])->name('index');
            Route::get('/report', [ReportController::class,'report']);

            Route::post('/degree', [ReportController::class,'degree'])->name('degree');
            Route::post('/academic_degree', [ReportController::class,'academic_degree'])->name('academic_degree');
            Route::post('/department', [ReportController::class,'department'])->name('department');
            Route::post('/specialization', [ReportController::class,'specialization'])->name('specialization');
            Route::post('/dates', [ReportController::class,'dates'])->name('dates');
        });
        // Profile
        Route::get('/profile', [AdminController::class, 'profile'])->name('profile.show');
        Route::post('/profile', [AdminController::class, 'profileUpdate'])->name('profile.update');
        Route::post('/profile/avatar', [AdminController::class, 'avatarUpdate']);
        Route::post('/password', [AdminController::class, 'passwordUpdate'])->name('password_update');

        // Logout
        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    });
});
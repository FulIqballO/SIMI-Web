<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NavController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\TrainingController;
use App\Http\Controllers\Admin\ExamScoreController;
use App\Http\Controllers\Admin\TravelLogController;
use App\Http\Controllers\Admin\TRegistrationController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\TrainingScheduleController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::middleware(['auth:admin'])->prefix('admin')->group(function () {
//     Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
// });



Route::get('/', [AuthController::class, 'login_admin'])->name('login_admin');

Route::post('/ceklogin', [AuthController::class, 'ceklogin'])->name('ceklogin');


Route::middleware('auth:admin')->group(function() {
    Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin');
   
});

// Route::get('/dashboard', action: function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');



Route::resource('info_training', TrainingController::class);

Route::resource('job', JobController::class);

Route::resource('content', ContentController::class);

Route::resource('trainingschedule', TrainingScheduleController::class);

Route::resource('payment', PaymentController::class);

Route::resource('training_registration', TRegistrationController::class);

Route::resource('examscore', ExamScoreController::class);

Route::resource('informasi_perjalanan', TravelLogController::class);

// Route::get('/index', [ScheduleController::class, 'index'])->name('index');

Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');













// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';

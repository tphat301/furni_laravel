<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);
Route::get('/', [HomeController::class, 'index'])->name('home');


/*ADMIN*/
Route::prefix('admin')->group(function () {
  // Login
  Route::get('login', [LoginController::class, 'showLoginForm']);
  Route::post('login', [LoginController::class, 'login'])->name('admin.login');

  // Logout
  Route::post('logout', [LoginController::class, 'logout'])->name('admin.logout');
  Route::get('logout', [LoginController::class, 'logout']);

  // Password reset
  Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('admin.password.request');

  // Password sendmail
  Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('admin.password.email');

  // Password reset token
  Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');

  // Password update
  Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('admin.password.update');

  // Dashboard
  Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

  // Product
  Route::get('product', [ProductController::class, 'index'])->name('admin.product');
  Route::get('product/create', [ProductController::class, 'create'])->name('admin.product.create');
});

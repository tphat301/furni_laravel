<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProductController;

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'admin.auth']], function () {
  \UniSharp\LaravelFilemanager\Lfm::routes();
});

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

  // Product Admin
  Route::get('product', [ProductController::class, 'index'])->name('admin.product');
  Route::get('product/show/{id}', [ProductController::class, 'show'])->name('admin.product.show');
  Route::get('product/copy/{id}', [ProductController::class, 'copy'])->name('admin.product.copy');
  Route::get('product/create', [ProductController::class, 'create'])->name('admin.product.create');
  Route::post('product/save', [ProductController::class, 'save'])->name('admin.product.save');
  Route::get('product/destroy/{id}/{hash}', [ProductController::class, 'destroy'])->name('admin.product.destroy');
  Route::get('product/action', [ProductController::class, 'action'])->name('admin.product.action');

  // News Admin
  Route::get('news', [NewsController::class, 'index'])->name('admin.news');
  Route::get('news/create', [NewsController::class, 'create'])->name('admin.news.create');
  Route::get('news/show/{id}', [NewsController::class, 'show'])->name('admin.news.show');

  // Post Admin
  Route::get('criteria', [PostController::class, 'criteriaIndex'])->name('admin.criteria.index');
  Route::get('criteria/create', [PostController::class, 'criteriaCreate'])->name('admin.criteria.create');
  Route::get('policy', [PostController::class, 'policyIndex'])->name('admin.policy.index');
  Route::get('policy/create', [PostController::class, 'policyCreate'])->name('admin.policy.create');
});

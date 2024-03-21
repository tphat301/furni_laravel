<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\CategoryNews1;
use App\Http\Controllers\Admin\CategoryNews2;
use App\Http\Controllers\Admin\CategoryNews3;
use App\Http\Controllers\Admin\CategoryNews4;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryProduct1;
use App\Http\Controllers\Admin\CategoryProduct2;
use App\Http\Controllers\Admin\CategoryProduct3;
use App\Http\Controllers\Admin\CategoryProduct4;

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
  Route::get('product/update_number', [ProductController::class, 'updateNumber'])->name('admin.product.update_number');
  Route::get('product/update_status', [ProductController::class, 'updateStatus'])->name('admin.product.update_status');
  Route::get('product/destroy', [ProductController::class, 'destroy'])->name('admin.product.destroy');
  Route::get('product/delete_photo/{id}/{action}', [ProductController::class, 'deletePhoto'])->name('admin.product.delete_photo');
  Route::get('product/gallery/delete/{id}/{photo}', [ProductController::class, 'deleteGallery'])->name('admin.product.gallery.delete');
  Route::delete('product/delete/{id}/{hash}', [ProductController::class, 'delete'])->name('admin.product.delete');
  Route::post('product/save', [ProductController::class, 'save'])->name('admin.product.save');
  Route::post('product/schema/{id}', [ProductController::class, 'schema'])->name('admin.product.schema');
  Route::post('product/filter_category', [ProductController::class, 'filterCategory'])->name('admin.product.filter_category');
  Route::post('product/gallery/{id}', [ProductController::class, 'gallery'])->name('admin.product.gallery');
  Route::post('product/gallery/title/{id}', [ProductController::class, 'galleryTitle'])->name('admin.product.gallery.title');
  Route::post('product/gallery/number/{id}', [ProductController::class, 'galleryNumber'])->name('admin.product.gallery.number');
  Route::put('product/update/{id}', [ProductController::class, 'update'])->name('admin.product.update');

  // Category level 1 product admin
  Route::get('category_product1', [CategoryProduct1::class, 'index'])->name('admin.category_product1');
  Route::get('category_product1/show/{id}', [CategoryProduct1::class, 'show'])->name('admin.category_product1.show');
  Route::get('category_product1/copy/{id}', [CategoryProduct1::class, 'copy'])->name('admin.category_product1.copy');
  Route::get('category_product1/create', [CategoryProduct1::class, 'create'])->name('admin.category_product1.create');
  Route::get('category_product1/update_number', [CategoryProduct1::class, 'updateNumber'])->name('admin.category_product1.update_number');
  Route::get('category_product1/update_status', [CategoryProduct1::class, 'updateStatus'])->name('admin.category_product1.update_status');
  Route::get('category_product1/destroy', [CategoryProduct1::class, 'destroy'])->name('admin.category_product1.destroy');
  Route::get('category_product1/delete_photo/{id}/{action}', [CategoryProduct1::class, 'deletePhoto'])->name('admin.category_product1.delete_photo');
  Route::delete('category_product1/delete/{id}/{hash}', [CategoryProduct1::class, 'delete'])->name('admin.category_product1.delete');
  Route::post('category_product1/save', [CategoryProduct1::class, 'save'])->name('admin.category_product1.save');
  Route::put('category_product1/update/{id}', [CategoryProduct1::class, 'update'])->name('admin.category_product1.update');

  // Category level 2 product admin
  Route::get('category_product2', [CategoryProduct2::class, 'index'])->name('admin.category_product2');
  Route::get('category_product2/show/{id}', [CategoryProduct2::class, 'show'])->name('admin.category_product2.show');
  Route::get('category_product2/copy/{id}', [CategoryProduct2::class, 'copy'])->name('admin.category_product2.copy');
  Route::get('category_product2/create', [CategoryProduct2::class, 'create'])->name('admin.category_product2.create');
  Route::get('category_product2/update_number', [CategoryProduct2::class, 'updateNumber'])->name('admin.category_product2.update_number');
  Route::get('category_product2/update_status', [CategoryProduct2::class, 'updateStatus'])->name('admin.category_product2.update_status');
  Route::get('category_product2/destroy', [CategoryProduct2::class, 'destroy'])->name('admin.category_product2.destroy');
  Route::get('category_product2/delete_photo/{id}/{action}', [CategoryProduct2::class, 'deletePhoto'])->name('admin.category_product2.delete_photo');
  Route::delete('category_product2/delete/{id}/{hash}', [CategoryProduct2::class, 'delete'])->name('admin.category_product2.delete');
  Route::post('category_product2/save', [CategoryProduct2::class, 'save'])->name('admin.category_product2.save');
  Route::put('category_product2/update/{id}', [CategoryProduct2::class, 'update'])->name('admin.category_product2.update');

  // Category level 3 product admin
  Route::get('category_product3', [CategoryProduct3::class, 'index'])->name('admin.category_product3');
  Route::get('category_product3/show/{id}', [CategoryProduct3::class, 'show'])->name('admin.category_product3.show');
  Route::get('category_product3/copy/{id}', [CategoryProduct3::class, 'copy'])->name('admin.category_product3.copy');
  Route::get('category_product3/create', [CategoryProduct3::class, 'create'])->name('admin.category_product3.create');
  Route::get('category_product3/update_number', [CategoryProduct3::class, 'updateNumber'])->name('admin.category_product3.update_number');
  Route::get('category_product3/update_status', [CategoryProduct3::class, 'updateStatus'])->name('admin.category_product3.update_status');
  Route::get('category_product3/destroy', [CategoryProduct3::class, 'destroy'])->name('admin.category_product3.destroy');
  Route::get('category_product3/delete_photo/{id}/{action}', [CategoryProduct3::class, 'deletePhoto'])->name('admin.category_product3.delete_photo');
  Route::delete('category_product3/delete/{id}/{hash}', [CategoryProduct3::class, 'delete'])->name('admin.category_product3.delete');
  Route::post('category_product3/save', [CategoryProduct3::class, 'save'])->name('admin.category_product3.save');
  Route::put('category_product3/update/{id}', [CategoryProduct3::class, 'update'])->name('admin.category_product3.update');

  // Category level 4 product admin
  Route::get('category_product4', [CategoryProduct4::class, 'index'])->name('admin.category_product4');
  Route::get('category_product4/show/{id}', [CategoryProduct4::class, 'show'])->name('admin.category_product4.show');
  Route::get('category_product4/copy/{id}', [CategoryProduct4::class, 'copy'])->name('admin.category_product4.copy');
  Route::get('category_product4/create', [CategoryProduct4::class, 'create'])->name('admin.category_product4.create');
  Route::get('category_product4/update_number', [CategoryProduct4::class, 'updateNumber'])->name('admin.category_product4.update_number');
  Route::get('category_product4/update_status', [CategoryProduct4::class, 'updateStatus'])->name('admin.category_product4.update_status');
  Route::get('category_product4/destroy', [CategoryProduct4::class, 'destroy'])->name('admin.category_product4.destroy');
  Route::get('category_product4/delete_photo/{id}/{action}', [CategoryProduct4::class, 'deletePhoto'])->name('admin.category_product4.delete_photo');
  Route::delete('category_product4/delete/{id}/{hash}', [CategoryProduct4::class, 'delete'])->name('admin.category_product4.delete');
  Route::post('category_product4/save', [CategoryProduct4::class, 'save'])->name('admin.category_product4.save');
  Route::put('category_product4/update/{id}', [CategoryProduct4::class, 'update'])->name('admin.category_product4.update');

  // News Admin
  Route::get('news', [NewsController::class, 'index'])->name('admin.news');
  Route::get('news/show/{id}', [NewsController::class, 'show'])->name('admin.news.show');
  Route::get('news/copy/{id}', [NewsController::class, 'copy'])->name('admin.news.copy');
  Route::get('news/create', [NewsController::class, 'create'])->name('admin.news.create');
  Route::get('news/update_number', [NewsController::class, 'updateNumber'])->name('admin.news.update_number');
  Route::get('news/update_status', [NewsController::class, 'updateStatus'])->name('admin.news.update_status');
  Route::get('news/destroy', [NewsController::class, 'destroy'])->name('admin.news.destroy');
  Route::get('news/delete_photo/{id}/{action}', [NewsController::class, 'deletePhoto'])->name('admin.news.delete_photo');
  Route::get('news/gallery/delete/{id}/{photo}', [NewsController::class, 'deleteGallery'])->name('admin.news.gallery.delete');
  Route::delete('news/delete/{id}/{hash}', [NewsController::class, 'delete'])->name('admin.news.delete');
  Route::post('news/save', [NewsController::class, 'save'])->name('admin.news.save');
  Route::post('news/schema/{id}', [NewsController::class, 'schema'])->name('admin.news.schema');
  Route::post('news/filter_category', [NewsController::class, 'filterCategory'])->name('admin.news.filter_category');
  Route::post('news/gallery/{id}', [NewsController::class, 'gallery'])->name('admin.news.gallery');
  Route::post('news/gallery/title/{id}', [NewsController::class, 'galleryTitle'])->name('admin.news.gallery.title');
  Route::post('news/gallery/number/{id}', [NewsController::class, 'galleryNumber'])->name('admin.news.gallery.number');
  Route::put('news/update/{id}', [NewsController::class, 'update'])->name('admin.news.update');

  // Category level 1 news admin
  Route::get('category_news1', [CategoryNews1::class, 'index'])->name('admin.category_news1');
  Route::get('category_news1/show/{id}', [CategoryNews1::class, 'show'])->name('admin.category_news1.show');
  Route::get('category_news1/copy/{id}', [CategoryNews1::class, 'copy'])->name('admin.category_news1.copy');
  Route::get('category_news1/create', [CategoryNews1::class, 'create'])->name('admin.category_news1.create');
  Route::get('category_news1/update_number', [CategoryNews1::class, 'updateNumber'])->name('admin.category_news1.update_number');
  Route::get('category_news1/update_status', [CategoryNews1::class, 'updateStatus'])->name('admin.category_news1.update_status');
  Route::get('category_news1/destroy', [CategoryNews1::class, 'destroy'])->name('admin.category_news1.destroy');
  Route::get('category_news1/delete_photo/{id}/{action}', [CategoryNews1::class, 'deletePhoto'])->name('admin.category_news1.delete_photo');
  Route::delete('category_news1/delete/{id}/{hash}', [CategoryNews1::class, 'delete'])->name('admin.category_news1.delete');
  Route::post('category_news1/save', [CategoryNews1::class, 'save'])->name('admin.category_news1.save');
  Route::put('category_news1/update/{id}', [CategoryNews1::class, 'update'])->name('admin.category_news1.update');

  // Category level 2 news admin
  Route::get('category_news2', [CategoryNews2::class, 'index'])->name('admin.category_news2');
  Route::get('category_news2/show/{id}', [CategoryNews2::class, 'show'])->name('admin.category_news2.show');
  Route::get('category_news2/copy/{id}', [CategoryNews2::class, 'copy'])->name('admin.category_news2.copy');
  Route::get('category_news2/create', [CategoryNews2::class, 'create'])->name('admin.category_news2.create');
  Route::get('category_news2/update_number', [CategoryNews2::class, 'updateNumber'])->name('admin.category_news2.update_number');
  Route::get('category_news2/update_status', [CategoryNews2::class, 'updateStatus'])->name('admin.category_news2.update_status');
  Route::get('category_news2/destroy', [CategoryNews2::class, 'destroy'])->name('admin.category_news2.destroy');
  Route::get('category_news2/delete_photo/{id}/{action}', [CategoryNews2::class, 'deletePhoto'])->name('admin.category_news2.delete_photo');
  Route::delete('category_news2/delete/{id}/{hash}', [CategoryNews2::class, 'delete'])->name('admin.category_news2.delete');
  Route::post('category_news2/save', [CategoryNews2::class, 'save'])->name('admin.category_news2.save');
  Route::put('category_news2/update/{id}', [CategoryNews2::class, 'update'])->name('admin.category_news2.update');

  // Category level 3 news admin
  Route::get('category_news3', [CategoryNews3::class, 'index'])->name('admin.category_news3');
  Route::get('category_news3/show/{id}', [CategoryNews3::class, 'show'])->name('admin.category_news3.show');
  Route::get('category_news3/copy/{id}', [CategoryNews3::class, 'copy'])->name('admin.category_news3.copy');
  Route::get('category_news3/create', [CategoryNews3::class, 'create'])->name('admin.category_news3.create');
  Route::get('category_news3/update_number', [CategoryNews3::class, 'updateNumber'])->name('admin.category_news3.update_number');
  Route::get('category_news3/update_status', [CategoryNews3::class, 'updateStatus'])->name('admin.category_news3.update_status');
  Route::get('category_news3/destroy', [CategoryNews3::class, 'destroy'])->name('admin.category_news3.destroy');
  Route::get('category_news3/delete_photo/{id}/{action}', [CategoryNews3::class, 'deletePhoto'])->name('admin.category_news3.delete_photo');
  Route::delete('category_news3/delete/{id}/{hash}', [CategoryNews3::class, 'delete'])->name('admin.category_news3.delete');
  Route::post('category_news3/save', [CategoryNews3::class, 'save'])->name('admin.category_news3.save');
  Route::put('category_news3/update/{id}', [CategoryNews3::class, 'update'])->name('admin.category_news3.update');

  // Category level 4 news admin
  Route::get('category_news4', [CategoryNews4::class, 'index'])->name('admin.category_news4');
  Route::get('category_news4/show/{id}', [CategoryNews4::class, 'show'])->name('admin.category_news4.show');
  Route::get('category_news4/copy/{id}', [CategoryNews4::class, 'copy'])->name('admin.category_news4.copy');
  Route::get('category_news4/create', [CategoryNews4::class, 'create'])->name('admin.category_news4.create');
  Route::get('category_news4/update_number', [CategoryNews4::class, 'updateNumber'])->name('admin.category_news4.update_number');
  Route::get('category_news4/update_status', [CategoryNews4::class, 'updateStatus'])->name('admin.category_news4.update_status');
  Route::get('category_news4/destroy', [CategoryNews4::class, 'destroy'])->name('admin.category_news4.destroy');
  Route::get('category_news4/delete_photo/{id}/{action}', [CategoryNews4::class, 'deletePhoto'])->name('admin.category_news4.delete_photo');
  Route::delete('category_news4/delete/{id}/{hash}', [CategoryNews4::class, 'delete'])->name('admin.category_news4.delete');
  Route::post('category_news4/save', [CategoryNews4::class, 'save'])->name('admin.category_news4.save');
  Route::put('category_news4/update/{id}', [CategoryNews4::class, 'update'])->name('admin.category_news4.update');

  // Post Admin
  Route::get('criteria', [PostController::class, 'criteriaIndex'])->name('admin.criteria.index');
  Route::get('criteria/create', [PostController::class, 'criteriaCreate'])->name('admin.criteria.create');
  Route::get('policy', [PostController::class, 'policyIndex'])->name('admin.policy.index');
  Route::get('policy/create', [PostController::class, 'policyCreate'])->name('admin.policy.create');
});

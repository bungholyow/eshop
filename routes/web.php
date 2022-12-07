<?php


use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

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
    return view('welcome');
});

Route::get('/401', function () {
    return view('401');
});

Route::get('/dashboard', function () {
    return view('auth.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', [AdminController::class, 'admin'])->middleware('role:admin')->name('admin');


    //banner sectione
    Route::resource('/banner', BannerController::class);
    Route::post('/banner_status', [BannerController::class, 'bannerStatus'])->name('banner.status');

    //kategori section
    Route::resource('/category', CategoryController::class);
    Route::post('/category_status', [CategoryController::class, 'categoryStatus'])->name('category.status');

    //merek section
    Route::resource('/brand', BrandController::class);
    Route::post('/brand_status', [BrandController::class, 'brandStatus'])->name('brand.status');

    //produk section
    Route::resource('/product', ProductController::class);
    Route::post('/product_status', [ProductController::class, 'productStatus'])->name('product.status');
});

Route::group(['prefix' => 'vendor', 'middleware' => 'auth'], function () {
    Route::get('/', [App\Http\Controllers\VendorController::class, 'vendor'])->middleware('role:vendor')->name('vendor');
});









require __DIR__ . '/auth.php';

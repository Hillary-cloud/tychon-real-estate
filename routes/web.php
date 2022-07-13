<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\LocationController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('index');
})->middleware(['auth'])->name('/');

Route::get('/', [HomeController::class, 'index'])->name('/');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/buy-property', [HomeController::class, 'buy'])->name('buy');
Route::get('/rent-property', [HomeController::class, 'rent'])->name('rent');
Route::get('/property', [HomeController::class, 'allProperties'])->name('all-properties');
Route::get('/agent', [HomeController::class, 'agent'])->name('agent');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/property-detail', [HomeController::class, 'propertyDetail'])->name('property-detail');

//admin/controller

Route::middleware(['auth'])->group(function () {
    //category
    Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categories');
    Route::get('/admin/category/add', [CategoryController::class, 'create'])->name('admin.addCategory');
    Route::post('/admin/category/add', [CategoryController::class, 'storeCategory'])->name('admin.storeCategory');
    Route::get('/admin/category/edit/{id}', [CategoryController::class, 'editCategory'])->name('admin.editCategory');
    Route::put('/admin/category/edit/{id}', [CategoryController::class, 'updateCategory'])->name('admin.updateCategory');
    Route::get('/admin/category/delete/{id}', [CategoryController::class, 'deleteCategory'])->name('admin.deleteCategory');

    //location
    Route::get('/admin/locations', [LocationController::class, 'index'])->name('admin.locations');
    Route::get('/admin/location/add', [LocationController::class, 'create'])->name('admin.addLocation');
    Route::post('/admin/location/add', [LocationController::class, 'storeLocation'])->name('admin.storeLocation');
    Route::get('/admin/location/edit/{id}', [LocationController::class, 'editLocation'])->name('admin.editLocation');
    Route::put('/admin/location/edit/{id}', [LocationController::class, 'updateLocation'])->name('admin.updateLocation');
    Route::get('/admin/location/delete/{id}', [LocationController::class, 'deleteLocation'])->name('admin.deleteLocation');
});


require __DIR__.'/auth.php';

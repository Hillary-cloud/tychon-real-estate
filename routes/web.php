<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\CategoryController;

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

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categories');
});


require __DIR__.'/auth.php';

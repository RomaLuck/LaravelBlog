<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PagesController::class, 'index'])->name('welcome');
Route::resource('posts', PagesController::class);

Route::middleware(['auth', 'verified', 'moderator'])->group(function () {
    Route::get('/admin', [AdminController::class, 'showMain'])->name('dashboard');
    Route::get('/admin/posts', [AdminController::class, 'showPosts']);
    Route::resource('/admin/categories', CategoryController::class);
});

Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::resource('/admin/users', AdminController::class);
    Route::put('/admin/{user}/attach', [AdminController::class, 'attach'])->name('user.attach');
    Route::put('/admin/{user}/detach', [AdminController::class, 'detach'])->name('user.detach');
    Route::resource('/admin/roles', RoleController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/admin/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/admin/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/admin/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

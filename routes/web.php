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

Route::middleware('auth')->group(function () {
    Route::prefix('/admin')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::middleware(['verified'])->group(function () {
            Route::middleware(['moderator'])->group(function () {
                Route::get('', [AdminController::class, 'showMain'])->name('dashboard');
                Route::get('/posts', [AdminController::class, 'showPosts']);
                Route::delete('/posts/delete', [AdminController::class, 'deleteAll']);
                Route::resource('/categories', CategoryController::class);
            });

            Route::middleware(['admin'])->group(function () {
                Route::resource('/users', AdminController::class);
                Route::put('/{user}/attach', [AdminController::class, 'attach'])->name('user.attach');
                Route::put('/{user}/detach', [AdminController::class, 'detach'])->name('user.detach');
                Route::resource('/roles', RoleController::class);
            });
        });
    });
});

require __DIR__ . '/auth.php';

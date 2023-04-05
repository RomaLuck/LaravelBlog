<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PagesController::class,'index'])->name('welcome');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin', [AdminController::class,'showMain'])->name('dashboard');
    Route::get('/admin/posts', [AdminController::class,'showPosts']);
    Route::resource('/admin/users', AdminController::class);
    Route::put('/admin/{user}/attach', [AdminController::class, 'attach'])->name('user.attach');
    Route::put('/admin/{user}/detach', [AdminController::class, 'detach'])->name('user.detach');
});

Route::middleware('auth')->group(function () {
    Route::get('/admin/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/admin/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/admin/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('posts',PagesController::class);

require __DIR__.'/auth.php';

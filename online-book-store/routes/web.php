<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OnlineBookController;
use App\Http\Controllers\AdminController;

// ================== Public Pages ==================

// Home page
Route::get('/', [OnlineBookController::class, 'home'])->name('home');

// Book listing
Route::get('/books', [OnlineBookController::class, 'index'])->name('books.index');

// Book details
Route::get('/books/{id}', [OnlineBookController::class, 'show'])->name('books.show');


// ================== Admin Pages ==================

// Admin login form
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');

// Admin login submit
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');

// Admin dashboard (after login)
Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');

// Admin CRUD for books
Route::get('/admin/books/create', [OnlineBookController::class, 'create'])->name('books.create');
Route::post('/admin/books', [OnlineBookController::class, 'store'])->name('books.store');
Route::get('/admin/books/{id}/edit', [OnlineBookController::class, 'edit'])->name('books.edit');
Route::put('/admin/books/{id}', [OnlineBookController::class, 'update'])->name('books.update');
Route::delete('/admin/books/{id}', [OnlineBookController::class, 'destroy'])->name('books.destroy');

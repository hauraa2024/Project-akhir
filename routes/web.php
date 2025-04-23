<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\PengeluaranController;

// Halaman utama menampilkan daftar produk
Route::get('/', [ProductController::class, 'index']);

// Resource routes untuk manajemen produk dan karyawan
Route::resource('products', ProductController::class);
Route::resource('employees', EmployeeController::class);

// Resource routes untuk tasks
Route::resource('tasks', TasksController::class);

// Resource routes untuk pengeluaran (menggantikan rute tunggal sebelumnya)
Route::resource('pengeluaran', PengeluaranController::class);

<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('home', [PostController::class, 'create'])->name('home');
Route::post('store', [PostController::class, 'store'])->name('create');
Route::get('delete/{id}', [PostController::class, 'destroy'])->name('delete');
Route::get('show/{id}', [PostController::class, 'show'])->name('show');
Route::get('edit/{id}', [PostController::class, 'edit'])->name('edit');
Route::post('update', [PostController::class, 'updatePost'])->name('updatePost');

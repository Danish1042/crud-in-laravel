<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', [StudentController::class, 'index'])->name('student.index');
Route::post('store', [StudentController::class, 'store'])->name('student.insert');
Route::get('{id}/edit', [StudentController::class, 'edit'])->name('student.edit');
Route::put('{id}/update', [StudentController::class, 'update'])->name('student.update');
Route::get('{id}/destroy', [StudentController::class, 'destroy'])->name('student.destroy');

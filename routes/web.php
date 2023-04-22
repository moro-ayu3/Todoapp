<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => ['auth']], function () {
  Route::get('/', [TodoController::class, 'index'])->name('todo.index');
  Route::post('/todo/create', [TodoController::class, 'create'])->name('todo.create');
  Route::post('/todo/update', [TodoController::class, 'update'])->name('todo.update');
  Route::post('/todo/delete', [TodoController::class, 'delete'])->name('todo.delete');
  Route::get('/todo/find', [TodoController::class, 'find'])->name('todo.find');
  Route::get('/todo/search', [TodoController::class, 'search'])->name('todo.search');
});

require __DIR__.'/auth.php';

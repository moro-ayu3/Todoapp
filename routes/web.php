<?php

use Illuminate\Support\Facades\Route;

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

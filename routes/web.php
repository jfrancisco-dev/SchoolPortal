<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskListController;
use App\Http\Controllers\TaskController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['auth'])->group(function() {
    //show tasklist
    Route::get('/tasklist', [TaskListController::class, 'index'])->name('tasklist.index');
    //create and store tasklist
    Route::get('/tasklist/create', [TaskListController::class, 'create'])->name('tasklist.create');
    Route::post('/tasklist/store', [TaskListController::class, 'store'])->name('tasklist.store');
    //view specific tasklist
    Route::get('/tasklist/{tasklist}', [TaskListController::class, 'show'])->name('tasklist.show');
    //edit amd update specific tasklist
    Route::get('/tasklist/{tasklist}/edit', [TaskListController::class, 'edit'])->name('tasklist.edit');
    Route::post('/tasklist/store', [TaskListController::class, 'update'])->name('tasklist.update');
    //delete specific tasklist
    Route::delete('/tasklist/{tasklist}/delete', [TaskListController::class, 'destroy'])->name('tasklist.delete');


     //show task
     Route::get('/task', [TaskController::class, 'index'])->name('task.index');
     //create and store task
     Route::get('/task/create', [TaskController::class, 'create'])->name('task.create');
     Route::post('/task/store', [TaskController::class, 'store'])->name('task.store');
     //view specific task
     Route::get('/task/{task}', [TaskController::class, 'show'])->name('task.show');
     //edit amd update specific task
     Route::get('/task/{task}/edit', [TaskController::class, 'edit'])->name('task.edit');
     Route::post('/task/store', [TaskController::class, 'update'])->name('task.update');
     //delete specific task
     Route::delete('/task/{task}/delete', [TaskController::class, 'destroy'])->name('task.delete');
});

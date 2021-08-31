<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TodoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('auth/login', [AuthController::class, 'login'])->name('auth.login');

Route::middleware('auth:sanctum')->group(function(){

    // User
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    // Todo
    Route::get('/todo', [TodoController::class, 'index'])->name('todo.index');
    Route::get('/todo/{id}', [TodoController::class, 'show'])->name('todo.show')->whereNumber('id');
    Route::post('/todo', [TodoController::class, 'store'])->name('todo.store');
    Route::put('/todo/{id}', [TodoController::class, 'update'])->name('todo.update')->whereNumber('id');
    Route::delete('/todo/{id}', [TodoController::class, 'delete'])->name('todo.delete')->whereNumber('id');
});

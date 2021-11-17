<?php

use App\Http\Controllers\TodosController;
use Illuminate\Support\Facades\Route;


Route::get('/', function() {
    return redirect('/login');
});

Route::post('/todo', [TodosController::class, "create"])->name('createTodo');


Route::get('/todo/{id}', [TodosController::class, "edit"]);


Route::get('/complete/{id}', [TodosController::class, "complete"])->name('complete');


Route::get('/delete/{id}', [TodosController::class, "delete"])->name('delete');

Route::post('/todo/{id}', [TodosController::class, "update"])->name('update');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

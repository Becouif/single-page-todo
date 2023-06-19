<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',function(){
    return redirect()->route('todo.create');
});
Route::get('/todo',[TodoController::class, 'create'])->name('todo.create');
Route::post('/todo',[TodoController::class, 'store'])->name('todo.store');
Route::get('todo/edit/{id}',[TodoController::class, 'edit'])->name('todo.edit');
Route::put('todo/edit/{id}',[TodoController::class, 'update'])->name('todo.update');
Route::delete('/todo/{id}/delete',[TodoController::class, 'destroy'])->name('todo.destroy');


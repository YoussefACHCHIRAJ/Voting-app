<?php

use App\Http\Controllers\ExerciceController;
use App\Http\Middleware\EnsureIsAdmin;
use App\Livewire\CreateExercice;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ExerciceController::class, 'index'])->name('exercice.index');
Route::get('/exercices/{exercice:slug}', [ExerciceController::class, 'show'])->name('exercice.show');
Route::get('/create/exercice', CreateExercice::class)->name('exercice.create')->middleware(EnsureIsAdmin::class);


require __DIR__.'/auth.php';

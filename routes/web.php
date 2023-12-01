<?php

use App\Http\Controllers\ExerciceController;
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


require __DIR__.'/auth.php';

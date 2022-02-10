<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistroController;

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
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/registro', [RegistroController::class, 'store'])->name('create');

Route::post('/registro', [RegistroController::class, 'create'])
->name('registro');

Route::get('/consulta', [RegistroController::class, 'query'])
->name('consulta');

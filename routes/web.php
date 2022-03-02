<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\Catalogos\PerfilController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/registro', [RegistroController::class, 'store'])->name('create');

Route::middleware(['auth:sanctum', 'verified'])->post('/registro', [RegistroController::class, 'create'])
->name('registro');

Route::middleware(['auth:sanctum', 'verified'])->get('/consulta', [RegistroController::class, 'query'])
->name('consulta');

Route::middleware(['auth:sanctum', 'verified'])->post('/consulta', [RegistroController::class, 'delete'])
->name('borrar');

Route::middleware(['auth:sanctum', 'verified'])->get('/editar', [RegistroController::class, 'edit'])
->name('editar');

Route::middleware(['auth:sanctum', 'verified'])->post('/editar', [RegistroController::class, 'updateProfile'])
->name('actualizarPerfil');

Route::middleware(['auth:sanctum', 'verified'])->get('/consulta-perfil', [PerfilController::class, 'query'])
->name('consultaPefil');

Route::middleware(['auth:sanctum', 'verified'])->post('/registro-perfil', [PerfilController::class, 'create'])
->name('registroPerfil');

Route::middleware(['auth:sanctum', 'verified'])->get('/registro-perfil', [PerfilController::class, 'store'])
->name('createPerfil');

Route::middleware(['auth:sanctum', 'verified'])->post('/consulta-perfil', [PerfilController::class, 'delete'])
->name('borrarPerfil');

Route::middleware(['auth:sanctum', 'verified'])->get('/editar-perfil', [PerfilController::class, 'edit'])
->name('editarPerfil');

Route::middleware(['auth:sanctum', 'verified'])->post('/editar-perfil', [PerfilController::class, 'updateProfile'])
->name('actualizaPerfil');

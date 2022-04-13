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
Route::get('/', [\App\Http\controllers\Auth\AuthenticatedSessionController::class, 'create'])->name('auth.login');
Route::get('/', [\App\Http\controllers\UsuarioController::class, 'index'])->name('index');
Route::get('/index', [\App\Http\controllers\UsuarioController::class, 'index'])->middleware(['auth'])->name('index');
Route::get('/desenvolvedor/{id}', [\App\Http\controllers\UsuarioController::class, 'desenvolvedor'])->name('desenvolvedor');

Route::middleware('acesso')->group(function(){
    Route::get('/cadastro', [\App\Http\controllers\UsuarioController::class, 'indexCadastro'])->name('usuario.index');
    Route::post('/cadastro', [\App\Http\controllers\UsuarioController::class, 'cadastro'])->name('usuario.cadastro');
});

Route::fallback(function(){
    Route::get('/fallback');
});

require __DIR__.'/auth.php';

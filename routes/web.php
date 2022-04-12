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

Route::middleware('acesso')->group(function(){
    Route::get('/cadastro', [\App\Http\controllers\UsuarioController::class, 'index'])->name('usuario.index');
    Route::post('/cadastro', [\App\Http\controllers\UsuarioController::class, 'cadastro'])->name('usuario.cadastro');
});


Route::fallback(function(){
    Route::get('/fallback');
});

Route::get('/index', function () {
    return view('site.index');
})->middleware(['auth'])->name('index');

require __DIR__.'/auth.php';

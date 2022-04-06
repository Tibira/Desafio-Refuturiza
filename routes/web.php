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

Route::get('/', [\App\Http\controllers\PrincipalController::class, 'index'])->name('site.index');

Route::get('/login', [\App\Http\controllers\LoginController::class, 'index'])->name('site.login');
Route::post('/login', [\App\Http\controllers\LoginController::class, 'autenticar'])->name('site.login');



Route::prefix('/app')->group(function(){

});

Route::fallback(function(){
    Route::get('/fallback', );
});

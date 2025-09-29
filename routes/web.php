<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompraController;

Route::get('/', function () {
    return view('welcome');
})
->name('welcome')
->middleware('guest');

//-----------------------------------------------------------------


Route::get('/cadastro',[UsuarioController::class,'create'])
->name('cadastro')
->middleware('guest');

Route::post('/cadastro',[UsuarioController::class,'store'])
->name('cadastro.store')
->middleware('guest');

Route::get('/login',[AuthController::class,'index'])
->name('login')
->middleware('guest');

Route::post('/login',[AuthController::class,'loginAttempt'])
->name('auth')
->middleware('guest');

Route::post('/logout',[AuthController::class,'logout'])->name('logout');




//-----------------------------------------------------------------

Route::middleware(['auth'])->group(function () {

    Route::get('/home', [UsuarioController::class, 'show'])->name('home');


    Route::get('/update', function () {
        return view('usuario/update');
    })->name('update');

    Route::get('/createCompra', [CompraController::class, 'create'])->name('createCompra');

    Route::post('/createCompra', [CompraController::class, 'store'])->name('createCompra.store');

    Route::get('/compra/{id}', [CompraController::class, 'show'])->name('perfilCompra');
    Route::put('/{id}', [CompraController::class, 'update'])->name('atualizarCompra');

    Route::get('/indexCompra', [CompraController::class, 'index'])->name('indexCompra');

    Route::get('/dashboards', [UsuarioController::class, 'relatorio'])->name('dashboards');

    Route::get('/perfil',[UsuarioController::class,'showPerfil'])->name('perfil');
    Route::put('/', [UsuarioController::class, 'update'])->name('perfilUpdate');



});


<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

//-----------------------------------------------------------------

Route::get('/login', function () {
    return view('credenciamento/login');
})->name("login");

Route::get('/cadastro',[UsuarioController::class,'create'])->name('cadastro');

Route::post('/cadastro',[UsuarioController::class,'store'])->name('cadastro.store');

//-----------------------------------------------------------------

Route::get('/home', function () {
    return view('usuario/home');
})->name('usuario');

Route::get('/update', function () {
    return view('usuario/update');
})->name('update');



Route::get('/createCompra',function (){
    return view('usuario/createCompra');
})->name("createCompra");

Route::get('/indexCompra',function (){
    return view('usuario/indexCompra');
})->name("IndexCompra");

Route::get('/dashboards',function (){
    return view('usuario/dashboards');
})->name("dashboards");


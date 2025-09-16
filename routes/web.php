<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//-----------------------------------------------------------------

Route::get('/login', function () {
    return view('credenciamento/login');
})->name("login");

Route::get('/cadastro', function () {
    return view('credenciamento/cadastro');
})->name('cadastro');

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



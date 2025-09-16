<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('credenciamento/login');
})->name("login");

Route::get('/cadastro', function () {
    return view('credenciamento/cadastro');
})->name('cadastro');

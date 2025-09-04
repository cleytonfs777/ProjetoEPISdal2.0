<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/ciurb', function () {
    return view('welcome');
})->name('ciurb');

Route::get('/multimissao', function () {
    return view('welcome');
})->name('multimissao');

Route::get('/salvamento', function () {
    return view('welcome');
})->name('salvamento');

Route::get('/motorresgate', function () {
    return view('welcome');
})->name('motorresgate');

Route::get('/criaplano', function () {
    return view('welcome');
})->name('criaplano');

Route::get('/create_user_and_epis', function () {
    return view('welcome');
})->name('create_user_and_epis');

Route::get('/listar_usuarios', function () {
    return view('welcome');
})->name('listar_usuarios');

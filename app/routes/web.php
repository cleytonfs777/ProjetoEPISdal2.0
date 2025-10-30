<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EpiController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Rotas de autenticação
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Rotas de EPIs
Route::get('/ciurb', [EpiController::class, 'ciurb'])->name('ciurb');
Route::post('/ciurb/update', [EpiController::class, 'updateCiurb'])->name('ciurb.update');

Route::get('/multimissao', [EpiController::class, 'multimissao'])->name('multimissao');
Route::post('/multimissao/update', [EpiController::class, 'updateMultimissao'])->name('multimissao.update');

Route::get('/salvamento', [EpiController::class, 'salvamento'])->name('salvamento');
Route::post('/salvamento/update', [EpiController::class, 'updateSalvamento'])->name('salvamento.update');

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

<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    $postgrad_choices = DB::table('postgrad_ref')->pluck('label', 'code')->toArray();
    $choices_sitfunc = DB::table('sitfunc_ref')->pluck('label', 'code')->toArray();
    
    // Buscar primeiro usuário do banco (para teste) - você pode trocar por auth depois
    $user = DB::table('usuarios')->first();
    
    // Se não houver usuário, criar um objeto vazio
    if (!$user) {
        $user = (object)[
            'numbm' => '',
            'nome' => 'Usuário Teste',
            'nome_completo' => '',
            'postgrad_code' => '',
            'date_include' => '',
            'tempo_servico' => '0 anos',
            'status_code' => '',
            'sitfunc_code' => '',
            'sexo_code' => 'M',
            'cargo_code' => 'U',
            'emailfunc' => '',
            'gto' => '',
            'ativ_esp' => '',
            'list_ativ_esp' => '',
            'cob' => '',
            'unid_princ' => '',
            'unid_lot' => '',
            'priorit' => 'B',
        ];
    }
    
    return view('welcome', compact('user', 'postgrad_choices', 'choices_sitfunc'));
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

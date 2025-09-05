<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;

class RegisteredUserController extends Controller
{
    public function create() {
        return view('auth.register');
    }

    public function store(RegisterRequest $request) {
        $data = $request->validated();

        $user = Usuario::create([
            'nome'           => $data['nome'],
            'email'          => $data['email'],
            'senha_hash'     => Hash::make($data['password']),
            'postgrad_code'  => $data['postgrad_code'],
            'sexo_code'      => $data['sexo_code'],
            'status_code'    => $data['status_code'],
            'sitfunc_code'   => $data['sitfunc_code'],
            'cargo_code'     => $data['cargo_code'] ?? 'U',
            'numbm'          => $data['numbm'] ?? null,
            'cob'            => $data['cob'] ?? null,
            'date_include'   => now()->toDateString(), // MySQL: populado aqui
        ]);

        Auth::login($user);
        request()->session()->regenerate();

        return redirect('/dashboard');
    }
}

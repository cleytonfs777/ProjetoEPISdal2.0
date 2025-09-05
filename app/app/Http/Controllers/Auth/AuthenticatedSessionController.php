<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class AuthenticatedSessionController extends Controller
{
    public function create() {
        return view('auth.login');
    }

    public function store(LoginRequest $request) {
        $credentials = $request->validated();

        /** @var \App\Models\Usuario|null $user */
        $user = Usuario::where('email', $credentials['email'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->senha_hash)) {
            return back()->withErrors(['email' => 'Credenciais inválidas.'])->withInput();
        }

        Auth::login($user, (bool)($credentials['remember'] ?? false));

        $request->session()->regenerate();
        return redirect()->intended('/dashboard');
    }

    public function destroy(Request $request) {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}

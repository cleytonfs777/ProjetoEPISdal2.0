<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array {
        return [
            'nome'           => ['required','string','max:255'],
            'email'          => ['required','email','max:255','unique:usuarios,email'],
            'password'       => ['required','string','min:8','confirmed'],
            'postgrad_code'  => ['required','exists:postgrad_ref,code'],
            'sexo_code'      => ['required','in:M,F'],
            'status_code'    => ['required','in:A,I'], // se quiser fixo 'A', troque para in:A
            'sitfunc_code'   => ['required','exists:sitfunc_ref,code'],
            'cargo_code'     => ['required','in:U,A'], // registro comum = U
            'numbm'          => ['nullable','string','unique:usuarios,numbm'],
            'cob'            => ['nullable','string'],
        ];
    }

    public function messages(): array {
        return ['password.confirmed' => 'As senhas não coincidem.'];
    }
}


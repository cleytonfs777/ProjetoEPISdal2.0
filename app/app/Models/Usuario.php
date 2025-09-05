<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // se for autenticação nativa
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuarios';

    protected $fillable = [
        'nome','postgrad_code','date_include','email','status_code','sitfunc_code',
        'gto','ativ_esp','senha_hash','cargo_code','numbm','cob','unid_lot','unid_princ',
        'sexo_code','emailfunc','telefone'
    ];

    protected $hidden = ['senha_hash'];

    // Se quiser usar autenticação padrão com "password":
    public function getAuthPassword() { return $this->senha_hash; }

    public function epiItens() {
        return $this->hasMany(EpiItem::class, 'usuario_id');
    }

    public function isAdmin(): bool {
        return $this->cargo_code === 'A';
    }
}

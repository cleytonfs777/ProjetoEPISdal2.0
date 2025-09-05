<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EpiItem extends Model
{
    use HasFactory;

    protected $table = 'epi_item';

    protected $fillable = [
        'usuario_id','grupo_id','tipo_item_id','estado_conservacao_id','analise_procede',
        'marca','modelo','ano_fabricacao','plano_distribuicao','recebido','date_recebido',
        'atributos_json'
    ];

    protected $casts = [
        'analise_procede' => 'boolean',
        'recebido'        => 'boolean',
        'date_recebido'   => 'date',
        'atributos_json'  => 'array',
    ];

    public function usuario() { return $this->belongsTo(Usuario::class); }
}

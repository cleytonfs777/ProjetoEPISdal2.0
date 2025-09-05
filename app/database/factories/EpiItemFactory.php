<?php

namespace Database\Factories;

use App\Models\EpiItem;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class EpiItemFactory extends Factory
{
    protected $model = EpiItem::class;

    public function definition(): array
    {
        // Pega ids de referência (assumindo que o ReferenceTablesSeeder já rodou)
        $grupo   = DB::table('epi_grupo')->inRandomOrder()->first();
        $tipo    = DB::table('epi_tipo_item')->inRandomOrder()->first();
        $estCons = DB::table('estado_conservacao_ref')->inRandomOrder()->first();

        return [
            'usuario_id'            => Usuario::factory(),
            'grupo_id'              => $grupo->id,
            'tipo_item_id'          => $tipo->id,
            'estado_conservacao_id' => $estCons->id,
            'analise_procede'       => $this->faker->boolean(80),
            'marca'                 => $this->faker->randomElement(['Rosenbauer','Viking','MSA','Bullard','Lider']),
            'modelo'                => strtoupper($this->faker->bothify('MDL-###')),
            'ano_fabricacao'        => $this->faker->numberBetween(2018, 2025),
            'plano_distribuicao'    => 'Plano '.$this->faker->numberBetween(2022,2025),
            'recebido'              => $this->faker->boolean(85),
            'date_recebido'         => $this->faker->dateTimeBetween('-3 years', 'now'),
            'atributos_json'        => $this->atributosPorTipo($tipo->code),
        ];
    }

    private function atributosPorTipo(string $code): array
    {
        // Gera atributos realistas conforme o tipo
        $tamanhos = ['Pequeno','Médio','Grande','1º Extra Grande','2º Extra Grande','3º Extra Grande'];
        $circ     = ['12 a 15 cm','18 a 19 cm','19 a 20 cm','20 a 21,5 cm','21,5 a 23 cm','23 a 25 cm','25 a 28 cm','28 a 30 cm'];
        $cores    = ['Branco','Amarelo','Vermelho'];

        return match ($code) {
            'jaqueta' => [
                'jaqueta_tamanho'     => $this->faker->randomElement($tamanhos),
                'jaqueta_complemento' => $this->faker->numberBetween(0,4),
            ],
            'calca' => [
                'calca_tamanho'       => $this->faker->randomElement($tamanhos),
                'calca_complemento'   => $this->faker->numberBetween(0,4),
            ],
            'capacete','capacete_aquatico','capacete_altura' => [
                'cor'                 => $this->faker->randomElement($cores),
            ],
            'luva' => [
                'circunferencia_mao'  => $this->faker->randomElement($circ),
                'tamanho'             => $this->faker->randomElement($tamanhos),
            ],
            'luva_veicular' => [
                'circunferencia_mao'  => $this->faker->randomElement($circ),
                'tamanho'             => $this->faker->randomElement($tamanhos),
            ],
            'balaclava' => [
                'camadas'             => $this->faker->randomElement(['Simples','Dupla','Tripla']),
            ],
            'bota' => [
                'bota_num'            => $this->faker->numberBetween(35,51),
            ],
            default => [],
        };
    }
}

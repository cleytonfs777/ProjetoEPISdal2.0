<?php

namespace Database\Factories;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UsuarioFactory extends Factory
{
    protected $model = Usuario::class;

    public function definition(): array
    {
        $postgrads = ['sd2cl','sd','cb','3sgt','2sgt','1sgt','subten','2ten','1ten','cap','maj','tencel','cel'];
        $sitfuncs  = array_map(fn($i)=>(string)$i, range(1,70));
        $sexos     = ['M','F'];

        return [
            'nome'          => $this->faker->name(),
            'postgrad_code' => $this->faker->randomElement($postgrads),
            'date_include'  => $this->faker->date(),
            'email'         => $this->faker->unique()->safeEmail(),
            'status_code'   => 'A',
            'sitfunc_code'  => $this->faker->randomElement($sitfuncs),
            'gto'           => $this->faker->optional()->sentence(),
            'ativ_esp'      => $this->faker->optional()->sentence(),
            'senha_hash'    => Hash::make('senha123'), // ajuste depois
            'cargo_code'    => 'U',
            'numbm'         => (string) $this->faker->unique()->numberBetween(10000, 99999),
            'cob'           => (string) $this->faker->numberBetween(1,5),
            'unid_lot'      => 'Batalhão '.$this->faker->randomElement(['I','II','III','IV']),
            'unid_princ'    => 'Companhia '.$this->faker->randomElement(['A','B','C']),
            'sexo_code'     => $this->faker->randomElement($sexos),
            'emailfunc'     => null,
            'telefone'      => $this->faker->optional()->phoneNumber(),
        ];
    }

    public function admin(): self {
        return $this->state(fn()=>[
            'cargo_code' => 'A',
            'email'      => 'admin@example.com',
        ]);
    }
}

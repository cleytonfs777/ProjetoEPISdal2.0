<?php

namespace Database\Seeders;

use App\Models\EpiItem;
use App\Models\Usuario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DemoDataSeeder extends Seeder
{
    public function run(): void
    {
        // Garante refs (roda antes o ReferenceTablesSeeder)
        if (DB::table('epi_grupo')->count() === 0 || DB::table('epi_tipo_item')->count() === 0) {
            $this->command->warn('As tabelas de referência estão vazias. Rode o ReferenceTablesSeeder antes.');
            return;
        }

        // Admin fixo
        $admin = Usuario::factory()->admin()->create([
            'nome'       => 'Admin CBMMG',
            'numbm'      => '000001',
            'email'      => 'admin@example.com',
            'senha_hash' => Hash::make('admin123'), // troque depois
        ]);

        // Usuário comum
        $user = Usuario::factory()->create([
            'nome'       => 'Militar Operacional',
            'email'      => 'usuario@example.com',
            'numbm'      => '000002',
            'senha_hash' => Hash::make('user123'),
            'cargo_code' => 'U',
        ]);

        // Cria EPIs para o usuário comum (um kit completo por grupo)
        $grupos = DB::table('epi_grupo')->pluck('id','code')->toArray();
        $tipos  = DB::table('epi_tipo_item')->pluck('id','code')->toArray();
        $estBom = DB::table('estado_conservacao_ref')->where('code','bom')->value('id');

        // EPI_CIURB: jaqueta, calca, capacete, luva, balaclava, bota
        $this->criarItens($user->id, $grupos['ciurb'], [
            'jaqueta','calca','capacete','luva','balaclava','bota'
        ], $tipos, $estBom);

        // EPI_MULTIMISSAO: jaqueta, calca, capacete, luva, bota
        $this->criarItens($user->id, $grupos['multimissao'], [
            'jaqueta','calca','capacete','luva','bota'
        ], $tipos, $estBom);

        // EPI_SALVAMENTO: capacete_aquatico, capacete_altura, luva_veicular
        $this->criarItens($user->id, $grupos['salvamento'], [
            'capacete_aquatico','capacete_altura','luva_veicular'
        ], $tipos, $estBom);

        // EPI_MOTORRESGATE: jaqueta, calca, capacete, luva, bota
        $this->criarItens($user->id, $grupos['motorresgate'], [
            'jaqueta','calca','capacete','luva','bota'
        ], $tipos, $estBom);

        // Massa adicional (opcional): 30 usuários com EPIs aleatórios
        Usuario::factory(30)->create()->each(function($u) {
            EpiItem::factory()->count(6)->create(['usuario_id' => $u->id]);
        });

        $this->command->info('DemoDataSeeder concluído.');
    }

    private function criarItens(int $usuarioId, int $grupoId, array $tiposCode, array $tiposMap, int $estId): void
    {
        foreach ($tiposCode as $code) {
            EpiItem::factory()->create([
                'usuario_id'            => $usuarioId,
                'grupo_id'              => $grupoId,
                'tipo_item_id'          => $tiposMap[$code],
                'estado_conservacao_id' => $estId,
                'recebido'              => true,
            ]);
        }
    }
}

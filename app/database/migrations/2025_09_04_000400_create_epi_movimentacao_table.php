<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void {
        Schema::create('epi_movimentacao', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->foreignId('epi_item_id')->constrained('epi_item')->cascadeOnDelete();
            $table->foreignId('usuario_id')->constrained('usuarios');          // alvo
            $table->foreignId('ator_id')->nullable()->constrained('usuarios'); // executor

            $table->string('tipo');          // ENTREGA, TROCA, BAIXA, MANUTENCAO
            $table->text('observacao')->nullable();
            $table->json('payload_json')->nullable();

            $table->timestamp('created_at')->useCurrent();

            $table->index('epi_item_id');
            $table->index('usuario_id');
            $table->index(['tipo', 'created_at']);
        });
    }

    public function down(): void {
        Schema::dropIfExists('epi_movimentacao');
    }
};

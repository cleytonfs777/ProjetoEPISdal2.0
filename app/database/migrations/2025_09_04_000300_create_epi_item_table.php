<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void {
        Schema::create('epi_item', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->foreignId('usuario_id')->constrained('usuarios')->cascadeOnDelete();
            $table->foreignId('grupo_id')->constrained('epi_grupo');
            $table->foreignId('tipo_item_id')->constrained('epi_tipo_item');
            $table->foreignId('estado_conservacao_id')->nullable()->constrained('estado_conservacao_ref');

            $table->boolean('analise_procede')->default(false);

            $table->string('marca')->nullable();
            $table->string('modelo')->nullable();
            $table->integer('ano_fabricacao')->nullable();
            $table->string('plano_distribuicao')->nullable();

            $table->boolean('recebido')->default(false);
            $table->date('date_recebido')->nullable();

            // JSON (MySQL): deixe nullable; popule '{}' na aplicação/seed
            $table->json('atributos_json')->nullable();

            $table->timestamps();

            // Índices
            $table->index('usuario_id');
            $table->index(['grupo_id', 'tipo_item_id']);
            $table->index('recebido');
            $table->index('estado_conservacao_id');
        });
    }

    public function down(): void {
        Schema::dropIfExists('epi_item');
    }
};

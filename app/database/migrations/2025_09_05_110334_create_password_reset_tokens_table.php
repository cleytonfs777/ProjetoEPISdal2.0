<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        if (!Schema::hasTable('password_reset_tokens')) {
            Schema::create('password_reset_tokens', function (Blueprint $table) {
                // 1) Email como PRIMARY KEY:
                //    - garante 1 token "ativo" por email (o novo sobrescreve o anterior)
                //    - lookup rápido por email (rota de reset recebe email)
                $table->string('email')->primary();

                // 2) Token (hash do token real):
                //    - o Laravel grava Hash::make($token)
                //    - 255 chars é suficiente
                $table->string('token');

                // 3) created_at:
                //    - usado para validar expiração (config 'expire' em minutos)
                //    - nullable permite inserir via aplicação com now() sem exigir default no DB
                $table->timestamp('created_at')->nullable();
            });
        } else {
            // Se a tabela já existia (seu caso), apenas garante colunas mínimas
            Schema::table('password_reset_tokens', function (Blueprint $table) {
                if (!Schema::hasColumn('password_reset_tokens', 'email')) {
                    $table->string('email')->primary();
                }
                if (!Schema::hasColumn('password_reset_tokens', 'token')) {
                    $table->string('token');
                }
                if (!Schema::hasColumn('password_reset_tokens', 'created_at')) {
                    $table->timestamp('created_at')->nullable();
                }
                // Se sua tabela antiga tinha 'id', 'updated_at', etc., pode deixá-los —
                // o broker ignora, não atrapalha.
            });
        }
    }

    public function down(): void {
        // Em projetos novos, normalmente pode dropar.
        // Se a tabela já veio de outro pacote, ajuste conforme sua necessidade.
        Schema::dropIfExists('password_reset_tokens');
    }
};


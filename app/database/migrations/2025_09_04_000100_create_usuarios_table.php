<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('nome');
            $table->string('postgrad_code');
            $table->date('date_include')->nullable(); // sem default; você define no app/seed

            // Se usar citext, você pode trocar para DB::statement depois desta migration
            $table->string('email')->unique()->nullable();     // pessoal
            $table->string('status_code');
            $table->string('sitfunc_code');

            $table->text('gto')->nullable();
            $table->text('ativ_esp')->nullable();

            $table->string('senha_hash'); // armazene bcrypt/argon2

            $table->string('cargo_code');  // A/U
            $table->string('numbm')->unique()->nullable();
            $table->string('cob')->nullable();

            $table->string('unid_lot')->nullable();
            $table->string('unid_princ')->nullable();

            $table->string('sexo_code');
            $table->string('emailfunc')->nullable();           // funcional (pode tornar unique se quiser)
            $table->string('telefone')->nullable();

            $table->timestamps();
        });

        // FKs
        Schema::table('usuarios', function (Blueprint $table) {
            $table->foreign('postgrad_code')->references('code')->on('postgrad_ref');
            $table->foreign('status_code')->references('code')->on('status_ref');
            $table->foreign('sitfunc_code')->references('code')->on('sitfunc_ref');
            $table->foreign('cargo_code')->references('code')->on('cargo_ref');
            $table->foreign('sexo_code')->references('code')->on('sexo_ref');
        });

        // Índices úteis
        Schema::table('usuarios', function (Blueprint $table) {
            $table->index(['unid_princ', 'unid_lot']);
            $table->index(['postgrad_code']);
            $table->index(['status_code']);
            $table->index(['sitfunc_code']);
            $table->index(['sexo_code']);
        });

        // (Opcional) Tornar email/emailfunc CITEXT após extensão habilitada:
        // DB::statement('ALTER TABLE usuarios ALTER COLUMN email TYPE CITEXT;');
        // DB::statement('ALTER TABLE usuarios ALTER COLUMN emailfunc TYPE CITEXT;');
    }

    public function down(): void {
        Schema::table('usuarios', function (Blueprint $table) {
            $table->dropForeign(['postgrad_code']);
            $table->dropForeign(['status_code']);
            $table->dropForeign(['sitfunc_code']);
            $table->dropForeign(['cargo_code']);
            $table->dropForeign(['sexo_code']);
        });
        Schema::dropIfExists('usuarios');
    }
};

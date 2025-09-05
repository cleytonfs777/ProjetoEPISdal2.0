<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        if (DB::getDriverName() !== 'mysql') return;

        Schema::table('epi_item', function (Blueprint $table) {
            // STORED para garantir indexação
            $table->string('aj_jaqueta_tamanho')->storedAs("JSON_UNQUOTE(JSON_EXTRACT(atributos_json, '$.jaqueta_tamanho'))")->nullable();
            $table->string('aj_calca_tamanho')->storedAs("JSON_UNQUOTE(JSON_EXTRACT(atributos_json, '$.calca_tamanho'))")->nullable();
            $table->string('aj_cor')->storedAs("JSON_UNQUOTE(JSON_EXTRACT(atributos_json, '$.cor'))")->nullable();
            $table->string('aj_tamanho')->storedAs("JSON_UNQUOTE(JSON_EXTRACT(atributos_json, '$.tamanho'))")->nullable();
            $table->unsignedSmallInteger('aj_bota_num')->storedAs("JSON_EXTRACT(atributos_json, '$.bota_num')")->nullable();

            $table->index('aj_jaqueta_tamanho');
            $table->index('aj_calca_tamanho');
            $table->index('aj_cor');
            $table->index('aj_tamanho');
            $table->index('aj_bota_num');
        });
    }

    public function down(): void {
        if (DB::getDriverName() !== 'mysql') return;

        Schema::table('epi_item', function (Blueprint $table) {
            $table->dropIndex(['aj_jaqueta_tamanho']);
            $table->dropIndex(['aj_calca_tamanho']);
            $table->dropIndex(['aj_cor']);
            $table->dropIndex(['aj_tamanho']);
            $table->dropIndex(['aj_bota_num']);
            $table->dropColumn(['aj_jaqueta_tamanho','aj_calca_tamanho','aj_cor','aj_tamanho','aj_bota_num']);
        });
    }
};

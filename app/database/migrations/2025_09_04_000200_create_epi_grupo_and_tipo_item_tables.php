<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('epi_grupo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code')->unique(); // ciurb, multimissao, ...
            $table->string('label');
        });

        Schema::create('epi_tipo_item', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code')->unique(); // jaqueta, calca, ...
            $table->string('label');
        });
    }

    public function down(): void {
        Schema::dropIfExists('epi_tipo_item');
        Schema::dropIfExists('epi_grupo');
    }
};

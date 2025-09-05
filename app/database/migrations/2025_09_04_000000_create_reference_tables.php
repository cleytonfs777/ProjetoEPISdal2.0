<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('postgrad_ref', function (Blueprint $table) {
            $table->string('code')->primary();
            $table->string('label');
        });

        Schema::create('status_ref', function (Blueprint $table) {
            $table->string('code')->primary(); // 'A' / 'I'
            $table->string('label');
        });

        Schema::create('sitfunc_ref', function (Blueprint $table) {
            $table->string('code')->primary(); // '1'..'70'
            $table->string('label');
        });

        Schema::create('cargo_ref', function (Blueprint $table) {
            $table->string('code')->primary(); // 'A' / 'U'
            $table->string('label');
        });

        Schema::create('sexo_ref', function (Blueprint $table) {
            $table->string('code')->primary(); // 'M' / 'F'
            $table->string('label');
        });

        Schema::create('estado_conservacao_ref', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code')->unique();  // otimo, bom, ...
            $table->string('label');
        });
    }

    public function down(): void {
        Schema::dropIfExists('estado_conservacao_ref');
        Schema::dropIfExists('sexo_ref');
        Schema::dropIfExists('cargo_ref');
        Schema::dropIfExists('sitfunc_ref');
        Schema::dropIfExists('status_ref');
        Schema::dropIfExists('postgrad_ref');
    }
};

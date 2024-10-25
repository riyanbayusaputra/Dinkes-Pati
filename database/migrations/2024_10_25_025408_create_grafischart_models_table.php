<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('grafischart_models', function (Blueprint $table) {
            $table->id();
            $table->string('komponen');
            $table->string('satuan');
            $table->string('tahun');
            $table->string('tipe')->comment('RTCH, AIR MINUM, DRAINASE, KAWASAN KUMUH, SANITASI');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grafischart_models');
    }
};

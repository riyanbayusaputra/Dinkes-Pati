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
        Schema::table('responses', function (Blueprint $table) {
            $table->string('propinsi')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('stratakelurahan')->nullable();
            $table->string('rtrw')->nullable();
            $table->string('nourutresponden')->nullable();
            $table->string('nokuesioner')->nullable();
            $table->date('tanggal_survei')->nullable();
            $table->time('jam_mulai_wawancara')->nullable();
            $table->time('jam_selesai_wawancara')->nullable();
            $table->string('nama_wawancara')->nullable();
            $table->string('nama_supervisor')->nullable();
            $table->string('nama_koordinator_kecamatan')->nullable();
            $table->string('nama_kepala_rumah_tangga')->nullable();
            $table->integer('jumlah_keluarga_rumah_tangga')->nullable();
            $table->integer('jumlah_jiwa_laki_laki')->nullable();
            $table->integer('jumlah_jiwa_perempuan')->nullable();
            $table->string('nama_responden')->nullable();
            $table->string('hubungan_dengan_kepala_rumah_tangga')->nullable();
            $table->string('alamat_telepon')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('responses', function (Blueprint $table) {
            $table->dropColumn([
                'propinsi',
                'kabupaten',
                'kecamatan',
                'kelurahan',
                'stratakelurahan',
                'rtrw',
                'nourutresponden',
                'nokuesioner',
                'tanggal_survei',
                'jam_mulai_wawancara',
                'jam_selesai_wawancara',
                'nama_wawancara',
                'nama_supervisor',
                'nama_koordinator_kecamatan',
                'nama_kepala_rumah_tangga',
                'jumlah_keluarga_rumah_tangga',
                'jumlah_jiwa_laki_laki',
                'jumlah_jiwa_perempuan',
                'nama_responden',
                'hubungan_dengan_kepala_rumah_tangga',
                'alamat_telepon'
            ]);
        });
    }
};

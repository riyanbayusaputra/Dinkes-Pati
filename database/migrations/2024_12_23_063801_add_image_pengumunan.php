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
        if (!Schema::hasColumn('pengumuman', 'image')) {
            Schema::table('pengumuman', function (Blueprint $table) {
                $table->text('image')->nullable();
            });
        }
        if (!Schema::hasColumn('pengumuman', 'pdf')) {
            Schema::table('pengumuman', function (Blueprint $table) {
                $table->text('pdf')->nullable();
            });
        }
        if (!Schema::hasColumn('pengumuman', 'judul')) {
            Schema::table('pengumuman', function (Blueprint $table) {
                $table->text('judul')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('pengumuman', 'image')) {
            Schema::table('pengumuman', function (Blueprint $table) {
                $table->dropColumn('image');
            });
        }
        if (Schema::hasColumn('pengumuman', 'pdf')) {
            Schema::table('pengumuman', function (Blueprint $table) {
                $table->dropColumn('pdf');
            });
        }
        if (Schema::hasColumn('pengumuman', 'judul')) {
            Schema::table('pengumuman', function (Blueprint $table) {
                $table->dropColumn('judul');
            });
        }
    }
};

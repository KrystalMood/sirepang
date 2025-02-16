<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('keluarga', function (Blueprint $table) {
            $table->integer('id_keluarga', true)->unique('id_keluarga_unique');
            $table->integer('no_kk')->nullable();
            $table->string('nama_kepala_keluarga');
            $table->integer('jumlah_keluarga');
            $table->string('alamat');
            $table->string('kode_pos', 5)->nullable();
            $table->string('range_pendapatan');
            $table->string('range_pengeluaran');
            $table->tinyInteger('is_hamil')->default(1);
            $table->tinyInteger('is_menyusui')->default(1);
            $table->tinyInteger('is_balita')->default(1);
            $table->binary('gambar');
            $table->integer('kecamatan_id_kecamatan')->index('fk_keluarga_kecamatan1_idx');
            $table->integer('id_desa')->index('fk_keluarga_desa1_idx');
            $table->integer('id_kader')->index('fk_keluarga_kader1_idx');
            $table->primary(['id_keluarga']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('keluarga');
    }
};
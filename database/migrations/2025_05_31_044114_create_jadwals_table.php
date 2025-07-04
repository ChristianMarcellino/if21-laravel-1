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
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id();
            $table->string('tahun_akademik',9);
            $table->string('kode_smt', 6);
            $table->string('kelas', 5);
            $table->unsignedBigInteger('mata_kuliah_id');
            $table->foreign('mata_kuliah_id')->references('id')->on('mata_kuliah')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('dosen_id');
            $table->foreign('dosen_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('sesi_id');
            $table->foreign('sesi_id')->references('id')->on('sesi')->onDelete('restrict')->onUpdate('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal');
    }
};

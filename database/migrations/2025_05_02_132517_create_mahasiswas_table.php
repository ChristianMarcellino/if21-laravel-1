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
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->string('nama', 30);
            $table->char('npm',11);
            $table->enum('jk', ['L', 'P']);
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir',30);
            $table->string('asal_sma', 50);
            $table->string('foto', 50);
            $table->uuid('prodi_id');
            $table->foreign('prodi_id')->references('id')->on('prodi')->onDelete('restrict')->onUpdate('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};

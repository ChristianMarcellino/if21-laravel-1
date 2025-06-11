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
        Schema::create('fakultas', function (Blueprint $table) {
            $table->uuid("id"); //uuid = kode agar primary key nya aman 
            $table->primary("id");
            $table->string('nama', 50);
            $table->string("singkatan", 4);
            $table->string("nama_dekan", 30);
            $table->string("nama_wadek",30);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fakultas');
    }
};

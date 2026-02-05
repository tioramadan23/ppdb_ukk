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
        Schema::create('orang_tua', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pendaftaran_id')->constrained('pendaftaran')->onDelete('cascade');
            $table->string('nama_ayah', 100)->nullable();
            $table->string('nik_ayah', 20)->nullable();
            $table->string('pendidikan_ayah', 50)->nullable();
            $table->string('pekerjaan_ayah', 50)->nullable();
            $table->string('no_hp_ayah', 15)->nullable();
            $table->string('nama_ibu', 100)->nullable();
            $table->string('nik_ibu', 20)->nullable();
            $table->string('pendidikan_ibu', 50)->nullable();
            $table->string('pekerjaan_ibu', 50)->nullable();
            $table->string('no_hp_ibu', 15)->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orang_tua');
    }
};

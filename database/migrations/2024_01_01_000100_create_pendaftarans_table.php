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
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete()
                ->unique();

            $table->string('nama_lengkap', 100);
            $table->string('nisn', 20)->unique();
            $table->string('nik', 20)->nullable();
            $table->string('no_kk', 20)->nullable();
            $table->string('tempat_lahir', 50)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['L','P'])->nullable();
            $table->string('agama', 20)->nullable();
            $table->text('alamat_lengkap')->nullable();
            $table->string('asal_sekolah', 100)->nullable();
            $table->string('jurusan', 50)->nullable();
            $table->enum('status_pendaftaran', ['draft','submit','diverifikasi'])->default('draft');
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};

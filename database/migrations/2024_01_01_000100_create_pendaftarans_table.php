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

            // ✅ KOLOM no_pendaftaran — HAPUS ->after('id')
            // Urutan di file = urutan di database
            $table->string('no_pendaftaran', 50)
                  ->unique()
                  ->nullable();
            $table->index('no_pendaftaran');

            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete()
                ->unique();

            $table->string('nama_lengkap', 100);
            $table->string('nisn', 20)->unique();
            $table->string('nik', 20);
            $table->string('no_kk', 20);
            $table->string('tempat_lahir', 50);
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('agama', 20);
            $table->string('no_hp', 15);
            $table->text('alamat_lengkap');
            $table->string('jurusan', 50);
            $table->string('asal_sekolah', 100);

            // Status proses
            $table->enum('status_pendaftaran', ['draft', 'submit', 'diverifikasi'])
                ->default('draft');

            // PENGUMUMAN 
            $table->enum('status_hasil', ['diterima', 'tidak_diterima'])->nullable();
            $table->text('keterangan_hasil')->nullable();
            $table->date('tanggal_pengumuman')->nullable();

            $table->timestamps();

            // Index dashboard admin
            $table->index('status_pendaftaran');
            $table->index('status_hasil');
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


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
        Schema::table('pendaftarans', function (Blueprint $table) {
            $table->string('nik', 20)->nullable(false)->change();
            $table->string('no_kk', 20)->nullable(false)->change();
            $table->string('tempat_lahir', 50)->nullable(false)->change();
            $table->date('tanggal_lahir')->nullable(false)->change();
            $table->enum('jenis_kelamin', ['L','P'])->nullable(false)->change();
            $table->string('agama', 20)->nullable(false)->change();
            $table->string('no_hp', 15)->nullable(false)->change();
            $table->text('alamat_lengkap')->nullable(false)->change();
            $table->string('jurusan', 50)->nullable(false)->change();
            $table->string('asal_sekolah', 100)->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pendaftarans', function (Blueprint $table) {
            $table->string('nik', 20)->nullable()->change();
            $table->string('no_kk', 20)->nullable()->change();
            $table->string('tempat_lahir', 50)->nullable()->change();
            $table->date('tanggal_lahir')->nullable()->change();
            $table->enum('jenis_kelamin', ['L','P'])->nullable()->change();
            $table->string('agama', 20)->nullable()->change();
            $table->string('no_hp', 15)->nullable()->change();
            $table->text('alamat_lengkap')->nullable()->change();
            $table->string('jurusan', 50)->nullable()->change();
            $table->string('asal_sekolah', 100)->nullable()->change();
        });
    }
};

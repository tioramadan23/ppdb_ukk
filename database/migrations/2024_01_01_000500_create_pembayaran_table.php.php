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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();

            $table->foreignId('pendaftaran_id')
                ->constrained('pendaftarans')
                ->cascadeOnDelete();

            $table->string('bukti_pembayaran_path', 255);

            $table->enum('status_pembayaran', ['pending','diterima','ditolak'])
                ->default('pending');

            $table->timestamp('tanggal_upload')->useCurrent();

            $table->text('catatan_admin')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
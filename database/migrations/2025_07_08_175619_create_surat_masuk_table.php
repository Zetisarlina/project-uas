<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratMasukTable extends Migration
{
    /**
     * Jalankan migration.
     */
    public function up(): void
    {
        Schema::create('surat_masuk', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat');
            $table->date('tanggal_surat');
            $table->string('pengirim');
            $table->string('perihal');
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse migration (rollback).
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_masuk');
    }
}
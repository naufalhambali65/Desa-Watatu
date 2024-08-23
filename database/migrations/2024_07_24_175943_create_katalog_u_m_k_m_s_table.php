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
        Schema::create('katalog_u_m_k_m_s', function (Blueprint $table) {
            $table->id();
            $table->string('nama_umkm');
            $table->string('pemilik');
            $table->string('gambar');
            $table->text('deskripsi');
            $table->text('alamat');
            $table->string('kategori');
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('katalog_u_m_k_m_s');
    }
};

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
    Schema::create('layanan', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('id_kategori');
        $table->string('nama');
        $table->text('deskripsi')->nullable();
        $table->string('url_layanan');
        $table->boolean('is_active')->default(true);
        $table->string('icon')->default('globe'); // Tambahan kecil untuk icon di UI
        $table->timestamps();

        // Relasi Foreign Key
        $table->foreign('id_kategori')->references('id_kategori')->on('kategori')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanans');
    }
};

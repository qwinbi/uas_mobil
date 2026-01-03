<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mobils', function (Blueprint $table) {
            $table->id();
            $table->string('nama_mobil');
            $table->string('brand')->default('Honda');
            $table->decimal('harga_sewa', 10, 2);
            $table->string('status')->default('tersedia');
            $table->string('foto')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('tipe')->nullable();
            $table->integer('tahun')->nullable();
            $table->string('transmisi')->nullable();
            $table->integer('kapasitas')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mobils');
    }
};
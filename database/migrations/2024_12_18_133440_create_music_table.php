<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('music', function (Blueprint $table) {
            $table->id();
            $table->string('nama_penyewa');
            $table->string('nama_alat_musik');
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali');
            $table->decimal('harga_sewa', 8, 2);
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('music');
    }
};
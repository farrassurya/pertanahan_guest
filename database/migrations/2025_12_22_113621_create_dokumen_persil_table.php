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
        Schema::create('dokumen_persil', function (Blueprint $table) {
            $table->id('dokumen_id');
            $table->unsignedBigInteger('persil_id');
            $table->string('jenis_dokumen', 100);
            $table->string('nomor', 100)->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();

            // Foreign key
            $table->foreign('persil_id')
                  ->references('persil_id')
                  ->on('persil')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumen_persil');
    }
};

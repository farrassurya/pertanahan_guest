<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('persil', function (Blueprint $table) {
            $table->id('persil_id');
            $table->string('kode_persil', 50)->unique();
            $table->unsignedBigInteger('pemilik_warga_id');
            $table->decimal('luas_m2', 10, 2);
            $table->string('penggunaan', 100)->nullable();
            $table->string('alamat_lahan', 255)->nullable();
            $table->string('rt', 5)->nullable();
            $table->string('rw', 5)->nullable();
            $table->timestamps();

            $table->foreign('pemilik_warga_id')->references('warga_id')->on('warga')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('persil');
    }
};

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
        Schema::create('media', function (Blueprint $table) {
            $table->id('media_id');
            $table->string('ref_table', 50);
            $table->unsignedBigInteger('ref_id');
            $table->string('file_name', 255);
            $table->string('caption', 100)->nullable();
            $table->string('mime_type', 50)->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();

            $table->index(['ref_table', 'ref_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};

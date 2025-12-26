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
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jabatan');
            $table->unsignedBigInteger('atasan_id')->nullable(); // FK self-referencing
            $table->timestamps();

            // Foreign key manual untuk self-referencing
            $table->foreign('atasan_id')->references('id')->on('pegawai')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop foreign key terlebih dahulu
        Schema::table('pegawai', function (Blueprint $table) {
            $table->dropForeign(['atasan_id']);
        });

        Schema::dropIfExists('pegawai');
    }
};

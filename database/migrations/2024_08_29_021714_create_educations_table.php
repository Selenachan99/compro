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
        Schema::create('educations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_profile');
            $table->string('nama_sekolah', 60);
            $table->string('jurusan', 60);
            $table->string('deskripsi', 255);
            $table->string('riwayat_pendidikan');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_profile')->references('id')->on('profiles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('educations');
    }
};

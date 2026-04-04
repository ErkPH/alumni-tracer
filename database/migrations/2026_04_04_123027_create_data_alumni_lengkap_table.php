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
        Schema::create('data_alumni_lengkap', function (Blueprint $table) {
            $table->id();
            $table->string('nama'); // Nama Alumni
            $table->string('email')->nullable(); // Email
            $table->string('no_hp')->nullable(); // No HP
            
            // Media Sosial
            $table->string('linkedin')->nullable();
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('tiktok')->nullable();
            
            // Pekerjaan
            $table->string('tempat_bekerja')->nullable();
            $table->text('alamat_bekerja')->nullable();
            $table->string('posisi')->nullable();
            
            // Status (PNS, Swasta, Wirausaha)
            $table->enum('status_kerja', ['PNS', 'Swasta', 'Wirausaha'])->nullable();
            
            // Sosmed Tempat Bekerja
            $table->string('sosmed_kantor')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_alumni_lengkap');
    }
};
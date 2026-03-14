<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
    Schema::create('tracking_results', function (Blueprint $table) {
        $table->id();
        $table->foreignId('alumni_id')->constrained()->onDelete('cascade');
        $table->string('link_bukti'); // [cite: 27]
        $table->integer('score'); // Untuk hitung kecocokan [cite: 21]
        $table->string('status'); // [cite: 58-60]
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tracking_results');
    }
};

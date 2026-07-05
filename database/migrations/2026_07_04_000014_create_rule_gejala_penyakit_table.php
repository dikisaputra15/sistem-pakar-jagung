<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rule_gejala_penyakit', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penyakit_id')->constrained()->onDelete('cascade');
            $table->foreignId('gejala_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            $table->unique(['penyakit_id', 'gejala_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rule_gejala_penyakit');
    }
};

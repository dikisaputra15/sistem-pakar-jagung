<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('riwayat_diagnosas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('data_lahan_id')->nullable()->constrained('data_lahans')->onDelete('set null');
            $table->foreignId('penyakit_id')->nullable()->constrained()->onDelete('set null');
            $table->float('persentase')->default(0);
            $table->timestamp('tanggal_diagnosa')->useCurrent();
            $table->timestamps();
        });

        Schema::create('riwayat_gejala', function (Blueprint $table) {
            $table->id();
            $table->foreignId('riwayat_diagnosa_id')->constrained('riwayat_diagnosas')->onDelete('cascade');
            $table->foreignId('gejala_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('riwayat_gejala');
        Schema::dropIfExists('riwayat_diagnosas');
    }
};

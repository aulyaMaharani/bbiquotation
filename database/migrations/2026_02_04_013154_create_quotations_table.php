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
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->string('nama_perusahaan');
            $table->string('nama_pic');
            $table->string('whatsapp_pic');
            $table->string('jenis_kapal'); 
            $table->string('nama_kapal');
            $table->string('nama_kapal_extra')->nullable(); // Penting: nullable
            $table->string('gt'); 
            $table->string('pelabuhan_tujuan');
            $table->date('estimasi_tiba');
            $table->string('rencana_kegiatan'); 
            $table->text('kegiatan_detail')->nullable(); // Penting: nullable
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotations');
    }
};
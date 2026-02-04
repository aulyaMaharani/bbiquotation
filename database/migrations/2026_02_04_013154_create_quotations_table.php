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
            
            // Data Identitas
            $table->string('nama_perusahaan');
            $table->string('nama_pic');
            $table->string('whatsapp_pic');
            
            // Data Kapal
            $table->string('jenis_kapal'); // General Cargo, Tugboat/Barge, dll
            $table->string('nama_kapal');
            $table->string('nama_kapal_extra')->nullable(); // Khusus untuk nama Barge jika pilih Tugboat/Barge
            $table->string('gt'); // Dropdown: Tugboat atau Barge
            
            // Data Operasional
            $table->string('pelabuhan_tujuan');
            $table->date('estimasi_tiba');
            $table->string('rencana_kegiatan'); // Muat, Bongkar, Lain-lain
            $table->text('kegiatan_detail')->nullable(); // Deskripsi jika pilih 'Lain-lain'
            
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
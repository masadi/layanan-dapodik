<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrasi_peserta_didik', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('jenis_data');
            $table->uuid('sekolah_id');
            $table->string('nama');
            $table->string('nisn', 10)->nullable();
            $table->string('nik', 16);
            $table->string('tempat_lahir', 50);
            $table->date('tanggal_lahir');
            $table->string('npsn', 8)->nullable();
            $table->string('nama_sekolah', 100)->nullable();
            $table->string('kode_wilayah', 8)->nullable();
            $table->string('rombel_tujuan', 50)->nullable();
            $table->unsignedSmallInteger('status')->default(0);
            $table->string('keterangan')->nullable();
            $table->foreignId('approved_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
            $table->foreign('sekolah_id')->references('sekolah_id')->on('sekolah')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('kode_wilayah')->references('kode_wilayah')->on('wilayah')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registrasi_peserta_didik');
    }
};

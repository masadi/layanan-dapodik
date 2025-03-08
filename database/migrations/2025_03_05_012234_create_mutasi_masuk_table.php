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
        /*
        SCAN RAPORT TERAKHIR	SCAN SURAT MUTASI	NISN	NAMA SISWA	TEMPAT dan TANGGAL LAHIR	ROMBEL	NPSN SEKOLAH ASAL	NAMA SEKOLAH ASAL	KECAMATAN	KABUPATEN 	PROVINSI	KETERANGAN MUTASI	STATUS PENGAJUAN
        */
        Schema::create('mutasi_masuk', function (Blueprint $table) {
            $table->id();
            $table->uuid('sekolah_id');
            $table->string('nama');
            $table->string('nisn', 10)->nullable();
            $table->string('nik', 16);
            $table->string('tempat_lahir', 50);
            $table->date('tanggal_lahir');
            $table->string('rombel', 50);
            $table->string('npsn', 8);
            $table->string('nama_sekolah', 100);
            $table->string('kode_wilayah', 8);
            $table->string('keterangan')->nullable();
            $table->unsignedSmallInteger('status')->default(0);
            $table->foreignId('approved_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
            $table->foreign('sekolah_id')->references('sekolah_id')->on('sekolah')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mutasi_masuk');
    }
};

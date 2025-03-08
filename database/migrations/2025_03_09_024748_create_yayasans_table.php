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
        Schema::create('yayasan', function (Blueprint $table) {
            $table->id();
            $table->uuid('sekolah_id');
            $table->string('nama');
            $table->string('nama_pimpinan');
            $table->string('alamat_jalan');
            $table->decimal('rt', 2, 0)->nullable();
            $table->decimal('rw', 2, 0)->nullable();
            $table->string('nama_dusun');
            $table->string('kode_wilayah', 8);
            $table->string('kode_pos', 5);
            $table->string('nomor_telepon', 20);
            $table->string('nomor_fax', 20)->nullable();
            $table->string('email', 60);
            $table->string('website', 100)->nullable();
            $table->string('no_pendirian_yayasan', 80);
            $table->date('tanggal_pendirian_yayasan');
            $table->string('nomor_pengesahan_pn_ln', 100)->nullable();
            $table->string('nomor_sk_bn');
            $table->date('tanggal_sk_bn');
            $table->decimal('lintang', 18,12);
            $table->decimal('bujur', 18,12);
            $table->string('file_foto');
            $table->string('file_sk');
            $table->unsignedSmallInteger('status')->default(0);
            $table->string('keterangan')->nullable();
            $table->foreignId('approved_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
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
        Schema::dropIfExists('yayasan');
    }
};

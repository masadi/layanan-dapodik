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
        Schema::create('ptk_terdaftar', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('jenis_data');
            $table->uuid('sekolah_id');
            $table->string('nama', 100);
            $table->string('nik', 16);
            $table->decimal('jenis_ptk_id', 2, 0);
            $table->decimal('jabatan_ptk_id', 5, 0);
            $table->unsignedSmallInteger('ptk_induk');
            $table->string('file_sk_gty')->nullable();
            $table->string('file_sk_penugasan')->nullable();
            $table->string('file_ijazah')->nullable();
            $table->unsignedSmallInteger('status')->default(0);
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('ptk_terdaftar');
    }
};

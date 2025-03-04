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
        Schema::create('sekolah', function (Blueprint $table) {
            $table->uuid('sekolah_id');
            $table->string('npsn', 8);
			$table->string('nama', 100);
			$table->unsignedSmallInteger('bentuk_pendidikan_id');
			$table->string('alamat_jalan')->nullable();
			$table->string('nama_dusun')->nullable();
			$table->string('desa_kelurahan')->nullable();
			$table->string('kode_wilayah')->nullable();
			$table->string('email')->nullable();
			$table->string('website')->nullable();
			$table->integer('status_sekolah');
			$table->string('kode_registrasi')->nullable();
			$table->timestamps();
            $table->primary('sekolah_id');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->uuid('sekolah_id')->nullable();
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['sekolah_id']);
            $table->dropColumn('sekolah_id');
        });
        Schema::dropIfExists('sekolah');
    }
};

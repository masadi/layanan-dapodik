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
        Schema::create('jabatan_ptk', function (Blueprint $table) {
            $table->decimal('jabatan_ptk_id', 5, 0);
            $table->decimal('jenis_ptk_id', 2, 0);
            $table->string('nama', 100);
            $table->timestamps();
            $table->primary('jabatan_ptk_id');
            $table->foreign('jenis_ptk_id')->references('jenis_ptk_id')->on('jenis_ptk')->nullOnDelete();
        });
        Schema::table('ptk_terdaftar', function (Blueprint $table) {
            $table->foreign('jabatan_ptk_id')->references('jabatan_ptk_id')->on('jabatan_ptk')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ptk_terdaftar', function (Blueprint $table) {
            $table->dropForeign(['jabatan_ptk_id']);
        });
        Schema::dropIfExists('jabatan_ptk');
    }
};

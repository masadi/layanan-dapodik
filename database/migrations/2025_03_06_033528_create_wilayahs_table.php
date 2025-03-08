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
        Schema::create('wilayah', function (Blueprint $table) {
            $table->string('kode_wilayah', 8);
			$table->string('nama', 60);
			$table->smallInteger('id_level_wilayah');
			$table->string('mst_kode_wilayah', 8)->nullable();
			$table->string('negara_id',2);
			$table->timestamps();
            $table->primary('kode_wilayah');
			$table->foreign('mst_kode_wilayah')->references('kode_wilayah')->on('wilayah')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wilayah');
    }
};

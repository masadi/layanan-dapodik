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
        Schema::create('jenis_ptk', function (Blueprint $table) {
            $table->decimal('jenis_ptk_id', 2, 0);
            $table->string('nama', 100);
            $table->timestamps();
            $table->primary('jenis_ptk_id');
        });
        Schema::table('ptk_terdaftar', function (Blueprint $table) {
            $table->foreign('jenis_ptk_id')->references('jenis_ptk_id')->on('jenis_ptk')->nullOnDelete();
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
            $table->dropForeign(['jenis_ptk_id']);
        });
        Schema::dropIfExists('jenis_ptk');
    }
};

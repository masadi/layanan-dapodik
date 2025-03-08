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
        Schema::create('plt_kepsek', function (Blueprint $table) {
            $table->id();
            $table->uuid('sekolah_id');
            $table->string('nip', 20);
            $table->string('nama');
            $table->string('berkas');
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
        Schema::dropIfExists('plt_kepsek');
    }
};

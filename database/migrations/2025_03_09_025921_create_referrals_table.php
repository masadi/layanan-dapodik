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
        Schema::create('referral', function (Blueprint $table) {
            $table->id();
            $table->uuid('sekolah_id');
            $table->string('npyp', 10);
            $table->string('nama');
            $table->string('file_sk_operator');
            $table->string('nomor_sk_bn');
            $table->unsignedSmallInteger('status')->default(0);
            $table->string('keterangan')->nullable();
            $table->foreignId('approved_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('referral');
    }
};

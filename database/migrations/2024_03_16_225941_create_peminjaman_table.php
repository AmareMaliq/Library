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
        Schema::create('t_peminjaman', function (Blueprint $table) {
            $table->id('f_id');
            $table->unsignedBigInteger('f_idadmin');
            $table->foreign('f_idadmin')->references('f_id')->on('t_admin')->onDelete('cascade');
            $table->unsignedBigInteger('f_idanggota');
            $table->foreign('f_idanggota')->references('f_id')->on('t_anggota')->onDelete('cascade');
            $table->date('f_tanggalpeminjaman');
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
        Schema::dropIfExists('t_peminjaman');
    }
};

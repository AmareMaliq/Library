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
        Schema::create('t_detail_peminjaman', function (Blueprint $table) {
            $table->id('f_id');
            $table->unsignedBigInteger('f_idpeminjaman');
            $table->foreign('f_idpeminjaman')->references('f_id')->on('t_peminjaman')->onDelete('cascade');
            $table->unsignedBigInteger('f_iddetailbuku');
            $table->foreign('f_iddetailbuku')->references('f_id')->on('t_detailbuku')->onDelete('cascade');
            $table->date('f_tanggalkembali')->nullable();
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
        Schema::dropIfExists('t_detail_peminjaman');
    }
};

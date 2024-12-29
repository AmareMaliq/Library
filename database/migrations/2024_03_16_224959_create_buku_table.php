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
        Schema::create('t_buku', function (Blueprint $table) {
            $table->id('f_id');
            $table->unsignedBigInteger('f_idkategori');
            $table->foreign('f_idkategori')->references('f_id')->on('t_kategori')->onDelete('cascade');
            $table->string('f_judul', 100);
            $table->string('f_pengarang', 100);
            $table->string('f_penerbit', 100);
            $table->text('f_deskripsi');

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
        Schema::dropIfExists('t_buku');
    }
};

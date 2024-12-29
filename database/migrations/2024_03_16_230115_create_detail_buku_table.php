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
        Schema::create('t_detailbuku', function (Blueprint $table) {
            $table->id('f_id');
            $table->unsignedBigInteger('f_idbuku');
            $table->foreign('f_idbuku')->references('f_id')->on('t_buku')->onDelete('cascade');
            $table->integer('f_stock')->default(1);
            $table->enum('f_status', ['Tersedia', 'Tidak Tersedia']);
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
        Schema::dropIfExists('t_detailbuku');
    }
};

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
        Schema::create('t_anggota', function (Blueprint $table) {
            $table->id('f_id');
            $table->string('f_nama', 100);
            $table->string('f_username', 25);
            $table->string('f_password');
            $table->string('f_tempatlahir', 100);
            $table->date('f_tanggallahir');
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
        Schema::dropIfExists('t_anggota');
    }
};

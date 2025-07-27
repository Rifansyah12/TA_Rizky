<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelasJadwalTable extends Migration
{
    public function up()
    {
        Schema::create('kelas_jadwal', function (Blueprint $table) {
            $table->id();
            $table->string('kelas');
            $table->string('hari');
            $table->string('jam');
            $table->string('wali_kelas');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kelas_jadwal');
    }
}


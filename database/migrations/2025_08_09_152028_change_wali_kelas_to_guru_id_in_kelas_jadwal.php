<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('kelas_jadwal', function (Blueprint $table) {
            $table->dropColumn('wali_kelas'); // hapus kolom string
            $table->unsignedBigInteger('guru_id')->after('jam');

            $table->foreign('guru_id')->references('id')->on('gurus')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('kelas_jadwal', function (Blueprint $table) {
            $table->dropForeign(['guru_id']);
            $table->dropColumn('guru_id');
            $table->string('wali_kelas');
        });
    }

};

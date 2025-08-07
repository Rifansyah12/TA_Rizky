<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPertanyaanAiToPendaftaransTable extends Migration
{
    public function up()
    {
        Schema::table('pendaftarans', function (Blueprint $table) {
            $table->string('pertanyaan_ai_1')->nullable();
            $table->string('pertanyaan_ai_2')->nullable();
            $table->string('pertanyaan_ai_3')->nullable();
            $table->string('pertanyaan_ai_4')->nullable();
        });
    }

    public function down()
    {
        Schema::table('pendaftarans', function (Blueprint $table) {
            $table->dropColumn([
                'pertanyaan_ai_1',
                'pertanyaan_ai_2',
                'pertanyaan_ai_3',
                'pertanyaan_ai_4',
            ]);
        });
    }
}

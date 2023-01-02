<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevisidataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revisidata', function (Blueprint $table) {
            $table->increments('id');
            $table->string('jenis_revisi',255);
            $table->date('tanggal');
            $table->date('tanggal_data');
            $table->string('jenis_data',255);
            $table->string('nama_data',255);
            $table->string('detail_revisi',255);
            $table->string('alasan_revisi',255);
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
        Schema::dropIfExists('revisidata');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGurusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guru', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama',255);
            $table->string('nip',255);
            $table->string('no_telp',255);
            $table->string('email',255);
            $table->string('password',255);
            $table->integer('hak_akses_id')->unsigned()->default(2);
            $table->foreign('hak_akses_id')->references('id')->on('hak_akses');
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
        Schema::dropIfExists('guru');
    }
}

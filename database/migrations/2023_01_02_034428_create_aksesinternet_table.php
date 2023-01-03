<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAksesinternetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aksesinternet', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama',255);
            $table->string('departemen',255);
            $table->string('jabatan',255);
            $table->string('keperluan_email',255);
            $table->string('keperluan_browsing',255);
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
        Schema::dropIfExists('aksesinternet');
    }
}

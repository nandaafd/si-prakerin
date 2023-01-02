<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamanInventarisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjaman_inventaris', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama',255);
            $table->string('departemen',255);
            $table->date('tanggal_pinjam');
            $table->string('item_a',255);
            $table->string('item_b',255);
            $table->string('item_c',255);
            $table->date('tanggal_pengembalian');
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
        Schema::dropIfExists('peminjaman_inventaris');
    }
}

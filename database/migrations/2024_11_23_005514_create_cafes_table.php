<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCafesTable extends Migration
{
    public function up()
    {
        Schema::create('cafes', function (Blueprint $table) {
            $table->id('id_cafe');
            $table->string('nama_cafe');
            $table->string('foto_cafe')->nullable();
            $table->text('alamat');
            $table->string('range_harga');
            $table->time('jam_buka');
            $table->time('jam_tutup');
            $table->integer('kecepatan_wifi');
            $table->enum('kategori_cafe', ['agenda', 'mood']);
            $table->string('nama_kategori');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cafes');
    }
}

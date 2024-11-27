<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('cafes', function (Blueprint $table) {
        $table->unsignedBigInteger('id_mood')->nullable();
        $table->unsignedBigInteger('id_agenda')->nullable();

        // Menambahkan foreign key constraint
        $table->foreign('id_mood')->references('id_mood')->on('moods')->onDelete('set null');
        $table->foreign('id_agenda')->references('id_agenda')->on('agendas')->onDelete('set null');
    });
}

public function down()
{
    Schema::table('cafes', function (Blueprint $table) {
        $table->dropForeign(['id_mood']);
        $table->dropForeign(['id_agenda']);
        $table->dropColumn(['id_mood', 'id_agenda']);
    });
}

};

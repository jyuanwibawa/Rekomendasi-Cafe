<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRoleToUsersTable extends Migration
{
    public function up()
    {
        // Menambahkan kolom 'role' pada tabel 'users'
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('user'); // Default 'user', bisa diganti menjadi 'admin' jika perlu
        });
    }

    public function down()
    {
        // Menghapus kolom 'role' jika migrasi dibatalkan
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }
}

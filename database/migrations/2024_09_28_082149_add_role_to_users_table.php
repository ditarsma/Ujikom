<?php
// database/migrations/xxxx_xx_xx_add_role_to_users_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRoleToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Menambahkan kolom role dengan nilai default 'user'
            $table->enum('role', ['admin', 'user'])->default('user')->after('password');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Menghapus kolom role jika terjadi rollback
            $table->dropColumn('role');
        });
    }
}

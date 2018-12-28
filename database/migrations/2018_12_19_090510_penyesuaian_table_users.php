<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PenyesuaianTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string("username")->unique();
            $table->string("roles");
            $table->text("alamat");
            $table->string("no_hp");
            $table->string("gambar");
            $table->enum("status",["ACTIVE","INACTIVE"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn("username")->unique();
            $table->dropColumn("roles");
            $table->dropColumn("alamat");
            $table->dropColumn("no_hp");
            $table->dropColumn("gambar");
            $table->dropColumn("status");
        });
    }
}

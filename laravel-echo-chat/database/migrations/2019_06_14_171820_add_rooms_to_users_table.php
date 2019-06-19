<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRoomsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedInteger('room_id')->nullable();
            $table->foreign('room_id')->references('id')->on('rooms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::enableForeignKeyConstraints();

        Schema::table('users', function (Blueprint $table) {
            Schema::enableForeignKeyConstraints();
            $table->dropForeign(['room_id']);
            $table->dropColumn('room_id');   
        });
    }
}

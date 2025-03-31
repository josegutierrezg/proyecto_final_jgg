<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('jugadores', function (Blueprint $table) {
            $table->unsignedBigInteger('equipo_id')->after('nombre')->nullable();
            $table->foreign('equipo_id')->references('id')->on('equipos')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('jugadores', function (Blueprint $table) {
            $table->dropForeign(['equipo_id']);
            $table->dropColumn('equipo_id');
        });
    }
};


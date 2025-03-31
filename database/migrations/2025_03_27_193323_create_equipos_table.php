<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->string('logo'); // URL de la imagen del logo
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('equipos');
    }
};

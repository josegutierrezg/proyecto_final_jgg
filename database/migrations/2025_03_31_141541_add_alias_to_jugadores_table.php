<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('jugadores', function (Blueprint $table) {
            $table->string('alias')->nullable()->after('nombre'); // Nueva columna alias
        });
    }

    public function down()
    {
        Schema::table('jugadores', function (Blueprint $table) {
            $table->dropColumn('alias');
        });
    }
};

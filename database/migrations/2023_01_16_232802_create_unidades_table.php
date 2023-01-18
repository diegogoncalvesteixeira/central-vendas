<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('diretoria_id')->constrained('diretorias')->onDelete('cascade');
            $table->string('nome',100)->nullable();
            $table->string('lat_long')->nullable();
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('unidades');
    }
};
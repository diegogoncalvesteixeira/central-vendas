<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('vendas_roaming', function (Blueprint $table) {
            $table->id();
            $table->foreignId('venda_id')->constrained('vendas')->onDelete('cascade');
            $table->foreignId('unidade_id')->constrained('vendas');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('vendas_roaming');
    }
};
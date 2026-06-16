<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('configuracoes_taxa', function (Blueprint $table) {
            $table->id(); //
            $table->decimal('taxa_fixa', 8, 2); //
            $table->decimal('valor_excedente', 8, 2); //
            $table->timestamps(); //
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('configuracoes_taxa');
    }
};
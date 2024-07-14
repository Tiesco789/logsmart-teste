<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('sorteios', function (Blueprint $table) {
            $table->json('participantes')->nullable();
            $table->timestamp('data_sorteio')->nullable();
            $table->json('resultado')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sorteios', function (Blueprint $table) {
            $table->dropColumn('data_sorteio');
            Schema::dropIfExists('sorteios');
        });
    }
};

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
        Schema::create('classe_prof', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->tinyInteger('nbHeures');

            $table->foreignId('classe_id')
                    ->constrained()
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            
            $table->foreignId('prof_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classe_prof');
    }
};
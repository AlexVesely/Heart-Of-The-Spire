<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    /**
     * Create 'cards' table.
     * 
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('energy_cost');
            $table->enum('rarity', ['starter', 'common', 'uncommon', 'rare']);
            $table->enum('type', ['attack','skill','power']);
            $table->enum('class', ['ironclad','silent','defect','watcher']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};

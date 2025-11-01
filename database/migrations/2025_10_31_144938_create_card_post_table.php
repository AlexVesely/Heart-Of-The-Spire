<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Create 'card_post' pivot table.
     * 
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('card_post', function (Blueprint $table) {
            $table->primary(['card_id', 'post_id']);
            $table->bigInteger('card_id')->unsigned(); // FK to 'cards' table
            $table->bigInteger('post_id')->unsigned(); // FK to 'posts' table
            $table->timestamps();

            // Establish referential integrity in relationships
            $table->foreign('card_id')->references('id')->on('cards')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('post_id')->references('id')->on('posts')
            ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('card_post');
    }
};

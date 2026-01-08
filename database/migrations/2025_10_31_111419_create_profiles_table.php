<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Create 'profiles' table.
     * 
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('profile_name');
            $table->boolean('is_admin');
            $table->text('bio');
            $table->enum('fav_class', ['ironclad','silent','defect','watcher']);
            $table->string('profile_img_id');
            $table->bigInteger('user_id')->unsigned(); // FK to users table
            $table->timestamps();

            // Establist referential integrity in relationship
            $table->foreign('user_id')->references('id')->on('users')->
            onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};

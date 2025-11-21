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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
             $table->string('taskname')->nullable();
            $table->longText('task_description');
            $table->text('images')->nullable();
            $table->string('url')->nullable();
            $table->string('category')->nullable();
            $table->string('duration')->nullable();
            $table->integer('task_points')->nullable();
            $table->integer('task_level')->nullable();
            $table->text('level_image')->nullable();
            $table->longText('submission_instruction');
            $table->integer('badge_point')->nullable();
            $table->string('badge_name')->nullable();
            $table->string('badge_icon')->nullable();
            $table->integer('status')->nullable();
            
            $table->timestamps();
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};

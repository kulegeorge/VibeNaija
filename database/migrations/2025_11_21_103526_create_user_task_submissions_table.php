<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('user_task_submissions', function (Blueprint $table) {
            $table->id();

            // Who submitted?
            $table->unsignedBigInteger('user_id');

            // Which task?
            $table->unsignedBigInteger('task_id');

            // Explanation text
            $table->longText('user_text')->nullable();

            // Video link
            $table->string('video_url')->nullable();

            // Uploaded images (stored as JSON array)
            $table->json('images')->nullable();

            // Uploaded documents (stored as JSON array)
            $table->json('documents')->nullable();
            
            $table->integer('points')->nullable();

            // Submission status
            $table->enum('status', ['pending', 'approved', 'rejected'])
                  ->default('pending');

            $table->timestamps();

            // Foreign keys
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_task_submissions');
    }
};

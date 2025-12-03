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
        Schema::create('notification_preferences', function (Blueprint $table) {
           $table->id();
    $table->foreignId('user_id')->constrained()->onDelete('cascade');
    $table->boolean('email_task_updates')->default(true);
    $table->boolean('email_cbt_results')->default(true);
    $table->boolean('email_badges')->default(true);
    $table->boolean('in_app_task_updates')->default(true);
    $table->boolean('in_app_cbt_results')->default(true);
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notification_preferences');
    }
};

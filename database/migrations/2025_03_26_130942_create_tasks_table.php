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
            $table->string('name', length: 50);
            $table->string('description', length: 255)->nullable();
            $table->boolean('deleted')->default(false);
            $table->boolean('finished')->default(false);
            // $table->foreignId('user_id')->constrained('users');
            $table->foreignId('priority_id')->constrained('priorities');
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

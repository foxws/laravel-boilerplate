<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->morphs('model');
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('prefixed_id')->unique();
            $table->json('name');
            $table->json('slug');
            $table->json('content')->nullable();
            $table->json('summary')->nullable();
            $table->string('state')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_metadata', function (Blueprint $table) {
            $table->id();
            $table->foreignId('media_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('title')->nullable();
            $table->string('copyright')->nullable();
            $table->string('artist')->nullable();
            $table->string('author')->nullable();
            $table->string('composer')->nullable();
            $table->string('album')->nullable();
            $table->string('make')->nullable();
            $table->string('model')->nullable();
            $table->string('location')->nullable();
            $table->string('grouping')->nullable();
            $table->string('show')->nullable();
            $table->string('episode_id')->nullable();
            $table->string('season_number')->nullable();
            $table->string('encoder')->nullable();
            $table->boolean('compilation')->default(false);
            $table->boolean('gapless_playback')->default(false);
            $table->longText('description')->nullable();
            $table->longText('comment')->nullable();
            $table->longText('synopsis')->nullable();
            $table->timestamp('released_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media_metadata');
    }
};

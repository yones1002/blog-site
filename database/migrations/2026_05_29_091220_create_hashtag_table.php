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
        Schema::create('hashtag', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('fa_name');
            $table->string('slug');
            $table->enum('status',['active','inactive'])->default('inactive');
            $table->longText('description')->nullable();
            $table->longText('fa_description')->nullable();
            $table->json('json')->nullable();
            $table->string('image')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('model_has_hashtag', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hashtags_id');
            $table->morphs('model');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hashtag');
    }
};

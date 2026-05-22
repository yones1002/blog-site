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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('type');
            $table->text('short_detail')->nullable();
            $table->longText('long_detail')->nullable();
            $table->text('link')->nullable();
            $table->text('rss_link')->nullable();
            $table->string('cover')->nullable();
            $table->string('mini_cover')->nullable();
            $table->longText('seo')->nullable();
            $table->string('time')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->string('show')->nullable();
            $table->longText('faq')->nullable();
            $table->string('created_by')->default('Content Team');
            $table->integer('category_id')->nullable();
            $table->integer('view')->default(0);
            $table->integer('likes')->default(0);
            $table->integer('parent_id')->default(0);
            $table->timestamp('share_time')->nullable();
            $table->string('videos')->nullable();
            $table->enum('lang', ['fa', 'en', 'other'])->default('en');
            $table->string('author_id')->default(0);
            $table->softDeletes();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // __galleries
        if (!Schema::hasTable('__galleries')) {
            Schema::create('__galleries', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('gallery_id');
                $table->unsignedInteger('locale_id');
                $table->string('name');
                $table->string('slug')->nullable();
                $table->timestamps();

                $table->index(['gallery_id', 'locale_id']);
                $table->index('slug');

                $table->foreign('gallery_id')->references('id')->on('galleries')->onDelete('cascade');
                $table->foreign('locale_id')->references('id')->on('locales')->onDelete('cascade');
            });
        }

        // __bcategories
        if (!Schema::hasTable('__bcategories')) {
            Schema::create('__bcategories', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('category_id');
                $table->unsignedInteger('locale_id');
                $table->string('name');
                $table->string('slug')->nullable();
                $table->timestamps();

                $table->index(['category_id', 'locale_id']);
                $table->index('slug');

                $table->foreign('category_id')->references('id')->on('bcategories')->onDelete('cascade');
                $table->foreign('locale_id')->references('id')->on('locales')->onDelete('cascade');
            });
        }

        // __blogs
        if (!Schema::hasTable('__blogs')) {
            Schema::create('__blogs', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('blog_id');
                $table->unsignedInteger('locale_id');
                $table->string('title');
                $table->string('slug')->nullable();
                $table->longText('text')->nullable();
                $table->timestamps();

                $table->index(['blog_id', 'locale_id']);
                $table->index('slug');

                $table->foreign('blog_id')->references('id')->on('blogs')->onDelete('cascade');
                $table->foreign('locale_id')->references('id')->on('locales')->onDelete('cascade');
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('__blogs');
        Schema::dropIfExists('__bcategories');
        Schema::dropIfExists('__galleries');
    }
};

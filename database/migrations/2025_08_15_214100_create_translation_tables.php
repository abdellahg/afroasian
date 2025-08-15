<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // __categories
        if (!Schema::hasTable('__categories')) {
            Schema::create('__categories', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('category_id');
                $table->unsignedInteger('locale_id');
                $table->string('name');
                $table->string('slug')->nullable();
                $table->timestamps();

                $table->index(['category_id', 'locale_id']);
                $table->index('slug');

                $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
                $table->foreign('locale_id')->references('id')->on('locales')->onDelete('cascade');
            });
        }

        // __destinations
        if (!Schema::hasTable('__destinations')) {
            Schema::create('__destinations', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('destination_id');
                $table->unsignedInteger('locale_id');
                $table->string('name');
                $table->string('slug')->nullable();
                $table->timestamps();

                $table->index(['destination_id', 'locale_id']);
                $table->index('slug');

                $table->foreign('destination_id')->references('id')->on('destinations')->onDelete('cascade');
                $table->foreign('locale_id')->references('id')->on('locales')->onDelete('cascade');
            });
        }

        // __items
        if (!Schema::hasTable('__items')) {
            Schema::create('__items', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('item_id');
                $table->unsignedInteger('locale_id');
                $table->string('name');
                $table->string('slug')->nullable();
                $table->text('short_description')->nullable();
                $table->text('meta_description')->nullable();
                $table->text('meta_keywords')->nullable();
                $table->text('price_policy')->nullable();
                $table->text('notes')->nullable();
                $table->timestamps();

                $table->index(['item_id', 'locale_id']);
                $table->index('slug');

                $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
                $table->foreign('locale_id')->references('id')->on('locales')->onDelete('cascade');
            });
        }

        // __itineraries
        if (!Schema::hasTable('__itineraries')) {
            Schema::create('__itineraries', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('item_id');
                $table->unsignedInteger('locale_id');
                $table->string('iti_title')->nullable();
                $table->text('iti_text')->nullable();
                $table->timestamps();

                $table->index(['item_id', 'locale_id']);

                $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
                $table->foreign('locale_id')->references('id')->on('locales')->onDelete('cascade');
            });
        }

        // __includes
        if (!Schema::hasTable('__includes')) {
            Schema::create('__includes', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('item_id');
                $table->unsignedInteger('locale_id');
                $table->text('text')->nullable();
                $table->timestamps();

                $table->index(['item_id', 'locale_id']);

                $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
                $table->foreign('locale_id')->references('id')->on('locales')->onDelete('cascade');
            });
        }

        // __excludes
        if (!Schema::hasTable('__excludes')) {
            Schema::create('__excludes', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('item_id');
                $table->unsignedInteger('locale_id');
                $table->text('text')->nullable();
                $table->timestamps();

                $table->index(['item_id', 'locale_id']);

                $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
                $table->foreign('locale_id')->references('id')->on('locales')->onDelete('cascade');
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('__excludes');
        Schema::dropIfExists('__includes');
        Schema::dropIfExists('__itineraries');
        Schema::dropIfExists('__items');
        Schema::dropIfExists('__destinations');
        Schema::dropIfExists('__categories');
    }
};

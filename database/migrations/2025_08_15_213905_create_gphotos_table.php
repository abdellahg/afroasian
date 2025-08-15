<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('gphotos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('photo_title')->nullable();
            $table->unsignedBigInteger('gallery_id')->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gphotos');
    }
};

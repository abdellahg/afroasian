<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            if (!Schema::hasColumn('reviews', 'status')) {
                $table->boolean('status')->default(false)->after('comment');
            }
            if (!Schema::hasColumn('reviews', 'featured')) {
                $table->boolean('featured')->default(false)->after('status');
            }
        });
    }

    public function down(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            if (Schema::hasColumn('reviews', 'featured')) {
                $table->dropColumn('featured');
            }
            if (Schema::hasColumn('reviews', 'status')) {
                $table->dropColumn('status');
            }
        });
    }
};

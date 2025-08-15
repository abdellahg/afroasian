<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            if (!Schema::hasColumn('categories', 'at_menu')) {
                $table->boolean('at_menu')->default(false)->after('active');
                $table->index('at_menu');
            }
        });
    }

    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            if (Schema::hasColumn('categories', 'at_menu')) {
                $table->dropIndex(['at_menu']);
                $table->dropColumn('at_menu');
            }
        });
    }
};

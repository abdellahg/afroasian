<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('homesettings', function (Blueprint $table) {
            if (!Schema::hasColumn('homesettings', 'type')) {
                $table->string('type')->nullable()->after('name_setting');
                $table->index('type');
            }
        });
    }

    public function down(): void
    {
        Schema::table('homesettings', function (Blueprint $table) {
            if (Schema::hasColumn('homesettings', 'type')) {
                $table->dropIndex(['type']);
                $table->dropColumn('type');
            }
        });
    }
};

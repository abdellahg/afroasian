<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        // First, drop the index on destination_id if present to allow changing to TEXT
        try {
            DB::statement('ALTER TABLE `items` DROP INDEX `items_destination_id_index`');
        } catch (\Throwable $e) {
            // ignore if index not present
        }

        Schema::table('items', function (Blueprint $table) {
            // Change destination_id to TEXT to store CSV of ids as used by controllers
            if (Schema::hasColumn('items', 'destination_id')) {
                $table->text('destination_id')->nullable()->change();
            } else {
                $table->text('destination_id')->nullable();
            }

            // Common listing/order fields
            if (!Schema::hasColumn('items', 'order')) $table->integer('order')->nullable()->default(0)->after('active');
            if (!Schema::hasColumn('items', 'days')) $table->integer('days')->nullable()->after('destination_id');
            if (!Schema::hasColumn('items', 'special_price')) $table->decimal('special_price', 10, 2)->nullable();
            if (!Schema::hasColumn('items', 'sale_text')) $table->string('sale_text')->nullable();
            if (!Schema::hasColumn('items', 'sale_percentage')) $table->integer('sale_percentage')->nullable();

            // Price fields set 1
            foreach ([
                'child_price1','child_price2','single_price','double_price','triple_price'
            ] as $col) {
                if (!Schema::hasColumn('items', $col)) $table->decimal($col, 10, 2)->nullable();
            }

            // Price fields set 2
            foreach ([
                'child_price12','child_price22','single_price2','double_price2','triple_price2'
            ] as $col) {
                if (!Schema::hasColumn('items', $col)) $table->decimal($col, 10, 2)->nullable();
            }

            // Person-based prices
            foreach ([
                'person1_price','person2_3_price','person4_6_price','person7_10_price'
            ] as $col) {
                if (!Schema::hasColumn('items', $col)) $table->decimal($col, 10, 2)->nullable();
            }

            if (!Schema::hasColumn('items', 'prices_type')) $table->tinyInteger('prices_type')->nullable();

            // Geo + media
            if (!Schema::hasColumn('items', 'latitude')) $table->decimal('latitude', 10, 7)->nullable();
            if (!Schema::hasColumn('items', 'longitude')) $table->decimal('longitude', 10, 7)->nullable();
            if (!Schema::hasColumn('items', 'primary_image')) $table->string('primary_image')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('items', function (Blueprint $table) {
            // Cannot reliably revert destination_id type; leave as text
            // Drop added columns if they exist
            $dropCols = [
                'order','days','special_price','sale_text','sale_percentage',
                'child_price1','child_price2','single_price','double_price','triple_price',
                'child_price12','child_price22','single_price2','double_price2','triple_price2',
                'person1_price','person2_3_price','person4_6_price','person7_10_price',
                'prices_type','latitude','longitude','primary_image'
            ];
            foreach ($dropCols as $col) {
                if (Schema::hasColumn('items', $col)) {
                    $table->dropColumn($col);
                }
            }
        });
    }
};

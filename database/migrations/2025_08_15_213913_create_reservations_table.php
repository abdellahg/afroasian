<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id')->nullable()->index();
            $table->unsignedBigInteger('item_id')->nullable()->index();
            $table->date('arrivaldate')->nullable();
            $table->date('depaturedate')->nullable();
            $table->smallInteger('persons')->default(1);
            $table->smallInteger('childs')->default(0);
            $table->decimal('total_amount', 10, 2)->nullable();
            $table->decimal('deposit_amount', 10, 2)->nullable();
            $table->decimal('total_paid', 10, 2)->nullable();
            $table->decimal('deposit_paid', 10, 2)->nullable();
            $table->string('status')->nullable();
            $table->text('user_notes')->nullable();
            $table->text('agent_notes')->nullable();
            $table->text('cancel_reason')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};

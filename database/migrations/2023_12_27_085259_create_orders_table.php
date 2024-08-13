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
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('order_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedInteger('address_id')->nullable();
            $table->enum('status', ['Pending','To Ship','To Receive','Lost','Cancelled','Completed'])->nullable();
            $table->enum('is_checkout', ['Pending','Done']);
            $table->unsignedBigInteger('payment_id')->nullable();
            $table->timestamp('date_time')->useCurrent()->onUpdate('current_timestamp');

            // Foreign key constraints
            $table->foreign('user_id')->references('user_id')->on('usersprofiles')->onDelete('cascade');
            $table->foreign('address_id')->references('address_id')->on('delivery_infos')->onDelete('set null');
            $table->foreign('payment_id')->references('payment_id')->on('payment')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

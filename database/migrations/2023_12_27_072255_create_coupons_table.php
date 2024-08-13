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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->integer('use_limit');
            $table->integer('item_used');
            $table->enum('type', ['Free Shipping', 'Percentage', 'Fixed Amount']);
            $table->integer('item_value')->nullable();
            $table->date('date_start');
            $table->date('date_end');
            $table->enum('status', ['Active', 'In Active']);
            $table->timestamps();
        });
        DB::table('coupons')->insert([
            [
                'id' => 197551200,
                'name' => 'TDGOINGUP',
                'use_limit' => 25,
                'item_used' => 0,
                'type' => 'Free Shipping',
                'item_value' => 0,
                'date_start' => '2023-05-01',
                'date_end' => '2023-06-02',
                'status' => 'Active',
            ],
            [
                'id' => 197551204,
                'name' => 'sad',
                'use_limit' => 12,
                'item_used' => 14,
                'type' => 'Percentage',
                'item_value' => 10,
                'date_start' => '2023-05-21',
                'date_end' => '2023-06-17',
                'status' => 'Active',
            ],
            [
                'id' => 197551208,
                'name' => 'ge',
                'use_limit' => 2,
                'item_used' => 0,
                'type' => 'Percentage',
                'item_value' => 10,
                'date_start' => '2023-05-12',
                'date_end' => '2023-05-21',
                'status' => 'Active',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};

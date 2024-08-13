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
        Schema::create('delivery_infos', function (Blueprint $table) {
            $table->increments('address_id');
            $table->string('region')->nullable();
            $table->string('province')->nullable();
            $table->string('city')->nullable();
            $table->string('barangay')->nullable();
            $table->bigInteger('phone_number');
            $table->string('description')->nullable();
            $table->enum('label', ['Home', 'Work'])->nullable();
            $table->enum('is_default', ['default', 'not']);
            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')->references('user_id')->on('usersprofiles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_infos');
    }
};

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
        Schema::create('bikes', function (Blueprint $table) {
            $table->id();
            $table->string('bike_name');
            $table->string('bike_image');
            $table->integer('brand_id');
            $table->integer('category_id');
            $table->string('engine_power');
            $table->string('model_year');
            $table->string('bike_code_name')->nullbale();
            $table->string('hp_torque');
            $table->string('front_brake');
            $table->string('rear_brake');
            $table->string('wheel_size');
            $table->string('fuel_system');
            $table->string('suspension_front');
            $table->string('suspension_rear');
            $table->string('chain_type');
            $table->string('swing_arm');
            $table->string('display');
            $table->string('headlight');
            $table->string('frame')->nullbale();
            $table->string('chassis')->nullbale();
            $table->string('weight')->nullbale();
            $table->string('starter');
            $table->string('speed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bikes');
    }
};

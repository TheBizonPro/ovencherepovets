<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_oven', function (Blueprint $table) {
            $table->foreignId('image_id')->constrained('images')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('oven_id')->constrained('ovens')->references('id')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('image_oven');
    }
};

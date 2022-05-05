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
        Schema::create('category_oven', function (Blueprint $table) {
            $table->foreignId('category_id')->constrained('categories')->references('id')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('category_oven');
    }
};

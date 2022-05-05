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
        Schema::create('ovens', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->nullable();
            $table->integer('price');
            $table->text('description');
            $table->string('short_description');
            $table->string('preview')->nullable();;
            //$table->foreignId('category_id')->constrained('categories')->references('id')->onUpdate('cascade')->onDelete('cascade');
            //$table->foreignId('discount_id')->constrained('discounts')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('sort')->nullable();
            $table->boolean('active');
            $table->timestamps();
           // $table->foreignId('discount_id')->constrained('discounts')->references('id')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ovens');
    }
};

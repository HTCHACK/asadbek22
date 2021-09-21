<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tour_category_id')->nullable();
            $table->foreign('tour_category_id')->references('id')->on('tour_categories')->onDelete('cascade');
            $table->string('title')->nullable();            
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('phone_number')->nullable();
            $table->longText('location')->nullable();
            $table->longText('content')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('picture')->nullable();
            $table->boolean('is_published')->default(false);
            $table->boolean('is_popular')->default(true);
            $table->string('price')->nullable();    
            $table->boolean('is_it_here')->nullable();
            $table->string('lang')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tours');
    }
}

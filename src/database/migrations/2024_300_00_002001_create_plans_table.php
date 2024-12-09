<?php


/*
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 4/17/24, 9:18 AM
 * Copyright (c) 2020-2024. Powered by www.iamir.net
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('creator_id')->nullable()->unsigned();
            $table->foreign('creator_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('icon_id')->nullable()->unsigned();
            $table->foreign('icon_id')->references('id')->on('posts')->onDelete('cascade');
            $table->bigInteger('image_id')->nullable()->unsigned();
            $table->foreign('image_id')->references('id')->on('posts')->onDelete('cascade');
            $table->string('title')->nullable();
            $table->string('template')->nullable();
            $table->text('summary')->nullable();
            $table->longText('content')->nullable();
            $table->string('type')->nullable()->default('app');
            $table->string('timing_type')->nullable();
            $table->bigInteger('timing_value')->nullable()->default(0);
            $table->integer('order')->default(0);
            $table->bigInteger('regular_price')->nullable();
            $table->bigInteger('sale_price')->nullable();
            $table->bigInteger('price')->nullable();
            $table->string('currency')->nullable();
            $table->longText('futures')->nullable();
            $table->string('status')->default('active');
            $table->timestamp('sale_price_at')->nullable();
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
        Schema::dropIfExists('plans');
    }
};

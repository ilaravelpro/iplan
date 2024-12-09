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
        Schema::create('plan_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('creator_id')->nullable()->unsigned();
            $table->foreign('creator_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('plan_id')->nullable()->unsigned();
            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade');
            $table->bigInteger('pay_method_id')->nullable()->unsigned();
            $table->foreign('pay_method_id')->references('id')->on('pay_methods')->onDelete('cascade');
            $table->string('number')->nullable();
            $table->string('tran_id')->nullable();
            $table->string('provider')->nullable();
            $table->string('currency')->nullable();
            $table->bigInteger('amount')->nullable();
            $table->bigInteger('amounted')->nullable();
            $table->longText('description')->nullable();
            $table->string('status')->default('new');
            $table->timestamp('payed_at');
            $table->timestamp('confirm_at');
            $table->timestamp('expired_at');
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
        Schema::dropIfExists('plan_users');
    }
};

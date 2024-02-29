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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->longText('address')->nullable();
            // $table->string('car_no')->nullable();
            // $table->string('car_type')->nullable();
            // $table->string('service')->nullable();
            $table->string('invoice_status')->nullable();
            $table->longText('car_description')->nullable();
            // $table->string('price')->nullable();
            $table->json('car_info')->nullable();
            $table->longText('note')->nullable();
            $table->longText('signature')->nullable();
            $table->json('images')->nullable();
            $table->string('receivedـdate')->nullable();
            $table->string('deliveryـdate')->nullable();
            $table->string('car_status')->default('لم يتم التصليح');
            $table->string('car_show')->default('show');
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
        Schema::dropIfExists('clients');
    }
};

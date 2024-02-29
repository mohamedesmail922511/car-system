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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('branch_id')->nullable();
            $table->string('invoice_type')->nullable();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->longText('address')->nullable();
            $table->string('invoice_status')->nullable();
            $table->longText('car_description')->nullable();
            $table->longText('note')->nullable();
            $table->string('signature')->nullable();
            $table->string('sales')->nullable();
            $table->json('images')->nullable();
            $table->string('receivedـdate')->nullable();
            $table->string('deliveryـdate')->nullable();
            $table->json('car_info')->nullable();
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
        Schema::dropIfExists('invoices');
    }
};
